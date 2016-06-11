<script>
$(function(){
	$(".btn-hapus-single").click(function(){
		var id = $(this).data('id');
		$(".btn-hapus").attr('href',"{{ route('pembudidaya_hapus') }}/"+id);
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
			<th style="text-align:center">Aksi</th>
		</tr>
	</thead>

	<tbody>

		@if ( count($pembudidaya) > 0 )

			@foreach( $pembudidaya as $pb )
				<tr>
					<td>
						<button class="btn btn-xs btn-danger btn-hapus-single"  data-toggle="modal" data-target="#modal-hapus" data-id="{{ $pb->id }}" ><i class="pg-trash"></i></button>
					</td>
					<td>{{ $pb->name }}</td>
					<td>{{ $pb->nama_kelompok }}</td>
					<td>{{ $pb->nama_jabatan }}</td>
					<td style="text-align:center">
						<a class="btn btn-default btn-xs view" data-id="{{ $pb->id }}"><i class="fa fa-search-plus"></i></a>
						<a href="{{ route('pembudidaya_edit',$pb->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
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
