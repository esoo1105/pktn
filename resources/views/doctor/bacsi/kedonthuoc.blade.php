@extends('doctor.layout.index')
@section('content')
  <script>

    var soThuTu = 1;
    var tongTien = 0;

    function capNhatDuLieuBieuMau() {
      var tableDataInput = document.getElementById("tableData");
      var table = document.getElementById("bangHangCho");
      var rows = table.getElementsByTagName("tr");

      var data = [];

      for (var i = 0; i < rows.length; i++) {
        var cells = rows[i].getElementsByTagName("td");
        var row = {
          tenThuoc: cells[1].innerHTML,
          donVi: cells[2].innerHTML,
          soLuong: cells[3].innerHTML,
          giaBan: cells[4].innerHTML,
          cachDung: cells[5].innerHTML,
          thanhTien: cells[6].innerHTML
        };
        data.push(row);
      }

      tableDataInput.value = JSON.stringify(data);
    }


    function capNhatSTT() {
      var bangHangCho = document.getElementById("bangHangCho");
      var rows = bangHangCho.getElementsByTagName("tr");
      for (var i = 0; i < rows.length; i++) {
        var cells = rows[i].getElementsByTagName("td");
        cells[0].innerHTML = i + 1; // Cập nhật số thứ tự
      }

      tongTien = 0; // Đặt lại giá trị tổng tiền thành 0
      for (var i = 0; i < rows.length; i++) {
        var cells = rows[i].getElementsByTagName("td");
        var thanhTien = parseInt(cells[6].innerHTML); // Lấy giá trị thành tiền từ cột "Thành tiền"
        tongTien += thanhTien; // Cộng dồn vào tổng tiền
      }
      // Cập nhật tổng tiền
      document.getElementById("tongTien").innerHTML = tongTien;


    }


    function themThuoc() {
      // Lấy giá trị từ các trường nhập liệu
      var tenThuoc = document.getElementById("tenThuoc").value;
      var donVi = document.getElementById("donVi").value;
      var soLuong = document.getElementById("soLuong").value;
      var giaBan = document.getElementById("giaBan").value;
      var cachDung = document.getElementById("cachDung").value;

      // Tính thành tiền
      var thanhTien = soLuong * giaBan;
      tongTien += thanhTien;

      // Tạo một hàng mới trong bảng hàng chờ
      var table = document.getElementById("bangHangCho");
      var row = table.insertRow(-1);

      // Thêm dữ liệu vào các ô trong hàng
      var cellSoThuTu = row.insertCell(0);
      cellSoThuTu.innerHTML = soThuTu++;
      

      var cellTenThuoc = row.insertCell(1);
      cellTenThuoc.innerHTML = tenThuoc;

      var cellDonVi = row.insertCell(2);
      cellDonVi.innerHTML = donVi;

      var cellSoLuong = row.insertCell(3);
      cellSoLuong.innerHTML = soLuong;

      var cellGiaBan = row.insertCell(4);
      cellGiaBan.innerHTML = giaBan;

      var cellCachDung = row.insertCell(5);
      cellCachDung.innerHTML = cachDung;

      var cellThanhTien = row.insertCell(6);
      cellThanhTien.innerHTML = thanhTien;

      var cellHanhDong = row.insertCell(7);
      cellHanhDong.innerHTML = '<button class="btn btn-danger" onclick="xoaHang(this)">Xoá</button> <button class="btn btn-warning" onclick="suaHang(this)">Sửa</button>';
    
      

      capNhatSTT();
      capNhatDuLieuBieuMau()
    }

    

    function xoaHang(button) {
      var row = button.parentNode.parentNode;
      row.parentNode.removeChild(row);
      capNhatSTT();
    }

    function suaHang(button) {
      var row = button.parentNode.parentNode;
      var cells = row.getElementsByTagName("td");

      var soThuTu = cells[0].innerHTML; // Lấy số thứ tự từ cột đánh số

      var tenThuoc = cells[1].innerHTML;
      var donVi = cells[2].innerHTML;
      var soLuong = cells[3].innerHTML;
      var giaBan = cells[4].innerHTML;
      var cachDung = cells[5].innerHTML;

      // Điền dữ liệu vào form sửa
      document.getElementById("tenThuoc").value = tenThuoc;
      document.getElementById("donVi").value = donVi;
      document.getElementById("soLuong").value = soLuong;
      document.getElementById("giaBan").value = giaBan;
      document.getElementById("cachDung").value = cachDung;

      // Xoá hàng trong bảng hàng chờ
      row.parentNode.removeChild(row);
      capNhatSTT();
    }
    

    document.addEventListener('DOMContentLoaded', function() {
      var now = new Date();
      var ngaykhamInput = document.getElementById('ngaykham');
      ngaykhamInput.value = now.toISOString().slice(0, 16);

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
          <div class="card-tools">
            <div class="input-group input-group-sm">
              <h3 class="card-title mt-1 mr-2">Mã bệnh nhân</h3>
              <input type="text" name="MaBN" class="form-control" value="{{ $userDetail->id }}">
            </div>
          </div>
        </div>

        <br>
        <h4>Thêm thuốc</h4>

        <form action="{{ route('bacsi/kedonthuoc') }}" method="POST">
          @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-sm-6">
                
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
                <input type="number" class="form-control" id="soLuong" name="soLuong" value="5">

                <label for="giaBan">Giá bán:</label>
                <input type="number" class="form-control" id="giaBan" name="giaBan" value="1234">

                <label for="cachDung">Cách dùng:</label>
                <textarea class="form-control" id="cachDung" name="cachDung">Sáng 1, Chiều 1</textarea>
              </div>
            </div>

            <div class="row mt-3">
              <div class="col-sm-6">
                <button type="button" class="btn btn-primary" onclick="themThuoc()">Thêm</button>
              </div>
            </div>

            
            <div class="row mt-3">
              <div class="col-sm-12">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th colspan="2">Bác sĩ: <input class="form-control" name="tenbs" id="tenbs" value="{{ $userDetailBS->name }}"></th>
                      <th colspan="2">Bệnh nhân: <input class="form-control" name="tenbn" id="tenbn" value="{{ $userDetail->name }}"></th>
                      <th colspan="2">Thời gian khám:<input type="datetime-local" class="form-control" name="tg_kham" id="ngaykham"></th>
                      <th colspan="2">Hẹn tái khám:<input type="datetime-local" class="form-control" name="tg_taikham" id="taikham"></th>
                    </tr>
                    <tr>
                      <th>STT</th>
                      <th>Tên thuốc</th>
                      <th>Đơn vị</th>
                      <th>Số lượng</th>
                      <th>Giá bán</th>
                      <th>Cách dùng</th>
                      <th>Thành tiền</th>
                      <th>Hành động</th>
                    </tr>
                    
                  </thead>
                  <tbody id="bangHangCho">

                  </tbody>
                  <input type="hidden" id="tableData" name="table_data" value="">
                  <tfoot>
                    <tr>
                      <td colspan="6" align="right"><strong>Tổng tiền thuốc:</strong></td>
                      <td id="tongTien" colspan="2"></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Lưu đơn thuốc</button>
        </form>
      </div>
    </div>
  </body>
@endsection
