<?php

namespace App\Http\Controllers\doctor;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\kedon;
use App\Models\Prescription;
use App\Models\Medicine;


class KeDonThuoc extends kedon
{   

    public $data = [];
    private $kedonthuoc;

    public function __construct()
    {
        $this->kedonthuoc = new kedon;
    }

    public function kdt()
    {
        $this->data['title'] = 'Kê đơn thuốc';
         $kedonthuoc = $this->kedonthuoc->kedon();

        return view('doctor.bacsi.kedonthuoc' , $this->data, compact('kedonthuoc', 'user'));
    }
    
    // public function store(Request $request)
    // {
    //     // Lấy dữ liệu từ request
    //     $tenBenhNhan = $request->input('tenbenhnhan');
    //     $tenBacSi = $request->input('tenbacsi');
    //     $tenThuoc = $request->input('tenthuoc');
    //     $soLuongThuoc = $request->input('soluong');
    //     $lieuLuongThuoc = $request->input('lieuluong');
    //     $thoiGianKham = $request->input('tg_kham');
    //     $thoiGianTaiKham = $request->input('tg-taikham');

    //     // Lưu dữ liệu vào cơ sở dữ liệu
    //     DB::table('kedonthuoc')->insert([
    //         'TEN_BENHNHAN' => $tenBenhNhan,
    //         'TEN_BACSI' => $tenBacSi,
    //         'TEN_THUOC' => $tenThuoc,
    //         'SOLUONG_THUOC' => $soLuongThuoc,
    //         'LIEULUONG_THUOC' => $lieuLuongThuoc,
    //         'TG_KHAM' => $thoiGianKham,
    //         'TG_TAIKHAM' => $thoiGianTaiKham,
    //     ]);

    //     // Chuyển hướng người dùng đến trang thành công hoặc hiển thị thông báo thành công
    //     return redirect()->route('bacsi/lietkedonthuoc')->with('success', 'Lưu kê đơn thuốc thành công');
    // }

    public function duadulieu(Request $request)
        {
            $prescription = Prescription::create([
                'ten_doctor' => $request->tenbs,
                'ten_patient' => $request->tenbn,
                'ngaykham' => $request->tg_kham,
                'hentaikham' => $request->tg_taikham,
            ]);
            
            // Lưu thông tin các mục thuốc trong đơn
            $tableData = $request->table_data;
            foreach ($tableData as $row) {
                // Lưu dữ liệu từ bảng hàng chờ vào CSDL
                $prescription->medicines()->create([
                    'tenthuoc' => $row['tenThuoc'],
                    'donvi' => $row['donVi'],
                    'soluong' => $row['soLuong'],
                    'gia' => $row['giaBan'],
                    'cachdung' => $row['cachDung'],
                    'thanhtien' => $row['thanhTien'],
                ]);
            }
        }
}

