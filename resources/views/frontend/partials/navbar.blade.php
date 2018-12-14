<div class="navbar navbar-static-top" id="stickyNavbar">
    <div class="navbar-inner">
        <div class="container">
            <div class="row">
                <div class="span9">
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!--  ==========  -->
                    <!--  = Menu =  -->
                    <!--  ==========  -->
                    <div class="nav-collapse collapse">
                        <ul class="nav" id="mainNavigation">
                            <li class="dropdown active">
                                <a href="{{ route('home') }}" class="dropdown-toggle"> خانه </a>
                            </li>


                            @include('frontend.category.list' ,['items' => $categories['root'] ])


                            <li><a href="about-us.html">درباره ما</a></li>
                            <li><a href="contact.html">تماس با ما</a></li>
                        </ul>

                        <!--  ==========  -->
                        <!--  = Search form =  -->
                        <!--  ==========  -->
                        <form class="navbar-form pull-right" action="#" method="get">
                            <button type="submit"><span class="icon-search"></span></button>
                            <input type="text" class="span1" name="search" id="navSearchInput">
                        </form>
                    </div><!-- /.nav-collapse -->
                </div>

                <!--  ==========  -->
                <!--  = Cart =  -->
                <!--  ==========  -->
                <div class="span3">
                    <div class="cart-container" id="cartContainer">
                        <div class="cart">
                            <p class="items">سبد خرید <span class="dark-clr">({{ count(\App\Utility\Basket::items()) }})</span></p>
                            <p class="dark-clr hidden-tablet">{{ number_format(\App\Utility\Basket::total_price()) }}</p>
                            <a href="checkout-step-1.html" class="btn btn-danger">
                                <!-- <span class="icon icons-cart"></span> -->
                                <i class="icon-shopping-cart"></i>
                            </a>
                        </div>
                        <div class="open-panel">
                            <?php $items = \App\Utility\Basket::items(); ?>
                            @if(isset($items))
                                @foreach($items as $item)
                                    <div class="item-in-cart clearfix">
                                        <div class="image">
                                            <img src="{{ $item['image_path'] }}" width="124" height="124"
                                                 alt="cart item"/>
                                        </div>
                                        <div class="desc">
                                            <strong><a href="{{ route('frontend.product.single' ,$item['id']) }}">{{ $item['name'] }}</a></strong>
                                            <span class="light-clr qty">
                                    تعداد : {{ $item['count'] }}
                                                &nbsp;
                                    <a href="#" class="fa fa-remove" title="Remove Item"></a>
                                </span>
                                        </div>
                                        <div class="price">
                                            <strong>{{ $item['price'] }}</strong>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                            <div class="summary">
                                <div class="line">
                                    <div class="row-fluid">
                                        <div class="span6">هزینه ارسال :</div>
                                        <div class="span6 align-right"></div>
                                    </div>
                                </div>
                                <div class="line">
                                    <div class="row-fluid">
                                        <div class="span6">جمع کل :</div>
                                        <div class="span6 align-right size-16">{{ \App\Utility\Basket::total_price() }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="proceed">
                                <a href="{{ route('basket.review') }}" class="btn btn-danger pull-right bold higher">تصویه
                                    حساب
                                    <i class="icon-shopping-cart"></i></a>
                            </div>
                        </div>
                    </div>
                </div> <!-- /cart -->
            </div>
        </div>
    </div>
</div>