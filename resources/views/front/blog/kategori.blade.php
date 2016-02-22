@extends('front.layout.main')

@section('title')
{{ $kategori->nama_kategori }}
@endsection

@section('description')
Kategori {{ $kategori->nama_kategori }} Berita dan Kegiatan Dinas Perikanan dan Kelautan Kab. Bantaeng
@endsection


@section('konten')

<?php $sc = new App\Custom ?>

            <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                
                <div class="top-headline">
                
                    <h1 class="headline-title">Kategori "{{ $kategori->nama_kategori }}"</h1>

                    <div class="separator"><i class="fa fa-anchor"></i></div>

                    <h4 class="description">
                    	Berita dan Kegiatan
                    </h4>

                </div> <!-- end headline -->

            </div> <!-- end col-sm-8 -->

        </div>  <!-- end container -->

    </header>

	<!-- BLOG -->
	<section class="blog-content">
		
		<div class="container">
			
			<div class="blog-top-elements clearfix">
				
				<div class="dropdown-wrap col-sm-3 hidden-xs">
				
					<h6 class="dropdown-trigger">category</h6><i class="fa fa-chevron-down"></i>

					<ul>
						@foreach( $all_kategori as $kat )
							<li><a href="/blog/kategori/{{ $kat->slug }}">{{ $kat->nama_kategori }}</a></li>
						@endforeach
						
					</ul>

				</div> <!-- end dropdown-wrap -->

				
				<h4 class="mobile-category-title">Category : {{ $kategori->nama_kategori }}</h4>
				
				<select name="mobile-category" class="mobile-category" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
					<option value="/blog">Semua</option>
					@foreach( $all_kategori as $kat )
						<option value="/blog/kategori/{{ $kat->slug }}">{{ $kat->nama_kategori }}</option>
					@endforeach
				</select>


				<div class="top-title-wrap col-sm-6">
					
					<h2 class="top-title">
						"{{ $kategori->nama_kategori }}"
					</h2>

				</div> <!-- end top-title-wrap -->

				<div class="search-wrap col-sm-3">
						
					<form action="{{ route('Pencarian') }}">
						
						<input type="text" placeholder="Pencarian" name="cari">
						<span class="search-submit"><i class="fa fa-search"></i></span>

					</form>

				</div> <!-- end search-wrap -->

			</div> <!-- end blog-top-elements -->

			
			<div class="post-loop-wrap clearfix">
				
				@foreach( $blogs as $b )

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
									
									<!-- <span class="u-category">
									</span>

									<span class="meta-line"></span>
 -->
								</div> <!-- end entry-meta -->

							</div> <!-- end entry-text -->

						</article> <!-- end h-entry -->

					</div> <!-- end col-sm-6 col-md-4 -->			

				@endforeach
			</div> <!-- end post-loop-wrap -->

		</div> <!-- end container -->

		<?php

			$Prev = $blogs->currentPage() > 1 ? $LinkPage.( $blogs->currentPage() - 1)  : "#";
			$Next = $blogs->hasMorePages() > 0 ? $LinkPage.( $blogs->currentPage() + 1)  : "#";
		
		?>

		@if ( $blogs->perpage() < $blogs->total() )

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