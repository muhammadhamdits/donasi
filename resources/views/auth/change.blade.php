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
    
    <!--================ Start Make Donation Area =================-->
  <section class="make_donation section_gap" id="donate">
    <div class="container">
      <div class="row justify-content-center section-title-wrap">
        <div class="col-lg-12">
          <h1 class="text-center">Ganti Password</h1>
        </div>
      </div>

      <div class="donate_now_wrapper">
        <form method="POST" action="{{ route('admin.change') }}">
			    @csrf
          <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <div class="mb-4">
                  <div class="donate_box">
                    <div class="form-group">
                      <input type="password" placeholder="Password Lama Anda" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password Lama Anda'" class="form-control @error('oldpass') is-invalid @enderror" name="oldpass" value="{{ old('oldpass') }}" required>
                      <span class="fs-14"><i class="fa fa-lock"></i></span>
                      @error('oldpass')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <?php
                          // dd($errors->default);
                        ?>
                        @if($errors->default)
                        <span class="invalid-feedback" role="alert">
                            <strong>Tes</strong>
                        </span>
                        @endif
                    </div>
                  </div>
                </div>
    
                <div class="mb-4">
                  <div class="donate_box">
                    <div class="form-group">
                      <input id="pas1" type="password" placeholder="Password Baru Anda" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password Baru Anda'" class="form-control @error('newpass') is-invalid @enderror" name="newpass" required autocomplete="current-password" >
                      <span class="fs-14"><i class="fa fa-key"></i></span>
                      @error('newpass')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                    </div>
                  </div>
                </div>
    
                <div class="mb-4">
                  <div class="donate_box">
                    <div class="form-group">
                      <input id="pas2" type="password" placeholder="Konfirmasi Password Baru" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Konfirmasi Password Baru'" class="form-control @error('confirmpass') is-invalid @enderror" name="confirmpass" required autocomplete="current-password" >
                      <span class="fs-14"><i class="fa fa-key"></i></span>
                      @error('confirmpass')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                    </div>
                  </div>
                </div>

                <span>
                  <p class="text-danger" id="pesan">Konfirmasi password tidak cocok dengan password baru.</p>
                </span>

                <div class="mb-4">
                  <div class="donate_box">
                    <button type="submit" class="main_btn w-100" id="ganti">Ganti</button>
                  </div>
                </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
  <!--================ End Make Donation Area =================-->

@endsection

@section('js')

  <script>
    $("#pesan").hide();
    $("#ganti").attr("disabled", "disabled");

    $("#pas2").keypress(function(e){
      if(e.keyCode != 13 || e.keyCode != 9 || e.keyCode != 20 || e.keyCode != 16 || e.keyCode != 17 || e.keyCode != 18 || e.keyCode != 8){
        let pass = $("#pas1").val();
        let conf = $("#pas2").val() + e.key;
  
        if(pass === conf && conf != ''){
          $("#ganti").removeAttr("disabled");
          $("#pesan").show();
          $("#pesan").html("Password Cocok.");
          $("#pesan").attr("class", "text-success");
        }else{
          $("#ganti").attr("disabled", "disabled");
          $("#pesan").show();
          $("#pesan").html("Konfirmasi password tidak cocok dengan password baru.");
          $("#pesan").attr("class", "text-danger");
        }
      }
    });

    $("#pas1").keypress(function(e){
      if(e.keyCode != 13 || e.keyCode != 9 || e.keyCode != 20 || e.keyCode != 16 || e.keyCode != 17 || e.keyCode != 18 || e.keyCode != 8){
        let pass = $("#pas1").val();
        let conf = $("#pas2").val() + e.key;

        if(pass === conf && conf != ''){
          $("#ganti").removeAttr("disabled");
          $("#pesan").show();
          $("#pesan").html("Password Cocok.");
          $("#pesan").attr("class", "text-success");
        }else{
          $("#ganti").attr("disabled", "disabled");
          $("#pesan").show();
          $("#pesan").html("Konfirmasi password tidak cocok dengan password baru.");
          $("#pesan").attr("class", "text-danger");
        }
      }
    });
  </script>

@endsection