<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
use App\Modal;
use App\Order;
use App\Font;
use App\FontStyle;

class ModalController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
    }

  public function edit() {
    return view('modal.index')
    ->with('orders', Order::all())
    ->with('font_styles', FontStyle::all())
    ->with('fonts', Font::all())
    ->with('modal', Modal::all());
  }

  public function update(Request $request, $id) {
    if ($request->hasFile('image')) {
      $this->validate($request, [
        'image' => 'image|required|mimes:png,jpg,svg'
     ]);
    $imageOld = DB::table('modals')->where('id', $id)->first();

    //upload it
    $image = $request->file('image')->store('content/modal');
    Storage::delete($imageOld->image);
    $data=array('image'=>$image);
    DB::table('modals')->where('id', $id)->update($data);
    }
    elseif ($request->has('content_style') || $request->has('width')) {
      $content_style = $request->input('content_style');
      $width = $request->input('width');

      $data = array(
      'content_style'=>$content_style,
      'width'=>$width
    );
      DB::table('modals')->where('id', $id)->update($data);
      // flash message
      session()->flash('success', 'La sección ha sido actualizada!');
      return redirect()->back();
    }

    else {
      $contenido = $request->input('contenido');
      $button = $request->input('button');
      $button_sub = $request->input('button_sub');
      $color = $request->input('color');
      $button_color_sec = $request->input('button_color_sec');
      $link = $request->input('link');
      $back_color = $request->input('back_color');


      $data = array(
        'contenido' => $contenido,
        'button' => $button,
        'button_sub' => $button_sub,
        'color' => $color,
        'button_color_sec' => $button_color_sec,
        'link' => $link,
        'back_color' => $back_color,
      );

      DB::table('modals')->where('id', $id)->update($data);
      // flash message
      session()->flash('success', 'La sección ha sido actualizada!');
      return redirect()->back();
    }

  }

  public function deleteImg(Request $request, $id) {
    $image = Modal::find($id);
    Storage::delete($image->image);
    $data = array('image' => NULL);
    DB::table('modals')->update($data);
    session()->flash('warning', 'La Imagen ha sido eliminada!');
    return redirect()->back();
  }
}
