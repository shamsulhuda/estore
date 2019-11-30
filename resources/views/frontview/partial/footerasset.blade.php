<!-- jquery latest version -->
    <script src="{{asset('frontend/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <!-- Bootstrap Framework js -->
    <script src="{{asset('frontend/js/popper.min.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <!-- All js plugins included in this file. -->
    <script src="{{asset('frontend/js/plugins.js')}}"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="{{asset('frontend/js/main.js')}}"></script>

    <script type="text/javascript">
    	$(window).load(function(){          
            $("#preloaders").fadeOut(2000);
   		});
    </script>
    @include('sweetalert::alert')


<script type="text/javascript">

    {{-- ===========product details============ --}}

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
    {{-- ===========End product details============ --}}

    // ============add to cart============//
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
    // ============End of add to cart============//

       // ==============Remove item from cart============//
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

                //for reload cart item
                function refreshDiv(){
                   var container = document.getElementById("ex4");
                   var content = container.innerHTML;
                   container.innerHTML= content;
                }
            },
            error: function(err){
                console.log(err);
            }
        });
    });
    // ==============End of remove item from card=================//

    // =================add to wishlist====================//
    $('.add_to_wishlist').on('click', function(){
        var id = $(this).data('id');
        var user_id = $(this).data('user');

        if (user_id == '') {
            swal({
                toast: true,
                title: "Oops!",   
                html: "You need to <strong><a href='{{route('login')}}'>Login</a></strong> first!",   
                type: "info",   
                closeOnConfirm: false,
            });
        }
        

         $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ url('/add/to/wishlist')}}",
                type: 'post',
                data: {
                    'id':id,
                    'userId':user_id
                },
                // dataType: 'JSON',
               
                success: function(data){
                   console.log(data);
                   // var data = $.parseJSON(data);

                   if (data > 0) {

                        swal({
                            title: "Exists!",   
                            text: "Oops! This Item already in your wishlist!",   
                            type: "info",   
                            timer: 3000,
                        });

                   }else{

                       swal({
                            title: "Success!",   
                            text: "successfully added to your wishlist!",   
                            type: "success",   
                            timer: 3000,
                        });
                    }                 
                },
                error: function(err){
                    console.log(err);
                }
            });
    });
    // =================End of add to wishlist====================//
</script>
