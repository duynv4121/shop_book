<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Tinh;
use App\Models\feeShip;
use App\Http\Controllers\Redirect;
use App\Models\shipping;
use App\Models\order;
use App\Models\orderDetail;
use App\Models\books;

class CheckoutController extends Controller
{
    public function check_out()
    {
        $city = Tinh::all();
        $check = Session::get('user');
        if($check){
            return view('layout.cart.checkout', compact('city'));
        }else{
            return redirect('/login');
        }
    }

    public function check_fee(Request $request)
    {
        $data = $request->all();
        $default = 40000;
        
       if($data['id_tinh']){
            $fee = feeShip::where('fee_matp', $data['id_tinh'])->where('fee_maqh', $data['id_huyen'])->where('fee_xa', $data['id_xa'])->get();
            $fee_count = $fee->count();
            if($fee_count>0){
                foreach($fee as $val){
                    Session::put('fee', $val->phi_ship);
                    Session::save();
                } 
            }else{
                    Session::put('fee', $default);
                    Session::save();
            }
       }
        
    }

    public function buy_product(Request $request)
    {
        $data = $request->all();
        $shipping = new shipping();
        $shipping->shipping_name = $data['name'];
        $shipping->address = $data['address'];
        $shipping->phone = $data['phone'];
        $shipping->email = $data['email'];
        $shipping->method = $data['pay'];
        $shipping->note = $data['notes'];
        $shipping->save();


        $fee_code = substr(md5(microtime()),rand(0,26),5);
        $shipping_id = $shipping->id;

        $order = new order();
        $order->id_user = Session::get('admin_id');
        $order->id_shipping =  $shipping_id;
        $order->status = 1;
        $order->fee_code =$fee_code;
        $order->save();


      
        Session::get('cart');
        if(Session::get('cart')){
            foreach(Session::get('cart') as $key =>$val){
                $order_detail = new orderDetail();
                $order_detail->fee_code = $fee_code;
                $order_detail->product_id = $val['product_id'];
                $order_detail->product_name = $val['product_name'];
                $order_detail->product_price = $val['product_price'];
                $order_detail->quantity_product = $val['product_qty'];
                $order_detail->product_feeship = $data['fee'];
                $order_detail->product_coupon = $data['coupon'];
                date_default_timezone_set('Asia/Ho_Chi_Minh').
                $order_detail->ngay_mua = now();
                $order_detail->save();


                $update_so_luong = books::find($val['product_id']);
                $update_so_luong->total = $val['product_quantity'] -  $val['product_qty'];
                $update_so_luong->save();

            }


        }

        Session::forget('cart');
        Session::forget('fee');
        Session::forget('coupon');
    }

    
}
