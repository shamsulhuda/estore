@include('frontview.partial.head')
<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  

    <!-- Body main wrapper start -->
    <div class="wrapper fixed__footer">
        <!-- Start Header Style -->
        @include('frontview.partial.header')
        <!-- End Offset Wrapper -->
        

<div class="htc__login__register bg__white ptb--130" style="background: rgba(0, 0, 0, 0) url({{asset('frontend/images/bg/log-res.jpg')}}) no-repeat scroll center center / cover ;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 ml-auto mr-auto">
                <ul class="login__register__menu nav justify-contend-center" role="tablist">
                    <li role="presentation" class="login active"><a class="active" href="#login" role="tab" data-toggle="tab">Login</a></li>
                    <li role="presentation" class="register"><a href="#register" role="tab" data-toggle="tab">Register</a></li>
                </ul>
            </div>
        </div>
        <!-- Start Login Register Content -->
        <div class="row tab-content">
            <div class="col-md-6  ml-auto mr-auto">
                <div class="htc__login__register__wrap">
                    <!-- Start Single Content -->
                    <div id="login" role="tabpanel" class="single__tabs__panel tab-pane active">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            {{-- email --}}
                            <div class="login">
                                <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="email*">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                {{-- password --}}
                                <input type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="password*">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- remember & forget password --}}
                            <div class="tabs__checkbox mt-2">
                                <input type="checkbox" id="remember" name="remember" {{old('remember') ? 'checked' : ''}}>
                                <span> Remember me</span>
                                @if (Route::has('password.request'))
                                    <span class="forget">
                                        <a href="{{ route('password.request') }}">Forget Pasword?</a>
                                    </span>
                                @endif
                            </div>

                            <div class="htc__login__btn mt--30">
                                <button type="submit" class="log-resBtn">Login</button>
                            </div>

                        </form>
                        
                        <div class="htc__social__connect">
                            <h2>Or Login With</h2>
                            <ul class="htc__soaial__list">
                                <li><a class="bg--twitter" href="https://twitter.com/devitemsllc" target="_blank"><i class="zmdi zmdi-twitter"></i></a></li>

                                <li><a class="bg--instagram" href="https://www.instagram.com/devitems/" target="_blank"><i class="zmdi zmdi-instagram"></i></a></li>

                                <li><a class="bg--facebook" href="https://www.facebook.com/devitems/?ref=bookmarks" target="_blank"><i class="zmdi zmdi-facebook"></i></a></li>

                                <li><a class="bg--googleplus" href="https://plus.google.com/" target="_blank"><i class="zmdi zmdi-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Single Content -->
                    <!-- Start Single Content -->
                    <div id="register" role="tabpanel" class="single__tabs__panel tab-pane">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="login">
                                <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="your name*">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="email*">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required placeholder="password*">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password*">

                            </div>
                            <div class="tabs__checkbox mt-2">
                                <input type="checkbox" name="condition" onchange="document.getElementById('condition').disabled = !this.checked;" checked>
                                <span> I Agreed with <a href="">terms & conditions</a></span>
                            </div>
                            <div class="htc__login__btn">
                                <button type="submit" id="condition" class="log-resBtn">register</button>
                            </div>
                        </form>
                    </div>
                    <!-- End Single Content -->
                </div>
            </div>
        </div>
        <!-- End Login Register Content -->
    </div>
</div>
<!-- End Login Register Area -->

{{-- @include('frontview.partial.footer') --}}
<!-- Start Copyright Area -->
        <div class="htc__copyright__area">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="copyright__inner">
                        <div class="copyright">
                            <p>© 2018 <a href="https://freethemescloud.com/" target="_blank">Free themes Cloud</a>
                            All Right Reserved.</p>
                        </div>
                        <ul class="footer__menu">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="shop.html">Product</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Copyright Area -->

@include('frontview.partial.footerasset')

</body>
</html>