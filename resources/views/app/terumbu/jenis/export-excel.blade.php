	<table class="table table-bordered table-responsive">
		<thead>
			<tr>
				<th>No.</th>
				<th>Nama Kecamatan</th>
				<th>Jenis Ikan Karang</th>

			</tr>
		</thead>
		
		<tbody>

			<?php $i = 1 ?>
			
			@foreach( $terumbujenis as $jen )

				<tr>
					<td>{{ $i++ }}</td>
					<td>{{ $jen->datakecamatan->nama }}</td>
					<td>{{ $jen->jenis_ikan }}</td>
				</tr>

			@endforeach
		</tbody>
	</table>