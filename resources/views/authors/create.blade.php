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
    <div id="loading">
        <div id="loading-center"></div>
    </div>
    <div class="wrapper">
        <div id="content-page" class="content-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">Create Author</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">

                                {{-- Hiển thị thông báo lỗi --}}
                                @include('adminlte-templates::common.errors')

                                {{-- Form tạo tác giả --}}
                                {!! Form::open(['route' => 'authors.store']) !!}

                                    <div class="row">
                                        @include('authors.fields')
                                    </div>

                                    <div class="form-group mt-3">
                                        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                                        <a href="{{ route('authors.index') }}" class="btn btn-default">Cancel</a>
                                    </div>

                                {!! Form::close() !!}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
