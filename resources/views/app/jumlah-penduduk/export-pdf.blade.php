<!DOCTYPE htm>

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<link rel="stylesheet" href="{{ url('resources/assets/app/css/laporan.css') }}">

</head>


<body>


<center><h2>Data Jumlah Penduduk Pesisir <br> <small>Dinas Perikanan dan Kelautan Kab. Bantaeng</small></h2></center>


	<table class="table table-bordered">
		<thead>
			<tr>
				<th width="10">No.</th>
				<th>Nama Kecamatan</th>
				<th>Laki Laki (org)</th>
				<th>Perempuan (org)</th>
				<th>Jumlah KK</th>
				<th>Total</th>
			</tr>
		</thead>
		<?php 
		$laki="";
		$perempuan="";
		$jumlah_kk="";
		$total2="";
		 ?>
		<tbody>
			<?php $i = 1; ?>

			@foreach( $jumlah_penduduk as $jp )
				<?php 
					$total= $jp->laki + $jp->perempuan; 
					$laki += $jp->laki;
					$perempuan += $jp->perempuan;
					$jumlah_kk += $jp->jumlah_kk;
					$total2 += $total;
				?>

				<tr>
					<td>{{ $i++ }}</td>
					<td>{{ $jp->datakecamatan->nama }}</td>
					<td>{{ $jp->laki }}</td>
					<td>{{ $jp->perempuan }}</td>
					<td>{{ $jp->jumlah_kk }}</td>

					<td>{{ $total }}</td>
				</tr>

			@endforeach
			<tr>
					<td><b>Jumlah</b></td>
					<td></td>
					<td><b><?php echo round($laki,2);  ?></b></td>
					<td><b><?php echo round($perempuan,2); ?></b></td>
					<td><b><?php echo round($jumlah_kk,2); ?></b></td>
					<td><b><?php echo round($total2,2); ?></b></td>
					</tr>
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