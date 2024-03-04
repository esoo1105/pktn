<?php

namespace App\Http\Controllers\nurse;

use Illuminate\Http\Request;
use App\Models\Yta;


class LapPhieuKhamBenh extends yta
{
    public $data = [];
    private $users;

    public function __construct(){
        $this->users = new Yta();
    }

    public function index(Request $request){

        $this->data['title'] = 'Lập phiếu khám bệnh';
        $filters = [];
        $keywords = null;

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

            $filters[] = ['benhnhans.gender', '=', $status];
        }
        
        
        if(!empty($request->keywords)){
            $keywords = $request->keywords;
        }

        $userList = $this->users->getAllTable($filters, $keywords);
        
        return view('nurse.function.lapphieu.lapPhieuKhamBenh', $this->data, compact('userList'));
    }
    
    public function getEdit($id=0){
        $this->data['title'] = 'Lập phiếu khám';

        if(!empty($id)){
            $userDetail = $this->users->getDetailDS($id);
            if(!empty($userDetail[0])){
                $userDetail = $userDetail[0];
                // dd($userDetail);
            }
        }

        return view('nurse.function.lapphieu.lapphieu', $this->data, compact('userDetail'));
    }

    public function getEditInPK($id=0){
        $this->data['title'] = 'In phiếu khám';

        if(!empty($id)){
            $userDetail = $this->users->getDetailDS($id);
            if(!empty($userDetail[0])){
                $userDetail = $userDetail[0];
                // dd($userDetail);
            }
        }

        return view('nurse.function.infile.inphieukham', $this->data, compact('userDetail'));
    }

    public function getEditXPK($id=0){
        $this->data['title'] = 'Xem phiếu khám';

        if(!empty($id)){
            $userDetail = $this->users->getDetailDS($id);
            if(!empty($userDetail[0])){
                $userDetail = $userDetail[0];
                // dd($userDetail);
            }
        }
        return view('nurse.function.lapphieu.xemlapphieu', $this->data, compact('userDetail'));
    }


    public function add(){
        $this->data['title'] = 'Test chức năng thêm';

        return view('nurse.function.lapphieu.lapphieu', $this->data);
    }

    //kiểm tra dữ liệu và hiển thị các thông báo lỗi
    public function postAdd(Request $request){
        $request->validate([
            'MA_BN' => 'required|unique:chisosuckhoes',
            'huyetap' => 'required',
            // 'nhiptim' => 'required',
            'cangnang' => 'required',
            'chieucao' => 'required',
            // 'nhietdo' => 'required',
            'ngaylap' => 'required',
            'trieuchung' => 'required'

            
        ], [
            'MA_BN.required' => 'Email bắt buộc phải nhập',
            'huyetap.required' => 'Huyết áp bắt buộc phải nhập',
            // 'nhiptim.required' => 'Cần nhập thông tin nhịp tim',
            'cangnang.required' => 'Cân nặng bắt buộc phải nhập',
            'chieucao.required' => 'Cần nhập thông tin chiều cao',
            // 'nhietdo.required' => 'Cần nhập thông tin nhiệt độ',
            'ngaylap.required' => 'Ngày lập bắt buộc phải nhập',
            'trieuchung.required' => 'Triệu chứng bắt buộc phải nhập'

        ]);
        $dataInsert = [
        $request->input('MaBN'),
        $request->input('huyetap'),
        $request->input('nhiptim'),
        $request->input('cangnang'),
        $request->input('chieucao'),
        $request->input('nhietdo'),
        $request->input('ngaylap')

        // date('Y-m-d H:i:s')
        ];
        dd($dataInsert);
        $this->users->addPhieu($dataInsert);
         return redirect()->route('nurse.function.lapphieu.lapphieu')->with('Thêm người dùng thành công');
    }

  

}
