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
				<th rowspan="2">Kecamatan</th>
				<th rowspan="2">Desa</th>
				<th rowspan="2">Petani/RTP</th>
				<th rowspan="2">Luas Areal (Ha)</th>
				<th rowspan="2">Luas Tanam (Ha)</th>
				<th colspan="4">Penebaran</th>
				<th colspan="4">Jumlah Hidup</th>
				<th rowspan="2">Keterangan</th>
			</tr>
			<tr>
				<th>Mas</th>
				<th>Nila</th>
				<th>Lele</th>
				<th>Bawal</th>
				<th>Mas</th>
				<th>Nila</th>
				<th>Lele</th>
				<th>Bawal</th>
			</tr>
		</thead>
		
		<tbody>

		<?php 

			$i = 1; 
				$jumlahrtp = "";
				$luas_areal = "";
				$luas_tanam = "";
				$penebaran_mas = "";
				$penebaran_nila = "";
				$penebaran_lele = "";
				$penebaran_bawal = "";
				$jumlah_hidup_mas = "";
				$jumlah_hidup_nila = "";
				$jumlah_hidup_lele = "";
				$jumlah_hidup_bawal = "";
		?>

		@foreach( $airtawar as $at )

			<tr>
				<td><?php echo $i  ?></td>
				<td>{{ $at->datakecamatan->nama }}</td>
				<td>{{ $at->datadesa->nama }}</td>
				<td>{{ $at->rtp }}</td>
				<td>{{ $at->luas_areal }} Ha</td>
				<td>{{ $at->luas_tanam }} Ha</td>
				<td>{{ $at->penebaran_mas }}</td>
				<td>{{ $at->penebaran_nila }}</td>
				<td>{{ $at->penebaran_lele }}</td>
				<td>{{ $at->penebaran_bawal }}</td>
				<td>{{ $at->jumlah_hidup_mas }}</td>
				<td>{{ $at->jumlah_hidup_nila }}</td>
				<td>{{ $at->jumlah_hidup_lele }}</td>
				<td>{{ $at->jumlah_hidup_bawal }}</td>
				<td>{{ $at->keterangan }}</td>
			</tr>

				
			<?php 

				$i = $i + 1; 
				$jumlahrtp += $at->rtp;
				$luas_areal += $at->luas_areal;
				$luas_tanam += $at->luas_tanam;
				$penebaran_mas += $at->penebaran_mas;
				$penebaran_nila += $at->penebaran_nila;
				$penebaran_lele += $at->penebaran_lele;
				$penebaran_bawal += $at->penebaran_bawal;
				$jumlah_hidup_mas += $at->jumlah_hidup_mas;
				$jumlah_hidup_nila += $at->jumlah_hidup_nila;
				$jumlah_hidup_lele += $at->jumlah_hidup_lele;
				$jumlah_hidup_bawal += $at->jumlah_hidup_bawal;

			?>

		@endforeach
			<tr>
				<td colspan="3"><b>JUMLAH</b></td>
				<td><b><?php echo round($jumlahrtp,2); ?></b></td>
				<td><b><?php echo round($luas_areal,2); ?></b> Ha</td>
				<td><b><?php echo round($luas_tanam,2); ?></b> Ha</td>
				<td><b><?php echo round($penebaran_mas,2); ?></b></td>
				<td><b><?php echo round($penebaran_nila,2); ?></b></td>
				<td><b><?php echo round($penebaran_lele,2); ?></b></td>
				<td><b><?php echo round($penebaran_bawal,2); ?></b></td>
				<td><b><?php echo round($jumlah_hidup_mas,2); ?></b></td>
				<td><b><?php echo round($jumlah_hidup_nila,2); ?></b></td>
				<td><b><?php echo round($jumlah_hidup_lele,2); ?></b></td>
				<td><b><?php echo round($jumlah_hidup_bawal,2); ?></b></td>
				<td></td>
			</tr>
			
		</tbody>
	</table>

	<table class="table table-no-border" style="width: 100%;">
		<tr>
			
			<td width="70%">Mengetahui:<br>Kasie Budidaya Laut, Payau<br>dan Air Tawar
				<br>
				<br>
				<br>
			</td>
			
			<td>Bantaeng, 4 April 2016<br>Petugas Statistik Budidaya
				<br>
				<br>
				<br>
			</td>
		</tr>
		<tr>
			@foreach( $kasi as $ks )
			<td width="70%"><b>{{ $ks->nama }}</b><br>NIP. {{ $ks->nip }}</td>
			@endforeach
			@foreach( $petugas as $pt )
			<td><b>{{ $pt->nama }}</b><br>NIP. {{ $pt->nip }}</td>
			@endforeach
		</tr>
	</table>

</body>

</html>