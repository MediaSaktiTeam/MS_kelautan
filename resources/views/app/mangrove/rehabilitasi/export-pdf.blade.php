<!DOCTYPE htm>

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<link rel="stylesheet" href="{{ url('resources/assets/app/css/laporan.css') }}">

</head>


<body>

<center><h2>Data Mangrove yang direhabilitasi <br> <small>Dinas Perikanan dan Kelautan Kab. Bantaeng</small></h2></center>

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
				<th>Direhabilitasi</th>
				<th>Berubah Fungsi</th>
				<th>Lahan Tambak</th>
				<th>Penggaraman</th>
			</tr>
		</thead>
		
		<tbody>
			<?php 

				$i = 1;
				$direhabilitasi="";
				$berubah_fungsi="";
				$lahan_tambak="";
				$penggaraman="";
				$to_rehab ="";
				$to_fungsi = "";
				$to_tambak ="";
				$to_garam ="";
			?>


			@foreach( $mangroverehabilitasi as $rehab )

				<tr>
					<td><?php echo $i++ ?></td>
					<td>{{ $rehab->datakecamatan->nama }}</td>
					<td>{{ $rehab->datadesa->nama }}</td>
					<td>{{ $rehab->direhabilitasi }} M<sup>2</sup></td>
					<td>{{ $rehab->berubah_fungsi }} M<sup>2</sup></td>
					<td>{{ $rehab->lahan_tambak }} M<sup>2</sup></td>
					<td>{{ $rehab->penggaraman }} M<sup>2</sup></td>
				</tr>

				<?php 
					$direhabilitasi += $rehab->direhabilitasi * 0.0001;
					$berubah_fungsi += $rehab->berubah_fungsi * 0.0001;
					$lahan_tambak += $rehab->lahan_tambak * 0.0001;
					$penggaraman += $rehab->penggaraman * 0.0001;
					$to_rehab += $rehab->direhabilitasi;
					$to_fungsi += $rehab->berubah_fungsi;
					$to_tambak += $rehab->lahan_tambak;
					$to_garam += $rehab->penggaraman;;
				?>

			@endforeach

				<tr>
					<td><b>Jumlah</b></td>
					<td></td>
					<td></td>
					<td><b> {{ $to_rehab }} M<sup>2</sup> <?php echo "(", round($direhabilitasi,2), "Ha)";  ?></b></td>
					<td><b> {{ $to_fungsi }} M<sup>2</sup><?php echo "(", round($berubah_fungsi,2), "Ha)"; ?></b></td>
					<td><b>	{{ $to_tambak }} M<sup>2</sup><?php echo "(", round($lahan_tambak,2), "Ha)"; ?></b></td>
					<td><b> {{ $to_garam }} M<sup>2</sup><?php echo "(", round($penggaraman,2), "Ha)"; ?></b></td>
					<td></td>
				</tr>
		</tbody>
	</table>

	<?php $pj = App\Penugasan::where('halaman','Mangrove Direhabilitasi')->first(); ?>

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