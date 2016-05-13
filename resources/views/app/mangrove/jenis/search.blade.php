<script>
$(function(){
	$(".btn-hapus-single").click(function(){
		var id = $(this).data('id');
		$(".btn-hapus").attr('href',"{{ url('/app/mangrove/jenis/hapus') }}/"+id);
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
			<th>Nama Kecamatan</th>
			<th>Jenis Mangrove</th>
			<th style="text-align:center">Aksi</th>
		</tr>
	</thead>

	<tbody>

		@if ( count($mangrovejenis) > 0 )

			@foreach( $mangrovejenis as $jen )
				<tr>
					<td>
						<button class="btn btn-xs btn-danger btn-hapus-single"  data-toggle="modal" data-target="#modal-hapus" data-id="{{ $jen->id }}" ><i class="pg-trash"></i></button>
					</td>
					<td>{{ $jen->nama_kecamatan }}</td>
					<td>{{ $jen->jenis_mangrove }}</td>
					<td style="text-align:center">
						<a href="{{ route('mangrovejenis_edit', $jen->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
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
