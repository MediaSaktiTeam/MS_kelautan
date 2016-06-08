<script>
$(function(){
	$(".btn-hapus-single").click(function(){
		var id = $(this).data('id');
		$(".btn-hapus").attr('href',"{{ url('/app/airtawar/hapus') }}/"+id);
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
			<th>Kecamatan</th>
			<th>Desa</th>
			<th>Petani/RTP</th>
			<th>Luas Areal (Ha)</th>
			<th>Luas Tanam (Ha)</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>

		@if ( count($airtawar) > 0 )

			@foreach($airtawar as $at)

				<tr>
					<td>
						<button class="btn btn-xs btn-danger btn-hapus-single" data-toggle="modal" data-target="#modal-hapus" data-id="{{ $at->id }}"><i class="pg-trash"></i></button>
					</td>
					<td>{{ $at->nama_kecamatan }}</td>
					<td>{{ $at->nama_desa }}</td>
					<td>{{ $at->rtp }}</td>
					<td>{{ $at->luas_areal }} Ha</td>
					<td>{{ $at->luas_tanam }} Ha</td>
					<td>
						<a class="btn btn-default btn-xs view" data-id="{{ $at->id }}" data-toggle="modal" data-target="#modal-view"><i class="fa fa-search-plus"></i></a>
						<a href="{{ route('airtawar_edit',$at->id) }}" class="btn btn-edit btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
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