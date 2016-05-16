<script>
$(function(){
	$(".btn-hapus-single").click(function(){
		var id = $(this).data('id');
		$(".btn-hapus").attr('href',"{{ url('/app/jumlah-penduduk/delete') }}/"+id);
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
			<th>Laki Laki (org)</th>
			<th>Perempuan (org)</th>
			<th>Jumlah KK</th>
			<th>Total</th>
			<th style="text-align:center">Aksi</th>
		</tr>
	</thead>

	<tbody>

		@if ( count($jumlah_penduduk) > 0 )

			@foreach( $jumlah_penduduk as $jp )
				@php($total2= $jp->laki + $jp->perempuan)
				<tr>
					<td>
						<button class="btn btn-xs btn-danger btn-hapus-single"  data-toggle="modal" data-target="#modal-hapus" data-id="{{ $jp->id }}" ><i class="pg-trash"></i></button>
					</td>
					<td>{{ $jp->nama_kecamatan }}</td>
					<td>{{ $jp->laki }}</td>
					<td>{{ $jp->perempuan }}</td>
					<td>{{ $jp->jumlah_kk }}</td>
					<td><?php echo $total2; ?></td>
					<td style="text-align:center">
						<a class="btn btn-default btn-xs view" data-id="{{ $jp->id }}"><i class="fa fa-search-plus"></i></a>
						<a href="{{ url('/app/pengolah/edit/'.$jp->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
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
