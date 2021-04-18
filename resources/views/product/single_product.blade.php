@extends('layouts.master')

@section('content')
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>{{__('Shop')}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">{{__('Search Products')}}</h2>
                        <form action="">
                            <input type="text" placeholder="Search products...">
                            <input type="submit" value="Search">
                        </form>
                    </div>
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">{{__('Products')}}</h2>
                         @foreach ($products as $item)

                        <div class="thubmnail-recent">
                            <img src="{{URL::asset('/storage/'.$item->cover_img)}}" class="recent-thumb" alt="">
                            <h2><a href="{{route('product.show', $item->id)}}">{{$item->name}}</a></h2>
                            <div class="product-sidebar-price">
                                <ins>{{$item->price}}</ins>
                            </div>                             
                        </div>
                        @endforeach
                    </div>

                </div>
                
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                   
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name">{{$product->name}}</h2>
                                    <div class="product-inner-price">
                                        <img src="{{URL::asset('/storage/'.$product->cover_img)}}">
                                        <ins>${{$product->price}}</ins>
                                    </div>    
                                    
                                        <a href="{{route('cart.add', $product->id)}}"><button class="add_to_cart_button" type="">{{__('Add to cart')}}</button></a>
                                    
                                    <div class="product-inner-category">
                                        <p>{{__('Category')}}: <a href=""></a>.</p>
                                    </div> 
                                    
                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">{{__('Description')}}</a></li>
                                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">{{__('Reviews')}}</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>{{__('Product Description')}}</h2>  
                                                <p>{!! html_entity_decode($product->description) !!}</p>

                                                <p>Mauris placerat vitae lorem gravida viverra. Mauris in fringilla ex. Nulla facilisi. Etiam scelerisque tincidunt quam facilisis lobortis. In malesuada pulvinar neque a consectetur. Nunc aliquam gravida purus, non malesuada sem accumsan in. Morbi vel sodales libero.</p>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                                <h2>{{__('Reviews')}}</h2>
                                                <div class="submit-review">
                                                    <p><label for="name">{{__('Name')}}</label> <input name="name" type="text"></p>
                                                    <p><label for="email">{{__('Email')}}</label> <input name="email" type="email"></p>
                                                    <div class="rating-chooser">
                                                        <p>{{__('Your rating')}}</p>

                                                        <div class="rating-wrap-post">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <p><label for="review">{{__('Your review')}}</label> <textarea name="review" id="" cols="30" rows="10"></textarea></p>
                                                    <p><input type="submit" value="Submit"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="related-products-wrapper">
                            <h2 class="related-products-title">{{__('Related Products')}}</h2>
                            <div class="related-products-carousel">
                            @foreach ($products as $item)
                                <div class="single-product">
                            <div class="product-f-image">
                                <img src="{{URL::asset('/storage/'.$item->cover_img)}}" alt="" >
                                <div class="product-hover">
                                    <a href="{{route('cart.add', $item->id)}}"class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> {{__('Add to cart')}}</a>
                                    <a href="{{route('product.show', $item->id)}}" class="view-details-link"><i class="fa fa-link"></i> {{__('See details')}}</a>
                                </div>
                            </div>

                            <h2><a href="{{route('product.show', $item->id)}}">{{$item->name}}</a></h2>

                            <div class="product-carousel-price">
                                <ins>${{$item->price}}</ins> <del>${{$item->price+200}}</del>
                            </div>
                        </div>
                            @endforeach                                   
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
@endsection