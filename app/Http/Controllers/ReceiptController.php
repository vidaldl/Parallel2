<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;

class ReceiptController extends Controller
{
    public function __construct()  {
          $this->middleware('auth');
      }

    public function receiptInfoUpdate(Request $request) {
      if ($request->hasFile('image')) {
      $this->validate($request, [
          'image' => 'image|required|mimes:png,jpg,jpeg,svg'
       ]);
       //delete old
       $latest = DB::table('receipt_infos')->where('id', 1)->first();
       Storage::delete($latest->image);


      //upload it
      $image = $request->file('image')->store('content/shop/receipt');

      $data =array('image' => $image);
      DB::table('receipt_infos')->where('id', 1)->update($data);

    }
    else {
      $company_name = $request->input('company_name');
      $address_line_1 = $request->input('address_line_1');
      $address_line_2 = $request->input('address_line_2');

      $data = array(
        'company_name' => $company_name,
        'address_line_1' => $address_line_1,
        'address_line_2' => $address_line_2
      );

      DB::table('receipt_infos')->where('id', 1)->update($data);

      session()->flash('success', 'La Información de la factura fue actualizada');
      return redirect()->back();
    }

    }


}
