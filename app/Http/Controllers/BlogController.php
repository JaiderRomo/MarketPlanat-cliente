<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use App\Models\Image;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $blogs = Http::get('http://api.marketplant.v1/v1/blogs');
        
        $blogArray = $blogs->json();

        return view('blog.index', compact('blogArray'));
        // $blog = Blog::all();
        // return view('blog.index',compact('blog'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        Http::post('http://api.marketplant.v1/v1/blogs', $request->all());
      
       // return $request;
         return redirect()->Route('blog.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blogs = Blog::find($id);
        return view('blog.show', compact('blogs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blogs = Blog::findOrFail($id);
        return view('blogs.edit', compact('blogs'));
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


        $blogs = Blog::findOrFail($id);
        $blogs->nombre = $request->nombre;
        $blogs->descripcion = $request->descripcion;

        $file = $request->file("imagen");
        $nombreArchivo = "img_" . time() . "." . $file->guessExtension();
        $request->file('imagen')->storeAs('public/images', $nombreArchivo);
        $blogs->imagen = $nombreArchivo;

        $blogs->cantidad = $request->cantidad;
        $blogs->precio = $request->precio;
        $blogs->cantidad = $request->cantidad;


        $blogs->user_id = auth()->user()->id;

        $blogs->save();
        return redirect()->Route('perfil_us.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blogs = Blog::findOrFail($id);
        $blogs->delete();

        return redirect()->Route('perfil_us.index', $blogs);
    }
}
