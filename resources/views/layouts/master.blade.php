<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Watch Store</title>

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/owl.carousel.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('style.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/responsive.css') }}" />



  </head>
  <body>


    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                           
                            <li><a href="{{ route('shops.create') }}"><i class="fa fa-home"></i> {{__('Create Shop')}}</a></li>
                            <li><a href="{{ route('cart.index') }}"><i class="fa fa-shopping-cart"></i> {{__('My Cart')}}</a></li>
                            <li><a href="{{ route('cart.index') }}"><i class="fa fa-user"></i>  {{__('Checkout')}}</a></li>
                            <li><a href="{{url('/seller')}}"><i class="fa fa-user"></i>  {{__('For Seller')}}</a></li>

                        @guest
                            @if (Route::has('login'))
                            <li><a href="{{ route('login') }}"><i class="fa fa-user"></i>  {{__('Login')}}</a></li>
                            @endif
                            @if (Route::has('register'))
                                <li><a href="{{ route('register') }}"><i class="fa fa-user"></i>  {{__('Register')}}</a></li>
                            @endif
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
    
                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key"> {{__('Language')}} :</span><span class="value">@php $locale = session()->get('locale'); @endphp  {{$locale}}</span><b class="caret"></b></a>
                                <ul class="dropdown-menu">

                                    <li><a href="{{ url('locale/en') }}">English</a></li>

                                    <li><a href="{{ url('locale/ru') }}">Russian</a></li>

                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area --> 
    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo" >
                        <h1><a href="{{route('home')}}"><img src="{{ URL::asset('img/logoStore.png') }}" width="200px"></a></h1>
                    </div>
                </div>
                
                <div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="{{ route('cart.index') }}"> {{__('Cart')}} - <span class="cart-amunt">
                            $ @auth
                            {{ Cart::session(auth()->id())->getTotal() }}
                            @endauth
                        </span> <i class="fa fa-shopping-cart"></i> <span class="product-count">@auth
                        {{Cart::session(auth()->id())->getContent()->count()}}
                                     @endauth</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->

    
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">{{__('Toggle navigation')}}</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div style="display: flex;flex-direction: row; justify-content: space-between; align-items:  center;">
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="{{route('home')}}"> {{__('Home')}}</a></li>
                        <li><a href="{{route('products.index')}}"> {{__('Shop page')}}</a></li>
                        <li><a href="{{ route('cart.index') }}"> {{__('Cart')}}</a></li>
                        <li><a href="{{ route('cart.index') }}"> {{__('Checkout')}}</a></li>
                        <li>
                            <div class="dropdown show">
                              <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 {{__('Category')}}
                              </a>
                                @php 
                                    $categories = TCG\Voyager\Models\Category::all();
                                @endphp
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                @foreach($categories as $category)
                                <a class="dropdown-item btn btn-secondary" href="{{route('products.index',['category_id'=>$category->id])}}" style="margin:15px 5px">{{$category->name}}</a>
                                @endforeach
                              </div>
                            </div>
                            
                        </li>
                        <li><a href="#"> {{__('Contact')}}</a></li>
                    </ul>
                    
                </div>  
                <div>
                    <form class="form-inline" action="{{route('products.search')}}" method="GET">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" name="query">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit"> {{__('Search')}}</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div> <!-- End mainmenu area -->

    @yield('cart')
    
    <main class="py-4 content">
     @yield('content')
   
    </main>


    <div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-about-us">
                        <div class="logo" >
                        <h1><a href="{{route('home')}}"><img src="{{ URL::asset('img/logoStore.png') }}" width="200px"></a></h1>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis sunt id doloribus vero quam laborum quas alias dolores blanditiis iusto consequatur, modi aliquid eveniet eligendi iure eaque ipsam iste, pariatur omnis sint! Suscipit, debitis, quisquam. Laborum commodi veritatis magni at?</p>
                        <div class="footer-social">
                            <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title"> {{__('User Navigation')}} </h2>
                        <ul>
                            <li><a href="#"> {{__('My Cart')}}</a></li>
                            <li><a href="#"> {{__('Create Shop')}}</a></li>
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title"> {{__('Categories')}}</h2>
                        <ul>
                         @foreach($categories as $category)
                            <li><a href="#">{{$category->name}}</a></li>
                         @endforeach
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-newsletter">
                        <h2 class="footer-wid-title"> {{__('Newsletter')}}</h2>
                        <p> {{__('Sign up to our newsletter and get exclusive deals you wont find anywhere else straight to your inbox!')}}</p>
                        <div class="newsletter-form">
                            <form action="#">
                                <input type="email" placeholder="{{__('Type your email')}}">
                                <input type="submit" value="{{__('Subscribe')}}">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer top area -->
    
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; 2021 Developed by Nurba</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="footer-card-icon">
                        <i class="fa fa-cc-discover"></i>
                        <i class="fa fa-cc-mastercard"></i>
                        <i class="fa fa-cc-paypal"></i>
                        <i class="fa fa-cc-visa"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer bottom area -->


    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>

    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <!-- jQuery sticky menu -->
    <script type="text/javascript" src="{{ URL::asset('js/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery.sticky.js') }}"></script>

    <!-- jQuery easing -->
    <script type="text/javascript" src="{{ URL::asset('js/jquery.easing.1.3.min.js') }}"></script>

    <!-- Main Script -->
    <script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>

    <!-- Slider -->
    <script type="text/javascript" src="{{ URL::asset('js/bxslider.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/script.slider.js') }}"></script>

  </body>
