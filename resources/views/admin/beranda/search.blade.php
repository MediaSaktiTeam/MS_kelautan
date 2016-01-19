@extends('admin.layout.main')

@section('title')
	Pencarian
@endsection

@section('konten')

<ol class="breadcrumb bc-3">
	<li>
		<a href="{{ url('admin') }}">Beranda</a>
	</li>

	<li class="active">
		<strong>Pencarian</strong>
	</li>
</ol>
			

<section class="search-results-env">
	
	<div class="row">
		<div class="col-md-12">
						
			
			<!-- Search categories tabs -->
			<ul class="nav nav-tabs right-aligned">
				<li class="tab-title pull-left">
					<div class="search-string">{{ $Blogs->total() + $Pages->total() }} hasil ditemukan untuk: <strong>&ldquo;{{ $Cari }}&rdquo;</strong></div>
				</li>
				
				<li class="{{ $TabAktif == "blog" ? "active":"" }}">
					<a href="#" onclick="location.href='{{ route('pencarian', ['cari' => $Cari, 'TabAktif' => 'blog']) }}'">
						Berita
						<span class="disabled-text">({{ $Blogs->total() }})</span>
					</a>
				</li>
				<li class="{{ $TabAktif == "page" ? "active":"" }}">
					<a href="#" onclick="location.href='{{ route('pencarian', ['cari' => $Cari, 'TabAktif' => 'page']) }}'">
						Halaman
						<span class="disabled-text">({{ $Pages->total() }})</span>
					</a>
				</li>
			</ul>
			
			<!-- Search search form -->
			<form method="get" class="search-bar" action="{{ route('pencarian') }}" enctype="application/x-www-form-urlencoded">
				<input type="hidden" name="TabAktif" value="blog">
				<div class="input-group">
					<input type="text" value="{{ $Cari }}" class="form-control input-lg" name="cari" placeholder="Cari sesuatu...">
					
					<div class="input-group-btn">
						<button type="submit" class="btn btn-lg btn-primary btn-icon">
							Cari 
							<i class="entypo-search"></i>
						</button>
					</div>
				</div>
				
			</form>

			<!-- Search search form -->
			<div class="search-results-panes">
				
				<div class="search-results-pane {{ $TabAktif == "blog" ? "active":"" }}" id="blog">
					
					<ul class="search-results">
						
						@foreach( $Blogs as $Blog )

							<li class="search-result">
								<div class="sr-inner">
									<h4>
										<a href="{{ route('blog_edit', $Blog->id) }}">
											{{ $Blog->judul }}
											@if ( $Blog->arsip == 1 )
												<strong>&ldquo;Arsip&rdquo;</strong>
											@elseif ( $Blog->draft == 1 )
												<strong>&ldquo;Draft&rdquo;</strong>
											@endif

	

										</a>
									</h4>
									{!! nl2br(e(str_limit($Blog->konten, 300))) !!}
									<br>
									<a href="/blog/{{ $Blog->slug }}" target="_blank" class="link">Baca Selengkapnya</a>
								</div>
							</li>

						@endforeach

					</ul>
					
					<!-- Pager for search results -->					
					<ul class="pager">
						<li><a href="{{ $PrevBlog }}"><i class="entypo-left-thin"></i> Sebelumnya</a></li>
						<li><a href="{{ $NextBlog }}">Selanjutnya <i class="entypo-right-thin"></i></a></li>
					</ul>
				</div>
				
				<div class="search-results-pane {{ $TabAktif == "page" ? "active":"" }}" id="pages">
					
					<ul class="search-results">
					
						@foreach( $Pages as $Page )

							<li class="search-result">
								<div class="sr-inner">
									<h4>
										<a href="{{ route('page_edit', $Page->id) }}">{{ $Page->judul }}</a>
									</h4>
									{!! nl2br(e(str_limit($Page->konten, 300))) !!}
									<br>
									<a href="/page/{{ $Page->slug }}" target="_blank" class="link">Baca Selengkapnya</a>
								</div>
							</li>
						
						@endforeach
						
					</ul>
					
					<!-- Pager for search results -->					
					<ul class="pager">
						<li><a href="{{ $PrevPage }}"><i class="entypo-left-thin"></i> Sebelumnya</a></li>
						<li><a href="{{ $NextPage }}">Selanjutnya <i class="entypo-right-thin"></i></a></li>
					</ul>
				</div>
				
			</div>
			
		</div>
	</div>

</section>

@endsection