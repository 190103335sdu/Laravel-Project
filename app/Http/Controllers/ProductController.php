<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categoryId = request('category_id');
        $categoryName = null;

        if($categoryId) {
            $category = Category::find($categoryId);
            $categoryName = ucfirst($category->name);
            $products = $category->allProducts();
        }else{
            $products = Product::take(10)->get();
        }
        return view('product.index',compact('products', 'categoryName'));
    }

 /*   public function search(Request $request){

        $query = $request->input('query');
        
        $products = Product::where('name','LIKE','%'.$query.'%')->get();

        return  $request->input()view('product.catalogue', compact('products'));
    }*/

    public function search(Request $request){
    // Get the search value from the request
    $search = $request->input('query');

    // Search in the title and body columns from the posts table
    $products = Product::query()
        ->where('name', 'LIKE', "%$search%")
        ->paginate(10);
    return view('product.catalogue',compact('products'));

    // Return the search view with the resluts compacted
    }

    public function singleProduct(Product $product){
        $product = Product::find($product->id);
        $products = Product::take(5)->get();
        return view('product.single_product', compact('product','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
   public function show(Product $product)
    {

        return view('product.show', compact('product'));

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

}
