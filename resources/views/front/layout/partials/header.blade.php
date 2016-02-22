
	<!-- Page Loader -->
	<div class="page-loader">
		<img src="{{ url('resources/assets/front/img/loader.gif') }}" alt="">
	</div>


	<!-- HEADER -->
	<header class="blog-header" role="banner">

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
			
			<div class="col-xs-8 col-sm-4 col-md-3">
				
				<figure class="logo">
					
					<a href="/" title="logo" rel="home">
						<img src="{{ url('resources/assets/front') }}/img/logo.png" alt="">
					</a>

				</figure>

			</div> <!-- end col-sm-2 -->

			<div class="col-sm-9">
				
				<nav class="nav-menu">

					<ul class="nav navbar-nav">

						@include('front/layout/partials/menu')

					</ul>

				</nav>

			</div>