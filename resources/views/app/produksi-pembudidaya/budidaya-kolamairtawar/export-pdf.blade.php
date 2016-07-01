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
				<th rowspan="2">Potensi</th>
				<th rowspan="2">Jumlah RTP</th>
				<th rowspan="2">Luas Tanam (Ha)</th>
				<th colspan="4">Jumlah Bibit</th>
				<th colspan="4">Produksi</th>
				<th rowspan="2">Keterangan</th>
			</tr>
			<tr>
				<th>Nila</th>
				<th>Lele</th>
				<th>Udang</th>
				<th>Lainnya</th>
				<th>Nila</th>
				<th>Lele</th>
				<th>Udang</th>
				<th>Lainnya</th>
			</tr>
		</thead>
		
		<tbody>

		<?php 
			$i = 1; 
			$potensi = "";
			$jumlahrtp = "";
			$luas_tanam = "";
			$bibit_nila = "";
			$bibit_lele = "";
			$bibit_udang = "";
			$bibit_lainnya = "";
			$produksi_nila = "";
			$produksi_lele = "";
			$produksi_udang = "";
			$produksi_lainnya = "";
		?>

		@foreach( $kolamairtawar as $at )

			<tr>
				<td><?php echo $i  ?></td>
				<td>{{ $at->lokasi }}</td>
				<td>{{ $at->potensi }}</td>
				<td>{{ $at->rtp }}</td>
				<td>{{ $at->luas_tanam }} Ha</td>
				<td>{{ $at->bibit_nila }}</td>
				<td>{{ $at->bibit_lele }}</td>
				<td>{{ $at->bibit_udang }}</td>
				<td>{{ $at->bibit_lainnya }}</td>
				<td>{{ $at->produksi_nila }}</td>
				<td>{{ $at->produksi_lele }}</td>
				<td>{{ $at->produksi_udang }}</td>
				<td>{{ $at->produksi_lainnya }}</td>
				<td>{{ $at->keterangan }}</td>
			</tr>

				
			<?php 

				$i = $i + 1;
				$potensi += $at->potensi;
				$jumlahrtp += $at->rtp;
				$luas_tanam += $at->luas_tanam;
				$bibit_nila += $at->bibit_nila;
				$bibit_lele += $at->bibit_lele;
				$bibit_udang += $at->bibit_udang;
				$bibit_lainnya += $at->bibit_lainnya;
				$produksi_nila += $at->produksi_nila;
				$produksi_lele += $at->produksi_lele;
				$produksi_udang += $at->produksi_udang;
				$produksi_lainnya += $at->produksi_lainnya;
			?>

		@endforeach
			<tr>
				<td colspan="2"><b>JUMLAH</b></td>
				<td><b><?php echo round($potensi,2); ?></b> Ha</td>
				<td><b><?php echo round($jumlahrtp,2); ?></b></td>
				<td><b><?php echo round($luas_tanam,2); ?></b> Ha</td>
				<td><b><?php echo round($bibit_nila,2); ?></b></td>
				<td><b><?php echo round($bibit_lele,2); ?></b></td>
				<td><b><?php echo round($bibit_udang,2); ?></b></td>
				<td><b><?php echo round($bibit_lainnya,2); ?></b></td>
				<td><b><?php echo round($produksi_nila,2); ?></b></td>
				<td><b><?php echo round($produksi_lele,2); ?></b></td>
				<td><b><?php echo round($produksi_udang,2); ?></b></td>
				<td><b><?php echo round($produksi_lainnya,2); ?></b></td>
				<td></td>
			</tr>
			
		</tbody>
	</table>

</body>

</html>