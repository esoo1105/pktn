
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{$title}}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header">
          <i class="fas fa-globe"></i> Phiếu thu BHYT
          <small class="float-right mr-5">Ngày lập: 2/10/2014</small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-10 invoice-col">
        <table class="table table-sm mt-4">
            <thead>
              <tr>
                <th >Họ tên: <td>{{ $userDetail->name }}</td></th>
                <th >Email (Nếu có):  <td>{{ $userDetail->email }}</td></th>
                <th >Giới tính: <td>{{$userDetail->gender==1? 'Nam':'Nữ' }}</td></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th>Số điện thoại:
                    <td>{{ $userDetail->phone }}</td></th>
                <th>Dịch vụ khám: 
                    <td>{{ $userDetail->examination_service==0? 'Dịch vụ':'Bảo hiểm y tế' }}</td></th>
              </tr>
              <tr>
                <th >Địa chỉ: 
                  <td colspan="6">{{ $userDetail->address }}</td></th>
              </tr>
              <tr>
                <th >Chuẩn đoán: 
                  <td colspan="6"> . . . </td></th>
              </tr>
            </tbody>
        </table>
      </div>
      <!-- /.col -->
      
      
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
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
        <p class="lead ml-5">Ngày . . . tháng . . . Năm</p>

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
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<!-- Page specific script -->
<script>
  window.addEventListener("load", window.print());
</script>
</body>
</html>
