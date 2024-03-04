@extends('layout.index')
@section('content')

<script>

  function themThuoc() {
    // Lấy giá trị từ các trường nhập liệu
    var tenThuoc = document.getElementById("tenThuoc").value;
    var donVi = document.getElementById("donVi").value;
    var soLuong = document.getElementById("soLuong").value;
    var giaBan = document.getElementById("giaBan").value;
    var cachDung = document.getElementById("cachDung").value;

    // Tính thành tiền
    var thanhTien = soLuong * giaBan;

    // Tạo một hàng mới trong bảng hàng chờ
    var table = document.getElementById("bangHangCho");
    var row = table.insertRow(-1);

    // Thêm dữ liệu vào các ô trong hàng
    var cellTenThuoc = row.insertCell(0);
    cellTenThuoc.innerHTML = tenThuoc;

    var cellDonVi = row.insertCell(1);
    cellDonVi.innerHTML = donVi;

    var cellSoLuong = row.insertCell(2);
    cellSoLuong.innerHTML = soLuong;

    var cellGiaBan = row.insertCell(3);
    cellGiaBan.innerHTML = giaBan;

    var cellCachDung = row.insertCell(4);
    cellCachDung.innerHTML = cachDung;

    var cellThanhTien = row.insertCell(5);
    cellThanhTien.innerHTML = thanhTien;

    var cellHanhDong = row.insertCell(6);
    cellHanhDong.innerHTML = '<button class="btn btn-danger" onclick="xoaHang(this)">Xoá</button> <button class="btn btn-warning" onclick="suaHang(this)">Sửa</button>';
  }

  function xoaHang(button) {
    var row = button.parentNode.parentNode;
    row.parentNode.removeChild(row);
  }

  function suaHang(button) {
    var row = button.parentNode.parentNode;
    var cells = row.getElementsByTagName("td");

    var tenThuoc = cells[0].innerHTML;
    var donVi = cells[1].innerHTML;
    var soLuong = cells[2].innerHTML;
    var giaBan = cells[3].innerHTML;
    var cachDung = cells[4].innerHTML;

    // Điền dữ liệu vào form sửa
    document.getElementById("tenThuoc").value = tenThuoc;
    document.getElementById("donVi").value = donVi;
    document.getElementById("soLuong").value = soLuong;
    document.getElementById("giaBan").value = giaBan;
    document.getElementById("cachDung").value = cachDung;

    // Xoá hàng trong bảng hàng chờ
    row.parentNode.removeChild(row);
  }


  document.addEventListener('DOMContentLoaded', function() {
    // Lấy thời gian hiện tại và gán cho trường "ngaykham"
    var now = new Date();
    var ngaykhamInput = document.getElementById('ngaykham');
    ngaykhamInput.value = now.toISOString().slice(0, 16);

    // Lấy thời gian 1 tuần sau và gán cho trường "taikham"
    var taikhamInput = document.getElementById('taikham');
    var nextWeek = new Date(now.getTime() + 7 * 24 * 60 * 60 * 1000);
    taikhamInput.value = nextWeek.toISOString().slice(0, 16);
  });




</script>


<body class="hold-transition sidebar-mini">
    <div class="content-wrapper">
<!-- Horizontal Form -->
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">Kê đơn thuốc</h3>
    </div>
    <!-- /.card-header -->



    <!-- form start -->
    <form class="form-horizontal" method="POST">
      <div class="card-body">
        @foreach ($kedonthuoc as $item)
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Tên bệnh nhân:</label>
          <div class="col-sm-3">
            <input type="text" class="form-control" id="inputEmail3"
             name="tenbenhnhan" placeholder="Tự động" value="{{ $item->TEN_BN }}">
          </div>
        </div>

        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Tên bác sĩ:</label>
          <div class="col-sm-3">
            <input type="text" class="form-control"
            name="tenbacsi" placeholder="Tự động" value="{{ $item->TEN_BS }}">
          </div>
        </div>
@endforeach

      <div class="form-group row">
          <label for="lngaykham" class="col-sm-2 col-form-label ">Thời gian khám:</label>
          <div class="col-sm-3">
            <input type="datetime-local" class="form-control" name="tg_kham" id="ngaykham">
    
          </div>
        </div>


        <div class="form-group row">
            <label for="ltaikham" class="col-sm-2 col-form-label">Hẹn tái khám:</label>
            <div class="col-sm-3">
                <input type="datetime-local" class="form-control" name="tg-taikham" id="taikham">
            </div>
          </div>

      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" class="btn btn-info">Lập phiếu</button>
        {{-- <button type="submit" class="btn btn-default float-right">Cancel</button> --}}
      </div>
      <!-- /.card-footer -->
    @csrf
    </form>


  </br><h4>Thêm thuốc</h4>
  <form >
    <div class="card-body">
      <div class="row">
        <div class="col-sm-6">
          <!-- text input -->
    <label for="tenThuoc">Tên thuốc:</label>
    <select class="form-control" id="tenThuoc" name="tenThuoc">
      <option>Thuốc 1</option>
      <option>Thuốc 2</option>
      <option>Thuốc 3</option>
      <option>Thuốc 4</option>
      <option>Thuốc 5</option>
    </select>
    <label for="donVi" class="mt-3">Đơn vị:</label>
    <select class="form-control" id="donVi" name="donVi">
      <option>Viên</option>
      <option>Type</option>
      <option>Chai</option>
    </select>
  </div>
</div>
    <div class="row">
      <div class="col-sm-6">
    <label for="soLuong">Số lượng:</label>
    <input type="number" class="form-control" id="soLuong" name="soLuong" value="1">

    <label for="giaBan">Giá bán:</label>
    <input type="number" class="form-control" id="giaBan" name="giaBan" value="1000">

    <label for="cachDung">Cách dùng:</label>
    <textarea id="cachDung" class="form-control" name="cachDung">Sáng 1, Chiều 1</textarea>

    <input type="button" class="btn btn-primary mt-3" value="Thêm thuốc" onclick="themThuoc()">
    </div>
  </div>

  </div>
  </form>

</br><h3 class="card-header">Bảng danh mục thuốc cần kê đơn</h3>
  <table id="bangHangCho" class="table table-bordered">
    <thead>
      <tr>
        <th>Tên thuốc</th>
        <th>Đơn vị</th>
        <th>Số lượng</th>
        <th>Giá bán</th>
        <th>Cách dùng</th>
        <th>Thành tiền</th>
        <th>Hành động</th>
      </tr>
    </thead>
    <tbody>
      <!-- Dữ liệu hàng chờ của các thuốc cần kê đơn sẽ được thêm vào đây -->
    </tbody>
  </table>

    
  </div>
    </div>
  

</body>

@endsection

