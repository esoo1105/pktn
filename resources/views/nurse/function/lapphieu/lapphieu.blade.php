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

        <form method="POST">

        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Phiếu khám bệnh</h3>

            <div class="card-tools">
              <div class="input-group input-group-sm">
                <h3 class="card-title mt-1 mr-2">Mã bệnh nhân</h3>
                <input type="text" name="MaBN" class="form-control" value="{{ $userDetail->id }}">
              </div>
            </div>
          </div>
          <!-- /.card-header -->


            <div class="ml-4 mt-4 mb-2">
              <h3 class="card-title">Thông tin bệnh nhân</h3>
            </div>

            
            <div class="card card-danger">
              <div class="card-body">
                <div class="row col-10">
                  <div class="col-4">
                    <label for="">Họ tên :</label>
                    <input type="text" class="form-control"  value="{{ $userDetail->name }}">
                  </div>
                  <div class="col-4">
                    <label for="">Email (nếu có) :</label>
                    <input type="text" class="form-control" value="{{ $userDetail->email }}">
                  </div>
                  <div class="col-4">
                    <label for="">Giới tính :</label>
                    <input type="text" class="form-control" value="{{ $userDetail->gender==1? 'Nam':'Nữ' }}">
                  </div>

                </div>

                <div class="row mt-4 col-10">
                  <div class="col-4">
                    <label for="">Số điện thoại :</label>
                    <input type="text" class="form-control" value="{{ $userDetail->phone }}">
                  </div>
                  <div class="col-4">
                    <label for="">Căn cước công dân :</label>
                    <input type="text" class="form-control" value="{{ $userDetail->cccd }}">
                  </div>
                  <div class="col-4">
                    <label for="">Dịch vụ khám :</label>
                    <input type="text" class="form-control" value="{{ $userDetail->examination_service==0? 'Dịch vụ':'Bảo hiểm y tế' }}">
                  </div>
                </div>

                <div class="row mt-4 col-10">
                  <div class="col-8">
                    <label for="">Địa chỉ :</label>
                    <input type="text" class="form-control" value="{{ $userDetail->address }}">
                  </div>
                  
                 
                </div>
              </div>
              <!-- /.card-body -->
            </div>   
            <!-- /.card-body -->

        <!-- /.card -->
          <div>
            <div class="card-header">
              <h3 class="card-title">Thông số sức khỏe</h3>
            </div>
            
              <table class="table-sm ml-4">
                <tbody>
                  <tr>
                    <td>Huyết áp : <span style="color: red">*</span>
                      <input type="text" name="huyetap" class="form-control" value="{{ old('huyetap')  }}">	
                      @error('huyetap')
                      <span style="color: red">{{ $message }}</span>
                    @enderror
                    </td>
                    <td >Nhịp tim : 
                      <input type="text" name="nhiptim" class="form-control" value="{{ old('nhiptim')  }}">
                      @error('nhiptim')
                      <span style="color: red">{{ $message }}</span>
                    @enderror
                    </td>
                    </tr>
                    <tr>
                      <td>Cân nặng : <span style="color: red">*</span>
                        <input type="text" name="cangnang" class="form-control" value="{{ old('cangnang')  }}">
                        @error('cangnang')
                        <span style="color: red">{{ $message }}</span>
                      @enderror
                      </td>
                      <td>Chiều Cao : <span style="color: red">*</span>
                        <input type="text" name="chieucao" class="form-control" value="{{ old('chieucao')  }}">
                        @error('chieucao')
                        <span style="color: red">{{ $message }}</span>
                      @enderror
                      </td>
                      <td>Nhiệt độ : 
                        <input type="text" name="nhietdo" class="form-control" value="{{ old('nhietdo')  }}">
                        
                        @error('nhietdo')
                        <span style="color: red">{{ $message }}</span>
                      @enderror
                      </td>
                    </tr>
                    
                </tbody>
              </table>
            
            <!-- /.card-body -->
          </div>

          <!-- /.card -->

            <div class="card-body">

              <div class="form-group">
                <label  for="exampleInputEmail1" >Ngày lập: <span style="color: red">*</span></label>
                <input type="datetime-local" name="ngaylap" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="{{ old('ngaylap') }}">
                @error('ngaylap')
                <span style="color: red">{{ $message }}</span>
              @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Triệu chứng: <span style="color: red">*</span></label>
                <input type="text" name="trieuchung" class="form-control" id="exampleInputEmail1" placeholder="Dấu hiệu lâm sàng . . .">
                @error('trieuchung')
                <span style="color: red">{{ $message }}</span>
              @enderror
              </div>

              <div class="ml-4">
                  <label for="">Ghi chú:</label>
                  <h6 style="color: red">- Dấu <b>( * )</b> là điều kiện bắt buộc phải nhập.</h6>   
                  <h6 style="color: red">- Có thể thêm vào giá trị <b>( 0 hoăc Không )</b> vào ô <b>nhịp tim</b> và <b>nhiệt độ</b> nếu không có thông tin</h6>
                  <h6 style="color: red">- Phiếu khám bệnh chỉ được lập và in duy nhất một bảng cho một lần khám.</h6>
              
                </div>

              <div class="card-footer">
                <div class="float-right">
                  <button class="btn btn-primary float-right ml-3"><i class="far fa-credit-card"></i> Save
                  </button>

                  <a href="{{ route('lapphieu/edit-xpk', ['id'=>$userDetail->id]) }}" type="submit" class="btn btn-primary">Lập phiếu</a>
                 
                </div>
                <a href="{{ route('function/lapphieu/lapphieukhambenh') }}" type="reset" class="btn btn-default"><i class="fas fa-times"></i> Hủy</a>
              </div>

          </div>
          <!-- /.card-body -->

        </div>
        @csrf
      </form>
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