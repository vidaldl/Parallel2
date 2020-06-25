<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests\Posts\CreatePostsRequest;
use App\Http\Requests\Posts\UpdatePostsRequest;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\Category;


class PostController extends Controller
{
  //Constructor

  public function __construct() {
    $this->middleware('verifyCategoriesCount')->only(['create', 'store',]);
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with('posts', Post::orderByDesc('id')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create')->with('categories', Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function redirect1() {
       $latest = DB::table('posts')->orderBy('id', 'desc')->first();

       return redirect('posts/' . $latest->id . '/edit');
     }
    public function store(Request $request)
    {


        // Upload the image
        //$image = $request->image->store('posts');

        $title = $request->input('title');
        $description = $request->input('description');
        $category = $request->input('category');
        $published_at = $request->input('published_at');
        $contenido = $request->input('contenido');
        $button = $request->input('button');
        $link = $request->input('link');
        $data['category_id'] = $request->category;



          if ($request->hasFile('image')) {


            $this->validate($request, [
                'image' => 'image|required|mimes:png,jpg,jpeg,svg'
             ]);
            //upload it
            $image = $request->file('image')->store('content/posts');

            $data=array('image'=>$image);
            DB::table('posts')->insert($data);
            $latest = DB::getPdo('posts')->lastInsertId();
            return redirect('posts/' . $latest . '/edit');

          }

          else {
            // create the post



            $data=array("title"=>$title,"description"=>$description,"category_id"=>$category, "published_at"=>$published_at, "contenido"=>$contenido, "button"=>$button, "link"=>$link);
            DB::table('posts')->insert($data);
            session()->flash('success', 'La sección fue actualizada');
            //redirect
            if(isset($post)){
              redirect(route('posts/'));
            }else{
            $latest = DB::getPdo('posts')->lastInsertId();
            return redirect('posts/' . $latest . '/edit');
            }

          }
        // if ($request->tags) {
        //   $post->tags()->attach($request->tags);
        // }

        // flash message
        session()->flash('success', 'El post fue creado!');
        //redirect user
        return redirect(route('posts.index'));
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
    public function edit(Post $post)
    {
        return view('posts.create')->with('post', $post)->with('categories', Category::all());
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
        $description = $request->input('description');
        $category = $request->input('category');
        $published_at = $request->input('published_at');
        $contenido = $request->input('contenido');
        $button = $request->input('button');
        $link = $request->input('link');
        $data['category_id'] = $request->category;


        $oldImage = DB::table('posts')->where('id', $id)->first();

        //check if new image
        if ($request->hasFile('image')) {
          $this->validate($request, [
              'image' => 'image|required|mimes:png,jpg,jpeg,svg'
           ]);
          //upload it
          $image = $request->file('image')->store('content/posts/');
          //Image Intervention



          Storage::delete($oldImage->image);

          $data=array('image'=>$image);
          DB::table('posts')->where('id', $id)->update($data);

        }else {

          $data=array("title"=>$title,"description"=>$description,"category_id"=>$category, "published_at"=>$published_at, "contenido"=>$contenido, "button"=>$button, "link"=>$link);
          DB::table('posts')->where('id', $id)->update($data);
          session()->flash('success', 'La sección fue actualizada');
          //redirect
          return redirect()->back();



        //flash
        session()->flash('success', 'El Post fué actualizado');
        //redirect
        return redirect(route('posts.index'));
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) //Do not use route model binding
    {
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();

        if ($post->trashed()) {
          $post->deleteImage();
          $post->forceDelete();
          session()->flash('success', 'Post eliminado permanentemente');
          return redirect(route('trashed-posts.index'));
        }else {
          $post->delete();
          session()->flash('success', 'Post enviado a la papelera');
          return redirect(route('posts.index'));
        }

    }

    public function trashed() {
      $trashed = Post::onlyTrashed()->get();
      return view('posts.index')->with('posts', $trashed);
    }

    public function restore($id) {
      $post = Post::withTrashed()->where('id', $id)->firstOrFail();
      $post->restore();
      session()->flash('success', 'El Post Fue Restaurado');
      return redirect()->back();
    }
}
