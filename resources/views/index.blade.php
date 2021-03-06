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
										<a class="main_btn" href="#donate">Laporkan Donasi</a>
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
						<p style="text-shadow: 0 0 20px #000; font-size: 20px"><b style="color:white">Tim Kewaspadaan Covid-19 Universitas Andalas <br> </b> </p>
						<p>Nama Rekening : RPL 010 BLU Universitas Andalas UTK DK <br> 
							Nomor Rekening : <br> 1. 21020101001001 (Bank Nagari) <br> 2. 8777776616 (BNI) <br>
						3. 7777703204 (Bank Syariah Mandiri) <br>	4. 1110015083971 (Bank Mandiri) </p>
						<a class="main_btn mr-10" href="#donate">Laporkan Donasi</a>
						<a class="white_bg_btn" href="#report">Lihat Laporan</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================ End Home Banner Area =================-->


	<!--================ Start important-points section =================-->
	<section class="donation_details pad_top" id="overview">
		<div class="container">
			<div class="row justify-content-center section-title-wrap">
				<div class="col-lg-12">
					<h1>Total Donasi</h1>
					<p>
						Total Donasi yang telah dikumpulkan
					</p>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-3 col-md-6 single_donation_box">
					<img class="mb-4" src="{{ asset('img/clients-logo/nagari.png') }}" alt="" height="60">
					<!-- <i class="fa fa-bank ikon"></i> -->
					<!-- <h4>Bank Nagari</h4> -->
					<h3 class="mt-4">Rp {{ number_format($total->nagari,2,',','.') }}</h3>
				</div>
				<div class="col-lg-3 col-md-6 single_donation_box">
					<img class="mb-4" src="{{ asset('img/clients-logo/bni.png') }}" alt="" height="60">
					<!-- <i class="fa fa-bank ikon"></i> -->
					<!-- <h4>BNI</h4> -->
					<h3 class="mt-4">Rp {{ number_format($total->bni,2,',','.') }}</h3>
				</div>
				<div class="col-lg-3 col-md-6 single_donation_box">
					<img class="mb-4" src="{{ asset('img/clients-logo/bsm.png') }}" alt="" height="60">
					<!-- <i class="fa fa-bank ikon"></i> -->
					<!-- <h4>Bank Syariah Mandiri</h4> -->
					<h3 class="mt-4">Rp {{ number_format($total->bsm,2,',','.') }}</h3>
				</div>
				<div class="col-lg-3 col-md-6 single_donation_box">
					<img class="mb-4" src="{{ asset('img/clients-logo/mandiri.png') }}" alt="" height="60">
					<!-- <i class="fa fa-bank ikon"></i> -->
					<!-- <h4>Bank Mandiri</h4> -->
					<h3 class="mt-4">Rp {{ number_format($total->mandiri,2,',','.') }}</h3>
				</div>
			</div>
		</div>
	</section>
	<!--================ End important-points section =================-->


  <!--================ Start Make Donation Area =================-->
  <section class="make_donation section_gap" id="donate">
    <div class="container">
      <div class="row justify-content-start section-title-wrap">
        <div class="col-lg-12">
          <h1>Laporkan Donasi Anda Hari Ini</h1>
          <p>
						{{--  Kirimkan donasi anda ke nomor rekening <b style="color: black">Nomor Rekening  resmi  Universitas Andalas</b>, lalu masukkan informasi donasi anda dan bukti transfer pada form di bawah ini.  --}}
						Laporkan donasi anda agar dapat menjaga akuntabilitas donasi  pihak Universitas Andalas
          </p>
        </div>
      </div>

      <div class="donate_now_wrapper">
        <form action={{route('transaksi')}} method='post' enctype="multipart/form-data">
			@csrf
          <div class="row">

            <div class="col-lg-6 mb-4">
              <div class="donate_box">
                <div class="form-group">
                  <input type="text" placeholder="Nama" oninvalid="invalidMsg(this)" 
									oninput="invalidMsg(this)" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama'" class="single-input" name="nama" required>
                  <span class="fs-14"><i class="fa fa-user"></i></span>
                </div>
              </div>
            </div>

            <div class="col-lg-6 mb-4">
              <div class="donate_box">
                <div class="form-group">
                  <input type="text" placeholder="E-Mail" oninvalid="invalidMsg(this)" 
									oninput="invalidMsg(this)" onfocus="this.placeholder = ''" onblur="this.placeholder = 'E-Mail'" class="single-input" name="email" required>
                  <span class="fs-14"><i class="fa fa-envelope"></i></span>
                </div>
              </div>
            </div>

            <div class="col-lg-6 mb-4">
              <div class="donate_box">
                <div class="form-group">
                  <input type="number" placeholder="Jumlah" oninvalid="invalidMsg(this)" 
									oninput="invalidMsg(this)" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Jumlah' " class="single-input" name="jumlah" required>
                  <span class="fs-14">Rp</span>
                </div>
              </div>
            </div>

            <div class="col-lg-6 mb-4">
              	<div class="donate_box">
                	<div class="form-group">
						<input type="file" name="bukti_transfer" id="bukti_transfer" hidden>
						<input type="text" placeholder="Bukti Transfer (Boleh dikosongkan)" class="single-input" id="buktitransfer">
						<span class="fs-14"><i class="fa fa-file"></i></span>
					</div>
				</div>
            </div>

            <div class="col-lg-6 mb-4">
              	<div class="donate_box">
				  	<div class="input-group-icon">
					  	<div class="icon">
							<i class="fa fa-bank"></i>
						</div>
						<div class="form-select">
							<select name="bank" id="bank">
								<option value="" selected disabled>Pilih Bank (Opsional)</option>
								<option value="1">Bank Nagari</option>
								<option value="2">BNI</option>
								<option value="3">Bank Syariah Mandiri</option>
								<option value="4">Bank Mandiri</option>
							</select>
						</div>
					</div>
				</div>
            </div>


			
            <div class="col-lg-6 mb-4">
              <div class="donate_box">
                <button type="submit" class="main_btn w-100">Laporkan Donasi</button>
              </div>
            </div>

            <div class="col-lg-6 mb-4">
              	<div class="donate_box">
					<div class="switch-wrap d-flex justify-content-center bd-highlight">
						<div class="confirm-switch">
							<input type="checkbox" name="anonim" id="confirm-switch">
							<label for="confirm-switch"></label>
						</div>
						<p class="ml-3">Sembunyikan nama anda</p>
					</div>
            	</div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
  <!--================ End Make Donation Area =================-->

	<!--================ Start Our Major Cause section =================-->
	<section class="our_major_cause section_gap" id="report">
		<div class="container">
			<div class="row justify-content-center section-title-wrap">
				<div class="col-lg-12">
					<h1>Laporan Donasi</h1>
					<p>
						Untuk transparansi kegiatan donasi, catatan setiap donasi dapat dilihat pada tabel di bawah ini.
					</p>
				</div>
			</div>

			<div class="row">
				<div class="table d-flex justify-content-center">
         			 <table width="100%" class="text-center" id="tabel">
            			<thead>
							<tr>
								<td>No</td>
								<td>Nama</td>
								<td>Jumlah</td>
								<td>Tanggal</td>
							</tr>
						</thead>
						<tbody>
						@foreach($data as $d)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>
									@if($d->anonim == 0)
									{{ $d->nama }}
									@else
									Nama Disamarkan
									@endif
								</td>
								<td>Rp {{ number_format($d->jumlah,2,',','.') }}</td>
								<td>{{ tgl_indo($d->tanggal) }}</td>
							</tr>
							@endforeach
						</tbody>
						<tfoot></tfoot>
          			</table>
        		</div>
			</div>
		</div>
	</section>
	<!--================ Ens Our Major Cause section =================-->
@endsection

@section('js')
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
				if(currLink.attr("href") != "http://donasi.ham.di/login"){
					var refElement = $(currLink.attr("href"));
					if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
						$('#navbar ul li').removeClass("active");
						currLink.parent().addClass("active");
					}
					else{
						currLink.removeClass("active");
					}
				}
			});
		});

		$(document).ready(function(){
			$("#tabel").DataTable();
		});

		function invalidMsg(textbox){
			if (textbox.value === '') { 
				textbox.setCustomValidity('Mohon form ini untuk diisi'); 
			} else if (textbox.validity.typeMismatch) { 
				textbox.setCustomValidity('Mohon Masukkan input sesuai dengan jenis form'); 
			} else { 
				textbox.setCustomValidity(''); 
			} 
       return true; 
		}

	</script>
@endsection

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