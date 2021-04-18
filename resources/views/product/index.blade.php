@extends('layouts.master')

@section('content')
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>{{ $categoryName ?? null }} {{__('Shop')}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
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
                        <h2><a href="{{route('product.show', $item->id)}}">{{$item->name}}</a></h2>
                        <div class="product-carousel-price">
                            <ins>${{$item->price}}</ins>
                        </div>  
                        
                        <div class="product-option-shop">
                            <a class="add_to_cart_button" href="{{route('cart.add', $item->id)}}">{{__('Add to cart')}}</a>
                        </div>                       
                    </div>
                </div>
               @endforeach
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="product-pagination text-center">
                        <nav>
                          <ul class="pagination">
                          </ul>
                        </nav>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection