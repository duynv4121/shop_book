@extends('admin.layout')
@section('title', 'Tất cả mã giảm giá')
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
                <th>ID</th>
                <th>Tên mã giảm giá</th>
                <th>Mã giảm giá</th>
                <th>Số lượng</th>
                <th>Tính năng</th>
                <th>Số lượng giảm(% hoặc VNĐ)</th>
                <th>Edit</th>
                <th>Xóa</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($all_coupon as $row)
                <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$row->coupon_name}}</td>
                    <td>{{$row->coupon_code}}</td>
                    <td>{{$row->coupon_time}}</td>
                    <td>{{($row->coupon_condition==1)?"Giảm theo %":"Giảm giá theo tiền"}}</td>
                    <td>
                        <?php
                            if($row->coupon_condition == 1){
                        ?>
                            Giảm {{$row->coupon_number}} %
                        <?php
                            }else{
                        ?>
                            Giảm {{number_format($row->coupon_number)}} VNĐ
                        <?php
                            }
                        ?>
                    </td>
                       
                    
                    <td><a class="btn btn-primary" href="{{route('coupon.edit', $row->id)}}">Chỉnh sửa</a></td>
                    <td>
                      <form action="{{route('coupon.destroy', $row->id)}}" method="POST">
                        {{csrf_field()}}
                        {!! method_field('delete') !!}
                        <button onclick="return confirm('Bạn có muốn xóa không?');" class="btn btn-warning" type="submit">Xóa</button>
                    </form>
                    </td>         
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

