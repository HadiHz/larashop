@extends('layouts.frontend')
@section('slider')
    <div class="fullwidthbanner-container">
        <div class="fullwidthbanner">
            <ul>

                @foreach($sliderProducts as $product)
                <li data-transition="premium-random" data-slotamount="3">
                    <img src="{{ $product->image_path }}" alt="slider img" width="1400" height="377" />
                    <!-- texts -->
                    <div class="caption lfl big_theme"
                         data-x="120"
                         data-y="120"
                         data-speed="1000"
                         data-start="500"
                         data-easing="easeInOutBack">
                        {{ $product->name }}
                    </div>

                    <div class="caption lfl small_theme"
                         data-x="120"
                         data-y="190"
                         data-speed="1000"
                         data-start="700"
                         data-easing="easeInOutBack">
                        {{ number_format($product->price) }}تومان
                    </div>

                    <a href="{{ route('frontend.product.single' , $product->id) }}" class="caption lfl btn btn-primary btn_theme"
                       data-x="120"
                       data-y="260"
                       data-speed="1000"
                       data-start="900"
                       data-easing="easeInOutBack">
                        مشاهده ی جزییات محصول
                    </a>



                </li><!-- /slide -->

                @endforeach


                <!-- /slide -->
            </ul>
            <div class="tp-bannertimer"></div>
        </div>
        <!--  ==========  -->
        <!--  = Nav Arrows =  -->
        <!--  ==========  -->
        <div id="sliderRevLeft"><i class="icon-chevron-left"></i></div>
        <div id="sliderRevRight"><i class="icon-chevron-right"></i></div>
    </div>
@endsection

@section('content')
    @if($products && count($products) > 0)
        @foreach($products as $product)
            <div class="span3" style="width: 250px; height: 300px;">
                <div class="product">
                    <div class="product-img">
                        <div class="picture">
                            <img src="{{ $product->image_path }}" alt="{{ $product->name }}" style="width: 200px; height: 200px;"/>
                            <div class="img-overlay">
                                <a href="{{ route('frontend.product.single' , $product->id) }}" class="btn more btn-primary">توضیحات بیشتر</a>
                                @if($product->quantity_in_warehouse > 0 )
                                <a data-pid="{{ $product->id }}"  class="btn buy btn-danger btn_add_to_cart">اضافه به سبد خرید</a>
                                    @else
                                <a  class="btn buy btn-danger">ناموجود</a>
                                    @endif
                            </div>
                        </div>
                    </div>
                    <div class="main-titles no-margin">
                        <h4 class="title">{{ $product->name }}</h4>
                        <h5 class="no-margin">{{ $product->price }} تومان</h5>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
@endsection