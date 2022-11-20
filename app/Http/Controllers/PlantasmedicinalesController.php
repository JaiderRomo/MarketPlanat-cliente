<?php

namespace App\Http\Controllers;

use App\Models\plantamedicinal;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
USE App\Models\Product;
use App\Models\User;
class PlantasmedicinalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pro= Http::get('http://api.marketplant.v1/v1/medicinales');
        $proArray = $pro->json();

       // $medicinal = Product::all();
      return view('plantasmedicinales.index',compact('proArray'))  ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    return view('plantasmedicinales.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $medicinal  = new Product();

        $file=$request->file("imagen");
        $nombreArchivo = "img_".time().".".$file->guessExtension();
        $request->file('imagen')->storeAs('public/productos', $nombreArchivo );
        $medicinal->imagen = $nombreArchivo;
       
                 
         
         $User = user::all();
         foreach ($User as $user)
             if (auth()->user()->id==$user->id) {
                 $medicinal->user_id= $user->id;
             };
        
        $medicinal->nombre = $request->nombre;
        $medicinal->descripcion = $request->descripcion;
        $medicinal->categoria_id = $request->categoria_id="1";
        $medicinal->beneficios = $request->beneficios;
        $medicinal->usos = $request->usos;
        $medicinal->preparacion = $request->preparacion;
        $medicinal->precio = $request->precio;
        $medicinal->cantidad = $request->cantidad;
        $medicinal->ubicacion = $request->ubicacion;
        $medicinal->save();
        return redirect()->route('plantasmedicinales.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pro= Http::get('http://api.marketplant.v1/v1/medicinales/'. $id);
        $medicinales = $pro->json();
            // $producto = Product::find($id);
            // $user= User::all();
        //    return view('product.show',compact('producto'));

    //     $medicinales = Product::find($id);
     return view('plantasmedicinales.show',compact('medicinales'));
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
