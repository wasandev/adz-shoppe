<?php

use Illuminate\Http\Request;
use App\Http\Controllers\PagesController;
use App\Order;
use Illuminate\Support\Facades\Input;
//use Illuminate\Database\Eloquent\Collection;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Auth::routes();

Route::get('/', 'PagesController@home');


Route::any('/tracking', function () {

  $q = Input::get('q');

  if ($q != "") {

    $order = Order::where('order_header_no', 'like', '%' . $q)
      ->orWhere('cname', 'like', '%' . $q . '%')
      ->orWhere('sname', 'like', '%' . $q . '%')
      ->get();

    if (count($order) > 0)
      return view('tracking')->withDetails($order)->withQuery($q);
    else
      return view('tracking')->withMessage('ไม่พบข้อมูลใบรับส่งสินค้าในระบบ กรุณาลองใหม่ !');
  }
  return view('tracking')->withMessage('โปรดป้อนเลขที่ใบรับส่ง,ชื่อผู้ส่งหรือชื่อผู้รับที่ต้องการติดตามสินค้า');

})->name("tracking"); 
  

  
