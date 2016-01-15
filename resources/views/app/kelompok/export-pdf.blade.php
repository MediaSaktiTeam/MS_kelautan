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

<center><h2>Data Pembudidaya <br> <small>Kementerian Perikanan dan Kelautan Kab. Bantaeng</small></h2></center>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Bidang Usaha</th>
				<th>Id Kelompok</th>
				<th>Nama Kelompok</th>
				<th>Alamat Sekretariat</th>
				<th>No. Rekening</th>
				<th>Nama Rekening</th>
				<th>Nama Bank</th>
			</tr>
		</thead>
		
		<tbody>

			@foreach( $kelompok as $kl )

			<tr>
				<td>{{ $kl->tipe }}</td>
				<td>{{ $kl->id_kelompok }}</td>
				<td>{{ $kl->nama }}</td>
				<td>{{ $kl->alamat }}</td>
				<td>{{ $kl->no_rek }}</td>
				<td>{{ $kl->nama_rekening }}</td>
				<td>{{ $kl->nama_bank }}</td>
			</tr>

			@endforeach
			
		</tbody>
	</table>

</body>

</html>