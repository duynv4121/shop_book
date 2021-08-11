<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\feeShip;
use App\Http\Controllers\Redirect;
use App\Models\shipping;
use App\Models\order;
use App\Models\orderDetail;
use App\Models\users;
use App\Models\coupon;


class CartManagerController extends Controller
{
    public function index()
    {
        $order = Order::orderby('id', 'DESC')->get();


        return view('admin.cartManager.all-cart-manager', compact(['order']));
    }

    public function view_order($fee_code)
    {
        $order = Order::where('fee_code', $fee_code)->get();

        foreach($order as $val){
            $id_user = $val->id_user;
            $id_shipping = $val->id_shipping;
        }
        
        $user = users::where('id', $id_user)->first();
        $shipping = shipping::where('id', $id_shipping)->first();

        $order_detail = orderDetail::with('product')->where('fee_code', $fee_code)->get();

        foreach($order_detail as $val){
            $product_coupon = $val->product_coupon;
        }

        $coupon = coupon::where('coupon_code', $product_coupon)->first();
        
        $fee_ship = orderDetail::where('fee_code', $fee_code)->first();
        



        return view('admin.cartManager.view-detail-order', compact(['user','shipping', 'order_detail', 'coupon', 'fee_ship']));
    }
}
