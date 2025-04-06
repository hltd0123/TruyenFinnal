<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Coverimage Field -->
<div class="form-group col-sm-6">
    {!! Form::label('coverImage', 'Coverimage:') !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('coverImage', ['class' => 'custom-file-input'], ['id' => 'coverImage']) !!}
            {!! Form::label('coverImage', 'Choose file', ['class' => 'custom-file-label']) !!}
        </div>
    </div>
</div>
<div class="clearfix"></div>
<script>
    // Khi người dùng chọn file, cập nhật tên file vào label
    document.getElementById('coverImage').addEventListener('change', function() {
        var fileName = this.files[0].name; // Lấy tên file từ input file
        var label = this.nextElementSibling; // Lấy label kế tiếp
        label.innerHTML = fileName; // Cập nhật tên file vào label
    });
</script>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::text('status', null, ['class' => 'form-control']) !!}
</div>

<!-- Authorid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('authorId', 'Tác giả:') !!}
    {!! Form::select('authorId', $authors, null, [
        'class' => 'form-control custom-select',
        'placeholder' => 'Chọn tác giả'
    ]) !!}
</div>

<!-- Categoryid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('categoryId', 'Danh mục:') !!}
    {!! Form::select('categoryId', $categories, null, [
        'class' => 'form-control custom-select',
        'placeholder' => 'Chọn danh mục'
    ]) !!}
</div>
