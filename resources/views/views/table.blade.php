{{-- Title --}}
@section('title', 'Danh sách lượt xem')

<div class="card-body p-0">
    <div class="table-responsive">
        <table class="data-tables table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th style="width: 20%;">Thời gian xem</th>
                    <th style="width: 15%;">Trạng thái</th>
                    <th style="width: 15%;">User</th>
                    <th style="width: 15%;">Story</th>
                    <th style="width: 15%;">Chapter</th>
                    <th style="width: 20%;">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($views as $view)
                    <tr>
                        <td>{{ $view->viewed_at }}</td>
                        <td>
                            @if($view->status == 1 || $view->status === 'Active')
                                <span class="badge badge-success">Kích hoạt</span>
                            @else
                                <span class="badge badge-danger">Không hoạt động</span>
                            @endif
                        </td>
                        <td>{{ $view->userId }}</td>
                        <td>{{ $view->storyId }}</td>
                        <td>{{ $view->chapterId }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('views.edit', [$view->id]) }}" class="btn btn-sm btn-warning mr-2">
                                    Sửa
                                </a>
                                {!! Form::open(['route' => ['views.destroy', $view->id], 'method' => 'delete', 'style' => 'display:inline']) !!}
                                    {!! Form::button('Xoá', [
                                        'type' => 'submit',
                                        'class' => 'btn btn-sm btn-danger',
                                        'onclick' => "return confirm('Bạn có chắc chắn muốn xoá?')"
                                    ]) !!}
                                {!! Form::close() !!}
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $views])
        </div>
    </div>
</div>
