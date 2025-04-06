<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Anime Template">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anime | Template</title>

    <!-- Google Font -->
    <link href="{{ asset('userResources/fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap') }}" rel="stylesheet">
    <link href="{{ asset('userResources/fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap') }}" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('userResources/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('userResources/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('userResources/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('userResources/css/plyr.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('userResources/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('userResources/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('userResources/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('userResources/css/style.css') }}" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Đổ Header vào -->
    @include('layouts.header') <!-- Thêm header vào Blade -->

    <!-- Normal Breadcrumb Begin -->
    <section class="normal-breadcrumb set-bg" data-setbg="{{ asset('userResources/img/normal-breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="normal__breadcrumb__text">
                        <h2>Đăng nhập</h2>
                        <p>Chào mừng đến với trang đăng nhập</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Normal Breadcrumb End -->

    <!-- Login Section Begin -->
    <section class="login spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login__form">
                        <h3>Login</h3>
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="input__item">
                                <input type="email" name="email" placeholder="Email address" required>
                                <span class="icon_mail"></span>
                            </div>
                            <div class="input__item">
                                <input type="password" name="password" placeholder="Password" required>
                                <span class="icon_lock"></span>
                            </div>
                            <button type="submit" class="site-btn">Đăng nhập</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login__register">
                        <h3>Bạn muốn đăng ký?</h3>
                        <a href="{{ route('signup') }}" class="primary-btn">Đăng ký</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Login Section End -->

    <!-- Đổ Footer vào -->
    @include('layouts.footer') <!-- Thêm footer vào Blade -->

    <!-- Js Plugins -->
    <script src="{{ asset('userResources/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('userResources/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('userResources/js/player.js') }}"></script>
    <script src="{{ asset('userResources/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('userResources/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('userResources/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('userResources/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('userResources/js/main.js') }}"></script>

</body>

</html>
