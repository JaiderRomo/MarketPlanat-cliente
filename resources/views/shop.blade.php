@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 100px">
        <nav aria-label="breadcrumb">

            <link href="{{ asset('css/carrusel.css') }}" rel="stylesheet">
            <!-- Carousel Start -->
            <div class="container-fluid mb-3">
                <div class="row px-xl-5">
                    <div class="col-lg-8">
                        <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                                <li data-target="#header-carousel" data-slide-to="1"></li>
                                <li data-target="#header-carousel" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item position-relative active" style="height: 430px;">
                                    <img class="position-absolute w-100 h-100"
                                        src="https://media.istockphoto.com/photos/herbal-medicine-picture-id1165548681?k=20&m=1165548681&s=612x612&w=0&h=PxsYLx_MoiFkfksZ05xQHx8rypQm7OmrBVZsDkqoZjo="
                                        style="object-fit: cover;">
                                    <div
                                        class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                        <div class="p-3" style="max-width: 700px;">
                                            <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">
                                                Bienvenido a MarketPlant </h1>
                                            <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Muestra, expande y distribuye tus productos con la ayuda de Marketplant
                                              </p>
                                          
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item position-relative" style="height: 430px;">
                                    <img class="position-absolute w-100 h-100"
                                        src="https://media.istockphoto.com/photos/cannabis-oil-in-a-small-bottle-selective-focus-picture-id1174572658?k=20&m=1174572658&s=612x612&w=0&h=eS2wCYp_XR9fcgWPS62AM9haICck1FY2VqIDhOR4y6E="
                                        style="object-fit: cover;">
                                    <div
                                        class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                        <div class="p-3" style="max-width: 700px;">
                                            <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">
                                                Nuestros Productos </h1>
                                            <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Encontraras diversidad en plantas medicinales, ornamentales, semillas y
                                                herramientas de jardin</p>
                                            <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp"
                                                href="#">Ver</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item position-relative" style="height: 430px;">
                                    <img class="position-absolute w-100 h-100"
                                        src="https://media.istockphoto.com/photos/thyme-essential-oil-picture-id1000128624?k=20&m=1000128624&s=612x612&w=0&h=VJv4_wclTF_Yf_IxYWGPXnBPjjXtZrOTqG5Be1WXlEA="
                                        style="object-fit: cover;">
                                    <div
                                        class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                        <div class="p-3" style="max-width: 700px;">
                                            <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">
                                                Blog
                                            </h1>
                                            <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Quieres compartir tus conocimientos, curiosidades y demas experiencias. Este espacio es creado para ti.</p>
                                            <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp"
                                                href="#">Ver</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="product-offer mb-30" style="height: 200px;">
                            <img class="img-fluid"
                                src="https://images.pexels.com/photos/4505143/pexels-photo-4505143.jpeg?auto=compress&cs=tinysrgb&w=600"
                                alt="">
                            <div class="offer-text">
                                <!-- <h6 class="text-white text-uppercase">Save 20%</h6> -->
                                <h4 class="text-white mb-1">Plantas Medicinales</h4>
                                <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp"
                                    href="{{ route('plantasmedicinales.index') }}">ver</a>
                            </div>
                        </div>
                        <div class="product-offer mb-30" style="height: 200px;">
                            <img class="img-fluid"
                                src="https://images.pexels.com/photos/776656/pexels-photo-776656.jpeg?auto=compress&cs=tinysrgb&w=600"
                                alt="">
                            <div class="offer-text">
                                <!-- <h6 class="text-white text-uppercase">Save 20%</h6> -->
                                <h3 class="text-white mb-3">Blog's</h3>
                                <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp"
                                    href="{{ route('blog.index') }}">ver</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Carousel End -->



            <section>
                <!-- Categories Start -->
                <div class="container-fluid pt-5">
                    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span
                            class="bg-secondary pr-3">Categorias</span></h2>
                    <div class="row px-xl-5 pb-3">


                        <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                            <a class="text-decoration-none" href="{{ route('plantasmedicinales.index') }}">
                                <div class="cat-item d-flex align-items-center mb-4">
                                    <div class="overflow-hidden" style="width: 100px; height: 100px;">
                                        <img class="img-fluid"
                                            src="http://biobotica.com.br/wp-content/uploads/2017/02/fitoterapia-300x240.png"
                                            alt="">
                                    </div>
                                    <div class="flex-fill pl-5">
                                        <h6>Plantas Medicinales</h6>
                                        <small class="text-body"></small>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                            <a class="text-decoration-none" href="{{ route('plantasornamentales.index') }}">
                                <div class="cat-item img-zoom d-flex align-items-center mb-4">
                                    <div class="overflow-hidden" style="width: 100px; height: 100px;">
                                        <img class="img-fluid"
                                            src="https://promart.vteximg.com.br/arquivos/ids/4870886-444-444/image-1483f747ccee4ff3ac9b24fa0cb33ace.jpg?v=637828710335630000"
                                            alt="">
                                    </div>
                                    <div class="flex-fill pl-3">
                                        <h6>Plantas Ornamentales</h6>
                                        <small class="text-body"></small>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                            <a class="text-decoration-none" href="{{ route('semillas.index') }}">
                                <div class="cat-item img-zoom d-flex align-items-center mb-4">
                                    <div class="overflow-hidden" style="width: 100px; height: 100px;">
                                        <img class="img-fluid"
                                            src="https://www.pngplay.com/wp-content/uploads/2/Sunflower-Seeds-Transparent-PNG.png"
                                            alt="">
                                    </div>
                                    <div class="flex-fill pl-3">
                                        <h6>Semillas</h6>
                                        <small class="text-body"></small>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                            <a class="text-decoration-none" href="{{ route('herramientas.index') }}">
                                <div class="cat-item img-zoom d-flex align-items-center mb-4">
                                    <div class="overflow-hidden" style="width: 100px; height: 100px;">
                                        <img class="img-fluid"
                                            src="https://sc04.alicdn.com/kf/H536c84418305478c998073edfe96fd45q.png"
                                            alt="">
                                    </div>
                                    <div class="flex-fill pl-3">
                                        <h6>Herramientas para Jardineria</h6>
                                        <small class="text-body"></small>
                                    </div>
                                </div>
                            </a>
                        </div>


                    </div>
                </div>
                <!-- Categories End -->




                {{-- ultimos productos --}}



                <div class="container-fluid pt-3">
                    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-3"><span
                            class="bg-secondary pr-3">Ultimos Productos</span></h2>
                    <div class="row px-xl-5 pb-2">


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

                    </div>
                </div>
                {{--  end ultimos productos --}}





                {{-- blog --}}
                <div class="container-fluid pt-5">
                    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span
                            class="bg-secondary pr-3">BLOG'S</span></h2>
                    <div class="row px-xl-5 pb-3">

                        <div class="border-bottom pb-3 px-2 d-flex justify-content-between">
                            <div class="d-flex align-items-center">
                                <a href="{{ route('blog.create') }}" style="color: #9B5DE5; font-size: 20px;"
                                    class="text-capitalize font-weight-bold mb-2">Nuevo Blog</a>
                            </div>
                            <a href="{{ route('blog.index') }}" class="text-dark">VER TODO</a>
                        </div>
                        <div class="container ">
                            <div class="row">
                                <link href="{{ asset('css/blogcard.css') }}" rel="stylesheet">
                                @foreach ($blogArray as $blogs)
                                  
                                        <div class="projcard-container">

                                            <div class="projcard projcard-customcolor" style="--projcard-color: #181715;">
                                                <div class="projcard-innerbox">
                                                    <img class="projcard-img"
                                                    src="{{ 'http://localhost/api.marketplant.v1/public/storage/imagen/' . $blogs['imagen'] }}"
                                                    alt="" />
                                                    <div class="projcard-textbox">
                                                        <div class="projcard-title">{{ $blogs['titulo'] }}</div>
                                                        <div class="projcard-subtitle">{{ $blogs['created_at'] }}</div>
                                                        <div class="projcard-bar"></div>
                                                        <div class="projcard-description">{{ $blogs['descripcion'] }}</div>
                                                        <div class="projcard-tagbox"> </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                           
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                {{--  end blog --}}





                <!-- Offer Start -->
                <div class="container-fluid pt-5 pb-3">
                    <div class="row px-xl-5">
                        <div class="col-md-6">
                            <div class="product-offer mb-30" style="height: 300px;">
                                <img class="img-fluid"
                                    src="https://jumpseller.co/generated/images/learn/others/chat-marketing-chatbot-800-d5ed84a7f.png"
                                    alt="">
                                <div class="offer-text">
                                    <h2 class="text-white text-uppercase">Chatea</h2>
                                    <br>
                                    <h6 class="text-white text-uppercase">Puedes enviar mensajes directamente al vendedor
                                    </h6>
                                    {{-- <a href="" class="btn btn-primary">Shop Now</a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="product-offer mb-30" style="height: 300px;">
                                <img class="img-fluid"
                                    src="https://previews.123rf.com/images/dmf87/dmf871703/dmf87170300027/74185276-muchas-plantas-y-%C3%A1rboles-diferentes-en-los-potes-ofrecidos-para-la-venta-en-el-centro-de-jard%C3%ADn.jpg"
                                    alt="">
                                <div class="offer-text">
                                    <h2 class="text-white text-uppercase">Encuentra</h2>
                                    <h6 class="text-white text-uppercase">Ofrecemos una gran variedad de productos</h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Offer End -->
            </section>
        @endsection
