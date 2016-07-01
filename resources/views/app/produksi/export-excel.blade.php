<?php $Ms = new App\Custom ?>

	<table class="table table-bordered table-responsive">
		<thead>
			<tr>
				<th>No.</th>
				<th>Nama Lengkap</th>
				<th>Jenis Produksi</th>
				@if ( $Ms->dek($_GET['pr']) == 'Nelayan' )
					<th>Jenis Ikan</th>
				@endif
				<th>Biaya Produksi</th>
				<th>Jumlah Produki</th>
				<th>Waktu Produksi</th>
			</tr>
		</thead>
		
		<tbody>

			<?php $i = 1 ?>
			
			@foreach( $produksi as $per )

				<tr>
					<td><?php echo $i  ?></td>
					<td>{{ $per->name }}</td>
					<td>{{ $per->jenis_produksi }}</td>
					@if ( $Ms->dek($_GET['pr']) == 'Nelayan' )
						<td>{{ $per->jenis_ikan }}</td>
					@endif
					<td>{{ $per->biaya_produksi }}</td>
					<td>{{ $per->jumlah_produksi }}</td>
					<td>{{ $per->waktu_produksi }}</td>
				</tr>

				<?php $i = $i + 1 ?>

			@endforeach
		</tbody>
	</table>