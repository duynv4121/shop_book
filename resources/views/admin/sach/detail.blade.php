@extends('admin.layout')
@section('title', 'Chi tiêt sách')
@section('main')
<div class="card card-primary">
    <form action="{{route('sach.store')}}" method="POST"  enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="card-body">

            <div class="form-group">
                <label for="exampleInputEmail1">Tên sách</label>
                <input type="text" disabled value="{{$sach->name}}" name="name" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên sách">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Giá</label>
                <input type="text" disabled value="{{$sach->price}}" name="price" class="form-control" id="exampleInputEmail1" placeholder="Nhập giá sách">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Giá khuyến mãi</label>
                <input type="text" disabled name="name" class="form-control" id="exampleInputEmail1" >
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Số trang</label>
                <input type="text" disabled value="{{$sach->pages}}" name="page" class="form-control" id="exampleInputEmail1" placeholder="Nhập số trang sách">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Kích thước</label>
                <input type="text" disabled value="{{$sach->width_height}}" name="size" class="form-control" id="exampleInputEmail1" placeholder="Nhập kích thước của sách">
            </div>

            <div class="form-group">
                <label for="exampleInputFile">Hình ảnh</label>
                <div class="input-group">
                  <div class="custom-file">
                        <img style="height: 150px; width:100px; margin-top:100px" src="/uploads/{{$sach->image}}" alt="{{$sach->image}}">
                  </div>
                </div>
            </div>

            <div style="margin-top: 120px" class="form-group">
                <label>Trạng thái</label>
                <select disabled name="status" class="form-control">
                    <option value="1">Hiện</option>
                    <option value="0">Ẩn</option>
                </select>
            </div>

           
            <div class="form-group">
                <label>Thể loại</label>
                <select disabled name="type" class="form-control">  
                    <?php
                        $sql = DB::table('type_books')->where('id', $sach->id_type)->first();
                    ?>
                    <option value="{{$sql->id}}">{{$sql->name}}</option>
                </select>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Tác gải</label>
                <input type="text" disabled value="" name="name" class="form-control" id="exampleInputEmail1" >
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Nhà xuất bản</label>
                <input type="text" disabled value="" name="name" class="form-control" id="exampleInputEmail1" >
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Ngày xuất bản</label>
                <input type="text" disabled value="" name="name" class="form-control" id="exampleInputEmail1" >
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Loại bìa</label>
                <input type="text" disabled value="" name="name" class="form-control" id="exampleInputEmail1" >
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Số lượng</label>
                <input type="text" disabled value="" name="name" class="form-control" id="exampleInputEmail1" >
            </div>
           

            <div>
                <label>Nội dung sách</label>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                      <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
                            title="Remove">
                      <i class="fas fa-times"></i></button>
                </div>
                <div class="card-body pad">
                  <div class="mb-3">
                    <textarea  disabled name="content" class="textarea" placeholder="Place some text here"
                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                    {{$sach->content}}</textarea>
                </div> 
            </div>  
                  
        </div>
       <a class="btn btn-primary" href="{{route('sach.edit', $sach->id)}}">Chỉnh sửa</a>
                   
    </form>
  </div>
@endsection