@extends('app.layout.main')

@section('title')
	Statistik
@endsection

@section('konten')

<?php $total_pembudidaya = $pembudidaya_air_tawar + $pembudidaya_air_laut + $pembudidaya_air_payau ?>
<?php $total_bantuan = App\RefBantuan::where('tahun', $_GET['tahun'])->count() ?>
<?php $total_sarana_nelayan = $jml_perahu + $jml_mesin + $jml_alat_tangkap ?>
<?php $Sc = new App\custom ?>

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
												<option value="{{ url('/app/statistik') }}?tahun={{ $i }}&offset={{ $_GET['offset'] }}&limit={{ $_GET['limit'] }}" {{ $_GET['tahun'] == $i ? "selected":"" }}>{{ $i }}</option>
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

						<div class="col-md-12">
							
							<!-- START PANEL -->
							<div class="panel panel-default">
								<div class="panel-heading">
									<div class="panel-title">
										<form action="/app/statistik">
											<input type="hidden" name="tahun" value="{{ $_GET['tahun'] }}">
											<div class="col-md-4" style="padding-right: 0">
												<input type="date" name="offset" value="{{ $_GET['offset'] }}" class="form-control">
											</div>

											<div class="col-md-2" style="padding-left: 0">
												<button type="button" class="btn btn-default" style="background: none;border: none;cursor: default">Sampai Tgl</button>
											</div>

											<div class="col-md-4">
												<input type="date" name="limit" value="{{ $_GET['limit'] }}" class="form-control">
											</div>

											<div class="col-md-2" style="padding: 0">
												<button class="btn btn-default">Tampilkan</button>
											</div>
										</form>
									</div>
									<hr>
								</div>

								<div class="panel-body">
									<h5>Statistik Jenis Produksi</h5>
									
									<div class="row">
										@if ( count($jp_pembudidaya) > 0 )
										<div id="chartContainer_pembudidaya" style="height: 300px; width: 100%;"></div>
										@else
											<center>
												<p><b>Jenis Produksi Pembudidaya ({{ $Sc->tgl_indo($_GET['offset']) }} - {{ $Sc->tgl_indo($_GET['limit']) }})</b></p>
												<p>Tidak ada data</p>
											</center>
										@endif
									</div>
									<br>
									<br>
									<br>
									<div class="row">
										@if ( count($jp_nelayan) > 0 )
											<div id="chartContainer_nelayan" style="height: 300px; width: 100%;"></div>
										@else
											<center>
												<p><b>Jenis Produksi Nelayan ({{ $Sc->tgl_indo($_GET['offset']) }} - {{ $Sc->tgl_indo($_GET['limit']) }})</b></p>
												<p>Tidak ada data</p>
											</center>
										@endif
									</div>
									<br>
									<br>
									<br>
									<div class="row">
										@if ( count($jp_pengolah) > 0 )
											<div id="chartContainer_pengolah" style="height: 300px; width: 100%;"></div>
										@else
											<center>
												<p><b>Jenis Produksi Pengolah ({{ $Sc->tgl_indo($_GET['offset']) }} - {{ $Sc->tgl_indo($_GET['limit']) }})</b></p>
												<p>Tidak ada data</p>
											</center>
										@endif
									</div>

								</div>
								

							</div>
							<!-- END PANEL -->
						</div>

						<div class="col-md-12">
							
							<!-- START PANEL -->
							<div class="panel panel-default">
								<div class="panel-heading">
									<div class="panel-title">
										Statistik Desa Kecamatan &nbsp;
										<select name="" id="" class="years" onchange="get_desa(this.value)">
											@foreach ( $kecamatan as $kec )
												<option value="{{ $kec->id }}">{{ $kec->nama }}</option>
											@endforeach
										</select>
									</div>
									<hr>
								</div>

								<div class="panel-body" id="list-desa" style="min-height: 400px">
									
								</div>

							</div>
							<!-- END PANEL -->

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

<!-- MODAL STICK UP VIEW -->
<div class="modal fade stick-up" id="modal-view" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content-wrapper">
			<div class="modal-content">
				<div class="modal-header clearfix text-left">
					<button type="button" class="close" data-dismiss="modal"  aria-hidden="true"><i class="pg-close fs-14"></i></button>
					<h5>Detail Laporan Produksi Rumput Laut</h5>
				</div>
				<div class="modal-body" id="view-detail">

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default btn-cons no-margin inline" data-dismiss="modal">Kembali</button>
				</div>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>


<!-- MODAL STICK UP VIEW -->
<div class="modal fade stick-up" id="modal-view-air-tawar" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content-wrapper">
			<div class="modal-content">
				<div class="modal-header clearfix text-left">
					<button type="button" class="close" data-dismiss="modal"  aria-hidden="true"><i class="pg-close fs-14"></i></button>
					<h5>Detail Laporan Produksi Air Tawar</h5>
				</div>
				<div class="modal-body" id="view-detail-air-tawar">

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default btn-cons no-margin inline" data-dismiss="modal">Kembali</button>
				</div>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- MODAL STICK UP VIEW -->
<div class="modal fade stick-up" id="modal-view-tambak" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content-wrapper">
			<div class="modal-content">
				<div class="modal-header clearfix text-left">
					<button type="button" class="close" data-dismiss="modal"  aria-hidden="true"><i class="pg-close fs-14"></i></button>
					<h5>Detail Laporan Produksi Tambak</h5>
				</div>
				<div class="modal-body" id="view-detail-tambak">

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default btn-cons no-margin inline" data-dismiss="modal">Kembali</button>
				</div>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

@endsection


@section('registerscript')
	<script>
		$(".menu-items .link-statistik").addClass("active");
	</script>

	<script src="{{ url('resources/assets/app/libs/jqplot/jquery.jqplot.min.js') }}"></script>
	<script src="{{ url('resources/assets/app/libs/jqplot/plugins/jqplot.pieRenderer.min.js') }}"></script>
	<script src="{{ url('resources/assets/app/js/canvasjs.min.js') }}"></script>
	
	<script>

		/* Pembudidaya - PIE Chart */
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
		

		window.onload = function () {

			/* Jumlah Pembudidaya - BAR Chart */
				@if ( $total_pembudidaya != 0 )
				
				    var chart = new CanvasJS.Chart("pbdy-usaha",
				    {

				      title:{
				      	fontSize: 16,
				        text: ""    
				      },
				      animationEnabled: true,
				      axisY: {
				        title: ""
				      },
				      legend: {
				        verticalAlign: "bottom",
				        horizontalAlign: "center"
				      },
				      theme: "theme1",
				      data: [

				      {        
				        type: "column",  
				        showInLegend: false, 
				        legendMarkerColor: "grey",
				        dataPoints: [
						    { y:{{ $pembudidaya_air_laut }}, label: 'Budidaya Air Laut' },
							{ y:{{ $pembudidaya_air_tawar }}, label: 'Budidaya Air Tawar' },
							{ y:{{ $pembudidaya_air_payau }}, label: 'Budidaya Air Payau' }     
				        ]
				      }   
				      ]
				    });

				    chart.render();
			    @endif

			    @if ( $total_bantuan != 0 )
				
				    var chart = new CanvasJS.Chart("pbdy-bantuan",
				    {

				      title:{
				      	fontSize: 16,
				        text: ""    
				      },
				      animationEnabled: true,
				      axisY: {
				        title: ""
				      },
				      legend: {
				        verticalAlign: "bottom",
				        horizontalAlign: "center"
				      },
				      theme: "theme1",
				      data: [

				      {        
				        type: "column",  
				        showInLegend: false, 
				        legendMarkerColor: "grey",
				        dataPoints: [
							@foreach( $bantuan_master_pembudidaya as $bmp )
								<?php
									$jumlah = DB::table('app_bantuan as ab')
													->join('users as u', 'u.id', '=', 'ab.id_user')
														->where('ab.id_bantuan', $bmp->id)
														->where(DB::raw('left(ab.tahun, 4)'), '<=', $_GET['tahun'])
														->count(); ?>
									{ y: {{ $jumlah }}, label: '{{ $bmp->nama }}'},

							@endforeach
						]
				      }   
				      ]
				    });

				    chart.render();
			    @endif

		    @if ( $total_pengolah != 0 )
			
			/* Jumlah Pengolah - BAR Chart */
			    var chart = new CanvasJS.Chart("pglh-usaha",
			    {

			      title:{
			      	fontSize: 16,
			        text: ""    
			      },
			      animationEnabled: true,
			      axisY: {
			        title: ""
			      },
			      legend: {
			        verticalAlign: "bottom",
			        horizontalAlign: "center"
			      },
			      theme: "theme1",
			      data: [

			      {        
			        type: "column",  
			        showInLegend: false, 
			        legendMarkerColor: "grey",
			        dataPoints: [
						
						<?php $no = 1 ?>
						@foreach( $jenis_olahan as $jo )

							<?php $jml_jo = App\User::where('id_jenis_olahan', $jo->id)->count() ?>

							@if ( $jml_jo < 1 ) 
								<?php continue ?>
							@endif

							@if ( count($jenis_olahan) == $no )
								{ y: {{ $jml_jo }}, label:'{{ $jo->jenis }}' }
							@else
								{ y: {{ $jml_jo }}, label:'{{ $jo->jenis }}' },
							@endif

							<?php $no++ ?>
						@endforeach
					]
			      }   
			      ]
			    });

			    chart.render();
		    @endif

		    @if ( $total_sarana_nelayan != 0 )
			
			/* Nelayan - BAR Chart */
			    var chart = new CanvasJS.Chart("nlyn-sarana",
			    {

			      title:{
			      	fontSize: 16,
			        text: ""    
			      },
			      animationEnabled: true,
			      axisY: {
			        title: ""
			      },
			      legend: {
			        verticalAlign: "bottom",
			        horizontalAlign: "center"
			      },
			      theme: "theme1",
			      data: [

			      {        
			        type: "column",  
			        showInLegend: false, 
			        legendMarkerColor: "grey",
			        dataPoints: [
			        { y: {{ $jml_perahu }}, label : 'Perahu' },
			        { y: {{ $jml_alat_tangkap }}, label: 'Alat Tangkap' },
			        { y: {{ $jml_mesin }}, label: 'Mesin'}
					]
			      }   
			      ]
			    });

			    chart.render();
		    @endif

			@if ( count($jp_pembudidaya) > 0 )
			
			/* Jenis Produksi Pembudidaya */
			    var chart = new CanvasJS.Chart("chartContainer_pembudidaya",
			    {
			      title:{
			      	fontSize: 16,
			        text: "Jenis Produksi Pembudidaya ({{ $Sc->tgl_indo($_GET['offset']) }} - {{ $Sc->tgl_indo($_GET['limit']) }})"    
			      },
			      animationEnabled: true,
			      axisY: {
			        title: "Jumlah pembudidaya"
			      },
			      legend: {
			        verticalAlign: "bottom",
			        horizontalAlign: "center"
			      },
			      theme: "theme1",
			      data: [

			      {        
			        type: "column",  
			        showInLegend: false, 
			        legendMarkerColor: "grey",
			        dataPoints: [
			        	<?php $i = 1 ?>
			        	@foreach( $jp_pembudidaya as $jpp )
			        		@if ( $i++ != count($jp_pembudidaya) )
					        	{y: {{ $jpp->jml }}, label: "{{ $jpp->jenis_produksi }}"},
					        @else
					        	{y: {{ $jpp->jml }}, label: "{{ $jpp->jenis_produksi }}"}
					        @endif
					    @endforeach       
			        ]
			      }   
			      ]
			    });

			    chart.render();
		    @endif

			@if ( count($jp_nelayan) > 0 )
			
			/* Jenis Produksi Nelayan */
			    var chart = new CanvasJS.Chart("chartContainer_nelayan",
			    {
			      title:{
			      	fontSize: 16,
			        text: "Jenis Produksi Nelayan ({{ $Sc->tgl_indo($_GET['offset']) }} - {{ $Sc->tgl_indo($_GET['limit']) }})"    
			      },
			      animationEnabled: true,
			      axisY: {
			        title: "Jumlah nelayan"
			      },
			      legend: {
			        verticalAlign: "bottom",
			        horizontalAlign: "center"
			      },
			      theme: "theme1",
			      data: [

			      {        
			        type: "column",  
			        showInLegend: false, 
			        legendMarkerColor: "grey",
			        dataPoints: [
			        	<?php $i = 1 ?>
			        	@foreach( $jp_nelayan as $jpn )
			        		@if ( $i++ != count($jp_nelayan) )
					        	{y: {{ $jpn->jml }}, label: "{{ $jpn->jenis_produksi }}"},
					        @else
					        	{y: {{ $jpn->jml }}, label: "{{ $jpn->jenis_produksi }}"}
					        @endif
					    @endforeach       
			        ]
			      }   
			      ]
			    });

			    chart.render();
		    @endif

			@if ( count($jp_nelayan) > 0 )
			
			/* Jenis Produksi Pengolah */
			    var chart = new CanvasJS.Chart("chartContainer_pengolah",
			    {
			      title:{
			      	fontSize: 16,
			        text: "Jenis Produksi Pengolah ({{ $Sc->tgl_indo($_GET['offset']) }} - {{ $Sc->tgl_indo($_GET['limit']) }})"    
			      },
			      animationEnabled: true,
			      axisY: {
			        title: "Jumlah Pengolah"
			      },
			      legend: {
			        verticalAlign: "bottom",
			        horizontalAlign: "center"
			      },
			      theme: "theme1",
			      data: [

			      {        
			        type: "column",  
			        showInLegend: false, 
			        legendMarkerColor: "grey",
			        dataPoints: [
			        	<?php $i = 1 ?>
			        	@foreach( $jp_pengolah as $jpe )
			        		@if ( $i++ != count($jp_pengolah) )
					        	{y: {{ $jpe->jml }}, label: "{{ $jpe->jenis_produksi }}"},
					        @else
					        	{y: {{ $jpe->jml }}, label: "{{ $jpe->jenis_produksi }}"}
					        @endif
					    @endforeach       
			        ]
			      }   
			      ]
			    });

			    chart.render();
		    @endif
		}

		// Get List Desa
		function get_desa(id)
		{
			$("#list-desa").html('<i class="fa fa-spinner fa-spin"></i>');
			$.get('/app/statistik/list-desa?id='+id, function(data){
				$("#list-desa").html(data);
			});
		}
		get_desa({{ $id_kec }});

		// Get detail desa
		function detail_desa(id)
		{
			$("#detail-desa").html('<i class="fa fa-spinner fa-spin"></i>');
			$.get('/app/statistik/detail-desa/'+id, function(data){
				$('#detail-desa').html(data);
			});
		}

		$(function(){
			$('body').on('click', '.desa', function(){
				$('body .desa').removeClass('active');
				$(this).addClass('active');
			});

		// Show detail rumput laut
			$('body').on('click', '.view-rumput-laut', function(){
				var id = $(this).data('id');
				var url = "{{ url('app/rumputlaut/detail') }}";
				var url = url+'/'+id;
				$("#modal-view").modal('show');
				$("#view-detail").html('<i class="fa fa-spinner fa-spin"></i>');
				
				$.get(url, {id:id}, function(data){
					$("#view-detail").html(data);
				});
			});

		// Show detail tambak
			$('body').on('click', '.view-tambak', function(){
				var id = $(this).data('id');
				var url = "{{ url('app/tambak/detail') }}";
				var url = url+'/'+id;
				$("#modal-view-tambak").modal('show');
				$("#view-detail-tambak").html('<i class="fa fa-spinner fa-spin"></i>');
				
				$.get(url, {id:id}, function(data){
					$("#view-detail-tambak").html(data);
				});
			});

		// Show detail air tawar
			$('body').on('click', '.view-air-tawar', function(){
				var id = $(this).data('id');
				var url = "{{ url('app/airtawar/detail') }}";
				var url = url+'/'+id;
				$("#modal-view-air-tawar").modal('show');
				$("#view-detail-air-tawar").html('<i class="fa fa-spinner fa-spin"></i>');
				
				$.get(url, {id:id}, function(data){
					$("#view-detail-air-tawar").html(data);
				});
			});

		});

	</script>

@endsection