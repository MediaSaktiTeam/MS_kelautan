
	<table class="table table-bordered">
		<thead>
			<tr>
				<th rowspan="2">No.</th>
				<th rowspan="2">NIK</th>
				<th rowspan="2">Nama Lengkap</th>
				<th rowspan="2">Alamat</th>
				<th rowspan="2">Nama Kelompok</th>
				<th rowspan="2">Bidang Usaha</th>
				<th colspan="3">Bantuan yang didapatkan</th>
			</tr>
			<tr>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th>Tahun</th>
				<th>Program</th>
				<th>Bantuan</th>
			</tr>
		</thead>
		
		<tbody>

			<?php $no = 1 ?>
			@foreach( $bantuan_users as $bu )

				<?php

					if ( $no > 1 ) {
						if ( $id_user == $bu->id && $tb == $bu->tahun_bantuan )
							continue;
					}

					$id_user = $bu->id;
					$tb = $bu->tahun_bantuan;

				?>
				
				<tr>
					<td><?php echo $no++ ?></td>
					<td>{{ $bu->nik }}</td>
					<td>{{ $bu->name }}</td>
					<td>{{ $bu->alamat }}</td>
					<td>{{ $bu->nama_kelompok }}</td>
					<td>{{ $bu->profesi }}</td>
					<td>{{ $bu->tahun_bantuan }}</td>
					<td>{{ $bu->nama_program }}</td>
					<td>
						<?php

							$bantuan = DB::table('app_bantuan as ab')
											->leftJoin('app_bantuan_master as abm', 'abm.id', '=', 'ab.id_bantuan')
												->select('abm.nama')
													->where('ab.id_user', $bu->id)
													->where('ab.tahun', $bu->tahun_bantuan)
													->orderBy('ab.tahun', 'asc')
													->get(); ?>
						<?php $i = 1 ?>
						@foreach( $bantuan as $b )
							{{ $i++ > 1 ? ", ".$b->nama:$b->nama }} 
						@endforeach

					</td>
				</tr>

			@endforeach

		</tbody>
	</table>