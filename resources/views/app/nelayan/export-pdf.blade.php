<!DOCTYPE htm>

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<link rel="stylesheet" href="{{ url('resources/assets/app/css/laporan.css') }}">

</head>


<body>

<center><h2>Data Nelayan <br> <small>Dinas Perikanan dan Kelautan Kab. Bantaeng</small></h2></center>

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
				<th rowspan="2">NIK</th>
				<th rowspan="2">No Kartu Nelayan</th>
				<th rowspan="2">Nama</th>
				<th colspan="3"><center>Alamat</center></th>
				<th colspan="2"><center>Sarana Yang dimiliki</center></th>
			</tr>
			<tr>
				<th>RT/RW</th>
				<th>Desa/Kel</th>
				<th>Kec</th>
				<th>Tipe Mesin</th>
				<th>Jenis Perahu</th>
			</tr>
		</thead>
		
		<tbody>
			<?php $i = 1 ?>

			@foreach( $nelayan as $nel )

				<tr>
					<td><?php echo $i  ?></td>
					<td>{{ $nel->nik }}</td>
					<td>{{ $nel->no_kartu_nelayan }}</td>
					<td>{{ $nel->name }}</td>
					<td>{{ $nel->erte }}</td>
					<td>{{ $nel->desa->nama }}</td>
					<td>{{ $nel->desa->kecamatan->nama }}</td>
					<?php $Ksarana = App\KepemilikanSarana::where('id_user', $nel->id)->get(); ?>
					@foreach ( $Ksarana as $ks )
					<td>{{ $ks->sarana->jenis }}</td>
					<td>{{ $ks->sarana->sub }}</td> 
					@endforeach
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