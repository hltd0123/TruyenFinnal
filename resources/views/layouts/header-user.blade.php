<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <div class="header__logo">
                    <a href="/">
                        <img src="{{ asset('userResources/img/logo.png') }}" alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="header__nav">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class="active"><a href="/">Homepage</a></li>
                            <li><a href="#">Thể loại truyện <span class="arrow_carrot-down"></span></a>
                                <ul class="dropdown">
                                    @foreach($categories as $category)
                                        <li><a href="#">{{ $category->name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>                            
                            <li>
                                @auth
                                    <a href="./blog.html">đổ dữ liệu truyện đã lưu (khi người dùng đăng nhập)</a>
                                @endauth
                            </li>                              
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="header__right">
                    <!-- icon hình thằng người bấm vào hiển thị trang đăng nhập đăng ký luôn là trang login -->
                    <a href="#" class="search-switch"><span class="icon_search"></span></a>
                    <a href="./login.html"><span class="icon_profile"></span></a>
                </div>
            </div>
        </div>
        <div id="mobile-menu-wrap"></div>
    </div>
</header>