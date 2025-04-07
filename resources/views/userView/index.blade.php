<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Story Template">
    <meta name="keywords" content="Story, fiction, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Story | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

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

    @include('layouts.header-user')
    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="hero__slider owl-carousel">
                @foreach($latestStorys as $story)
                <div class="hero__items set-bg" data-setbg="{{ asset( $story->coverImage) }}">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                <div class="label">{{ $story->category->name }}</div>
                                <h2>{{ $story->title }}</h2>
                                <p>{{ $story->description }}</p>
                                <a href="{{ route('story.details', $story->id) }}"><span>Đọc truyện</span> <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="trending__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Mới cập nhật</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    <a href="{{ route('story.details', $story->id) }}" class="primary-btn">Xem thêm <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($newStorys as $story)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="{{ asset($story->coverImage) }}">
                                    </div>
                                    <div class="product__item__text">
                                        <ul>
                                            <li>{{ $story->category->name }}</li>
                                            <li>{{ $story->author->name }}</li>
                                        </ul>
                                        <h5><a href="{{ route('story.details', $story->id) }}">{{ $story->title }}</a></h5>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="product__sidebar__comment">
                        <div class="section-title">
                            <h5>Top truyện được yêu thích</h5>
                        </div>
                        @foreach($topStorys as $story)
                        <div class="product__sidebar__comment__item">
                            <div class="product__sidebar__comment__item__pic">
                                <img src="{{ asset( $story->coverImage) }}" alt="" style="max-width: 300px; max-height: 100px;">
                            </div>
                            <div class="product__sidebar__comment__item__text">
                                <ul>
                                    <li>{{ $story->category->name }}</li>
                                    <li>{{ $story->author->name }}</li>
                                </ul>
                                <h5><a href="{{ route('story.details', $story->id) }}">{{ $story->title }}</a></h5>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Footer -->
    @include('layouts.footer-user')
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
