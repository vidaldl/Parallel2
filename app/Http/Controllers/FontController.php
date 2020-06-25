<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\FontStyle;

class FontController extends Controller
{
  public function store(Request $request) {
    $name = $request->input('name');
    $link = $request->input('link');

    $data = array(
      'name'=>$name,
      'link'=>$link
    );
    DB::table('font_styles')->insert($data);

    session()->flash('success', 'La Fuente fué Agregada');
    return redirect()->back();
  }

  public function delete($id) {
    DB::table('font_styles')->where('id', $id)->delete();
    session()->flash('error', 'La Fuente fué Eliminada');
    return redirect()->back();
  }

  public function fontStyleUpdate(Request $request) {
    if ($request->has('titles')) {
      $element = 'titles';
      $titles = $request->input($element);
      $font = FontStyle::find($titles);

      $font_link = $font->link;
      $font_name = $font->name;

      $data = array(
        'element'=>$element,
        'font_link'=>$font_link,
        'font_name'=>$font_name
      );

      DB::table('fonts')->where('element', $element)->update($data);
      session()->flash('success', 'Los Titulos usarán la Fuente: ' . $font_name);
      return redirect()->back();
    }

    elseif ($request->has('body')) {
      $element = 'body';
      $body = $request->input($element);
      $font = FontStyle::find($body);

      $font_link = $font->link;
      $font_name = $font->name;

      $data = array(
        'element'=>$element,
        'font_link'=>$font_link,
        'font_name'=>$font_name
      );

      DB::table('fonts')->where('element', $element)->update($data);
      session()->flash('success', 'Los Titulos usarán la Fuente: ' . $font_name);
      return redirect()->back();
    }
  }
}
