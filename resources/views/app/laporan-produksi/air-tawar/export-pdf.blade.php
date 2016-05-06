<!DOCTYPE html>

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
		.table-no-border, .table-no-border * {
			border: none !important;
			text-align: left !important;
		}

</style>

</head>


<body>

<center><h2>Data Laporan Produksi Air Tawar <br> <small>Dinas Perikanan dan Kelautan Kab. Bantaeng</small></h2></center>

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
				<th rowspan="2">No.</th>
				<th rowspan="2">Kecamatan</th>
				<th rowspan="2">Desa</th>
				<th rowspan="2">Petani/RTP</th>
				<th rowspan="2">Luas Areal (Ha)</th>
				<th rowspan="2">Luas Tanam (Ha)</th>
				<th colspan="4">Penebaran</th>
				<th colspan="4">Jumlah Hidup</th>
				<th rowspan="2">Keterangan</th>
			</tr>
			<tr>
				<th>Mas</th>
				<th>Nila</th>
				<th>Lele</th>
				<th>Bawal</th>
				<th>Mas</th>
				<th>Nila</th>
				<th>Lele</th>
				<th>Bawal</th>
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
				<td>{{ $at->penebaran_mas }}</td>
				<td>{{ $at->penebaran_nila }}</td>
				<td>{{ $at->penebaran_lele }}</td>
				<td>{{ $at->penebaran_bawal }}</td>
				<td>{{ $at->jumlah_hidup_mas }}</td>
				<td>{{ $at->jumlah_hidup_nila }}</td>
				<td>{{ $at->jumlah_hidup_lele }}</td>
				<td>{{ $at->jumlah_hidup_bawal }}</td>
				<td>{{ $at->keterangan }}</td>
			</tr>

			<tr>
				<td colspan="3"><b>JUMLAH</b></td>
				<td><b>14.4</b></td>
				<td><b>23.5</b> Ha</td>
				<td><b>23.5</b> Ha</td>
				<td><b>234</b></td>
				<td><b>234</b></td>
				<td><b>234</b></td>
				<td><b>234</b></td>
				<td><b>234</b></td>
				<td><b>234</b></td>
				<td><b>234</b></td>
				<td><b>234</b></td>
				<td></td>
			</tr>
				
			<?php $i = $i + 1 ?>

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