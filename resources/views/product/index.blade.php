@extends('layouts.app')
<br><br><br><br>
@section('title', 'Productos')
@section('content')
<div class="text-dark text-center  h3">TODOS NUESTROS PRODUCTOS</div>
<br>

<link href="{{ asset('css/product_card.css') }}" rel="stylesheet">

<div class="container ">


    <div class="row">

        @foreach ($proArray as $pro)
     
            <div class="col-sm-3	col-md-3	">
                {{-- cards 1 --}}
                <div class="card p-4">
                    <form action="{{ route('cart.store') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{ $pro['id'] }}" id="id"
                            name="id">
                        <input type="hidden" value="{{ $pro['nombre'] }}" id="name"
                            name="name">
                        <input type="hidden" value="{{ $pro['precio'] }}" id="price"
                            name="price">
                        <input type="hidden" value="{{ $pro['imagen']}}" id="imagen"
                            name="imagen">
                        <input type="hidden" value="1" id="quantity" name="quantity">
                        <div class="wrapper">

                            <a href="{{ route('product.show', $pro['id']) }}">

                                <div class="text-center">
                                    <img class="card-img"
                                        src="{{ 'http://localhost/api.marketplant.v1/public/storage/productos/' . $pro['imagen'] }}" />
                                    <br>
                                </div>
                            </a>
                            <div class="product-details">
                                <span class="font-weight-bold d-block">$
                                    {{ $pro['precio'] }}</span>
                                <span>{{ $pro['nombre'] }}</span>
                                <div class="buttons d-flex flex-row">
                                    <div class="cart"><i class="fa fa-shopping-cart"></i></div>
                                    <button class="btn btn-success cart-button btn-block"
                                        title="add to cart"><span class="dot">1</span>Add To
                                        Cart
                                    </button>
                                </div>
                                <div class="weight">
                                    <small>{{ $pro['cantidad'] }} en stock</small>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
                   @endforeach

    </div>
</div>
@endsection