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
          <h1 class="text-center">Login Admin</h1>
        </div>
      </div>

      <div class="donate_now_wrapper">
        <form method="POST" action="{{ route('login') }}">
			@csrf
          <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <div class="mb-4">
                  <div class="donate_box">
                    <div class="form-group">
                      <input type="text" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                      <span class="fs-14"><i class="fa fa-user"></i></span>
                      @error('email')
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
                      <input type="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" >
                      <span class="fs-14"><i class="fa fa-key"></i></span>
                      @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                    </div>
                  </div>
                </div>
    
                <div class="mb-4">
                  <div class="donate_box">
                    <button type="submit" class="main_btn w-100">Login</button>
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