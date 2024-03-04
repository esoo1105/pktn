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
                <h3 class="card-title">Thêm thông tin bệnh nhân</h3>
              </div>
              <!-- /.card-header -->



              <form method="POST">
              <div class="card-header">
                <h3 class="card-title">Thông tin bệnh nhân</h3>
              </div>

              <div class="p-0 mt-3 col-sm-12">
                <div class="card card-warning">
   
                  <div class="card-body">
                      <div class="row">
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Họ và tên <span style="color: red">*</span></label>
                            <input type="text" name="hoten" class="form-control" placeholder="Họ và tên . . . " value="{{ old('hoten') }}">
                            @error('hoten')
                            <span style="color: red">{{ $message }}</span>
                          @enderror
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Email </label>
                            <input type="text"name="email" class="form-control" placeholder="Email . . . " value="{{ old('email')}}">
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Số điện thoại <span style="color: red">*</span></label>
                            <input type="text" name="sdt" class="form-control" placeholder="Số điện thoại . . ." value="{{ old('sdt')}}">
                            @error('sdt')
                            <span style="color: red">{{ $message }}</span>
                          @enderror
                          </div>
                        </div>

                      </div>

                      <div class="row">
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Căn cước công dân</label>
                            <input type="text"name="cccd" class="form-control" placeholder="Căn cước công dân . . . " value="{{ old('cccd')}}">
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Giới tính <span style="color: red">*</span></label>
                            <div class="form-check ml-5">
                              <input class="form-check-input" name="gioitinh" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="1">
                              <label class="form-check-label" for="flexRadioDefault1">
                                Nam
                              </label>
                              <input class="form-check-input ml-4" name="gioitinh" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="0">
                              <label class="form-check-label ml-5" for="flexRadioDefault2">
                                Nữ
                              </label>
                            </div>
                          </div>
                          @error('gioitinh')
                          <span style="color: red">{{ $message }}</span>
                        @enderror
                        </div>

                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Password </label>
                            <input type="password" name="pass" class="form-control" placeholder="Password . . ." value="{{ old('pass')}}">
                          </div>
                        </div>


                      </div>
                      <div class="row">
                        <div class="col-sm-4 ">
                          <div class="form-group">
                            <label>Dịch vụ khám <span style="color: red">*</span></label>

                            <div class="form-check ml-5">
                              <input class="form-check-input" name="Dichvu" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="0">
                              <label class="form-check-label" for="flexRadioDefault1">
                                Dịch vụ
                              </label>

                              <input class="form-check-input ml-4" name="Dichvu" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="1">
                              <label class="form-check-label ml-5" for="flexRadioDefault2">
                                Bảo hiểm y tế
                              </label>
                            </div>
                            
                          </div>
                          @error('Dichvu')
                          <span style="color: red">{{ $message }}</span>
                        @enderror
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-sm-8">
                          <div class="form-group">
                            <label>Địa chỉ</label>
                            <input type="text" name="diachi" class="form-control" placeholder="Địa chỉ ..." value="{{ old('diachi')}}">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-sm-8">
                          <div class="form-group">
                            <label>Ngày khám <span style="color: red">*</span></label>
                            <input type="datetime-local" name="ngay" class="form-control" value="{{ old('ngay')}}">
                            @error('ngay')
                            <span style="color: red">{{ $message }}</span>
                          @enderror
                          </div>
                        </div>
                      </div>

                      <div class="ml-2">
                        
                          <label for="">Ghi chú:</label>
                          <h6 style="color: red">- Dấu <b>( * )</b> là điều kiện bắt buộc phải nhập.</h6>
                          <h6 style="color: red">- Có thể thêm vào giá trị <b>( 0 hoăc Không )</b> vào ô <b>Email</b> và <b>Nghề nghiệp</b> nếu không có thông tin</h6>
                          <h6 style="color: red">- Có thể thêm vào giá trị <b>( 0 hoăc Không )</b> vào ô <b>Tài khoản</b> và <b>Mật khẩu</b> nếu bệnh nhân không muốn tạo tài khoản</h6>
                          <h6 style="color: red">- Sau này bệnh nhân có nhu cầu lập tài khoản hoặc chỉnh sửa thông tin thì chỉ cần dựa vào thông tin của bệnh nhân đó để cập nhật lại </h6>
                      
                        </div>

                      <button class="btn btn-primary ml-5  mt-3">Thêm mới</button>
                      <a href="{{ route('function/danhsach/lapdskhambenh') }}" class="btn btn-warning ml-2  mt-3">Quay lại</a>
                  </div>
                    
                </div>
                      
                    
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->

                
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