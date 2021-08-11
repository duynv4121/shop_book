@extends('admin.layout')
@section('title', 'Thêm sách')
@section('main')
<div class="card card-primary">
    <form action="{{route('sach.store')}}" method="POST"  enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="card-body">

            <div class="form-group">
                <label for="exampleInputEmail1">Tên sách</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên sách">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Giá</label>
                <input type="text" name="price" class="form-control" id="exampleInputEmail1" placeholder="Nhập giá sách">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Số trang</label>
                <input type="text" name="page" class="form-control" id="exampleInputEmail1" placeholder="Nhập số trang sách">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Kích thước</label>
                <input type="text" name="size" class="form-control" id="exampleInputEmail1" placeholder="Nhập kích thước của sách">
            </div>

            <div class="form-group">
                <label for="exampleInputFile">Hình ảnh</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                    <label name= "image" class="custom-file-label" for="exampleInputFile">Chọn hình ảnh sản phẩm</label>
                  </div>
                </div>
            </div>

            <div class="form-group">
                <label>Thể loại</label>
                <select name="type" class="form-control">
                    <option value="0">Chọn thể loại</option>
                    @foreach ($tl as $row)
                        <option value="{{$row->id}}">{{$row->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Trạng thái</label>
                <select name="status" class="form-control">
                    <option value="1">Hiện</option>
                    <option value="0">Ẩn</option>
                </select>
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
                    <textarea name="content" class="textarea" placeholder="Place some text here"
                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                    </textarea>
                </div> 
            </div>  
                  
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm sách</button>
        </div>

    </form>
  </div>
@endsection