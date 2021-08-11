@extends('admin.layout')
@section('title', 'Chỉnh sửa thể loại sách')
@section('main')
<div class="card card-primary">
    <form action="{{route('type-book.update', $row->id)}}" method="POST">
        {{ csrf_field() }}
        {!! method_field('patch') !!}
        <div class="card-body">
            <div class="form-group">
            <label for="exampleInputEmail1">Tên thể loại</label>
            <input type="text" value="{{$row->name}}" name="name" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên thể loại">
            </div>
            <div class="form-group">
                <label>Trạng thái</label>
                <select name="status" class="form-control">
                    <option  @if ($row->AnHien==1) selected @endif value="1">Hiện</option>
                    <option  @if ($row->AnHien==0) selected @endif value="0">Ẩn</option >
                </select>
            </div>    
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm thể loại</button>
        </div>
    </form>
  </div>
@endsection