@extends('admin.layout')
@section('title', 'Tất cả đơn hàng')
@section('main')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table id="datatable1" class="table table-hover">
            <thead>
              <tr>
                <th>STT</th>
                <th>Mã đơn hàng</th>
                <th>Tình trạng đơn hàng</th>
                <th>Xem chi tiết</th>
              </tr>
            </thead>

            @php
              $S=1;
            @endphp

            <tbody>
            @foreach ($order as $val)
                <tr>
                    <td>{{$S++}}</td>
                    <td>{{$val->fee_code}}</td>                 
                    <td>{{($val->status==1)?"Đang chờ xử lí":"Đang hàng đã xử lí"}}</td>
                    <td><a class="btn btn-info" href="{{URL::to('view-order/'.$val->fee_code)}}">Xem chi tiết</a></td>    
                </tr>
            @endforeach 
            
            </tbody>
          </table>
        
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection

