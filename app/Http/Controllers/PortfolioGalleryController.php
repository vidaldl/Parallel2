<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PortfolioGallery\GalleryImages;
use App\PortfolioGallery\GalleryItem;
use App\PortfolioGallery\GallerySection;
use App\Style;
use App\Order;
use App\Font;
use App\FontStyle;
use App\ContenidoSection5;
use App\MenuItem;


use ImageOptimizer;
use Image;
use DB;
use Illuminate\Support\Facades\Storage;

class PortfolioGalleryController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }


    public function display(Request $request) {
      $display = $request->input('portfolio-gallery');
      $data = array('display'=>$display);
      DB::table('orders')->where('section', 'portfolio-gallery')->update($data);
      session()->flash('success', 'La sección fué actualizada');
      return redirect()->back();
    }

    public function editSection($id) {
      return view('updateIndex.portfolioGallery')->with('orders', Order::orderBy('order')->get())->with('gallery_sections', GallerySection::all());
    }

    public function updateSection(Request $request, $id) {
      $title = $request->input('title');
      $subtitle = $request->input('subtitle');

      $data = array('title'=>$title, 'subtitle'=>$subtitle);

      DB::table('gallery_sections')->where('id', $id)->update($data);
      session()->flash('success', 'La sección fué actualizada');
      return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('portfolioGallery.index')
      ->with('gallery_items', GalleryItem::all())
      ->with('gallery_images', GalleryImages::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('portfolioGallery.create');
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
      $subtitle = $request->input('subtitle');
      $desc_title = $request->input('desc_title');
      $desc = $request->input('desc');

      $data = array(
        'title'=>$title,
        'subtitle'=>$subtitle,
        'desc_title'=>$desc_title,
        'desc'=>$desc
      );

      DB::table('gallery_items')->insert($data);
      $latest = DB::getPdo('gallery_items')->lastInsertId();
      return redirect('portfolioGallery/' . $latest . '/edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $item = GalleryItem::where('id', $id)->firstOrFail();
      $next = GalleryItem::where('id', '>', $item->id)->orderBy('id')->first();
      $previous = GalleryItem::where('id', '<', $item->id)->orderBy('id','desc')->first();
      return view('portfolioGallery.show')
      ->with('styles', Style::all())
      ->with('fonts', Font::all())
      ->with('font_styles', Font::all())
      ->with('gallery_items', GalleryItem::find($id))
      ->with('paginate_items', GalleryItem::all())
      ->with(compact('item', 'previous', 'next'))
      ->with('gallery_images', GalleryImages::all())
      ->with('menu_item', MenuItem::all())
      ->with('orders', Order::all())
      ->with('contenidosection5s', ContenidoSection5::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      return view('portfolioGallery.create')
      ->with('gallery_items', GalleryItem::find($id))
      ->with('gallery_images', GalleryImages::all());
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
      //upload it
      $image = $request->file('image')->store('content/portfolioGallery');

      $data =array('image' => $image);
      DB::table('gallery_images')->where('id', $id)->update($data);

      $latest = DB::getPdo('links')->lastInsertId();
      Storage::delete($latest->image);
    }elseif($request->has('val')) {
      $display_type = $request->input('val');

      $data = array('display_type' => $display_type);
      DB::table('gallery_items')->where('id', $id)->update($data);

    }elseif($request->has('valBtn')) {
      $display_tooltip = $request->input('valBtn');

      $data = array('display_tooltip' => $display_tooltip);
      DB::table('gallery_items')->where('id', $id)->update($data);

    }elseif($request->has('video')) {
      $video = $request->input('video');

      $data = array('video' => $video);
      DB::table('gallery_items')->where('id', $id)->update($data);
      return redirect()->back();
    }elseif ($request->has('simple')) {
      $display_simple = $request->input('simple');

      $data = array('display_simple'=>$display_simple);
      DB::table('gallery_items')->where('id', $id)->update($data);

    }else {

      $title = $request->input('title');
      $subtitle = $request->input('subtitle');
      $desc_title = $request->input('desc_title');
      $desc = $request->input('desc');
      $left_btn = $request->input('left_btn');
      $right_btn = $request->input('right_btn');

      $data = array(
        'title'=>$title,
        'subtitle'=>$subtitle,
        'desc_title'=>$desc_title,
        'desc'=>$desc,
        'left_btn'=>$left_btn,
        'right_btn'=>$right_btn
      );

      DB::table('gallery_items')->where('id', $id)->update($data);
      return redirect()->back();

    }

    }

    /**
     * Create a thumbnail of specified size
     *
     * @param string $path path of thumbnail
     * @param int $width
     * @param int $height
     */
    public function createThumbnail($path, $width, $height)
    {
        $img = Image::make($path)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($path);
    }

    public function imageCreate(Request $request, $id) {
      $item = GalleryItem::find($id);
      if ($request->hasFile('slide')) {
      $this->validate($request, [
          'slide' => 'image|required|mimes:png,jpg,jpeg,svg'
       ]);
       // dd($img);

      //upload it
      $image = $request->file('slide')->store('content/portfolioGallery');
      $imagePath = public_path('storage/'.$image);
      ImageOptimizer::optimize($imagePath);
      //Thumbnail
      $thumbnail = $request->file('slide')->store('content/portfolioGallery/thumbnails');
      // dd($thumbnail);
      //create small thumbnail
      $smallthumbnailpath = public_path('storage/'.$thumbnail);
      $this->createThumbnail($smallthumbnailpath, 360, 270);

      $data =array('image' => $image, 'thumbnail' => $thumbnail);
      DB::table('gallery_images')->insert($data);
      $latest = DB::getPdo('gallery_images')->lastInsertId();

      $item->gallery_images()->attach($latest);
    }
    }


    public function imageUpdate(Request $request, $id) {
      if ($request->hasFile('slide')) {
      $this->validate($request, [
          'slide' => 'image|required|mimes:png,jpg,jpeg,svg'
       ]);
      $slideOld = DB::table('gallery_images')->where('id', $id)->first();
      //upload it
      $image = $request->file('slide')->store('content/portfolioGallery');
      $imagePath = public_path('storage/'.$image);
      ImageOptimizer::optimize($imagePath);
      //Thumbnail
      $thumbnail = $request->file('slide')->store('content/portfolioGallery/thumbnails');
      $smallthumbnailpath = public_path('storage/'.$thumbnail);
      $this->createThumbnail($smallthumbnailpath, 360, 270);

      Storage::delete($slideOld->image);
      Storage::delete($slideOld->thumbnail);

      $data =array('image' => $image, 'thumbnail'=>$thumbnail);
      DB::table('gallery_images')->where('id', $id)->update($data);

      $latest = DB::getPdo('links')->lastInsertId();

    }
    }

    public function imageDestroy(Request $request, $id) {
      $idDel = $request->input('idDel');

      $item = GalleryItem::find($id);

      $image = GalleryImages::where('id', $idDel)->first();
      Storage::delete($image->image);
      Storage::delete($image->thumbnail);
      $image->delete();

      $item->gallery_images()->detach($idDel);
      session()->flash('error', 'Se ha borrado la imagen');
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
      $item = GalleryItem::withTrashed()->where('id', $id)->firstOrFail();

      if ($item->trashed()) {

        if($item->gallery_images()->exists($id)) {
          session()->flash('error', 'Artículo Tiene Imagenes, Favor eliminar todas las imagenes en el artículo');
          return redirect(route('trashed-gallery.index'));
        }else {
          $item->forceDelete();
          session()->flash('error', 'Artículo eliminado permanentemente');
          return redirect(route('trashed-gallery.index'));
        }

      }else {
        $item->delete();
        session()->flash('success', 'Artículo enviado a la papelera');
        return redirect(route('portfolioGallery.index'));
    }
    }


    public function trashed() {
      $trashed = GalleryItem::onlyTrashed()->get();
      return view('portfolioGallery.index')->with('gallery_items', $trashed);
    }

    public function restore($id) {
      $item = GalleryItem::withTrashed()->where('id', $id)->firstOrFail();
      $item->restore();
      session()->flash('success', 'Artículo Restaurado');
      return redirect()->back();
    }

}
