@extends('layouts.master')

@section('content')

<div class="slider-area">
        <!-- Slider -->
        <div class="block-slider block-slider4">
            <ul class="" id="bxslider-home4">
                <li>
                    <img src="{{ URL::asset('img/rolex.jpg') }}" alt="Slide">
                    <div class="caption-group">
                        <h2 class="caption title">
                            Rolex <span class="primary">25.3 <strong>Gold</strong></span>
                        </h2>
                        <h4 class="caption subtitle">White Gold</h4>
                        <a class="caption button-radius" href="#"><span class="icon"></span>{{__('Shop now')}}</a>
                    </div>
                </li>
                <li><img src="{{ URL::asset('img/couple.png') }}" alt="Slide">
                    <div class="caption-group">
                        <h2 class="caption title">
                            {{__('by one, get one')}} <span class="primary">50% <strong>off</strong></span>
                        </h2>
                        <h4 class="caption subtitle">{{__('Watch for her and him')}}</h4>
                        <a class="caption button-radius" href="#"><span class="icon"></span>{{__('Shop now')}}</a>
                    </div>
                </li>
                <li><img src="{{ URL::asset('img/romanson.jpg') }}" alt="Slide">
                    <div class="caption-group">
                        <h2 class="caption title">
                            Romanson <span class="primary">{{__('Limited')}} <strong>{{__('Watch')}}</strong></span>
                        </h2>
                        <h4 class="caption subtitle">Select Item</h4>
                        <a class="caption button-radius" href="#"><span class="icon"></span>{{__('Shop now')}}</a>
                    </div>
                </li>
                <li><img src="{{ URL::asset('img/dw.jpg') }}" alt="Slide">
                    <div class="caption-group">
                      <h2 class="caption title">
                            WW <span class="primary">{{__('Swiss')}} <strong>{{__('Exclusive')}}</strong></span>
                        </h2>
                        <h4 class="caption subtitle">& band</h4>
                        <a class="caption button-radius" href="#"><span class="icon"></span>{{__('Shop now')}}</a>
                    </div>
                </li>
            </ul>
        </div>
        <!-- ./Slider -->
</div> <!-- End slider area -->
<div class="maincontent-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="latest-product">
                    <h2 class="section-title">{{__('Latest Products')}}</h2>
                    <div class="product-carousel">
                        @foreach ($sliderProducts as $product)
                            <div class="single-product">
                            <div class="product-f-image">
                                <img src="{{URL::asset('/storage/'.$product->cover_img)}}" alt="" >
                                <div class="product-hover">
                                    <a href="{{route('cart.add', $product->id)}}"class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> {{__('Add to cart')}}</a>
                                    <a href="{{route('product.show', $product->id)}}" class="view-details-link"><i class="fa fa-link"></i> {{__('See details')}}</a>
                                </div>
                            </div>

                            <h2><a href="single-product.html">{{$product->name}}</a></h2>

                            <div class="product-carousel-price">
                                <ins>${{$product->price}}</ins> <del>${{$product->price+200}}</del>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <h2 class="section-title" style="margin:50px; text-align: center;">{{__('Categories')}}</h2>
    <hr><div class="container1" >
                
                @foreach($categories as $category)
                <a href="{{route('products.index',['category_id'=> $category->id])}}">
                    <div class="profile-card-6"><img src="img/category_img.png" class="img img-responsive" >
                        <div class="profile-name">{{__('FOR')}}
                            <br>{{$category->name}}</div>
                        <div class="profile-position">{{__('Luxury Watches')}}</div>
                        <div class="profile-overview">
                            <div class="profile-overview">
                                <div class="row text-center">
                                    <div class="col">
                                        <h3>{{__('Go and Check')}}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
</div>
</div>

</div> <!-- End main content area -->
<style type="text/css">
.container1{
    display: flex;
    flex-direction: row;
    justify-content: space-around;
}

.card-container {
    padding: 100px 0px ;
    -webkit-perspective: 1000 ;
    perspective: 1000 ;
}
    .profile-card-6 {
    max-width: 300px;
    background-color: #FFF;
    border-radius: 5px;
    box-shadow: 0px 0px 25px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    position: relative;
    margin: 10px auto;
    cursor: pointer;
}

.profile-card-6 img {
    transition: all 0.15s linear;
}

.profile-card-6 .profile-name {
    position: absolute;
    top: 10px;
    left: 10px;
    font-size: 25px;
    font-weight: bold;
    color: #FFF;
    padding: 15px 20px;
    background: linear-gradient(140deg, rgba(0, 0, 0, 0.4) 50%, rgba(255, 255, 0, 0) 50%);
    transition: all 0.15s linear;
}

.profile-card-6 .profile-position {
    position: absolute;
    color: rgba(255, 255, 255, 0.4);
    left: 30px;
    top: 100px;
    transition: all 0.15s linear;
}

.profile-card-6 .profile-overview {
    position: absolute;
    bottom: 0px;
    left: 0px;
    right: 0px;
    background: linear-gradient(0deg, rgba(0, 0, 0, 0.4) 50%, rgba(255, 255, 0, 0));
    color: #FFF;
    padding: 50px 0px 20px 0px;
    transition: all 0.15s linear;
}

.profile-card-6 .profile-overview h3 {
    font-weight: bold;
}

.profile-card-6 .profile-overview p {
    color: rgba(255, 255, 255, 0.7);
}

.profile-card-6:hover img {
    filter: brightness(80%);
}

.profile-card-6:hover .profile-name {
    padding-left: 25px;
    padding-top: 20px;
}

.profile-card-6:hover .profile-position {
    left: 40px;
}

.profile-card-6:hover .profile-overview {
    padding-bottom: 25px;
}
</style>
@endsection
