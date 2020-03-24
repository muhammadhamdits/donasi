@extends('layout/app')

@section('content')
<!--================Header Menu Area =================-->
<header class="header_area">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index.html">
						<img src="img/logo.png" alt="">
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
							<div class="col-lg-12 pr-0">
								<ul class="nav navbar-nav center_nav pull-right">
									<li class="nav-item active">
										<a class="nav-link" href="index.html">Home</a>
									</li>
									<li class="nav-item ">
										<a class="nav-link" href="causes.html">Overview</a>
									</li>
									<li class="nav-item ">
										<a class="nav-link" href="events.html">Report</a>
									</li>
									<li class="nav-item">
										<a class="main_btn" href="donation.html">donate now</a>
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
	<section class="home_banner_area">
		<div class="overlay"></div>
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content row">
					<div class="offset-lg-2 col-lg-8">
						<img class="img-fluid" src="img/banner/text-img.png" alt="">
						<p>If you are looking at blank cassettes on the web, you may be very confused at the difference in price You may see some
							for as low as each.</p>
						<a class="main_btn mr-10" href="#">donate now</a>
						<a class="white_bg_btn" href="#">view activity</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================ End Home Banner Area =================-->


	<!--================ Start important-points section =================-->
	<section class="donation_details pad_top">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 single_donation_box">
					<img src="img/icons/home1.png" alt="">
					<h4>Total Donation</h4>
					<p>
						The French Revolutioncons tituted for the conscience of the dominant.
					</p>
				</div>
				<div class="col-lg-3 col-md-6 single_donation_box">
					<img src="img/icons/home2.png" alt="">
					<h4>Fund Raised</h4>
					<p>
						The French Revolutioncons tituted for the conscience of the dominant.
					</p>
				</div>
				<div class="col-lg-3 col-md-6 single_donation_box">
					<img src="img/icons/home3.png" alt="">
					<h4>Highest Donation</h4>
					<p>
						The French Revolutioncons tituted for the conscience of the dominant.
					</p>
				</div>
				<div class="col-lg-3 col-md-6 single_donation_box">
					<img src="img/icons/home4.png" alt="">
					<h4>Total Donation</h4>
					<p>
						The French Revolutioncons tituted for the conscience of the dominant.
					</p>
				</div>
			</div>
		</div>
	</section>
	<!--================ End important-points section =================-->

  <!--================ Start Make Donation Area =================-->
  <section class="make_donation section_gap">
    <div class="container">
      <div class="row justify-content-start section-title-wrap">
        <div class="col-lg-12">
          <h1>Make a Donation Today</h1>
          <p>
            Las Vegas has more than 100,000 hotel rooms to choose from. There is something for every budget, and enough.
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
                  <input type="text" placeholder="Nama" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama'" class="form-control" name="nama" required>
                  <span class="fs-14"><i class="fa fa-user"></i></span>
                </div>
              </div>
            </div>

            <div class="col-lg-6 mb-4">
              <div class="donate_box">
                <div class="form-group">
                  <input type="text" placeholder="E-Mail" onfocus="this.placeholder = ''" onblur="this.placeholder = 'E-Mail'" class="form-control" name="email" required>
                  <span class="fs-14"><i class="fa fa-envelope"></i></span>
                </div>
              </div>
            </div>

            <div class="col-lg-6 mb-4">
              <div class="donate_box">
                <div class="form-group">
                  <input type="number" placeholder="Jumlah" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Jumlah' " class="form-control" name="jumlah" required>
                  <span class="fs-14">Rp</span>
                </div>
              </div>
            </div>

            <div class="col-lg-6 mb-4">
              <div class="donate_box">
                <div class="form-group">
									<input type="file" name="bukti_transfer" id="bukti_transfer" hidden required>
									<input type="text" placeholder="Bukti Transfer" class="form-control" id="buktitransfer" required>
                  <span class="fs-14"><i class="fa fa-file"></i></span>
								</div>
								
								{{-- <div class="form-group">                  
									<div class="input-group"> 

										<div class="input-group-prepend">
											<div class="btn main_btn" >
												<a  onclick="browse()">Upload</a>
											</div> 
											<input type="file" name="bukti_transfer" id="bukti_transfer" hidden required>  
										</div> 

										<input id='path'  name="path" class="form-control" type="text" placeholder="Bukti  Transfer" > 
										<span class="fs-14"><i class="fa fa-file"></i></span>

									</div>  --}}
								</div>

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

            <div class="col-lg-6 mb-4">
              <div class="donate_box">
                <button type="submit" class="main_btn w-100">donate now</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
  <!--================ End Make Donation Area =================-->

	<!--================ Start Our Major Cause section =================-->
	<section class="our_major_cause section_gap">
		<div class="container">
			<div class="row justify-content-center section-title-wrap">
				<div class="col-lg-12">
					<h1>Our Major Causes</h1>
					<p>
						The French Revolution constituted for the conscience of the dominant aristocratic class a fall from innocence the natural
						chain of events.
					</p>
				</div>
			</div>

			<div class="row">
				<div class="table table-responsive">
          <table width="100%">
            <tr>
              <td>No</td>
              <td>No</td>
              <td>No</td>
              <td>No</td>
              <td>No</td>
              <td>No</td>
            </tr>
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

		// function browse(){
    //     $("#bukti_transfer").click();
    //     $('#bukti_transfer').on('change', function(){
    //         var x = $("#bukti_transfer").val();
    //         $("#path").val(x);
    //     })
    // }
	</script>
@endsection