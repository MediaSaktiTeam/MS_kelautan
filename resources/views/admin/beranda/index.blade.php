@extends('admin.layout.main')

@section('title', 'Administrator')
@section('konten')
	<div class="row">
		<div class="col-sm-3">
		
			<div class="tile-stats tile-cyan">
				<div class="icon"><i class="entypo-pencil"></i></div>
				<div class="num" data-start="0" data-end="{{ $jml_berita }}" data-postfix="" data-duration="1500" data-delay="0">0</div>
				
				<h3>Berita</h3>
				<p>Klik <a href="{{ route('blog') }}">disini</a> untuk melihat semua berita.</p>
			</div>
			
		</div>
		
		<div class="col-sm-3">

			<?php

				$CC = new App\Custom;

				$date1 = new DateTime( date('Y-m-d') );
				$date1->modify('first day of this month');
				$first_date = $date1->format('Y-m-d');

				$date2 = new DateTime( date('Y-m-d') );
				$date2->modify('last day of this month');
				$last_date = $date2->format('Y-m-d');

				$month_visitor = DB::table('site_statistik')
							->whereBetween('tanggal', [$first_date, $last_date])->count();
			?>

			<div class="tile-stats tile-green">
				<div class="icon"><i class="entypo-chart-bar"></i></div>
				<div class="num" data-start="0" data-end="{{ $month_visitor }}" data-postfix="" data-duration="1500" data-delay="600">0</div>

				<h3>Pengunjung Bulan Ini</h3>
				<p>pengunjung bulan {{ $CC->getBulan(date('m')) }}</p>
			</div>
			
		</div>
		
		<div class="col-sm-3">
		
			<div class="tile-stats tile-aqua">
				<div class="icon"><i class="entypo-mail"></i></div>
				<div class="num" data-start="0" data-end="{{ $jml_pesan_baru }}" data-postfix="" data-duration="1500" data-delay="1200">0</div>
				
				<h3>Pesan Baru</h3>
				<p>Klik <a href="{{ route('pesan') }}">disini</a> untuk melihat pesan.</p>
			</div>
			
		</div>
		
		<div class="col-sm-3">
		
			<div class="tile-stats tile-blue">
				<div class="icon"><i class="entypo-rss"></i></div>
				<div class="num" data-start="0" data-end="52" data-postfix="" data-duration="1500" data-delay="1800">0</div>
				
				<h3>Langganan Berita</h3>
				<p>di situs ini sekarang.</p>
			</div>
			
		</div>
	</div>

	<br />

	<div class="row">
		<div class="col-sm-12">
		
			<div class="panel panel-primary" id="charts_env">
			
				<div class="panel-heading">
					<div class="panel-title">Site Stats</div>
					
					<div class="panel-options">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#line-chart" data-toggle="tab">Line Charts</a></li>
						</ul>
					</div>
				</div>
		
				<div class="panel-body">
				
					<div class="tab-content">
						
						<div class="tab-pane active" id="line-chart">
							<div id="line-chart-demo" class="morrischart" style="height: 300px"></div>
						</div>
						
					</div>
					
				</div>
				
			</div>	

		</div>
	</div>
@endsection


@section('registerscript')
	<script src="{{ url('resources/assets/admin/libs/js/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
	<script src="{{ url('resources/assets/admin/libs/js/jvectormap/jquery-jvectormap-europe-merc-en.js') }}"></script>
	<script src="{{ url('resources/assets/admin/libs/js/jquery.sparkline.min.js') }}"></script>
	<script src="{{ url('resources/assets/admin/libs/js/raphael-min.js') }}"></script>

	<script>

		jQuery(document).ready(function($) 
		{
			
			// Line Charts
			var line_chart_demo = $("#line-chart-demo");
			
			var line_chart = Morris.Line({
				element: 'line-chart-demo',
				data: [ 
				<?php
				$tgl1 = Carbon\Carbon::now()->format("Y-m-d");
				$tgl_bawah = strtotime("-1 week +1 day",strtotime($tgl1));
				$hasil_tgl_bawah = date('Y-m-d', $tgl_bawah); 
				
				/* Visitor */
				$tgl2 = Carbon\Carbon::now()->format("Y-m-d");
				$tgl_bawah2 = strtotime("-1 week +1 day",strtotime($tgl2));
				$hasil_tgl_bawah2 = date('Y-m-d', $tgl_bawah2);	
				
				/* Hits */
				$tgl3 = date("Y-m-d");
				$tgl_bawah3 = strtotime("-1 week +1 day",strtotime($tgl3));
				$hasil_tgl_bawah3 = date('Y-m-d', $tgl_bawah3);
				for ( $i2 = 0; $i2 <= 6; $i2++ ){
					  $urutan = strtotime("+$i2 day",strtotime($hasil_tgl_bawah));
					  $hasil_urutan = date('Y-m-d', $urutan);   
					  
						/* Visitor */
					  $tgl_pengujung = strtotime("+$i2 day",strtotime($hasil_tgl_bawah2));
					  $hasil_tgl_pengujung = date('Y-m-d', $tgl_pengujung);
					  $jml_pengunjung	= App\Statistik::where('tanggal',$hasil_tgl_pengujung)->groupBy('ip')->get();
					  
					  /* Hits */
					  $tgl_hits = strtotime("+$i2 day",strtotime($hasil_tgl_bawah3));
					  $hasil_tgl_hits = date('Y-m-d', $tgl_hits);
					  $hit = DB::table('site_statistik')
					  			->select( DB::raw('SUM(hits) as hit') )
					  			->where('tanggal', $hasil_tgl_hits)
					  			->groupBy('tanggal')->first();
					  $hits_hari_ini = empty($hit->hit) ? 0 : $hit->hit;
					  if ( $i2 != 6 ) { ?>
						{ y: '<?php echo $hasil_urutan; ?>', a: <?php echo count($jml_pengunjung); ?>, b: <?php echo $hits_hari_ini;?> },
					<?php } else { ?>
						{ y: '<?php echo $hasil_urutan; ?>', a: <?php echo count($jml_pengunjung); ?>, b: <?php echo $hits_hari_ini;?> } <?php }
				} ?>
				],
				xkey: 'y',
				ykeys: ['a', 'b'],
				labels: ['Pengunjung', 'Tampilan Halaman'],
				redraw: true
			});
			
			line_chart_demo.parent().attr('style', '');
			
		
		});

	</script>
	<script>
		$(".nav-index").addClass("active");
	</script>
@endsection