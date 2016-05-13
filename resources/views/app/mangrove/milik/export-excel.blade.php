	<table class="table table-bordered table-responsive">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Kecamatan</th>
				<th>Nama Desa</th>
				<th>Luas Lahan Mangrove</th>
				<th>Kondisi Rusak</th>
				<th>Kondisi Sedang</th>
				<th>Kondisi Baik</th>

			</tr>
		</thead>
		
		<tbody>

			<?php $i = 1 ?>
			
			@foreach( $mangrovemilik as $mi )

				<tr>
					<td><?php echo $i  ?></td>
					<td>{{ $mi->datakecamatan->nama }}</td>
					<td>{{ $mi->datadesa->nama }}</td>
					<td>{{ $mi->luas_lahan }} M<sup>2</sup></td>
					<td>{{ $mi->kondisi_rusak }} M<sup>2</sup></td>
					<td>{{ $mi->kondisi_sedang }} M<sup>2</sup></td>
					<td>{{ $mi->kondisi_baik }} M<sup>2</sup></td>
				</tr>

				<?php $i = $i + 1 ?>

			@endforeach
		</tbody>
	</table>