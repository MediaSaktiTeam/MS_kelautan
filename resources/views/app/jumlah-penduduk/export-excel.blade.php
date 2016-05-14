	<table class="table table-bordered table-responsive">
		<thead>
			<tr>
				<th>No.</th>
				<th>Nama Kecamatan</th>
				<th>Laki-laki (org)</th>
				<th>Perempuan (org)</th>
				<th>Jumlah KK</th>
				<th>Total</th>

			</tr>
		</thead>
		
		<tbody>

			<?php $i = 1; ?>
			
			@foreach( $jumlahpenduduk as $jp )
			<?php 
				$total= $jp->laki + $jp->perempuan;
			 ?>

				<tr>
					<td>{{ $i++ }}</td>
					<td>{{ $jp->datakecamatan->nama }}</td>
					<td>{{ $jp->laki }}</td>
					<td>{{ $jp->perempuan }}</td>
					<td>{{ $jp->jumlah_kk }}</td>
					<td>{{ $total }}</td>
					<td>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>