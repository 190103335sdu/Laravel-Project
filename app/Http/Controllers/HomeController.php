<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use TCG\Voyager\Models\Category;
class HomeController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index(){
        $products = Product::take(10)->get();

        $categories = Category::all();
        
        
        return view('home',['sliderProducts'=>$products, 'categories'=>$categories]);
    }
}

