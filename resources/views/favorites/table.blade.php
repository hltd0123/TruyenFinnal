{{-- Title --}}
@section('title', 'Danh sách yêu thích')

<div class="card-body p-0">
    <div class="table-responsive">
        <table class="data-tables table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th style="width: 10%;">ID</th>
                    <th style="width: 15%;">Trạng thái</th>
                    <th style="width: 20%;">User</th>
                    <th style="width: 20%;">Story</th>
                    <th style="width: 15%;">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($favorites as $favorite)
                    <tr>
                        <td>{{ $favorite->id }}</td>
                        <td>
                            @if($favorite->status == 1 || $favorite->status === 'Active')
                                <span class="badge badge-success">Kích hoạt</span>
                            @else
                                <span class="badge badge-danger">Không hoạt động</span>
                            @endif
                        </td>
                        <td>{{ $favorite->userId }}</td>
                        <td>{{ $favorite->storyId }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('favorites.edit', [$favorite->id]) }}" class="btn btn-sm btn-warning mr-2">
                                    Sửa
                                </a>
                                {!! Form::open(['route' => ['favorites.destroy', $favorite->id], 'method' => 'delete', 'style' => 'display:inline']) !!}
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
            @include('adminlte-templates::common.paginate', ['records' => $favorites])
        </div>
    </div>
</div>
