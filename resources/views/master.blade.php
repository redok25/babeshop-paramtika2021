<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="{{asset('img/logo.png')}}">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>@yield('title') - Babe Shop</title>

	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700|Roboto:400,500,500i" rel="stylesheet">
	<!--
			CSS
			============================================= -->
	<link rel="stylesheet" href="{{asset('css/linearicons.css')}}">
	<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/availability-calendar.css')}}">
	<link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
	<link rel="stylesheet" href="{{asset('css/nice-select.css')}}">
	<link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}">
	<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.css')}}">
	<link rel="stylesheet" href="{{asset('css/main.css')}}">
</head>

<body>
	<!--================ Start Header Area =================-->
	@yield('header')
	<!--================ End Header Area =================-->

	<!--================ Start banner Area =================-->
	@yield('isi')
	<!--================ End banner Area =================-->


	<!--================ Start Footer Area =================-->
	<footer class="footer-area section-gap">
		<div class="container">
			<div class="row footer-inner">
				
				<div class="col-lg-2">
					<aside class="f-widget social-widget">
						<div class="f-title">
							<h3>Follow Me</h3>
						</div>
						<p>Let us be social</p>
						<ul class="list">
							<?php foreach ($sosmed as $s): ?>
								<li><a style="font-size: 2em" target="_blank" href="http:\\{{$s->link}}"><i class="fa fa-{{$s->jenis_sosmed}}"></i></a></li>
							<?php endforeach ?>
						</ul>
					</aside>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-lg-12 ab-widget">
					<p>Copyright © 2021 Tang-Obeng Team. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a></p>
				</div>
			</div>
		</div>
	</footer>
	<!--================ End Footer Area =================-->

	<script src="{{asset('js/vendor/jquery-2.2.4.min.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
	<script src="{{asset('js/vendor/bootstrap.min.js')}}"></script>
	<script src="{{asset('js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('js/owl-carousel-thumb.min.js')}}"></script>
	<script src="{{asset('js/jquery.sticky.js')}}"></script>
	<script src="{{asset('js/jquery.tabs.min.js')}}"></script>
	<script src="{{asset('js/parallax.min.js')}}"></script>
	<script src="{{asset('js/jquery.nice-select.min.js')}}"></script>
	<script src="{{asset('js/jquery.ajaxchimp.min.js')}}"></script>
	<script src="{{asset('js/isotope.pkgd.min.js')}}"></script>
	<script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
	<script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
	<script src="{{asset('js/main.js')}}"></script>
</body>

</html>