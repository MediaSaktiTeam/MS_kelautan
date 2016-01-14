	<table class="table table-bordered table-responsive">
		<thead>
			<tr>
				<th>NIK</th>
				<th>Nama Lengkap</th>
				<th>Nama Kelompok</th>
				<th>Jabatan Kelompok</th>
				<th>Jenis Usaha</th>
				<th>Spesifik Usaha</th>
				<th>Sarana/Prasarana yang dimiliki</th>
				<th>Bantuan yang pernah didapatkan</th>

			</tr>
		</thead>
		
		<tbody>

			@foreach( $pembudidaya as $pb )

			<tr>
				<td>{{ $pb->nik }}</td>
				<td>{{ $pb->name }}</td>
				<td>{{ $pb->kelompok->nama }}</td>
				<td>{{ $pb->jabatan->nama }}</td>
				<td>{{ $pb->usaha->jenis }}</td>
				<td>{{ $pb->usaha->nama }}</td>
				<td>
					<?php $Ksarana = App\KepemilikanSarana::where('id_user', $pb->id)->get(); ?>
					@foreach ( $Ksarana as $ks )
						- {{ $ks->sarana->sub }}
					@endforeach
				</td>
				<td>
						<?php
							$bantuan = DB::table('app_bantuan as ab')
											->leftJoin('app_bantuan_master as abm', 'abm.id', '=', 'ab.id_bantuan')
												->select('abm.nama', 'ab.tahun')
													->where('ab.id_user', $pb->id)
													->orderBy('ab.tahun', 'asc')
													->get(); ?>
						@foreach( $bantuan as $b )
							 {{ $b->tahun }}:</b> {{ $b->nama }} 
						@endforeach
				</td>
			</tr>

			@endforeach
		</tbody>
	</table>