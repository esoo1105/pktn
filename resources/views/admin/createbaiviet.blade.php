@extends('admin/index')
@section('content')
<form action="/createbv" method="post">
    @csrf
    <div class="form-group">
        <label for="title">Tên bài viết:</label>
        <input type="text" class="form-control" name="title" placeholder="Nhập tên bài viết" required>
    </div>
    <div class="form-group">
        <label for="content">Nội dung bài viết:</label>
        <textarea class="form-control" name="content" rows="5" placeholder="Nhập nội dung bài viết" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Thêm</button>
</form>
@endsection
