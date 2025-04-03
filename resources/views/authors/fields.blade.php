<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Bio Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('bio', 'Bio:') !!}
    {!! Form::textarea('bio', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::text('status', null, ['class' => 'form-control']) !!}
</div>

<!-- Userid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('userId', 'Userid:') !!}
    {!! Form::select('userId', $users, null, ['class' => 'form-control', 'placeholder' => 'Chọn người dùng']) !!}
</div>