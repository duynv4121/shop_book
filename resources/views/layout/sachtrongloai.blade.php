<?php use App\Http\Controllers\SachProduct; ?>

@extends("layout.layout")
@section("main")


<div class="col-sm-9 padding-right">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        @foreach ($tentheloai as $row)
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Sách theo thể loại</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$row->name}}</li>
        @endforeach
        </ol>
    </nav>
    
    <div class="features_items">
        <!--features_items-->
        <h2 class="title text-center">Sách theo thể loại</h2>
        @foreach ($sachtrongloai as $row)
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="books/{{$row->image}}" alt="" />
                            <h2>{{number_format($row -> price)}} VNĐ</h2>
                            <p>{{$row -> name}}</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="{{action([SachProduct::class, 'detail'],['id'=>$row->url_book])}}"><i class="fa fa-plus-square"></i>Xem chi tiết</a></li>
                            <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!--features_items-->
</div>
@endsection