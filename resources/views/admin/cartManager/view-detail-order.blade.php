@extends('admin.layout')
@section('title', 'Chi tiết đơn hàng')
@section('main')
    <div class="card">
        <div class="card-header">
        Thông tin tài khoản đăng nhập
        </div>
        <div class="card-body">
            <div class="card-body table-responsive p-0">
                <table id="datatable1" class="table table-hover">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Tên khách hàng</th>
                      <th>Số điện thoại</th>
                      <th>Email</th>
                    </tr>
                  </thead>
      
                  @php
                    $S=1;
                  @endphp
      
                  <tbody>                
                      <tr>
                          <td>{{$S++}}</td>
                          <td>{{$user->name}}</td>                 
                          <td>{{$user->phone}}</td>  
                          <td>{{$user->email}}</td>  
                      </tr>                 
                  </tbody>
                </table>
              
              </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
        Thông tin người nhận đơn hàng
        </div>
        <div class="card-body">
            <div class="card-body table-responsive p-0">
                <table id="datatable1" class="table table-hover">
                  <thead>
                    <tr>
                      <th>Tên khách hàng</th>
                      <th>Địa chỉ</th>
                      <th>Số điện thoại</th>
                      <th>Hình thức thanh toán</th>
                      <th>Ghi chú</th>
                    </tr>
                  </thead>
    
                  <tbody>                
                      <tr>
                          <td>{{$shipping->shipping_name}}</td>                 
                          <td>{{$shipping->address}}</td>  
                          <td>{{$shipping->phone}}</td>  
                          <td>{{($shipping->method==1)?"Thanh toán khi nhận hàng":"Qua thẻ tín dụng"}}</td>
                          <td>{{$shipping->note}}</td>  

                      </tr>                 
                  </tbody>
                </table>
              
              </div>
        </div>
    </div>


    <div class="card">
        <div class="card-header">
            Chi tiết đơn hàng
        </div>
        <div class="card-body">
            <div class="card-body table-responsive p-0">
                <table id="datatable1" class="table table-hover">
                    <thead>
                        <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Mã giảm giá</th>
                        <th>Số lượng</th>
                        <th>Phí ship</th>
                        <th>Tổng</th>
                        </tr>
                    </thead>
                  
                    <tbody>     
                            @php
                                $total = 0;
                                $S=1;
                            @endphp
                            @foreach ($order_detail as $val)
                                @php
                                    $subTotal = $val->product_price * $val->quantity_product;
                                    $total += $subTotal;
                                @endphp
                                <tr>
                                    <td>{{$S++}}</td>      
                                    <td>{{$val->product_name}}</td>                 
                                    <td>{{number_format($val->product_price)}}</td>  
                                    <td>{{($val->product_coupon == 'no')?"Không có":"$val->product_coupon"}}</td>  
                                    <td>{{$val->quantity_product}}</td> 
                                    <td>{{($val->product_feeship == 'no')?"Không có":"".number_format($val->product_feeship)." VNĐ".""}}</td>   
                                    <td>{{number_format($subTotal)}} VNĐ</td>  
                                    
                                </tr>  
                            @endforeach  
                           
                            <tr>
                                <td colspan="7">
                                    <h6>Tổng đơn hàng: {{number_format($total) }} VNĐ</h6>
                                    <h6>                                      
                                        @if($coupon['coupon_condition'] == 1)
                                            @php  
                                                $giam = ($total*$coupon['coupon_number'])/100;
                                                echo "Số tiền giảm: ".number_format($giam)." VNĐ";
                                                echo "<h6>Phí ship: ".number_format($fee_ship->product_feeship)." VNĐ</h6>";
                                                echo "<h6>Tổng tiền thanh toán: ".number_format(($total-$giam)+$fee_ship->product_feeship)." VNĐ</h6>";
                                            @endphp
                                        @elseif($coupon['coupon_condition'] == 2)
                                            @php
                                                echo "Số tiền giảm: ".number_format($coupon['coupon_number'])." VNĐ";
                                                $giam = $total-$coupon->coupon_number;
                                                echo "<h6>Phí ship: ".number_format($fee_ship->product_feeship)." VNĐ</h6>";
                                                echo "<h6>Tổng tiền thanh toán: ".number_format($giam+$fee_ship->product_feeship)." VNĐ</h6>";
                                            @endphp
                                        @else
                                            @php
                                                echo "Số tiền giảm: 0";
                                                $giam = $total-0;
                                                echo "<h6>Phí ship: ".number_format($fee_ship->product_feeship)." VNĐ</h6>";
                                                echo "<h6>Tổng tiền thanh toán: ".number_format($giam+$fee_ship->product_feeship)." VNĐ</h6>";
                                            @endphp
                                        @endif
                                    </h6>
                                </td>    
                            </tr>         
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection