
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

				<!-- START NOTIFICATION LIST -->
				<ul class="notification-list no-margin hidden-sm hidden-xs b-grey b-l b-r no-style p-l-30 p-r-20">
					<li class="p-r-15 inline">
						<div class="dropdown">
							<a href="javascript:;" id="notification-center" class="icon-set globe-fill" data-toggle="dropdown">
								<span class="bubble"></span>
							</a>

							<!-- START Notification Dropdown -->
							<div class="dropdown-menu notification-toggle" role="menu" aria-labelledby="notification-center">

								<!-- START Notification -->
								<div class="notification-panel">

									<!-- START Notification Body-->
									<div class="notification-body scrollable">

										<!-- START Notification Item-->
										<div class="notification-item unread clearfix">

											<!-- START Notification Item-->
											<div class="heading open">
												<a href="#" class="text-complete">
													<i class="pg-map fs-16 m-r-10"></i>
													<span class="bold">Carrot Design</span>
													<span class="fs-12 m-l-10">David Nester</span>
												</a>
												<div class="pull-right">
													<div class="thumbnail-wrapper d16 circular inline m-t-15 m-r-10 toggle-more-details">
														<div><i class="fa fa-angle-left"></i>
														</div>
													</div>
													<span class=" time">few sec ago</span>
												</div>
												<div class="more-details">
													<div class="more-details-inner">
														<h5 class="semi-bold fs-16">“Apple’s Motivation - Innovation <br>distinguishes between <br>A leader and a follower.”</h5>
														<p class="small hint-text">
															Commented on john Smiths wall.
															<br> via pages framework.
														</p>
													</div>
												</div>
											</div>
											<!-- END Notification Item -->
											<!-- START Notification Item Right Side -->

											<div class="option" data-toggle="tooltip" data-placement="left" title="mark as read">
												<a href="#" class="mark"></a>
											</div>
											<!-- END Notification Item Right Side-->

										</div>
										<!-- START Notification Body-->
										<!-- START Notification Item-->

										<div class="notification-item  clearfix">
											<div class="heading">
												<a href="#" class="text-danger">
													<i class="fa fa-exclamation-triangle m-r-10"></i>
													<span class="bold">98% Server Load</span>
													<span class="fs-12 m-l-10">Take Action</span>
												</a>
												<span class="pull-right time">2 mins ago</span>
											</div>

											<!-- START Notification Item Right Side-->
											<div class="option">
												<a href="#" class="mark"></a>
											</div>
											<!-- END Notification Item Right Side-->

										</div>
										<!-- END Notification Item-->
										<!-- START Notification Item-->

										<div class="notification-item  clearfix">
											<div class="heading">
												<a href="#" class="text-warning-dark">
													<i class="fa fa-exclamation-triangle m-r-10"></i>
													<span class="bold">Warning Notification</span>
													<span class="fs-12 m-l-10">Buy Now</span>
												</a>
												<span class="pull-right time">yesterday</span>
											</div>

											<!-- START Notification Item Right Side-->
											<div class="option">
												<a href="#" class="mark"></a>
											</div>
											<!-- END Notification Item Right Side-->

										</div>
										<!-- END Notification Item-->
										<!-- START Notification Item-->

										<div class="notification-item unread clearfix">
											<div class="heading">
												<div class="thumbnail-wrapper d24 circular b-white m-r-5 b-a b-white m-t-10 m-r-10">
													<img width="30" height="30" data-src-retina="{{ url('resources/assets/app/img/profiles/1x.jpg') }}" data-src="{{ url('resources/assets/app/img/profiles/1.jpg') }}" alt="" src="{{ url('resources/assets/app/img/profiles/1.jpg') }}">
												</div>
												<a href="#" class="text-complete">
													<span class="bold">Revox Design Labs</span>
													<span class="fs-12 m-l-10">Owners</span>
												</a>
												<span class="pull-right time">11:00pm</span>
											</div>

											<!-- START Notification Item Right Side-->
											<div class="option" data-toggle="tooltip" data-placement="left" title="mark as read">
												<a href="#" class="mark"></a>
											</div>
											<!-- END Notification Item Right Side-->

										</div>
										<!-- END Notification Item-->

									</div>
									<!-- END Notification Body-->
									<!-- START Notification Footer-->

									<div class="notification-footer text-center">
										<a href="#" class="">Read all notifications</a>
										<a data-toggle="refresh" class="portlet-refresh text-black pull-right" href="#">
											<i class="pg-refresh_new"></i>
										</a>
									</div>
									<!-- START Notification Footer-->

								</div>
								<!-- END Notification -->

							</div>
							<!-- END Notification Dropdown -->

						</div>

					</li>
				</ul>
				<!-- END NOTIFICATIONS LIST -->

				<a href="#" class="search-link" data-toggle="search"><i class="pg-search"></i>Ketik apa saja untuk <span class="bold">mencari</span></a>
			</div>
		</div>

		<div class=" pull-right">
			<!-- START User Info-->
			<div class="visible-lg visible-md m-t-10">
				<div class="pull-left p-r-10 p-t-10 fs-16 font-heading">
					<span class="bold">Gifa</span> <span class="text-master">Eriyanto</span>
				</div>
				<div class="dropdown pull-right">
					<button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<span class="thumbnail-wrapper d32 circular inline m-t-5">
							<img src="{{ url('resources/assets/app/img/profiles/avatar.jpg') }}" alt="" data-src="{{ url('resources/assets/app/img/profiles/avatar.jpg') }}" data-src-retina="{{ url('resources/assets/app/img/profiles/avatar_small2x.jpg') }}" width="32" height="32">
						</span>
					</button>
					<ul class="dropdown-menu profile-dropdown" role="menu">
						<li><a href="#"><i class="pg-settings_small"></i> Pengaturan Akun</a></li>
						<li><a href="#"><i class="pg-signals"></i> Bantuan</a></li>
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