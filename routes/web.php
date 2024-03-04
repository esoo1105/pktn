<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BacsisController;
use App\Http\Controllers\YtasController;
use App\Http\Controllers\BaivietsController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\BenhnhansController;
use App\Http\Controllers\KhothuocsController;


// Y ta
use \App\Http\Controllers\nurse\TrangChu;
use \App\Http\Controllers\nurse\ThongTinCaNhan;
use \App\Http\Controllers\nurse\LapDsKhamBenh;
use \App\Http\Controllers\nurse\LapHoaDon;
use \App\Http\Controllers\nurse\LapPhieuKhamBenh;
use \App\Http\Controllers\nurse\XemLsDonThuoc;
use \App\Http\Controllers\nurse\XemToaThuoc;
use \App\Http\Controllers\nurse\ThuPhi;
use \App\Http\Controllers\nurse\InDuLieu;


// Bác sĩ
use \App\Http\Controllers\doctor\ThongTinBacSi;
use \App\Http\Controllers\doctor\KeDonThuoc;
use \App\Http\Controllers\doctor\LietKeDonThuoc;
use \App\Http\Controllers\doctor\QuanLyLichKham;
use \App\Http\Controllers\doctor\LichSuKhamBenh;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/',[HomeController::class, 'index']);

Route::get('/home',[HomeController::class, 'redirect']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// ROUTE ADMIN
Route::get('/index', [AdminsController::class, 'index']);
// ROUTE KHOTHUOC
Route::get('/inforkhothuoc', [KhothuocsController::class, 'index']);
Route::get('/createthuoc', [KhothuocsController::class, 'create']);
// ROUTE BENHNHAN
Route::get('/inforbenhnhan', [BenhnhansController::class, 'index']);
// ROUTE BÁC SĨ
Route::get('/inforbacsi', [BacsisController::class, 'index']);
Route::get('/createbacsi', [BacsisController::class, 'create']);
Route::post('/createbs', [BacsisController::class, 'store']);
Route::delete('/deletebacsi/{id}', [BacsisController::class, 'destroy']);
// ROUTE Y TÁ
Route::get('/inforyta', [YtasController::class, 'index']);
Route::get('/createyta', [YtasController::class, 'create']);
Route::post('/createyt', [YtasController::class, 'store']);
Route::delete('/deleteyta/{id}', [YtasController::class, 'destroy']);
// ROUTE BÀI VIẾT
Route::get('/inforbaiviet', [BaivietsController::class, 'index']);
Route::get('/createbaiviet', [BaivietsController::class, 'create']);
Route::post('/createbv', [BaivietsController::class, 'store']);
Route::get('/baiviet/{id}/edit', [BaivietsController::class, 'edit']);
Route::put('/update/{id}', [BaivietsController::class, 'update']);
Route::delete('/deletebaiviet/{id}', [BaivietsController::class, 'destroy']);


// Y tá
Route::prefix('/home')->group(function(){

    // Giao diện trang chủ
    // Route::get('/home', [TrangChu::class, 'home']);

    // Giao diện bác sĩ để test chuyển dữ liệu
    Route::get('/{id}', [TrangChu::class, 'getEditBS'])->name('edit-bs');
    Route::post('/{id}', [TrangChu::class, 'postEditBS'])->name('post-edit-bs');

    // Giao diện lập hóa đơn
    Route::get('function/hoadon/laphoadon', [LapHoaDon::class, 'index'])->name('function/hoadon/laphoadon');
    Route::get('function/hoadon/chitiethoadon', [LapHoaDon::class, 'chitiet'])->name('function/hoadon/chitiethoadon');


    // Giao diện lập danh sách khám bệnh
    Route::get('function/danhsach/lapdskhambenh', [LapDsKhamBenh::class, 'index'])->name('function/danhsach/lapdskhambenh');
    // Giao diện thêm dữ liệu bệnh nhân
    Route::get('function/danhsach/add', [LapDsKhamBenh::class, 'add'])->name('danhsach/add');
    Route::post('function/danhsach/add', [LapDsKhamBenh::class, 'postAddDS'])->name('danhsach/post-add');
    // Giao diện sửa dữ liệu bệnh nhân
    Route::get('function/danhsach/edit/{id}', [LapDsKhamBenh::class, 'getEditDS'])->name('danhsach/edit-ds');
    Route::post('function/danhsach/edit/{id}', [LapDsKhamBenh::class, 'postEditDS'])->name('danhsach/post-edit-ds');


//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Lập phiếu khám bệnh <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

    // Giao diện chính của lập phiếu khám bệnh hiển thị thông tin bệnh nhân
    Route::get('function/lapphieu/lapphieukhambenh', [LapPhieuKhamBenh::class, 'index'])->name('function/lapphieu/lapphieukhambenh');
    // Giao diện lập phiếu khám bệnh
    Route::get('function/lapphieu/lapphieu/{id}', [LapPhieuKhamBenh::class, 'getEdit'])->name('lapphieu/edit-pk');
    Route::post('function/lapphieu/lapphieu/{id}', [LapPhieuKhamBenh::class, 'postAdd'])->name('lapphieu/post-edit');
    // Giao diện xem phiếu khám
    Route::get('function/lapphieu/xemlapphieu/{id}', [LapPhieuKhamBenh::class, 'getEditXPK'])->name('lapphieu/edit-xpk');
    Route::post('function/lapphieu/xemlapphieu/{id}', [LapPhieuKhamBenh::class, 'getEditXPK'])->name('lapphieu/edit-xpk');
    // Giao diện in phiếu khám bệnh
    Route::get('function/infile/inphieukham/{id}', [LapPhieuKhamBenh::class, 'getEditInPK'])->name('lapphieu/edit-inpk');
    Route::post('function/infile/inphieukham/{id}', [LapPhieuKhamBenh::class, 'postEditInPK'])->name('lapphieu/post-editpk');


    Route::get('function/lapphieu/lapphieu', [LapPhieuKhamBenh::class, 'add'])->name('add');
    Route::post('function/lapphieu/lapphieu', [LapPhieuKhamBenh::class, 'postAdd'])->name('post-add');

//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>


   
//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Xem toa thuốc <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

    //  giao diện chính của xem toa thuốc hiển thị thông tin bệnh nhân
    Route::get('function/toathuoc/xemtoathuoc', [XemToaThuoc::class, 'index'])->name('function/toathuoc/xemtoathuoc');
    // giao diện xem toa thuốc
    Route::get('function/toathuoc/toathuoc/{id}', [XemToaThuoc::class, 'getEdit'])->name('toathuoc/edit-tt');
    Route::post('function/toathuoc/toathuoc/{id}', [XemToaThuoc::class, 'postEdit'])->name('toathuoc/post-edit-tt');
    // giao diện in toa thuốc
    Route::get('function/infile/intoathuoc/{id}', [XemToaThuoc::class, 'getEditIn'])->name('toathuoc/edit-intt');
    Route::post('function/infile/intoathuoc/{id}', [XemToaThuoc::class, 'postAdd'])->name('toathuoc/post-edit-intt');

 //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>



 //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Xem lịch sử đơn thuốc <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

    // Giao diện xem lịch sử đơn thuốc hiển thị thông tin bệnh nhân
    Route::get('function/donthuoc/xemlsdonthuoc', [XemLsDonThuoc::class, 'index'])->name('function/donthuoc/xemlsdonthuoc');
    // Giao diện xem đơn thuốc
    Route::get('function/donthuoc/chitietdonthuoc/{id}', [XemLsDonThuoc::class, 'getEditCT'])->name('edit-ct');
    Route::post('function/donthuoc/chitietdonthuoc/{id}', [XemLsDonThuoc::class, 'postEditCT'])->name('post-editct');
    // Giao diện in đơn thuốc
    Route::get('function/infile/indonthuoc/{id}', [XemLsDonThuoc::class, 'getEditInDT'])->name('edit-indt');
    Route::post('function/infile/indonthuoc/{id}', [XemLsDonThuoc::class, 'postEditInDT'])->name('post-edit-indt');

//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>



//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Thu phí <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

    // giao diện chính của thu phí hiển thị thông tin bệnh nhân theo (BHYT & Dịch vụ)
    Route::get('function/phieuthu/phieuthu', [ThuPhi::class, 'index'])->name('function/phieuthu/phieuthu');
    // giao diện xem phiếu thu BHYT
    Route::get('function/phieuthu/xemphieuthu/{id}', [ThuPhi::class, 'getEditBHYT'])->name('edit-bh');
    Route::post('function/phieuthu/xemphieuthu/{id}', [ThuPhi::class, 'postEditBHYT'])->name('post-editbh');
    // giao diện xem phiếu thu Dịch vụ
    Route::get('function/phieuthu/xemphieuthudv/{id}', [ThuPhi::class, 'getEditDV'])->name('edit-dv');
    Route::post('function/phieuthu/xemphieuthudv/{id}', [ThuPhi::class, 'postEditDV'])->name('post-editdv');
    // giao diện in phiếu thu BHYT
    Route::get('function/infile/inphieuthu/{id}', [ThuPhi::class, 'getEditInBH'])->name('edit-inbh');
    Route::post('function/infile/inphieuthu/{id}', [ThuPhi::class, 'postEditBH'])->name('post-edit');
    // giao diện in phiếu thu Dịch vụ
    Route::get('function/infile/inphieuthudv/{id}', [ThuPhi::class, 'getEditInDV'])->name('edit-indv');
    Route::post('function/infile/inphieuthudv/{id}', [ThuPhi::class, 'postEditDV'])->name('post-editdv');

//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

});




// bác sĩ
Route::prefix('/home')->group(function(){
    // Route::get('/', [TrangChu::class, 'index']);


    Route::get('home/{id}', [HomeController::class, 'getEditKD'])->name('edit-kd');
    Route::post('home/{id}', [HomeController::class, 'postEditKD'])->name('post-edit-kd');

    Route::get('bacsi/thongtinbacsi', [ThongTinBacSi::class, 'ttbs'])->name('bacsi/thongtinbacsi');
    Route::get('bacsi/kedonthuoc', [KeDonThuoc::class, 'kdt'])->name('bacsi/kedonthuoc');
    Route::get('bacsi/lietkedonthuoc', [LietKeDonThuoc::class, 'lkdt'])->name('bacsi/lietkedonthuoc');
    Route::post('bacsi/lietkedonthuoc', [LietKeDonThuoc::class, 'lkdt'])->name('bacsi/lietkedonthuoc');

    Route::get('bacsi/quanlylichkham', [QuanLyLichKham::class, 'qllk'])->name('bacsi/quanlylichkham');
    Route::get('bacsi/lichsukhambenh', [LichSuKhamBenh::class, 'lskb'])->name('bacsi/lichsukhambenh');

    Route::post('bacsi/kedonthuoc', [KeDonThuoc::class, 'duadulieu'])->name('bacsi/kedonthuoc');

});