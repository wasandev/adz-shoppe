<?php

use Illuminate\Http\Request;
use App\Http\Controllers\PagesController;
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


Route::get('/shop', 'ProductController@index');
Route::get('/products/{product}', 'ProductController@show');



Route::post('/form-submit', 'LeadController@store');

Route::get('/links', 'LinksController@index')->name('link');

Route::get('/', 'PagesController@home');