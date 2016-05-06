<!DOCTYPE htm>

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<link rel="stylesheet" href="{{ url('resources/assets/app/css/laporan.css') }}">

</head>


<body>

<center><h2>Data Bantuan <br> <small>Dinas Perikanan dan Kelautan Kab. Bantaeng</small></h2></center>

	<table class="table table-no-border" style="width: 40%">
		<tr>
			<td><b>KABUPATEN</b></td>
			<td><b>BANTAENG</b></td>
		</tr>
		<tr>
			<td><b>KWARTAL</b></td>
			<td><b>1 (Satu) Januari s/d Maret</b></td>
		</tr>
		<tr>
			<td><b>TAHUN</b></td>
			<td><b>2016</b></td>
		</tr>
	</table>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th rowspan="2" style="width: 10px;text-align: center; vertical-align: middle">No.</th>
				<th rowspan="2" style="vertical-align: middle;width: 150px">NIK</th>
				<th rowspan="2" style="vertical-align: middle">Nama Lengkap</th>
				<th rowspan="2" style="vertical-align: middle">Alamat</th>
				<th rowspan="2" style="vertical-align: middle">Nama Kelompok</th>
				<th rowspan="2" style="vertical-align: middle;width: 80px;text-align: center;">Bidang Usaha</th>
				<th colspan="3" style="text-align: center">Bantuan yang didapatkan</th>
			</tr>
			<tr>
				<th style="text-align: center;width: 50px">Tahun</th>
				<th>Program</th>
				<th>Bantuan</th>
			</tr>
		</thead>
		
		<tbody>

			<?php $no = 1 ?>
			@foreach( $bantuan_users as $bu )

				<?php

					// Cegah tampil data rangkap
					if ( $no > 1 ) {
						if ( $id_user == $bu->id && $tb == $bu->tahun_bantuan )
							continue;
					}

					$id_user = $bu->id;
					$tb = $bu->tahun_bantuan;

				?>
				
				<tr>
					<td>{{ $no++ }}</td>
					<td>{{ $bu->nik }}</td>
					<td>{{ $bu->name }}</td>
					<td>{{ $bu->alamat }}</td>
					<td>{{ $bu->nama_kelompok }}</td>
					<td style="text-align: center;">{{ $bu->profesi }}</td>
					<td style="text-align: center;">{{ $bu->tahun_bantuan }}</td>
					<td>{{ $bu->nama_program }}</td>
					<td>
						<?php

							$bantuan = DB::table('app_bantuan as ab')
											->leftJoin('app_bantuan_master as abm', 'abm.id', '=', 'ab.id_bantuan')
												->select('abm.nama')
													->where('ab.id_user', $bu->id)
													->where('ab.tahun', $bu->tahun_bantuan)
													->orderBy('ab.tahun', 'asc')
													->get(); ?>
						@foreach( $bantuan as $b )
							- {{ $b->nama }}<br>
						@endforeach

					</td>
				</tr>

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
			<td>Bantaeng, 4 April 2016<br>Petugas Statistik Budidaya
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