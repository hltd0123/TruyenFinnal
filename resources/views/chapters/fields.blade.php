<!-- Chaptertitle Field -->
<div class="form-group col-sm-6">
    {!! Form::label('chapterTitle', 'Chaptertitle:') !!}
    {!! Form::text('chapterTitle', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Content Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('content', 'Content:') !!}
    {!! Form::textarea('content', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Chapternumber Field -->
<div class="form-group col-sm-6">
    {!! Form::label('chapterNumber', 'Chapternumber:') !!}
    {!! Form::number('chapterNumber', null, ['class' => 'form-control', 'required', 'min' => 1]) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::text('status', null, ['class' => 'form-control']) !!}
</div>