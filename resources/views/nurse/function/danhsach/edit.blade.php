@extends('nurse.layout.index')
@section('content')

@if(session('msg'))
    <div class="alert alert-success">{{ session('msg') }}</div>
@endif



<body class="hold-transition sidebar-mini">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper mt-4">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">


          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Cập nhật thông tin bệnh nhân</h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm">
                    <h3 class="card-title mt-1 mr-2">Mã bệnh nhân</h3>
                    <input type="text" name="MaBN" class="form-control" value="{{ $userDetail->id }}">
                  </div>
                </div>
              </div>
              </div>
              <!-- /.card-header -->



              <form method="POST">
              <div class="card-header">
                <h3 class="card-title">Thông tin bệnh nhân</h3>
                
              </div>
              <div class="p-0 mt-3">
                <div class="card card-warning">
   
                  <div class="card-body">
                      <div class="row">
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Họ và tên</label>
                            <input type="text" name="hoten" class="form-control" value="{{ old('hoten') ?? $userDetail->name }}">
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" value="{{ old('email') ?? $userDetail->email }}">
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Số điện thoại</label>
                            <input type="text" class="form-control" value="{{ old('phone') ?? $userDetail->phone }}">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Căn cước công dân</label>
                            <input type="text" class="form-control" value="{{ old('cccd') ?? $userDetail->cccd }}">
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Giới tính</label>
                            <div class="form-check ml-5">
                              <input class="form-check-input" name="gioitinh" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="1">
                              <label class="form-check-label" for="flexRadioDefault1">
                                Nam
                              </label>
                            {{-- </div>
                            <div class="form-check"> --}}
                              <input class="form-check-input ml-4" name="gioitinh" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="0">
                              <label class="form-check-label ml-5" for="flexRadioDefault2">
                                Nữ
                              </label>
                            </div>
                            {{-- <label>Giới tính</label>
                            <input type="text" name="gioitinh" class="form-control" placeholder="Giới tính . . . " value="{{ old('GIOITINH_BN')}}"> --}}
                          </div>
                        </div>
                      
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Dịch vụ khám</label>
                            <div class="form-check ml-5">
                              <input class="form-check-input" name="Dichvu" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="0" >
                              <label class="form-check-label" for="flexRadioDefault1">
                                Dịch vụ
                              </label>
                            {{-- </div>
                            <div class="form-check"> --}}
                              <input class="form-check-input ml-4" name="Dichvu" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="1">
                              <label class="form-check-label ml-5" for="flexRadioDefault2">
                                Bảo hiểm y tế
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-8">
                          <div class="form-group">
                            <label>Địa chỉ</label>
                            <input type="text" class="form-control" placeholder="Enter ..." value="{{ old('address') ?? $userDetail->address }}">
                          </div>
                        </div>
                       
                      </div>

                      <div class="row">
                        <div class="col-sm-8">
                          <div class="form-group">
                            <label>Ngày cập nhật</label>
                            <input type="date" name="ngay" class="form-control" placeholder="Enter ..." value="{{ old('ngay')}}">
                          </div>
                        </div>
                      </div>
                      <button class="btn btn-primary ml-5">Cập nhật</button>
                      <a href="{{ route('function/danhsach/lapdskhambenh') }}" class="btn btn-warning ml-2">Quay lại</a>
                  </div>
                  <!-- /.card-body -->
                  
                </div>
                <!-- /.card -->
                <!-- general form elements disabled -->

                
              <!-- /.card-body -->
              @csrf
            </form>
            <!-- /.card -->

           
            </div>
            <!-- /.card -->
          </div>
         
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


</body>
@endsection