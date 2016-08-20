<!DOCTYPE htm>

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<link rel="stylesheet" href="{{ url('resources/assets/app/css/laporan.css') }}">

</head>


<body>

<center><h2>Data Pnegolah <br> <small>Dinas Perikanan dan Kelautan Kab. Bantaeng</small></h2></center>

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
				<th width="15">No.</th>
				<th>Nama Kecamatan</th>
				<th>Jenis Mangrove</th>
			</tr>
		</thead>
		
		<tbody>
			<?php $i = 1 ?>

			@foreach( $mangrovejenis as $jen )

				<tr>
					<td><?php echo $i++  ?></td>
					<td>{{ $jen->datakecamatan->nama }}</td>
					<td>{{ $jen->jenis_mangrove }}</td>
				</tr>

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