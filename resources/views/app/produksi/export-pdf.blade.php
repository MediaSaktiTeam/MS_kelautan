<?php $Ms = new App\Custom ?>

<!DOCTYPE htm>

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<link rel="stylesheet" href="{{ url('resources/assets/app/css/laporan.css') }}">

</head>


<body>

<center><h2>Data Produksi {{ $profesi }} <br> <small>Dinas Perikanan dan Kelautan Kab. Bantaeng</small></h2></center>

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
				<th style="width: 10px">No.</th>
				<th>Nama Lengkap</th>
				<th>Jenis Produksi</th>
				@if ( $Ms->dek($_GET['pr']) == 'Nelayan' )
					<th>Jenis Ikan</th>
				@endif
				<th>Biaya Produki</th>
				<th>Jumlah Produki</th>
				<th>Waktu Produksi</th>
			</tr>
		</thead>
		
		<tbody>
			<?php $i = 1 ?>

			@foreach( $produksi as $per )

				<tr>
					<td><?php echo $i  ?></td>
					<td>{{ $per->name }}</td>
					<td>{{ $per->jenis_produksi }}</td>
					@if ( $Ms->dek($_GET['pr']) == 'Nelayan' )
						<td>{{ $per->jenis_ikan }}</td>
					@endif
					<td>{{ $Ms->rupiah($per->biaya_produksi) }}</td>
					<td>{{ $per->jumlah_produksi }}</td>
					<td>{{ $per->waktu_produksi }}</td>
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