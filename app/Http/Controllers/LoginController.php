<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Redirect;
use App\models\books;
use DB;
use App\Models\User;
use Auth;
use Session;

class LoginController extends Controller
{
   
    public function login()
    {   

        return view("layout.login");
    }

    public function postAuthLogin(Request $request){
        $arr = [
            'email' => $request->email, 
            'password' => $request->password, 
            'active' => 1
        ];
        $admin = User::where('email',$request->email)->where('password',$request->password)->where('idgroup','=',1)->first();
        $user = User::where('email',$request->email)->where('password',$request->password)->where('idgroup','=',0)->first();

        if ($admin){
            // dd($request->email,$request->password,);
            Session::put('admin_name',$admin->name); 
            Session::put('admin_id',$admin->id);
            Session::put('admin_group_id',$admin->idgroup);
            return redirect('/quantri');

        }elseif($user){
            Session::put('user_name',$user->name); 
            Session::put('user_id',$user->id);
            Session::put('user_group_id',$user->idgroup);
            return redirect('/');
        }else{
            echo "fail";
        }
       
        
    }

    public function LogoutUser(Request $request)
    {
        Session::put('user_name',null);
        Session::put('user_id',null);
        return redirect('/');

    }

    


    public function AuthLogin(Request $request)
    {
        $use_id = session::get('id_group');
        if($user_id == 1){
           return redirect('/user');
        }elseif($user_id == 2){
            return redirect('/quanlygioha');
        }
        else{
           return redirect('login')->send();
        }
    }
}
