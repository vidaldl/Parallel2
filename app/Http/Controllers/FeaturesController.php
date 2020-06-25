<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Properties\Feature;
use DB;

class FeaturesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('properties.features.index')->with('features', Feature::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('properties.features.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $feature_name = $request->input('feature_name');

      $data=array("feature_name"=>$feature_name);
      DB::table('features')->insert($data);

      // flash message
      session()->flash('success', 'El Dato ha Sido Agregado!');
      //redirect user
      return redirect(route('features.index'));
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
    public function edit(Feature $feature)
    {
      return view('properties.features.create')->with('feature', $feature);
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
      $feature_name = $request->input('feature_name');

      $data=array("feature_name"=>$feature_name);
      DB::table('features')->where('id', $id)->update($data);

      // flash message
      session()->flash('success', 'El Dato ha Sido Actualizado!');
      //redirect user
      return redirect(route('features.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $feature = Feature::withTrashed()->where('id', $id)->firstOrFail();

      if ($feature->trashed()) {
        $feature->forceDelete();
        session()->flash('success', 'Dato eliminado permanentemente');
        return redirect(route('trashed-features.index'));
      }else {
        $feature->delete();
        session()->flash('success', 'Sector enviado a la papelera');
        return redirect(route('features.index'));
      }
    }

    public function trashed() {
    $trashed = Feature::onlyTrashed()->get();
    return view('properties.features.index')->with('features', $trashed);
    }

    public function restore($id) {
      $feature = Feature::withTrashed()->where('id', $id)->firstOrFail();
      $feature->restore();
      session()->flash('success', 'El Dato ha Sido Restaurada');
      return redirect()->route('features.index');
    }


}
