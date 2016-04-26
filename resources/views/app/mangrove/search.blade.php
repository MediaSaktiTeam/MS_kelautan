<script>
$(function(){
	$(".btn-hapus-single").click(function(){
		var id = $(this).data('id');
		$(".btn-hapus").attr('href',"{{ url('/app/pengolah/hapus') }}/"+id);
		$("#modal-hapus").modal('hapus');
	});
});
</script>
<table class="table table-hover demo-table-dynamic custom" id="tableWithDynamicRows">
	<thead>
		<tr>
			<th>
				<center>#</center>
			</th>
			<th>Nama Lengkap</th>
			<th>Nama Kelompok</th>
			<th>Jabatan Kelompok</th>
			<th>Jenis Olahan</th>
			<th style="text-align:center">Aksi</th>
		</tr>
	</thead>

	<tbody>

		@if ( count($pengolah) > 0 )

			@foreach( $pengolah as $pe )
				<tr>
					<td>
						<button class="btn btn-xs btn-danger btn-hapus-single"  data-toggle="modal" data-target="#modal-hapus" data-id="{{ $pe->id }}" ><i class="pg-trash"></i></button>
					</td>
					<td>{{ $pe->name }}</td>
					<td>{{ $pe->nama_kelompok }}</td>
					<td>{{ $pe->nama_jabatan }}</td>
					<td>{{ $pe->jenis_olahan }}</td>
					<td style="text-align:center">
						<a class="btn btn-default btn-xs view" data-id="{{ $pe->id }}"><i class="fa fa-search-plus"></i></a>
						<a href="{{ url('/app/pengolah/edit/'.$pe->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
					</td>
				</tr>
			@endforeach

		@else
			<tr>
				<td colspan="6" class="not-found">
					<img src="{{ url('resources/assets/app/img/not_found.png') }}" alt="">
					<span>Tidak menemukan data</span>
				</td>
			</tr>
		@endif
		
	</tbody>

</table>
