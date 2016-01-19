<!DOCTYPE html>
<html lang="id">
<head>

	<title>@yield('title')</title>

	@include('admin.layout.partials.meta')

</head>

<!-- <body class="page-body page-fade-only"> -->
<body>

<div class="page-container">

		@include('admin.layout.partials.header')

		<div class="main-content">
			<div class="row">
				<div class="col-sm-12 clearfix">
					<ul class="user-info pull-right">
					
						<!-- Profile Info -->
						<li class="profile-info dropdown"><!-- add class "pull-right" if you want to place this from right -->
							
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="{{ url('resources/assets/admin/images/thumb-1@2x.png') }}" alt="" class="img-circle" width="44" />
								{{ Auth::User()->name }}
							</a>
							
							<ul class="dropdown-menu pull-right">
								
								<!-- Reverse Caret -->
								<li class="caret"></li>
								
								<!-- Profile sub-links -->
								<li>
									<a href="{{ route('user_pengaturan') }}">
										<i class="entypo-user"></i>
										Pengaturan Akun
									</a>
								</li>
								
								<li>
									<a href="{{ url('admin/logout') }}">
										<i class="entypo-logout"></i>
										Keluar
									</a>
								</li>
							</ul>
						</li>
					
					</ul>

					<ul class="user-info pull-left pull-none-xsm">
						
						<!-- Raw Notifications -->
						<li class="notifications dropdown">
							
							<?php $CountPesanBaru = App\Pesan::where('baru',1)->count(); ?>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
								<i class="entypo-mail"></i>
								@if ( $CountPesanBaru > 0 )
									<span class="badge badge-info badge-pesan">{{ $CountPesanBaru }}</span>
								@endif
							</a>
							
							<ul class="dropdown-menu">

								<?php $Pesan = App\Pesan::take(5)->orderBy('baru','asc')->orderBy('id','desc')->get(); ?>
								<?php $CountPesan = App\Pesan::all()->count(); ?>

								@if ( $CountPesan > 0 )

									<li class="top">
										<p class="small">
											@if ( $CountPesanBaru > 0 )
												<a href="javascript:;" class="pull-right telah-dibaca">Tandai semua telah dibaca</a>
												Anda mempunyai <strong>{{ $CountPesanBaru }}</strong> pesan baru.
											@else
												Semua pesan telah dibaca
											@endif
										</p>
									</li>

									@foreach( $Pesan as $Pes )
										<li>
											<ul class="dropdown-menu-list scroller">
												<li class="notification-{{ $Pes->baru == 1 ? "info":"success" }}">
													<a href="{{ route('pesan_detail',['id' => $Pes->id, 'jenis' => 'Masuk']) }}">
														<i class="entypo-{{ $Pes->baru == 1 ? "mail":"check" }} pull-right"></i>
														
														<span class="line" style="{{ $Pes->baru == 1 ? "font-weight:700":"" }}">
															Pesan dari: {{ $Pes->nama }} <small>({{ $Pes->email }})</small>
														</span>
														
														<span class="line small">
															<?php $CC = new App\Custom; ?>
															<?php $WaktuMasuk = $CC->waktu_lalu($Pes->created_at); ?>
															{{ $WaktuMasuk }}
														</span>
													</a>
												</li>
												
											</ul>
										</li>
									@endforeach

								@else

									<li class="top">
										<p class="small">
											Belum ada pesan
										</p>
									</li>

								@endif

								<li class="external">
									<a href="{{ route('pesan') }}">Lihat Semua Pesan</a>
								</li>
							</ul>
						
						</li>
				
					</ul>

				</div>

			</div>

			<hr>
			
			@yield('konten')

			@include('admin.layout.partials.footer')
			
		</div><!-- /main-content -->

</div><!-- /page-container -->

@include('admin.layout.partials.bottom-script')

</body>
</html>

