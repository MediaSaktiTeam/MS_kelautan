@extends('front.layout.main')

@section('title')
Pencarian
@endsection


@section('konten')

<?php $sc = new App\Custom ?>

            <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                
                <div class="top-headline">
                
                    <h1 class="headline-title">Hasil Pencarian</h1>

                    <div class="separator"><i class="fa fa-anchor"></i></div>

                    <h4 class="description">
                        Hasil pencarian untuk "{{ $_GET['cari'] }}"
                    </h4>

                </div> <!-- end headline -->

            </div> <!-- end col-sm-8 -->

        </div>  <!-- end container -->

    </header>

	<!-- BLOG -->
	<section class="blog-content">
		
		<div class="container">
			<div class="blog-top-elements clearfix">

				<div class="top-title-wrap col-sm-9">
					
					@if ( $cari->total() != 0 )  
						<h4 class="top-title">
							Menemukan {{ $cari->total() }} data untuk <i>{{ $_GET['cari'] }}</i></h4>
						</h4>
					@else
						<center><h4 class="top-title">Tidak Menemukan Data</h4></center>
					@endif

				</div> <!-- end top-title-wrap -->

				<div class="search-wrap col-sm-3">
						
					<form action="{{ route('Pencarian') }}">
						
						<input type="text" value="{{ $_GET['cari'] }}" placeholder="Pencarian" name="cari">
						<span class="search-submit"><i class="fa fa-search"></i></span>

					</form>

				</div> <!-- end search-wrap -->

			</div> <!-- end blog-top-elements -->

			
			<div class="post-loop-wrap clearfix">

				@foreach( $cari as $b )

					<div class="col-sm-6 col-md-4">
						
						<article class="h-entry">
						
							<figure class="featured-image">
								
								@if ( empty( $b->gambar ) )
									<img src="{{ url('resources/assets/front') }}/img/blog-3.png" alt="{{ $b->judul }}">
								@else
									<img src="{{ url('resources/assets/img') }}/{{ $b->gambar }}" alt="{{ $b->judul }}">
								@endif

							</figure> <!-- featured-image -->

							<div class="entry-text">
								
								<header class="entry-header">
								
									<h4 class="entry-title">
										
										<a href="/blog/{{ $b->slug }}">{{ str_limit($b->judul,20) }}</a>

									</h4>

								</header> <!-- end entry-header -->

								<div class="entry-summary">
									{{ str_limit(strip_tags($b->konten),50) }}

								</div> <!-- entry-summary -->

								<div class="entry-meta">
									
									<span class="dt-published">{{ $sc->tgl_indo($b->created_at) }}</span>

								</div> <!-- end entry-meta -->

							</div> <!-- end entry-text -->

						</article> <!-- end h-entry -->

					</div> <!-- end col-sm-6 col-md-4 -->			

				@endforeach
			</div> <!-- end post-loop-wrap -->

		</div> <!-- end container -->

		<div class="container">

		<?php

			$Prev = $cari->currentPage() > 1 ? $LinkPage.( $cari->currentPage() - 1)  : "#";
			$Next = $cari->hasMorePages() > 0 ? $LinkPage.( $cari->currentPage() + 1)  : "#";
		
		?>

		@if ( $cari->perpage() < $cari->total() )

			<div class="container">
				
				<div class="col-xs-12 hidden-sm hidden-md hidden-lg">
					
					<h4 class="mobile-navigation-title">Navigasi :</h4>

					<a href="{{ $Prev }}" {{ $Prev == "#" ? "disabled=''": "" }} class="btn btn-sm btn-white">
						<i class="fa fa-chevron-left"></i>&nbsp;  Sebelumnya
					</a>

					<a href="{{ $Next }}" {{ $Next == "#" ? "disabled=''": "" }} class="btn btn-sm btn-white">
						Setelahnya &nbsp; <i class="fa fa-chevron-right"></i>
					</a>

				</div>

					<div class="pagenavi-wrap hidden-xs">

						<div class="pagenavi">
							<a href="{{ $Prev }}" {{ $Prev == "#" ? "disabled=''": "" }} class="btn btn-sm btn-white"><i class="fa fa-chevron-left"></i>&nbsp;  Halaman Sebelumnya</a>
							<a href="{{ $Next }}" {{ $Next == "#" ? "disabled=''": "" }} class="btn btn-sm btn-white">Halaman Setelahnya &nbsp; <i class="fa fa-chevron-right"></i></a>
						</div>
			
					</div> 

			</div>
		
		@endif

	</section>
	<!-- END BLOG -->
	
@endsection