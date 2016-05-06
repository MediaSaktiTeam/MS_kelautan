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
			<td><b>1 (Satu) Januari s/d Maret</b></td>
		</tr>
		<tr>
			<td><b>TAHUN</b></td>
			<td><b>2016</b></td>
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
			<?php $i = 1 ?>

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
				
			<tr>
				<td colspan="3"><b>JUMLAH</b></td>
				<td><b>14.4</b></td>
				<td><b>23.5</b> Ha</td>
				<td><b>23.5</b> Ha</td>
				<td><b>234</b></td>
				<td><b>234</b></td>
				<td><b>234</b></td>
				<td><b>234</b></td>
				<td><b>234</b></td>
				<td><b>234</b></td>
				<td><b>234</b></td>
				<td><b>234</b></td>
				<td><b>234</b></td>
				<td></td>
			</tr>
				
			<?php $i = $i + 1 ?>

		@endforeach
			
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
			<td width="70%"><b>MARWAH, SP.</b><br>NIP. 12309812980310192</td>
			<td><b>AHMAD</b><br>NIP. 12309812980310192</td>
		</tr>
	</table>

</body>

</html>