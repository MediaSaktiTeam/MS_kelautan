<!DOCTYPE html>

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<link rel="stylesheet" href="{{ url('resources/assets/app/css/laporan.css') }}">

</head>


<body>

<center><h2>Survei Pengolahan dan Pemasaran Hasil Perikanan <br> <small>Dinas Perikanan dan Kelautan Kab. Bantaeng</small></h2></center>
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
				<th>Provinsi</th>
				<th>Kabupaten</th>
				<th>Kecamatan</th>
				<th>Desa</th>
				<th>Kode Jenis Kegiatan</th>
				<th>Nomor Urut Direktori</th>
				<th>Nama Unit Pemasar</th>
				<th>Pemilik Unit Pemasar</th>
				<th>Alamat Unit Pemasar</th>
				<th>RT/RW</th>
				<th>Telepon</th>
				<th>Kode POS</th>
				<th>Jenis Kegiatan Pemasaran</th>
				<th>Tahun Mulai Usaha</th>
			</tr>
			
		</thead>
		
		<tbody>
			<?php $i = 1; ?>


		@foreach( $pemasar as $ps )

			<tr>
				<td>{{ $i++ }}</td>
				<td>{{ $ps->provinsi }}</td>
				<td>{{ $ps->kabupaten }}</td>
				<td>{{ $ps->kecamatan }}</td>
				<td>{{ $ps->desa }}</td>
				<td>{{ $ps->kode_kegiatan }}</td>
				<td>{{ $ps->nomor_direktori }}</td>
				<td>{{ $ps->unit_pemasar }}</td>
				<td>{{ $ps->pemilik_pemasar }}</td>
				<td>{{ $ps->alamat_pemasar }}</td>
				<td>{{ $ps->erte }}</td>
				<td>{{ $ps->tlp }}</td>
				<td>{{ $ps->pos }}</td>
				<td>{{ $ps->tipe }}</td>
				<td>{{ $ps->tahun_mulai }}</td>
			</tr>

		@endforeach
			
		</tbody>
	</table>

</body>

</html>