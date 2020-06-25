<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop\ShopSection;
use App\Shop\ShopItem;
use App\Order;
use App\Font;
use App\FontStyle;
use App\FooterLink;
use App\Style;
use App\MenuItem;
use App\ContenidoSectionFooter;
use App\ReceiptInfo;
use DB;
use Illuminate\Support\Facades\Storage;
class ShopController extends Controller
{
  public function __construct()
      {
          $this->middleware('auth', ['except' => ['show']]);
      }

      public function sectionUpdate(Request $request, $id) {
      if ($request->has('val')) {
        $style = $request->input('val');
        $data = array('style'=>$style);
        DB::table('shop_sections')->where('id', $id)->update($data);
      }
      elseif ($request->has('val1')) {
        $img_orientation = $request->input('val1');
        $data = array('img_orientation'=>$img_orientation);
        DB::table('shop_sections')->where('id', $id)->update($data);
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

      DB::table('shop_sections')->where('id', $id)->update($data);
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
      return view('shop.index')
      ->with('shop_items', ShopItem::all())
      ->with('shop_sections', ShopSection::all())
      ->with('orders', Order::orderBy('order')->get())
      ->with('receipt_info', ReceiptInfo::find(1));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('shop.create')
      ->with('fonts', Font::all())
      ->with('font_styles', FontStyle::all());
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

      DB::table('shop_items')->insert($data);

      $latest = DB::getPdo('shop_items')->lastInsertId();
      return redirect('shop/' . $latest . '/edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      return view('shop.show')
      ->with('orders', Order::all())
      ->with('menu_item', MenuItem::all())
      ->with('styles', Style::all())
      ->with('fonts', Font::all())
      ->with('font_styles', FontStyle::all())
      ->with('contenidosectionfooters', ContenidoSectionFooter::all())
      ->with('footer_links', FooterLink::all())
      ->with('shop_items', ShopItem::all())
      ->with('shop_item', ShopItem::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      return view('shop.create')
      ->with('shop_sections', ShopSection::all())
      ->with('shop_items', ShopItem::find($id))
      ->with('fonts', Font::all())
      ->with('font_styles', FontStyle::all());
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
       $latest = DB::table('shop_items')->where('id', $id)->first();
       Storage::delete($latest->img_primaria);


      //upload it
      $image = $request->file('image')->store('content/shop');

      $data =array('img_primaria' => $image);
      DB::table('shop_items')->where('id', $id)->update($data);



    }elseif ($request->hasFile('image2')) {
        $this->validate($request, [
            'image2' => 'image|required|mimes:png,jpg,jpeg,svg'
         ]);
         //delete old
         $latest = DB::table('shop_items')->where('id', $id)->first();
         Storage::delete($latest->img_secundaria);

        //upload it
        $image = $request->file('image2')->store('content/shop');

        $data =array('img_secundaria' => $image);
        DB::table('shop_items')->where('id', $id)->update($data);


      }elseif($request->has('val')) {
          $destacado = $request->input('val');

          $data = array('destacado' => $destacado);
          DB::table('shop_items')->where('id', $id)->update($data);

      }else {
        $title = $request->input('title');
        $img_btn = $request->input('img_btn');
        $img_icon = $request->input('img_icon');
        $precio = $request->input('precio');
        $weight = $request->input('weight');
        $unit = $request->input('unit');
        $destacado_title = $request->input('destacado_title');
        $precio_nuevo = $request->input('precio_nuevo');
        $button = $request->input('button');
        $button_link = $request->input('button_link');
        $button_icon = $request->input('button_icon');
        $link_code = $request->input('link_code');
        $details = $request->input('details');
        $description = $request->input('description');

        $data = array(
          'title' => $title,
          'img_btn' => $img_btn,
          'img_icon' => $img_icon,
          'precio' => $precio,
          'weight' => $weight,
          'unit' => $unit,
          'destacado_title' => $destacado_title,
          'precio_nuevo' => $precio_nuevo,
          'button' => $button,
          'button_link' => $button_link,
          'button_icon' => $button_icon,
          'link_code' => $link_code,
          'details' => $details,
          'description' => $description
        );

        DB::table('shop_items')->where('id', $id)->update($data);

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
      $latest = DB::table('shop_items')->where('id', $id)->first();
      $img_secundaria = '';

      $data = array('img_secundaria'=>$img_secundaria);

      DB::table('shop_items')->where('id', $id)->update('data');
      Storage::delete($latest->img_secundaria);
    }



    public function destroy($id)
    {
      $shop_items = ShopItem::withTrashed()->where('id', $id)->firstOrFail();

      if ($shop_items->trashed()) {
        $shop_items->deleteImage();
        $shop_items->deleteSecImage();
        $shop_items->forceDelete();
        session()->flash('success', 'Artículo eliminado permanentemente');
        return redirect(route('trashed-shop.index'));
      }else {
        $shop_items->delete();
        session()->flash('success', 'Artículo enviado a la papelera');
        return redirect(route('shop.index'));
      }
    }

    public function trashed() {
      $trashed = ShopItem::onlyTrashed()->get();
      return view('shop.index')->with('shop_items', $trashed);
    }

    public function restore($id) {
      $shop_items = ShopItem::withTrashed()->where('id', $id)->firstOrFail();
      $shop_items->restore();
      session()->flash('success', 'El Artículo Fue Restaurado');
      return redirect()->back();
    }
}
