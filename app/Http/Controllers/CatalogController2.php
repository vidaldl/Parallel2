<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catalog2\CatalogSection2;
use App\Catalog2\CatalogItem2;
use App\Order;
use DB;
use Illuminate\Support\Facades\Storage;

class CatalogController2 extends Controller
{
    public function __construct()
      {
          $this->middleware('auth', ['except' => ['show']]);
      }




    public function sectionUpdate(Request $request, $id) {
      if ($request->has('val')) {
        $style = $request->input('val');
        $data = array('style'=>$style);
        DB::table('catalog_section2s')->where('id', $id)->update($data);
      }
      elseif ($request->has('val1')) {
        $img_orientation = $request->input('val1');
        $data = array('img_orientation'=>$img_orientation);
        DB::table('catalog_section2s')->where('id', $id)->update($data);
      }
      else{
      $title = $request->input('title');
      $button_primary = $request->input('button_primary');
      $button_secondary = $request->input('button_secondary');
      $button_text_color = $request->input('button_text_color');
      $title_link = $request->input('title_link');
      $rows = $request->input('rows');

      $data = array(
        'title' => $title,
        'button_primary'=>$button_primary,
        'button_secondary'=>$button_secondary,
        'button_text_color'=>$button_text_color,
        'title_link'=>$title_link,
        'rows'=>$rows
        );

      DB::table('catalog_section2s')->where('id', $id)->update($data);
      session()->flash('success', 'La sección fué actualizada');
      return redirect()->back();
      }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('catalog2.index')
      ->with('catalog_item2s', CatalogItem2::all())
      ->with('catalog_section2s', CatalogSection2::all())
      ->with('orders', Order::orderBy('order')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('catalog2.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $title = $request->input('title');

      $data = array('title'=>$title);

      DB::table('catalog_item2s')->insert($data);

      $latest = DB::getPdo('catalog_item2s')->lastInsertId();
      return redirect('catalog2/' . $latest . '/edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      return view('catalog2.create')
      ->with('catalog_section2s', CatalogSection2::all())
      ->with('catalog_item2s', CatalogItem2::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      if ($request->hasFile('image')) {
      $this->validate($request, [
          'image' => 'image|required|mimes:png,jpg,jpeg,svg'
       ]);
       //delete old
       $latest = DB::table('catalog_item2s')->where('id', $id)->first();
       Storage::delete($latest->img_primaria);


      //upload it
      $image = $request->file('image')->store('content/catalog');

      $data =array('img_primaria' => $image);
      DB::table('catalog_item2s')->where('id', $id)->update($data);



    }elseif ($request->hasFile('image2')) {
        $this->validate($request, [
            'image2' => 'image|required|mimes:png,jpg,jpeg,svg'
         ]);
         //delete old
         $latest = DB::table('catalog_item2s')->where('id', $id)->first();
         Storage::delete($latest->img_secundaria);

        //upload it
        $image = $request->file('image2')->store('content/catalog');

        $data =array('img_secundaria' => $image);
        DB::table('catalog_item2s')->where('id', $id)->update($data);


      }elseif($request->has('val')) {
          $destacado = $request->input('val');

          $data = array('destacado' => $destacado);
          DB::table('catalog_item2s')->where('id', $id)->update($data);

      }else {
        $title = $request->input('title');
        $img_btn = $request->input('img_btn');
        $img_icon = $request->input('img_icon');
        $precio = $request->input('precio');
        $destacado_title = $request->input('destacado_title');
        $precio_nuevo = $request->input('precio_nuevo');
        $button = $request->input('button');
        $button_link = $request->input('button_link');
        $button_icon = $request->input('button_icon');
        $link_code = $request->input('link_code');

        $data = array(
          'title' => $title,
          'img_btn' => $img_btn,
          'img_icon' => $img_icon,
          'precio' => $precio,
          'destacado_title' => $destacado_title,
          'precio_nuevo' => $precio_nuevo,
          'button' => $button,
          'button_link' => $button_link,
          'button_icon' => $button_icon,
          'link_code' => $link_code
        );

        DB::table('catalog_item2s')->where('id', $id)->update($data);

        session()->flash('success', 'La sección fué actualizada');
        return redirect()->back();
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroySecImg($id) {
      $latest = DB::table('catalog_item2s')->where('id', $id)->first();
      $img_secundaria = '';

      $data = array('img_secundaria'=>$img_secundaria);

      DB::table('catalog_item2s')->where('id', $id)->update('data');
      Storage::delete($latest->img_secundaria);
    }



    public function destroy($id)
    {
      $catalog_item2s = CatalogItem2::withTrashed()->where('id', $id)->firstOrFail();

      if ($catalog_item2s->trashed()) {
        $catalog_item2s->deleteImage();
        $catalog_item2s->deleteSecImage();
        $catalog_item2s->forceDelete();
        session()->flash('success', 'Artículo eliminado permanentemente');
        return redirect(route('trashed-catalog2.index'));
      }else {
        $catalog_item2s->delete();
        session()->flash('success', 'Artículo enviado a la papelera');
        return redirect(route('catalog2.index'));
      }
    }

    public function trashed() {
      $trashed = CatalogItem2::onlyTrashed()->get();
      return view('catalog2.index')->with('catalog_item2s', $trashed);
    }

    public function restore($id) {
      $catalog_item2s = CatalogItem2::withTrashed()->where('id', $id)->firstOrFail();
      $catalog_item2s->restore();
      session()->flash('success', 'El Artículo Fue Restaurado');
      return redirect()->back();
    }
}
