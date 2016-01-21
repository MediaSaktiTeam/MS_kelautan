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

<center><h2>Data Bantuan <br> <small>Dinas Perikanan dan Kelautan Kab. Bantaeng</small></h2></center>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No.</th>
				<th>NIK</th>
				<th>Nama Lengkap</th>
				<th>Alamat</th>
				<th>Nama Kelompok</th>
				<th>Bidang Usaha</th>
				<th>Bantuan yang didapatkan</th>
				<th>Tahun</th>
			</tr>
		</thead>
		
		<tbody>

			<?php $no = 1 ?>
			@foreach( $bantuan_users as $bu )

				<?php

					if ( $no > 1 ) {
						if ( $id_user == $bu->id && $tb == $bu->tahun_bantuan )
							continue;
					}

					$id_user = $bu->id;
					$tb = $bu->tahun_bantuan;

				?>
				
				<tr>
					<td><?php echo $no ?></td>
					<td>{{ $bu->nik }}</td>
					<td>{{ $bu->name }}</td>
					<td>{{ $bu->alamat }}</td>
					<td>{{ $bu->nama_kelompok }}</td>
					<td>{{ $bu->profesi }}</td>
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
							- {{ $b->nama }}
						@endforeach

					</td>
					<td>{{ $bu->tahun_bantuan }}</td>
				</tr>

				<?php $no++ ?>

			@endforeach

		</tbody>
	</table>

</body>

</html>