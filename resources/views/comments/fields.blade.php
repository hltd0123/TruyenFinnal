<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:') !!}
    {!! Form::text('id', null, ['class' => 'form-control']) !!}
</div>

<!-- Content Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('content', 'Content:') !!}
    {!! Form::textarea('content', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::text('status', null, ['class' => 'form-control']) !!}
</div>

<!-- Userid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('userId', 'Userid:') !!}
    {!! Form::select('userId', $users, null, ['class' => 'form-control custom-select', 'placeholder' => 'Chọn người dùng']) !!}
</div>

<!-- Storyid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('storyId', 'Storyid:') !!}
    {!! Form::select('storyId', $stories, null, ['class' => 'form-control custom-select', 'placeholder' => 'Chọn Story']) !!}
</div>

<!-- Chapterid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('chapterId', 'Chapterid:') !!}
    {!! Form::select('chapterId', $chapters, null, ['class' => 'form-control custom-select', 'placeholder' => 'Chọn Chapter']) !!}
</div>