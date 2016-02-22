	<!-- Page Loader -->
	<div class="page-loader">
		<img src="{{ url('/resources/assets/front') }}/img/loader.gif" alt="">
	</div>


	<!-- FIXED HEADER -->
	<header class="fixed-header">

		<div class="fixed-menu-cover">
			
			<div class="fixed-bg"></div>

			<div class="container">
				
				<div class="col-sm-3 col-md-2 col-lg-3">
				
					<figure class="logo">
						
						<a href="/" title="logo" rel="home">
							<img src="{{ url('/resources/assets/front') }}/img/logo.png" alt="">
						</a>

					</figure>

				</div> <!-- col-sm-3 -->

				<div class="col-sm-9 col-md-10 col-lg-9">
					
					<nav class="nav-menu">

						<ul class="nav navbar-nav">

							@include('front/layout/partials/menu')

						</ul>

					</nav>

				</div>

			</div> <!-- end container -->

		</div> <!-- end fixed-header-cover -->

	</header>
	<!--END FIXED HEADER -->
	

	<!-- HEADER -->
	<header class="front-header" role="banner">

		<div class="menu-open">
			
			<div class="fa fa-bars"></div>

		</div> <!-- end menu-open -->


		<div class="mobile-menu-wrap">

			<div class="fa fa-times menu-close"></div>					
						
				
				<div class="col-xs-12">
					
					<nav class="mobile-menu">

						<ul class="mobile-ul">

							@include('front/layout/partials/menu')
							
						</ul>

					</nav>

				</div>				

		</div> <!-- end mobile-menu-wrap -->
		
		<div class="container">
			
			<div class="col-xs-8 col-sm-3">
				
				<figure class="logo">
					
					<a href="/" title="logo" rel="home">
						<img src="{{ url('/resources/assets/front') }}/img/logo.png" alt="">
					</a>

				</figure>

			</div> <!-- end col-sm-3 -->

			<div class="col-sm-9 clearfix">
				
				<nav class="nav-menu">

					<ul class="nav navbar-nav">

						@include('front/layout/partials/menu')									

					</ul>

				</nav>

			</div>
		