<!-- Title Field -->
<div class="col-sm-12">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $story->title }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $story->description }}</p>
</div>

<!-- Coverimage Field -->
<div class="col-sm-12">
    {!! Form::label('coverImage', 'Coverimage:') !!}
    <p>{{ $story->coverImage }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $story->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $story->updated_at }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $story->status }}</p>
</div>

<!-- Authorid Field -->
<div class="col-sm-12">
    {!! Form::label('authorId', 'Authorid:') !!}
    <p>{{ $story->authorId }}</p>
</div>

<!-- Categoryid Field -->
<div class="col-sm-12">
    {!! Form::label('categoryId', 'Categoryid:') !!}
    <p>{{ $story->categoryId }}</p>
</div>

