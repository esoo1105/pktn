@extends('nurse.layout.index')
@section('content')

@if(session('msg'))
<div class="alert alert-success">{{ session('msg') }}</div>
@endif

<body class="hold-transition sidebar-mini">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper mt-4">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
      
      <div class="col-md-12">
        <a href="#" class="btn btn-primary btn-block mb-3 ">Thông tin</a>
      
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Bệnh nhân</h3>
            
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>

            <form action="" method="get" class="mt-2 ml-5 mb-2">
              <div class="card-tools ">
                
                  <div class="row">
                  
                    <div class="col-2 input-group input-group-sm">
                      <select class="form-control" name="status">
                        <option value="0">Tất cả dịch vụ</option>
                        <option value="Dichvu" {{ request()->status=='Dichvu'? 'selected':false }}>Dịch vụ</option>
                        <option value="BHiem" {{ request()->status=='BHiem'? 'selected':false }}>Bảo hiểm y tế</option>
                      </select>
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
                  </div>

                
                </div>
              </form>
          
          <div class="card-body p-0">
            <ul class="nav nav-pills flex-column">
      
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Mã</th>
                        <th scope="col">Họ Tên</th>
                        <th scope="col">Email</th>
                        <th scope="col">Giới tính</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Ngày khám</th>
                        <th scope="col">Dịch vụ khám</th>
                        <th scope="col">Lập phiếu</th>
                        {{-- <th scope="col">Xem phiếu khám</th> --}}
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
                        <td>{!! $item->examination_service==0? '<button class="btn btn-success 
                          btn-sm">Dịch vụ</button>':'<button class="btn btn-info
                          btn-sm">Bảo hiểm y tế</button>'!!}</td>
                        <td>
                            <a href="{{ route('lapphieu/edit-pk', ['id'=>$item->id]) }}" class="btn btn-primary">
                              Chọn</a>
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
            </ul>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
         
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


</body>
@endsection