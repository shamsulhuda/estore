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
                                <h2 class="bradcaump-title">Cart</h2>
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="{{ route('frontend') }}">Home</a>
                                  <span class="brd-separetor">/</span>
                                  <span class="breadcrumb-item active">Cart</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="cart-main-area ptb--120 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12">
                        <form action="#">               
                            <div class="table-content table-responsive">
                                <table class="dataTable">
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">Image</th>
                                            <th class="product-name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(Cart::content() !== NULL)
                                        
                                        @foreach(Cart::content() as $row)
                                        <?php
                                            $total_price = ($row->price) * ($row->qty);
                                        ?>
                                        <tr id="remove_row">
                                            <td class="product-thumbnail"><a href="{{route('details',$row->id)}}"><img src="{{asset("uploads/products/{$row->options->image}")}}" alt="product img" /></a></td>
                                            <td class="product-name"><a href="#">{{ $row->name }}</a></td>
                                            <td class="product-price"><span class="amount">{{number_format($row->price,2)}} Tk.</span></td>
                                            <td class="product-quantity"><input type="number" value="{{ $row->qty }}" /></td>
                                            <td class="product-subtotal">{{ number_format($total_price,2) }} Tk.</td>

                                            

                                            <td class="product-remove"><a class="btn remove_cart" id="{{$row->rowId}}">X</a></td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <p>{{"Your cart is empty!"}}</p>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-sm-12">
                                    <div class="buttons-cart">
                                        <input type="submit" value="Update Cart" />
                                        <a href="{{route('frontend')}}">Continue Shopping</a>
                                    </div>
                                    <div class="coupon">
                                        <h3>Coupon</h3>
                                        <p>Enter your coupon code if you have one.</p>
                                        <input type="text" placeholder="Coupon code" />
                                        <input type="submit" value="Apply Coupon" />
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 ">
                                    <div class="cart_totals">
                                        <h2>Cart Totals</h2>
                                        <table>
                                            <tbody>
                                                <tr class="cart-subtotal">
                                                    <th>Subtotal</th>
                                                    <td><span class="amount">{{ Cart::subtotal() }}</span></td>
                                                </tr>
                                                <tr class="shipping">
                                                    <th>Shipping</th>
                                                    <td>
                                                        <ul id="shipping_method">
                                                            <li>
                                                                <label>
                                                                    Flat Rate: <span class="amount">
                                                                    {{ $shipping_cost }}
                                                                </span>
                                                                </label>
                                                            </li>
                                                            <li></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr class="order-total">
                                                    <th>Total</th>
                                                    <td>
                                                        <strong><span class="amount">{{Cart::total()}}</span></strong>
                                                    </td>
                                                </tr>                                           
                                            </tbody>
                                        </table>
                                        <div class="wc-proceed-to-checkout">
                                            <a href="{{route('view.checkout')}}">Proceed to Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
        <!-- cart-main-area end -->
        <!-- Start Footer Area -->
        @include('frontview.partial.footer')
        <!-- End Footer Area -->
    </div>
    <!-- Body main wrapper end -->
    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- jquery latest version -->
    @include('frontview.partial.footerasset')

<script type="text/javascript">
    
     {{-- remove item from cart --}}
    $('.remove_cart').on('click', function(){
        var id = $(this).attr('id');
        var el = this;

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/remove/item/"+id,
            type: 'delete',
            data:{
                id:'id'
            },
            success: function(data){
                $.ajaxSetup({ cache: false });
                swal({
                    toast: true,
                    title: "Success!",   
                    text: "Your item successfully Deleted!",   
                    type: "success",   
                    closeOnConfirm: false,
                    timer: 3000,
                });
                
                $(el).closest("tr").remove();
            },
            error: function(err){
                console.log(err);
            }
        });
    });
</script>

</body>

</html>