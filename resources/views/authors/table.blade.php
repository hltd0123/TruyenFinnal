<div class="card-body p-0">
    <div class="table-responsive">
        <table class="data-tables table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th style="width: 5%;">ID</th>
                    <th style="width: 15%;">Author Name</th>
                    <th style="width: 20%;">Email</th>
                    <th style="width: 20%;">Bio</th>
                    <th style="width: 10%;">User</th>
                    <th style="width: 10%;">Status</th>
                    <th style="width: 15%;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($authors as $author)
                    <tr>
                        <td>{{ $author->id }}</td>
                        <td>{{ $author->name }}</td>
                        <td>{{ $author->email }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($author->bio, 50) }}</td>
                        <td>{{ $author->user->name }}</td>
                        <td>
                            @if($author->status == 1)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <div class='btn-group'>
                                <a href="{{ route('authors.edit', [$author->id]) }}" class='btn btn-sm btn-warning mr-2'>
                                    Sửa
                                </a>
                                {!! Form::open(['route' => ['authors.destroy', $author->id], 'method' => 'delete', 'style' => 'display:inline']) !!}
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
            @include('adminlte-templates::common.paginate', ['records' => $authors])
        </div>
    </div>
</div>
