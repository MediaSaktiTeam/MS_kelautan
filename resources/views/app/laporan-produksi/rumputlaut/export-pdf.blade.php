<!DOCTYPE htm>

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<link rel="stylesheet" href="{{ url('resources/assets/app/css/laporan.css') }}">

</head>


<body>

<center><h2>Data Laporan Produksi Air Tawar <br> <small>Dinas Perikanan dan Kelautan Kab. Bantaeng</small></h2></center>

	<table class="table table-no-border" style="width: 40%">
		<tr>
			<td><b>KABUPATEN</b></td>
			<td><b>BANTAENG</b></td>
		</tr>
		<tr>
			<td><b>KWARTAL</b></td>
			<?php $tgl = Sakti::TglLaporan($tgl_awal, $tgl_akhir) ?>
			<td><b>{{  $tgl['tgl_awal'] }} s/d {{ $tgl['tgl_akhir'] }}</b></td>
		</tr>
		<tr>
			<td><b>TAHUN</b></td>
			<td><b>{{ $tgl['tahun'] }}</b></td>
		</tr>
	</table>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th rowspan="3">No.</th>
				<th rowspan="3">Kecamatan</th>
				<th rowspan="3">Desa</th>
				<th rowspan="3">Petani/RTP</th>
				<th rowspan="3">Panjang Pantai</th>
				<th rowspan="3">Potensi</th>
				<th rowspan="3">Luas Tanam</th>
				<th rowspan="3">Bentangan</th>
				<th rowspan="3">Jumlah Bibit Cottonii</th>
				<th rowspan="3">Jumlah Bibit Spinosum</th>
				<th colspan="4">Produksi</th>
				<th rowspan="3">Keterangan</th>
			</tr>
			<tr>
				<th colspan="2">Eucheuma Cottonii</th>
				<th colspan="2">Eucheuma Spinosum</th>
			</tr>
			<tr>
				<th>Basah</th>
				<th>Kering</th>
				<th>Basah</th>
				<th>Kering</th>
			</tr>
		</thead>
		
		<tbody>

		<?php 
			$i = 1;
				$jumlahrtp =""; 	
				$panjang_pantai =""; 	
				$potensi =""; 	
				$luas_tanam =""; 
				$bentangan =""; 
				$bibit_cottoni =""; 
				$bibit_spinosum =""; 
				$cottoni_basah =""; 
				$cottoni_kering =""; 
				$spinosum_basah =""; 
				$spinosum_kering ="";
		 ?>

		@foreach( $rumputlaut as $rl )

			<tr>
				<td><?php echo $i  ?></td>
				<td>{{ $rl->datakecamatan->nama }}</td>
				<td>{{ $rl->datadesa->nama }}</td>
				<td>{{ $rl->rtp }}</td>
				<td>{{ $rl->panjang_pantai }}</td>
				<td>{{ $rl->potensi }} Ha</td>
				<td>{{ $rl->luas_tanam }} Ha</td>
				<td>{{ $rl->bentangan }}</td>
				<td>{{ $rl->bibit_cottoni }} Kg</td>
				<td>{{ $rl->bibit_spinosum }} Kg</td>
				<td>{{ $rl->cottoni_basah }} Kg</td>
				<td>{{ $rl->cottoni_kering }} Kg</td>
				<td>{{ $rl->spinosum_basah }} Kg</td>
				<td>{{ $rl->spinosum_kering }} Kg</td>
				<td>{{ $rl->keterangan }}</td>
			</tr>
				
			
				
			<?php 

				$i = $i + 1; 
				$jumlahrtp += $rl->rtp;
				$panjang_pantai += $rl->panjang_pantai;
				$potensi += $rl->potensi;
				$luas_tanam += $rl->luas_tanam;
				$bentangan += $rl->bentangan;
				$bibit_cottoni += $rl->bibit_cottoni;
				$bibit_spinosum += $rl->bibit_spinosum;
				$cottoni_basah += $rl->cottoni_basah;
				$cottoni_kering += $rl->cottoni_kering;
				$spinosum_basah += $rl->spinosum_basah;
				$spinosum_kering += $rl->spinosum_kering;

			?>

		@endforeach
			<tr>
				<td colspan="3"><b>JUMLAH PRODUKSI</b></td>
				<td><b><?php echo round($jumlahrtp,2); ?></b></td>
				<td><b><?php echo round($panjang_pantai,2); ?></b> Ha</td>
				<td><b><?php echo round($potensi,2); ?></b> Ha</td>
				<td><b><?php echo round($luas_tanam,2); ?></b></td>
				<td><b><?php echo round($bentangan,2); ?></b></td>
				<td><b><?php echo round($bibit_cottoni,2); ?></b></td>
				<td><b><?php echo round($bibit_spinosum,2); ?></b></td>
				<td><b><?php echo round($cottoni_basah,2); ?></b></td>
				<td><b><?php echo round($cottoni_kering,2); ?></b></td>
				<td><b><?php echo round($spinosum_basah,2); ?></b></td>
				<td><b><?php echo round($spinosum_kering,2); ?></b></td>
				<td></td>
			</tr>
		</tbody>
	</table>

	<?php $pj = App\Penugasan::where('halaman','Pembudidaya Laporan Produksi Rumput Laut')->first(); ?>

	@if ( $pj )
		<table class="table table-no-border" style="width: 100%;">
			<tr>
				<td width="70%">Mengetahui:<br>{{ $pj->ttdkiri->jabatan }}
					<br>
					<br>
					<br>
				</td>
				<?php $Ms = new App\Custom; ?>

				<td>Bantaeng, {{ $Ms->tgl_indo(date('Y-m-d')) }}<br>{{ $pj->ttdkanan->jabatan }}
					<br>
					<br>
					<br>
				</td>
			</tr>
			<tr>
				
				<td width="70%"><b>{{ $pj->ttdkiri->nama }}</b><br>NIP. {{ $pj->ttdkiri->nip }}</td>
				<td><b>{{ $pj->ttdkanan->nama }}</b><br>NIP. {{ $pj->ttdkanan->nip }}</td>
			</tr>
		</table>
	@endif

</body>

</html>