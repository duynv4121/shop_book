

@extends('layout.layout')
@section('main')
<section id="cart_items">
    <div class="col-sm-9 padding-right">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Shopping Cart</li>
            </ol>
        </div>
      

        <?php
            $message = Session::get('message');
            if($message){
                echo $message;
                Session::put('message', null);
            }
        ?>

        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Ảnh</td>
                        <td style="margin-left: 5rem;" class="description">Sản phẩm</td>
                        <td class="price">Giá</td>
                        <td class="quantity">Số lượng</td>
                        <td class="total">Thành tiền</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @if (Session::get('cart')== true)
                        
                    
                    <form action="{{URL::to('/update-cart')}}" method="post">
                        @csrf
                    @php
                        $total = 0;
                    @endphp
                    @foreach (Session::get('cart') as $key => $val)
                       
                        @php
                            $subTotal = $val['product_price'] * $val['product_qty'];
                            
                            $total+=$subTotal;
                        @endphp
                        <tr>
                            <td class="cart_product">
                                <a href=""><img style="height: 100px; width:70px;" src="uploads/{{$val['product_image']}}" alt=""></a>
                            </td>
                            <td  class="cart_description">
                                <h4><a style="margin-left: 5rem;" href="">{{$val['product_name']}}</a></h4>
                            </td>
                            <td class="cart_price">
                                <p>{{number_format($val['product_price'])}} VNĐ</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button d-flex">
                                 
                                        <input class="cart_quantity" type="number" min="1" name="cart_qty[{{$val['session_id']}}]" value="{{$val['product_qty']}}" autocomplete="off" size="2">
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">{{number_format($subTotal)}} VNĐ</p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="{{URL::to('/delete-product/'.$val['session_id'])}}"><i class="fa fa-times"></i></a>
                            </td>
                        </tr> 
                    @endforeach
                    
                        <tr>
                            <td> <input class="btn btn-success" type="submit" name="update_qty" value="Cập nhật giỏ hàng"></td>
                            <td><a href="{{url('/delete-cart')}}" class="btn btn-warning delete-all-cart" type="submit" name="update_qty" >Xóa tất cả giỏ hàng</a>
                        </tr> 
                        <tr>
                            <td colspan="3">
                                <div class="">
                                    <div class="total_area">
                                        <ul>
                                            @if (Session::get('coupon'))
                                                @foreach (Session::get('coupon') as  $key => $val )
                                                    @if ($val['coupon_condition']  == 1)
                                                        <li>Tổng giỏ hàng <span>{{number_format($total)}} VNĐ</span></li>
                                                        <li>Mã giảm giá áp dụng: <span>{{$val['coupon_number']}} %</span></li>
                                                        <?php
                                                            $total_coupon = ($total * $val['coupon_number'])/100;
                                                            echo '<li>Tổng tiền đã gảm: <span>' .number_format($total_coupon). ' VNĐ </span></li>';
                                                            $total_all = $total - $total_coupon;
                                                        ?>                                                                    
                                                        <li>Tổng thanh toán <span>{{number_format($total_all)}} VNĐ</span></li>
                                                        
                                                    @elseif($val['coupon_condition']  == 2)
                                                        <li>Tổng giỏ hàng <span>{{number_format($total)}} VNĐ</span></li>
                                                        <li>Mã giảm giá áp dụng giảm: <span>{{number_format($val['coupon_number'])}} VNĐ</span></li>
                                                        <?php
                                                            $total_coupon = ($total - $val['coupon_number']);
                                                            echo '<li>Tổng tiền đã giảm: <span>' .number_format($val['coupon_number']). ' VNĐ </span></li>';
                                                            $total_all = $total - $val['coupon_number'];
                                                        ?>                                                                  
                                                        <li>Tổng thanh toán <span>{{number_format($total_all)}} VNĐ</span></li>
                                                    @endif
                                                @endforeach 
                                             @endif  
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>  
                </form> 
                    <tr>
                        <td colspan="3">    
                            <form action="{{URL::to('/check-coupon')}}" method="post">
                                @csrf
                               
                                @if (Session::get('coupon'))
                                    <a style="margin-top: 10px" href="{{URL::to('/delete-coupon')}}" class="btn btn-warning">Xóa mã giảm giá</a>
                                @elseif (!Session::get('coupon'))
                                    <input name="coupon" type="text" placeholder="Nhập mã giảm giá">
                                    <span style="color: #696763">Nhập mã giảm giá của bạn (nếu có)</span>
                                    <button style="margin-top: 10px" type="submit" class="btn btn-default check-coupon">Áp dụng mã giảm giá</button> <br>
                                @endif
                            </form>
                        </td>
                    </tr>  
             
                @else
                    <tr>
                        <td>{{ 'Giỏ hàng trống' }}</td>
                    </tr>
                @endif  
                <tr>
                    <td>
                        <a class="btn btn-primary" href="{{URL::to('/check-out')}}">Xác nhận đơn hàng</a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>  
</section>

@endsection