<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateSection1Request;
use App\Http\Requests\SliderImageRequest;
use App\ContenidoSection1;
use App\ContenidoSection2;
use App\ContenidoSection3;
use App\ContenidoSection4;
use App\ContenidoSection5;
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
use App\Order;
use App\Links;
use App\LinkSection;
use App\Properties\City;
use App\Properties\Feature;
use App\Frase;
use App\Font;
use App\FontStyle;
use App\File;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home')
        ->with('orders', Order::orderBy('order')->get())
        ->with('contenidosection1s', ContenidoSection1::all())
        ->with('contenidosection2s', ContenidoSection2::all())
        ->with('contenidosection3s', ContenidoSection3::all())
        ->with('contenidosection4s', ContenidoSection4::all())
        ->with('contenidosection5s', ContenidoSection5::all())
        ->with('contenidosectionfooters', ContenidoSectionFooter::all())
        ->with('contenidoabouts', ContenidoAbout::all())
        ->with('styles', Style::all())
        ->with('pricings', Pricing::all())
        ->with('info_slider_images', InfoSliderImage::all())
        ->with('info_slider_texts', InfoSliderText::all())
        ->with('info_slider_image2s', InfoSliderImage2::all())
        ->with('info_slider_text2s', InfoSliderText2::all())
        ->with('info_slider_image3s', InfoSliderImage3::all())
        ->with('info_slider_text3s', InfoSliderText3::all())
        ->with('links', Links::all())
        ->with('link_sections', LinkSection::all())
        ->with('frases', Frase::all())
        ->with('fonts', Font::all())
        ->with('font_styles', FontStyle::all());
    }

    public function indexInactive()
    {
        return view('homeInactive')
        ->with('orders', Order::orderBy('order')->get())
        ->with('contenidosection1s', ContenidoSection1::all())
        ->with('contenidosection2s', ContenidoSection2::all())
        ->with('contenidosection3s', ContenidoSection3::all())
        ->with('contenidosection4s', ContenidoSection4::all())
        ->with('contenidosection5s', ContenidoSection5::all())
        ->with('contenidosectionfooters', ContenidoSectionFooter::all())
        ->with('contenidoabouts', ContenidoAbout::all())
        ->with('styles', Style::all())
        ->with('pricings', Pricing::all())
        ->with('info_slider_images', InfoSliderImage::all())
        ->with('info_slider_texts', InfoSliderText::all())
        ->with('info_slider_image2s', InfoSliderImage2::all())
        ->with('info_slider_text2s', InfoSliderText2::all())
        ->with('info_slider_image3s', InfoSliderImage3::all())
        ->with('info_slider_text3s', InfoSliderText3::all())
        ->with('links', Links::all())
        ->with('link_sections', LinkSection::all())
        ->with('frases', Frase::all());
    }


    /*Frase -------------------------------------------------------------------------------->*/
    public function fraseDisplay(Request $request, $id) {
      $fraseDisplay = $request->input('frase');
      $data = array('display'=>$fraseDisplay);
      DB::table('orders')->where('section', 'frase')->update($data);
      session()->flash('success', 'La sección fué actualizada');
      return redirect()->back();
    }

    public function fraseEdit() {
      return view('updateIndex/frase')->with('orders', Order::orderBy('order')->get())->with('frases', Frase::all());
    }

    public function fraseUpdate(Request $request, $id) {
      $title = $request->input('title');
      $data = array('title'=>$title);
      DB::table('frases')->where('id', $id)->update($data);
    }


    /*Links -------------------------------------------------------------------------------->*/
    public function linkEdit() {
      return view('updateIndex/linkSection')->with('orders', Order::orderBy('order')->get())->with('links', Links::all())->with('link_sections', LinkSection::all());
    }

    public function linkUpdate(Request $request, $id) {
      $title = $request->input('title');
      $back_color = $request->input('back_color');

      $data=array("title"=>$title, "back_color"=>$back_color);
      DB::table('link_sections')->where('id', $id)->update($data);
      session()->flash('success', 'La sección fue actualizada');
      //redirect
      return redirect()->back();
    }
    public function linkDisplay(Request $request, $id) {
      $display = $request->input('links');
      $data=array("display"=>$display);
      DB::table('orders')->where('section', 'links')->update($data);
      session()->flash('success', 'La sección fue actualizada');
      //redirect
      return redirect()->back();
    }





    /*Pricing -------------------------------------------------------------------------------->*/

    public function pricingDisplay(Request $request, $id) {
      $display = $request->input('pricing');
      $data=array("display"=>$display);
      DB::table('orders')->where('section', 'pricing')->update($data);
      session()->flash('success', 'La sección fue actualizada');
      //redirect
      return redirect()->back();
    }

    /*Info Slider Image -------------------------------------------------------------------------------->*/
    public function storeSliderImage (SliderImageRequest $request) {
       $slide = $request->slide->store('slides');
       $post = InfoSliderImage::create([
         'image' => $slide
       ]);
       // flash message
       session()->flash('success', 'La imagen fué subida');
       //redirect user
       return redirect()->back();
    }

    public function updateSliderImage (Request $request, $id) {
      $this->validate($request, [
          'slide' => 'image|required|mimes:png,jpg,jpeg,svg'
       ]);
      $slideOld = DB::table('info_slider_images')->where('id', $id)->first();
      //upload it
      $slide = $request->file('slide')->store('slides');
      Storage::delete($slideOld->image);
      // $finalDataName = 'content/'.$logo;
      $data=array('image'=>$slide);
      DB::table('info_slider_images')->where('id', $id)->update($data);

      session()->flash('success', 'La imagen ha sido actualizada');
      //redirect
      return redirect()->back();
    }

    public function deleteSliderImage (InfoSliderImage $slide, $id) {
      // Storage::delete($slide->image);
      $image = InfoSliderImage::where('id', $id)->first();
      Storage::delete($image->image);
      $image->delete();
      session()->flash('error', 'Se ha borrado la imagen');
      //redirect
      return redirect()->back();
    }


    /*Info Slider Text -------------------------------------------------------------------------------->*/
    public function infoSliderEdit ($id) {
      return view('updateIndex/infoslider')
      ->with('info_slider_images', InfoSliderImage::all())
      ->with('info_slider_texts', InfoSliderText::all())
      ->with('orders', Order::orderBy('order')->get());
    }

    public function infoSliderUpdate(Request $request, $id) {


      if ($request->hasFile('video')) {
        $this->validate($request, [
            'video' => 'required|mimes:mp4'
         ]);

        $videoOld = DB::table('info_slider_texts')->where('id', $id)->first();

        $video = $request->file('video')->store('videos');
        Storage::delete($videoOld->video);

        $data=array("video"=>$video);
        DB::table('info_slider_texts')->update($data);

        session()->flash('success', 'El video fué actualizado');
        //redirect
        return redirect()->back();
      } elseif ($request->has('val')) {
        $display_type = $request->input('val');

        $data = array("display_type"=>$display_type);
        DB::table('info_slider_texts')->update($data);

        return redirect()->back();
      } else {
      $title = $request->input('title');
      $contenido = $request->input('contenido');
      $button = $request->input('button');
      $link = $request->input('link');
      $back_color = $request->input('back_color');

      $data=array("title"=>$title, "contenido"=>$contenido, "button"=>$button, "link"=>$link, "back_color"=>$back_color);
      DB::table('info_slider_texts')->update($data);
      session()->flash('success', 'La sección fue actualizada');
      //redirect
      return redirect()->back();
      }
    }

    public function infoSliderDisplay(Request $request, $id) {
      $display = $request->input('infoslider1');
      $data=array("display"=>$display);
      DB::table('orders')->where('section', 'infoslider1')->update($data);
      session()->flash('success', 'La sección fue actualizada');
      //redirect
      return redirect()->back();
    }


    public function deleteSliderVideo (InfoSliderText $request, $id) {
      // Storage::delete($slide->image);
     $video = InfoSliderText::where('id', $id)->first();
      Storage::delete($video->video);
      $video->update(['video'=>null]);
      session()->flash('error', 'Se ha borrado la imagen');
      //redirect
      return redirect()->back();
    }

    /*Info Slider Image 2-------------------------------------------------------------------------------->*/
    public function storeSliderImage2 (SliderImageRequest $request) {
       $slide = $request->slide->store('slides');
       $post = InfoSliderImage2::create([
         'image' => $slide
       ]);
       // flash message
       session()->flash('success', 'La imagen fué subida');
       //redirect user
       return redirect()->back();
    }

    public function updateSliderImage2 (Request $request, $id) {
      $this->validate($request, [
          'slide' => 'image|required|mimes:png,jpg,jpeg,svg'
       ]);
      $slideOld = DB::table('info_slider_image2s')->where('id', $id)->first();
      //upload it
      $slide = $request->file('slide')->store('slides');
      Storage::delete($slideOld->image);
      // $finalDataName = 'content/'.$logo;
      $data=array('image'=>$slide);
      DB::table('info_slider_image2s')->where('id', $id)->update($data);

      session()->flash('success', 'La imagen ha sido actualizada');
      //redirect
      return redirect()->back();
    }

    public function deleteSliderImage2 (InfoSliderImage $slide, $id) {
      Storage::delete($slide->image);
      $image = InfoSliderImage2::where('id', $id)->first();
      Storage::delete($image->image);
      $image->delete();
      session()->flash('error', 'Se ha borrado la imagen');
      //redirect
      return redirect()->back();
    }


    /*Info Slider Text 2 -------------------------------------------------------------------------------->*/
    public function infoSlider2Edit ($id) {
      return view('updateIndex/infoslider2')
      ->with('info_slider_image2s', InfoSliderImage2::all())
      ->with('info_slider_text2s', InfoSliderText2::all())
      ->with('orders', Order::orderBy('order')->get());
    }

    public function infoSlider2Update(Request $request, $id) {

            if ($request->hasFile('video')) {
              $this->validate($request, [
                  'video' => 'required|mimes:mp4'
               ]);

              $videoOld = DB::table('info_slider_text2s')->where('id', $id)->first();

              $video = $request->file('video')->store('videos');
              Storage::delete($videoOld->video);

              $data=array("video"=>$video);
              DB::table('info_slider_text2s')->update($data);

              session()->flash('success', 'El video fué actualizado');
              //redirect
              return redirect()->back();
            }elseif ($request->has('val')) {
              $display_type = $request->input('val');

              $data = array("display_type"=>$display_type);
              DB::table('info_slider_text2s')->update($data);

              return redirect()->back();
            } else {
            $title = $request->input('title');
            $contenido = $request->input('contenido');
            $button = $request->input('button');
            $link = $request->input('link');
            $back_color = $request->input('back_color');

            $data=array("title"=>$title, "contenido"=>$contenido, "button"=>$button, "link"=>$link, "back_color"=>$back_color);
            DB::table('info_slider_text2s')->update($data);
            session()->flash('success', 'La sección fue actualizada');
            //redirect
            return redirect()->back();
            }
    }

    public function infoSlider2Display(Request $request, $id) {
      $display = $request->input('infoslider2');
      $data=array("display"=>$display);
      DB::table('orders')->where('section', 'infoslider2')->update($data);
      session()->flash('success', 'La sección fue actualizada');
      //redirect
      return redirect()->back();
    }


    public function deleteSliderVideo2 (InfoSliderText2 $request, $id) {
      // Storage::delete($slide->image);
     $video = InfoSliderText2::where('id', $id)->first();
      Storage::delete($video->video);
      $video->update(['video'=>null]);
      session()->flash('error', 'Se ha borrado la imagen');
      //redirect
      return redirect()->back();
    }


    /*Info Slider Image 3-------------------------------------------------------------------------------->*/
    public function storeSliderImage3 (SliderImageRequest $request) {
       $slide = $request->slide->store('slides');
       $post = InfoSliderImage3::create([
         'image' => $slide
       ]);
       // flash message
       session()->flash('success', 'La imagen fué subida');
       //redirect user
       return redirect()->back();
    }

    public function updateSliderImage3 (Request $request, $id) {
      $this->validate($request, [
          'slide' => 'image|required|mimes:png,jpg,jpeg,svg'
       ]);
      $slideOld = DB::table('info_slider_image3s')->where('id', $id)->first();
      //upload it
      $slide = $request->file('slide')->store('slides');
      Storage::delete($slideOld->image);
      // $finalDataName = 'content/'.$logo;
      $data=array('image'=>$slide);
      DB::table('info_slider_image3s')->where('id', $id)->update($data);

      session()->flash('success', 'La imagen ha sido actualizada');
      //redirect
      return redirect()->back();
    }

    public function deleteSliderImage3 (InfoSliderImage $slide, $id) {
      Storage::delete($slide->image);
      $image = InfoSliderImage3::where('id', $id)->first();
      Storage::delete($image->image);
      $image->delete();
      session()->flash('error', 'Se ha borrado la imagen');
      //redirect
      return redirect()->back();
    }


    /*Info Slider Text 3 -------------------------------------------------------------------------------->*/
    public function infoSlider3Edit ($id) {
      return view('updateIndex/infoslider3')
      ->with('info_slider_image3s', InfoSliderImage3::all())
      ->with('info_slider_text3s', InfoSliderText3::all())
      ->with('orders', Order::orderBy('order')->get());
    }

    public function infoSlider3Update(Request $request, $id) {
      if ($request->hasFile('video')) {
        $this->validate($request, [
            'video' => 'required|mimes:mp4'
         ]);

        $videoOld = DB::table('info_slider_text3s')->where('id', $id)->first();

        $video = $request->file('video')->store('videos');
        Storage::delete($videoOld->video);

        $data=array("video"=>$video);
        DB::table('info_slider_text3s')->update($data);

        session()->flash('success', 'El video fué actualizado');
        //redirect
        return redirect()->back();
      } elseif ($request->has('val')) {
        $display_type = $request->input('val');

        $data = array("display_type"=>$display_type);
        DB::table('info_slider_text3s')->update($data);

        return redirect()->back();
      } else {
      $title = $request->input('title');
      $contenido = $request->input('contenido');
      $button = $request->input('button');
      $link = $request->input('link');
      $back_color = $request->input('back_color');

      $data=array("title"=>$title, "contenido"=>$contenido, "button"=>$button, "link"=>$link, "back_color"=>$back_color);
      DB::table('info_slider_text3s')->update($data);
      session()->flash('success', 'La sección fue actualizada');
      //redirect
      return redirect()->back();
      }
    }

    public function infoSlider3Display(Request $request, $id) {
      $display = $request->input('infoslider3');
      $data=array("display"=>$display);
      DB::table('orders')->where('section', 'infoslider3')->update($data);
      session()->flash('success', 'La sección fue actualizada');
      //redirect
      return redirect()->back();
    }

    public function deleteSliderVideo3 (InfoSliderText3 $request, $id) {
      // Storage::delete($slide->image);
     $video = InfoSliderText3::where('id', $id)->first();
      Storage::delete($video->video);
      $video->update(['video'=>null]);
      session()->flash('error', 'Se ha borrado la imagen');
      //redirect
      return redirect()->back();
    }

    /*Styles Update -------------------------------------------------------------------------------->*/
    public function styleUpdate (Request $request, $id) {
      if($request->hasFile('favicon')) {
        $this->validate($request, [
          'favicon' => 'image|required|mimes:png,svg,jpeg,gif'
        ]);
        $imageOld = DB::table('styles')->where('id', $id)->first();

        //upload it
        $favicon = $request->file('favicon')->store('content');
        Storage::delete($imageOld->favicon);
        $data=array('favicon'=>$favicon);
        DB::table('styles')->where('id', $id)->update($data);
      }
      else {
      $primary_color = $request->input('primary_color');
      $button_primary = $request->input('button_primary');
      $button_secondary = $request->input('button_secondary');
      $page_title = $request->input('page_title');

      $data = array("primary_color"=>$primary_color,
      "button_primary"=>$button_primary,
      "button_secondary"=>$button_secondary,
      "page_title"=>$page_title);
      DB::table('styles')->update($data);
      session()->flash('success', 'La informacion ha sido actualizada');
      //redirect
      return redirect()->back();
      }
    }



    /*About Page -------------------------------------------------------------------------------->*/
    public function aboutEdit($id) {
      return view('updatePage/about')->with('contenidoabouts', ContenidoAbout::all());
    }

    public function aboutUpdate(Request $request, $id) {
      $mision = $request->input('mision');
      $vision = $request->input('vision');
      $valores = $request->input('valores');
      $map = $request->input('map');
      $back_color = $request->input('back_color');
      $hours = $request->input('hours');
      $web_address = $request->input('web_address');

      $data=array("mision"=>$mision, "vision"=>$vision, "valores"=>$valores, "map"=>$map, "back_color"=>$back_color, "hours"=>$hours, "web_address"=>$web_address);
      DB::table('contenido_abouts')->update($data);
      session()->flash('success', 'La sección fue actualizada');
      //redirect
      return redirect()->back();
    }


    /*SECTION 1 -------------------------------------------------------------------------------->*/
    public function sliderStyleUpdate(Request $request, $id) {
      $style = $request->input('style');

      $data = array("style"=>$style);
      DB::table('contenido_section1s')->where('id', $id)->update($data);
      session()->flash('success', 'La sección fue actualizada');
      //redirect
      return redirect()->back();
    }

    public function section1Carousel(Request $request, $id) {
      $carousel = $request->input('carousel');
      $data=array("carousel"=>$carousel);
      DB::table('contenido_section1s')->where('id', $id)->update($data);
      session()->flash('success', 'La sección fue actualizada');
      //redirect
      return redirect()->back();
    }
    public function section1Edit($id) {
      return view('updateIndex/section1')->with('orders', Order::orderBy('order')->get())->with('contenidosection1s', ContenidoSection1::all());
    }

    public function section1Update(Request $request, $id) {

      $title = $request->input('title');
      $tagline = $request->input('tagline');
      $button = $request->input('button');
      $link = $request->input('link');
      $overlay = $request->input('overlay');

      $logo = NULL;
      $request->validate([
          'overlay' => 'integer|between:1,100'
       ]);

      // Logo ---------------------------------------------------------------
      if ($request->hasFile('logo')) {
        $this->validate($request, [
            'logo' => 'image|required|mimes:png,svg'
         ]);
        $logoOld = DB::table('contenido_section1s')->where('id', $id)->first();

        //upload it
        $logo = $request->file('logo')->store('content');

        Storage::delete($logoOld->logo);

        $data=array('logo'=>$logo);
        DB::table('contenido_section1s')->where('id', $id)->update($data);

        session()->flash('success', 'La sección fue actualizada con la imagen');
        //redirect
        return redirect()->back();
      }

      //BACKGROUND -------------------------------------------------------
        elseif ($request->hasFile('background')) {
          $this->validate($request, [
              'background' => 'image|required|mimes:jpeg,png,jpg,gif,svg'
           ]);
         $logoOld = DB::table('contenido_section1s')->where('id', $id)->first();
         $background = $request->file('background')->store('content');

          // $finalImage = Image::make($background);
          // $random = rand();
          // $originalPath = public_path().'/storage/content/original/';
          // $finalPath = public_path().'/storage/content/';
          // $finalImage->save($finalPath.$random.$background->getClientOriginalName());
          // $finalDummy = $finalImage->basename;
          // $finalDummyName = 'content/original/'.$finalDummy;
          // //moment of transformation
          // $width = NULL;
          // $height = '100vh';

          // $finalImage->resize($width, $height, function ($constraint) {
          //     $constraint->aspectRatio();
          // });
          // $finalImage->resize(150,150);
          // $finalImage->save($finalPath.$random.$background->getClientOriginalName());
          // Storage::delete($finalDummyName);
          Storage::delete($logoOld->background_image);

          // $finalDataName = 'content/'.$finalImage->basename;
          $data=array('background_image'=>$background);
          DB::table('contenido_section1s')->where('id', $id)->update($data);

          session()->flash('success', 'La Imagen de Fondo fue actualizada');
          //redirect
          return redirect()->back();

        } elseif ($request->has('title_size') || $request->has('subtitle_size')) {
          $title_size = $request->input('title_size');
          $subtitle_size = $request->input('subtitle_size');

          $data = array("title_size"=>$title_size,"subtitle_size"=>$subtitle_size);

          DB::table('contenido_section1s')->where('id', $id)->update($data);
          session()->flash('success', 'La sección fue actualizada');
          //redirect
          return redirect()->back();
        } else {
        $data=array(
        "title"=>$title,
        "overlay"=>$overlay,
        "tagline"=>$tagline,
        "button"=>$button,
        "link"=>$link
      );
        DB::table('contenido_section1s')->where('id', $id)->update($data);
        session()->flash('success', 'La sección fue actualizada');
        //redirect
        return redirect()->back();

        }

      //check if new image

      //Update Attributes

      //flash

    }

    public function section1Display(Request $request, $id) {
      $display = $request->input('val');
      $data=array("display"=>$display);
      DB::table('contenido_section1s')->where('id', $id)->update($data);
      session()->flash('success', 'La sección fue actualizada');
      //redirect
      return redirect()->back();
    }
    /*SECTION 2 -------------------------------------------------------------------------------->*/
    public function section2Edit($id) {
      return view('updateIndex/section2')->with('orders', Order::orderBy('order')->get())->with('contenidosection2s', ContenidoSection2::all());
    }

    public function section2Update(Request $request, $id) {
        if ($request->has('val')) {
          $desc_link = $request->input('val');

          $data = array('desc_link' => $desc_link);
          DB::table('contenido_section2s')->where('id', $id)->update($data);
        }
        elseif($request->has('val1')) {
          $icon_style = $request->input('val1');

          $data = array('icon_style' => $icon_style);
          DB::table('contenido_section2s')->where('id', $id)->update($data);
        }
        else {
          $title = $request->input('title');
          $back_color = $request->input('back_color');

          $data=array("title"=>$title, "back_color"=>$back_color);
          DB::table('contenido_section2s')->update($data);
          session()->flash('success', 'La sección fue actualizada');
          //redirect
          return redirect()->back();
        }
    }
    public function section2Display(Request $request, $id) {
      $display = $request->input('servicios');
      $data=array("display"=>$display);
      DB::table('orders')->where('section', 'servicios')->update($data);
      session()->flash('success', 'La sección fue actualizada');
      //redirect
      return redirect()->back();
    }


    /*SECTION 3 -------------------------------------------------------------------------------->*/
    public function section3Edit($id) {
      return view('updateIndex/section3')
      ->with('orders', Order::orderBy('order')->get())
      ->with('contenidosection3s', ContenidoSection3::all())
      ->with('files', File::all());
    }

    public function section3Update(Request $request, $id) {
      $section3 = ContenidoSection3::find($id)->firstOrFail();
      if($request->has('val')) {
        $link_type = $request->input('val');
        $data = array('link_type' => $link_type);

        DB::table('contenido_section3s')->where('id', $id)->update($data);
      }else {
        if ($section3->link_type == 0) {
          $title = $request->input('title');
          $contenido = $request->input('contenido');
          $button = $request->input('button');
          $background_color = $request->input('background_color');
          $text_color = $request->input('text_color');
          $link = $request->input('link');

          $data=array(
            "title"=>$title,
            "contenido"=>$contenido,
            "button"=>$button,
            "background_color"=>$background_color,
            "text_color"=>$text_color,
            "link"=>$link
          );
          DB::table('contenido_section3s')->where('id', $id)->update($data);
          session()->flash('success', 'La sección fue actualizada');
          //redirect
          return redirect()->back();
        } else {
          $title = $request->input('title');
          $contenido = $request->input('contenido');
          $button = $request->input('button');
          $background_color = $request->input('background_color');
          $text_color = $request->input('text_color');
          $link = $request->input('file');

          $data=array(
            "title"=>$title,
            "contenido"=>$contenido,
            "button"=>$button,
            "background_color"=>$background_color,
            "text_color"=>$text_color,
            "link"=>$link
          );
          DB::table('contenido_section3s')->where('id', $id)->update($data);
          session()->flash('success', 'La sección fue actualizada');
          //redirect
          return redirect()->back();
        }

      }
    }

    public function section3Display(Request $request, $id) {
      $display = $request->input('info');
      $data=array("display"=>$display);
      DB::table('orders')->where('section', 'info')->update($data);
      session()->flash('success', 'La sección fue actualizada');
      //redirect
      return redirect()->back();
    }


    /*SECTION 4 -------------------------------------------------------------------------------->*/
    public function section4Edit($id) {
      return view('updateIndex/section4')->with('orders', Order::orderBy('order')->get())->with('contenidosection4s', ContenidoSection4::all());
    }
    public function section4Update(Request $request, $id) {
      $title = $request->input('title');
      $tagline = $request->input('tagline');
      $button = $request->input('button');
      $link = $request->input('link');
      $back_color = $request->input('back_color');

      $data=array("title"=>$title, "tagline"=>$tagline, "button"=>$button, "link"=>$link, "back_color"=>$back_color);
      DB::table('contenido_section4s')->update($data);
      session()->flash('success', 'La sección fue actualizada');
      //redirect
      return redirect()->back();
    }

    public function section4Display(Request $request, $id) {
      $display = $request->input('articulos');
      $data=array("display"=>$display);
      DB::table('orders')->where('section', 'articulos')->update($data);
      session()->flash('success', 'La sección fue actualizada');
      //redirect
      return redirect()->back();
    }


    /*SECTION 5 -------------------------------------------------------------------------------->*/
    public function section5Edit($id) {
      return view('updateIndex/section5')
      ->with('orders', Order::orderBy('order')->get())
      ->with('fonts', Font::all())
      ->with('font_styles', FontStyle::all())
      ->with('contenidosection5s', ContenidoSection5::all());
    }

    public function section5Update(Request $request, $id) {
      if($request->has('val')) {
        $map = $request->input('val');

        $data = array("map"=>$map);
        DB::table('contenido_section5s')->update($data);
      }
      else{
        $title = $request->input('title');
        $success = $request->input('success');
        $errors = $request->input('errors');
        $map_iframe = $request->input('map_iframe');
        $info = $request->input('info');
        $back_color = $request->input('back_color');
        $back_form = $request->input('back_form');
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $services = $request->input('services');
        $subject = $request->input('subject');
        $message = $request->input('message');
        $send_button = $request->input('send_button');


        $data=array(
          "title"=>$title,
          "success"=>$success,
          "errors"=>$errors,
          "map_iframe"=>$map_iframe,
          "info"=>$info,
          "back_color"=>$back_color,
          "back_form"=>$back_form,
          "name"=>$name,
          "email"=>$email,
          "phone"=>$phone,
          "services"=>$services,
          "subject"=>$subject,
          "message"=>$message,
          "send_button"=>$send_button
        );
        DB::table('contenido_section5s')->update($data);
        session()->flash('success', 'La sección fue actualizada');
        //redirect
        return redirect()->back();
      }
    }

    public function section5Display(Request $request, $id) {
      $display = $request->input('contact');
      $data=array("display"=>$display);
      DB::table('orders')->where('section', 'contact')->update($data);
      session()->flash('success', 'La sección fue actualizada');
      //redirect
      return redirect()->back();
    }



    /*SECTION Footer -------------------------------------------------------------------------------->*/


    // public function sectionFooterDisplay(Request $request, $id) {
    //   $display = $request->input('sectionFooter');
    //   $data=array("display"=>$display);
    //   DB::table('contenido_section_footers')->update($data);
    //   session()->flash('success', 'La sección fue actualizada');
    //   //redirect
    //   return redirect()->back();
    // }




}
