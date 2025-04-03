<!-- Viewed At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('viewed_at', 'Viewed At:') !!}
    {!! Form::text('viewed_at', null, ['class' => 'form-control','id'=>'viewed_at']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#viewed_at').datepicker()
    </script>
@endpush

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::text('status', null, ['class' => 'form-control']) !!}
</div>

<!-- Userid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('userId', 'Người dùng:') !!}
    {!! Form::select('userId', $users, null, [
        'class' => 'form-control custom-select',
        'placeholder' => 'Chọn người dùng'
    ]) !!}
</div>

<!-- Storyid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('storyId', 'Truyện:') !!}
    {!! Form::select('storyId', $stories, null, [
        'class' => 'form-control custom-select',
        'placeholder' => 'Chọn truyện'
    ]) !!}
</div>

<!-- Chapterid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('chapterId', 'Chương:') !!}
    {!! Form::select('chapterId', $chapters, null, [
        'class' => 'form-control custom-select',
        'placeholder' => 'Chọn chương'
    ]) !!}
</div>
