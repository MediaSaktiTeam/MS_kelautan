	<table class="table table-bordered table-responsive">
		<thead>
			<tr>
				<th>No.</th>
				<th>Nama Kecamatan</th>
				<th>Nama Desa</th>
				<th>Direhabilitasi</th>

			</tr>
		</thead>
		
		<tbody>

			<?php $i = 1 ?>
			
			@foreach( $terumburehabilitasi as $rehab )

				<tr>
					<td>{{ $i++ }}</td>
					<td>{{ $rehab->datakecamatan->nama }}</td>
					<td>{{ $rehab->datadesa->nama }}</td>
					<td>{{ $rehab->direhabilitasi }} M<sup>2</sup></td>
				</tr>

			@endforeach
		</tbody>
	</table>