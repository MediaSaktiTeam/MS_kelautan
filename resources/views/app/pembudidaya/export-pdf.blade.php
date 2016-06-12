<!DOCTYPE htm>

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<link rel="stylesheet" href="{{ url('resources/assets/app/css/laporan.css') }}">

</head>


<body>

<center><h2>Data Pembudidaya <br> <small>Dinas Perikanan dan Kelautan Kab. Bantaeng</small></h2></center>

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
				<th>No.</th>
				<th>NIK</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>RT</th>
				<th>Telepon</th>
				<th>Pos</th>
				<th>Jenis Usaha</th>
				<th>Jenis Produksi</th>
				<th>Kelompok</th>
			</tr>
		</thead>
		
		<tbody>

			<?php $i = 1 ?>

			@foreach( $pembudidaya as $pb )

				<tr>
					<td><?php echo $i  ?></td>
					<td>{{ $pb->nik }}</td>
					<td>{{ $pb->name }}</td>
					<td>{{ $pb->alamat }}</td>
					<td>{{ $pb->erte }}</td>
					<td>{{ $pb->tlp }}</td>
					<td>{{ $pb->pos }}</td>
					<td>{{ $pb->jenisusaha->nama }}</td>
					<td>{{ $pb->produksi->nama }}</td>
					<td>{{ $pb->kelompok->nama }} ({{ $pb->jabatan->nama }})</td>
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
			<?php $Ms = new App\Custom; ?>

			<td>Bantaeng, {{ $Ms->tgl_indo(date('Y-m-d')) }}<br>Petugas Statistik Budidaya
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