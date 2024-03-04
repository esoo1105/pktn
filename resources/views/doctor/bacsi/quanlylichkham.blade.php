@extends('doctor.layout.index')
@section('content')

<style>
    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #f2f2f2;
    }

    .status-select {
      width: 100%;
      padding: 5px;
    }
  </style>

<body class="hold-transition sidebar-mini">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper mt-4">
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">

            <table>
                <tr>
                  <th>STT</th>
                  <th>Tên bệnh nhân</th>
                  <th>Bác sĩ khám</th>
                  <th>Thời gian khám dự kiến</th>
                  <th>Trạng thái</th>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Nguyễn Văn A</td>
                  <td>BS Nguyễn B</td>
                  <td>2023-06-02 09:00</td>
                  <td>
                    <select class="status-select">
                      <option value="chua-kham">Chưa khám</option>
                      <option value="kham-xong">Khám xong</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Trần Thị B</td>
                  <td>BS Lê C</td>
                  <td>2023-06-03 14:30</td>
                  <td>
                    <select class="status-select">
                      <option value="chua-kham">Chưa khám</option>
                      <option value="kham-xong">Khám xong</option>
                    </select>
                  </td>
                </tr>
                <!-- Thêm các hàng khác tương tự ở đây -->
            </table>


         </div>
        </div>
    </section>
</div>
</body>



@endsection
