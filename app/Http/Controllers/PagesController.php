<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class PagesController extends Controller
{
    public function home()
    {
        $products = Product::all();
        //dd($products);
        return view('welcome', ['products' => $products]);

    }
}
