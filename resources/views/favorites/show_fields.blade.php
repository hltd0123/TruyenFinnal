<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $favorite->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $favorite->updated_at }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $favorite->status }}</p>
</div>

<!-- Userid Field -->
<div class="col-sm-12">
    {!! Form::label('userId', 'Userid:') !!}
    <p>{{ $favorite->userId }}</p>
</div>

<!-- Storyid Field -->
<div class="col-sm-12">
    {!! Form::label('storyId', 'Storyid:') !!}
    <p>{{ $favorite->storyId }}</p>
</div>

