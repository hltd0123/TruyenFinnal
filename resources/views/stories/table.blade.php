{{-- Title --}}
@section('title', 'Danh sách truyện')

<div class="card-body p-0">
    <div class="table-responsive">
        <table class="data-tables table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th style="width: 25%;">Tiêu đề</th>
                    <th style="width: 15%;">Trạng thái</th>
                    <th style="width: 15%;">Tác giả</th>
                    <th style="width: 15%;">Danh mục</th>
                    <th style="width: 15%;">Đường dẫn ảnh</th>
                    <th style="width: 20%;">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($stories as $story)
                    <tr>
                        <td>{{ $story->title }}</td>
                        <td>
                            @if($story->status == 1 || $story->status === 'Active')
                                <span class="badge badge-success">Kích hoạt</span>
                            @else
                                <span class="badge badge-danger">Không hoạt động</span>
                            @endif
                        </td>
                        <td>{{ $story->author->name }}</td>
                        <td>{{ $story->category->name }}</td>
                        <td>{{ $story->coverImage }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('stories.edit', [$story->id]) }}" class="btn btn-sm btn-warning mr-2">
                                    Sửa
                                </a>
                                {!! Form::open(['route' => ['stories.destroy', $story->id], 'method' => 'delete', 'style' => 'display:inline']) !!}
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
            @include('adminlte-templates::common.paginate', ['records' => $stories])
        </div>
    </div>
</div>
