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

<center><h2>Data Laporan Produksi Air Tawar <br> <small>Dinas Perikanan dan Kelautan Kab. Bantaeng</small></h2></center>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No.</th>
				<th>Kecamatan</th>
				<th>Desa</th>
				<th>Petani/RTP</th>
				<th>Luas Areal (Ha)</th>
				<th>Luas Tanam (Ha)</th>
			</tr>
		</thead>
		
		<tbody>

			<?php $i = 1 ?>

			@foreach( $airtawar as $at )

				<tr>
					<td><?php echo $i  ?></td>
					<td>{{ $at->datakecamatan->nama }}</td>
					<td>{{ $at->datadesa->nama }}</td>
					<td>{{ $at->rtp }}</td>
					<td>{{ $at->luas_areal }} Ha</td>
					<td>{{ $at->luas_tanam }} Ha</td>
				</tr>
				
				<?php $i = $i + 1 ?>

			@endforeach
			
		</tbody>
	</table>

</body>

</html>