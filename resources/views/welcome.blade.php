@include('frontview.partial.head')

<body>
    
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  

    <!-- Body main wrapper start -->
    <div class="wrapper fixed__footer">
        <!-- Start Header Style -->
        @include('frontview.partial.header')
        <!-- End Header Style -->
        
        <!-- End Offset Wrapper -->
        <!-- Start Slider Area -->
        @include('frontview.partial.slider')
        <!-- Start Slider Area -->
        <!-- Start Our Product Area -->
        <section class="htc__product__area ptb--130 bg__white">
            <div class="container">
                <div class="htc__product__container">
                    <!-- Start Product MEnu -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="product__menu">
                                <button data-filter="*"  class="is-checked">All</button>
                                @foreach($categories as $key=>$category)
                                    <button data-filter="#{{$category->name}}">{{ $category->name}}</button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- End Product MEnu -->
                    <div class="row product__list">
                        @foreach($products as $key=>$product)

                        <?php
                            $actual_price = $product->price;
                            $discount = $product->discount;

                            $selling_price = $actual_price - ($actual_price * ($discount / 100));

                        ?>
                        <!-- Start Single Product -->
                        <div class="col-md-3 single__pro col-lg-3 col-md-4 col-sm-12" id="{{$product->category->name}}">
                            <div class="product foo">
                                <div class="product__inner">
                                    <div class="pro__thumb">
                                        <a href="{{route('details',$product->id)}}">
                                            <img src="{{asset("uploads/products/{$product->image}")}}" alt="product images">
                                        </a>
                                    </div>
                                    <div class="product__hover__info">
                                        <ul class="product__action">
                                            <li><a data-id="{{ $product->id }}" title="Quick View" class="quick-view modal-view detail-link product_view_details" href="#"><span class="ti-plus"></span></a></li>
                                            {{-- <li><a title="Add TO Cart" href="{{ route('add_to_cart')}}"><span class="ti-shopping-cart"></span></a></li> --}}

                                            <li>
                                                <a title="Add TO Cart"><span data-id="{{$product->id}}" class="ti-shopping-cart addCart"></span></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="add__to__wishlist">
                                        <a data-toggle="tooltip" title="Add To Wishlist" class="add-to-cart" href="wishlist.html"><span class="ti-heart"></span></a>
                                    </div>
                                </div>
                                <div class="product__details">
                                    <h2><a href="product-details.html">{{$product->product_name}}</a></h2>
                                    <ul class="product__price">
                                        <li class="old__price">{{ number_format($actual_price,2) }} Tk.</li>
                                        <li class="new__price">{{ number_format($selling_price,2) }} Tk.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product -->
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- End Our Product Area -->
        <!-- Start Footer Area -->
        @include('frontview.partial.footer')
        <!-- End Footer Area -->
    </div>
    <!-- Body main wrapper end -->
    <!-- QUICKVIEW PRODUCT -->
    <div id="quickview-wrapper">
        <!-- Modal -->
        <div class="modal fade" id="product_details_modal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal__container" role="document">
                <div class="modal-content">
                    <div class="modal-header modal__header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-product">
                            <!-- Start product images -->
                            <div class="product-images">
                                <div class="main-image images">
                                    <img id="product_image" src="">
                                </div>
                            </div>
                            <!-- end product images -->
                            <div class="product-info">
                                <h1 id="product_name"></h1>
                                <div class="rating__and__review">
                                    <ul class="rating">
                                        <li><span class="ti-star"></span></li>
                                        <li><span class="ti-star"></span></li>
                                        <li><span class="ti-star"></span></li>
                                        <li><span class="ti-star"></span></li>
                                        <li><span class="ti-star"></span></li>
                                    </ul>
                                    <div class="review">
                                        <a href="#">4 customer reviews</a>
                                    </div>
                                </div>
                                <div class="price-box-3">
                                    <div class="s-price-box">
                                        <span class="old-price" id="product_actual_price"></span>
                                        <span class="new-price" id="product_sale_price"></span>
                                        <h3 id="discount_show"></h3>
                                    </div>
                                </div>
                                <div class="quick-desc" id="description">
                                </div>
                                <div class="select__color">
                                    <h2>Select color</h2>
                                    <ul class="color__list">
                                        <li class="red"><a title="Red" href="#">Red</a></li>
                                        <li class="gold"><a title="Gold" href="#">Gold</a></li>
                                        <li class="orange"><a title="Orange" href="#">Orange</a></li>
                                        <li class="orange"><a title="Orange" href="#">Orange</a></li>
                                    </ul>
                                </div>
                                <div class="select__size">
                                    <h2>Product size</h2>
                                    <ul class="color__list">
                                        <li class="l__size" id="product_size"></li>
                                    </ul>
                                </div>
                                <div class="social-sharing">
                                    <div class="widget widget_socialsharing_widget">
                                        <h3 class="widget-title-modal">Share this product</h3>
                                        <ul class="social-icons">
                                            <li><a target="_blank" title="rss" href="#" class="rss social-icon"><i class="zmdi zmdi-rss"></i></a></li>
                                            <li><a target="_blank" title="Linkedin" href="#" class="linkedin social-icon"><i class="zmdi zmdi-linkedin"></i></a></li>
                                            <li><a target="_blank" title="Pinterest" href="#" class="pinterest social-icon"><i class="zmdi zmdi-pinterest"></i></a></li>
                                            <li><a target="_blank" title="Tumblr" href="#" class="tumblr social-icon"><i class="zmdi zmdi-tumblr"></i></a></li>
                                            <li><a target="_blank" title="Pinterest" href="#" class="pinterest social-icon"><i class="zmdi zmdi-pinterest"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="addtocart-btn">
                                    <a href="" type="button" id="productId" class="addCart" data-id="">Add to cart</a>
                                </div>
                            </div><!-- .product-info -->
                        </div><!-- .modal-product -->
                    </div><!-- .modal-body -->
                </div><!-- .modal-content -->
            </div><!-- .modal-dialog -->
        </div>
        <!-- END Modal -->
    </div>


    <!-- END QUICKVIEW PRODUCT -->
    <!-- Placed js at the end of the document so the pages load faster -->

    @include('frontview.partial.footerasset')

    

    <script>
        $('.product_view_details').on('click', function(){
            var image_path = "{{asset('uploads/products/')}}";
            var id = $(this).data('id');
            $.ajax({
                method: 'get',
                url: '{{ route('product.view') }}',
                data: {'id':id},
                success: function(data){
                    console.log(data);
                    var product_details = $.parseJSON(data);
                    
                    $('#productId').attr('data-id', product_details.id);
                    $('#product_name').text(product_details.product_name);
                    
                    $("#product_image").attr('src','<?php echo asset('uploads/products/')?>'+'/'+product_details.image);
                    $('#product_actual_price').text(product_details.price).append(' Tk ');
                    $('#product_size').text(product_details.size);
                    
                    var discount = product_details.discount;

                    $('#product_sale_price').text((product_details.price)-((product_details.price)*(discount/100))).append(' Tk.');
                    $('#discount_show').text(product_details.discount).append('% off');
                    $('#description').html(product_details.description).text();

                    $('#product_details_modal').modal('show');
                },
                error: function(err){
                    console.log(err);
                }
            });
        });
    </script>
{{-- add to cart --}}
<script type="text/javascript">
        $('.addCart').on('click', function(){
            var id = $(this).data('id');

            $.ajax({
                url: "{{ url('/add/to/cart')}}/"+id,
                type: 'GET',
               
                success: function(data){
                   var data = $.parseJSON(data);
                    $("#totalItemsss").attr('data-count',(data.totalItems));

                    swal({
                        toast: true,
                        title: "Success!",   
                        text: "Your item successfully added into the cart!",   
                        type: "success",   
                        closeOnConfirm: false,
                        timer: 3000,
                    });
                    

                     
                    // $('.viewCart').on('click', function(){
                    //     var items = data.dataItems;
                    //     console.log(items.id);
                    //     $.each(items, function(_, item){
                    //         $('#title').append('<p> Title: ' + item.id + '</p>');
                    //     });

                    // });
                    
                    
                    
                    
                },
                error: function(err){
                    console.log(err);
                }
            });
            
        });
</script>





</body>

</html>