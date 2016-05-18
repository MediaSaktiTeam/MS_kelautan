<?php
	$Ms = new App\Custom;
	// Default value of date filter on produksi
	$sql = App\Produksi::orderBy('id', 'desc')->first();

	if ( $sql ) {

		$limit1 = date_format(date_create($sql->created_at), "Y-m-d");
		$limit = strtotime("$limit1 +1 day");
		$limit = date("Y-m-d", $limit);

		$offset = strtotime("$limit1 -3 months");
		$offset = date("Y-m-d", $offset);

	} else {
		$offset = date('Y-m-d');
		$limit = strtotime("$offset +3 months");
		$limit = date("Y-m-d", $limit);
	}
	
?>
		<!-- BEGIN SIDEBPANEL-->
		<nav class="page-sidebar" data-pages="sidebar">
			<!-- BEGIN SIDEBAR MENU TOP TRAY CONTENT-->
			<div class="sidebar-overlay-slide from-top" id="appMenu">
				<div class="row">
					<div class="col-xs-6 no-padding">
						<a href="/" target="_blank" class="p-l-40"><img src="{{ url('resources/assets/app/img/modules/2.jpg') }}" alt="Front Site" width="83px">
						</a>
					</div>
					<div class="col-xs-6 no-padding">
						<a href="/admin" class="p-l-10"><img src="{{ url('resources/assets/app/img/modules/1.jpg') }}" alt="Content Management System" width="83px">
						</a>
					</div>
				</div>
			</div>
			<!-- END SIDEBAR MENU TOP TRAY CONTENT-->

			<!-- BEGIN SIDEBAR MENU HEADER-->
			<div class="sidebar-header">
				<a href="/app/"><img src="{{ url('resources/assets/app/img/logo_white.png') }}" alt="logo" class="brand" data-src="{{ url('resources/assets/app/img/logo_white.png') }}" data-src-retina="{{ url('resources/assets/app/img/logo_white_2x.png') }}" height="32"></a>
				<div class="sidebar-header-controls">
					<button type="button" class="btn btn-xs sidebar-slide-toggle btn-link m-l-20" data-pages-toggle="#appMenu"><i class="fa fa-angle-down fs-16"></i></button>
					<button type="button" class="btn btn-link visible-lg-inline" data-toggle-pin="sidebar"><i class="fa fs-12"></i></button>
				</div>
			</div>
			<!-- END SIDEBAR MENU HEADER-->
			
			<!-- START SIDEBAR MENU -->
			<div class="sidebar-menu">
				<!-- BEGIN SIDEBAR MENU ITEMS-->
				<ul class="menu-items">
					<li class="m-t-30 link-home">
						<a href="/app/beranda"><span class="title">Beranda</span></a>

						<span class="icon-thumbnail"><i class="pg-home"></i></span>
					</li>

					@if ( Permissions::pembudidaya() )
						<li class="link-pembudidaya">
							<a href="javascript:;"><span class="title">Pembudidaya</span>
							<span class=" arrow"></span></a>
							<span class="icon-thumbnail">P</span>
							<ul class="sub-menu">
								@if ( Permissions::pembudidaya() )
								<li class="sub-pembudidaya">
									<a href="/app/pembudidaya">Daftar Pembudidaya</a>
									<span class="icon-thumbnail">DP</span>
								</li>
								
								<li class="sub-produksi">
									<a href="/app/produksi?offset={{ $offset }}&limit={{ $limit }}&pr={{ $Ms->enk('Pembudidaya') }}">Produksi</a>
									<span class="icon-thumbnail">PR</span>
								</li>
								<li class="sub-pemasar">

								<li class="sub-laporan-produksi">
									<a href="javascript:;">Laporan Produksi <span class=" arrow"></span></a>
									<span class="icon-thumbnail">LP</span>
									<ul class="sub-menu">
										<li class="sub-airtawar">
											<a href="/app/airtawar">Air Tawar</a>
											<span class="icon-thumbnail">AT</span>
										</li>
										<li class="sub-rumputlaut">
											<a href="/app/rumputlaut">Rumput Laut</a>
											<span class="icon-thumbnail">RL</span>
										</li>
										<li class="sub-tambak">
											<a href="/app/tambak">Tambak</a>
											<span class="icon-thumbnail">T</span>
										</li>
									</ul>
								</li>
								@endif
							</ul>
						</li>
					@endif

					@if ( Permissions::nelayan() )

						<li class="link-nelayan">
							<a href="javascript:;"><span class="title">Nelayan</span>
							<span class=" arrow"></span></a>
							<span class="icon-thumbnail">N</span>
							<ul class="sub-menu">

								<li class="sub-nelayan">
									<a href="/app/nelayan"><span class="title">Daftar Nelayan</span></a>
									<span class="icon-thumbnail">N</span>
								</li>
								<li class="sub-produksi">
									<a href="/app/produksi?offset={{ $offset }}&limit={{ $limit }}&pr={{ $Ms->enk('Nelayan') }}">Produksi</a>
									<span class="icon-thumbnail">PR</span>
								</li>
							</ul>
						</li>

					@endif

				<!-- 	@if ( Permissions::pengolah() )
						<li class="link-pengolah">
							<a href="/app/pengolah"><span class="title">Pengolah</span></a>
							<span class="icon-thumbnail">Pl</span>
						</li>
					@endif -->

					
					@if ( Permissions::pengolah() )
						<li class="link-pengolah">
							<a href="javascript:;"><span class="title">Pengolah</span>
							<span class=" arrow"></span></a>
							<span class="icon-thumbnail">PL</span>
							<ul class="sub-menu">
								<li class="sub-pengolah">
									<a href="/app/pengolah">Daftar Pengolah</a>
									<span class="icon-thumbnail">DP</span>
								</li>
								<li class="sub-pemasar">
									<a href="/app/pemasar">Pemasar</a>
									<span class="icon-thumbnail">PS</span>
								</li>
								<li class="sub-produksi">
									<a href="/app/produksi?offset={{ $offset }}&limit={{ $limit }}&pr={{ $Ms->enk('Pengolah') }}">Produksi</a>
									<span class="icon-thumbnail">M</span>
								</li>
							</ul>
						</li>
					@endif
					
					@if ( Permissions::pesisir() )
					<li class="link-pesisir">
							<a href="javascript:;"><span class="title">Pesisir</span>
							<span class=" arrow"></span></a>
							<span class="icon-thumbnail">PS</span>
							<ul class="sub-menu">
								<li class="sub-mangrove">
									<a href="javascript:;"><span class="title">Lahan Mangrove</span>
									<span class="arrow"></span></a>
									<span class="icon-thumbnail">LM</span>
									<ul class="sub-menu">
										<li class="sub-mangrove-milik">
											<a href="/app/mangrove/milik">Dimiliki</a>
											<span class="icon-thumbnail">DM</span>
										</li>
										<li class="sub-mangrove-rehabilitasi">
											<a href="/app/mangrove/rehabilitasi">Direhabilitasi</a>
											<span class="icon-thumbnail">DR</span>
										</li>
										<li class="sub-mangrove-jenis">
											<a href="/app/mangrove/jenis">Jenis Mangrove</a>
											<span class="icon-thumbnail">JM</span>
										</li>
									</ul>
								</li>
								<li class="sub-terumbu">
									<a href="javascript:;"><span class="title">Terumbu Karang</span>
									<span class="arrow"></span></a>
									<span class="icon-thumbnail">TK</span>
									<ul class="sub-menu">
										<li class="sub-terumbu-milik">
											<a href="/app/terumbu/milik">Dimiliki</a>
											<span class="icon-thumbnail">DM</span>
										</li>
										<li class="sub-terumbu-rehabilitasi">
											<a href="/app/terumbu/rehabilitasi">Direhabilitasi</a>
											<span class="icon-thumbnail">DR</span>
										</li>
										<li class="sub-terumbu-jenis">
											<a href="/app/terumbu/jenis">Jenis Ikan</a>
											<span class="icon-thumbnail">JI</span>
										</li>
									</ul>
								</li>
								<li class="sub-jumlah-penduduk">
									<a href="/app/jumlah-penduduk"><span class="title">Jumlah Penduduk</span></a>
									<span class="icon-thumbnail">JP</span>
								</li>
							</ul>
						</li>
					@endif
					
					<li class="link-kelompok">
						<a href="/app/kelompok"><span class="title">Kelompok</span></a>
						<span class="icon-thumbnail">K</span>
					</li>

					<li class="link-bantuan">
						<a href="/app/bantuan"><span class="title">Bantuan</span></a>
						<span class="icon-thumbnail">B</span>
					</li>

					<li class="link-master">
						<a href="javascript:;"><span class="title">Master</span>
						<span class=" arrow"></span></a>
						<span class="icon-thumbnail"><i class="fs-14 pg-cupboard"></i></span>
						<ul class="sub-menu">
							<li class="sub-bantuan">
								<a href="/app/master/bantuan">Bantuan</a>
								<span class="icon-thumbnail">Bn</span>
							</li>
							@if ( Permissions::admin() )
							<li class="sub-lokasi">
								<a href="/app/master/lokasi">Lokasi</a>
								<span class="icon-thumbnail">L</span>
							</li>
							<li class="sub-laporan">
								<a href="/app/master/laporan">Laporan</a>
								<span class="icon-thumbnail">L</span>
							</li>
							@endif

							@if ( Permissions::pembudidaya() )
								<li class="sub-saranapembudidaya">
									<a href="/app/master/sarana-pembudidaya">Sarana Pembudidaya</a>
									<span class="icon-thumbnail">SP</span>
								</li>
							@endif

							@if ( Permissions::nelayan() )
								<li class="sub-sarananelayan">
									<a href="/app/master/sarana-nelayan">Sarana Nelayan</a>
									<span class="icon-thumbnail">SN</span>
								</li>
							@endif

							@if ( Permissions::pengolah() )
								<li class="sub-saranapengolah">
									<a href="javascript:;"><span class="title">Sarana Pengolah</span><span class=" arrow"></span></a>
									<span class="icon-thumbnail">SP</span>
									<ul class="sub-menu">
										<li class="sub-sarana">
											<a href="/app/master/sarana-pengolah">Sarana</a>
											<span class="icon-thumbnail">S</span>
										</li>
										<li class="sub-jenisolahan">
											<a href="/app/master/jenisolahan">Jenis Olahan</a>
											<span class="icon-thumbnail">J</span>
										</li>
										<li class="sub-merekdagang">
											<a href="/app/master/merekdagang">Merek Dagang</a>
											<span class="icon-thumbnail">M</span>
										</li>
									</ul>
								</li>
							@endif

							@if ( Permissions::pembudidaya() )
								<li class="sub-usaha">
									<a href="/app/master/usaha">Usaha</a>
									<span class="icon-thumbnail">U</span>
								</li>
							@endif
							<!-- <li class="sub-jabatan">
								<a href="/app/master/jabatan">Jabatan</a>
								<span class="icon-thumbnail">J</span>
							</li> -->
						</ul>
					</li>

					<li class="link-statistik">
						<a href="/app/statistik?tahun={{ date('Y') }}"><span class="title">Statistik</span></a>
						<span class="icon-thumbnail">S</span>
					</li>

					@if ( Permissions::admin() )

					<li class="link-administrator">
						<a href="/app/administrator"><span class="title">Administrator</span></a>
						<span class="icon-thumbnail">A</span>
					</li>

					@endif

					<li class="link-pengaturan">
						<a href="/app/pengaturan"><span class="title">Pengaturan</span></a>
						<span class="icon-thumbnail"><i class="fa fa-cog"></i></span>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<!-- END SIDEBAR MENU -->
		</nav>
		<!-- END SIDEBAR -->
		<!-- END SIDEBPANEL-->







		<!-- START HEADER -->
	<div class="header ">

		<!-- START MOBILE CONTROLS -->
		
		<!-- LEFT SIDE -->
		<div class="pull-left full-height visible-sm visible-xs">
			
			<!-- START ACTION BAR -->
			<div class="sm-action-bar">
				<a href="#" class="btn-link toggle-sidebar" data-toggle="sidebar">
					<span class="icon-set menu-hambuger"></span>
				</a>
			</div>
			<!-- END ACTION BAR -->
		
		</div>
		

		<!-- RIGHT SIDE -->
		<div class="pull-right full-height visible-sm visible-xs">
			<!-- START ACTION BAR -->
			<div class="sm-action-bar">
				<a href="#" class="btn-link" data-toggle="quickview" data-toggle-element="#quickview">
					<span class="icon-set menu-hambuger-plus"></span>
				</a>
			</div>
			<!-- END ACTION BAR -->
		</div>
		<!-- END MOBILE CONTROLS -->
		

		<div class=" pull-left sm-table">
			<div class="header-inner">
				<div class="brand inline m-l-25">
					<a href="/app/"><img src="{{ url('resources/assets/app/img/logo.png') }}" alt="logo" data-src="{{ url('resources/assets/app/img/logo.png') }}" data-src-retina="{{ url('resources/assets/app/img/logo_2x.png') }}" height="32"></a>
				</div>
			</div>
		</div>

		<div class=" pull-right">
			<!-- START User Info-->
			<div class="visible-lg visible-md m-t-10">
				<div class="pull-left p-r-10 p-t-10 fs-16 font-heading">
					<span class="text-master">{{ Auth::user()->name }}</span>
				</div>
				<div class="dropdown pull-right">
					<button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<span class="thumbnail-wrapper d32 circular inline m-t-5">
							<img src="{{ url('resources/assets/app/img/profiles/avatar.jpg') }}" alt="" data-src="{{ url('resources/assets/app/img/profiles/avatar.jpg') }}" data-src-retina="{{ url('resources/assets/app/img/profiles/avatar_small2x.jpg') }}" width="32" height="32">
						</span>
					</button>
					<ul class="dropdown-menu profile-dropdown" role="menu">
						<li><a href="/app/pengaturan"><i class="pg-settings_small"></i> Pengaturan Akun</a></li>
						<li><a href="#" data-toggle="modal" data-target="#modal-help"><i class="pg-signals"></i> Laporkan Masalah</a></li>
						<li class="bg-master-lighter">
							<a href="{{ url('/app/logout') }}" class="clearfix">
								<span class="pull-left">Logout</span>
								<span class="pull-right"><i class="pg-power"></i></span>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<!-- END User Info-->
		</div>

	</div>
	<!-- END HEADER -->