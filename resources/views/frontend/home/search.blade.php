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

            <!--  ==========  -->
            <!--  = Size filter =  -->
            <!--  ==========  -->
            <div class="accordion-group">
                <div class="accordion-heading">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" href="#filterTwo">سایز <b
                                class="caret"></b></a>
                </div>
                <div id="filterTwo" class="accordion-body collapse">
                    <div class="accordion-inner">
                        <a href="#" data-target="xs" data-type="size" class="selectable detailed"><i class="box"></i> XS</a>
                        <a href="#" data-target="s" data-type="size" class="selectable detailed"><i class="box"></i>
                            S</a>
                        <a href="#" data-target="m" data-type="size" class="selectable detailed"><i class="box"></i>
                            M</a>
                        <a href="#" data-target="l" data-type="size" class="selectable detailed"><i class="box"></i>
                            L</a>
                        <a href="#" data-target="xl" data-type="size" class="selectable detailed"><i class="box"></i> XL</a>
                        <a href="#" data-target="xxl" data-type="size" class="selectable detailed"><i class="box"></i>
                            XXL</a>

                    </div>
                </div>
            </div> <!-- /size filter -->

            <!--  ==========  -->
            <!--  = Color filter =  -->
            <!--  ==========  -->
            <div class="accordion-group">
                <div class="accordion-heading">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" href="#filterThree">رنگ <b
                                class="caret"></b></a>
                </div>
                <div id="filterThree" class="accordion-body collapse">
                    <div class="accordion-inner">
                        <a href="#" data-target="red" data-type="color" class="selectable detailed"><i class="box"></i>
                            قرمز</a>
                        <a href="#" data-target="green" data-type="color" class="selectable detailed"><i
                                    class="box"></i> سبز</a>
                        <a href="#" data-target="blue" data-type="color" class="selectable detailed"><i class="box"></i>
                            آبی</a>
                        <a href="#" data-target="pink" data-type="color" class="selectable detailed"><i class="box"></i>
                            صورتی</a>
                        <a href="#" data-target="purple" data-type="color" class="selectable detailed"><i
                                    class="box"></i> بنفش</a>
                        <a href="#" data-target="orange" data-type="color" class="selectable detailed"><i
                                    class="box"></i> نارنجی</a>

                    </div>
                </div>
            </div> <!-- /color filter -->

            <!--  ==========  -->
            <!--  = Brand filter =  -->
            <!--  ==========  -->
            <div class="accordion-group">
                <div class="accordion-heading">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" href="#filterFour">برند <b
                                class="caret"></b></a>
                </div>
                <div id="filterFour" class="accordion-body collapse">
                    <div class="accordion-inner">
                        <a href="#" data-target="s-oliver" data-type="brand" class="selectable detailed"><i
                                    class="box"></i> S. Oliver</a>
                        <a href="#" data-target="nike" data-type="brand" class="selectable detailed"><i class="box"></i>
                            Nike</a>
                        <a href="#" data-target="naish" data-type="brand" class="selectable detailed"><i
                                    class="box"></i> Naish</a>
                        <a href="#" data-target="adidas" data-type="brand" class="selectable detailed"><i
                                    class="box"></i> Adidas</a>
                        <a href="#" data-target="puma" data-type="brand" class="selectable detailed"><i class="box"></i>
                            Puma</a>
                        <a href="#" data-target="shred" data-type="brand" class="selectable detailed"><i
                                    class="box"></i> Shred</a>

                    </div>
                </div>
            </div> <!-- /brand filter -->

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
                            <option value='{"sortBy":"popularity", "sortAscending":"true"}'>بر اساس محبوبیت (کم به زیاد)
                                &uarr;
                            </option>
                            <option value='{"sortBy":"popularity", "sortAscending":"false"}'>بر اساس محبوبیت (زیاد به
                                کم) &darr;
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