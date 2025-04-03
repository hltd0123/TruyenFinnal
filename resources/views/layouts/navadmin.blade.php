<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookstore</title>
    @include('layouts.linkcss')
    @include('layouts.linkjs')
</head>
<body>
    <!-- Sidebar -->
    <div class="iq-sidebar">
        <div class="iq-sidebar-logo d-flex justify-content-between">
            <a class="header-logo">
                <img src="{{ asset('resources/images/logo.png') }}" class="img-fluid rounded-normal" alt="">
                <div class="logo-title">
                    <span class="text-primary text-uppercase">Bookstore</span>
                </div>
            </a>
            <div class="iq-menu-bt-sidebar">
                <div class="iq-menu-bt align-self-center">
                    <div class="wrapper-menu">
                        <div class="main-circle"><i class="las la-bars"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div id="sidebar-scrollbar">
            <nav class="iq-sidebar-menu">
                <ul id="iq-sidebar-toggle" class="iq-menu">
                    @php
                        $menus = [
                            'authors' => 'ri-file-user-line',
                            'categories' => 'ri-list-check-2',
                            'chapters' => 'ri-pages-line',
                            'comments' => 'ri-chat-3-line',
                            'favorites' => 'ri-heart-line',
                            'stories' => 'ri-book-2-line',
                            'views' => 'ri-eye-line'
                        ];
                    @endphp
                
                    @foreach($menus as $name => $icon)
                        <li>
                            <a href="#{{ $name }}" class="iq-waves-effect" data-toggle="collapse" aria-expanded="false">
                                <i class="{{ $icon }}"></i><span>{{ ucfirst($name) }}</span>
                                <i class="ri-arrow-right-s-line iq-arrow-right"></i>
                            </a>
                            <ul id="{{ $name }}" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                <li><a href="{{ route($name.'.index') }}">Xem đầy đủ</a></li>
                                <li><a href="{{ route($name.'.create') }}">Thêm mới</a></li>
                            </ul>
                        </li>
                    @endforeach
                </ul>                               
            </nav>
        </div>
    </div>

    <!-- TOP Nav Bar -->
    <div class="iq-top-navbar">
        <div class="iq-navbar-custom">
            <nav class="navbar navbar-expand-lg navbar-light p-0">
                <div class="iq-menu-bt d-flex align-items-center">
                    <div class="wrapper-menu">
                        <div class="main-circle"><i class="las la-bars"></i></div>
                    </div>
                    <div class="iq-navbar-logo d-flex justify-content-between">
                        <a class="header-logo">
                            <img src="{{ asset('resources/images/logo.png') }}" class="img-fluid rounded-normal" alt="">
                            <div class="logo-title">
                                <span class="text-primary text-uppercase">Bookstore</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="iq-search-bar">
                    <form action="#" class="searchbox">
                        <input type="text" class="text search-input" placeholder="Search Here...">
                        <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                    </form>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                    <i class="ri-menu-3-line"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-list">
                        <li class="nav-item nav-icon search-content">
                            <a href="#" class="search-toggle iq-waves-effect text-gray rounded">
                                <i class="ri-search-line"></i>
                            </a>
                        </li>
                        <li class="line-height pt-3">
                            <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                                <img src="{{ asset('resources/images/user.png') }}" class="img-fluid rounded-circle mr-3" alt="user">
                                <div class="caption">
                                    <h6 class="mb-1 line-height">User</h6>
                                </div>
                            </a>
                            <div class="iq-sub-dropdown iq-user-dropdown">
                                <div class="iq-card shadow-none m-0">
                                    <div class="iq-card-body p-0">
                                        <div class="bg-primary p-3">
                                            <h5 class="mb-0 text-white line-height">Hello User</h5>
                                            <span class="text-white font-size-12">Available</span>
                                        </div>
                                        <div class="d-inline-block w-100 text-center p-3">
                                            <form method="POST" >
                                                @csrf
                                                <button class="bg-primary iq-sign-btn" type="submit">
                                                    Sign out <i class="ri-login-box-line ml-2"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!-- TOP Nav Bar END -->

    <!-- Main Content -->
    <div class="content-wrapper p-4">
        @yield('content')
    </div>
</body>
</html>
