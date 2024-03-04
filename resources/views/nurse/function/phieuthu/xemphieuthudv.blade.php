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
              <li class="breadcrumb-item"><a href="{{ route('function/phieuthu/phieuthu') }}"><< Quay lại</a></li>
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
                    <i class="fas fa-globe"></i> Phiếu thu dịch vụ
                    <small class="float-right">Ngày lập: 2/10/2014</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <form method="POST">
              <div class="row invoice-info">
                <div class="col-sm-10 invoice-col">
                  <table class="table table-sm mt-4">
                    <thead>
                      <tr>
                        <th colspan="4">Họ và Tên : 
                          <input type="text" class="form-control" value="{{ $userDetail->name }}"></th>
                        <th colspan="4"> Email (Nếu có): 
                            <input type="text" class="form-control" value="{{ $userDetail->email }}"></th>
                        <th colspan="4">Giới tính : 
                            <input type="text" class="form-control" value="{{ $userDetail->gender==1? 'Nam':'Nữ' }}"></th>
                       
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th colspan="4">Số điện thoại : 
                              <input type="text" class="form-control" value="{{ $userDetail->phone }}"></th>
                        <th colspan="4"> Căn cước công dân: 
                            <input type="text" class="form-control" value="{{ $userDetail->cccd }}"></th>
                    <th colspan="4">Dịch vụ khám: 
                          <input type="text" class="form-control" value="{{ $userDetail->examination_service==0? 'Dịch vụ':'Bảo hiểm y tế' }}"></th>
                      </tr>
                      <tr>
                        <th colspan="6"> Địa chỉ : 
                          <input type="text" class="form-control" value="{{ $userDetail->address  }}"></th>
                      </tr>
                      <tr>
                        <th colspan="6"> Chuẩn đoán : 
                          <input type="text" class="form-control" ></th>
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
                            <th scope="col">Tên thuốc</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Đơn giá</th>
                            <th scope="col">Thành tiền</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>{{ $userDetail->name}}</td>
                            <td>{{ $userDetail->soluongthuoc}}</td>
                            <td>{{ $userDetail->dongia}}</td>
                            <td>{{ $userDetail->dongia * $userDetail->soluongthuoc}}</td>
                          </tr>
                            <td colspan="5">Tổng tiền</td>
                          </tr>
                        </tbody>
                      </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-8">
                    <p>Phiếu có giá trị xuất hóa đơn trong ngày, kiểm tra tên thuốc, số lượng thuốc trước khi rời quầy</p>
                    <p>(Mọi thắc mắc về sau Nhà thuốc không chịu trách nhiệm)</p>
                </div>
                <!-- /.col -->
                <div class="col-4 mt-5">
                  <p class="lead">Ngày . . . tháng . . . Năm</p>

                  <div class="table-responsive">
                    <table>
                      <tr>
                        <th  style="text-align: center;">Người thu tiền</th>   
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
                  <a href="{{ route('edit-indv', ['id'=>$userDetail->id]) }}" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <button type="button" class="btn btn-primary float-right"><i class="far fa-credit-card"></i> Save
                  </button>
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
