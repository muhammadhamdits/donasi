@extends('layout/app')

@section('content')
	<!--================Header Menu Area =================-->
	<header class="header_area">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="{{ route('home') }}">
						<img src="{{ asset('unand.png') }}" alt="" width="50">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
						aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<div class="row ml-0 w-100">
							<div class="col-lg-12 pr-0" id="navbar">
								<ul class="nav navbar-nav center_nav pull-right">
									<li class="nav-item active">
										<a class="nav-link" href="#home">Home</a>
									</li>
									<li class="nav-item ">
										<a class="nav-link" href="#overview">Statistik</a>
									</li>
									<li class="nav-item ">
										<a class="nav-link" href="#report">Laporan</a>
									</li>
									<li class="nav-item ">
										<a class="nav-link" href="{{ route('login') }}">Admin</a>
									</li>
									<li class="nav-item">
										<a class="main_btn" href="#donate">Donasikan Sekarang</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</nav>
		</div>
	</header>
	<!--================Header Menu Area =================-->

	<!--================ Home Banner Area =================-->
	<section class="home_banner_area" id="home">
		<div class="overlay"></div>
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content row">
					<div class="offset-lg-2 col-lg-8">
						<h1 style="text-shadow: 0 0 20px #000;"><b style="color: white">Terima Kasih Atas Donasi Anda</b></h1>
						<p>111111111111</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================ End Home Banner Area =================-->
@endsection

{{-- @section('js')
	<script>
		$("#buktitransfer").click(function(){
			$("#bukti_transfer").click();
		});

		$("#bukti_transfer").change(function(){
			let filename = $("#bukti_transfer").val().split("\\").pop();
			$("#buktitransfer").val(filename);
		});

		$(window).scroll(function(){
			var scrollPos = $(document).scrollTop();
			$('#navbar a').each(function () {
				var currLink = $(this);
				var refElement = $(currLink.attr("href"));
				console.log(currLink);
				if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
					$('#navbar ul li').removeClass("active");
					currLink.parent().addClass("active");
				}
				else{
					currLink.removeClass("active");
				}
			});
		});

		$(document).ready(function(){
			$("#tabel").DataTable();
		});
	</script>
@endsection --}}

<?php
	function tgl_indo($tanggal){
		$bulan = array (
			1 =>   'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		);
		$pecahkan = explode('-', $tanggal);
		
		// variabel pecahkan 0 = tanggal
		// variabel pecahkan 1 = bulan
		// variabel pecahkan 2 = tahun
	 
		return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
	}
?>