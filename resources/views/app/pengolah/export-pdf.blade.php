<!DOCTYPE htm>

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	
	<link rel="stylesheet" href="{{ url('resources/assets/app/css/laporan.css') }}">

</head>


<body>

<center><h2>Data Pengolah <br> <small>Dinas Perikanan dan Kelautan Kab. Bantaeng</small></h2></center>
	
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
				<th>Nama Lengkap</th>
				<th>Alamat</th>
				<th>RT</th>
				<th>Telepon</th>
				<th>Pos</th>
				<th>Nama Kelompok</th>
				<th>Jabatan Kelompok</th>
				<th>Jenis Olahan</th>
				<th>Legalitas Produksi</th>
				<th>Merek Dagang</th>
				<th>Modal yang dimiliki</th>
				<th>Modal Pinjaman</th>
				<th>Omzet Perbulan</th>
			</tr>
		</thead>
		
		<tbody>
			<?php $i = 1 ?>

			@foreach( $pengolah as $pe )

				<tr>
					<td><?php echo $i  ?></td>
					<td>{{ $pe->nik }}</td>
					<td>{{ $pe->name }}</td>
					<td>{{ $pe->alamat }}</td>
					<td>{{ $pe->erte }}</td>
					<td>{{ $pe->tlp }}</td>
					<td>{{ $pe->pos }}</td>
					<td>{{ $pe->kelompok->nama }}</td>
					<td>{{ $pe->jabatan->nama }}</td>
					<td>{{ $pe->olahan->jenis }}</td>
					<td>{{ $pe->legalitas_produksi }}</td>
					<td>{{ $pe->merekdagang->merek }}</td>
					<td>{{ $pe->modal_dimiliki }}</td>
					<td>{{ $pe->modal_pinjaman }}</td>
					<td>{{ $pe->omzet_perbulan }}</td>
				</tr>

				<?php $i = $i + 1 ?>

			@endforeach
		</tbody>
	</table>

	<?php $pj = App\Penugasan::where('halaman','Pengolah')->first(); ?>

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