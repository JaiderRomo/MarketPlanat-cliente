@extends('layouts.app')



@php
// SDK de Mercado Pago
require base_path('vendor/autoload.php');
// Agrega credenciales
MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));

// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();

// Crea un ítem en la preferencia
$item = new MercadoPago\Item();
$item->title = 'Mi producto';
$item->quantity = 1;
$item->unit_price = 75;
$preference->items = array($item);
$preference->save();
@endphp


@section('content')
    <div class="container" style="margin-top: 80px">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Tienda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Carrito</li>
            </ol>
        </nav>
        @if(session()->has('success_msg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('success_msg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif
        @if(session()->has('alert_msg'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session()->get('alert_msg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif
        @if(count($errors) > 0)
            @foreach($errors0>all() as $error)
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ $error }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endforeach
        @endif
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <br>
                @if(\Cart::getTotalQuantity()>0)
                    <h4>{{ \Cart::getTotalQuantity()}} Producto(s) en el carrito</h4><br>
                @else
                    <h4>No hay Producto(s) En Su Carrito</h4><br>
                    <a href="{{ route('product.index') }}" class="btn btn-dark">Continue en la tienda</a>
                @endif

                @foreach($cartCollection as $item)
                    <div class="row">
                        <div class="col-lg-3">
                            <img src="{{'http://localhost/api.marketplant.v1/public/storage/productos/' .$item->attributes->imagen }}" class="img-thumbnail" width="200" height="200">
                        </div>
                        <div class="col-lg-5">
                            <p>
                                <b>Nombre: </b>{{ $item->name }}<br>
                                <b>Precio: </b>${{ $item->price }}<br>
                                <b>Sub Total: </b>${{ \Cart::get($item->id)->getPriceSum() }}<br>
                                {{--                                <b>With Discount: </b>${{ \Cart::get($item->id)->getPriceSumWithConditions() }}--}}
                            </p>
                        </div>
                        <div class="col-lg-4">
                            <div class="row">
                                <form action="{{ route('cart.update') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group row">
                                        <input type="hidden" value="{{ $item->id}}" id="id" name="id">
                                        <input type="number" class="form-control form-control-sm" value="{{ $item->quantity }}"
                                               id="quantity" name="quantity" style="width: 70px; margin-right: 10px;">
                                        <button class="btn btn-secondary btn-sm" style="width: 80px"><i class="fa fa-edit"></i></button>
                                    </div>
                                </form>
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                                    <button class="btn btn-dark btn-sm" style="margin-right: 10px;"><i class="fa fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
                @if(count($cartCollection)>0)
                    <form action="{{ route('cart.clear') }}" method="POST">
                        {{ csrf_field() }}
                        <br>
                        <button class="btn btn-secondary btn-md">Borrar Carrito</button> 
                    </form>
                @endif
            </div>
            @if(count($cartCollection)>0)
                <div class="col-lg-5">
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><b>Total: </b>${{ \Cart::getTotal() }}</li>
                       
                            
                       
                        </ul>

                    </div>
                    <br>
                    <div class="cho-container">
                    </div>
                    <br>
                    <a href="{{ route('product.index') }}" class="btn btn-dark"  style="width: 500px" >Continuar comprando</a>
                   <br>
                   <br>
                    <div id="smart-button-container">
                        <div style="text-align: center;">
                          <div id="paypal-button-container"></div>
                        </div>
                      </div>
                    <script src="https://www.paypal.com/sdk/js?client-id=sb&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>
                    <script>
                      function initPayPalButton() {
                        paypal.Buttons({
                          style: {
                            shape: 'rect',
                            color: 'gold',
                            layout: 'vertical',
                            label: 'paypal',
                            
                          },
                  
                          createOrder: function(data, actions) {
                            return actions.order.create({
                              purchase_units: [{"amount":{"currency_code":"USD","value":1}}]
                            });
                          },
                  
                          onApprove: function(data, actions) {
                            return actions.order.capture().then(function(orderData) {
                              
                              // Full available details
                              console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                  
                              // Show a success message within this page, e.g.
                              const element = document.getElementById('paypal-button-container');
                              element.innerHTML = '';
                              element.innerHTML = '<h3>Thank you for your payment!</h3>';
                  
                              // Or go to another URL:  actions.redirect('thank_you.html');
                              
                            });
                          },
                  
                          onError: function(err) {
                            console.log(err);
                          }
                        }).render('#paypal-button-container');
                      }
                      initPayPalButton();
                    </script>
                    
                </div>
            @endif
        </div>
        <br><br>
    </div>
    
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script>
        // Agrega credenciales de SDK
        const mp = new MercadoPago("{{config('services.mercadopago.key')}}", {
          locale: "es-AR",
        });
      
        // Inicializa el checkout
        mp.checkout({
          preference: {
            id: '{{ $preference->id}}',
          },
          render: {
            container: ".cho-container", // Indica el nombre de la clase donde se mostrará el botón de pago
            label: "Pagar con Mercado Pago", // Cambia el texto del botón de pago (opcional)
          },
        });
      </script>

@endsection




