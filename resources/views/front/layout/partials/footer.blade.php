	<!-- FOOTER -->
	<footer class="bottom-footer" role="contentinfo">
		
		<div class="container">
			
			<div class="col-sm-3">
			
				<figure class="logo">
					
					<a href="index.html" rel="home">
						<img src="{{ url('resources/assets/front/img/logo-footer.png') }}" alt="logo">					
					</a>

				</figure> <!-- end logo -->

			</div> <!-- end col-sm-3 -->

			<div class="col-xs-12 col-sm-9">
					
				<nav>
					<ul class="nav navbar-nav">
						<?php $Menus = App\Menu::where('parent_id',0)
								->where('lokasi','Footer')
								->orderBy('urutan', 'asc')
								->get() ?>

						@foreach( $Menus as $Menu )
								
							<li><a href="{{ $Menu->link }}">{{ $Menu->judul }}</a></li>

						@endforeach
					</ul>
				</nav>

			</div> <!-- end col-sm-9 -->

			<div class="seperator col-sm-12 hidden-xs"></div>

			<div class="copyright col-xs-12 col-sm-7">
				
				Copyright &copy; {{ date('Y') }} Dinas Perikanan dan Kelautan Kab. Bantaeng

			</div> <!-- end copyright -->

			<div class="social-icon col-xs-12 col-sm-5">
				
				<ul>

					<?php $Sos = App\Setting::find(1) ?>
						<li><a href="{{ $Sos->fb }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
						<li><a href="{{ $Sos->twitter }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
						<!-- <li><a href="" target="_blank"><i class="fa fa-linkedin"></i></a></li> -->
										
				</ul>

			</div> <!-- end social-icon -->

		</div> <!-- end container -->

	</footer>
	<!-- END FOOTER -->

	
	<!-- JQUERY -->
	<script src="{{ url('resources/assets/front/js/jquery.js') }}"></script>
	<script src="{{ url('resources/assets/front/js/freetile.js') }}"></script>
	<script src="{{ url('resources/assets/front/js/html5.js') }}"></script>
	<script src="{{ url('resources/assets/front/js/smoothscroll.js') }}"></script>	
	<script src="{{ url('resources/assets/front/js/teamslider.js') }}"></script>	
	<script src="{{ url('resources/assets/front/js/swiper.js') }}"></script>	
	<script src="{{ url('resources/assets/front/js/isotope.js') }}"></script>	
	<script src="{{ url('resources/assets/front/js/verticalslider.js') }}"></script>	
	<script src="{{ url('resources/assets/front/js/ytplayer.js') }}"></script>	
	<script src="{{ url('resources/assets/front/js/timelinr.js') }}"></script>	
	<script src="{{ url('resources/assets/front/js/magnific-popup.js') }}"></script>	
	<script src="{{ url('resources/assets/front/js/counterup.js') }}"></script>	
	<script src="{{ url('resources/assets/front/js/cloudflare.js') }}"></script>	
	<script src="{{ url('resources/assets/front/js/parallax.js') }}"></script>	
	<script src="{{ url('resources/assets/front/js/fittext.js') }}"></script>
	<script src="{{ url('resources/assets/front/js/function.js') }}"></script>