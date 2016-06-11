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
				<th>Bandeng</th>
				<th>U. Windu</th>
				<th>U. Vannamae</th>
				<th>Lainnya</th>
				<th>Bandeng</th>
				<th>U. Windu</th>
				<th>U. Vannamae</th>
				<th>Lainnya</th>
			</tr>
		</thead>
		
		<tbody>

		<?php 
			$i = 1; 
			$potensi = "";
			$jumlahrtp = "";
			$luas_tanam = "";
			$bibit_bandeng = "";
			$bibit_windu = "";
			$bibit_vannamae = "";
			$bibit_lainnya = "";
			$produksi_bandeng = "";
			$produksi_windu = "";
			$produksi_vannamae = "";
			$produksi_lainnya = "";
		?>

		@foreach( $budidayaairpayau as $ap )

			<tr>
				<td><?php echo $i  ?></td>
				<td>{{ $ap->lokasi }}</td>
				<td>{{ $ap->potensi }}</td>
				<td>{{ $ap->rtp }}</td>
				<td>{{ $ap->luas_tanam }} Ha</td>
				<td>{{ $ap->bibit_bandeng }}</td>
				<td>{{ $ap->bibit_windu }}</td>
				<td>{{ $ap->bibit_vannamae }}</td>
				<td>{{ $ap->bibit_lainnya }}</td>
				<td>{{ $ap->produksi_bandeng }}</td>
				<td>{{ $ap->produksi_windu }}</td>
				<td>{{ $ap->produksi_vannamae }}</td>
				<td>{{ $ap->produksi_lainnya }}</td>
				<td>{{ $ap->keterangan }}</td>
			</tr>

				
			<?php 

				$i = $i + 1;
				$potensi += $ap->potensi;
				$jumlahrtp += $ap->rtp;
				$luas_tanam += $ap->luas_tanam;
				$bibit_bandeng += $ap->bibit_bandeng;
				$bibit_windu += $ap->bibit_windu;
				$bibit_vannamae += $ap->bibit_vannamae;
				$bibit_lainnya += $ap->bibit_lainnya;
				$produksi_bandeng += $ap->produksi_bandeng;
				$produksi_windu += $ap->produksi_windu;
				$produksi_vannamae += $ap->produksi_vannamae;
				$produksi_lainnya += $ap->produksi_lainnya;
			?>

		@endforeach
			<tr>
				<td colspan="2"><b>JUMLAH</b></td>
				<td><b><?php echo round($potensi,2); ?></b> Ha</td>
				<td><b><?php echo round($jumlahrtp,2); ?></b></td>
				<td><b><?php echo round($luas_tanam,2); ?></b> Ha</td>
				<td><b><?php echo round($bibit_bandeng,2); ?></b></td>
				<td><b><?php echo round($bibit_windu,2); ?></b></td>
				<td><b><?php echo round($bibit_vannamae,2); ?></b></td>
				<td><b><?php echo round($bibit_lainnya,2); ?></b></td>
				<td><b><?php echo round($produksi_bandeng,2); ?></b></td>
				<td><b><?php echo round($produksi_windu,2); ?></b></td>
				<td><b><?php echo round($produksi_vannamae,2); ?></b></td>
				<td><b><?php echo round($produksi_lainnya,2); ?></b></td>
				<td></td>
			</tr>
			
		</tbody>
	</table>

</body>

</html>