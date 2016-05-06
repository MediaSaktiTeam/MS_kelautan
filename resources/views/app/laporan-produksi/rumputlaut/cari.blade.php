<script>
$(function(){
	$(".btn-hapus-single").click(function(){
		var id = $(this).data('id');
		$(".btn-hapus").attr('href',"{{ url('/app/rumputlaut/hapus') }}/"+id);
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
			<th>Panjang Pantai</th>
			<th>Potensi</th>
			<th>Luas Tanam</th>
			<th>bentangan</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>

		@if ( count($rumputlaut) > 0 )

			@foreach($rumputlaut as $rl)

				<tr>
					<td>
						<button class="btn btn-xs btn-danger btn-hapus-single" data-toggle="modal" data-target="#modal-hapus" data-id="{{ $rl->id }}"><i class="pg-trash"></i></button>
					</td>
					<td>{{ $rl->nama_kecamatan }}</td>
					<td>{{ $rl->nama_desa }}</td>
					<td>{{ $rl->rtp }}</td>
					<td>{{ $rl->panjang_pantai }}</td>
					<td>{{ $rl->potensi }}</td>
					<td>{{ $rl->luas_tanam }} Ha</td>
					<td>{{ $rl->bentangan }}</td>
					<td>
						<a class="btn btn-default btn-xs view" data-id="{{ $rl->id }}" data-toggle="modal" data-target="#modal-view"><i class="fa fa-search-plus"></i></a>
						<a href="{{ route('rumputlaut_edit',$rl->id) }}" class="btn btn-edit btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
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