<?php

namespace App\Http\Controllers;

use App\Pricing;
use App\PricingItem;
use App\PricingSection;
use App\Order;
use DB;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class PricingController extends Controller
{

  public function __construct()
    {
        $this->middleware('auth');
    }

    public function pricingDisplay(Request $request, $id) {
      $display = $request->input('pricing');
      $data=array("display"=>$display);
      DB::table('orders')->where('section', 'pricing')->update($data);
      session()->flash('success', 'La sección fue actualizada');
      //redirect
      return redirect()->back();
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('updateIndex/pricing')
      ->with('pricing_sections', PricingSection::all())
      ->with('pricings', Pricing::all())
      ->with('orders', Order::orderBy('order')->get());
    }

    public function sectionUpdate(Request $request, $id) {
      $title = $request->input('title');
      $subtitle = $request->input('subtitle');

      $data = array('title'=>$title, 'subtitle'=>$subtitle);
      DB::table('pricing_sections')->where('id', $id)->update($data);

      session()->flash('success', 'La imagen ha sido actualizada');
      return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
      $recurrence = $request->input('recurrence');
      $price = $request->input('price');
      $button = $request->input('button');
      $link = $request->input('link');
      $back_color = $request->input('back_color');


      if ($request->hasFile('image')) {
        $this->validate($request, [
            'image' => 'image|required|mimes:png,svg'
         ]);
        $imageOld = DB::table('pricings')->where('id', $id)->first();

        //upload it
        $image = $request->file('image')->store('content/pricing');
        Storage::delete($imageOld->image);
        $data=array('image'=>$image);
        DB::table('pricings')->insert($data);

        // session()->flash('success', 'La sección fue actualizada con la imagen');
        // return redirect()->back();

      } else {
        $data=array('title'=>$title,
        'recurrence'=>$recurrence,
        'price'=>$price,
        'button'=>$button,
        'link'=>$link,
        'back_color'=>$back_color);
        DB::table('pricings')->insert($data);

        session()->flash('success', 'La imagen ha sido actualizada');
        //redirect
        return redirect()->back();
      }
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pricingUpdate(Request $request, $id)
    {
      $list = $request->input('list');
      $price = Pricing::find($id);

      if ($request->hasFile('image')) {
        $this->validate($request, [
            'image' => 'image|required|mimes:png,svg'
         ]);
        $imageOld = DB::table('pricings')->where('id', $id)->first();

        //upload it
        $image = $request->file('image')->store('content/pricing');
        Storage::delete($imageOld->image);
        $data=array('image'=>$image);
        DB::table('pricings')->where('id', $id)->update($data);

        // session()->flash('success', 'La sección fue actualizada con la imagen');
        // return redirect()->back();

      }
      elseif($request->has('items')) {
        $items = $request->input('items');

        $data= array('item'=>$items);

        DB::table('pricing_items')->where('id', $id)->update($data);

        session()->flash('success', 'La Tabla ha sido actualizada');
        //redirect
        return redirect()->back();

      }


      else {
        $title = $request->input('title');
        $recurrence = $request->input('recurrence');
        $price = $request->input('price');
        $button = $request->input('button');
        $link = $request->input('link');
        $back_color = $request->input('back_color');
        $data=array('title'=>$title,
        'recurrence'=>$recurrence,
        'price'=>$price,
        'button'=>$button,
        'link'=>$link,
        'back_color'=>$back_color);
        DB::table('pricings')->where('id', $id)->update($data);

        session()->flash('success', 'La Tabla ha sido actualizada');
        //redirect
        return redirect()->back();
      }
    }

    public function pricingItemsCreate(Request $request, $id) {
      $this->validate($request, [
          'item' => 'required|max:55'
       ]);
      $price = Pricing::find($id);

      $item = $request->input('item');
      $data = array('item' => $item);
      DB::table('pricing_items')->insert($data);
      $latest = DB::getPdo('pricing_items')->lastInsertId();
      $price->pricing_item()->attach($latest);
      session()->flash('success', 'La Tabla ha sido actualizada');
      //redirect
      return redirect()->back();
    }

    public function pricingItemDestroy(Request $request, $id) {
      $idDel = $request->input('idDel');

      $price = Pricing::find($id);

      DB::table('pricing_items')->where('id', $idDel)->delete();
      $price->pricing_item()->detach($id);
      session()->flash('success', 'La Tabla ha sido actualizada');
      //redirect
      return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      DB::table('pricings')->where('id', $id)->delete();
      session()->flash('success', 'Tabla Eliminada');
      return redirect(route('pricing.index'));
    }
}
