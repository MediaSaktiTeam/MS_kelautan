<table class="table table-hover demo-table-dynamic custom" id="tableWithDynamicRows">
	<thead>
		<tr>
			<th>
				<button class="btn btn-check" data-toggle="modal" data-target="#modal-hapus" disabled id="hapus"><i class="pg-trash"></i></button>
			</th>
			<th>Nama Lengkap</th>
			<th>Nama Kelompok</th>
			<th>Jabatan Kelompok</th>
			<th>Jenis Usaha</th>
			<th style="text-align:center">Aksi</th>
		</tr>
	</thead>

	<tbody>

		@if ( count($pembudidaya) > 0 )

		@foreach( $pembudidaya as $pb )
			<tr>
				<td>
					<div class="checkbox">
						<input type="checkbox" class="pilih" value="{{ $pb->id }}" id="pb{{ $pb->id }}">
						<label for="pb{{ $pb->id }}" class="m-l-20"></label>
					</div>
				</td>
				<td>{{ $pb->name }}</td>
				<td>{{ $pb->nama_kelompok }}</td>
				<td>{{ $pb->nama_jabatan }}</td>
				<td>{{ $pb->jenis_usaha }}</td>
				<td style="text-align:center">
					<a class="btn btn-default btn-xs view" data-id="{{ $pb->id }}"><i class="fa fa-search-plus"></i></a>
					<a href="{{ route('pembudidaya_edit',$pb->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
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