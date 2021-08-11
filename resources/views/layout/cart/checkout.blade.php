
@extends('layout.layout');
@section('main')
<section id="cart_items">

    <div class="col-sm-9 padding-right">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Checkout</li>
            </ol>
        </div>
    
        </div>
    
        <?php
            $message = Session::get('message');
            if($message){
                echo $message;
                Session::put('message', null);
            }
        ?>

            
        <div class=" col-sm-9 table-responsive cart_info">
            <div class="col-sm shopper-info">
                <p>Chọn địa chỉ nhận hàng để xem phí ship</p>
                <select name="city" id="city" class="choose city">
                        <option value="0">------Chọn tỉnh, thành phố-------</option>
                    @foreach ($city as $key => $val)
                        <option value="{{$val->matp}}">{{$val->name}}</option>
                    @endforeach
                </select>
        
                <select style="margin-top: 10px" name="province" id="province" class=" province choose">
                    <option value="0">------Chọn quận/huyện-------</option>
                </select>
            
                <select  style="margin-top: 10px;" name="wards" id="wards" class=" wards">
                    <option value="0">------Chọn quận/huyện-------</option> 
                </select>
            </div>

            <table  style="margin-top: 10px;" class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Ảnh</td>
                        <td style="margin-left: 5rem;" class="description">Sản phẩm</td>
                        <td class="price">Số lượng tồn kho</td>
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

                            {{-- <input type="hidden" value="{{$val['cart_product_quantity']}}"> --}}
                            <td class="cart_product">
                                <a href=""><img style="height: 100px; width:70px;" src="uploads/{{$val['product_image']}}" alt=""></a>
                            </td>
                            <td  class="cart_description">
                                <h4><a style="margin-left: 5rem;" href="">{{$val['product_name']}}</a></h4>
                            </td>
                            <td class="cart_price">
                                <p>{{$val['product_quantity']}}</p>
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
                            <td><input class="btn btn-success" type="submit" name="update_qty" value="Cập nhật"></td>
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
                                                            if(Session::get('fee')){
                                                                echo '<li>Phí vận chuyển<span>'.number_format(Session::get('fee')).' VNĐ</li>
                                                                <li>Tổng thanh toán <span>'.number_format($total_all + Session::get('fee')).' VNĐ</span></li>';
                                                            }else {
                                                                echo '<li>Phí vận chuyển<span>'.number_format(Session::get('fee')).' VNĐ</li>
                                                                <li>Tổng thanh toán <span>'.number_format($total_all).' VNĐ</span></li>';
                                                            }
                                                            
                                                        ?>
                                                                                                           
                                                    @elseif($val['coupon_condition']  == 2)
                                                        <li>Tổng giỏ hàng <span>{{number_format($total)}} VNĐ</span></li>
                                                        <li>Mã giảm giá áp dụng giảm: <span>{{number_format($val['coupon_number'])}} VNĐ</span></li>
                                                        <?php
                                                            $total_coupon = ($total - $val['coupon_number']);
                                                            echo '<li>Tổng tiền đã giảm: <span>' .number_format($val['coupon_number']). ' VNĐ </span></li>';
                                                            $total_all = $total - $val['coupon_number'];
                                                            if(Session::get('fee')){
                                                                echo '<li>Phí vận chuyển<span>'.number_format(Session::get('fee')).' VNĐ</li>
                                                                    <li>Tổng thanh toán <span>'.number_format($total_all + Session::get('fee')).' VNĐ</span></li>';
                                                            }else {
                                                                echo '<li>Phí vận chuyển<span>'.number_format(Session::get('fee')).' VNĐ</li>
                                                                <li>Tổng thanh toán <span>'.number_format($total_all).' VNĐ</span></li>';
                                                            }
                                                        ?>
                                                    @endif
                                                @endforeach 
                                            @elseif (!Session::get('coupon'))
                                                <li>Tổng giỏ hàng <span>{{number_format($total)}} VNĐ</span></li>
                                                <?php
                                               if(Session::get('fee')){
                                                        echo '<li>Phí vận chuyển<span>'.number_format(Session::get('fee')).' VNĐ</li>
                                                        <li>Tổng thanh toán <span>'.number_format($total + Session::get('fee')).' VNĐ</span></li>';
                                                    }else {
                                                        echo '<li>Phí vận chuyển<span>'.number_format(Session::get('fee')).' VNĐ</li>
                                                        <li>Tổng thanh toán <span>'.number_format($total).' VNĐ</span></li>';
                                                    }
                                                ?>                                        
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
                </tbody>
            </table>
            <div class="col-sm shopper-info">
                <p>Thông tin nhận hàng</p>
                <form>
                    @csrf
                    <input type="text"  id="name" name="name" placeholder="Tên người nhận"">
                    <input type="text" name="phone" id="phone" placeholder="Số điện thoại">   
                    <input type="text" id="email" name="email" placeholder="Email">    
                    <input type="text" id="address" name="address" placeholder="Địa chỉ nhận hàng">    
                    <select style="margin-top: 10px" name="pay" id="pay" class="pay">
                        <option value="0">------Chọn phương thức thanh toán-------</option>
                        <option value="1">Thanh toán khi nhận hàng</option>
                        <option value="2">Thanh toán qua ATM</option>
                    </select>
                    <div style="margin-top: 10px" class="order-message">
                        <textarea name="notes" id="notes"  placeholder="Bạn có ghi chú gì về đơn hàng này" rows="5"></textarea>
                    </div>	
                      
                  
                    @if(Session::get('fee'))
                        <input type="hidden" id="fee" name="fee" value="{{Session::get('fee')}}">
                    @else 
                        <input type="hidden" id="fee" name="fee" value="40000">
                    @endif
                
                    @if(Session::get('coupon'))
                        @foreach (Session::get('coupon') as $key => $val)
                            <input type="hidden" id="coupon" name="coupon" value="{{$val['coupon_code']}}">
                        @endforeach 
                    @else 
                        <input type="hidden" id="coupon" name="coupon" value="no">
                    @endif
                    <button type="button" class="buy btn btn-primary">Mua hàng</button>
                </form>  
            </div>
        </div>
    </div>
    
</section>

@endsection