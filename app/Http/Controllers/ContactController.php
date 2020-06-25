<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\ContactCategory;

class ContactController extends Controller
{
    public function categoriesIndex() {
      return view('contactCategories.index')->with('categories', ContactCategory::all());
    }

    public function categoriesCreate()
    {
        return view('contactCategories.create');
    }

    public function categoriesStore(Request $request)
    {
      $name = $request->input('name');
      $data = array('name'=>$name);

      DB::table('contact_categories')->insert($data);

      session()->flash('success', 'Portfolio: Categoría Creada');

      return redirect(route('contactCategories.index'));
    }

    public function categoriesEdit(Request $request, $id){
      return view('contactCategories.create')->with('category', ContactCategory::find($id));

    }

    public function categoriesUpdate(Request $request, $id){
      $name = $request->input('name');

      $data = array('name'=>$name);

      DB::table('contact_categories')->where('id', $id)->update($data);

      session()->flash('success', 'Portfolio: Categoría Actualizada');

      return redirect(route('contactCategories.index'));

    }

    public function categoriesDelete($id) {
      $category = ContactCategory::find($id);

      $category->delete();

      session()->flash('success', 'La categoria ha sido eliminada');
      return redirect(route('contactCategories.index'));

    }
}
