<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Anime Template">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đọc {{ $story->title }}</title>

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
    <style>
        .text-wrap {
            max-width: 80%;            /* Chiều rộng tối đa là 80% */
            word-wrap: break-word;     /* Cắt từ quá dài và xuống dòng */
            white-space: normal;       /* Giữ nguyên các dòng khi cần thiết */
        }
    </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- đổ Header Section Begin -->
    @include('layouts.header-user')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                        <a href="{{ route('category.show', $story->category->id) }}">Thể loại</a>
                        <a href="#">{{ $story->category->name}}</a>
                        <span> {{ $story->title}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Anime Section Begin -->
    <section class="anime-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <!-- đổ chương truyện vào -->
                    <div class="anime__details__title " style="text-align: center;">
                        <h3 style="font-size: 3.5em;">{{ $chapter->chapterTitle }}</h3>
                    </div>
                    <div class="anime__details__title">
                        <h3 style="font-size: 1.5em;" class="text-wrap">{!! nl2br(e($chapter->content)) !!}</h3>
                    </div>                    

                    <div class="anime__details__episodes">
                        <div class="section-title">
                            <h5>Chương truyện</h5>
                        </div>                   
                        @foreach($story->chapters as $chapter)
                            <a href="{{ route('story.chapter', ['storyName' => urlencode($story->title), 'chapterNumber' => $chapter->chapterNumber]) }}">
                                {{$chapter->chapterNumber }} - {{ $chapter->chapterTitle }}
                            </a>
                        @endforeach
                    </div>                    
                </div>
            </div>
            
            @include('userView.comment-field');
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
