@extends('doctor.layout.index')
@section('content')

<body class="hold-transition sidebar-mini">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper mt-4">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thông tin bác sĩ</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             
              @foreach ($user as $key => $item)
              <form>
          
                <div class="card-body">
                  <div class="form-group row">
                    <label for="#" class="col-sm-2 col-form-label">Họ tên</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputPassword" value="{{ $item->TEN_BS }}">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="#" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputPassword" value="{{ $item->EMAIL_BS }}">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="#" class="col-sm-2 col-form-label">Số điện thoại</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputPassword" value="{{ $item->SDT_BS }}">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="#" class="col-sm-2 col-form-label">CCCD</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputPassword" value="{{ $item->CCCD_BS }}">
                    </div>
                  </div>

              

                  
                <!-- /.card-body -->
{{-- 
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Cập nhật</button>
                </div> --}}
              </form>
              @endforeach
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->

        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

</body>
@endsection



