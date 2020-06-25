<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use DB;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('files.index')->with('files', File::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $path = public_path().'/files/';
      $files = $request->file('file');
      $request->validate([
      'files' => 'max:10000'
      ]);
      foreach($files as $file){

          $fileName = $file->getClientOriginalName();
          $file->store('files');

          $fileUrl = 'files/'.$file->hashname();

          $data = array('file'=>$fileUrl, 'display_name' => $fileName);
          DB::table('files')->insert($data);

      }
    }

    public function delete($id) {
      $file = File::find($id)->firstOrFail();

      Storage::delete($file->file);
      $file->delete();

      session()->flash('success', 'Archivo enviado a la Eliminado');
      return redirect()->back();
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
