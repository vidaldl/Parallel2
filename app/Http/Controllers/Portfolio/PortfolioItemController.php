<?php

namespace App\Http\Controllers\Portfolio;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use Response;
use Illuminate\Support\Facades\Storage;

use App\Portfolio\PortfolioItem;
use App\Portfolio\PortfolioCategory;
use App\Portfolio\PortfolioSection;
use App\Http\Requests\Portfolio\UpdatePortfolioItemsRequest;

use App\Order;
use App\Style;
use App\ContenidoSection2;
use App\ContenidoSectionFooter;
use App\MenuItem;
use App\FooterLink;
use App\Font;
use App\FontStyle;
use App\File;

class PortfolioItemController extends Controller
{

  public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }


    public function section(Request $request) {
      $title = $request->input('title');
      $data = array('title' => $title);

      DB::table('portfolio_sections')->where('id', 1)->update($data);
      session()->flash('success', 'La sección fué actualizada');
      return redirect()->back();
    }

    public function filter(Request $request) {
      $filter = $request->input('val');
      $data = array('filter' => $filter);
      DB::table('portfolio_sections')->where('id', 1)->update($data);
    }


    public function display(Request $request) {
      $portfolioDisplay = $request->input('portfolio-programs');
      $data = array('display'=>$portfolioDisplay);
      DB::table('orders')->where('section', 'portfolio-programs')->update($data);
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
      return view('portfolio.items.index')
      ->with('orders', Order::orderBy('order')->get())
      ->with('portfolioItems', PortfolioItem::all())
      ->with('portfolio_section', PortfolioSection::all())
      ->with('portfolioCategories', PortfolioCategory::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('portfolio.items.create')
      ->with('files', File::all())
      ->with('portfolioCategories', PortfolioCategory::all());
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

      if ($request->hasFile('image')) {
      $this->validate($request, [
          'image' => 'image|required|mimes:png,jpg,jpeg,svg'
       ]);
      //upload it
      $image = $request->file('image')->store('content/portfolio');

      $data =array('image' => $image);

      $latest = DB::getPdo('portfolio_items')->lastInsertId();
      return redirect('portfolioItems/' . $latest . '/edit');

      }else {
      $data = array('title'=>$title, 'subtitle'=>$subtitle);
      $dataUpload = DB::table('portfolio_items')->insert($data);
      session()->flash('success', 'Artículo actualizado');
      $latest = DB::getPdo('portfolio_items')->lastInsertId();
      return redirect('portfolioItems/' . $latest . '/edit');
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
      return view('portfolio.show')
      ->with('menu_item', MenuItem::all())
      ->with('portfolioCategories', PortfolioCategory::all())
      ->with('orders', Order::orderBy('order')->get())
      ->with('styles', Style::all())
      ->with('contenidosection2s', ContenidoSection2::all())
      ->with('contenidosectionfooters', ContenidoSectionFooter::all())
      ->with('footer_links', FooterLink::all())
      ->with('fonts', Font::all())
      ->with('font_styles', FontStyle::all())
      ->with('portfolioItems', PortfolioItem::find($id));
    }

    public function redirect() {
      $latest = DB::table('portfolio_items')->orderBy('id', 'desc')->first();

       return redirect('portfolioItems/' . $latest->id . '/edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PortfolioItem $portfolioItem)
    {
      return view('portfolio.items.create')
      ->with('portfolioItem', $portfolioItem)
      ->with('portfolioCategories', PortfolioCategory::all())
      ->with('files', File::all());
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
      //Categories first

      // dd($portfolio->title);
      // $portfolio->portfolio_category()->attach(2);


      $oldImage = DB::table('portfolio_items')->where('id', $id)->first();


        if ($request->hasFile('logo')) {
          $this->validate($request, [
              'logo' => 'image|required|mimes:png,jpg,jpeg,svg'
           ]);
          //upload it

          $logo = $request->file('logo')->store('content/portfolio');
          //Image Intervention

          Storage::delete($oldImage->logo);

          $data=array('logo'=>$logo);
          DB::table('portfolio_items')->where('id', $id)->update($data);

        }elseif ($request->hasFile('screenshot')) {
            $this->validate($request, [
                'screenshot' => 'image|required|mimes:png,jpg,jpeg,svg'
             ]);
            //upload it
            $screenshot = $request->file('screenshot')->store('content/portfolio');
            //Image Intervention

            Storage::delete($oldImage->screenshot);

            $data=array('screenshot'=>$screenshot);
            DB::table('portfolio_items')->where('id', $id)->update($data);

          } elseif ($request->has('logoLinkType')) {
            $logo_link_type = $request->input('logoLinkType');
            $data = array('logo_link_type' => $logo_link_type);

            DB::table('portfolio_items')->where('id', $id)->update($data);

          } elseif($request->has('logoLink')) {
            $logo_link = $request->input('logoLink');
            $data = array('logo_link' => $logo_link);

            DB::table('portfolio_items')->where('id', $id)->update($data);

          }else {
            $categories = $request->input('categories');
            $portfolio = PortfolioItem::find($id);


            if($portfolio->logo_link_type == 0){
              $portfolio->portfolio_category()->sync($categories);
            //PORTADA
              $title = $request->input('title');
              $subtitle = $request->input('subtitle');

            //Detalle
              $contenido = $request->input('contenido');
              $author = $request->input('author');
              $author_bio = $request->input('author_bio');
              $link_title = $request->input('link_title');
              $button_text = $request->input('button_text');
              $button_icon = $request->input('button_icon');
              $link = $request->input('link');
              $link_address = $request->input('link_address');

              $data = array(
              'title'=>$title,
              'subtitle'=>$subtitle,
              'contenido'=>$contenido,
              'author'=>$author,
              'author_bio'=>$author_bio,
              'link_title'=>$link_title,
              'button_text'=>$button_text,
              'button_icon'=>$button_icon,
              'link'=>$link,
              'logo_link_address' => $link_address
              );
              DB::table('portfolio_items')->where('id', $id)->update($data);
            }
          else {
            $portfolio->portfolio_category()->sync($categories);
            //PORTADA
              $title = $request->input('title');
              $subtitle = $request->input('subtitle');

            //Detalle
              $contenido = $request->input('contenido');
              $author = $request->input('author');
              $author_bio = $request->input('author_bio');
              $link_title = $request->input('link_title');
              $button_text = $request->input('button_text');
              $button_icon = $request->input('button_icon');
              $link = $request->input('link');
              $file = $request->input('file');

              $data = array(
              'title'=>$title,
              'subtitle'=>$subtitle,
              'contenido'=>$contenido,
              'author'=>$author,
              'author_bio'=>$author_bio,
              'link_title'=>$link_title,
              'button_text'=>$button_text,
              'button_icon'=>$button_icon,
              'link'=>$link,
              'logo_link_address' => $file
              );
              DB::table('portfolio_items')->where('id', $id)->update($data);
          }
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

      $portfolioItems = PortfolioItem::withTrashed()->where('id', $id)->firstOrFail();
      if ($portfolioItems->trashed()) {
      // $portfolioItems->portfolio_category()->detach($id);
      DB::table('portfolio_category_portfolio_item')->where('portfolio_item_id', $id)->delete();
      $portfolioItems->deleteScreenshot();
      $portfolioItems->forceDelete();
      session()->flash('error', 'Artículo eliminado permanentemente');
      return redirect(route('trashed-portfolioItems.index'));
    }else {
      $portfolioItems->delete();
      session()->flash('success', 'Artículo enviado a la papelera');
      return redirect(route('portfolioItems.index'));
  }
    }

    public function trashed() {
      $trashed = PortfolioItem::onlyTrashed()->get();
      return view('portfolio.items.index')
      ->with('portfolio_section', PortfolioSection::all())
      ->with('orders', Order::all())
      ->with('portfolioItems', $trashed);
    }
    public function restore($id) {
      $portfolioItems = PortfolioItem::withTrashed()->where('id', $id)->firstOrFail();
      $portfolioItems->restore();
      session()->flash('success', 'Portfolio: Artículo Restaurado');
      return redirect()->back();
    }
}
