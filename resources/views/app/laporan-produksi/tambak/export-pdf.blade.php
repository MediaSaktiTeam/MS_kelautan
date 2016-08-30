<!DOCTYPE htm>

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<link rel="stylesheet" href="{{ url('resources/assets/app/css/laporan.css') }}">

</head>


<body>

<center><h2>Data Laporan Produksi Tambak <br> <small>Dinas Perikanan dan Kelautan Kab. Bantaeng</small></h2></center>

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
				<th rowspan="2">Panjang Pantai</th>
				<th rowspan="2">Potensi</th>
				<th rowspan="2">Luas Tanam</th>
				<th colspan="3">Penebaran</th>
				<th colspan="3">Jumlah Hidup</th>
				<th colspan="2">Pakan</th>
				<th rowspan="2">Keterangan</th>
			</tr>
			<tr>
				<th>Windu</th>
				<th>Vanamae</th>
				<th>Bandeng</th>
				<th>Windu</th>
				<th>Vanamae</th>
				<th>Bandeng</th>
				<th>Pellet</th>
				<th>Dedak</th>
			</tr>
		</thead>
		
		<tbody>
			<?php 

				$i = 1; 
				$jumlahrtp ="";
				$panjang_pantai ="";
				$potensi ="";
				$luas_tanam ="";
				$penebaran_windu ="";
				$penebaran_vanamae ="";
				$penebaran_bandeng ="";
				$jumlah_hidup_windu ="";
				$jumlah_hidup_vanamae ="";
				$jumlah_hidup_bandeng ="";
				$pakan_pelet ="";
				$pakan_dedak ="";

			?>

		@foreach( $tambak as $tb )

			<tr>
				<td><?php echo $i  ?></td>
				<td>{{ $tb->datakecamatan->nama }}</td>
				<td>{{ $tb->datadesa->nama }}</td>
				<td>{{ $tb->rtp }}</td>
				<td>{{ $tb->panjang_pantai }}</td>
				<td>{{ $tb->potensi }}</td>
				<td>{{ $tb->luas_tanam }} Ha</td>
				<td>{{ $tb->penebaran_windu }}</td>
				<td>{{ $tb->penebaran_vanamae }}</td>
				<td>{{ $tb->penebaran_bandeng }}</td>
				<td>{{ $tb->jumlah_hidup_windu }}</td>
				<td>{{ $tb->jumlah_hidup_vanamae }}</td>
				<td>{{ $tb->jumlah_hidup_bandeng }}</td>
				<td>{{ $tb->pakan_pelet }}</td>
				<td>{{ $tb->pakan_dedak }}</td>
				<td>{{ $tb->keterangan }}</td>
			</tr>
				
			<?php 

				$i = $i + 1; 
				$jumlahrtp += $tb->rtp;
				$panjang_pantai += $tb->panjang_pantai;
				$potensi += $tb->potensi;
				$luas_tanam += $tb->luas_tanam;
				$penebaran_windu += $tb->penebaran_windu;
				$penebaran_vanamae += $tb->penebaran_vanamae;
				$penebaran_bandeng += $tb->penebaran_bandeng;
				$jumlah_hidup_windu += $tb->jumlah_hidup_windu;
				$jumlah_hidup_vanamae += $tb->jumlah_hidup_vanamae;
				$jumlah_hidup_bandeng += $tb->jumlah_hidup_bandeng;
				$pakan_pelet += $tb->pakan_pelet;
				$pakan_dedak += $tb->pakan_dedak;

			?>

		@endforeach
			<tr>
				<td colspan="3"><b>JUMLAH PRODUKSI</b></td>
				<td><b><?php echo round($jumlahrtp,2); ?></b></td>
				<td><b><?php echo round($panjang_pantai,2); ?></b> Ha</td>
				<td><b><?php echo round($potensi,2); ?></b> Ha</td>
				<td><b><?php echo round($luas_tanam,2); ?></b> Ha</td>
				<td><b><?php echo round($penebaran_windu,2); ?></b></td>
				<td><b><?php echo round($penebaran_vanamae,2); ?></b></td>
				<td><b><?php echo round($penebaran_bandeng,2); ?></b></td>
				<td><b><?php echo round($jumlah_hidup_windu,2); ?></b></td>
				<td><b><?php echo round($jumlah_hidup_vanamae,2); ?></b></td>
				<td><b><?php echo round($jumlah_hidup_bandeng,2); ?></b></td>
				<td><b><?php echo round($pakan_pelet,2); ?></b></td>
				<td><b><?php echo round($pakan_dedak,2); ?></b></td>
				<td></td>
			</tr>
			
		</tbody>
	</table>

	<?php $pj = App\Penugasan::where('halaman','Pembudidaya Laporan Produksi Tambak')->first(); ?>

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