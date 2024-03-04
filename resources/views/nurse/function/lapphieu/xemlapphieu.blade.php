@extends('nurse.layout.index')
@section('content')
<body class="hold-transition sidebar-mini">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

          <div class="col-sm-1">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('lapphieu/edit-pk', ['id'=>$userDetail->id]) }}"><< Quay lại</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> Phiếu khám bệnh
                    <small class="float-right">Ngày lập: 2/10/2014

                      {{-- <img width="100" height="100" src="{{asset('img/qr-phongkham.png')}}"> --}}
                    </small>
                      
                    
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <form method="POST">
              <div class="row invoice-info">
                <div class="col-sm-10 invoice-col">
                  <div class="card-header">
                      <h3 class="card-title">Thông tin bệnh nhân</h3>
                  
                  <table class="table table-sm ">
                  <thead>
                    <tr>
                      <th scope="col">Họ tên:</th>
                      <td colspan="4" scope="col">{{ $userDetail->name }}</td>
                      <th scope="col">Email (nếu có): </th>
                      <td colspan="4" scope="col">{{ $userDetail->email }}</td>
                      <th scope="col">Giới tính: </th>
                      <td colspan="4" scope="col">{{ $userDetail->gender==1? 'Nam':'Nữ' }}</td>
                      </tr>
                     
                  </thead>
                  <tbody>
                    <tr>
                      <th colspan="4" scope="col">Số điện thoại: </th><td>{{ $userDetail->phone }}</td>
                      <th colspan="4" scope="col">Email (nếu có): </th><td>{{ $userDetail->email }}</td>
                      </tr>
                      <tr>
                        <th scope="col">Địa chỉ: </th>
                        <td colspan="6" >{{ $userDetail->address }}</td>
                        </tr>
                      <tr>
                      <th scope="col">Triệu chứng: </th>
                      <td colspan="6" > . . . </td>
                      </tr>
                  </tbody>
                  </table>
              </div>
              </div>
 
                <!-- /.col -->
              </div>

              <!-- /.row -->

              <!-- Table row -->
              <div class="row mt-1">
                <div class="col-10 table-responsive">
                  <div class="card-header">
                  <h3 class="card-title">Thông số sức khỏe</h3>
                  
                  <table class="table table-borderless">

                      <tbody>
                      <tr>
                          <td>Huyết áp</td>
                          <td>Nhịp tim</td>
                          </tr>
                          <tr>
                          <td>Cân nặng</td>
                          <td>Chiều Cao</td>
                          <td>Nhiệt độ</td>
                          </tr>
                      </tbody>
                  </table>

          </div>

          <div class="ml-4">
            <label for="">Lưu ý:</label>
            <h6>- Phiếu khám bệnh chỉ in duy nhất một bảng cho một lần khám.</h6>   
        
          </div>
          <!-- /.col -->
          </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12 mt-5 float-right" >
                  <a href="{{ route('lapphieu/edit-inpk', ['id'=>$userDetail->id]) }}" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                </div>

              </div>

              @csrf
            </form>

            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</body>

@endsection
