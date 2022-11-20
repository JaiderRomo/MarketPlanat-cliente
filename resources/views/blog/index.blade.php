@extends('layouts.app')

@section('title', 'Blog')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
             <br>
             <div class="text-dark text-center  h3">BIENVENIDO A NUESTRO BLOG</div>
                <link href="{{ asset('css/blogcard.css') }}" rel="stylesheet">
                @foreach ($blogArray as $blog)
                    <div class="projcard-container">
                        <div class="projcard projcard-customcolor" style="--projcard-color: #181715;">
                            <div class="projcard-innerbox">
                                <img class="projcard-img"
                                     src="{{ 'http://localhost/api.marketplant.v1/public/storage/imagen/' . $blog['imagen'] }}"
                                    alt="" /> 
                                <div class="projcard-textbox">
                                    <div class="projcard-title">{{ $blog['titulo'] }}</div>
                                    <div class="projcard-subtitle">{{ $blog['created_at'] }}</div>
                                    <div class="projcard-bar"></div>
                                    <div class="projcard-description">{{ $blog['descripcion'] }}</div>
                                    <div class="projcard-tagbox"> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
