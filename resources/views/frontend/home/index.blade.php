@extends('layouts.frontend')

@section('content')
    @if($products && count($products) > 0)
        @foreach($products as $product)
            <div class="span3">
                <div class="product">
                    <div class="product-img">
                        <div class="picture">
                            <img src="{{ $product->image_path }}" alt="{{ $product->name }}" width="540" height="374"/>
                            <div class="img-overlay">
                                <a href="{{ route('frontend.product.single' , $product->id) }}" class="btn more btn-primary">توضیحات بیشتر</a>
                                <a data-pid="{{ $product->id }}"  class="btn buy btn-danger btn_add_to_cart">اضافه به سبد خرید</a>
                            </div>
                        </div>
                    </div>
                    <div class="main-titles no-margin">
                        <h4 class="title">{{ $product->name }}</h4>
                        <h5 class="no-margin">{{ $product->price }} تومان</h5>
                    </div>
                    <p class="desc">{{ $product->description }}</p>
                    <p class="center-align stars">
                        <span class="icon-star stars-clr"></span>
                        <span class="icon-star stars-clr"></span>
                        <span class="icon-star"></span>
                        <span class="icon-star"></span>
                        <span class="icon-star"></span>

                    </p>
                </div>
            </div>
        @endforeach
    @endif
@endsection