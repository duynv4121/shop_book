
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | DiDi</title>
	<base href="{{asset('/')}}">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/logo/faviconDiDi.ico">
	<link rel="shortcut icon" type="image/png" href="images/logo/faviconDiDi.png"/>
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" integrity="sha512-gOQQLjHRpD3/SEOtalVq50iDn4opLVup2TF8c4QPI3/NmUPNZOk2FG0ihi8oCU/qYEsw4P6nuEZT2lAG0UNYaw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head><!--/head-->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0" nonce="vAbrMJZh"></script>
<body>
	
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i>  0859380670</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i>  duynvps12207@fpt.edu.vn</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="{{URL::to('/')}}"><img src="images/home/logo.png" alt="" /></a>
						</div>
						{{-- <div class="btn-group pull-right">
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									USA
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Canada</a></li>
									<li><a href="#">UK</a></li>
								</ul>
							</div>
							
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									DOLLAR
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Canadian Dollar</a></li>
									<li><a href="#">Pound</a></li>
								</ul>
							</div>
						</div> --}}
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-user"></i> Account</a></li>
								<li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
								<li><a href="{{URL::to('/check-out')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a href="{{URL::to('/gio-hang')}}"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								@if (Session('user_name'))
								<li><a href="login.html"><i class="fa fa-lock"></i>{{Session('admin_name')}}</a></li>
								@endif
								<li><a href="{{url('login')}}"><i class="fa fa-lock"></i> Login</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
		<?php use App\Http\Controllers\SachProduct; ?>
		@include("layout.menu")
	</header><!--/header-->
	
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				@yield("slider")
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					@include("layout.asside")
				</div>
				@yield("main")
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>D</span>iDi</h2>
							<p>N??i k???t n??i, chia s??? ngu???n tri th???c!</p>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe1.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe2.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe3.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe4.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="images/home/map.png" alt="" />
							<p>M???t khi b???n h???c ?????c, b???n s??? m??i m??i t??? do</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">B???n quy???n thu???c v??? Nguy???n V??n Duy - PS12207</p>
					
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script>
		$(document).ready(function(){

			//x??c nh???n mua h??ng
			$('.buy').click(function(){
				swal({
					title: "X??c nh???n ????n h??ng?",
					text: "????n h??ng s??? kh??ng ho??n tr??? khi mua h??ng th??nh c??ng!",
					icon: "warning",
					buttons: true,
					dangerMode: true,
					})
				.then((willDelete) => {
					if (willDelete) {
						var name = $('#name').val();
						var phone = $('#phone').val();
						var email = $('#email').val();
						var address = $('#address').val();
						var pay = $("option:selected", $("#pay")).val();
						var coupon = $('#coupon').val();
						var fee = $('#fee').val();
						var notes = $('#notes').val();
						var _token = $('input[name="_token"]').val();
						// alert (cart_product_id);
						
						$.ajax({
							url: '{{url('/buy-product')}}',
							method: 'POST',
							data:{
								name:name,
								phone:phone,
								email:email,
								address:address,
								pay:pay,
								fee:fee,
								coupon:coupon,
								notes:notes,
								_token:_token
							},
							success:function(){
								swal("Tuy??t v???i! C???m ??n b???n ???? mua h??ng", {
								icon: "success",
								});		
							}
						});
							// setTimeout(function(){
							// 	location.reload(); 
							// }, 3000);
						}else {
							swal("????n h??ng ch??a ???????c mua th??nh c??ng");
					}
				});
				
			});


			//ch???n ?????a ch??? t??nh ph?? ship
			$(document).on('change','.wards',function(){
			var id_tinh = $("option:selected", $("#city")).val();
			var id_huyen = $("option:selected", $("#province")).val();
			var id_xa = $("option:selected", $("#wards")).val();
			var _token = $('input[name="_token"]').val();
			// alert(name_tinh);
			// alert(name_huyen);
			// alert(name_xa);

			$.ajax({
				url: '{{url('/check-fee')}}',
				method: 'POST',
				data: {
					id_tinh:id_tinh,
					id_huyen:id_huyen,
					id_xa:id_xa,
					_token:_token
				},
				success:function(){
					location.reload();
				}
			});
			
		});


			//add s???n ph???m v??o gi??? h??ng
			$('.add-to-cart').click(function(){
				var id = $(this).data('id');
				var cart_product_id = $('.cart_product_id_' + id).val();
				var cart_product_name = $('.cart_product_name_' + id).val();
				var cart_product_image = $('.cart_product_image_' + id).val();
				var cart_product_price = $('.cart_product_price_' + id).val();
				var cart_product_qty = $('.cart_product_qty_' + id).val();
				var cart_product_quantity = $('.cart_product_quantity_' + id).val();
				var _token = $('input[name="_token"]').val();
				// alert (cart_product_id);
				if(parseInt(cart_product_quantity)<parseInt(cart_product_qty)){
					swal("Xin l???i", "S??? l?????ng ch??ng t??i kh??ng c??n ????? v???i s??? l?????ng b???n ?????t!", "error");
				}else{
					$.ajax({
					url: '{{url('/addcartajax')}}',
					method: 'POST',
					data:{
						cart_product_id:cart_product_id,
						cart_product_name:cart_product_name,
						cart_product_image:cart_product_image,
						cart_product_price:cart_product_price,
						cart_product_qty:cart_product_qty,
						cart_product_quantity:cart_product_quantity,
						_token:_token
					},
					success:function(data){
						swal({
							title: "Ch??c m???ng!",
							text: "Th??m s???n ph???m th??nh c??ng!",
							icon: "success",
							button: "Ho??n t???t!",
							});
					}
				});
				}
				
			});


			// ch???n ?????a ch??? ????? th??m ph?? ship
			$('.choose').on('change',function(){
				var action = $(this).attr('id');
				var ma_id = $(this).val();
				var _token = $('input[name="_token"]').val();
				var result = '';
				
				if(action == 'city'){
					result = 'province';
				}else{
					result = 'wards';
				}
				
				$.ajax({
					url: '{{url('/select-delivery')}}',
					method: 'POST',
					data: {
					action:action,
					ma_id:ma_id,
					_token:_token
					},
					success:function(data){
					$('#'+result).html(data);         
					}
				});
			});
		});

		
		
		//th??ng b??o ??p d???ng m?? gi???m gi??
		$(document).ready(function(){
			$('.check-coupon').click(function(){
				swal({
					title: "Ch??c m???ng!",
					text: "??p d???ng m?? gi???m gi?? th??ng c??ng!",
					icon: "success",
					});
			})
		})
	</script>
</body>
</html>