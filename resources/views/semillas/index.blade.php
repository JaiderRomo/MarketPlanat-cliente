@extends('layouts.app')
<br><br><br><br>
@section('title', 'Productos')
@section('content')
<div class="text-dark text-center  h3">SEMILLAS</div>
<br>
{{-- <div class="text-dark text-center  h3">SEMILLAS</div>
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<div id="cards_landscape_wrap-2">
    <div class="container ">
        <div class="row">


            @foreach ($semilla as $product)
                @if ($product->categoria_id == '3')
                    <!-- Topic Cards -->

                    <a href="">
                        <div class="card-flyer col-3">
                            <div class="text-box">
                                <div class="image-box">
                                    <img src="{{ 'http://localhost/marketplant/public/storage/productos/' . $product->imagen }}"
                                        alt="" />
                                </div>
                                <form action="{{ route('cart.store') }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{ $product->id }}" id="id" name="id">
                                    <input type="hidden" value="{{ $product->nombre }}" id="name" name="name">
                                    <input type="hidden" value="{{ $product->precio }}" id="price" name="price">
                                    <input type="hidden" value="{{ $product->imagen }}" id="imagen" name="imagen">
                                    <input type="hidden" value="1" id="quantity" name="quantity">

                                    <div class="text-container">
                                        <h6><a href="{{ route('semillas.show', $product->id) }}">
                                                <h6 class="card-title">{{ $product->nombre }}
                                            </a></h6>
                                        <h4>Precio: ${{ $product->precio }}</h4>
                                        <br>
                                        <button class="btn btn-primary" class="tooltip-test" title="add to cart">
                                            <i class="fa fa-shopping-cart"></i> Agregar al Carrito
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </a>
                @endif
            @endforeach

        </div>
    </div>
</div> --}}

<link href="{{ asset('css/product_card.css') }}" rel="stylesheet">

<div class="container ">


    <div class="row">

        @foreach ($proArray as $pro)
        @if ($pro['categoria_id'] == '3')
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

                            <a href="{{ route('semillas.show', $pro['id']) }}">

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
            @endif
        @endforeach

    </div>
</div>
@endsection