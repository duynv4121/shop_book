<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\type_books;
use App\Models\books;
use Illuminate\Support\Str;

class SachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_book = books::paginate(5);
        return view('admin.sach.all-sach', compact('all_book'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tl = type_books::all();
        return view('admin.sach.add-sach', compact('tl'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $name = $request -> name;
        $price = $request -> price;
        $page = $request -> page;
        $size = $request -> size;
        $type = $request -> type;
        $status = $request -> status;
        $content = $request -> content;
        $url = Str::slug($name,"-");
        // $url_html = $url.".html";

        $slug_type_book = type_books::where('id', $type)->get();

        foreach($slug_type_book as $val){
            $slug_type = $val -> name;
        }
        $slug_name_type = Str::slug($slug_type, "-");

        

        $image = $request->file('image');
        if($image){
            $name_image = $image->getClientOriginalName();
            $image->move('uploads',  $name_image);
        }else{
            $name_image = "";
        }
       

        $sach = new books();
        $sach -> name = $name;
        $sach -> price = $price;
        $sach -> pages = $page;
        $sach -> width_height = $size;
        $sach -> id_type = $type;
        $sach -> AnHien = $status;
        $sach -> content = $con.tent;
        $sach -> url_book = $url;
        $sach -> image = $image;
        $sach -> image = $name_image;
        $sach -> slug_type = $slug_name_type;
        $sach ->save();
        return redirect('/sach');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sach = books::find($id);
        return view('admin.sach.detail', compact('sach'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $tl = type_books::all();
        $sach = books::find($id);
        return view('admin.sach.edit', compact(['tl', 'sach']));
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
        $sach = books::find($id); // :)
        $name = $request -> name;
        $price = $request -> price;
        $page = $request -> page;
        $size = $request -> size;
        $type = $request -> type;
        $status = $request -> status;
        $content = $request -> content;
        $url = Str::slug($name,"-");
        $image = $request->file('image');
        $img_old = $request -> img_old;

        $slug_type_book = type_books::where('id', $type)->get();

        foreach($slug_type_book as $val){
            $slug_type = $val -> name;
        }
        $slug_name_type = Str::slug($slug_type, "-");

        
        if($image){
            $name_image = $image->getClientOriginalName();
            $image->move('uploads',  $name_image);
        }else{
            $name_image = $img_old;
        }
       

        $sach -> name = $name;
        $sach -> price = $price;
        $sach -> pages = $page;
        $sach -> width_height = $size;
        $sach -> id_type = $type;
        $sach -> AnHien = $status;
        $sach -> content = $content;
        $sach -> url_book = $url;
        $sach -> image = $image;
        $sach -> image = $name_image;
        $sach -> slug_type = $slug_name_type;
        $sach ->save();
        return redirect('/sach');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sach = books::find($id);
        $sach->delete();
        return redirect('/sach');
    }
}
