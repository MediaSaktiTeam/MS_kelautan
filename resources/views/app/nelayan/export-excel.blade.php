	<table class="table table-bordered table-responsive">
		<thead>
			<tr>
				<th>No.</th>
				<th>NIK</th>
				<th>No Kartu Nelayan</th>
				<th>Nama Lengkap</th>
				<th>Alamat</th>
				<th>RT</th>
				<th>Telepon</th>
				<th>Kode POS</th>
				<th>Nama Kelompok</th>
				<th>Jabatan Kelompok</th>
				<th>Sarana/Prasarana yang dimiliki</th>
				<th>Bantuan yang pernah didapatkan</th>

			</tr>
		</thead>
		
		<tbody>

			<?php $i = 1 ?>
			
			@foreach( $nelayan as $nel )

				<tr>
					<td><?php echo $i  ?></td>
					<td>{{ $nel->nik }}</td>
					<td>{{ $nel->no_kartu_nelayan }}</td>
					<td>{{ $nel->name }}</td>
					<td>{{ $nel->alamat }}</td>
					<td>{{ $nel->erte }}</td>
					<td>{{ $nel->tlp }}</td>
					<td>{{ $nel->pos }}</td>
					<td>{{ $nel->kelompok->nama }}</td>
					<td>{{ $nel->jabatan->nama }}</td>
					<td>
						<?php $Ksarana = App\KepemilikanSarana::where('id_user', $nel->id)->get(); ?>
						@foreach ( $Ksarana as $ks )
							- {{ $ks->sarana->jenis }} {{ $ks->sarana->sub }}
						@endforeach
					</td>
					<td>
						<?php
							$bantuan = DB::table('app_bantuan as ab')
											->leftJoin('app_bantuan_master as abm', 'abm.id', '=', 'ab.id_bantuan')
												->select('abm.nama', 'ab.tahun')
													->where('ab.id_user', $nel->id)
													->orderBy('ab.tahun', 'asc')
													->get(); ?>
						@foreach( $bantuan as $b )
							 {{ $b->tahun }}:</b> {{ $b->nama }} 
						@endforeach
					</td>
				</tr>

				<?php $i = $i + 1 ?>

			@endforeach
		</tbody>
	</table>