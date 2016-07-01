<!DOCTYPE html>

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
				<th rowspan="2">No.</th>
				<th rowspan="2">Lokasi</th>
				<th rowspan="2">Panjang Garis Pantai</th>
				<th rowspan="2">Jumlah RTP</th>
				<th rowspan="2">Potensi</th>
				<th rowspan="2">Luas Tanam (Ha)</th>
				<th colspan="3">Jumlah Bibit</th>
				<th colspan="3">Produksi</th>
				<th rowspan="2">Keterangan</th>
			</tr>
			<tr>
				<th>Kakap</th>
				<th>Udang</th>
				<th>Lainnya</th>
				<th>Kakap</th>
				<th>Udang</th>
				<th>Lainnya</th>
			</tr>
		</thead>
		
		<tbody>

		<?php 
			$i = 1; 
			$potensi = "";
			$panjang_pantai = "";
			$jumlahrtp = "";
			$luas_tanam = "";
			$bibit_kakap = "";
			$bibit_udang = "";
			$bibit_lainnya = "";
			$produksi_kakap = "";
			$produksi_udang = "";
			$produksi_lainnya = "";
		?>

		@foreach( $kjaairlaut as $kal )

			<tr>
				<td><?php echo $i  ?></td>
				<td>{{ $kal->lokasi }}</td>
				<td>{{ $kal->panjang_pantai }}</td>
				<td>{{ $kal->rtp }}</td>
				<td>{{ $kal->potensi }}</td>
				<td>{{ $kal->luas_tanam }} Ha</td>
				<td>{{ $kal->bibit_kakap }}</td>
				<td>{{ $kal->bibit_udang }}</td>
				<td>{{ $kal->bibit_lainnya }}</td>
				<td>{{ $kal->produksi_kakap }}</td>
				<td>{{ $kal->produksi_udang }}</td>
				<td>{{ $kal->produksi_lainnya }}</td>
				<td>{{ $kal->keterangan }}</td>
			</tr>

				
			<?php 

				$i = $i + 1;
				$panjang_pantai += $kal->panjang_pantai;
				$jumlahrtp += $kal->rtp;
				$potensi += $kal->potensi;
				$luas_tanam += $kal->luas_tanam;
				$bibit_kakap += $kal->bibit_kakap;
				$bibit_udang += $kal->bibit_udang;
				$bibit_lainnya += $kal->bibit_lainnya;
				$produksi_kakap += $kal->produksi_kakap;
				$produksi_udang += $kal->produksi_udang;
				$produksi_lainnya += $kal->produksi_lainnya;
			?>

		@endforeach
			<tr>
				<td colspan="2"><b>JUMLAH</b></td>
				<td><b><?php echo round($panjang_pantai,2); ?></b></td>
				<td><b><?php echo round($jumlahrtp,2); ?></b></td>
				<td><b><?php echo round($potensi,2); ?></b> Ha</td>
				<td><b><?php echo round($luas_tanam,2); ?></b> Ha</td>
				<td><b><?php echo round($bibit_kakap,2); ?></b></td>
				<td><b><?php echo round($bibit_udang,2); ?></b></td>
				<td><b><?php echo round($bibit_lainnya,2); ?></b></td>
				<td><b><?php echo round($produksi_kakap,2); ?></b></td>
				<td><b><?php echo round($produksi_udang,2); ?></b></td>
				<td><b><?php echo round($produksi_lainnya,2); ?></b></td>
				<td></td>
			</tr>
			
		</tbody>
	</table>

</body>

</html>