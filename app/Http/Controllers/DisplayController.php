<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DisplayController extends Controller
{
  public function portfolioprogramsDisplay(Request $request) {
    $display = $request->input('val');
    $data = array('display'=>$display);
    DB::table('orders')->where('section', 'portfolio-programs')->update($data);
    session()->flash('success', 'La sección fué actualizada');
    return redirect()->back();
  }

  public function pricingDisplay(Request $request) {
    $display = $request->input('val');
    $data = array('display'=>$display);
    DB::table('orders')->where('section', 'pricing')->update($data);
    session()->flash('success', 'La sección fué actualizada');
    return redirect()->back();
  }

  public function fraseDisplay(Request $request) {
    $display = $request->input('val');
    $data = array('display'=>$display);
    DB::table('orders')->where('section', 'frase')->update($data);
    session()->flash('success', 'La sección fué actualizada');
    return redirect()->back();
  }

  public function serviciosDisplay(Request $request) {
    $display = $request->input('val');
    $data = array('display'=>$display);
    DB::table('orders')->where('section', 'servicios')->update($data);
    session()->flash('success', 'La sección fué actualizada');
    return redirect()->back();
  }

  public function linksDisplay(Request $request) {
    $display = $request->input('val');
    $data = array('display'=>$display);
    DB::table('orders')->where('section', 'links')->update($data);
    session()->flash('success', 'La sección fué actualizada');
    return redirect()->back();
  }

  public function infoslider1Display(Request $request) {
    $display = $request->input('val');
    $data = array('display'=>$display);
    DB::table('orders')->where('section', 'infoslider1')->update($data);
    session()->flash('success', 'La sección fué actualizada');
    return redirect()->back();
  }

  public function infoslider2Display(Request $request) {
    $display = $request->input('val');
    $data = array('display'=>$display);
    DB::table('orders')->where('section', 'infoslider2')->update($data);
    session()->flash('success', 'La sección fué actualizada');
    return redirect()->back();
  }

  public function infoslider3Display(Request $request) {
    $display = $request->input('val');
    $data = array('display'=>$display);
    DB::table('orders')->where('section', 'infoslider3')->update($data);
    session()->flash('success', 'La sección fué actualizada');
    return redirect()->back();
  }

  public function infoDisplay(Request $request) {
    $display = $request->input('val');
    $data = array('display'=>$display);
    DB::table('orders')->where('section', 'info')->update($data);
    session()->flash('success', 'La sección fué actualizada');
    return redirect()->back();
  }

  public function articulosDisplay(Request $request) {
    $display = $request->input('val');
    $data = array('display'=>$display);
    DB::table('orders')->where('section', 'articulos')->update($data);
    session()->flash('success', 'La sección fué actualizada');
    return redirect()->back();
  }

  public function contactDisplay(Request $request) {
    $display = $request->input('val');
    $data = array('display'=>$display);
    DB::table('orders')->where('section', 'contact')->update($data);
    session()->flash('success', 'La sección fué actualizada');
    return redirect()->back();
  }

  public function portfoliogalleryDisplay(Request $request) {
    $display = $request->input('val');
    $data = array('display'=>$display);
    DB::table('orders')->where('section', 'portfolio-gallery')->update($data);
    session()->flash('success', 'La sección fué actualizada');
    return redirect()->back();
  }

  public function catalogDisplay(Request $request) {
    $display = $request->input('val');
    $data = array('display'=>$display);
    DB::table('orders')->where('section', 'catalog')->update($data);
    session()->flash('success', 'La sección fué actualizada');
    return redirect()->back();
  }

  public function catalog2Display(Request $request) {
    $display = $request->input('val');
    $data = array('display'=>$display);
    DB::table('orders')->where('section', 'catalog2')->update($data);
    session()->flash('success', 'La sección fué actualizada');
    return redirect()->back();
  }

  public function catalog3Display(Request $request) {
    $display = $request->input('val');
    $data = array('display'=>$display);
    DB::table('orders')->where('section', 'catalog3')->update($data);
    session()->flash('success', 'La sección fué actualizada');
    return redirect()->back();
  }

  public function shopDisplay(Request $request) {
    $display = $request->input('val');
    $data = array('display'=>$display);
    DB::table('orders')->where('section', 'shop')->update($data);
    session()->flash('success', 'La sección fué actualizada');
    return redirect()->back();
  }

  public function modalDisplay(Request $request) {
    $display = $request->input('val');
    $data = array('display'=>$display);
    DB::table('orders')->where('section', 'modal')->update($data);
    session()->flash('success', 'La sección fué actualizada');
    return redirect()->back();
  }

  public function textDisplay(Request $request) {
    $display = $request->input('val');
    $data = array('display'=>$display);
    DB::table('orders')->where('section', 'text')->update($data);
    session()->flash('success', 'La sección fué actualizada');
    return redirect()->back();
  }

  public function text2Display(Request $request) {
    $display = $request->input('val');
    $data = array('display'=>$display);
    DB::table('orders')->where('section', 'text2')->update($data);
    session()->flash('success', 'La sección fué actualizada');
    return redirect()->back();
  }

  public function text3Display(Request $request) {
    $display = $request->input('val');
    $data = array('display'=>$display);
    DB::table('orders')->where('section', 'text3')->update($data);
    session()->flash('success', 'La sección fué actualizada');
    return redirect()->back();
  }

  public function text4Display(Request $request) {
    $display = $request->input('val');
    $data = array('display'=>$display);
    DB::table('orders')->where('section', 'text4')->update($data);
    session()->flash('success', 'La sección fué actualizada');
    return redirect()->back();
  }

  public function servicios2Display(Request $request) {
    $display = $request->input('val');
    $data = array('display'=>$display);
    DB::table('orders')->where('section', 'service2')->update($data);
    session()->flash('success', 'La sección fué actualizada');
    return redirect()->back();
  }
}
