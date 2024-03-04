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
              <li class="breadcrumb-item"><a href="{{route('hoadon/laphoadon')}}">Quay lại</a></li>
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
                    <i class="fas fa-globe"></i> Hóa Đơn
                    <small class="float-right">Date: 2/10/2014</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-8 invoice-col">
                  <table class="table table-sm mt-4">
                    <thead>
                      <tr>
                        <th scope="col">Họ tên:</th>
                        <th scope="col"></th>
                        <th scope="col">Tuổi: </th>
                        <td scope="col">  45</td>
                        <th scope="col"></th>
                        <th scope="col">Giới tính:</th>
                        <td>Nam / nữ</td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="col">Dịch vụ khám:</th>
                        <td colspan="6">Mark</td>
                      </tr>
                      <tr>
                        <th scope="col">Địa chỉ:</th>
                        <td colspan="6">Jacob</td>
                      </tr>
                      <tr>
                        <th scope="col">Chuẩn đoán</th>
                        <td colspan="6">Larry</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
 
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row mt-1">
                <div class="col-12 table-responsive">

                  <table class="table table-striped mt-4">
                    <thead>
                      <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên thuốc/ hàm lượng</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Đơn vị</th>
                      </tr>
                      <tr>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-9">
                  
                </div>
                <!-- /.col -->
                <div class="col-3 mt-5">
                  <p class="lead ml-5">Ngày . . . tháng . . . Năm</p>

                  <div class="table-responsive">
                    <table>
                      <tr>
                        <th  style="text-align: center;">Bác sĩ điều trị</th>   
                      </tr>
                      
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12 mt-5">
                  <a href="#" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                </div>
              </div>
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
