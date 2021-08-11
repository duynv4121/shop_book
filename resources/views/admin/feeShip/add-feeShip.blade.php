@extends('admin.layout')
@section('title', 'Thêm phí vận chuyển')
@section('main')
<div class="card card-primary">
    <form action="{{route('coupon.store')}}" method="POST">
        {{ csrf_field() }}
        <div class="card-body">

            <div class="form-group">
                <label>Tỉnh/Thành phố</label>
                <select name="city" id="city" class="form-control choose city">
                        <option value="0">------Chọn tỉnh, thành phố-------</option>
                    @foreach ($city as $key => $val)
                        <option value="{{$val->matp}}">{{$val->name}}</option>
                    @endforeach
                </select>
            </div>  

            <div class="form-group">
                <label>Quận/Huyện</label>
                <select name="province" id="province" class="form-control province choose">
                    <option value="0">------Chọn quận/huyện-------</option>
                </select>
            </div>  


            <div class="form-group">
                <label>Xã/Phường/Thị trấn</label>
                <select name="wards" id="wards" class="form-control wards">
                    <option value="0">------Chọn quận/huyện-------</option> 
                </select>
            </div>  


            <div class="form-group">
                <label for="exampleInputEmail1">Tiền Ship</label>
                <input type="text" name="fee_ship" class="form-control fee-ship" id="exampleInputEmail1" placeholder="Nhập số tiền ship">
            </div>
        </div>

        <div class="card-footer">
            <button type="button" class="btn btn-primary add-delivery">Thêm phí ship</button>
        </div>

    </form>
  </div>

  
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tỉnh/thành phố</th>
                <th>Quận huyện</th>
                <th>Xã, phường, thị trấn</th>
                <th>Phí ship</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($feeShip as $val)
            <tr>
                <td>{{$val->city->name}}</td>
                <td>{{$val->QuanHuyen->name}}</td>
                <td>{{$val->XaPhuong->name}}</td>
                <td contenteditable="true" data-fee_id="{{$val->id}}" class="edit-fee">{{$val->phi_ship}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection