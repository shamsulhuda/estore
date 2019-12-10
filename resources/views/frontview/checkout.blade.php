@include('frontview.partial.head')

<body>

    <!-- Body main wrapper start -->
    <div class="wrapper fixed__footer">
        <!-- Start Header Style -->
        @include('frontview.partial.header')
        <!-- End Offset Wrapper -->
<!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url({{asset('frontend/images/bg/2.jpg')}}) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title">Checkout</h2>
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="{{route('frontend')}}">Home</a>
                                  <span class="brd-separetor">/</span>
                                  <span class="breadcrumb-item active">Checkout</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Checkout Area -->
        <section class="our-checkout-area ptb--120 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-lg-8">
                        <div class="ckeckout-left-sidebar">
                            <form action="{{route('checkout.store')}}" method="POST">
                                @csrf
                            <!-- Start Checkbox Area -->
                            <div class="checkout-form">
                                <h2 class="section-title-3">Billing details</h2>
                                <div class="checkout-form-inner">
                                    <div class="single-checkout-box">
                                        <input type="text" name="name" class="@error('name') is-invalid @enderror" placeholder="Receiver Name*" value="{{old('name')}}" required>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                        <input type="email" name="email" @error('email') is-invalid @enderror placeholder="Email*" value="{{old('email')}}" autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                    <div class="single-checkout-box">
                                        <input type="text" name="phone_no" placeholder="Phone*" value="{{old('phone_no')}}" required>
                                        <input type="text" name="shipping_address" placeholder="Shipping address*" value="{{old('shipping_address')}}" required>
                                    </div>
                                    <div class="single-checkout-box">
                                        <textarea name="message" placeholder="Write your message here..."></textarea>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- End Checkbox Area -->
                            <!-- Start Payment Box -->
                            <div class="payment-form">
                                <h2 class="section-title-3">payment details</h2>
                                <p>Please select your payment details below and confirm your order!</p>
                                <div class="payment-form-inner">
                                    <div class="row selectBox mb-4">
                                        <div class="col-md-6">
                                            <select name="payment_method_id" id="payment" required>
                                                <option selected disabled>Select payment method*</option>

                                                @foreach($payments as $payment)
                                                <option value="{{$payment->short_name}}">{{$payment->name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            @foreach($payments as $payment)
                                                @if($payment->short_name == 'cash_on')
                                                <div class="card hidden" id="payment_{{$payment->short_name}}">
                                                    <div class="card-body text-center">
                                                        <img src="{{asset('frontend/images/logo/cashon.png')}}" class="rounded shadow-sm" style="width: 100px; height: 70px;">
                                                        <p>Well, we'll deliver this product within two or three business days!</p>
                                                    </div>
                                                </div>

                                                @else

                                                <div class="single-checkout hidden" id="payment_{{$payment->short_name}}">
                                                    <img src="{{asset("frontend/images/logo/{$payment->image}")}}" style="width: 80px; height: auto">
                                                    <span>
                                                        <p>{{$payment->name}} AC/No: <strong>{{$payment->no}}</strong> </p>
                                                    <p>Acount type: <strong>{{ $payment->type }}</strong></p>
                                                    </span>
                                                    
                                                </div>

                                                @endif
                                            @endforeach
                                            <div class="single-checkout">
                                                <input type="text" name="transaction_id" id="transaction_id" class="hidden" placeholder="Input transaction ID*" value="{{ old('transaction_id') }}">
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="order-button">
                                <button type="submit">Order now</button>
                            </div>
                          </form>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <div class="checkout-right-sidebar">
                            <div class="our-important-note">
                                <h2 class="section-title-3">Note :</h2>
                                <p class="note-desc">Please, read this section carefully before placeing your order!</p>
                                <ul class="important-note">
                                    <li><p><i class="zmdi zmdi-caret-right-circle"></i> You should fill-up this form carefully with correct informations.</p></li>
                                    <li><p><i class="zmdi zmdi-caret-right-circle"></i> With all (*) fields are required! </p></li>
                                    <li><p><i class="zmdi zmdi-caret-right-circle"></i> If your payment method bKash or Rocket, Please recheck your transaction ID before submitting. Otherwise order should be count as spam!</p></li>
                                    
                                    <li><p><i class="zmdi zmdi-caret-right-circle"></i> If your shipping address will be changed then you should inform our authority other-wise we will not respnsible for your mistake!</p></li>
                                    <li><p><i class="zmdi zmdi-caret-right-circle"></i> For cash on delivery, we need to deliver product(s) two - three business days.</p></li>
                                    <li><p><i class="zmdi zmdi-caret-right-circle"></i> Our delivery person deserve well behave!</p></li>
                                </ul>
                            </div>
                            <div class="puick-contact-area mt--60">
                                <h2 class="section-title-3">Quick Contract</h2>
                                <a href="phone:+8801722889963">+88 0179 770 3131</a>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Checkout Area -->
        <!-- Start Footer Area -->
        @include('frontview.partial.footer')
        <!-- End Footer Area -->
    </div>
    <!-- Body main wrapper end -->
    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- jquery latest version -->
    @include('frontview.partial.footerasset')
    <script>
        $('#payment').change(function(){
            $payment_method = $('#payment').val();

            if ($payment_method == 'cash_on') {
                $('#payment_cash_on').removeClass('hidden');
                $('#payment_bKash').addClass('hidden');
                $('#payment_rocket').addClass('hidden');
            }else if($payment_method == 'bKash'){
                $('#payment_bKash').removeClass('hidden');
                $('#payment_cash_on').addClass('hidden');
                $('#payment_rocket').addClass('hidden');
                $('#transaction_id').removeClass('hidden');
            }else if($payment_method == 'rocket'){
                $('#payment_rocket').removeClass('hidden');
                $('#payment_cash_on').addClass('hidden');
                $('#payment_bKash').addClass('hidden');
                $('#transaction_id').removeClass('hidden');
            }

        });
    </script>

</body>

</html>