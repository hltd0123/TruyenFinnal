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

    <!-- Normal Breadcrumb Begin -->
    <section class="normal-breadcrumb set-bg" data-setbg="{{ asset('userResources/img/normal-breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="normal__breadcrumb__text">
                        <h2>{{ $searchType }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Normal Breadcrumb End -->

    <!-- Product Section Begin -->
    <section class="product-page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="product__page__content">
                        <div class="product__page__title">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-6">
                                    <div class="section-title">
                                        @if (isset($category) && $category)
                                            <h4>Tìm thể loại: {{ $category->name }}</h4>
                                        @endif
                                        @if (isset($keyword) && $keyword)
                                            <h4>Tìm kiếm: {{ $keyword }}</h4>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($stories as $story)
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg" data-setbg="{{ asset($story->coverImage) }}">
                                        </div>
                                        <div class="product__item__text">
                                            <ul>
                                                <li>{{ $story->category->name }}</li> <!-- Thể loại -->
                                                <li>{{ $story->author->name }}</li> <!-- Tên tác giả -->
                                            </ul>
                                            <h5><a href={{ route('story.details', $story->id) }}>{{ $story->title }}</a></h5> <!-- Tên truyện -->
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="product__pagination">
                        <!-- Nút quay về trang đầu tiên chỉ khi không ở trang đầu tiên -->
                        @if ($stories->currentPage() > 1)
                            <a href="{{ $stories->url(1) }}@if(isset($keyword) && $keyword) &keyword={{ $keyword }} @endif @if(request('category')) &category={{ request('category') }} @endif" class="first-page">
                                <i class="fa fa-angle-double-left"></i> <!-- Sử dụng icon cho nút quay về trang đầu tiên -->
                            </a>
                        @endif
                    
                        <!-- Các trang phân trang -->
                        @for ($i = 1; $i <= $stories->lastPage(); $i++)
                            <a href="{{ $stories->url($i) }}@if(isset($keyword) && $keyword) &keyword={{ $keyword }} @endif @if(request('category')) &category={{ request('category') }} @endif" 
                                @if ($i == $stories->currentPage()) class="current-page" @endif>
                                {{ $i }}
                            </a>
                        @endfor
                    
                        <!-- Nút chuyển sang trang tiếp theo -->
                        @if ($stories->hasMorePages())
                            <a href="{{ $stories->nextPageUrl() }}@if(isset($keyword) && $keyword) &keyword={{ $keyword }} @endif @if(request('category')) &category={{ request('category') }} @endif">
                                <i class="fa fa-angle-double-right"></i> <!-- Sử dụng icon cho nút chuyển tiếp -->
                            </a>
                        @endif
                    </div>                                                                                   
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="product__sidebar">
                        <div class="product__sidebar__view">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

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
