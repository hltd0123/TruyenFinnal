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

    <!-- Đổ Header vào -->
    @include('layouts.header-user')

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ route('home') }}"><i class="fa fa-home"></i> Trang chủ</a>
                        <a href="{{ route('category.show', $story->category->id) }}">Thể loại</a>
                        <span>{{ $story->category->name }}</span> <!-- Cập nhật phần này khi dữ liệu có sẵn -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Anime Section Begin -->
    <section class="anime-details spad">
        <div class="container">
            <div class="anime__details__content">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="anime__details__pic set-bg" data-setbg="{{ asset($story->coverImage) }}">
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="anime__details__text">
                            <div class="anime__details__title">
                                <h3>{{ $story->title }}</h3> 
                            </div>
                            <p>
                                {{ $story->description }} <!-- Mô tả truyện -->
                            </p>
                            <div class="anime__details__widget">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <ul>
                                            <li><span>Thể loại truyện:</span> {{ $story->category->name }}</li> <!-- Thể loại truyện -->
                                            <li><span>Tác giả:</span> {{ $story->author->name }}</li> <!-- Tên tác giả -->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="anime__details__btn">
                                <a href="#" class="follow-btn"><i class="fa fa-heart-o"></i> Lưu truyện</a>
                                <a href="{{ route('story.chapter', ['storyName' =>urlencode($story->title), 'chapterNumber' => 1] ) }}" class="watch-btn"><span>Đọc truyện</span> <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br>
                
                @include('userView.comment-field')
            </div>
        </section>
        <!-- Anime Section End -->

        <!-- Đổ Footer vào -->
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
