<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class OrderController extends Controller
{

  public function __construct()
    {
        $this->middleware('auth');
    }

  public function order(Request $request) {
    $order = DB::table('orders')->orderBy('order')->get();
    $itemID = $request->input('itemID');
    $itemIndex = $request->input('itemIndex');

    foreach ($order as $item) {
      $data=array('order'=>$itemIndex);
      return DB::table('orders')->where('id', '=', $itemID)->update($data);
    }

  }
}
