	<table class="table table-bordered table-responsive">
		<thead>
			<tr>
				<th>No.</th>
				<th>Nama Kecamatan</th>
				<th>Jenis Mangrove</th>
			</tr>
		</thead>
		
		<tbody>

			<?php $i = 1 ?>
			
			@foreach( $mangrovejenis as $jen )

				<tr>
					<td><?php echo $i++  ?></td>
					<td>{{ $jen->datakecamatan->nama }}</td>
					<td>{{ $jen->jenis_mangrove }}</td>
				</tr>

			@endforeach
		</tbody>
	</table>