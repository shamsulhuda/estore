<div class="slider__container slider--one">
    <div class="slider__activation__wrap owl-carousel owl-theme">
        @foreach($sliders as $slider)
        <!-- Start Single Slide -->
        <div class="slide slider__full--screen" style="background: rgba(0, 0, 0, 0) url({{asset("uploads/slider/{$slider->image}")}}) no-repeat scroll center center / cover ;">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-4 col-sm-12 col-xs-12">
                        <div class="slider__inner">
                            <h1>{{$slider->title}} <span class="text--theme">Collection</span></h1>
                            <div class="slider__btn">
                                <a class="htc__btn" href="cart.html">shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        
    </div>
</div>