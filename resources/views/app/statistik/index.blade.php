@extends('app.layout.main')

@section('title')
	Statistik
@endsection



@section('konten')

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
										<select name="" id="" class="years">
											<option value="">2016</option>
											<option value="">2015</option>
											<option value="">2014</option>
											<option value="">2013</option>
											<option value="">2012</option>
											<option value="">2011</option>
										</select>
									</div>
									<hr>
								</div>
								<div class="panel-body">
									<div class="row">
										<div class="col-sm-6">
											<p>Statistik jumlah pembudidaya berdasarkan <b>jenis usaha</b></p>
											<div id="pbdy-usaha" style="margin-top:20px; margin-left:20px; width:100%; height:auto;"></div>
											<br>
										</div>
										<div class="col-sm-6">
											<p>Statistik jumlah pembudidaya berdasarkan <b>bantuan</b></p>
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
											<p>Statistik jumlah pengolah berdasarkan <b>kepemilikan sarana & prasarana</b></p>
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
			var plot1 = $.jqplot('pbdy-usaha', [[['Budidaya Air Laut',25],['Budidaya Air Tawar',14],['Budidaya Air Payau',7]]], {
				gridPadding: {top:0, bottom:38, left:0, right:0},
				seriesDefaults:{
					renderer:$.jqplot.PieRenderer,
					trendline:{ show:false },
					rendererOptions: { padding: 8, showDataLabels: true }
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

			var plot1 = $.jqplot('pbdy-bantuan', [[['Bibit',125],['Pakan',14],['Tali',7],['Para-para',27],['Perahu',2]]], {
				gridPadding: {top:0, bottom:38, left:0, right:0},
				seriesDefaults:{
					renderer:$.jqplot.PieRenderer,
					trendline:{ show:false },
					rendererOptions: { padding: 8, showDataLabels: true }
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
		});


		/* Nelayan */
		$(document).ready(function(){
			var plot2 = $.jqplot('nlyn-sarana', [[['Perahu',25],['Alat Tangkap',74],['Mesin',37]]], {
				gridPadding: {top:0, bottom:38, left:0, right:0},
				seriesDefaults:{
					renderer:$.jqplot.PieRenderer,
					trendline:{ show:false },
					rendererOptions: { padding: 8, showDataLabels: true }
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
		});


		/* Pengolah */
		$(document).ready(function(){
			var plot3 = $.jqplot('pglh-usaha', [[['Perahu',25],['Alat Tangkap',74],['Mesin',137]]], {
				gridPadding: {top:0, bottom:38, left:0, right:0},
				seriesDefaults:{
					renderer:$.jqplot.PieRenderer,
					trendline:{ show:false },
					rendererOptions: { padding: 8, showDataLabels: true }
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
		});
	</script>
@endsection