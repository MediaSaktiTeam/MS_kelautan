<script>
$(function(){
	$(".btn-hapus-single").click(function(){
		var id = $(this).data('id');
		$(".btn-hapus").attr('href',"{{ url('/app/pemasar/hapus') }}/"+id);
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
			<th>Nama UPI</th>
			<th>Pemilik</th>
			<th>Alamat</th>
			<th>No Telp</th>
			<th>Tahun Berdiri</th>
			<th style="text-align:center">Aksi</th>
		</tr>
	</thead>

	<tbody>

		@if ( count($pemasar) > 0 )

			@foreach( $pemasar as $pem )
				<tr>
					<td>
						<button class="btn btn-xs btn-danger btn-hapus-single"  data-toggle="modal" data-target="#modal-hapus" data-id="{{ $pem->id }}" ><i class="pg-trash"></i></button>
					</td>
					<td>{{ $pem->unit_pemasar }}</td>
					<td>{{ $pem->pemilik_pemasar }}</td>
					<td>{{ $pem->alamat_pemasar }}</td>
					<td>{{ $pem->tlp }}</td>
					<td>{{ $pem->tahun_mulai }}</td>
					<td style="text-align:center">
						<a class="btn btn-default btn-xs view" data-id="{{ $pem->id }}"><i class="fa fa-search-plus"></i></a>
						<a href="{{ url('/app/pemmasar/edit/'.$pem->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
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
