<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\type_books;
use Illuminate\Support\Str;
class TypeBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_type = type_books::all();
        return view('admin.theloaisach.all-type-book', compact('all_type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.theloaisach.add-type-book');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all(); // này là lấy tất cả request trong form input
        $name = $request->name; // này là lấy ra từng phần tử 
        $anhien = $request->status;
        $url = Str::slug($name,"-");

        $type_book = new type_books(); // tạo một dòng mới (rong)
        $type_book->name = $name; // cho vào cột tương ứng
        $type_book->AnHien = $anhien;
        $type_book->url_name = $url;
        $type_book ->save(); 

        return Redirect('/type-book'); // trả n
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = type_books::find($id);
        if($row == null){
            echo "Thể loại sách này không tồn tại";
        }else{
            return view('admin.theloaisach.edit-type-book', compact('row'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $type_book = type_books::find($id); // :)
        $name = $request->name;
        $anhien = $request->status;
        $url = Str::slug($name,"-");

        $type_book->name = $name; 
        $type_book->AnHien = $anhien;
        $type_book->url_name = $url;
        $type_book ->save(); 
        return redirect('/type-book');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lt = type_books::find($id);
        $lt->delete();
        return redirect('/type-book');

    }
}
