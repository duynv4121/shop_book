@extends('admin.layout')
@section('title', 'Thêm mã giảm giá')
@section('main')
<div class="card card-primary">
    <form action="{{route('coupon.store')}}" method="POST">
        {{ csrf_field() }}
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Tên mã giảm giá</label>
                <input type="text" name="coupon_name" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên mã giảm giá">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Mã giảm giá</label>
                <input type="text" name="coupon_code" class="form-control" id="exampleInputEmail1" placeholder="Nhập code mã giảm giá">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Số lượng</label>
                <input type="text" name="coupon_time" class="form-control" id="exampleInputEmail1" placeholder="Nhập số lượng mã giảm giá">
            </div>

            <div class="form-group">
                <label>Tính năng mã giảm giá</label>
                <select name="coupon_condition" class="form-control">
                    <option value="0">------Chọn-------</option>
                    <option value="1">Giảm theo %</option>
                    <option value="2">Giảm theo giá tiền</option>
                </select>
            </div>  

            <div class="form-group">
                <label for="exampleInputEmail1">Nhập số % hoặc số tiền giảm giá</label>
                <input type="text" name="coupon_number" class="form-control" id="exampleInputEmail1" placeholder="Nhập số % hoặc số tiền giảm giá">
            </div>
       
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm mã giảm giá</button>
        </div>

    </form>
  </div>
@endsection