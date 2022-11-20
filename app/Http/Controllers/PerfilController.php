<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use App\Models\Blog;
use App\Models\Product;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
     public function listarBlogs(Request $request){
        
        $blogs = Http::get('http://api.marketplant.v1/v1/blogs');
        
        $blogArray = $blogs->json();

        return view('perfil_us.listarBlogs', compact('blogArray'));
     }

    public function index(Request $request)
    {
        $pro= Http::get('http://api.marketplant.v1/v1/productos');
        $productos = $pro->json();

       
        // $blogs = Blog::all();
       //  $productos = Product::all();
        return view('perfil_us.index')->withTitle('MarketPlant | PERFIL')->with(['productos' => $productos]);
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
        //
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
    public function edit( $id)
    {
        $prod= Http::get('http://api.marketplant.v1/v1/productos/'.$id);
        $product = $prod->json();

       // $product = Product::findOrFail($id);
       return view('perfil_us.edit')->withTitle('MarketPlant | PERFIL')->with(['product' => $product]);
     //   return view('perfil_us.edit', compact('product'));
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
    
        Http::put('http://api.marketplant.v1/v1/productos'.$id,$request->all());
    
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
        // $product = Product::findOrFail($id);
        // $product->delete();
        Http::delete('http://api.marketplant.v1/v1/productos/'.$id);
        // $user=User::findOrFail($id);
        // $user->delete();
        return redirect()->Route('perfil_us.index');
    }
}
