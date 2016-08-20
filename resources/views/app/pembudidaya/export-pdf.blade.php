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
		<?php
			$jabatan_kiri 	= 'Kasi Budidaya Laut. Payau dan Air Tawar';
			$jabatan_kanan 	= 'Petugas Statistik';
		?>
		<tr>
			<td width="70%">Mengetahui:<br>{{ $jabatan_kiri }}
				<br>
				<br>
				<br>
			</td>
			<?php $Ms = new App\Custom; ?>

			<td>Bantaeng, {{ $Ms->tgl_indo(date('Y-m-d')) }}<br>{{ $jabatan_kanan }}
				<br>
				<br>
				<br>
			</td>
		</tr>
		<tr>
			<?php
				$pj_kiri = App\Laporan::where('jabatan',$jabatan_kiri)->first();
				$pj_kanan = App\Laporan::where('jabatan',$jabatan_kanan)->first();
			?>
			<td width="70%"><b>{{ $pj_kiri->nama }}</b><br>NIP. {{ $pj_kiri->nip }}</td>
			<td><b>{{ $pj_kanan->nama }}</b><br>NIP. {{ $pj_kanan->nip }}</td>
		</tr>
	</table>

</body>

</html>