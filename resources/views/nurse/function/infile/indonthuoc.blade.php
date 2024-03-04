
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
          <i class="fas fa-globe"></i> Đơn thuốc
          <small class="float-right">Ngày lập: 2/10/2014</small>
        </h2>
      </div>
    </div>
    <!-- info row -->

    <form method="POST">
    <div class="row invoice-info">
      <div class="col-sm-10 invoice-col">
        <table class="table table-sm mt-4">
          <thead>
            <thead>
              <tr>
                <th >Họ tên: <td colspan="2">{{ $userDetail->name }}</td></th>
                <th >Email (Nếu có): <td>{{ $userDetail->email }}</td>  </th>
                <th >Giới tính: <td colspan="2">{{ $userDetail->gender==1? 'Nam':'Nữ' }}</td></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th>Số điện thoại: 
                      <td colspan="2">{{ $userDetail->phone }}</td></th>
                <th>Dịch vụ khám: 
                    <td colspan="2">{{ $userDetail->examination_service==0? 'Dịch vụ':'Bảo hiểm y tế' }}</td></th>
              </tr>
              <tr>
                <th >Địa chỉ: 
                  <td colspan="6">{{ $userDetail->address }}</td></th>
              </tr>
              <tr>
                <th >Chuẩn đoán: 
                  <td colspan="6"></td></th>
              </tr>
            </tbody>
        </table>
      </div>
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
              <th scope="col">Tên thuốc/ hàm lượng</th>
              <th scope="col">Số lượng</th>
              <th scope="col">Đơn vị</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>{{ $userDetail->name }}</td>
              <td>{{ $userDetail->soluongthuoc }}</td>
              <td>{{ $userDetail->donvi }}</td>
            </tr>
            <tr>
              <td>{{ $userDetail->lieuluong }}</td>
            </tr>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-9"></div>

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
      @csrf
    </form>
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
