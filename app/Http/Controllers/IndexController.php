<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use App\Servicio;
use App\ServiceSection2;
use App\Service2;
use App\ContenidoSection1;
use App\menu_item;
use App\ContenidoSection2;
use App\ContenidoSection3;
use App\ContenidoSection4;
use App\ContenidoSection5;
use App\ContactCategory;
use App\ContenidoSectionFooter;
use App\ContenidoAbout;
use App\Style;
use App\InfoSliderImage;
use App\InfoSliderText;
use App\InfoSliderImage2;
use App\InfoSliderText2;
use App\InfoSliderImage3;
use App\InfoSliderText3;
use App\Pricing;
use App\PricingSection;
use App\User;
use App\Order;
use App\Links;
use App\LinkSection;
use App\PortfolioGallery\GallerySection;
use App\PortfolioGallery\GalleryItem;
use App\PortfolioGallery\GalleryImages;
use App\Frase;
use App\Portfolio\PortfolioCategory;
use App\Portfolio\PortfolioItem;
use App\Portfolio\PortfolioSection;
use App\MenuItem;
use App\Catalog\CatalogItem;
use App\Catalog\CatalogSection;
use App\Catalog2\CatalogItem2;
use App\Catalog2\CatalogSection2;
use App\Catalog3\CatalogItem3;
use App\Catalog3\CatalogSection3;
use App\FooterLink;
use App\Font;
use App\FontStyle;
use App\Shop\ShopItem;
use App\Shop\ShopSection;
use Illuminate\Support\Facades\Mail;
use App\Mail\SolicitudDeContacto;
use App\Modal;
use App\File;
use App\Text;
use App\Text2;
use App\Text3;
use App\Text4;



class IndexController extends Controller
{

      public function mailOld() {


       $data = request()->validate([
         'name' => 'required',
         'email' => 'required|email',
         'number' => 'nullable',
         'subject' => 'required',
         'message' => 'required'
       ]);

       Mail::to(env('EMAIL_ADDRESS'))->send(new SolicitudDeContacto($data));

       // flash message
       session()->flash('success', 'Su mensaje a sido Enviado! Estaremos en contacto lo más rapido posible.');
       //redirect user
       return redirect('/#contact');
     }

    public function mail(Request $request) {
      $section5 = ContenidoSection5::find(1);

      $url = 'https://www.google.com/recaptcha/api/siteverify';
      $remoteip = $_SERVER['REMOTE_ADDR'];
      $data = [
              'secret' => config('services.recaptcha.secret'),
              'response' => $request->get('recaptcha'),
              'remoteip' => $remoteip
            ];
      $options = [
              'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data)
              ]
          ];
      $context = stream_context_create($options);
              $result = file_get_contents($url, false, $context);
              $resultJson = json_decode($result);


      if ($resultJson->success != true) {
              return back()->withErrors(['captcha' => 'ReCaptcha Error']);
              // flash message
              session()->flash('success', 'Error Json');
              //redirect user
              return redirect('/#contact');
              }
      if ($resultJson->score >= 0.3) {

        $data = $request->validate([
          'name' => 'required',
          'email' => 'required|email',
          'number' => 'nullable',
          'service' => 'nullable',
          'subject' => 'required',
          'message' => 'required'
        ]);

//        Mail::to(env('EMAIL_ADDRESS'))->send(new SolicitudDeContacto($data));

        // flash message
        session()->flash('success', $section5->success);
        //redirect user
        return redirect('/#contact');

      } else {
        // flash message
        session()->flash('success', $section5->error);
        //redirect user
        return redirect('/#contact');
      }
    }


    public function index() {
      $pCats = PortfolioCategory::has('portfolio_item')->get();

      return view('index')->with('posts', Post::orderByDesc('id')->paginate(5))
      ->with('orders', Order::orderBy('order')->get())
      ->with('contenidosection1s', ContenidoSection1::all())
      ->with('menu_item', MenuItem::all())
      ->with('contenidosection2s', ContenidoSection2::all())
      ->with('contenidosection3s', ContenidoSection3::all())
      ->with('contenidosection4s', ContenidoSection4::all())
      ->with('contenidosection5s', ContenidoSection5::all())
      ->with('contact_categories', ContactCategory::all())
      ->with('contenidosectionfooters', ContenidoSectionFooter::all())
      ->with('servicios', Servicio::all())
      ->with('service_section2s', ServiceSection2::all())
      ->with('service2s', Service2::all())
      ->with('pricings', Pricing::all())
      ->with('pricing_sections', PricingSection::all())
      ->with('styles', Style::all())
      ->with('info_slider_images', InfoSliderImage::all())
      ->with('info_slider_texts', InfoSliderText::all())
      ->with('info_slider_image2s', InfoSliderImage2::all())
      ->with('info_slider_text2s', InfoSliderText2::all())
      ->with('info_slider_image3s', InfoSliderImage3::all())
      ->with('info_slider_text3s', InfoSliderText3::all())
      ->with('links', Links::all())
      ->with('link_sections', LinkSection::all())
      ->with('gallery_sections', GallerySection::all())
      ->with('gallery_images', GalleryImages::all())
      ->with('gallery_items', GalleryItem::all())
      ->with('frases', Frase::all())
      ->with('portfolio_categories', $pCats)
      ->with('portfolio_items', PortfolioItem::all())
      ->with('portfolio_section', PortfolioSection::all())
      ->with('catalog_items', CatalogItem::all())
      ->with('catalog_sections', CatalogSection::all())
      ->with('catalog_item2s', CatalogItem2::all())
      ->with('catalog_section2s', CatalogSection2::all())
      ->with('catalog_item3s', CatalogItem3::all())
      ->with('catalog_section3s', CatalogSection3::all())
      ->with('footer_links', FooterLink::all())
      ->with('fonts', Font::all())
      ->with('font_styles', FontStyle::all())
      ->with('shop_sections', ShopSection::all())
      ->with('shop_items', ShopItem::all())
      ->with('modals', Modal::all())
      ->with('files', File::all())
      ->with('text', Text::find(1)->firstOrFail())
      ->with('text2', Text2::find(1)->firstOrFail())
      ->with('text3', Text3::find(1)->firstOrFail())
      ->with('text4', Text4::find(1)->firstOrFail())
      ->with('users', User::all());
    }


    public function lineUpdate(Request $request, $id) {
      if($request->input('line-display-hidden')) {
        $line = $request->input('line-display-hidden');
        $data = array('line'=>$line);
        DB::table('orders')->where('id', $id)->update($data);
        session()->flash('success', 'La sección fué actualizada');
        return redirect()->back();
      } else {
        $line = $request->input('line-display');
        $line_style = $request->input('line-style');
        $data=array("line"=>$line, "line_style"=>$line_style);
        // $data=array("title"=>$title, "back_color"=>$back_color);
        DB::table('orders')->where('id', $id)->update($data);
        session()->flash('success', 'La sección fué actualizada');
        return redirect()->back();
      }

    }






    public function blog() {

      return view('blog')
      ->with('contenidosection1s', ContenidoSection1::all())
      ->with('categories', Category::all())->with('tags', Tag::all())
      ->with('posts', Post::paginate(16))
      ->with('contenidosection4s', ContenidoSection4::all())
      ->with('contenidosection5s', ContenidoSection5::all())
      ->with('contenidosectionfooters', ContenidoSectionFooter::all())
      ->with('styles', Style::all())
      ->with('users', User::all());

    }

    public function about() {
      return view('about')
      ->with('contenidosection5s', ContenidoSection5::all())
      ->with('contenidoabouts', ContenidoAbout::all())
      ->with('contenidosectionfooters', ContenidoSectionFooter::all())
      ->with('styles', Style::all());
    }
}
