<!DOCTYPE htm>

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<style>

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

<center><h2>Data Nelayan <br> <small>Kementerian Perikanan dan Kelautan Kab. Bantaeng</small></h2></center>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No.</th>
				<th>NIK</th>
				<th>No Kartu Nelayan</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>Kelompok</th>
			</tr>
		</thead>
		
		<tbody>
			<?php $i = 1 ?>

			@foreach( $nelayan as $nel )

				<tr>
					<td><?php echo $i  ?></td>
					<td>{{ $nel->nik }}</td>
					<td>{{ $nel->no_kartu_nelayan }}</td>
					<td>{{ $nel->name }}</td>
					<td>{{ $nel->alamat }}</td>
					<td>{{ $nel->kelompok->nama }} ({{ $nel->jabatan->nama }})</td>
				</tr>

				<?php $i = $i + 1 ?>

			@endforeach
		</tbody>
	</table>

</body>

</html>