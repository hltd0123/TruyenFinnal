{{-- Title --}}
@section('title', 'Danh sách bình luận')

<div class="card-body p-0">
    <div class="table-responsive">
        <table class="data-tables table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th style="width: 5%;">ID</th>
                    <th style="width: 25%;">Nội dung</th>
                    <th style="width: 10%;">Trạng thái</th>
                    <th style="width: 10%;">User</th>
                    <th style="width: 10%;">Story</th>
                    <th style="width: 10%;">Chapter</th>
                    <th style="width: 10%;">Tạo lúc</th>
                    <th style="width: 10%;">Cập nhật</th>
                    <th style="width: 10%;">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($comments as $comment)
                    <tr>
                        <td>{{ $comment->id }}</td>
                        <td>{{ $comment->content }}</td>
                        <td>
                            @if($comment->status == 1 || $comment->status === 'Active')
                                <span class="badge badge-success">Kích hoạt</span>
                            @else
                                <span class="badge badge-danger">Không hoạt động</span>
                            @endif
                        </td>
                        <td>{{ $comment->userId }}</td>
                        <td>{{ $comment->storyId }}</td>
                        <td>{{ $comment->chapterId }}</td>
                        <td>{{ $comment->created_at }}</td>
                        <td>{{ $comment->updated_at }}</td>
                        <td>
                            <div class='btn-group'>
                                <a href="{{ route('comments.edit', [$comment->id]) }}" class='btn btn-sm btn-warning mr-2'>
                                    Sửa
                                </a>
                                {!! Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'delete', 'style' => 'display:inline']) !!}
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
            @include('adminlte-templates::common.paginate', ['records' => $comments])
        </div>
    </div>
</div>
