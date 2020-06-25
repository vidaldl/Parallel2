<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Text2;
use App\Order;
use App\Font;
use App\FontStyle;

class Text2Controller extends Controller
{
  public function index() {
    return view('text2.index')
    ->with('orders', Order::all())
    ->with('font_styles', FontStyle::all())
    ->with('fonts', Font::all())
    ->with('text', Text2::find(1)->firstOrFail());
  }

  public function update(Request $request) {
    $text = $request->input('text');
    $back_color = $request->input('back_color');

    $data = array('text' => $text, 'back_color' => $back_color);
    DB::table('text2s')->where('id', 1)->update($data);

    session()->flash('success', 'La sección ha sido actualizada!');
    return redirect()->back();
  }
}
