<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tinh;
use App\Models\QuanHuyen;
use App\Models\XaPhuong;
use App\Models\feeShip;

class FeeShipController extends Controller
{
    public function index(Request $request)
    {
        $city = Tinh::orderby('name', 'ASC')->get();
        $feeShip = feeShip::all();
        return view('admin.feeShip.add-feeShip', compact(['city', 'feeShip']));
    }


    public function select_delivery(Request $request)
    {
        
       $data = $request->all();
        $output = '';

            if($data['action'] == "city"){
                    $select_huyen = QuanHuyen::where('matp', $data['ma_id'])->orderby('name', 'ASC')->get();
                        $output .= '<option>------Chọn quận/huyện-------</option>';
                    foreach($select_huyen as $key => $val){
                        $output .= '<option value="'.$val->maqh.'">'.$val->name.'</option>';
                    }
                    
            }else{
                    $select_xa = XaPhuong::where('maqh', $data['ma_id'])->orderby('name', 'ASC')->get();
                        $output .= '<option>------Chọn xã/phường/thị trấn-------</option>';
                    foreach($select_xa as $key => $row){
                        $output .= '<option value="'.$row->xaid.'">'.$row->name.'</option>';
                    }
            }
                      
        echo $output;

       
    }

    public function insert_delivery(Request $request)
    {
        $data = $request->all();
        $fee = new feeShip();
        $fee->fee_matp = $data['city']; 
        $fee->fee_maqh = $data['huyen'];
        $fee->fee_xa = $data['xa'];
        $fee->phi_ship = $data['fee_ship'];
        $fee->save();


    }

    

    // public function update(Request $request)
    // {
    //     $data = $request->all();
    //     $feeShip = feeShip::find($data['feeship_id']);
    //     $fee_value = rtrim($data['fee_value'], '.');
    //     $feeShip->phi_ship = $fee_value;
    //     $feeShip->save();
    // }
}
