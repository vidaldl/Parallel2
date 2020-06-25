<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Properties\City;

class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('properties.cities.index')->with('cities', City::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('properties.cities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $name = $request->input('name');

      $data=array("name"=>$name);
      DB::table('cities')->insert($data);

      // flash message
      session()->flash('success', 'El Sector ha Sido Agregado!');
      //redirect user
      return redirect(route('cities.index'));
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
    public function edit(City $city)
    {
        return view('properties.cities.create')->with('city', $city);
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
      $name = $request->input('name');

      $data=array("name"=>$name);
      DB::table('cities')->where('id', $id)->update($data);

      // flash message
      session()->flash('success', 'El Sector ha Sido Editado!');
      //redirect user
      return redirect(route('cities.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $city = City::withTrashed()->where('id', $id)->firstOrFail();

      if ($city->trashed()) {
        $city->forceDelete();
        session()->flash('success', 'Sector eliminado permanentemente');
        return redirect(route('trashed-cities.index'));
      }else {
        $city->delete();
        session()->flash('success', 'Sector enviado a la papelera');
        return redirect(route('cities.index'));
      }
    }

    public function trashed() {
      $trashed = City::onlyTrashed()->get();
      return view('properties.cities.index')->with('cities', $trashed);
    }

    public function restore($id) {
      $city = City::withTrashed()->where('id', $id)->firstOrFail();
      $city->restore();
      session()->flash('success', 'El Sector ha Sido Restaurada');
      return redirect()->route('cities.index');
    }
}
