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
                  <th>Triệu chứng bệnh</th>
                  <th>Chẩn đoán</th>
                  <th>Tên thuốc</th>
                  <th>Số lượng</th>
                  <th>Ngày khám</th>
                  <th>Ngày hẹn tái khám</th>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Nguyễn Văn A</td>
                  <td>BS Nguyễn B</td>
                  <td>Sốt, đau họng</td>
                  <td>Cảm cúm</td>
                  <td>Paracetamol</td>
                  <td>2</td>
                  <td>2023-06-02</td>
                  <td>2023-06-09</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Trần Thị B</td>
                  <td>BS Lê C</td>
                  <td>Mệt mỏi, khó thở</td>
                  <td>Bệnh phổi tắc nghẽn mãn tính</td>
                  <td>Salbutamol</td>
                  <td>1</td>
                  <td>2023-06-03</td>
                  <td>2023-06-10</td>
                </tr>
                <!-- Thêm các hàng khác tương tự ở đây -->
              </table>

            </div>
        </div>
    </section>
  </div>
</body>

@endsection
