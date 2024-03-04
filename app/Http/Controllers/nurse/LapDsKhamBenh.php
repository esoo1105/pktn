<?php

namespace App\Http\Controllers\nurse;

use Illuminate\Http\Request;
use App\Models\Yta;

class LapDsKhamBenh extends yta
{
    public $data = [];
    private $users;

    public function __construct(){
        $this->users = new Yta();
        
    }

    public function index(Request $request){
        $this->data['title'] = 'Lập danh sách khám bệnh';

        $filters = [];
        $keywords = null;

        //lọc theo dịch vụ
        if(!empty($request->status)){
            $status = $request->status;
            if($status == 'Dichvu'){
                $status = 0;
            }else{
                $status = 1;
            }

            $filters[] = ['benhnhans.examination_service', '=', $status];
        }

            // lọc theo giới tính
            if(!empty($request->gioitinh)){
                $gioitinh = $request->gioitinh;
                if($gioitinh == 'Nam'){
                    $gioitinh = 1;
                }else{
                    $gioitinh = 0;
                }
    
                $filters[] = ['benhnhans.gender', '=', $gioitinh];
            }
            

            if(!empty($request->thang)){
                $thang = $request->thang;
                $thang = date('Y-m-d');
    
                $filters[] = ['benhnhans.created_at', '=', $thang];
            }
        
        if(!empty($request->keywords)){
            $keywords = $request->keywords;
        }

        $userList = $this->users->getAllTable($filters,$keywords);
        
        return view('nurse.function.danhsach.lapdskhambenh', $this->data, compact('userList'));
    }

    // hiển thị giao diện thêm
    public function add(){
        $this->data['title'] = 'Thêm thông tin bệnh nhân';

        return view('nurse.function.danhsach.add', $this->data);
    }

    //Lưu dữ liệu và hiển thị các thông báo lỗi
    public function postAddDS(Request $request){
        $request->validate([
            'hoten' => 'required',
            'sdt' => 'required',
            'gioitinh' => 'required',
            'Dichvu' => 'required',
            'ngay' => 'required'


        ], [
            'hoten.required' => 'Họ và tên bắt buộc phải nhập',
            'sdt.required' => 'Số điện thoại bắt buộc phải nhập',
            'gioitinh.required' => 'Click chọn giới tính tương ứng',
            'Dichvu.required' => 'Click chọn dịch vụ theo yêu cầu của bệnh nhân',
            'ngay.required' => 'Ngày khám bắt buộc phải nhập'
        ]);
        
        $dataInsert = [
            $request->input('hoten'),
            $request->input('email'),
            $request->input('sdt'),
            $request->input('diachi'),
            $request->input('cccd'),
            $request->input('gioitinh'),
            $request->input('Dichvu'),
            $request->input('pass'),
            $request->input('ngay')
    

        ];
        // dd($dataInsert);

        $this->users->addPhieuKham($dataInsert);
        return redirect()->route('nurse.function.danhsach.add')->with('Thêm người dùng thành công');
    }




    public function getEditDS($id=0){
        $this->data['title'] = 'Sửa thông tin bệnh nhân';

        if(!empty($id)){
            $userDetail = $this->users->getDetailDS($id);
            if(!empty($userDetail[0])){
                $userDetail = $userDetail[0];
            }
        }

        return view('nurse.function.danhsach.edit', $this->data, compact('userDetail'));
    }




    public function postEditDS(Request $request){
        // $request->validate([
        //     'hoten' => 'required',
        //     'sdt' => 'required',
        //     'gioitinh' => 'required',
        //     'Dichvu' => 'required',
        //     'ngay' => 'required'


        // ], [
        //     'hoten.required' => 'Họ và tên bắt buộc phải nhập',
        //     'sdt.required' => 'Số điện thoại bắt buộc phải nhập',
        //     'gioitinh.required' => 'Click chọn giới tính tương ứng',
        //     'Dichvu.required' => 'Click chọn dịch vụ theo yêu cầu của bệnh nhân',
        //     'ngay.required' => 'Ngày khám bắt buộc phải nhập'
        // ]);
        
        $dataUpdate = [
            $request->input('hoten'),
            $request->input('email'),
            $request->input('sdt'),
            $request->input('diachi'),
            $request->input('cccd'),
            $request->input('gioitinh'),
            $request->input('Dichvu'),
            $request->input('pass'),
            $request->input('ngay')
    

        ];
        // dd($dataUpdate);

        $this->users->uploadDS($dataUpdate);
        return redirect()->route('nurse.function.danhsach.add')->with('Thêm người dùng thành công');
    }
}
