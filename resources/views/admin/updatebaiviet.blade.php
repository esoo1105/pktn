@extends('admin/index')
@section('content')
<form action="/update/{{ $baiviet->id }}" method="post">
    @csrf 
    @method('PUT')
    <div class="form-group">
        <label for="title">Tên bài viết:</label>
        <input type="text" class="form-control" name="title" value="{{ $baiviet->name }}" placeholder="Nhập tên bài viết">
    </div>
    <div class="form-group">
        <label for="content">Nội dung bài viết:</label>
        <textarea class="form-control" name="content" rows="5" placeholder="Nhập nội dung bài viết">{{ $baiviet->noidung }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>
@endsection