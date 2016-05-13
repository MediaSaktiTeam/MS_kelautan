	<table class="table table-bordered table-responsive">
		<thead>
			<tr>
				<th>No.</th>
				<th>Nama Kecamatan</th>
				<th>Nama Desa</th>
				<th>Direhabilitasi</th>
				<th>Berubah Fungsi</th>
				<th>Lahan Tambak</th>
				<th>Penggaraman</th>
			</tr>
		</thead>
		
		<tbody>

			<?php $i = 1 ?>
			
			@foreach( $mangroverehabilitasi as $rehab )

				<tr>
					<td><?php echo $i  ?></td>
					<td>{{ $rehab->datakecamatan->nama }}</td>
					<td>{{ $rehab->datadesa->nama }}</td>
					<td>{{ $rehab->direhabilitasi }} M<sup>2</sup></td>
					<td>{{ $rehab->berubah_fungsi }} M<sup>2</sup></td>
					<td>{{ $rehab->lahan_tambak }} M<sup>2</sup></td>
					<td>{{ $rehab->penggaraman }} M<sup>2</sup></td>
				</tr>

				<?php $i = $i + 1 ?>

			@endforeach
		</tbody>
	</table>