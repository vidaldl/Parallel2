<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests\Service2\UpdateServicios;
use App\Http\Requests\Service2\CreateServiciosRequest;
use App\Service2;
use App\ServiceSection2;

class ServiceController extends Controller
{
      /**
       * Display a listing of the resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function index()
      {
        return view('service2.index')
        ->with('servicios', Service2::all())
        ->with('contenido_section2s', ServiceSection2::all());
      }

      /**
       * Show the form for creating a new resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function create()
      {
          return view('service2.create')->with('section2', ServiceSection2::all());
      }

      /**
       * Store a newly created resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @return \Illuminate\Http\Response
       */
      public function store(Request $request)
      {
        $icon = $request->input('icon');
        $title = $request->input('title');
        $contenido = $request->input('contenido');
        $contenido_modal = $request->input('contenido_modal');

        $data = array('icon'=>$icon, 'title'=>$title, 'contenido'=>$contenido,  'contenido_modal'=>$contenido_modal);
        DB::table('service2s')->insert($data);

        // flash message
        session()->flash('success', 'El Servicio fue creado!');
        //redirect user
        return redirect(route('servicio2.redirect'));

      }

      public function redirect() {
        $latest = DB::table('service2s')->orderBy('id', 'desc')->first();

         return redirect('servicios2/' . $latest->id . '/edit');
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

          return view('service2.create')
          ->with('section2', ServiceSection2::all())
          ->with('servicio', Service2::find($id));
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
              'image' => 'image|required|mimes:png,svg'
           ]);
          $imageOld = DB::table('service2s')->where('id', $id)->first();

          //upload it
          $image = $request->file('image')->store('content/servicios2');
          Storage::delete($imageOld->image);
          $data=array('image'=>$image);
          DB::table('service2s')->where('id', $id)->update($data);
        } elseif ($request->hasFile('icon_img')) {
          $this->validate($request, [
            'icon_img' => 'image|required|mimes:png,svg,jpg'
         ]);
        $imageOld = DB::table('service2s')->where('id', $id)->first();

        //upload it
        $icon_img = $request->file('icon_img')->store('content/servicios2/icons');
        Storage::delete($imageOld->icon_img);
        $data=array('icon_img'=>$icon_img);
        DB::table('service2s')->where('id', $id)->update($data);
      }


        else {

          $icon = $request->input('icon');
          $title = $request->input('title');
          $contenido = $request->input('contenido');
          $contenido_modal = $request->input('contenido_modal');
          $data = array('icon'=>$icon, 'title'=>$title, 'contenido'=>$contenido,  'contenido_modal'=>$contenido_modal);
          DB::table('service2s')->where('id', $id)->update($data);

          session()->flash('success', 'Servicio actualizado');
          //redirect
          return redirect(route('servicios2.index'));
        }


      }

      /**
       * Remove the specified resource from storage.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function destroy($id)
      {
        $servicio = Service2::withTrashed()->where('id', $id)->firstOrFail();

        if ($servicio->trashed()) {
          $servicio->forceDelete();
          session()->flash('success', 'Servicio eliminado permanentemente');
          return redirect(route('trashed-servicios2.index'));
        }else {
          $servicio->delete();
          session()->flash('success', 'Servicio enviado a la papelera');
          return redirect(route('servicios2.index'));
      }
    }

    public function trashed() {
      $trashed = Service2::onlyTrashed()->get();
      return view('service2.index')->with('servicios', $trashed)->with('contenido_section2s', ServiceSection2::all());
    }
    public function restore($id) {
      $servicio = Service2::withTrashed()->where('id', $id)->firstOrFail();
      $servicio->restore();
      session()->flash('success', 'Servicio Restaurado');
      return redirect()->back();
    }
}
