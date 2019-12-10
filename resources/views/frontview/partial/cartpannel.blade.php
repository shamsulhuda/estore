<div class="shopping__cart__inner">
    <div class="offsetmenu__close__btn">
        <a href="#"><i class="zmdi zmdi-close"></i></a>
    </div>

    <div class="shp__cart__wrap">
        @foreach(Cart::content() as $row)
        <div class="shp__single__product" id="remove_row">
            <div class="shp__pro__thumb">
                <a>
                    <img src="{{asset("uploads/products/{$row->options->image}")}}" alt="product images">
                </a>
            </div>
            <div class="shp__pro__details">
                <h2><a href="{{route('product.view')}}">{{$row->name}}</a></h2>
                <span class="quantity">QTY: {{$row->qty}}</span>
                <span class="shp__price">{{$row->price}} Tk.</span>
            </div>
            <div class="remove__btn">
                <a title="Remove this item" class="btn remove_cart" id="{{$row->rowId}}"><i class="zmdi zmdi-close"></i></a>
            </div>
        </div>
        @endforeach
    </div>
    <ul class="shoping__total">
        <li class="subtotal">Subtotal: {{ Cart::subtotal() }}</li>
        <li class="total__price">Total: {{Cart::total()}}</li>
    </ul>
    <ul class="shopping__btn">
        <li><a href="{{route('view_cart')}}">View Cart</a></li>
        <li class="shp__checkout"><a href="{{route('view.checkout')}}">Checkout</a></li>
    </ul>
</div>