<header id="header">
    <div class="container">
        <div class="row">

            <!--  ==========  -->
            <!--  = Logo =  -->
            <!--  ==========  -->
            <div class="span7">
                <a class="brand" href="{{ route('home') }}">
                    <img src="{{ $setting->logoImagePath }}" alt="Webmarket Logo" width="48" height="48"/>
                    <span class="pacifico">{{ $setting->name }}</span>
                    <span class="tagline">{{ $setting->slogan }}</span>
                </a>
            </div>

            <!--  ==========  -->
            <!--  = Social Icons =  -->
            <!--  ==========  -->
            <div class="span5">
                <div class="topmost-line">

                </div>
                <div class="top-right">

                    <div class="register">
                        @if(!\Illuminate\Support\Facades\Auth::check())
                            <a href="#loginModal" role="button" data-toggle="modal">ورود</a> یا
                            <a href="#registerModal" role="button" data-toggle="modal">ثبت نام</a>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-haspopup="true"
                                   aria-expanded="false">
                                    {{ \Illuminate\Support\Facades\Auth::user()->first_name .'  خوش آمدید'  }}
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('user.dashboard')  }}">پنل کاربری</a></li>
                                    @if(auth()->user()->role == \App\User::ADMIN)
                                        <li><a href="{{ route('admin.product.list')  }}">پنل ادمین</a></li>
                                        @endif
                                    <li><a href="{{ route('logout')  }}">خروج</a></li>
                                    {{--<li><a href="#">Something else here</a></li>--}}
                                    {{--<li role="separator" class="divider"></li>--}}
                                    {{--<li><a href="#">Separated link</a></li>--}}
                                    {{--<li role="separator" class="divider"></li>--}}
                                    {{--<li><a href="#">One more separated link</a></li>--}}
                                </ul>
                            </li>
                        @endif
                    </div>
                </div>
            </div> <!-- /social icons -->
        </div>
    </div>
</header>