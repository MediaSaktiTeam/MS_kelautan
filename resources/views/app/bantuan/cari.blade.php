<table class="table table-hover demo-table-dynamic custom" id="tableWithDynamicRows">
	<thead>
		<tr>
			<th>
				<button class="btn btn-check" data-toggle="modal" data-target="#modal-hapus" disabled id="hapus"><i class="pg-trash"></i></button>
			</th>
			<th>No.</th>
			<th>Nama Anggota</th>
			<th>Bidang Usaha</th>
			<th>Nama Kelompok</th>
			<th>Jenis Bantuan</th>
			<th>Tahun</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1 ?>
		@foreach( $bantuan_users as $bu )

			<tr>
				<td>
					<div class="checkbox">
						<input type="checkbox" class="pilih" value="{{ $bu->id }}|{{ $bu->tahun_bantuan }}" id="pb{{ $bu->id }}|{{ $bu->tahun_bantuan }}">
						<label for="pb{{ $bu->id }}|{{ $bu->tahun_bantuan }}" class="m-l-20"></label>
					</div>
				</td>
				<td>{{ $no }}</td>
				<td>{{ $bu->name }}</td>
				<td>{{ $bu->profesi }}</td>
				<td>{{ $bu->nama_kelompok }}</td>
				<td>
					<ul class="list-unstyled">
						<?php

							$bantuan = DB::table('app_bantuan as ab')
											->leftJoin('app_bantuan_master as abm', 'abm.id', '=', 'ab.id_bantuan')
												->select('abm.nama')
													->where('ab.id_user', $bu->id)
													->where('ab.tahun', $bu->tahun_bantuan)
													->orderBy('ab.tahun', 'asc')
													->get(); ?>
						@foreach( $bantuan as $b )
							<li><i class="fa fa-check-square-o"></i>  {{ $b->nama }}</li>
						@endforeach
					</ul>

				</td>
				<td>{{ $bu->tahun_bantuan }}</td>
				<td>
					<a href="{{ route('ref_bantuan_edit', [ $bu->id, $bu->tahun_bantuan]) }}" class="btn btn-edit btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
				</td>
			</tr>

		<?php $no++ ?>

		@endforeach

	</tbody>
</table>