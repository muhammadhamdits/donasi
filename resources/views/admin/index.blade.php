@extends('../layout/app')

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
                                    <li class="nav-item ">
										<a class="nav-link" href="{{ route('admin.pass') }}" >Ganti Password</a>
									</li>
                                    <li class="nav-item ">
                                        <form action="{{ route('logout') }}" method="post">
                                            @csrf
                                            <a class="nav-link" href="#" id="logout">Logout</a>
                                        </form>
									</li>
									<li class="nav-item">
										<a class="main_btn" href="{{ route('home') }}">Home</a>
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

	<!--================ Start important-points section =================-->
	<section class="donation_details pad_top" id="overview">
		<div class="container">
			<div class="row justify-content-center section-title-wrap">
				<div class="col-lg-12">
					<h1>Total Donasi</h1>
					<h3>Rp {{ number_format(($total->nagari+$total->bni+$total->bsm+$total->mandiri),2,',','.') }}</h3>
				</div>
			</div>

		<form action="{{ route('admin.edit') }}" method="post">
		@csrf
			<div class="row">
				<div class="col-lg-3 col-md-6 single_donation_box">
					<!-- <i class="fa fa-bank ikon"></i> -->
					<!-- <h4>Bank Nagari</h4> -->
					<img class="mb-4" src="{{ asset('img/clients-logo/nagari.png') }}" alt="" height="60">
					<p class="mt-3">Jumlah</p>
					<div class="input-group-icon mt-10">
						<div class="icon">
							<!-- <i class="fa fa-thumb-tack" aria-hidden="true"></i> -->
							Rp
						</div>
						<input type="text" name="nagari" id="nagari" class="form-control single-input formnum" value="{{ $total->nagari }}">
					</div>
				</div>
				<div class="col-lg-3 col-md-6 single_donation_box">
					<!-- <i class="fa fa-bank ikon"></i>
					<h4>BNI</h4> -->
					<img class="mb-4" src="{{ asset('img/clients-logo/bni.png') }}" alt="" height="60">
					<p class="mt-3">Jumlah</p>
					<div class="input-group-icon mt-10">
						<div class="icon">
							<!-- <i class="fa fa-thumb-tack" aria-hidden="true"></i> -->
							Rp
						</div>
						<input type="text" name="bni" id="bni" class="form-control single-input formnum" value="{{ $total->bni }}">
					</div>
				</div>
				<div class="col-lg-3 col-md-6 single_donation_box">
					<!-- <i class="fa fa-bank ikon"></i>
					<h4>Bank Syariah Mandiri</h4> -->
					<img class="mb-4" src="{{ asset('img/clients-logo/bsm.png') }}" alt="" height="60">
					<p class="mt-3">Jumlah</p>
					<div class="input-group-icon mt-10">
						<div class="icon">
							<!-- <i class="fa fa-thumb-tack" aria-hidden="true"></i> -->
							Rp
						</div>
						<input type="text" name="bsm" id="bsm" class="form-control single-input formnum" value="{{ $total->bsm }}">
					</div>
				</div>
				<div class="col-lg-3 col-md-6 single_donation_box">
					<!-- <i class="fa fa-bank ikon"></i>
					<h4>Bank Mandiri</h4> -->
					<img class="mb-4" src="{{ asset('img/clients-logo/mandiri.png') }}" alt="" height="60">
					<p class="mt-3">Jumlah</p>
					<div class="input-group-icon mt-10">
						<div class="icon">
							<!-- <i class="fa fa-thumb-tack" aria-hidden="true"></i> -->
							Rp
						</div>
						<input type="text" name="mandiri" id="mandiri" class="form-control single-input formnum" value="{{ $total->mandiri }}">
					</div>
				</div>
			</div>
			<div class="row justify-content-center section-title-wrap mt-4">
				<div class="col-lg-12">
					<button type="submit" class="btn btn-success">Perbaharui</button>
				</div>
			</div>
		</form>
		</div>
	</section>
	<!--================ End important-points section =================-->

    <!--================ Start Our Major Cause section =================-->
	<section class="our_major_cause section_gap" id="report">
		<div class="container">
			<div class="row justify-content-center section-title-wrap">
				<div class="col-lg-12">
					<h1>Laporan Donasi</h1>
					<p>
						Laporan donasi yang diinputkan oleh user
					</p>
				</div>
			</div>

			<div class="row">
				<ul class="nav nav-tabs col-12">
					<li class="active mr-4"><a class="btn" data-toggle="tab" href="#home" id="menu">Home</a></li>
					<li class="mr-4"><a class="btn" data-toggle="tab" href="#menu1">Bank Nagari</a></li>
					<li class="mr-4"><a class="btn" data-toggle="tab" href="#menu2">BNI</a></li>
					<li class="mr-4"><a class="btn" data-toggle="tab" href="#menu3">Bank Syariah Mandiri</a></li>
					<li class="mr-4"><a class="btn" data-toggle="tab" href="#menu4">Bank Mandiri</a></li>
				</ul>
				
				<div class="tab-content table d-flex justify-content-center mt-4">
					<div id="home" class="tab-pane fade in active ">
						<h4 class="text-center">Home</h4>
						<table width="100%" class="text-center" id="tabel">
							<thead>
								<tr>
									
									<td>Nama</td>
									<td>E-Mail</td>
									<td>Jumlah</td>
									<td>HP</td>
									<td>Tanggal</td>
									<td>Status</td>
									<td>Aksi</td>
								</tr>
							</thead>
							<tbody>
							@foreach($data as $d)
							@if($d->bank == null)
								<tr>
									
									<td>{{ $d->nama }}</td>
									<td>{{ $d->email }}</td>
									<td>Rp {{ number_format($d->jumlah,2,',','.') }}</td>
									{{--<td>
										@foreach ($bank as $key => $val)                                           
											@if ($key == $d->bank)
												{{ $val }}
											@endif
										@endforeach
									</td>--}}
									<td>{{ $d->telp }}</td>
									<td>{{ tgl_indo($d->tanggal) }}</td>
									<td>
										@if($d->status == 0)
										<span class="badge badge-info">Ditambahkan</span>
										@elseif($d->status == 1)
										<span class="badge badge-success">Disetujui</span>
										@elseif($d->status == 2)
										<span class="badge badge-danger">Ditolak</span>
										@endif
									</td>
									<td>
										@if($d->status == 0)
										<form action="{{ route('admin.accept', ['id' => $d->id, 'status' => 0]) }}" method="post">
											@csrf
											<button class="genric-btn success-border circle small accepted" title="Setujui"><i class="fa fa-check"></i></button>
											<button class="genric-btn danger-border circle small rejected" title="Tolak"><i class="fa fa-times"></i></button>
										</form>
										@endif
										@if($d->bukti_transfer != null)
											<button class="genric-btn info-border circle small modalimage" title="Unduh bukti transfer" src="{{ asset('storage/'.$d->bukti_transfer) }}"><i class="fa fa-file"></i></button>
										@endif
										<button class="genric-btn primary-border circle small modalbank" title="Edit Bank" data-id="{{ $d->id }}"><i class="fa fa-edit"></i></button>
										</td>
								</tr>
							@endif
							@endforeach
							</tbody>
							<tfoot></tfoot>
						</table>
					</div>
					<div id="menu1" class="tab-pane fade in">
						<h4 class="text-center">Bank Nagari</h4>
						<table width="100%" class="text-center" id="tabel1">
							<thead>
								<tr>
									
									<td>Nama</td>
									<td>E-Mail</td>
									<td>Jumlah</td>
									<td>Tanggal</td>
									<td>Status</td>
									<td>Aksi</td>
								</tr>
							</thead>
							<tbody>
							@foreach($data as $d)
							@if($d->bank == 1)
								<tr>
									
									<td>{{ $d->nama }}</td>
									<td>{{ $d->email }}</td>
									<td>Rp {{ number_format($d->jumlah,2,',','.') }}</td>
									<td>{{ tgl_indo($d->tanggal) }}</td>
									<td>
										@if($d->status == 0)
										<span class="badge badge-info">Ditambahkan</span>
										@elseif($d->status == 1)
										<span class="badge badge-success">Disetujui</span>
										@elseif($d->status == 2)
										<span class="badge badge-danger">Ditolak</span>
										@endif
									</td>
									<td>
										@if($d->status == 0)
										<form action="{{ route('admin.accept', ['id' => $d->id, 'status' => 0]) }}" method="post">
											@csrf
											<button class="genric-btn success-border circle small accepted" title="Setujui"><i class="fa fa-check"></i></button>
											<button class="genric-btn danger-border circle small rejected" title="Tolak"><i class="fa fa-times"></i></button>
										</form>
										@endif
										@if($d->bukti_transfer != null)
											<button class="genric-btn info-border circle small modalimage" title="Unduh bukti transfer" src="{{ asset('storage/'.$d->bukti_transfer) }}"><i class="fa fa-file"></i></button>
										@endif
										</td>
								</tr>
							@endif
							@endforeach
							</tbody>
							<tfoot></tfoot>
						</table>
					</div>
					<div id="menu2" class="tab-pane fade in">
						<h4 class="text-center">BNI</h4>
						<table width="100%" class="text-center" id="tabel2">
							<thead>
								<tr>
									
									<td>Nama</td>
									<td>E-Mail</td>
									<td>Jumlah</td>
									<td>Tanggal</td>
									<td>Status</td>
									<td>Aksi</td>
								</tr>
							</thead>
							<tbody>
							@foreach($data as $d)
							@if($d->bank == 2)
								<tr>
									
									<td>{{ $d->nama }}</td>
									<td>{{ $d->email }}</td>
									<td>Rp {{ number_format($d->jumlah,2,',','.') }}</td>
									<td>{{ tgl_indo($d->tanggal) }}</td>
									<td>
										@if($d->status == 0)
										<span class="badge badge-info">Ditambahkan</span>
										@elseif($d->status == 1)
										<span class="badge badge-success">Disetujui</span>
										@elseif($d->status == 2)
										<span class="badge badge-danger">Ditolak</span>
										@endif
									</td>
									<td>
										@if($d->status == 0)
										<form action="{{ route('admin.accept', ['id' => $d->id, 'status' => 0]) }}" method="post">
											@csrf
											<button class="genric-btn success-border circle small accepted" title="Setujui"><i class="fa fa-check"></i></button>
											<button class="genric-btn danger-border circle small rejected" title="Tolak"><i class="fa fa-times"></i></button>
										</form>
										@endif
										@if($d->bukti_transfer != null)
											<button class="genric-btn info-border circle small modalimage" title="Unduh bukti transfer" src="{{ asset('storage/'.$d->bukti_transfer) }}"><i class="fa fa-file"></i></button>
										@endif
										</td>
								</tr>
							@endif
							@endforeach
							</tbody>
							<tfoot></tfoot>
						</table>
					</div>
					<div id="menu3" class="tab-pane fade in">
						<h4 class="text-center">Bank Syariah Mandiri</h4>
						<table width="100%" class="text-center" id="tabel3">
							<thead>
								<tr>
									
									<td>Nama</td>
									<td>E-Mail</td>
									<td>Jumlah</td>
									<td>Tanggal</td>
									<td>Status</td>
									<td>Aksi</td>
								</tr>
							</thead>
							<tbody>
							@foreach($data as $d)
							@if($d->bank == 3)
								<tr>
									
									<td>{{ $d->nama }}</td>
									<td>{{ $d->email }}</td>
									<td>Rp {{ number_format($d->jumlah,2,',','.') }}</td>
									<td>{{ tgl_indo($d->tanggal) }}</td>
									<td>
										@if($d->status == 0)
										<span class="badge badge-info">Ditambahkan</span>
										@elseif($d->status == 1)
										<span class="badge badge-success">Disetujui</span>
										@elseif($d->status == 2)
										<span class="badge badge-danger">Ditolak</span>
										@endif
									</td>
									<td>
										@if($d->status == 0)
										<form action="{{ route('admin.accept', ['id' => $d->id, 'status' => 0]) }}" method="post">
											@csrf
											<button class="genric-btn success-border circle small accepted" title="Setujui"><i class="fa fa-check"></i></button>
											<button class="genric-btn danger-border circle small rejected" title="Tolak"><i class="fa fa-times"></i></button>
										</form>
										@endif
										@if($d->bukti_transfer != null)
											<button class="genric-btn info-border circle small modalimage" title="Unduh bukti transfer" src="{{ asset('storage/'.$d->bukti_transfer) }}"><i class="fa fa-file"></i></button>
										@endif
										</td>
								</tr>
							@endif
							@endforeach
							</tbody>
							<tfoot></tfoot>
						</table>
					</div>
					<div id="menu4" class="tab-pane fade in">
						<h4 class="text-center">Bank Mandiri</h4>
						<table width="100%" class="text-center" id="tabel4">
							<thead>
								<tr>
									
									<td>Nama</td>
									<td>E-Mail</td>
									<td>Jumlah</td>
									<td>Tanggal</td>
									<td>Status</td>
									<td>Aksi</td>
								</tr>
							</thead>
							<tbody>
							@foreach($data as $d)
							@if($d->bank == 4)
								<tr>
									
									<td>{{ $d->nama }}</td>
									<td>{{ $d->email }}</td>
									<td>Rp {{ number_format($d->jumlah,2,',','.') }}</td>
									<td>{{ tgl_indo($d->tanggal) }}</td>
									<td>
										@if($d->status == 0)
										<span class="badge badge-info">Ditambahkan</span>
										@elseif($d->status == 1)
										<span class="badge badge-success">Disetujui</span>
										@elseif($d->status == 2)
										<span class="badge badge-danger">Ditolak</span>
										@endif
									</td>
									<td>
										@if($d->status == 0)
										<form action="{{ route('admin.accept', ['id' => $d->id, 'status' => 0]) }}" method="post">
											@csrf
											<button class="genric-btn success-border circle small accepted" title="Setujui"><i class="fa fa-check"></i></button>
											<button class="genric-btn danger-border circle small rejected" title="Tolak"><i class="fa fa-times"></i></button>
										</form>
										@endif
										@if($d->bukti_transfer != null)
											<button class="genric-btn info-border circle small modalimage" title="Unduh bukti transfer" src="{{ asset('storage/'.$d->bukti_transfer) }}"><i class="fa fa-file"></i></button>
										@endif
										</td>
								</tr>
							@endif
							@endforeach
							</tbody>
							<tfoot></tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
    <!--================ Ens Our Major Cause section =================-->
    
    <!-- The Modal -->
    <div id="myModal" class="modal">
        <!-- The Close Button -->
        <span class="close">&times;</span>
        <!-- Modal Content (The Image) -->
        <img class="modal-content" id="img01">
    </div>

	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="buttonhide">
	
	</button>
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Pilih Bank</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="{{ route('admin.bank') }}" method="post">
					<div class="modal-body">
						@csrf
						<input type="hidden" name="id_trans" id="id_trans">
						<div class="input-group-icon">
							<div class="icon">
								<i class="fa fa-bank"></i>
							</div>
							<div class="form-select">
								<select name="bank" id="bank" required>
									<option value="" selected disabled>Pilih Bank</option>
									<option value="1">Bank Nagari</option>
									<option value="2">BNI</option>
									<option value="3">Bank Syariah Mandiri</option>
									<option value="4">Bank Mandiri</option>
								</select>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="cancel" class="btn btn-danger" data-dismiss="modal">Batal</button>
						<button type="submit" name="simpan" class="btn btn-success">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection

@section('js')
	<script>
		$(document).ready(function(){
            $("#tabel").DataTable();
            $("#tabel1").DataTable();
            $("#tabel2").DataTable();
            $("#tabel3").DataTable();
            $("#tabel4").DataTable();
			$("#menu").click();
			$("#buttonhide").hide();
            
            $("#logout").click(function(){
                $(this).preventDefault;
                let form = $(this).parent();
                form.submit();
            });

            $(".accepted").click(function(){
				this.preventDefault;
				$(this).preventDefault;
				// console.log('url');
                let form = $(this).parent();
                let url = form.attr('action');
                let tmp = url.split("/");
    
                tmp.pop();
                url = tmp.join("/");
                url += "/1";
                form.attr('action', url);
            });
            $(".rejected").click(function(){
                let form = $(this).parent();
                let url = form.attr('action');
                let tmp = url.split("/");
    
                tmp.pop();
                url = tmp.join("/");
                url += "/2";
                form.attr('action', url);
            });
			
			let nagari = parseInt($("#nagari").val().replace(/\D/g,''),10);
			let bni = parseInt($("#bni").val().replace(/\D/g,''),10);
			let bsm = parseInt($("#bsm").val().replace(/\D/g,''),10);
			let mandiri = parseInt($("#mandiri").val().replace(/\D/g,''),10);
			$("#nagari").val(nagari.toLocaleString());
			$("#bni").val(bni.toLocaleString());
			$("#bsm").val(bsm.toLocaleString());
			$("#mandiri").val(mandiri.toLocaleString());
		});

		$(".modalbank").click(function(){
			$("#buttonhide").click();
			let id_trans = $(this).data('id');
			$("#id_trans").val(id_trans);
		});

        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var modalImg = document.getElementById("img01");

        $(".modalimage").click(function(){
            modal.style.display = "block";
            modalImg.src = $(this).attr('src');
        });

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
        	modal.style.display = "none";
        }

		$(".formnum").on('keyup', formnum);

		function formnum(){
			var n = parseInt($(this).val().replace(/\D/g,''),10);
			$(this).val(n.toLocaleString());
			//do something else as per updated question
			// myFunc(); //call another function too
		}

		// var cleave = new Cleave('.input-element', {
		// 	numeral: true,
		// 	delimiter: '.',
		// 	numeralThousandsGroupStyle: 'thousand'
		// });
		// var cleave1 = new Cleave('.input-element1', {
		// 	numeral: true,
		// 	delimiter: '.',
		// 	numeralThousandsGroupStyle: 'thousand'
		// });
		// var cleave2 = new Cleave('.input-element2', {
		// 	numeral: true,
		// 	delimiter: '.',
		// 	numeralThousandsGroupStyle: 'thousand'
		// });
		// var cleave3 = new Cleave('.input-element3', {
		// 	numeral: true,
		// 	delimiter: '.',
		// 	numeralThousandsGroupStyle: 'thousand'
		// });
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