<script>
$(function(){
	$(".btn-hapus-single").click(function(){
		var id = $(this).data('id');
		$(".btn-hapus").attr('href',"{{ route('terumburehabilitasi_delete') }}/"+id);
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
			<th>Nama Desa</th>
			<th>Direhabilitasi</th>
			<th style="text-align:center">Aksi</th>
		</tr>
	</thead>

	<tbody>

		@if ( count($terumburehabilitasi) > 0 )

			@foreach( $terumburehabilitasi as $rehab )
				<tr>
					<td>
						<button class="btn btn-xs btn-danger btn-hapus-single"  data-toggle="modal" data-target="#modal-hapus" data-id="{{ $rehab->id }}" ><i class="pg-trash"></i></button>
					</td>
					<td>{{ $rehab->nama_kecamatan }}</td>
					<td>{{ $rehab->nama_desa }}</td>
					<td>{{ $rehab->direhabilitasi }} M<sup>2</sup></td>
					<td style="text-align:center">
						<a class="btn btn-default btn-xs view" data-id="{{ $rehab->id }}"><i class="fa fa-search-plus"></i></a>
						<a href="{{ route('terumburehabilitasi_edit', $rehab->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
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
