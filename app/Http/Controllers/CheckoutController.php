<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use DB;

use App\Shop\ShopItem;
use Carbon;
use Cart;
use Stripe;
use Mail;
use App\Shop\ShopSection;
use App\Order;
use App\Font;
use App\FontStyle;
use App\FooterLink;
use App\Style;
use App\MenuItem;
use App\ContenidoSectionFooter;
use App\ReceiptInfo;
use App\Receipt;

class CheckoutController extends Controller
{
    public function index() {
      return view('shop.checkout')
      ->with('orders', Order::all())
      ->with('menu_item', MenuItem::all())
      ->with('styles', Style::all())
      ->with('fonts', Font::all())
      ->with('font_styles', FontStyle::all())
      ->with('contenidosectionfooters', ContenidoSectionFooter::all())
      ->with('footer_links', FooterLink::all())
      ->with('shop_items', ShopItem::all());
    }

    public function pay(Request $request) {
      $validator = Validator::make($request->all(), [
        'name' => 'required|string',
        'email' => 'required|email'
      ]);

      if ($validator->fails()) {
        session()->flash('error', $validator->messages()->first());
        return redirect()->back()->withInput();
       }

       else {
         $name = $request->input('name');
         $email = $request->input('email');

         $price = Cart::total(null,null,'');
         $pri = intval($price);
         $date = Carbon\Carbon::now()->format('d-m-Y');


         $receipt = Receipt::count() + 1;


         $items = Cart::content();

         $subtotal = Cart::subtotal();
         $tax = Cart::tax();
         $total = Cart::total();
         $receipt_info = ReceiptInfo::find(1);



         \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
          $charge = Stripe\Charge::create ([
                  "amount" => $price * 100,
                  "currency" => "usd",
                  "source" => $request->stripeToken,
                  "description" => "Compra en Parallel Shop",
                  "receipt_email" => $email
          ]);

          $method = $charge->payment_method_details->type;
          $cardtype = $charge->payment_method_details->card->brand;
          $cardlast4 = $charge->payment_method_details->card->last4;



          if($charge->status == "succeeded") {
            Mail::to($email)->send(new \App\Mail\PurchasedSuccessful(
              $charge,
              $email,
              $date,
              $receipt,
              $name,
              $items,
              $subtotal,
              $tax,
              $total,
              $method,
              $cardtype,
              $cardlast4,
              $receipt_info
            ));

            $data = array(
              'receipt_number' => $receipt,
              'date' => $date,
              'client_name' => $name,
              'client_email' => $email,
              'method' => $method,
              'card_type' => $cardtype,
              'card_last4' => $cardlast4,
              'subtotal' => $subtotal,
              'tax' => $tax,
              'total' => $total
            );

            DB::table('receipts')->insert($data);
            $receiptlast = Receipt::find($receipt);


            foreach($items as $item) {
              $receiptlast->shop_items()->attach($item->model, ['item_qty' => $item->qty]);
            }
            Cart::destroy();
            session()->flash('success', 'Compra Exitosa');
            return redirect()->route('checkout.success', $receipt);

          } else {
            session()->flash('error', 'Metodo de pago no aceptado');
            return redirect()->route('checkout.error');
          }

       }



    }

    public function success($invoice_id) {
      return view('shop.success')
      ->with('orders', Order::all())
      ->with('menu_item', MenuItem::all())
      ->with('styles', Style::all())
      ->with('fonts', Font::all())
      ->with('font_styles', FontStyle::all())
      ->with('contenidosectionfooters', ContenidoSectionFooter::all())
      ->with('footer_links', FooterLink::all())
      ->with('shop_items', ShopItem::all())
      ->with('receipt', Receipt::where('receipt_number', $invoice_id)->firstOrFail());
    }

    public function canceled() {
      return view('shop.canceled')
      ->with('orders', Order::all())
      ->with('menu_item', MenuItem::all())
      ->with('styles', Style::all())
      ->with('fonts', Font::all())
      ->with('font_styles', FontStyle::all())
      ->with('contenidosectionfooters', ContenidoSectionFooter::all())
      ->with('footer_links', FooterLink::all());
    }

    public function error() {
      return view('shop.error')
      ->with('orders', Order::all())
      ->with('menu_item', MenuItem::all())
      ->with('styles', Style::all())
      ->with('fonts', Font::all())
      ->with('font_styles', FontStyle::all())
      ->with('contenidosectionfooters', ContenidoSectionFooter::all())
      ->with('footer_links', FooterLink::all());
    }
}
