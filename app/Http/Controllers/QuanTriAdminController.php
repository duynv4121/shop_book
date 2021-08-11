<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Redirect;
use DB;
use Session;
use App\Models\books;
use App\Models\type_books;
use App\Models\users;
use App\Models\shipping;
class QuanTriAdminController extends Controller
{
    public function index()
    {
        return view('layout.login');
    }

    public function show_dashboard()
    {
        $product = books::count();
        $users = users::count();
        $type_books = type_books::count();
        $shipping = shipping::count();
        return view('admin.index', compact(['product','users', 'type_books', 'shipping']));    
    }

    public function dashboard(Request $request)
    {
        $admin_email = $request->email;
        $admin_password = md5($request->password);
        $result = DB::table('users')->where('email', $admin_email)->where('password', $admin_password)->first();
        if($result){
            Session::put('user', $result);
            Session::put('admin_name', $result->name);
            Session::put('admin_id', $result->id);
            return redirect('/dashboard');
        }else{
            Session::put('message', 'Tài khoản hoặc mật khẩu bị sai');
            return redirect('/admin');
        }
    }

    public function logout()
    {
        Session::forget('user');
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        return redirect('/admin');
    }
       
    
}
