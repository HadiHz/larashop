@extends('layouts.frontend')
@section('content')

    <aside class="span3 left-sidebar">
        <div class="sidebar-item sidebar-filters" id="sidebarFilters">

            <!--  ==========  -->
            <!--  = Sidebar Title =  -->
            <!--  ==========  -->
            <div class="underlined">
                <h3><span class="light">بر اساس فیلتر</span> خرید کنید</h3>
            </div>

            <!--  ==========  -->
            <!--  = Categories =  -->
            <!--  ==========  -->
            <div class="accordion-group">
                <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" href="#filterOne">دسته بندی ها <b
                                class="caret"></b></a>
                </div>
                <div id="filterOne" class="accordion-body collapse in">
                    <div class="accordion-inner">
                        @foreach($categories as $category)
                            <a href="#" data-target=".filter--{{ $category->id }}" class="selectable"><i class="box"></i>{{ $category->name }}</a>
                            @endforeach

                    </div>
                </div>
            </div> <!-- /categories -->



            <!--  ==========  -->
            <!--  = Prices slider =  -->
            <!--  ==========  -->
            <div class="accordion-group">
                <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" href="#filterPrices">قیمت <b
                                class="caret"></b></a>
                </div>
                <div id="filterPrices" class="accordion-body in collapse">
                    <div class="accordion-inner with-slider">
                        <div class="jqueryui-slider-container">
                            <div id="pricesRange"></div>
                        </div>
                        <input type="text" data-initial="{{ $maxPrice }}" value="{{ $maxPrice }}" class="max-val span1 pull-right" disabled/>
                        <input type="text" data-initial="0" class="min-val span1" disabled/>
                    </div>
                </div>
            </div> <!-- /prices slider -->



            <a href="#" class="remove-filter" id="removeFilters"><span class="icon-ban-circle"></span> حذف همه فیلتر ها</a>

        </div>
    </aside>

    <section class="span9 blocks-spacer">

        <!--  ==========  -->
        <!--  = Title =  -->
        <!--  ==========  -->
        <div class="underlined push-down-20">
            <div class="row">
                <div class="span5">
                    <h3><span class="light">جستجو:</span>{{ $search }}</h3>
                </div>
                <div class="span4">
                    <div class="form-inline sorting-by">
                        <label for="isotopeSorting" class="black-clr">چینش:</label>
                        <select id="isotopeSorting" class="span3">
                            <option value='{"sortBy":"price", "sortAscending":"true"}'>بر اساس قیمت (کم به زیاد)
                                &uarr;
                            </option>
                            <option value='{"sortBy":"price", "sortAscending":"false"}'>بر اساس قیمت (زیاد به کم)
                                &darr;
                            </option>
                            <option value='{"sortBy":"name", "sortAscending":"true"}'>بر اساس نام (صعودی) &uarr;
                            </option>
                            <option value='{"sortBy":"name", "sortAscending":"false"}'>بر اساس نام (نزولی) &darr;
                            </option>
                        </select>
                    </div>
                </div>
            </div>
        </div> <!-- /title -->

        <!--  ==========  -->
        <!--  = Products =  -->
        <!--  ==========  -->
        <div class="row popup-products">
            <div id="isotopeContainer" class="isotope-container">


            @foreach($products as $product)
                <!--  ==========  -->
                    <!--  = Single Product =  -->
                    <!--  ==========  -->
                <?php
                        $catIds = $product->categories()->pluck('id')->toArray();
                        $filter= '';
                foreach ($catIds as $id){
                    $filter = $filter . ' filter--'.$id;
                }
                    ?>
                    <div class="span3 {{ $filter }}" data-price="{{ $product->price }}" data-popularity="5" data-size="xs|s|l|xxl"
                         data-color="purple|orange" data-brand="adidas">
                        <div class="product">

                            <div class="product-img">
                                <div class="picture">
                                    <img width="540" height="374" alt="" src="{{ $product->image_path }}"/>
                                    <div class="img-overlay">
                                        <a class="btn more btn-primary" href="{{ route('frontend.product.single' , $product->id) }}">توضیحات بیشتر</a>
                                        <a data-pid="{{ $product->id }}" class="btn buy btn-danger btn_add_to_cart" href="{{ route('basket.add') }}">اضافه به سبد خرید</a>
                                    </div>
                                </div>
                            </div>
                            <div class="main-titles no-margin">
                                <h4 class="title">{{ $product->name }}</h4>
                                <h5 class="no-margin isotope--title">{{ $product->price }} تومان</h5>
                            </div>

                        </div>
                    </div> <!-- /single product -->

                @endforeach


            </div>
        </div>
        <hr/>
    </section>
    <script>
        var maxPrice = @json($maxPrice);
    </script>
@endsection