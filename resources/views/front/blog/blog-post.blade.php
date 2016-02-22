@extends('front.layout.main')

@section('title')
{{ $blog->judul }}
@endsection

@section('description')
{{ str_limit(strip_tags($blog->konten), 150) }}
@endsection


@section('konten')

<?php $sc = new App\Custom ?>

			<div class="col-sm-10 col-sm-offset-1">
				
				<div class="top-headline">
				
					<h1 class="headline-title">{{ $blog->judul }}</h1>

						<div class="separator"><i class="fa fa-anchor"></i></div>

					<div class="description profile-desc">
						
						<img src="{{ url('resources/assets/front') }}/img/profil.png" alt="">

						<p>Author</p>
							
						<h6 class="sub-info">{{ $blog->User->name }}</h6>

						<span class="header-date">{{ $sc->tgl_indo($blog->created_at) }}</span>

						<span class="header-category">
							<?php for ( $i = 0; $i < count( $kategori_post ); $i++ ) {
								echo count( $kategori_post ) != $i + 1 ? $kategori_post[$i].", " : $kategori_post[$i];
							} ?>
						</span>

					</div>

				</div> <!-- end headline -->

			</div> <!-- end col-sm-10 -->

		</div>	<!-- end container -->
	</header>
	<!-- END HEADER -->

	<!-- BLOG SINGLE -->
	<section class="blog-single">
		
		<div class="container">

			<article class="h-entry">

				<div class="col-sm-12" style="padding:0 80px">

					<div class="col-sm-12">

					<br>
					{!! $blog->konten !!}

					</div>

				</div> <!-- end col-sm-8 -->



				<div class="col-sm-12" style="padding:0 80px">

					<div class="post-tag-wrap col-sm-8">
						
						<i class="fa fa-tag"></i>

						<span class="tag-list">
							<?php for ( $i = 0; $i < count( $kategori_post ); $i++ ) {
								echo count( $kategori_post ) != $i + 1 ? $kategori_post[$i]." ," : $kategori_post[$i];
							} ?>
						</span>

					</div>

					<!-- 

					<div class="social-icon col-sm-4">
				
						<ul>

							<li><a href="" target="_blank"><i class="fa fa-facebook"></i></a></li>
							<li><a href="" target="_blank"><i class="fa fa-twitter"></i></a></li>
							<li><a href="" target="_blank"><i class="fa fa-linkedin"></i></a></li>
												
						</ul>

					</div> 

					-->

				</div>	

			</article>


			<div class="post-hr col-sm-10 col-sm-offset-1 hidden-xs"></div>


			<div class="related-post-wrap col-sm-12">
				
				<h2 class="related-post-title">Postingan Terkait</h2>

				@foreach( $blog_lainnya as $bl )
				
					<div class="col-sm-4">
						
						<article class="h-entry">
						
							<figure class="featured-image">
								
								@if ( empty( $bl->gambar ) )
									<img src="{{ url('resources/assets/front') }}/img/blog-1.png" alt="{{ $bl->judul }}">
								@else
									<img src="{{ url('resources/assets/img') }}/{{ $bl->gambar }}" alt="{{ $bl->judul }}">
								@endif

							</figure> <!-- featured-image -->

							<div class="entry-text">
								
								<header class="entry-header">
								
									<h4 class="entry-title">
										
										<a href="{{ url('/blog') }}/{{ $bl->slug }}">{{ $bl->judul }}</a>

									</h4>

								</header> <!-- end entry-header -->

								<div class="entry-summary">
									
									{{ str_limit( strip_tags($bl->konten), 30 ) }}

								</div> <!-- entry-summary -->

								<div class="entry-meta">
									
									<span class="dt-published">{{ $sc->tgl_indo($bl->created_at) }}</span>
									
									<!-- <span class="u-category">
										
									</span>

									<span class="meta-line"></span> -->

								</div> <!-- end entry-meta -->

							</div> <!-- end entry-text -->

						</article> <!-- end h-entry -->

					</div> <!-- end col-sm-4 -->

				@endforeach

			</div> <!-- end related-post-wrap -->			

		</div><!-- end container -->
	
	</section>
	<!-- END BLOG SINGLE -->

@endsection