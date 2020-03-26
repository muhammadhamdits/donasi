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
				<div class="table d-flex justify-content-center">
         			 <table width="100%" class="text-center" id="tabel">
            			<thead>
							<tr>
								<td>No</td>
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
							<tr>
								<td>{{ $loop->iteration }}</td>
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
                                        <button class="genric-btn success-border circle small accepted"><i class="fa fa-check"></i></button>
                                        <button class="genric-btn danger-border circle small rejected"><i class="fa fa-times"></i></button>
                                    </form>
									@endif
									@if($d->bukti_transfer != null)
                                        <button class="genric-btn info-border circle small modalimage" src="{{ asset('storage/'.$d->bukti_transfer) }}"><i class="fa fa-file"></i></button>
									@endif
									</td>
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
    
    <!-- The Modal -->
    <div id="myModal" class="modal">
        <!-- The Close Button -->
        <span class="close">&times;</span>
        <!-- Modal Content (The Image) -->
        <img class="modal-content" id="img01">
    </div>
@endsection

@section('js')
	<script>
		$(document).ready(function(){
            $("#tabel").DataTable();
            
            $("#logout").click(function(){
                $(this).preventDefault;
                let form = $(this).parent();
                form.submit();
            });

            $(".accepted").click(function(){
				this.preventDefault;
				$(this).preventDefault;
				console.log('url');
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