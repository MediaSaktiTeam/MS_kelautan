@extends('app.layout.main')

@section('title')
	Dinas Perikanan Bantaeng
@endsection



@section('konten')

<?php

$SC = new App\Custom;

?>
<!-- START PAGE-CONTAINER -->
<div class="page-container">

	<!-- START PAGE CONTENT WRAPPER -->
	<div class="page-content-wrapper">
		
		<!-- START PAGE CONTENT -->
		<div class="content sm-gutter">
			
			<!-- START CONTAINER FLUID -->
			<div class="container-fluid padding-25 sm-padding-10">
				
				<!-- START ROW -->
				<div class="row">
					<div class="col-md-6">
						
						<div class="row">
							<div class="col-md-12 m-b-10">
								<div class="ar-3-2 widget-1-wrapper">

									<!-- START WIDGET -->
									<div class="widget-1 panel no-border bg-complete no-margin widget-loader-circle-lg">
										<div class="panel-heading top-right ">
											<div class="panel-controls">
												<ul>
													<li><a data-toggle="refresh" class="portlet-refresh text-black" href="#"><i class="portlet-icon portlet-icon-refresh-lg-master"></i></a>
													</li>
												</ul>
											</div>
										</div>
										<div class="panel-body">
											<div class="pull-bottom bottom-left bottom-right">
												<span class="label font-montserrat fs-11">Hello</span>
												<br>
												<h2 class="text-white">Selamat Datang</h2>
												<p class="text-white hint-text">Aplikasi monitoring perikanan Bantaeng</p>
												<div class="row stock-rates m-t-15">
													<div class="company col-xs-4">
														<div>
															<p class="font-montserrat text-success no-margin fs-16">
																{{ $total_pembudidaya }}
																<span class="font-arial text-white fs-12 hint-text m-l-5">(Total)</span>
															</p>
															<p class="bold text-white no-margin fs-11 font-montserrat lh-normal">
																Pembudidaya
															</p>
														</div>
													</div>
													<div class="company col-xs-4">
														<div>
															<p class="font-montserrat text-success no-margin fs-16">
																{{ $total_nelayan }}
																<span class="font-arial text-white fs-12 hint-text m-l-5">(Total)</span>
															</p>
															<p class="bold text-white no-margin fs-11 font-montserrat lh-normal">
																Nelayan
															</p>
														</div>
													</div>
													<div class="company col-xs-4">
														<div>
															<p class="font-montserrat text-success no-margin fs-16">
																{{ $total_pengolah }}
																<span class="font-arial text-white fs-12 hint-text m-l-5">(Total)</span>
															</p>
															<p class="bold text-white no-margin fs-11 font-montserrat lh-normal">
																Pengolah
															</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- END WIDGET -->
								</div>
							</div>
						</div>
					</div>



					<div class="col-md-6">
						<div class="row">


							<div class="col-sm-12 m-b-10">
								<!-- START WIDGET -->
								<div class="panel  no-border no-margin widget-loader-circle">
									<div class="panel-heading">
										<div class="panel-title">
											<i class="pg-map"></i> Bantaeng, Indonesia
											<span class="caret"></span>
										</div>
										<div class="panel-controls">
											<ul>
												<li class="">
													<div class="dropdown">
														<a data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
															<i class="portlet-icon portlet-icon-settings"></i>
														</a>

													</div>
												</li>
												<li>
													<a data-toggle="refresh" class="portlet-refresh text-black" href="#"><i class="portlet-icon portlet-icon-refresh"></i></a>
												</li>
											</ul>
										</div>
									</div>
									<div class="panel-body">
										<div class="p-l-5">
											<div class="row">
												<div class="col-md-12">
													<div class="row m-t-20">
														<div class="col-md-5">
															<h4 class="no-margin">{{ $SC->hari_indo(date('l')) }}</h4>
															<p class="small hint-text">{{ $SC->hari_indo(date('l')) }}, {{ $SC->tgl_indo(date('Y-m-d')) }}</p>
														</div>
														<div class="col-md-7">
															<div class="pull-left">
																<p class="small hint-text no-margin">Suhu</p>
																<h4 class="text-danger bold no-margin">{{ $suhu_min }} - {{ $suhu_max }}°<span class="small">C</span></h4>
															</div>
															<div class="pull-right">
																<img src="http://www.bmkg.go.id/ImagesStatus/{{ $gambar }}.gif">
															</div>
														</div>
													</div>
													<h5> <span class="semi-bold"> {{ $cuaca }}</span></h5>
													<p>Informasi Cuaca</p>
													<div class="widget-17-weather">
														<div class="row">
															<div class="col-sm-6 p-r-10">
																<div class="row">
																	<div class="col-md-12">
																		<p class="pull-left">Kecepatan Angin</p>
																		<p class="pull-right bold">{{ $kecepatan_angin }} km/jam</p>
																	</div>
																</div>
																<div class="row">
																	<div class="col-md-12">
																		<p class="pull-left">Arah Angin</p>
																		<p class="pull-right bold">{{ $arah_angin }}</p>
																	</div>
																</div>
															</div>
															<div class="col-sm-6 p-l-10">
																<div class="row">
																	<div class="col-md-12">
																		<p class="pull-left">Kelembaban Minimal</p>
																		<p class="pull-right bold">{{ $kelembapan_min }}%</p>
																	</div>
																</div>
																<div class="row">
																	<div class="col-md-12">
																		<p class="pull-left">Kelembaban Maksimal</p>
																		<p class="pull-right bold">{{ $kelembapan_max }}%</p>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- END WIDGET -->

							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END CONTAINER FLUID -->
		</div>
		<!-- END PAGE CONTENT -->
		<!-- START COPYRIGHT -->
		<!-- START CONTAINER FLUID -->


		<div class="container-fluid container-fixed-lg footer">
			<div class="copyright sm-text-center">
				<p class="small no-margin pull-left sm-pull-reset">
					<span class="hint-text">Copyright © 2016 </span>
					<span class="font-montserrat">Media SAKTI</span>.
					<span class="hint-text">All rights reserved. </span>
					<span class="sm-block"><a href="#" class="m-l-10 m-r-10">Terms of use</a> | <a href="#" class="m-l-10">Privacy Policy</a></span>
				</p>
				<p class="small no-margin pull-right sm-pull-reset">
					<a href="#">Hand-crafted</a> <span class="hint-text">&amp; Made with Love ®</span>
				</p>
				<div class="clearfix"></div>
			</div>
		</div>
		<!-- END COPYRIGHT -->
	</div>
	<!-- END PAGE CONTENT WRAPPER -->

</div>
<!-- END PAGE CONTAINER -->
@endsection

@section('registerscript')
	<script>
		$(".menu-items .link-home").addClass("active");
	</script>
@endsection