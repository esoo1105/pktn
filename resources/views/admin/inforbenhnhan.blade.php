@extends('admin.index')
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
        @foreach ($benhnhans as $benhnhan)
            <tr class="text-center">
                <td>{{ $benhnhan->id }}</td>
                <td>{{ $benhnhan->name }}</td>
                <td>{{ $benhnhan->phone }}</td>
                <td>{{ $benhnhan->email }}</td>
                <td>{{ $benhnhan->created_at }}</td>
                <td>{{ $benhnhan->updated_at }}</td>
                <td class="d-flex justify-content-center">
                    <form action="/deleteyta/{{ $benhnhan->id }}" method="post" id="myForm">
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