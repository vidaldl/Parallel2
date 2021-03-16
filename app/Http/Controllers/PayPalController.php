<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Receipt;
use App\ReceiptInfo;
use App\Invoice;
use Srmklive\PayPal\Services\ExpressCheckout;

use DB;
use Carbon;
use Cart;
use Mail;

class PayPalController extends Controller
{
  protected $provider;
  public function __construct() {
      $this->provider = new ExpressCheckout();
  }


    public function expressCheckout(Request $request) {
    // check if payment is recurring
    $recurring = $request->input('recurring', false) ? true : false;

    // get new invoice id
    $invoice_id = Receipt::count() + rand(1, 500000);


    // Get the cart data
//     $cart = $this->getCart($recurring, $invoice_id);

    $data = [];

    $data['items'] = [];
    //Check if the payment is Recurring
    if($recurring){
      $data['items'][] = [
        'name' => $product->name,
        'price' => $product->price,
        'qty' => $product->qty,
      ];

      $data['items'][] = [
        'name' => 'Tax',
        'price' => Cart::tax(null,null,''),
        'qty' => 1,
      ];

      $data['return_url'] = url('/paypal/express-checkout-success?recurring=1');
      $data['subscription_desc'] = 'Monthly Subscription ' . config('paypal.invoice_prefix') . ' #' . $invoice_id;
      // every invoice id must be unique, else you'll get an error from paypal
      $data['invoice_id'] = config('paypal.invoice_prefix') . '_' . $invoice_id;
      $data['invoice_description'] = "Order #". $invoice_id ." Invoice";
      $data['cancel_url'] = url(route('checkout.canceled'));

      $data['total'] = Cart::total(null,null,'');

    } else {
      foreach(Cart::content() as $product) {
        //Adds new array foreach of the items inside cart
          $data['items'][] = [
            'name' => $product->name,
            'price' => $product->price,
            'qty' => $product->qty,
          ];

      }

      $data['items'][] = [
        'name' => 'Tax',
        'price' => Cart::tax(null,null,''),
        'qty' => 1,
      ];

      $data['return_url'] = url('/paypal/express-checkout-success');
      // every invoice id must be unique, else you'll get an error from paypal
      $data['invoice_id'] = config('paypal.invoice_prefix') . '_' . $invoice_id;
      $data['invoice_description'] = "Order #". $invoice_id ." Invoice";
      $data['cancel_url'] = url(route('checkout.canceled'));

      $data['total'] = Cart::total(null,null,'');


    }




    // send a request to paypal
    // paypal should respond with an array of data
    // the array should contain a link to paypal's payment system
    $response = $this->provider->setExpressCheckout($data, $recurring);

    // if there is no link redirect back with error message
    if (!$response['paypal_link']) {
      return redirect('/')->with(['code' => 'danger', 'message' => 'Something went wrong with PayPal']);
      // For the actual error message dump out $response and see what's in there

    }

    // redirect to paypal
    // after payment is done paypal
    // will redirect us back to $this->expressCheckoutSuccess
    return redirect($response['paypal_link']);

  }

private function getCart($recurring, $invoice_id)
    {

        if ($recurring) {
            return [
                // if payment is recurring cart needs only one item
                // with name, price and quantity
                'items' => [
                    [
                        'name' => 'Monthly Subscription ' . config('paypal.invoice_prefix') . ' #' . $invoice_id,
                        'price' => 20,
                        'qty' => 1,
                    ],
                ],

                // return url is the url where PayPal returns after user confirmed the payment
                'return_url' => url('/paypal/express-checkout-success?recurring=1'),
                'subscription_desc' => 'Monthly Subscription ' . config('paypal.invoice_prefix') . ' #' . $invoice_id,
                // every invoice id must be unique, else you'll get an error from paypal
                'invoice_id' => config('paypal.invoice_prefix') . '_' . $invoice_id,
                'invoice_description' => "Order #". $invoice_id ." Invoice",
                'cancel_url' => url('/'),
                // total is calculated by multiplying price with quantity of all cart items and then adding them up
                // in this case total is 20 because price is 20 and quantity is 1
                'total' => 20, // Total price of the cart
            ];
        }



        return [
            // if payment is not recurring cart can have many items
            // with name, price and quantity


            'items' => [

                [
                    'name' => $item->name,
                    'price' => $item->price,
                    'qty' => $item->qty,
                ],

            ],

            // return url is the url where PayPal returns after user confirmed the payment
            'return_url' => url('/paypal/express-checkout-success'),
            // every invoice id must be unique, else you'll get an error from paypal
            'invoice_id' => config('paypal.invoice_prefix') . '_' . $invoice_id,
            'invoice_description' => "Order #" . $invoice_id . " Invoice",
            'cancel_url' => url(),
            // total is calculated by multiplying price with quantity of all cart items and then adding them up
            // in this case total is 20 because Product 1 costs 10 (price 10 * quantity 1) and Product 2 costs 10 (price 5 * quantity 2)
            'total' => 20,
        ];
     }

public function expressCheckoutSuccess(Request $request) {

    // check if payment is recurring
    $recurring = $request->input('recurring', false) ? true : false;

    $token = $request->get('token');

    $PayerID = $request->get('PayerID');




    // initaly we paypal redirects us back with a token
    // but doesn't provice us any additional data
    // so we use getExpressCheckoutDetails($token)
    // to get the payment details
    $response = $this->provider->getExpressCheckoutDetails($token);

    // invoice id is stored in INVNUM
    // because we set our invoice to be xxxx_id
    // we need to explode the string and get the second element of array
    // witch will be the id of the invoice
    $invoice_id = explode('_', $response['INVNUM'])[1];


    // create new invoice
    $invoice = new Receipt();
    $invoice->receipt_number = $invoice_id;
    $invoice->description = $response['DESC'];
    $invoice->date = Carbon\Carbon::now()->format('d-m-Y');
    $invoice->client_name = $response['FIRSTNAME'] . ' ' . $response['LASTNAME'];
    $invoice->client_email = $response['EMAIL'];
    $invoice->method = 'PayPal';
    $invoice->subtotal = Cart::subtotal();
    $invoice->tax = Cart::tax();
    $invoice->total = $response['AMT'];
    $invoice->save();
    $items = Cart::content();


    $receiptlast = Receipt::where('receipt_number', $invoice_id)->firstOrFail();
    foreach($items as $item) {
      $receiptlast->shop_items()->attach($item->model, ['item_qty' => $item->qty]);
    }

    // if response ACK value is not SUCCESS or SUCCESSWITHWARNING
    // we return back with error
    if (!in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
        return redirect('/')->with(['code' => 'danger', 'message' => 'Error processing PayPal payment']);
    }

    // Is it Recurring
    $data = [];

    $data['items'] = [];
    //Check if the payment is Recurring
    if($recurring){
      $data['items'][] = [
        'name' => $product->name,
        'price' => $product->price,
        'qty' => $product->qty,
      ];

      $data['items'][] = [
        'name' => 'Tax',
        'price' => Cart::tax(null,null,''),
        'qty' => 1,
      ];

      $data['return_url'] = url('/paypal/express-checkout-success?recurring=1');
      $data['subscription_desc'] = 'Monthly Subscription ' . config('paypal.invoice_prefix') . ' #' . $invoice_id;
      // every invoice id must be unique, else you'll get an error from paypal
      $data['invoice_id'] = config('paypal.invoice_prefix') . '_' . $invoice_id;
      $data['invoice_description'] = "Order #". $invoice_id ." Invoice";
      $data['cancel_url'] = url(route('checkout.canceled'));

      $data['total'] = Cart::total(null,null,'');

    } else {
      foreach(Cart::content() as $product) {
        //Adds new array foreach of the items inside cart
          $data['items'][] = [
            'name' => $product->name,
            'price' => $product->price,
            'qty' => $product->qty,
          ];

      }

      $data['items'][] = [
        'name' => 'Tax',
        'price' => Cart::tax(null,null,''),
        'qty' => 1,
      ];

      $data['return_url'] = url('/paypal/express-checkout-success');
      // every invoice id must be unique, else you'll get an error from paypal
      $data['invoice_id'] = config('paypal.invoice_prefix') . '_' . $invoice_id;
      $data['invoice_description'] = "Order #". $invoice_id ." Invoice";
      $data['cancel_url'] = url(route('checkout.canceled'));

      $data['total'] = Cart::total(null,null,'');

    }


    // get cart data
    // $cart = $this->getCart($recurring, $invoice_id);

    // check if our payment is recurring
    if ($recurring === true) {

        // if recurring then we need to create the subscription
        // you can create monthly or yearly subscriptions
        $response = $this->provider->createMonthlySubscription($response['TOKEN'], $response['AMT'], $data['subscription_desc']);

        $status = 'Invalid';
        // if after creating the subscription paypal responds with activeprofile or pendingprofile
        // we are good to go and we can set the status to Processed, else status stays Invalid
        if (!empty($response['PROFILESTATUS']) && in_array($response['PROFILESTATUS'], ['ActiveProfile', 'PendingProfile'])) {
            $status = 'Processed';
        }

    } else {

        // if payment is not recurring just perform transaction on PayPal
        // and get the payment status
        $payment_status = $this->provider->doExpressCheckoutPayment($data, $token, $PayerID);
        $status = $payment_status['PAYMENTINFO_0_PAYMENTSTATUS'];

    }

    // find invoice by id
    $invoice = Receipt::where('receipt_number', $invoice_id)->firstOrFail();

    // set invoice status
    $invoice->payment_status = $status;

    // if payment is recurring lets set a recurring id for latter use
    if ($recurring === true) {
        $invoice->recurring_id = $response['PROFILEID'];
    }

    // save the invoice
    $invoice->save();


    // App\Invoice has a paid attribute that returns true or false based on payment status
    // so if paid is false return with error, else return with success message
    if ($invoice->paid) {
      //Send Receipt
      $charge = $response['AMT'];
      $email = $response['EMAIL'];
      $date = Carbon\Carbon::now()->format('d-m-Y');
      $receipt = $invoice_id;
      $name = $request['FIRSTNAME'] . $request['LASTNAME'];
      $subtotal = Cart::subtotal();
      $tax = Cart::tax();
      $total = Cart::total();
      $method = 'PayPal';
      $cardtype = NULL;
      $cardlast4 = NULL;
      $receipt_info = ReceiptInfo::find(1);

//      Mail::to($email)->send(new \App\Mail\PurchasedSuccessful(
//        $charge,
//        $email,
//        $date,
//        $receipt,
//        $name,
//        $items,
//        $subtotal,
//        $tax,
//        $total,
//        $method,
//        $cardtype,
//        $cardlast4,
//        $receipt_info
//      ));

      //Destroy Cart
      Cart::destroy();
      //Redirect
        return redirect(route('checkout.success', $invoice_id))->with(['code' => 'success', 'message' => 'Order ' . $invoice->id . ' has been paid successfully!']);
    }

    return redirect(route('checkout.error'))->with(['code' => 'danger', 'message' => 'Error processing PayPal payment for Order ' . $invoice->id . '!']);
}

public function notify(Request $request){

    // add _notify-validate cmd to request,
    // we need that to validate with PayPal that it was really
    // PayPal who sent the request
    $request->merge(['cmd' => '_notify-validate']);
    $post = $request->all();

    // send the data to PayPal for validation
    $response = (string) $this->provider->verifyIPN($post);

    //if PayPal responds with VERIFIED we are good to go
    if ($response === 'VERIFIED') {

        /*
            This is the part of the code where you can process recurring payments as you like
            in this case we will be checking for recurring_payment that was completed
            if we find that data we create new invoice
        */
        if ($post['txn_type'] == 'recurring_payment' && $post['payment_status'] == 'Completed') {
            $invoice = new Invoice();
            $invoice->title = 'Recurring payment';
            $invoice->price = $post['amount'];
            $invoice->payment_status = 'Completed';
            $invoice->recurring_id = $post['recurring_payment_id'];
            $invoice->save();
        }

        // I leave this code here so you can log IPN data if you want
        // PayPal provides a lot of IPN data that you should save in real world scenarios
        /*
            $logFile = 'ipn_log_'.Carbon::now()->format('Ymd_His').'.txt';
            Storage::disk('local')->put($logFile, print_r($post, true));
        */

    }

}

  }
