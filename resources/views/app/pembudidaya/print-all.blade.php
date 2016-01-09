<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>&nbsp;</title>
	<style type="text/css">
		@media print {
		    footer {page-break-after: always;}
		}
	</style>

</head>

<body>

		<center><h3>Data Pembudidaya</h3></center>
		<table border="1" style="border-collapse:collapse" cellpadding="5">
			<thead>
				<tr>
					<th>NIK</th>
					<th>Nama</th>
					<th>Alamat</th>
					<th>Jenis Usaha</th>
					<th>Sarana/Prasarana</th>
					<th>Nama Kelompok</th>
					<th>Jabatan Kelompok</th>
					<th>Bantuan yang telah diterima</th>
				</tr>
			</thead>
			<tbody>

				@foreach( $pembudidaya as $r )
					<tr>
						<td>{{ $r->nik }}</td>
						<td>{{ $r->name }}</td>
						<td>{{ $r->alamat }}</td>
						<td>{{ $r->jenis_usaha }}</td>
						<td>
							<ul class="list-unstyled">
								<?php $Ksarana = App\KepemilikanSarana::where('id_user', $r->id)->get(); ?>
								@foreach ( $Ksarana as $ks )
									<li>{{ $ks->sarana->sub }} </li>
								@endforeach
							</ul>
						</td>
						<td>{{ $r->nama_kelompok }}</td>
						<td>{{ $r->nama_jabatan }}</td>
						<td>
							<ul class="list-unstyled">
								<li><b>2014:</b> Kapal/Perahu</li>
								<li><b>2015:</b> Alat Tangkap</li>
							</ul>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>

</body>
</html>