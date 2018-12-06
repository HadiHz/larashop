@extends('layouts.frontend')
@section('content')
    @if(isset($product))
        <div class="row blocks-spacer">

            <!--  ==========  -->
            <!--  = Preview Images =  -->
            <!--  ==========  -->
            <div class="span5">
                <div class="product-preview">
                    <div class="picture">
                        <img src="{{ $product->image_path }}" alt="{{ $product->name }}" width="940" height="940"
                             id="mainPreviewImg"/>
                    </div>
                </div>
            </div>

            <!--  ==========  -->
            <!--  = Title and short desc =  -->
            <!--  ==========  -->
            <div class="span7">
                <div class="product-title">
                    <h1 class="name"><span class="light">{{ $product->name }}</span></h1>
                    <div class="meta">
                        <span class="tag">{{ $product->price }} تومان</span>
                        <span class="stock">
                                <span class="btn btn-success">موجود</span>
                                <span class="btn btn-danger">اتمام موجودی</span>
                                <span class="btn btn-warning">تماس بگیرید</span>
                        </span>
                    </div>
                </div>
                <div class="product-description">
                    <p>{{ $product->description }}</p>
                    <hr/>

                    <!--  ==========  -->
                    <!--  = Add to cart form =  -->
                    <!--  ==========  -->
                    <div class="form form-inline clearfix ">
                        <div class="numbered">
                            <input id="numTxt" type="text" name="num" value="1" class="tiny-size"/>
                            <span class="clickable add-one icon-plus-sign-alt"></span>
                            <span class="clickable remove-one icon-minus-sign-alt"></span>
                        </div>
                        &nbsp;
                        <a data-pid="{{ $product->id }}" class="btn btn-danger btn_add_to_cart"><i
                                    class="fa fa-shopping-cart"></i> اضافه به سبد خرید</a>
                    </div>
                    <hr/>


                </div>
            </div>
        </div>
    @endif
@endsection