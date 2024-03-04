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
            @foreach ($bacsis as $bacsi)
                <tr class="text-center">
                    <td>{{ $bacsi->id }}</td>
                    <td>{{ $bacsi->name }}</td>
                    <td>{{ $bacsi->phone }}</td>
                    <td>{{ $bacsi->email }}</td>
                    <td>{{ $bacsi->created_at }}</td>
                    <td>{{ $bacsi->updated_at }}</td>
                    <td class="d-flex justify-content-center">
                        <form action="/deletebacsi/{{ $bacsi->id }}" method="post" id="myForm">
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
