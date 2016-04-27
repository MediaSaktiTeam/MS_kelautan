

	<table class="table table-bordered table-responsive">
		<thead>
			<tr>
				<th>No.</th>
				<th>Kecamatan</th>
				<th>Desa</th>
				<th>Petani/RTP</th>
				<th>Luas Areal (Ha)</th>
				<th>Luas Tanam (Ha)</th>
				<th>Penebaran Mas</th>
				<th>Penebaran Nila</th>
				<th>Penebaran Lele</th>
				<th>Penebaran Bawal</th>
				<th>Jumlah Hidup Mas</th>
				<th>Jumlah Hidup Nila</th>
				<th>Jumlah Hidup Lele</th>
				<th>Jumlah Hidup Bawal</th>
			</tr>
		</thead>
		
		<tbody>

		<?php $i = 1 ?>

		@foreach( $airtawar as $at )

			<tr>
				<td><?php echo $i  ?></td>
				<td>{{ $at->datakecamatan->nama }}</td>
				<td>{{ $at->desa }}</td>
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
			</tr>
				
			<?php $i = $i + 1 ?>

		@endforeach
			
		</tbody>
	</table>