<?php
namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Http;

class CartController extends Controller
{
    public function shop()
    {
    //     $blog= Blog::paginate(4);
    //     $products = Product::paginate(4);
    //   // dd($products);
    //     return view('shop')->withTitle('MarketPlant | SHOP')->with(['products' => $products,'blog'=>$blog]);
  
  
    $blog= Http::get('http://api.marketplant.v1/v1/blogs');
    $blogArray = $blog->json();
   
    $array = collect($blogArray)->slice(0,5);

  // return $array;


    $pro= Http::get('http://api.marketplant.v1/v1/productos');
    $proArray = $pro->json();

      $arrayPro = collect($proArray)->slice(0,4);
   
      //     return $array;

    // $blogs = Blog::all();
    // $productos = Product::all();
    return view('shop')->withTitle('MarketPlant | Shop')->with(['proArray' => $arrayPro, 'blogArray'=>$array]);
  
  
    }

    public function cart()  {

        
        $cartCollection = \Cart::getContent();
        //dd($cartCollection);
        return view('cart')->withTitle('MarketPlant | Carrito')->with(['cartCollection' => $cartCollection]);;
    }
    public function remove(Request $request){
        \Cart::remove($request->id);
        return redirect()->route('cart.index')->with('success_msg', 'El producto ha sido eliminado!');
    }

    public function add(Request$request){
        \Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'imagen' => $request->imagen,
               
            )
        ));
        return redirect()->route('cart.index')->with('success_msg', 'Item Agregado a sú Carrito!');
    }

    public function update(Request $request){
        \Cart::update($request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
        ));
        return redirect()->route('cart.index')->with('success_msg', 'Carrito actualizado!');
    }

    public function clear(){
        \Cart::clear();
        return redirect()->route('cart.index')->with('success_msg', 'El carrito esta vacio!');
    }

}
