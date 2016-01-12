
		<!-- BEGIN SIDEBPANEL-->
		<nav class="page-sidebar" data-pages="sidebar">
			<!-- BEGIN SIDEBAR MENU TOP TRAY CONTENT-->
			<div class="sidebar-overlay-slide from-top" id="appMenu">
				<div class="row">
					<div class="col-xs-6 no-padding">
						<a href="#" class="p-l-40"><img src="{{ url('resources/assets/app/img/demo/social_app.svg') }}" alt="socail">
						</a>
					</div>
					<div class="col-xs-6 no-padding">
						<a href="#" class="p-l-10"><img src="{{ url('resources/assets/app/img/demo/email_app.svg') }}" alt="socail">
						</a>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-6 m-t-20 no-padding">
						<a href="#" class="p-l-40"><img src="{{ url('resources/assets/app/img/demo/calendar_app.svg') }}" alt="socail">
						</a>
					</div>
					<div class="col-xs-6 m-t-20 no-padding">
						<a href="#" class="p-l-10"><img src="{{ url('resources/assets/app/img/demo/add_more.svg') }}" alt="socail">
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
					<li class="link-pembudidaya">
						<a href="/app/pembudidaya"><span class="title">Pembudidaya</span></a>
						<span class="icon-thumbnail">P</span>
					</li>
					<li class="link-nelayan">
						<a href="/app/nelayan"><span class="title">Nelayan</span></a>
						<span class="icon-thumbnail">N</span>
					</li>
					<li class="link-pengolah">
						<a href="/app/pengolah"><span class="title">Pengolah</span></a>
						<span class="icon-thumbnail">Pl</span>
					</li>
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
							<li class="sub-saranapembudidaya">
								<a href="/app/master/sarana-pembudidaya">Sarana Pembudidaya</a>
								<span class="icon-thumbnail">SP</span>
							</li>
							<li class="sub-sarananelayan">
								<a href="/app/master/sarana-nelayan">Sarana Nelayan</a>
								<span class="icon-thumbnail">SN</span>
							</li>
							<li class="sub-jenis">
								<a href="/app/master/usaha">Usaha</a>
								<span class="icon-thumbnail">U</span>
							</li>
							<li class="sub-jabatan">
								<a href="/app/master/jabatan">Jabatan</a>
								<span class="icon-thumbnail">J</span>
							</li>
						</ul>
					</li>
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

				<a href="#" class="search-link" data-toggle="search"><i class="pg-search"></i>Ketik apa saja untuk <span class="bold">mencari</span></a>
			</div>
		</div>

		<div class=" pull-right">
			<!-- START User Info-->
			<div class="visible-lg visible-md m-t-10">
				<div class="pull-left p-r-10 p-t-10 fs-16 font-heading">
					<span class="text-master">{{ $user->name }}</span>
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