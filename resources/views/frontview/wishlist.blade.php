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
                                <h2 class="bradcaump-title">Wishlist</h2>
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.html">Home</a>
                                  <span class="brd-separetor">/</span>
                                  <span class="breadcrumb-item active">Wishlist</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- wishlist-area start -->
        <div class="wishlist-area ptb--120 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="wishlist-content">
                            <form action="#">
                                <div class="wishlist-table table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product-remove"><span class="nobr">Remove</span></th>
                                                <th class="product-thumbnail">Image</th>
                                                <th class="product-name"><span class="nobr">Product Name</span></th>
                                                <th class="product-price"><span class="nobr"> Unit Price </span></th>
                                                <th class="product-stock-stauts"><span class="nobr"> Wish Date </span></th>
                                                <th class="product-add-to-cart"><span class="nobr">Add To Cart</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($wishlist_data as $item)
                                            <tr>
                                                <td class="product-remove"><a class="btn remove_wishItem" id="{{$item->id}}">×</a></td>
                                                <td class="product-thumbnail"><a href="#"><img src="{{asset("uploads/products/{$item->product->image}")}}" alt="" /></a></td>
                                                <td class="product-name"><a href="#">{{$item->product->product_name}}</a></td>
                                                <td class="product-price"><span class="amount">{{number_format($item->product->price,2)}} Tk.</span></td>
                                                <td class="product-stock-status"><span class="wishlist-in-stock">{{$item->created_at->diffForHumans()}}</span></td>
                                                <td class="product-add-to-cart"><a data-id="{{$item->product_id}}" class="btn addCart"> Add to Cart</a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="6">
                                                    <div class="wishlist-share">
                                                        <h4 class="wishlist-share-title">Share on:</h4>
                                                        <div class="social-icon">
                                                            <ul>
                                                                <li><a href="#"><i class="zmdi zmdi-rss"></i></a></li>
                                                                <li><a href="#"><i class="zmdi zmdi-vimeo"></i></a></li>
                                                                <li><a href="#"><i class="zmdi zmdi-tumblr"></i></a></li>
                                                                <li><a href="#"><i class="zmdi zmdi-pinterest"></i></a></li>
                                                                <li><a href="#"><i class="zmdi zmdi-linkedin"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>  
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- wishlist-area end -->
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