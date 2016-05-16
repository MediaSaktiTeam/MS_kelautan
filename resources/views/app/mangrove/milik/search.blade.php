<script>
$(function(){
	$(".btn-hapus-single").click(function(){
		var id = $(this).data('id');
		$(".btn-hapus").attr('href',"{{ route('mangrovemilik_delete') }}/"+id);
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
			<th>Luas Lahan Mangrove</th>
			<th>Kondisi Rusak</th>
			<th>Kondisi Sedang</th>
			<th>Kondisi Baik</th>
			<th style="text-align:center">Aksi</th>
		</tr>
	</thead>

	<tbody>

		@if ( count($mangrovemilik) > 0 )

			@foreach( $mangrovemilik as $mi )
				<tr>
					<td>
						<button class="btn btn-xs btn-danger btn-hapus-single"  data-toggle="modal" data-target="#modal-hapus" data-id="{{ $mi->id }}" ><i class="pg-trash"></i></button>
					</td>
					<td>{{ $mi->nama_kecamatan }}</td>
					<td>{{ $mi->nama_desa }}</td>
					<td>{{ $mi->luas_lahan }} M<sup>2</sup></td>
					<td>{{ $mi->kondisi_rusak }} M<sup>2</sup></td>
					<td>{{ $mi->kondisi_sedang }} M<sup>2</sup></td>
					<td>{{ $mi->kondisi_baik }} M<sup>2</sup></td>
					<td style="text-align:center">
						<a class="btn btn-default btn-xs view" data-id="{{ $mi->id }}"><i class="fa fa-search-plus"></i></a>
						<a href="{{ route('mangrovemilik_edit', $mi->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
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
