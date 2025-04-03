<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bookstore</title>

    {{-- Import layout --}}
    @include($layout)
</head>
<body>
    <!-- Loader Start -->
    <div id="loading">
        <div id="loading-center"></div>
    </div>

    <div class="wrapper">
        <!-- Page Content -->
        <div id="content-page" class="content-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">Authors</h4>
                                </div>
                                <div class="iq-card-header-toolbar d-flex align-items-center">
                                    <a href="{{ route('authors.create') }}" class="btn btn-primary">Add New</a>
                                </div>
                            </div>

                            <div class="iq-card-body">

                                {{-- Hiển thị flash message --}}
                                @include('flash::message')

                                {{-- Bảng dữ liệu tác giả --}}
                                <div class="table-responsive">
                                    @include('authors.table')
                                </div>

                            </div> {{-- End iq-card-body --}}
                        </div> {{-- End iq-card --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
