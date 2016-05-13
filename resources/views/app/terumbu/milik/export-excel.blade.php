	<table class="table table-bordered table-responsive">
		<thead>
			<tr>
				<th>No.</th>
				<th>Nama Kecamatan</th>
				<th>Nama Desa</th>
				<th>Luas Lahan T.Karang</th>
				<th>Kondisi Rusak</th>
				<th>Kondisi Sedang</th>
				<th>Kondisi Baik</th>

			</tr>
		</thead>
		
		<tbody>

			<?php $i = 1 ?>
			
			@foreach( $terumbumilik as $mil )

				<tr>
					<td>{{ $i++ }}</td>
					<td>{{ $mil->datakecamatan->nama }}</td>
					<td>{{ $mil->datadesa->nama }}</td>
					<td>{{ $mil->luas_lahan }} M<sup>2</sup></td>
					<td>{{ $mil->kondisi_rusak }} M<sup>2</sup></td>
					<td>{{ $mil->kondisi_sedang }} M<sup>2</sup></td>
					<td>{{ $mil->kondisi_baik }} M<sup>2</sup></td>
				</tr>

			@endforeach
		</tbody>
	</table>