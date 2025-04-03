<!-- Chaptertitle Field -->
<div class="col-sm-12">
    {!! Form::label('chapterTitle', 'Chaptertitle:') !!}
    <p>{{ $chapter->chapterTitle }}</p>
</div>

<!-- Content Field -->
<div class="col-sm-12">
    {!! Form::label('content', 'Content:') !!}
    <p>{{ $chapter->content }}</p>
</div>

<!-- Chapternumber Field -->
<div class="col-sm-12">
    {!! Form::label('chapterNumber', 'Chapternumber:') !!}
    <p>{{ $chapter->chapterNumber }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $chapter->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $chapter->updated_at }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $chapter->status }}</p>
</div>

