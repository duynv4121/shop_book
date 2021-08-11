<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Session;
use App\Models\coupon;
session_start();

class CartController extends Controller
{
    public function gio_hang()
    {
        return view('layout.cart.show_cart');
    }

   
    public function add_cart_ajax(Request $request)
    {
        $data = $request->all();
        $session_id = substr(md5(microtime()),rand(0,26),5); 
        $cart = Session::get('cart');
        if($cart == true){
            $tonTai = 0;
            foreach ($cart as $key => $val){
                if($val['product_id']== $data['cart_product_id']){
                    $tonTai ++;
                    $cart[$key] = array(
                        'session_id' => $val['session_id'],
                        'product_name' => $val['product_name'],
                        'product_id' => $val['product_id'],
                        'product_image' => $val['product_image'],
                        'product_qty' => $val['product_qty']+ $data['cart_product_qty'],
                        'product_price' => $val['product_price'],
                        'product_quantity' => $val['product_quantity'],
                        
                        );
                    Session::put('cart', $cart);
                }
            }
            if($tonTai == 0){
                $cart[] = array(
                    'session_id' =>  $session_id,
                    'product_id' => $data['cart_product_id'],
                    'product_name' =>  $data['cart_product_name'],
                    'product_price' =>  $data['cart_product_price'],
                    'product_image' =>  $data['cart_product_image'],
                    'product_qty' =>  $data['cart_product_qty'],
                    'product_quantity' => $data['cart_product_quantity'],
                );
                Session::put('cart', $cart);
            }
        }else{
            $cart[] = array(
                'session_id' =>  $session_id,
                'product_id' => $data['cart_product_id'],
                'product_name' =>  $data['cart_product_name'],
                'product_price' =>  $data['cart_product_price'],
                'product_image' =>  $data['cart_product_image'],
                'product_qty' =>  $data['cart_product_qty'],
                'product_quantity' => $data['cart_product_quantity'],
            );
        }
        Session::put('cart', $cart);
        Session::save();
    }

    public function update_cart(Request $request)
    {
        $data = $request->all();
        $cart = Session::get('cart');
        if($cart == true){
            foreach ($data['cart_qty'] as $key => $qty){
                foreach($cart as $session => $val){
                    if($val['session_id'] == $key && $qty <= $cart[$session]['product_quantity']){
                        $cart[$session]['product_qty'] = $qty;
                    }elseif($val['session_id'] == $key && $qty > $cart[$session]['product_quantity']){
                        echo "<script type='text/javascript'>alert('thất bại');</script>";
                        return redirect()->back()->with('message','Cập nhật giỏ hàng thành công'); 
                    }
                    
                }
            }
            Session::put('cart', $cart);
            return redirect()->back()->with('message','Cập nhật giỏ hàng thành công'); 
        }else{
            Session::put('cart', $cart);
            return redirect()->back()->with('message','Cập nhật hàng thất bại'); 
        }
       
    }

    public function delete_product($session_id)
    {
        $cart = Session::get('cart');
        if($cart == true){
            foreach($cart as $key => $val){
                if($val['session_id'] == $session_id){
                    unset($cart[$key]);
                }
            }
        }
        Session::put('cart', $cart);
        return redirect()->back();
    }
    
    public function delete_cart()
    {
        $cart = Session::get('cart');
        if($cart == true){
            Session::forget('cart');
            Session::forget('coupon');
            Session::forget('fee');
        };
        return redirect()->back();
    }


    public function check_coupon(Request $request)
    {
        $data = $request->all();
        $coupon = coupon::where('coupon_code', $data['coupon'])->first();
        if($coupon == true){
            $count_coupon = $coupon->count();
            if($count_coupon > 0){
                $coupon_session = Session::get('coupon');
                if($coupon_session==true){
                    $tonTai = 0;
                    if($tonTai == 0){
                        $cou[]= array(
                            'coupon_code' => $coupon->coupon_code,
                            'coupon_condition' => $coupon->coupon_condition,
                            'coupon_number' => $coupon->coupon_number,
                        );
                        Session::put('coupon', $cou);
                    }
                }else{
                    $cou[]= array(
                        'coupon_code' => $coupon->coupon_code,
                        'coupon_condition' => $coupon->coupon_condition,
                        'coupon_number' => $coupon->coupon_number,
                    );
                    Session::put('coupon', $cou);
                }
                Session::save();
                return redirect()->back()->with('message','Áp dụng mã giảm giá thàng công'); 
            }
        }else{
            return redirect()->back()->with('message',' Mã giảm giá không có giá trị');

        }
    }

    public function delete_coupon()
    {
        Session::get('cart');
        if(Session::get('cart') == true){
            Session::forget('coupon');
            return redirect()->back();
        }
    }
}
