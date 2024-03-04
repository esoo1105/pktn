@extends('admin/index')
@section('content')
    <table class="table table-striped table-bordered">
        <thead>
            <tr class="text-center">
                <th>Mã</th>
                <th>Tên</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Ngày tạo</th>
                <th>Ngày cập nhật</th>
                <th>Tùy chọn</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ytas as $yta)
                <tr class="text-center">
                    <td>{{ $yta->id }}</td>
                    <td>{{ $yta->name }}</td>
                    <td>{{ $yta->phone }}</td>
                    <td>{{ $yta->email }}</td>
                    <td>{{ $yta->created_at }}</td>
                    <td>{{ $yta->updated_at }}</td>
                    <td class="d-flex justify-content-center">
                        <form action="/deleteyta/{{ $yta->id }}" method="post" id="myForm">
                            @csrf
                            @method('delete')
                            <button type="submit" onclick="return confirmDelete1()" class="btn btn-danger"><i class="bi bi-trash "></i> Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
