<div id="preloaders" class="preloader" style="background: url('{{asset('frontend/images/preloader/2.gif')}}') 50% 50% no-repeat rgb(249,249,249);">
        
    </div>
<header id="header" class="htc-header">
    <!-- Start Mainmenu Area -->
    <div id="sticky-header-with-topbar" class="mainmenu__area sticky__header">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-lg-2 col-6">
                    <div class="logo">
                        <a href="{{route('frontend')}}">
                            <img src="{{asset('frontend/images/logo/estore2.png')}}" alt="logo">
                        </a>
                    </div>
                </div>
                <!-- Start MAinmenu Ares -->
                <div class="col-md-8 col-lg-8 d-none d-md-block">
                    <nav class="mainmenu__nav  d-none d-lg-block">
                        <ul class="main__menu">
                            <li class="drop"><a href="{{ route('frontend') }}">Home</a>
                            </li>
                            <li><a href="about.html">About</a></li>
                            <li class="drop"><a href="blog.html">Blog</a>
                                <ul class="dropdown">
                                    <li><a href="blog.html">blog</a></li>
                                    <li><a href="blog-details.html">blog details</a></li>
                                </ul>
                            </li>
                            <li class="drop">
                                <a href="shop.html">Shop</a>
                                <ul class="dropdown mega_dropdown">
                                    <li>
                                        <a class="mega__title" href="">Shop page</a>
                                        <ul class="mega__item">
                                            <li><a href="#">Shop</a></li>
                                            <li><a href="#">Shop</a></li>
                                            <li><a href="#">Shop</a></li>
                                            <li><a href="#">Shop</a></li>
                                            <li><a href="#">Shop</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a class="mega__title" href="">Variable products</a>
                                        <ul class="mega__item">
                                            <li><a href="#">Shop</a></li>
                                            <li><a href="#">Shop</a></li>
                                            <li><a href="#">Shop</a></li>
                                            <li><a href="#">Shop</a></li>
                                            <li><a href="#">Shop</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a class="mega__title" href="">Product types</a>
                                        <ul class="mega__item">
                                            <li><a href="#">Shop</a></li>
                                            <li><a href="#">Shop</a></li>
                                            <li><a href="#">Shop</a></li>
                                            <li><a href="#">Shop</a></li>
                                            <li><a href="#">Shop</a></li>
                                        </ul>
                                    </li>
                                    
                                </ul>
                            </li>
                            <li class="drop"><a href="#">pages</a>
                                <ul class="dropdown">
                                    <li><a href="about.html">about</a></li>
                                    <li><a href="shop.html">shop</a></li>
                                    <li><a href="product-details.html">product details</a></li>
                                    <li><a href="cart.html">cart</a></li>
                                    <li><a href="wishlist.html">wishlist</a></li>
                                    <li><a href="checkout.html">checkout</a></li>
                                    <li><a href="team.html">team</a></li>
                                    <li><a href="login-register.html">login & register</a></li>
                                </ul>
                            </li>
                            <li><a href="contact.html">contact</a></li>
                        </ul>
                    </nav>
                    
                    <div class="mobile-menu clearfix d-block d-lg-none">
                        <nav id="mobile_dropdown">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li><a href="about.html">About</a></li>
                                <li><a href="blog.html">blog</a>
                                    <ul>
                                        <li><a href="blog.html">blog</a></li>
                                        <li><a href="blog-details.html">blog details</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">pages</a>
                                    <ul>
                                        <li><a href="about.html">about</a></li>
                                        <li><a href="shop.html">shop</a></li>
                                        <li><a href="product-details.html">product details</a></li>
                                        <li><a href="{{route('view_cart')}}">cart</a></li>
                                        <li><a href="wishlist.html">wishlist</a></li>
                                        <li><a href="checkout.html">checkout</a></li>
                                        <li><a href="team.html">team</a></li>
                                        <li><a href="login-register.html">login & register</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">contact</a></li>
                            </ul>
                        </nav>
                    </div>  
                </div>
                <!-- End MAinmenu Ares -->
                <div class="col-md-2 col-lg-2 col-6">  
                    <ul class="menu-extra">
                        <li class="search search__open d-none d-sm-block"><span class="ti-search"></span></li>
                        <li>
                            <a href="{{route('user.dashboard')}}"><span class="ti-user"></span></a>
                        </li>
                        <li class="cart__menu">
                            <div id="ex4">
                                <span class="p1 fa-stack cartBox" id="totalItemsss" data-count="{{ Cart::count()}}">
                                    <i class="ti-shopping-cart xti-inverse"></i>
                                </span>
                            </div>
                        </li>
                        <li class="toggle__menu d-none d-md-block"><span class="ti-menu"></span></li>
                    </ul>
                </div>
            </div>
            <div class="mobile-menu-area"></div>
        </div>
    </div>
    <!-- End Mainmenu Area -->
</header>

<div class="body__overlay"></div>
<!-- Start Offset Wrapper -->
<div class="offset__wrapper">
    <!-- Start Search Popap -->
    <div class="search__area">
        <div class="container" >
            <div class="row" >
                <div class="col-md-12" >
                    <div class="search__inner">
                        <form action="#" method="get">
                            <input placeholder="Search here... " type="text">
                            <button type="submit"></button>
                        </form>
                        <div class="search__close__btn">
                            <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Search Popap -->
    <!-- Start Offset MEnu -->
    <div class="offsetmenu">
        <div class="offsetmenu__inner">
            <div class="offsetmenu__close__btn">
                <a href="#"><i class="zmdi zmdi-close"></i></a>
            </div>
            <div class="off__contact">
                <div class="logo">
                    <a href="{{route('frontend')}}">
                        <img src="{{asset('frontend/images/logo/uniqlo.png')}}" alt="logo">
                    </a>
                </div>
                <p>Lorem ipsum dolor sit amet consectetu adipisicing elit sed do eiusmod tempor incididunt ut labore.</p>
            </div>
            <ul class="sidebar__thumd">
                <li><a href="#"><img src="{{asset('frontend/images/sidebar-img/1.jpg')}}" alt="sidebar images"></a></li>
                <li><a href="#"><img src="{{asset('frontend/images/sidebar-img/2.jpg')}}" alt="sidebar images"></a></li>
                <li><a href="#"><img src="{{asset('frontend/images/sidebar-img/3.jpg')}}" alt="sidebar images"></a></li>
                <li><a href="#"><img src="{{asset('frontend/images/sidebar-img/4.jpg')}}" alt="sidebar images"></a></li>
                <li><a href="#"><img src="{{asset('frontend/images/sidebar-img/5.jpg')}}" alt="sidebar images"></a></li>
                <li><a href="#"><img src="{{asset('frontend/images/sidebar-img/6.jpg')}}" alt="sidebar images"></a></li>
                <li><a href="#"><img src="{{asset('frontend/images/sidebar-img/7.jpg')}}" alt="sidebar images"></a></li>
                <li><a href="#"><img src="{{asset('frontend/images/sidebar-img/8.jpg')}}" alt="sidebar images"></a></li>
            </ul>
            <div class="offset__widget">
                <div class="offset__single">
                    <h4 class="offset__title">Language</h4>
                    <ul>
                        <li><a href="#"> Engish </a></li>
                        <li><a href="#"> French </a></li>
                        <li><a href="#"> German </a></li>
                    </ul>
                </div>
                <div class="offset__single">
                    <h4 class="offset__title">Currencies</h4>
                    <ul>
                        <li><a href="#"> USD : Dollar </a></li>
                        <li><a href="#"> EUR : Euro </a></li>
                        <li><a href="#"> POU : Pound </a></li>
                    </ul>
                </div>
            </div>
            <div class="offset__sosial__share">
                <h4 class="offset__title">Follow Us On Social</h4>
                <ul class="off__soaial__link">
                    <li><a class="bg--twitter" href="https://twitter.com/devitemsllc" target="_blank" title="Twitter"><i class="zmdi zmdi-twitter"></i></a></li>
                    
                    <li><a class="bg--instagram" href="https://www.instagram.com/devitems/" target="_blank" title="Instagram"><i class="zmdi zmdi-instagram"></i></a></li>

                    <li><a class="bg--facebook" href="https://www.facebook.com/devitems/?ref=bookmarks" target="_blank" title="Facebook"><i class="zmdi zmdi-facebook"></i></a></li>

                    <li><a class="bg--googleplus" href="https://plus.google.com/" target="_blank" title="Google Plus"><i class="zmdi zmdi-google-plus"></i></a></li>

                    <li><a class="bg--google" href="#" target="_blank" title="Google"><i class="zmdi zmdi-google"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Offset MEnu -->
    <!-- Start Cart Panel -->
    <div class="shopping__cart">
        <div class="shopping__cart__inner">
            <div class="offsetmenu__close__btn">
                <a href="#"><i class="zmdi zmdi-close"></i></a>
            </div>
            <div class="shp__cart__wrap" id="sideView">
                <div class="shp__single__product">
                    <div class="shp__pro__thumb">
                        <a>
                            <p id="title"></p>
                            <img id="itemImage" src="" alt="product images">
                        </a>
                    </div>
                    {{-- <div class="shp__pro__details">
                        <h2><a href="product-details.html">{{ $row->name}}</a></h2>
                        <span class="quantity">QTY: {{$row->qty}}</span>
                        <span class="shp__price">{{$row->price}}</span>
                    </div>
                    <div class="remove__btn">
                        <a href="#" title="Remove this item"><i data-id="{{$row->rowId}}" class="zmdi zmdi-close removeItem"></i></a>
                    </div> --}}
                </div>
            </div>
            <ul class="shoping__total">
                <li class="subtotal">Subtotal: {{ Cart::subtotal() }}</li>
                <li class="total__price">Total: {{Cart::total()}}</li>
            </ul>
            <ul class="shopping__btn">
                <li><a href="{{route('view_cart')}}">View Cart</a></li>
                <li class="shp__checkout"><a href="checkout.html">Checkout</a></li>
            </ul>
        </div>
    </div>
    <!-- End Cart Panel -->
</div>