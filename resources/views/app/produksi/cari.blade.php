<table class="table table-hover demo-table-dynamic custom">
	<thead>
		<tr>
			<th>No.</th>
			<th>Nama Lengkap</th>
			<th>Jenis Produksi</th>
			<th>Jenis Ikan</th>
			<th>Biaya Produksi</th>
			<th style="text-align:center">Aksi</th>
		</tr>
	</thead>

	<tbody>
		<?php $no = 1 ?>
		<?php $Ms = new App\Custom ?>

		@if ( count($produksi) > 0 )

			@foreach($produksi as $per)
				<tr>
					<td>{{ $no++ }}</td>
					<td>{{ $per->name }}</td>
					<td>{{ $per->jenis_produksi }}</td>
					<td>{{ $per->jenis_ikan }}</td>
					<td>{{ $Ms->rupiah($per->biaya_produksi) }}</td>
					<td style="text-align:center">
						<a href="{{ url('/app/produksi/edit') }}/{{ $per->id }}?offset={{ $offset }}&limit={{ $limit }}&pr={{ $Ms->enk($_GET['pr']) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>

						<a onclick="return confirm('Anda ingin menghapus data ini?')" href="{{ url('/app/produksi/hapus') }}/{{ $per->id }}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>

					</td>
				</tr>
			@endforeach

		@else
			<tr>
				<td colspan="7"  class="not-found">
					<img src="{{ url('resources/assets/app/img/not_found.png') }}" alt="">
					<span>Tidak ada data</span>
				</td>
			</tr>
		@endif
	</tbody>

</table>