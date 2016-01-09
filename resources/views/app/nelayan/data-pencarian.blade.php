<table class="table table-hover demo-table-dynamic custom" id="tableWithDynamicRows">
	<thead>
		<tr>
			<th>
				<button class="btn btn-check" data-toggle="modal" data-target="#modal-hapus" disabled id="hapus"><i class="pg-trash"></i></button>
			</th>
			<th>Nama Lengkap</th>
			<th>Nama Kelompok</th>
			<th>Jabatan Kelompok</th>
			<th style="text-align:center">Aksi</th>
		</tr>
	</thead>
	<tbody>
		@foreach( $nelayan as $nel )
			<tr>
				<td>
					<div class="checkbox">
						<input type="checkbox" class="pilih" value="{{ $nel->id }}" id="pb{{ $nel->id }}">
						<label for="pb{{ $nel->id }}" class="m-l-20"></label>
					</div>
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
	</tbody>
</table>