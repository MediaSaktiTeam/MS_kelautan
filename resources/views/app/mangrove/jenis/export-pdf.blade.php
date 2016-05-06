<!DOCTYPE htm>

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<style>
		* {
			font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
		}
		.table {
		    border-collapse: collapse !important;
		}
		.table td,
		.table th {
		  background-color: #fff !important;
		  }
		.table-bordered th,
		.table-bordered td {
		    border: 1px solid #ddd !important;
		  }
		.table {
		  width: 100%;
		  max-width: 100%;
		  margin-bottom: 20px;
		  font-size: 10px;
		  font-family: Arial;
		}
		.table > thead > tr > th,
		.table > tbody > tr > th,
		.table > tfoot > tr > th,
		.table > thead > tr > td,
		.table > tbody > tr > td,
		.table > tfoot > tr > td {
		  padding: 8px;
		  line-height: 1.42857143;
		  vertical-align: top;
		  border-top: 1px solid #ddd;
		}
		.table > thead > tr > th {
		  vertical-align: bottom;
		  text-align: left;
		  border-bottom: 2px solid #ddd;
		}

</style>

</head>


<body>

<center><h2>Data Pnegolah <br> <small>Dinas Perikanan dan Kelautan Kab. Bantaeng</small></h2></center>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No.</th>
				<th>NIK</th>
				<th>Nama Lengkap</th>
				<th>Alamat</th>
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

</body>

</html>