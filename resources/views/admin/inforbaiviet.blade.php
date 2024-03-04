@extends('admin/index')
@section('content')
    <table class="table table-striped table-bordered">
        <thead>
            <tr class="text-center">
                <th>Mã</th>
                <th>Tên</th>
                <th>Nội dung</th>
                <th>Ngày tạo</th>
                <th>Ngày cập nhật</th>
                <th>Tùy chọn</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($baiviets as $baiviet)
            <tr class="text-center">
                <td>{{ $baiviet->id}}</td>
                <td>{{ $baiviet->name }}</td>
                <td>{{ $baiviet->noidung }}</td>
                <td>{{ $baiviet->created_at }}</td>
                <td>{{ $baiviet->updated_at }}</td>
                <td class="d-flex justify-content-center">
                    <form action="/deletebaiviet/{{ $baiviet->id }}" method="post" class="mr-2">
                        @csrf
                        @method('delete')
                        <button type="submit" onclick="return confirmDelete2()" class="btn btn-danger"><i class="bi bi-trash "></i> Xóa</button>
                    </form>
                    <a href="/baiviet/{{ $baiviet->id }}/edit">
                        <button class="btn btn-success"><i class="bi bi-pencil"></i> Sửa</button>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
