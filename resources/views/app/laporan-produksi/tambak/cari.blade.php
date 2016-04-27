<script>
$(function(){
	$(".btn-hapus-single").click(function(){
		var id = $(this).data('id');
		$(".btn-hapus").attr('href',"{{ route('kelompok_hapus') }}/"+id);
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
			<th>ID Kelompok</th>
			<th>Nama Kelompok</th>
			<th>Bidang Usaha</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>

		@if ( count($kelompok) > 0 )

			@foreach($kelompok as $kel)

				<tr>
					<td>
					<?php $data_user = App\User::where('id_kelompok', $kel->id_kelompok)->count(); ?>

						<?php
							$title = "";
							$disabled = "";
							if ( $data_user >= 1 ):
								$title = "Kelompok sedang terpakai";
								$disabled = "disabled";
							endif
						?>
						<button class="btn btn-xs btn-danger btn-hapus-single"  title="{{ $title }}" data-toggle="modal" data-target="#modal-hapus" data-id="{{ $kel->id_kelompok }}" {{ $disabled }}><i class="pg-trash"></i></button>
					
					</td>
					<td>{{ $kel->id_kelompok }}</td>
					<td>{{ $kel->nama }}</td>
					<td>{{ $kel->tipe }}</td>
					<td>
						<a class="btn btn-default btn-xs view" data-id="{{ $kel->id_kelompok }}" data-toggle="modal" data-target="#modal-view"><i class="fa fa-search-plus"></i></a>
						<a href="javascript:;"
							data-id="{{ $kel->id_kelompok }}"
							data-nama="{{ $kel->nama }}"
							data-tipe="{{ $kel->tipe }}"
							data-alamat="{{ $kel->alamat }}"
							data-norek="{{ $kel->no_rekening }}"
							data-narek="{{ $kel->nama_rekening }}"
							data-bank="{{ $kel->nama_bank }}" class="btn btn-edit btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
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