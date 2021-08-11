<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\books;
use DB;
use Auth;

class SachProduct extends Controller
{
   
    public function detail($id)
    {   
  
        $kq_views = books::where('url_book', $id)->first();
        $kq_views->views = $kq_views->views+1;
        $kq_views->save();


        $kq = DB::table('books')->where('url_book', $id)->first();
        if($kq == null){
            echo "Sách này kh có";
            return;
        }
        $data = ["sach"=>$kq]; 
        
        return view('layout.detail', $data);
    }

    public function product()
    {
        $sql = DB::table('books')->paginate(3);
        return view('layout.product', compact('sql'));
    }

    public function stl($id)
    {
       $sachtrongloai = DB::table('books')->where('slug_type', $id)->get();
   

       $tentheloai = DB::table('type_books')->where('url_name', $id)->get();
       return view('layout.sachtrongloai', compact('sachtrongloai','tentheloai'));

    }

    public function search(Request $request)
    {
        $keywords = $request->keyword_submit;
        $search_product = DB::table('books')->where('name', 'like','%'.$keywords.'%')->get();
        return view('layout.search', compact('search_product', 'keywords'));
    }

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
        if (Auth::attempt($arr)){
           dd('dăng nhập thành công');
        }else{
            dd('dangnhap taht bai');
        }
    }
}
