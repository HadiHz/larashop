<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">مدیریت فروشگاه</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">کاربران
                    <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('admin.user.list') }}">لیست کاربران</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="{{ route('admin.user.create') }}">ثبت کاربر جدید</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">محصولات
                    <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('admin.product.list') }}">لیست محصول ها</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="{{ route('admin.product.create') }}">ثبت محصول جدید</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">پرداخت ها
                    <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('admin.payments') }}">لیست پرداخت ها</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">سفارش ها
                    <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('admin.orders.list') }}">لیست سفارش ها</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">دسته بندی ها
                    <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('admin.categories.list') }}">لیست دسته بندی ها</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="{{ route('admin.categories.create') }}">ثبت دسته بندی جدید</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">روش های پست
                    <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('admin.shippingMethods.list') }}">لیست روش ها</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="{{ route('admin.shippingMethods.create') }}">ثبت روش جدید</a></li>
                </ul>
            </li>


            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">هماهنگی با نسخه دسکتاپ
                    <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('admin.sync.index') }}">sync</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>