<script>
$(function(){
	$(".btn-hapus-single").click(function(){
		var id = $(this).data('id');
		$(".btn-hapus").attr('href',"{{ url('/app/kjaairlaut/hapus') }}/"+id);
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
			<th>Lokasi</th>
			<th>Jumlah RTP</th>
			<th>Potensi</th>
			<th>Luas Tanam</th>
			<th>Keterangan</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>

		@if ( count($kjaairlaut) > 0 )

			@foreach($kjaairlaut as $kal)

				<tr>
					<td>
						<button class="btn btn-xs btn-danger btn-hapus-single" data-toggle="modal" data-target="#modal-hapus" data-id="{{ $kal->id }}"><i class="pg-trash"></i></button>
					</td>
					<td>{{ $kal->lokasi }}</td>
					<td>{{ $kal->rtp }}</td>
					<td>{{ $kal->potensi }}</td>
					<td>{{ $kal->luas_tanam }}</td>
					<td>{{ $kal->keterangan }}</td>
					<td style="text-align:center">
					<a class="btn btn-default btn-xs view" data-id="{{ $kal->id }}"><i class="fa fa-search-plus"></i></a>
					<a href="{{ route('kjaairlaut_edit',$kal->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
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