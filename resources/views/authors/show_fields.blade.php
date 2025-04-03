<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $author->name }}</p>
</div>

<!-- Bio Field -->
<div class="col-sm-12">
    {!! Form::label('bio', 'Bio:') !!}
    <p>{{ $author->bio }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $author->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $author->updated_at }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $author->status }}</p>
</div>

<!-- Userid Field -->
<div class="col-sm-12">
    {!! Form::label('userId', 'Userid:') !!}
    <p>{{ $author->userId }}</p>
</div>

