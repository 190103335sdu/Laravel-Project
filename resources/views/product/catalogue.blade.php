@extends('layouts.master')

@section('content')
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>{{ $categoryName ?? null }} Shop</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <form class="form-inline" action="{{route('products.search')}}" method="GET">
                        <input class="form-control mr-sm-2" placeholder="Search" type="text" name="query">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
            	@foreach($products as $item)
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <img src="{{URL::asset('/storage/'.$item->cover_img)}}" width="250px" height="300px" alt="" style="width: 250px !important; height: 350px !important;">
                        </div>
                        <h2><a href="">{{$item->name}}</a></h2>
                        <div class="product-carousel-price">
                            <ins>${{$item->price}}</ins>
                        </div>  
                        
                        <div class="product-option-shop">
                            <a class="add_to_cart_button" href="{{route('cart.add', $item->id)}}">Add to cart</a>
                        </div>                       
                    </div>
                </div>
               @endforeach
            </div>
                                {{$products->appends(['query'=>request('query')])->render()}}

            <div class="row">
                <div class="col-md-12">
                    <div class="product-pagination text-center">
                        <nav>
                          <ul class="pagination">
                            <li>
                              <a href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                              </a>
                            </li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li>
                              <a href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                              </a>
                            </li>
                          </ul>
                        </nav>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection