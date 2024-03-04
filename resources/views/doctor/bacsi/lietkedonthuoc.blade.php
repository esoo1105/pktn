@extends('doctor.layout.index')
@section('content')

<body class="hold-transition sidebar-mini">
    <div class="content-wrapper">
<!-- Horizontal Form -->
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">Liệt kê đơn thuốc</h3>
    </div>
    <!-- /.card-header -->
    <form class="form-horizontal" method="POST">
    <table class="table">
        <tr>
            <th>Tên bệnh nhân</th>
            <th>Tên bác sĩ</th>
            <th>Tên thuốc</th>
            <th>Số lượng thuốc</th>
            <th>Liều lượng thuốc</th>
            <th>Thời gian khám</th>
            <th>Thời gian tái khám</th>
        </tr>
        @foreach ($kedonthuoc as $donthuoc)
        <tr>
            <td>{{ $donthuoc->id_patient }}</td>
            <td>{{ $donthuoc->id_doctor }}</td>
            <td>{{ $donthuoc->id_medicine }}</td>
            <td>{{ $donthuoc->soluongthuoc }}</td>
            <td>{{ $donthuoc->lieuluong }}</td>
            {{-- <td>{{ $donthuoc->tg_kham }}</td> --}}
            <td>{{ $donthuoc->lichhen }}</td>
        </tr>
        @endforeach
    </table>
@csrf
</form>
    
</div>
  </div>


</body>

@endsection