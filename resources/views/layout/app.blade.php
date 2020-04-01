<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" type="image/png" href="{{ asset('unand.png') }}">
	<title>Donasi Unand</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{ asset('css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{ asset('vendors/linericon/style.css')}}">
	<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{ asset('vendors/owl-carousel/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{ asset('vendors/lightbox/simpleLightbox.css')}}">
	<link rel="stylesheet" href="{{ asset('vendors/nice-select/css/nice-select.css')}}">
	<link rel="stylesheet" href="{{ asset('vendors/animate-css/animate.css')}}">
	<link rel="stylesheet" href="{{ asset('vendors/jquery-ui/jquery-ui.css')}}">
	<!-- Datatable CSS -->
	<link rel="stylesheet" href="{{ asset('css/datatables.min.css')}}">
	<!-- main css -->
	<link rel="stylesheet" href="{{ asset('css/style.css')}}">
	<link rel="stylesheet" href="{{ asset('css/responsive.css')}}">

	@toastr_css
</head>

<body>
	@yield('content')

	<!--================ Start Footer Area  =================-->
	<footer class="footer-area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-5  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6 class="footer_title">About US</h6>
						<p>
							Universitas Andalas
						</p>
					</div>
				</div>
				<div class="col-lg-5 col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6 class="footer_title">Newsletter</h6>
						<p>Stay updated with our latest trends</p>
						<div id="mc_embed_signup">
							<form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
							 method="get" class="subscribe_form relative">
								<div class="input-group d-flex flex-row">
									<input name="EMAIL" placeholder="Enter Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '"
									 required="" type="email">
									<button class="btn sub-btn">
										<span class="lnr lnr-arrow-right"></span>
									</button>
								</div>
								<div class="mt-10 info"></div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-lg-2 col-md-6 col-sm-6">
					<div class="single-footer-widget f_social_wd">
						<h6 class="footer_title">Follow Us</h6>
						<p>Let us be social</p>
						<div class="f_social">
							<a href="#">
								<i class="fa fa-facebook"></i>
							</a>
							<a href="#">
								<i class="fa fa-twitter"></i>
							</a>
							<a href="#">
								<i class="fa fa-dribbble"></i>
							</a>
							<a href="#">
								<i class="fa fa-behance"></i>
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<p class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> <a href="http://lea.si.fti.unand.ac.id">LEA SI Unand</a> | All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</p>
				</div>
			</div>
		</div>
	</footer>
	<!--================ End Footer Area  =================-->



	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="{{ asset('js/jquery-3.2.1.min.js')}}"></script>
	<script src="{{ asset('js/popper.js')}}"></script>
	<script src="{{ asset('js/bootstrap.min.js')}}"></script>
	<script src="{{ asset('vendors/lightbox/simpleLightbox.min.js')}}"></script>
	<script src="{{ asset('vendors/nice-select/js/jquery.nice-select.min.js')}}"></script>
	<script src="{{ asset('vendors/isotope/imagesloaded.pkgd.min.js')}}"></script>
	<script src="{{ asset('vendors/isotope/isotope-min.js')}}"></script>
	<script src="{{ asset('vendors/owl-carousel/owl.carousel.min.js')}}"></script>
	<script src="{{ asset('js/jquery.ajaxchimp.min.js')}}"></script>
	<script src="{{ asset('vendors/counter-up/jquery.waypoints.min.js')}}"></script>
	<script src="{{ asset('vendors/flipclock/timer.js')}}"></script>
	<script src="{{ asset('vendors/counter-up/jquery.counterup.js')}}"></script>
	<script src="{{ asset('js/mail-script.js')}}"></script>
	<script src="{{ asset('js/custom.js')}}"></script>
	<script src="{{ asset('js/datatables.min.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.5.8/cleave.min.js"></script>
	
    @toastr_js
    @toastr_render
	@yield('js')
</body>

</html>
