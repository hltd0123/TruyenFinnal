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
                                    <h4 class="card-title">Create Comments</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">

                                {{-- Hiển thị lỗi --}}
                                @include('adminlte-templates::common.errors')

                                {{-- Form tạo comment --}}
                                {!! Form::open(['route' => 'comments.store']) !!}

                                    <div class="row">
                                        @include('comments.fields')
                                    </div>

                                    <div class="form-group mt-3">
                                        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                                        <a href="{{ route('comments.index') }}" class="btn btn-default">Cancel</a>
                                    </div>

                                {!! Form::close() !!}

                            </div> {{-- end iq-card-body --}}
                        </div> {{-- end iq-card --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
