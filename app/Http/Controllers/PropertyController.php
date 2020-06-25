<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;
use App\Properties\Property;
use App\SectionProperty;
use App\Properties\City;
use App\Properties\Feature;
use App\Properties\FeatureData;

//Requests
use App\Http\Requests\Properties\CreatePropertiesRequest;
use App\Http\Requests\Properties\UpdatePropertiesRequest;

class PropertyController extends Controller
{

  // Properties Section

  public function propertiesSectionEdit() {
    return view('updateIndex/propertiesSection')->with('properties', Property::all())->with('section_properties', SectionProperty::all());
  }

  public function propertiesSectionUpdate(Request $request, $id) {
    $title = $request->input('title');
    $button = $request->input('button');
    $button_subtitle = $request->input('button_subtitle');
    $back_color = $request->input('back_color');

    $data=array("title"=>$title, "button"=>$button, "button_subtitle"=>$button_subtitle, "back_color"=>$back_color);
    DB::table('section_properties')->where('id', $id)->update($data);
    session()->flash('success', 'La sección fue actualizada');
    //redirect
    return redirect()->back();
  }

  public function propertiesSectionDisplay(Request $request, $id) {
    $display = $request->input('links');
    $data=array("display"=>$display);
    DB::table('orders')->where('section', 'links')->update($data);
    session()->flash('success', 'La sección fue actualizada');
    //redirect
    return redirect()->back();
  }




    public function redirectProperty() {
      $latest = DB::table('properties')->orderBy('id', 'desc')->first();

       return redirect('properties/' . $latest->id . '/edit');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('properties.index')->with('properties', Property::orderByDesc('id')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('properties.create')
        ->with('cities', City::orderBy('name')->get())
        ->with('features', Feature::orderBy('feature_name')->get());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePropertiesRequest $request, Property $prop)
    {
      $name = $prop::create(['name' => $request->input('name')]);
      $features_db = Feature::all();
      $feature_array = [];

      foreach($features_db as $feature) {
        // $name->feature_item()->attach($feature->id);
      }
      // dd($feature_array);
      //
      // $name->features()->attach('1');



      // $data=array("name"=>$name);
      // DB::table('properties')->insert($data);
      session()->flash('success', 'La sección fue actualizada');
      //redirect
      if(isset($property)){
        redirect(route('properties/'));
      }else{
      $latest = Property::max('id');
      return redirect('properties/' . $latest . '/edit');
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
    public function edit(Property $property)
    {

        return view('properties.create')->with('property', $property)
        ->with('cities', City::orderBy('name')->get())
        ->with('features', Feature::orderBy('feature_name')->get());

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePropertiesRequest $request, Property $property)
    {

      // $name = $request->input('name');
      // $description = $request->input('description');
      // $city = $request->input('city');
      // $precio = $request->input('precio');
      // $property = Property::all()->where('id', $id);
      // $feat = $property->features()->$feature->id;
      $features_db = Feature::all();
      $feature_array = [];
      $request_input = [];
      $datas = [];

      foreach($features_db as $feat) {
        // $property->feature_item()->detach($feat->id);
        // $property->feature_item()->attach($feat->id, ['value' => 'Mano']);
        // $datas = $feat->pivot->value;
        // $datas[] = $feat->feature_name;
      }

      foreach($features_db as $inp=>$val) {
        $datas[] = $inp;
      }


      dd($datas);


      // $oldImage = DB::table('properties')->where('id', $id)->first();


      if ($request->hasFile('image')) {
          $this->validate($request, [
              'image' => 'image|required|mimes:png,jpg,jpeg,svg'
           ]);
          //upload it
          $image = $request->file('image')->store('houses/properties/main');
          //Image Intervention



          Storage::delete($oldImage->image);

          $data=array('image'=>$image);
          DB::table('properties')->where('id', $id)->update($data);

        }
      else {
          // foreach($feat as $feature) {
          //   $feature_array[] = $feature->feature_name;
          //   $feature_id[] = $feature->id;
          // }
          //
          // foreach($feature_array as $feature_obj=>$val) {
          //   $request_input[] = $request->input($val);
          //   // $feature_val = $val;
          //   foreach($request_input as $input=>$key) {
          //     //SYNC feature_property TABLE value COLUMN
          //     $value = $key;
          //     // $datas = [$feature_val=>$key];
          //
          //     // dd($datas); // Array with name of dynamic feature => the input from the form
          //   }
          // }
          // foreach($feat as $feature) {
          //
          // }


          $property->update([
            'name' => $request->name,
            'description' => $request->description,
            'city' => $request->city,
            'precio' => $request->precio
          ]);



          // $data=array("name"=>$name,"description"=>$description,"city"=>$city, "precio"=>$precio);
          //
          //
          // DB::table('properties')->where('id', $id)->update($data);
          session()->flash('success', 'La Propiedad Ha Sido Actualizada');

          return redirect()->back();
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

          $property = Property::withTrashed()->where('id', $id)->firstOrFail();

          if ($property->trashed()) {
            $property->deleteImage();
            $property->forceDelete();

            $features_db = Feature::all();
            foreach($features_db as $feature) {
              $property->feature_item()->detach($feature->id);
            }
            session()->flash('success', 'Propiedad eliminada permanentemente');
            return redirect(route('trashed-properties.index'));
          }else {
            $property->delete();
            session()->flash('success', 'Propiedad enviada a la papelera');
            return redirect(route('properties.index'));
          }
    }

    public function trashed() {
      $trashed = Property::onlyTrashed()->get();
      return view('properties.index')->with('properties', $trashed);
    }

    public function restore($id) {
      $property = Property::withTrashed()->where('id', $id)->firstOrFail();
      $property->restore();
      session()->flash('success', 'La Propiedad ha Sido Restaurada');
      return redirect()->back();
    }
}
