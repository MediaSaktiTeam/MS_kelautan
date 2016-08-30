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
				<th rowspan="2">Jumlah Bibit</th>
				<th colspan="2">Produksi</th>
				<th rowspan="2">Keterangan</th>
			</tr>
			<tr>
				<th>Catoni</th>
				<th>Spenosun</th>
			</tr>
		</thead>
		
		<tbody>

		<?php 
			$i = 1; 
			$panjang_pantai = "";
			$jumlahrtp = "";
			$potensi = "";
			$luas_tanam = "";
			$jumlah_bibit = "";
			$produksi_catoni = "";
			$produksi_spenosun = "";
			$produksi_lainnya = "";
		?>

		@foreach( $budidayarumputlaut as $brl )

			<tr>
				<td><?php echo $i  ?></td>
				<td>{{ $brl->lokasi }}</td>
				<td>{{ $brl->panjang_pantai }}</td>
				<td>{{ $brl->rtp }}</td>
				<td>{{ $brl->potensi }}</td>
				<td>{{ $brl->luas_tanam }} Ha</td>
				<td>{{ $brl->jumlah_bibit }}</td>
				<td>{{ $brl->produksi_catoni }}</td>
				<td>{{ $brl->produksi_spenosun }}</td>
				<td>{{ $brl->keterangan }}</td>
			</tr>

				
			<?php 

				$i = $i + 1;
				$panjang_pantai += $brl->panj;
				$jumlahrtp += $brl->rtp;
				$potensi += $brl->potensi;
				$luas_tanam += $brl->luas_tanam;
				$jumlah_bibit += $brl->jumlah_bibit;
				$produksi_catoni += $brl->produksi_catoni;
				$produksi_spenosun += $brl->produksi_spenosun;
			?>

		@endforeach
			<tr>
				<td colspan="2"><b>JUMLAH</b></td>
				<td><b><?php echo round($panjang_pantai,2); ?></b></td>
				<td><b><?php echo round($jumlahrtp,2); ?></b></td>
				<td><b><?php echo round($potensi,2); ?></b> Ha</td>
				<td><b><?php echo round($luas_tanam,2); ?></b> Ha</td>
				<td><b><?php echo round($jumlah_bibit,2); ?></b></td>
				<td><b><?php echo round($produksi_catoni,2); ?></b></td>
				<td><b><?php echo round($produksi_spenosun,2); ?></b></td>
				<td></td>
			</tr>
			
		</tbody>
	</table>

	<?php $pj = App\Penugasan::where('halaman','Pembudidaya Rumput Laut')->first(); ?>

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