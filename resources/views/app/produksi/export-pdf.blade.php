<?php $Ms = new App\Custom ?>

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

<center><h2>Data Produksi {{ $profesi }} <br> <small>Dinas Perikanan dan Kelautan Kab. Bantaeng</small></h2></center>

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
				</tr>

				<?php $i = $i + 1 ?>

			@endforeach
		</tbody>
	</table>

</body>

</html>