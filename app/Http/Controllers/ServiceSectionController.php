<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests\Service2\UpdateServicios;
use App\Http\Requests\Service2\CreateServiciosRequest;
use App\Service2;

use App\ServiceSection2;
use App\Order;

class ServiceSectionController extends Controller
{
  public function service2Edit($id) {
    return view('service2.sectionIndex')
    ->with('orders', Order::orderBy('order')->get())
    ->with('contenidosection2s', ServiceSection2::all());
  }

  public function service2Update(Request $request, $id) {
      if ($request->has('val')) {
        $desc_link = $request->input('val');

        $data = array('desc_link' => $desc_link);
        DB::table('service_section2s')->where('id', $id)->update($data);
      }
      elseif($request->has('val1')) {
        $icon_style = $request->input('val1');

        $data = array('icon_style' => $icon_style);
        DB::table('service_section2s')->where('id', $id)->update($data);
      }
      else {
        $title = $request->input('title');
        $back_color = $request->input('back_color');

        $data=array("title"=>$title, "back_color"=>$back_color);
        DB::table('service_section2s')->update($data);
        session()->flash('success', 'La sección fue actualizada');
        //redirect
        return redirect()->back();
      }
  }
}
