<!DOCTYPE htm>

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<link rel="stylesheet" href="{{ url('resources/assets/app/css/laporan.css') }}">

</head>


<body>

<center><h2>Data Mangrove yang dimiliki <br> <small>Dinas Perikanan dan Kelautan Kab. Bantaeng</small></h2></center>
	
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
				<th>Nama Desa</th>
				<th>Luas Lahan</th>
				<th>Kondisi Rusak</th>
				<th>Kondisi Sedang</th>
				<th>Kondisi Baik</th>
			</tr>
		</thead>
		
		<tbody>
			<?php $i = 1 ;
				$luas_lahan="";
				$kondisi_baik="";
				$kondisi_sedang="";
				$kondisi_rusak="";
				$to_lahan ="";
				$to_rusak= "";
				$to_sedang= "";
				$to_baik ="";
			?>

			@foreach( $mangrovemilik as $mi )
			<?php 
			$k_baik = $mi->luas_lahan - $mi->kondisi_rusak - $mi->kondisi_sedang;
			 ?>

				<tr>
					<td><?php echo $i++  ?></td>
					<td>{{ $mi->datakecamatan->nama }}</td>
					<td>{{ $mi->datadesa->nama }}</td>
					<td>{{ $mi->luas_lahan }} M<sup>2</sup></td>
					<td>{{ $mi->kondisi_rusak }} M<sup>2</sup></td>
					<td>{{ $mi->kondisi_sedang }} M<sup>2</sup></td>
					<td>{{ $k_baik }} M<sup>2</sup></td>
				</tr>
			<?php 
			$luas_lahan += $mi->luas_lahan * 0.0001;
			$kondisi_baik += $k_baik * 0.0001;
			$kondisi_sedang += $mi->kondisi_sedang * 0.0001;
			$kondisi_rusak += $mi->kondisi_rusak * 0.0001;
			$to_lahan += $mi->luas_lahan;
			$to_rusak += $mi->kondisi_rusak;
			$to_sedang += $mi->kondisi_sedang;
			$to_baik += $k_baik;
			 ?>

			@endforeach
			<tr>
			<td><b>Jumlah</b></td>
			<td></td>
			<td></td>
			<td><b>{{ $to_lahan }} M<sup>2</sup> <?php echo "(", round($luas_lahan,2), "Ha)";  ?></b></td>
			<td><b>{{ $to_rusak }} M<sup>2</sup> <?php echo "(", round($kondisi_rusak,2), "Ha)"; ?></b></td>
			<td><b>{{ $to_sedang }} M<sup>2</sup> <?php echo "(", round($kondisi_sedang,2), "Ha)"; ?></b></td>
			<td><b>{{ $to_baik }} M<sup>2</sup> <?php echo "(", round($kondisi_baik,2), "Ha)"; ?></b></td>
			
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