@extends('layouts.main')
@section('nav')
    @include('partials.nav')
@endsection

@section('content')

    
    
    {{-- <div class="bg-hero h-hero flex items-center justify-center">
        <h1 class="text-center text-white text-3xl md:text-5xl max-w-lg leading-tight">Sisahy Go </h1>
    </div> --}}

    <div class="container mx-auto">
           
        <div class="flex flex-wrap max-w-1xl mx-auto">
            @foreach ($tasks as $task)
                <div class="w-full md:w-1/2 lg:w-1/3 flex flex-col">
                    <a href="/tasks/{{ $task->name }}" class=" flex flex-col flex-1 rounded shadow hover:shadow-lg translateY-2px m-6 no-underline transition" >
                    
                        <div class="aspect-16x9 rounded-t" style="background:url('{{  Storage::url($task->taskimage) }}') no-repeat center center/cover"></div>
                        <div class="p-6 flex flex-col flex-1 bg-blue">
                            <h2 class="mb-3 text-white text-lg">{{ $task->name }}</h2>  
                            <p class=" text-grey-lighter no-underline text-base">{{ $task->description }}</p>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
        <div class='text-center text-red-light my-2 text-xl md:text-xl'>
            ข่าวสาร/โปรโมชั่น
        </div>
         <div class="flex flex-wrap max-w-1xl mx-auto">
            @foreach ($posts as $post)
                <div class="w-full md:w-1/2 lg:w-1/2 flex flex-col">
                    <a href="/posts/{{ $post->name }}" class=" flex flex-col flex-1 rounded shadow hover:shadow-lg translateY-2px m-6 no-underline transition" >
                    
                        <div class="aspect-16x9 rounded-t" style="background:url('{{  Storage::url($post->postimage) }}') no-repeat center center/cover"></div>
                        <div class="p-6 flex flex-col flex-1 bg-blue">
                            <h2 class="mb-3 text-white text-lg">{{ $post->name }}</h2>  
                            <p class="text-grey-lighter no-underline text-base">{{ $post->description }}</p>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
    </div>
    

@endsection
