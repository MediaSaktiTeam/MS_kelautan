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

		<?php $i = 1 ?>

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