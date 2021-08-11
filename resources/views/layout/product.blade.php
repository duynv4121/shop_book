<?php use App\Http\Controllers\SachProduct; ?>

@extends("layout.layout")

@section("main")
<div class="col-sm-9 padding-right">
    <div class="features_items">
        <!--features_items-->
        <h2 class="title text-center">Tất cả sách</h2>
        @foreach ($sql as $row)
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="books/{{$row->image}}" alt="" />
                            <h2>{{number_format($row -> price)}} VNĐ</h2>
                            <p>{{$row -> name}}</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                        <div class="product-overlay">
                            <div class="overlay-content">
                                <h2>{{number_format($row -> price)}} VNĐ</h2>
                                <p>{{$row->name}}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="{{action([SachProduct::class, 'detail'],['id'=>$row->id])}}"><i class="fa fa-plus-square"></i>Xem chi tiết</a></li>
                            <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
        <?php echo $sql->links("pagination::bootstrap-4"); ?>
    </div>
    <!--features_items-->
</div>
@endsection