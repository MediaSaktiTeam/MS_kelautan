<script>
$(function(){
	$(".btn-hapus-single").click(function(){
		var id = $(this).data('id');
		$(".btn-hapus").attr('href',"{{ route('nelayan_hapus') }}/"+id);
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

		@if ( count($nelayan) > 0 )

			@foreach( $nelayan as $nel )
				<tr>
					<td>
						<button class="btn btn-xs btn-danger btn-hapus-single"  data-toggle="modal" data-target="#modal-hapus" data-id="{{ $nel->id }}" ><i class="pg-trash"></i></button>
					</td>
					<td>{{ $nel->name }}</td>
					<td>{{ $nel->nama_kelompok }}</td>
					<td>{{ $nel->nama_jabatan }}</td>
					<td style="text-align:center">
						<a class="btn btn-default btn-xs view" data-id="{{ $nel->id }}"><i class="fa fa-search-plus"></i></a>
						<a href="{{ route('nelayan_edit',$nel->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
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