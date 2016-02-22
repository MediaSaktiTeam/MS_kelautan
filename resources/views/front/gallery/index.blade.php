@extends('front.layout.main')

@section('title')
Galeri Dinas Perikanan dan Kelautan Kab. Bantaeng
@endsection

@section('description')
Galeri Dinas Perikanan dan Kelautan Kab. Bantaeng
@endsection


@section('konten')

            <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                
                <div class="top-headline">
                
                    <h1 class="headline-title">Galeri</h1>

                    <div class="separator"><i class="fa fa-anchor"></i></div>

                    <h4 class="description">
                        Foto Galeri Dinas Perikanan dan Kelautan Kab. Bantaeng
                    </h4>

                </div> <!-- end headline -->

            </div> <!-- end col-sm-8 -->

        </div>  <!-- end container -->

    </header>


	<!-- GALLERY INNER -->
	<div class="section-gallery-inner">
		
		<div class="container">	

			@if ( count($galeri) < 1 )

				<center>Belum ada foto</center>

			@else

				<div class="zoom-gallery">	

					<div class="isotope-container">


						@foreach( $galeri as $gal )

						  	<div class="col-sm-6 col-md-4 col-lg-3">

						  		<div class="isotope-single">
						  			
						  			<img src="{{ url('resources/assets') }}/img/gallery/{{ $gal->nama_file }}" alt="{{ str_replace('-',' ', $gal->judul) }}"/>

						  			<a class="image-zoom" href="{{ url('resources/assets') }}/img/gallery/{{ $gal->nama_file }}" title="{{ str_replace('-',' ', $gal->judul) }}">
						  				<i class="fa fa-search"></i>
						  			</a>

						  		</div>			      	

						    </div>

						@endforeach

					</div>

			    </div>

		    @endif

		</div> <!-- end container -->

		<?php

			$Prev = $galeri->currentPage() > 1 ? $LinkPage.( $galeri->currentPage() - 1)  : "#";
			$Next = $galeri->hasMorePages() > 0 ? $LinkPage.( $galeri->currentPage() + 1)  : "#";
		
		?>

		@if ( $galeri->perpage() < $galeri->total() )

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
	
	</div>
	<!-- END GALLERY INNER -->

@endsection