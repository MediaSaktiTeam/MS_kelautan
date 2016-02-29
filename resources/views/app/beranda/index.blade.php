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
					<div class="col-md-6 col-xlg-5">
						
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



						<div class="row">
							<div class="col-sm-12 m-b-10">
								<div class="ar-2-1 h-625">
									<!-- START WIDGET -->
									<div class="widget-11-2 panel no-border panel-condensed no-margin widget-loader-circle">
										<div class="panel-heading top-right">
											<div class="panel-controls">
												<ul>
													<li><a data-toggle="refresh" class="portlet-refresh text-black" href="#"><i class="portlet-icon portlet-icon-refresh"></i></a>
													</li>
												</ul>
											</div>
										</div>
										<div class="padding-25">
											<div class="pull-left">
												<h2 class="text-success no-margin">Daftar Harga Ikan</h2>
												<p class="no-margin">Jualan Hari ini</p>
											</div>
											<h3 class="pull-right semi-bold">36 jualan</h3>
											<div class="clearfix"></div>
										</div>
										<div class="auto-overflow widget-11-2-table h-450">
											<table class="table table-condensed table-hover">
												<tbody>
													<?php for ($i=0; $i < 10; $i++) { ?>
													<tr>
														<td class="font-montserrat all-caps fs-12 col-lg-6">Ikan Cakalang #2345</td>
														<td class="text-right hidden-lg">
															<span class="hint-text small">dewdrops</span>
														</td>
														<td class="text-right b-r b-dashed b-grey col-lg-3">
														</td>
														<td class="col-lg-3">
															<span class="font-montserrat fs-18"><sup>Rp</sup> &nbsp;27.000,-</span>
														</td>
													</tr>
													<?php } ?>
												</tbody>
											</table>
										</div>
										<div class="padding-25">
											<p class="small no-margin">
												<a href="#"><i class="fa fs-16 fa-arrow-circle-o-down text-success m-r-10"></i></a>
												<span class="hint-text ">Lihat selengkapnya</span>
											</p>
										</div>
									</div>
									<!-- END WIDGET -->
								</div>
							</div>

						</div>
					</div>



					<div class="col-md-6 col-xlg-4">
						<div class="row">
							<div class="col-sm-6 m-b-10">
								<div class="ar-1-1">
									<!-- START WIDGET -->
									<div class="widget-2 panel no-border bg-primary widget widget-loader-circle-lg no-margin">
										<div class="panel-heading">
											<div class="panel-controls">
												<ul>
													<li><a href="#" class="portlet-refresh" data-toggle="refresh"><i class="portlet-icon portlet-icon-refresh-lg-white"></i></a>
													</li>
												</ul>
											</div>
										</div>
										<div class="panel-body">
											<div class="pull-bottom bottom-left bottom-right padding-25">
												<span class="label font-montserrat fs-11">Jualan</span>
												<br>
												<h3 class="text-white">Ikan Cakalang</h3>
												<p><a href="" class="text-white hint-text hidden-md">Selengkapnya</a></p>
											</div>
										</div>
									</div>
									<!-- END WIDGET -->
								</div>
							</div>



							<div class="col-sm-6 m-b-10">
								<div class="ar-1-1">
									<!-- START WIDGET -->
									<div class="widget-3 panel no-border bg-complete no-margin widget-loader-bar">
										<div class="panel-body no-padding">
											<div class="metro live-tile" data-mode="carousel" data-start-now="true" data-delay="3000">
												
												<?php $r = App\Page::where('judul', 'LIKE', '%visi%')->first() ?>
												<div class="slide-front tiles slide active">
													<div class="padding-30">
														<div class="pull-top">
															<div class="pull-left visible-lg visible-xlg f-z-30">
																<i class="fa fa-newspaper-o"></i>
															</div>
															<div class="pull-right">
																<ul class="list-inline">
																	<li>
																		<a href="{{ url('/page') }}/{{ $r->slug }}" class="widget-3-fav no-decoration">Read</a>
																	</li>
																</ul>
															</div>
															<div class="clearfix"></div>
														</div>
														<div class="pull-bottom p-b-30">
															<p class="p-t-10 fs-12 p-b-5 hint-text">{{ $SC->tgl_indo($r->created_at) }}</p>
															<h3 class="no-margin text-white p-b-10 p-r-30">{{ $r->judul }}</h3>
														</div>
													</div>
												</div>

												<?php $r = App\Blog::orderBy('id', 'desc')->first() ?>
												<div class="slide-back tiles">
													<div class="padding-30">
														<div class="pull-top">
															<div class="pull-left visible-lg visible-xlg f-z-30">
																<i class="fa fa-newspaper-o"></i>
															</div>
															<div class="pull-right">
																<ul class="list-inline">
																	<li>
																		<a href="{{ url('/blog') }}/{{ $r->slug }}" class="widget-3-fav no-decoration">Read</a>
																	</li>
																</ul>
															</div>
															<div class="clearfix"></div>
														</div>
														<div class="pull-bottom p-b-30">
															<p class="p-t-10 fs-12 p-b-5 hint-text">{{ $SC->tgl_indo($r->created_at) }}</p>
															<h3 class="no-margin text-white p-b-10 p-r-30">{{ $r->judul }}
																<br>
																<span class="semi-bold">Berita</span>
															</h3>
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
						<div class="row">
							<div class="col-sm-6 m-b-10">
								<div class="ar-1-1">
									<!-- START WIDGET -->
									<div class="widget-7 panel no-border bg-success no-margin">
										<div class="panel-body no-padding">
											<div class="metro live-tile " data-delay="3500" data-mode="carousel">
												<div class="tiles">
													<div class="padding-30">
														<div class="pull-top">
															<div class="pull-left visible-lg visible-xlg f-z-30">
																<i class="fa fa-database"></i>
															</div>
															<div class="clearfix"></div>
														</div>
														<div class="pull-bottom p-b-30 bottom-right bottom-left p-l-30 p-r-30">
															<h5 class="no-margin p-b-5 bold text-white">DISK SPACE</h5>
															<hr>
															<p>
																<span class="no-margin text-white">Total : <b>{{ $SC->show_disk_space() }}</b></span>
																&nbsp;&nbsp;&nbsp;&nbsp;
																<span class="no-margin text-white">Used : <b>{{ $SC->show_use_space() }}</b></span>
															</p>
															<?php

																$free_disk_space = explode(" ", $SC->show_free_space());

															?> 
															<h3 class="semi-bold text-white">Free <b>{{ $free_disk_space[0] }}</b> GB</h3>
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


							<div class="col-sm-6 m-b-10">
								<div class="ar-1-1">
									<!-- START WIDGET -->
									<!-- <div class="panel no-border bg-master widget widget-6 widget-loader-circle-lg no-margin weather-sunny"> -->
									<div class="panel no-border bg-master widget widget-6 widget-loader-circle-lg no-margin" style="background: url('http://www.bmkg.go.id/ImagesStatus/{{ $gambar }}.gif');background-size:cover">
										<div class="panel-heading">
											<div class="panel-controls">
												<ul>
													<li><a data-toggle="refresh" class="portlet-refresh" href="#"><i class="portlet-icon portlet-icon-refresh-lg-white"></i></a>
													</li>
												</ul>
											</div>
										</div>
										<div class="panel-body">
											<div class="pull-bottom bottom-left bottom-right padding-25">
												<h1 class="text-white semi-bold">{{ $suhu_min }} - {{ $suhu_max }}&#176;</h1>
												<span class="label font-montserrat fs-11">Hari ini</span>
												<p class="text-white m-t-20">{{ $cuaca }}</p>
												<p class="text-white hint-text m-t-30">{{ $SC->hari_indo(date('l')) }}, {{ $SC->tgl_indo(date('Y-m-d')) }}
												</p>
											</div>
										</div>
									</div>
									<!-- END WIDGET -->
								</div>
							</div>


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
												<div class="col-md-12 col-xlg-6">
													<div class="row m-t-20">
														<div class="col-md-5">
															<h4 class="no-margin">{{ $SC->hari_indo(date('l')) }}</h4>
															<p class="small hint-text">{{ $SC->hari_indo(date('l')) }}, {{ $SC->tgl_indo(date('Y-m-d')) }}</p>
														</div>
														<div class="col-md-7">
															<div class="pull-left">
																<p class="small hint-text no-margin">Suhu</p>
																<h4 class="text-danger bold no-margin">{{ $suhu_max }}°<span class="small">/ {{ $suhu_min }}C</span></h4>
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
												<div class="col-xlg-6 visible-xlg">
													<div class="row">
														<div class="forecast-day col-md-6 text-center m-t-10 ">
															<div class="bg-master-lighter p-b-10 p-t-10">
																<h4 class="p-t-10 no-margin">Tuesday</h4>
																<p class="small hint-text m-b-20">11th Augest 2014</p>
																<canvas class="rain" width="64" height="64"></canvas>
																<h5 class="text-danger">32°</h5>
																<p>Feels like
																	<span class="bold">sunny</span>
																</p>
																<p class="small">Wind
																	<span class="bold p-l-20">11km/h</span>
																</p>
																<div class="m-t-20 block">
																	<div class="padding-10">
																		<div class="row">
																			<div class="col-md-6 text-center">
																				<p class="small">Noon</p>
																				<canvas class="sleet" width="25" height="25"></canvas>
																				<p class="text-danger bold">30°C</p>
																			</div>
																			<div class="col-md-6 text-center">
																				<p class="small">Night</p>
																				<canvas class="wind" width="25" height="25"></canvas>
																				<p class="text-danger bold">30°C</p>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-md-6 text-center m-t-10 ">
															<div class="bg-master-lighter p-b-10 p-t-10">
																<h4 class="p-t-10 no-margin">Wednesday</h4>
																<p class="small hint-text m-b-20">11th Augest 2014</p>
																<canvas class="rain" width="64" height="64"></canvas>
																<h5 class="text-danger">32°</h5>
																<p>Feels like
																	<span class="bold">sunny</span>
																</p>
																<p class="small">Wind
																	<span class="bold p-l-20">11km/h</span>
																</p>
																<div class="m-t-20 block">
																	<div class="padding-10">
																		<div class="row">
																			<div class="col-md-6 text-center">
																				<p class="small">Noon</p>
																				<canvas class="sleet" width="25" height="25"></canvas>
																				<p class="text-danger bold">30°C</p>
																			</div>
																			<div class="col-md-6 text-center">
																				<p class="small">Night</p>
																				<canvas class="wind" width="25" height="25"></canvas>
																				<p class="text-danger bold">30°C</p>
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