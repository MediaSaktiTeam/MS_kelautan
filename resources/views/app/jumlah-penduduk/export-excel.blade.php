	<table class="table table-bordered table-responsive">
		<thead>
			<tr>
				<th>No.</th>
				<th>Nama Kecamatan</th>
				<th>Laki Laki (org)</th>
				<th>Perempuan (org)</th>
				<th>Jumlah KK</th>
				<th>Total</th>

			</tr>
		</thead>
		
		<tbody>

			<?php $i = 1 ?>
			
			@foreach( $jumlah_penduduk as $jp )

				@php($total2= $jp->laki + $jp->perempuan)

				<tr>
					<td>{{ $i++ }}</td>
					<td>{{ $jp->datakecamatan->nama }}</td>
					<td>{{ $jp->laki }}</td>
					<td>{{ $jp->perempuan }}</td>
					<td>{{ $jp->jumlah_kk }}</td>
					<td>{{ $total2 }}</td>
				</tr>

			@endforeach
		</tbody>
	</table>