<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PDF;

use App\ReceiptInfo;
use App\Receipt;

class PShopController extends Controller
{

  public function __construct()
    {
        $this->middleware('auth');
    }


   public function index() {
     return view('pshop.index')
     ->with('receipts', Receipt::all())
     ->with('receipt_info', ReceiptInfo::find(1));
   }


   public function viewReceipt($id) {
     return view('pshop.receipts.view')
     ->with('receipt_info', ReceiptInfo::find(1))
     ->with('receipt', Receipt::find($id));
   }

   public function PDFreceipt(Request $request, $id) {
     $receipt = Receipt::find($id);
     $receipt_info = ReceiptInfo::find(1);
     $pdf = \PDF::loadView('pshop.receipts.view', compact('receipt', 'receipt_info'));

     // return $pdf->download('factura.pdf');

     return $pdf->stream('factura.pdf', array("Attachment" => false));

   }
}
