@extends('layouts.main')
@section('nav')
    @include('partials.nav')
@endsection

@section('content')
<div class="bg-hero h-hero flex items-center justify-center">
  <h1 class="text-center text-white text-3xl md:text-5xl max-w-lg leading-tight"> Welcome to ADZ Shoppe Online Store </h1>
</div>
<h2 class=" text-center my-6 text-2xl md:text-4xl">Our Links</h2>
<div class="flex flex-wrap max-w-2xl mx-auto my-8">
  @foreach ($links as $link)
      <div class="w-full md:w-1/2 lg:w-1/3 flex flex-col">
          <a href="{{ $link->url }}" target="_blank" class=" flex flex-col flex-1 rounded shadow hover:shadow-lg translateY-2px m-6 no-underline transition" >
          
              <div class="aspect-16x9 rounded-t" style="background:url(' {{'storage/'.$link->link_image }}') no-repeat center center/cover"></div>
              <div class="p-6 flex flex-col flex-1">
                  <h2 class="mb-3 text-grey-darkest text-2xl">{{ $link->title }}</h2>  
                  <p class="text-grey-darkest">{{ $link->description }}</h2>                      
                  <p class="text-blue no-underline font-bold">See Description</p>
              </div>
          </a>
      </div>
  @endforeach

</div>

@endsection