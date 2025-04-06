<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Story Template">
    <meta name="keywords" content="Story, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $story->title }} | Template</title>

    <!-- Google Font -->
    <link href="userResources/fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="userResources/fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

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
                        <a href="/"><i class="fa fa-home"></i> Trang chủ</a>
                        <a href="">Thể loại</a>
                        <span>{{ $story->category->name }}</span> <!-- Tên thể loại của story -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Story Section Begin -->
    <section class="story-details spad">
        <div class="container">
            <div class="story__details__content">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="story__details__pic set-bg" data-setbg="{{ asset( $story->coverImage) }}">
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="story__details__text">
                            <div class="story__details__title">
                                <h3>{{ $story->title }}</h3> <!-- Tên câu chuyện -->
                            </div>
                            <p>
                                {{ $story->description }} <!-- Mô tả câu chuyện -->
                            </p>
                            <div class="story__details__widget">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <ul>
                                            <li><span>Thể loại câu chuyện:</span> {{ $story->category->name }}</li> <!-- Thể loại -->
                                            <li><span>Tác giả:</span> {{ $story->author->name }}</li> <!-- Tên tác giả -->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="story__details__btn">
                                <a href="#" class="follow-btn"><i class="fa fa-heart-o"></i> Lưu câu chuyện</a>
                                <a href="" class="watch-btn"><span>Đọc câu chuyện</span> <i
                                    class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <div class="story__details__review">
                            <div class="section-title">
                                <h5>Reviews</h5>
                            </div>
                            @foreach ($comments as $comment)
                                <div class="story__review__item">
                                    <div class="story__review__item__pic">
                                        <img src="{{ asset('userResources/img/story/review-1.jpg') }}" alt="">
                                    </div>
                                    <div class="story__review__item__text">
                                        <h6>{{ $comment->user->name }} - <span>{{ $comment->created_at->diffForHumans() }}</span></h6>
                                        <p>{{ $comment->content }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="story__details__form">
                            <div class="section-title">
                                <h5>Your Comment</h5>
                            </div>
                            <form action="{{ route('story.review', $story->id) }}" method="POST">
                                @csrf
                                <textarea name="content" placeholder="Your Comment"></textarea>
                                <button type="submit"><i class="fa fa-location-arrow"></i> Bình luận</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Story Section End -->

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
