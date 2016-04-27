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
		  font-size: 11px;
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
		  text-align: center;
		  border-bottom: 2px solid #ddd;
		}
		.table > tbody > tr > td {
		  vertical-align: bottom;
		  text-align: center;
		}

</style>

</head>


<body>

<center><h2>Data Laporan Produksi Air Tawar <br> <small>Dinas Perikanan dan Kelautan Kab. Bantaeng</small></h2></center>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th rowspan="2">No.</th>
				<th rowspan="2">Kecamatan</th>
				<th rowspan="2">Desa</th>
				<th rowspan="2">Petani/RTP</th>
				<th rowspan="2">Panjang Pantai</th>
				<th rowspan="2">Potensi</th>
				<th rowspan="2">Luas Tanam</th>
				<th rowspan="2">Bentangan</th>
				<th colspan="2">Bibit</th>
				<th>Jenis Bibit Cottoni</th>
				<th>Jenis Bibit Spinosum</th>
			</tr>
			<tr>
				<th>Cottoni</th>
				<th>Spinosum</th>
				<th>Basah</th>
				<th>Kering</th>
				<th>Basah</th>
				<th>Kering</th>
			</tr>
		</thead>
		
		<tbody>

		<?php $i = 1 ?>

		@foreach( $airtawar as $at )

			<tr>
				<td><?php echo $i  ?></td>
				<td>{{ $rl->datakecamatan->nama }}</td>
				<td>{{ $rl->desa }}</td>
				<td>{{ $rl->rtp }}</td>
				<td>{{ $rl->panjang_pantai }}</td>
				<td>{{ $rl->potensi }}</td>
				<td>{{ $rl->luas_tanam }} Ha</td>
				<td>{{ $rl->bentangan }}</td>
			</tr>
				
			<?php $i = $i + 1 ?>

		@endforeach
			
		</tbody>
	</table>

</body>

</html>