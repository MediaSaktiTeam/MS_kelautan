@extends('app.layout.main')

@section('title')
	Statistik
@endsection


@section('konten')

<?php $total_pembudidaya = $pembudidaya_air_tawar + $pembudidaya_air_laut + $pembudidaya_air_payau ?>
<?php $total_bantuan = App\RefBantuan::where('tahun', $_GET['tahun'])->count() ?>
<?php $total_sarana_nelayan = $jml_perahu + $jml_mesin + $jml_alat_tangkap ?>

<!-- START PAGE-CONTAINER -->
<div class="page-container">

	<!-- START PAGE CONTENT WRAPPER -->
	<div class="page-content-wrapper">
		
		<!-- START PAGE CONTENT -->			
		<div class="content">
			
			<div class="jumbotron bg-darkblue" data-pages="parallax">
				<div class="container-fluid container-fixed-lg">
					<div class="inner" style="transform: translateY(0px); opacity: 1;">
						<!-- START BREADCRUMB -->
						<ul class="breadcrumb pull-left">
							<li>
								<a href="/app/statistik">Statistik</a>
							</li>
						</ul>
					</div>
				</div>

			</div>

			<br>

			<div class="container-fluid container-fixed-lg">
				<div class="inner" style="transform: translateY(0px); opacity: 1;">

					<div class="row">

						<div class="col-md-12">
							
							<!-- START PANEL -->
							<div class="panel panel-default">
								<div class="panel-heading">
									<div class="panel-title">
										Statistik Pembudidaya Tahun 
										<select name="" id="" class="years" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
											@for( $i = 2011; $i <= date('Y')+1; $i++ )
												<option value="{{ url('/app/statistik') }}?tahun={{ $i }}" {{ $_GET['tahun'] == $i ? "selected":"" }}>{{ $i }}</option>
											@endfor
										</select>
									</div>
									<hr>
								</div>
								<div class="panel-body">
									<div class="row">
										<div class="col-sm-6">
											<p>Statistik jumlah pembudidaya berdasarkan <b>jenis usaha</b></p>
											@if( $total_pembudidaya == 0 ) 
												<div class="alert alert-info"><center>Data Kosong</center></div>
											@endif
											<div id="pbdy-usaha" style="margin-top:20px; margin-left:20px; width:100%; height:auto;"></div>
											<br>
										</div>
										<div class="col-sm-6">
											<p>Statistik jumlah pembudidaya berdasarkan <b>bantuan</b></p>
											@if( $total_bantuan == 0 ) 
												<div class="alert alert-info"><center>Data Kosong</center></div>
											@endif
											<div id="pbdy-bantuan" style="margin-top:20px; margin-left:20px; width:100%; height:auto;"></div>
											<br>
										</div>
									</div>
								</div>
							</div>
							<!-- END PANEL -->
						</div>

						<div class="col-md-6">
							
							<!-- START PANEL -->
							<div class="panel panel-default">
								<div class="panel-heading">
									<div class="panel-title">
										Statistik Nelayan
									</div>
									<hr>
								</div>
								<div class="panel-body">
									<div class="row">
										<div class="col-sm-12">
											<p>Statistik jumlah pengolah berdasarkan <b>kepemilikan sarana & prasarana</b>
											@if( $total_sarana_nelayan == 0 ) 
												<div class="alert alert-info"><center>Data Kosong</center></div>
											@endif
											<div id="nlyn-sarana" style="margin-top:20px; margin-left:20px; width:100%; height:auto;"></div>
											<br>
										</div>
									</div>
								</div>
							</div>
							<!-- END PANEL -->
						</div>

						<div class="col-md-6">
							
							<!-- START PANEL -->
							<div class="panel panel-default">
								<div class="panel-heading">
									<div class="panel-title">
										Statistik Pengolah
									</div>
									<hr>
								</div>
								<div class="panel-body">
									<div class="row">
										<div class="col-sm-12">
											<p>Statistik jumlah pengolah berdasarkan <b>jenis olahan</b></p>
											@if( $total_pengolah == 0 ) 
												<div class="alert alert-info"><center>Data Kosong</center></div>
											@endif
											<div id="pglh-usaha" style="margin-top:20px; margin-left:20px; width:100%; height:auto;"></div>
											<br>
										</div>
									</div>
								</div>
							</div>
							<!-- END PANEL -->
						</div>

					</div>
				</div>
			</div>
		</div>
		<!-- END PAGE CONTENT -->
		<!-- START COPYRIGHT -->
		<!-- START CONTAINER FLUID -->

			@include('app.layout.partials.copyright')
			
		<!-- END COPYRIGHT -->
	</div>
	<!-- END PAGE CONTENT WRAPPER -->

</div>
<!-- END PAGE CONTAINER -->


@endsection


@section('registerscript')
	<script>
		$(".menu-items .link-statistik").addClass("active");
	</script>

	<script src="{{ url('resources/assets/app/libs/jqplot/jquery.jqplot.min.js') }}"></script>
	<script src="{{ url('resources/assets/app/libs/jqplot/plugins/jqplot.pieRenderer.min.js') }}"></script>
	<script>

		/* Pembudidaya */
			$(document).ready(function(){

				@if( $total_pembudidaya != 0 )

					var plot1 = $.jqplot('pbdy-usaha', 
									[[
										[ 'Budidaya Air Laut',{{ $pembudidaya_air_laut }} ],
										[ 'Budidaya Air Tawar',{{ $pembudidaya_air_tawar }} ],
										[ 'Budidaya Air Payau',{{ $pembudidaya_air_payau }} ],
									]], 
					{
						gridPadding: {top:0, bottom:38, left:0, right:0},
						seriesDefaults:{
							renderer:$.jqplot.PieRenderer,
							trendline:{ show:false },
							rendererOptions: 
								{ 
									padding: 8, 
									showDataLabels: true,
									dataLabels :'value'
								}
							
						},
						
						legend:{
							show:true,
							placement: 'outside',
							rendererOptions: {
								numberRows: 1
							},
							location:'s',
							marginTop: '15px'
						}
					});

				@endif

				@if( $total_bantuan != 0 )

					var plot1 = $.jqplot('pbdy-bantuan', 
									[[

										@foreach( $bantuan_master_pembudidaya as $bmp )
											<?php
												$jumlah = DB::table('app_bantuan as ab')
																->join('users as u', 'u.id', '=', 'ab.id_user')
																	->where('ab.id_bantuan', $bmp->id)
																	->where(DB::raw('left(ab.tahun, 4)'), '<=', $_GET['tahun'])
																	->count(); ?>
												['{{ $bmp->nama }}',{{ $jumlah }}],

										@endforeach
									]], 
						{
						gridPadding: {top:0, bottom:38, left:0, right:0},
						seriesDefaults:{
							renderer:$.jqplot.PieRenderer,
							trendline:{ show:false },
							rendererOptions: { padding: 8, showDataLabels: true, dataLabels :'value' }
						},
						legend:{
							show:true,
							placement: 'outside',
							rendererOptions: {
								numberRows: 1
							},
							location:'s',
							marginTop: '15px'
						}
					});
				@endif
			});


		/* Nelayan */
			$(document).ready(function(){

				@if( $total_sarana_nelayan != 0 ) 

					var plot2 = $.jqplot('nlyn-sarana', [[['Perahu',{{ $jml_perahu }}],['Alat Tangkap',{{ $jml_alat_tangkap }}],['Mesin',{{ $jml_mesin }}]]], {
						gridPadding: {top:0, bottom:38, left:0, right:0},
						seriesDefaults:{
							renderer:$.jqplot.PieRenderer,
							trendline:{ show:false },
							rendererOptions: { padding: 8, showDataLabels: true, dataLabels :'value' }
						},
						legend:{
							show:true,
							placement: 'outside',
							rendererOptions: {
								numberRows: 1
							},
							location:'s',
							marginTop: '15px'
						}
					});

				@endif

			});


		/* Pengolah */
		$(document).ready(function(){

			@if( $total_pengolah != 0 ) 

				var plot3 = $.jqplot('pglh-usaha', [[
						<?php $no = 1 ?>
						@foreach( $jenis_olahan as $jo )

							<?php $jml_jo = App\User::where('id_jenis_olahan', $jo->id)->count() ?>

							@if ( $jml_jo < 1 ) 
								<?php continue ?>
							@endif

							@if ( count($jenis_olahan) == $no )
								['{{ $jo->jenis }}', {{ $jml_jo }}]
							@else
								['{{ $jo->jenis }}', {{ $jml_jo }}],
							@endif

							<?php $no++ ?>
						@endforeach
					]], 

					{
					gridPadding: {top:0, bottom:38, left:0, right:0},
					seriesDefaults:{
						renderer:$.jqplot.PieRenderer,
						trendline:{ show:false },
						rendererOptions: { padding: 8, showDataLabels: true, dataLabels :'value' }
					},
					legend:{
						show:true,
						placement: 'outside',
						rendererOptions: {
							numberRows: 1
						},
						location:'s',
						marginTop: '15px'
					}
				});

			@endif

		});
		
	</script>
@endsection