{{-- Title --}}
@section('title', 'Danh sách danh mục')

<div class="card-body p-0">
    <div class="table-responsive">
        <table class="data-tables table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th style="width: 5%;">ID</th>
                    <th style="width: 30%;">Tên danh mục</th>
                    <th style="width: 15%;">Trạng thái</th>
                    <th style="width: 20%;">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            @if($category->status == 1)
                                <span class="badge badge-success">Kích hoạt</span>
                            @else
                                <span class="badge badge-danger">Không hoạt động</span>
                            @endif
                        </td>
                        <td>
                            <div class='btn-group'>
                                <a href="{{ route('categories.edit', [$category->id]) }}" class='btn btn-sm btn-warning mr-2'>
                                    Sửa
                                </a>
                                {!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'delete', 'style' => 'display:inline']) !!}
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
            @include('adminlte-templates::common.paginate', ['records' => $categories])
        </div>
    </div>
</div>
