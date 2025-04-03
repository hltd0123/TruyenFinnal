<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $comment->id }}</p>
</div>

<!-- Content Field -->
<div class="col-sm-12">
    {!! Form::label('content', 'Content:') !!}
    <p>{{ $comment->content }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $comment->status }}</p>
</div>

<!-- Userid Field -->
<div class="col-sm-12">
    {!! Form::label('userId', 'Userid:') !!}
    <p>{{ $comment->userId }}</p>
</div>

<!-- Storyid Field -->
<div class="col-sm-12">
    {!! Form::label('storyId', 'Storyid:') !!}
    <p>{{ $comment->storyId }}</p>
</div>

<!-- Chapterid Field -->
<div class="col-sm-12">
    {!! Form::label('chapterId', 'Chapterid:') !!}
    <p>{{ $comment->chapterId }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $comment->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $comment->updated_at }}</p>
</div>

