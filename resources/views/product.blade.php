@extends('layouts.main')
@section('nav')
    @include('partials.nav')
@endsection

@section('content')
    
    
    <div id="app" class="flex flex-col lg:flex-row justify-between">
        <div class="w-full lg:w-1/2 px-6 py-2 lg:p-6">         
            <img src="{{$product->preview_image_url}}" alt="">
        </div>
        <div class="w-full lg:w-1/2 px-6 py-2 lg:p-6"> 
            <h2 class="my-2 text-4xl text-grey-darkest">{{$product->title}}</h2>
            <p class="mb-6 leading-normal text-grey-darker">{{$product->description}}</p>
            <p class="mb-6 text-grey-darker text-lg">{{ '$'.money_format('%.2n', $product->price/100 )}} </p>
            <color-selector-component :colors= "{{ $colors }}" class="mb-4"/></color-selector-component> 
            <size-selector-component :product= "{{ $product }}" class="mb-4"/></size-selector-component>
            <cart-button></cart-button>
           
        
        </div>        
    </div>
@endsection
