<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">پنل کاربری</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">کاربر
                    <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('user.dashboard') }}">مشخصات کاربری</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="{{ route('user.changePassword') }}">تغییر رمز عبور</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a  href="{{ route('user.showOrders') }}">سفارش ها</a>
            </li>
            <li class="dropdown">
                <a href="{{ route('user.showPayments') }}">پرداخت ها</a>
            </li>

            <li>
                <a href="{{ route('logout') }}">خروج</a>
            </li>

        </ul>
    </div>
</nav>