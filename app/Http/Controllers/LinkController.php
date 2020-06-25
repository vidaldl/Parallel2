<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Links\CreateLinksRequest;
use App\Http\Requests\Links\UpdateLinks;
use App\Links;
use DB;
use Response;
use Illuminate\Support\Facades\Storage;

class LinkController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('links.index')->with('links', Links::all());
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('links.create');
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
    $enlace = $request->input('link');


    if ($request->hasFile('image')) {
      $this->validate($request, [
          'image' => 'image|required|mimes:png,jpg,jpeg,svg'
       ]);
      //upload it
      $image = $request->file('image')->store('content/links');

      $data =array('image' => $image);

      $latest = DB::getPdo('links')->lastInsertId();
      return redirect('links/' . $latest . '/edit');

    }else {
    $data = array('title'=>$title, 'link'=>$enlace);
    DB::table('links')->insert($data);
    session()->flash('success', 'Enlace actualizado');
    $latest = DB::getPdo('links')->lastInsertId();
    return redirect('links/' . $latest . '/edit');
    }

  }

  public function redirect2() {
    $latest = DB::table('links')->orderBy('id', 'desc')->first();

    return redirect('links/' . $latest->id . '/edit');
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
  public function edit(Links $link)
  {

      return view('links.create')->with('links', $link);
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

      $title = $request->input('title');
      $enlace = $request->input('link');



      if ($request->hasFile('image')) {
        $this->validate($request, [
            'image' => 'image|required|mimes:png,jpg,jpeg,svg'
         ]);
        $oldImage = DB::table('links')->where('id', $id)->first();
        //upload it
        $image = $request->file('image')->store('content/links');
        //Image Intervention
        Storage::delete($oldImage->image);

        $data=array('image'=>$image);
        DB::table('links')->where('id', $id)->update($data);

      }else {
      $data = array('title'=>$title, 'link'=>$enlace);
      DB::table('links')->where('id', $id)->update($data);
      session()->flash('success', 'Enlace actualizado');
      //redirect
      return redirect(route('links.index'));
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
    $links = Links::withTrashed()->where('id', $id)->firstOrFail();

    if ($links->trashed()) {
      $links->forceDelete();
      session()->flash('error', 'Enlace eliminado permanentemente');
      return redirect(route('trashed-links.index'));
    }else {
      $links->delete();
      session()->flash('success', 'Enlace enviado a la papelera');
      return redirect(route('links.index'));
  }
}

    public function trashed() {
      $trashed = Links::onlyTrashed()->get();
      return view('links.index')->with('links', $trashed);
    }
    public function restore($id) {
      $links = Links::withTrashed()->where('id', $id)->firstOrFail();
      $links->restore();
      session()->flash('success', 'Enlace Restaurado');
      return redirect()->back();
    }
}
