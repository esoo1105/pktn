@extends('nurse.layout.index')
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
                <h3 class="card-title">Xác nhận thông tin bệnh nhân</h3>
                
                <div class="card-tools">
                  <div class="input-group input-group-sm">
                    <input type="text" class="form-control" placeholder="Search Mail">
                    <div class="input-group-append">
                      <div class="btn btn-primary">
                        <i class="fas fa-search"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Mã</th>
                    <th scope="col">Họ tên</th>
                    <th scope="col">Email</th>
                    <th scope="col">Giới tính</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Thời gian hẹn</th>
                    <th scope="col">Xác nhận</th>
                  </tr>
                </thead>
                <tbody>
                  @if (!empty ($userList))
                  @foreach ($userList as $key => $item)
                  <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{!! $item->gender==1? '<p>Nam</p>':'<p>Nữ</p>'!!}</td>
                    <td>{{ $item->phone }}</td>
                    <td style="width:20%">{{ $item->address }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                      <a href="#" onclick='document.getElementById("{{$item->id}}").innerHTML = "Xác nhận thành công"' class="btn btn-success">
                        Xác nhận</a> 
                        
                    <button type="reset" class="btn btn-default ml-2"><i class="fas fa-times"></i> Hủy</button>
                      <p id="{{$item->id }}"></p>
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
</div>

</body>

@endsection


