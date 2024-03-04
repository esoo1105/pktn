@extends('nurse.layout.index')
@section('content')

<body class="hold-transition sidebar-mini">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper mt-4">

    <!-- Main content -->
    <section class="content">
      <div class="row">
    
        <div class="col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Lập danh sách khám bệnh</h3>

              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <form action="" method="get" class="ml-4 mt-2 mb-2">

                  <div class="card-tools col-md-12">
                    
                      <div class="row">
                       
                        <div class="col-2 input-group input-group-sm">
                          <select class="form-control" name="status">
                            <option value="0">Tất cả dịch vụ</option>
                            <option value="Dichvu" {{ request()->status=='Dichvu'? 'selected':false }}>Dịch vụ</option>
                            <option value="BHiem" {{ request()->status=='BHiem'? 'selected':false }}>Bảo hiểm y tế</option>
                          </select>
                        </div>

                <div class="col-2 input-group input-group-sm">
                      <input type="date" name="thang" class="form-control"  value="{{ request()->thang }}">
                    </div>
                        <div class="col-2 input-group input-group-sm">
                          <select class="form-control" name="gioitinh">
                            <option value="0">Giới tính </option>
                            <option value="Nam" {{ request()->gioitinh=='Nam'? 'selected':false }}>Nam</option>
                            <option value="Nu" {{ request()->gioitinh=='Nu'? 'selected':false }}>Nữ</option>
                          </select>
                        </div>
                        <div class="col-2 input-group input-group-sm">
                          <input type="search" name="keywords" class="form-control" placeholder="Search . . . " value="{{  request()->keywords  }}">
                        
                        <div class="input-group-append ">
                            <button style="submit" class="btn btn-primary btn-block"><i class="fas fa-search"></i></button>
                        </div>
                      </div>


                      <div class="col-2 input-group input-group-sm">
                        <a href="{{ route('danhsach/add') }}" class="btn btn-success">Thêm</a>
                      </div>
                      </div>
                      
                    
                    </div>
                    
                  </form>
                  
                  <!-- /.btn-group -->
                </div>
              </div>

              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <thead>
                    <tr>
                      <th scope="col">check</th>
                      <th scope="col">Mã</th>
                      <th scope="col">Họ tên</th>
                      <th scope="col">Email</th>
                      <th scope="col">Giới tính</th>
                      <th scope="col">Số điện thoại</th>
                      <th scope="col">Địa chỉ</th>
                      {{-- <th scope="col">Bảo hiểm y tế</th> --}}
                      <th scope="col">Ngày hẹn</th>
                      <th scope="col">Dịch vụ khám</th>
                      <th></th>
                      {{-- <th colspan="3" scope="col">Test chức năng</th> --}}

                    </tr>
                  </thead>

                  <tbody>
                    @if (!empty ($userList))
                    @foreach ($userList as $key => $item)
                    
                    <tr>
                      <td>
                        <div class="icheck-primary">
                          <input type="checkbox" value="" id="check11">
                          <label for="check11"></label>
                        </div>
                      </td>
                      <th scope="row">{{$item->id}}</th>
                      <td>{{ $item->name }}</td>
                      <td>{{ $item->email }}</td>
                      <td>{!! $item->gender==1? '<p>Nam</p>':'<p>Nữ</p>'!!}</td>
                      <td>{{ $item->phone }}</td>
                      <td style="width:20%">{{ $item->address }}</td>
                      <td>{{ $item->created_at }}</td>  
                      <td>{!! $item->examination_service==0? '<button class="btn btn-success 
                        btn-sm">Dịch vụ</button>':'<button class="btn btn-info 
                        btn-sm">Bảo hiểm y tế</button>'!!}</td>
                      <td>
                        <a href="{{ route('danhsach/edit-ds', ['id'=>$item->id]) }}" type="button" class="btn btn-primary btn-sm">
                          Cập nhật</a> 
                      </td>
                    </tr>
                    
                    @endforeach
                    @else
                    <tr>
                      <td colspan="5">Chưa có thông tin</td>
                    </tr>
                    @endif
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.card-body -->

          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


</body>

@endsection
