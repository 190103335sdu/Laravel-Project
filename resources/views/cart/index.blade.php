@extends('layouts.master')

@section('cart')
<!--     @foreach ($cartItems as $item)
        <div>
        <p>{{$item->name}}</p>
        <p>{{ Cart::session(auth()->id())->get($item->id)->getPriceSum() }}</p>
        <form action="{{route('cart.update', $item->id)}}">
            <input type="number" name="quantity" value="{{ $item->quantity }}">
            <input type="submit" value="save">
        </form>
        <a href="{{ route('cart.destroy', $item->id) }}">Delete</a>
        </div>
    @endforeach
    <h3>TOTAL: {{ Cart::session(auth()->id())->getTotal() }}</h3> -->


    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>{{__('Shopping Cart')}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
  <body>
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                
                
                <div class="col">
                    <div class="product-content">
                        <div class="woocommerce">
                                <table cellspacing="0" class="shop_table cart">
                                    
                                    <thead>
                                        <tr>
                                            <th class="product-remove">&nbsp;</th>
                                            <th class="product-thumbnail">&nbsp;</th>
                                            <th class="product-name">{{__('Product')}}</th>
                                            <th class="product-price">{{__('Price')}}</th>
                                            <th class="product-quantity">{{__('Quantity')}}</th>
                                            <th class="product-subtotal">{{__('Total')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cartItems as $item)
                                        <tr class="cart_item">
                                            <td class="product-remove">
                                                <a title="Remove this item" class="remove" href="{{ route('cart.destroy', $item->id) }}">×</a> 
                                            </td>

                                            <td class="product-thumbnail">
                                                <img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="{{URL::asset('/storage/'.$item->associatedModel->cover_img)}}">

                                            </td>

                                            <td class="product-name">
                                                <a href="single-product.html">{{$item->name}}</a> 
                                            </td>

                                            <td class="product-price">
                                                <span class="amount">{{$item->price}}</span> 
                                            </td>

                                            <td class="product-quantity">
                                                <div class="quantity buttons_added">
                                                    <form action="{{route('cart.update', $item->id)}}">
                                                    <input type="number" name="quantity" value="{{ $item->quantity }}">

                                                        <input type="submit" value="{{__('Save')}}">
                                                    </form>
                                                    
                                                </div>
                                            </td>

                                            <td class="product-subtotal">
                                                <span class="amount">{{ Cart::session(auth()->id())->get($item->id)->getPriceSum() }}</span> 
                                            </td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td class="actions" colspan="6">
                                                <!-- <div class="coupon">
                                                    <label for="coupon_code">Coupon:</label>
                                                    <input type="text" placeholder="Coupon code" value="" id="coupon_code" class="input-text" name="coupon_code">
                                                    <input type="submit" value="Apply Coupon" name="apply_coupon" class="button">
                                                </div> -->
                                                <input type="submit" value="{{__('Update Cart')}}" name="update_cart" class="button">
                                                
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            <div class="cart-collaterals">


                            <div class="cross-sells">
                                <h2>{{__('You may be interested in')}}...</h2>
                                <ul class="products">
                                    @foreach ($products as $product)
                                    <li class="product">
                                        <a href="{{route('product.show', $product->id)}}">
                                            <img width="325" height="325" alt="T_4_front" class="attachment-shop_catalog wp-post-image" src="{{URL::asset('/storage/'.$product->cover_img)}}">
                                            <h3>{{$product->name}}</h3>
                                            <span class="price"><span class="amount">${{$product->price}}</span></span>
                                        </a>

                                        <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="22" rel="nofollow" href="{{route('product.show', $product->id)}}">{{__('See details')}}</a>
                                    </li>
                                    @endforeach

                                   <!--  <li class="product">
                                        <a href="single-product.html">
                                            <img width="325" height="325" alt="T_4_front" class="attachment-shop_catalog wp-post-image" src="img/product-4.jpg">
                                            <h3>Ship Your Idea</h3>
                                            <span class="price"><span class="amount">£20.00</span></span>
                                        </a>

                                        <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="22" rel="nofollow" href="single-product.html">Select options</a>
                                    </li> -->
                                </ul>
                            </div>


                            <div class="cart_totals ">
                                <h2>{{__('Cart Totals')}}</h2>

                                <table cellspacing="0">
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th>{{__('Cart Subtotal')}}</th>
                                            <td><span class="amount">${{ Cart::session(auth()->id())->getTotal() }}</span></td>
                                        </tr>

                                        <tr class="shipping">
                                            <th>{{__('Shipping and Handling')}}</th>
                                            <td>{{__('Free Shipping')}}</td>
                                        </tr>

                                        <tr class="order-total">
                                            <th>{{__('Order Total')}}</th>
                                            <td><strong><span class="amount">${{ Cart::session(auth()->id())->getTotal() }}</span></strong> </td>
                                        </tr>
                                    </tbody>  
                                </table>
                                <a href="{{ route('cart.checkout') }}" class="btn btn-primary md-3" role="button">{{__('To Checkout')}}</a>
                            </div>
                            </div>
                        </div>                        
                    </div>                    
                </div>
            </div>
        </div>
    </div>


    
   

  </body>

@endsection
