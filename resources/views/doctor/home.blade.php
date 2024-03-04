@extends('doctor.layout.index')
@section('content')

<body class="hold-transition sidebar-mini">
<div class="wrapper">

   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper mt-4">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Xem thông tin bệnh nhân</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Mã</th>
                    <th scope="col">Họ tên</th>
                    <th scope="col">Email</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Giới tính</th>
                    <th scope="col">Nghề nghiệp</th>
                    
                    <th scope="col">Xác nhận</th>
                  </tr>
                </thead>
                <tbody>
                  @if (!empty ($index))
                  @foreach ($index as $key => $item)
                  <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->gender }}</td>
                    <td>{{ $item->address }}</td>
                   
                    <td>
                      <a href="{{ route('edit-kd', ['id'=>$item->id]) }}" onclick='document.getElementById("{{$key+1}}").innerHTML = "Xác nhận thành công"' class="btn btn-success">
                        Xác nhận</a> 
                    <button type="reset" class="btn btn-default ml-2"><i class="fas fa-times"></i> Hủy</button>
                      <p id="{{$key+1}}"></p>
                    </td>
                  </tr>
                  @endforeach
                  @else
                  <tr>
                    <td colspan="8">Chưa có thông tin</td>
                  </tr>
                  @endif

                </tbody>
              </table>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->

          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
</body>

@endsection


