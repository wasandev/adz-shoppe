@extends('layouts.main')
@section('nav')
    @include('partials.nav')
@endsection
@section('content')
<div class="flex flex-wrap items-center px-6 py-8 md:px-0">
    <div class="w-full max-w-xl md:mx-auto">
      <div class="rounded shadow">
            <div class="font-xl text-lg text-white bg-sisahy-light p-1 rounded-t">
                <svg class="fill-current h-4 w-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 2C0 .9.9 0 2 0h16a2 2 0 0 1 2 2v2H0V2zm1 3h18v13a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V5zm6 2v2h6V7H7z"/></svg>
                ติดตามสินค้า(Beta version)
            </div>
            <div class="bg-white p-3 rounded-b py-8">
              <form class="form-horizontal" method="POST" action="/tracking">
                {{ csrf_field() }}
                <div class="flex items-stretch mb-3">
                  
                  <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline" 
                      name="q"  type="text" placeholder="ป้อนเลขที่ใบรับส่ง ชื่อผู้ส่ง หรือชื่อผู้รับที่ท่านทราบ">
                  <button type="submit" class="bg-sisahy-light hover:bg-siahy text-white font-bold py-2 px-4 rounded inline-flex items-center px-4">
                            <svg class="fill-current h-4 w-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/></svg>
                            <span> ค้นหา</span>
                  </button> 
                </div>
              </form>
            </div>
      </div>
  </div>
</div>
<div class="flex flex-wrap items-center px-6  md:px-0">
 <div class="w-full max-w-xl md:mx-auto py-2">

    @if(isset($details))
    <div class="flex flex-wrap max-w-xl mx-auto">
       
        @foreach ($details as $order)
            
            <div class="w-full sm:w-1/1 md:w-1/2 lg:w-1/2 flex flex-col rounded overflow-hidden shadow-lg py-4">
                     
                    <div class="p-3 flex flex-col flex-1 ">
                        
                        <div class="font-base text-lg text-white bg-red-light p-2  text-center">
                             @switch($order->order_status)
                                @case('1')
                                    <h2 class="no-underline text-base">รับสินค้าไว้แล้วเตรียมจัดส่ง</h2>                                    
                                    @break
                                @case('2')
                                    <h2 class="no-underline text-base">สินค้าอยู่ระหว่างขนส่ง</h2>                                    
                                    @break
                                @case('3')
                                    <h2 class="no-underline text-base">จัดส่งถึงผู้รับแล้ว</h2>                                    
                                    @break
                                @case('4')
                                    <h2 class="no-underline text-base">สินค้าอยู่ที่สาขาปลายทาง</h2>
                                    @break
                                @case('5')
                                    <h2 class="no-underline text-base">จัดส่งถึงผู้รับแล้ว</h2>                                    
                                    @break
                                @case('6')
                                    <h2 class="no-underline text-base">ลูกค้าได้รับสินค้าแล้ว</h2>                                     
                                    @break
                                
                            @endswitch
                            <p class=" no-underline text-sm">วันที่อัพเดทข้อมูล : {{ $order->updated_at }}</p>
                            
                        </div>
                        <p class="text-sisahy text-sm font-semibold">ใบรับส่ง : {{ $order->order_header_no }}</p>  
                        <p class="text-sisahy text-sm font-semibold">วันที่ส่ง : {{  $order->order_header_date }}</p>  
                        <p class="text-black no-underline text-sm">ชื่อผู้ส่ง : {{ $order->cname }}</p>
                        <p class="text-black no-underline text-sm">ชื่อผู้รับ : {{ $order->sname }} / {{ $order->amphur_name }} / {{ $order->province_name }} </p>
                        <div class="px-2 py-2">
                            <svg class="fill-current text-grey w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M10 20S3 10.87 3 7a7 7 0 1 1 14 0c0 3.87-7 13-7 13zm0-11a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                            </svg>
                            <span class="inline-block  rounded-full   text-base font-semibold text-sisahy mr-1">{{ $order->branchname }} </span><br/>
                            <svg class="fill-current text-grey w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M20 18.35V19a1 1 0 0 1-1 1h-2A17 17 0 0 1 0 3V1a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v4c0 .56-.31 1.31-.7 1.7L3.16 8.84c1.52 3.6 4.4 6.48 8 8l2.12-2.12c.4-.4 1.15-.71 1.7-.71H19a1 1 0 0 1 .99 1v3.35z"/>
                            </svg>
                            <span class="inline-block  rounded-full   text-base font-semibold text-sisahy mr-1">{{ $order->branchphone }}</span>
                            
                        </div>
                    </div>
               
            </div>
        @endforeach

    </div>
    
    @elseif(isset($message))
    <div class=" items-center bg-red-lightest border border-red-light text-red-dark px-4 py-3 rounded relative" role="alert">
            <span class="font-sm">{{ $message }}</span>           
            <span class="block sm:inline text-center"><br/>***สามารถติดตามสินค้าได้ในวันถัดไปหลังจากวันส่งสินค้า ติดตามข้อมูลย้อนหลังได้ 7 วัน*** </span>
                <span class="absolute pin-t pin-b pin-r px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
                 
    </div>

    @endif
    
 </div>

 <div class="w-full max-w-xl md:mx-auto py-4">
    <div class="text-center py-4 lg:px-4">
        <div class="p-2 bg-sisahy-darker items-center text-sisahy-lightest leading-none lg:rounded-full flex lg:inline-flex" role="alert">
            <span class="flex rounded-full bg-sisahy uppercase px-2 py-1 text-xs  mr-3">SISAHYGO</span>
            <span class="font-sm mr-2 text-left flex-auto">พบกับระบบบริการลูกค้าเต็มรูปแบบเร็วๆนี้ สอบถามเพิ่มเติม T: 024516712-5</span>
            <svg class="fill-current opacity-75 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z"/></svg>
        </div>
    </div>
 </div>

</div>
@endsection