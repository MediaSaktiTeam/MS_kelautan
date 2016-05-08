	<table class="table table-bordered table-responsive">
		<thead>
			<tr>
				<th>No.</th>
				<th>NIK</th>
				<th>Nama Lengkap</th>
				<th>Alamat</th>
				<th>RT</th>
				<th>Telepon</th>
				<th>Kode POS</th>
				<th>Nama Kelompok</th>
				<th>Jabatan Kelompok</th>
				<th>Jenis Usaha</th>
				<th>Spesifik Usaha</th>
				<th>Sarana/Prasarana yang dimiliki</th>
				<th>Bantuan yang pernah didapatkan</th>

			</tr>
		</thead>
		
		<tbody>

			<?php $i = 1 ?>

			@foreach( $pembudidaya as $pb )

				<tr>
					<td><?php echo $i++  ?></td>
					<td>{{ $pb->nik }}</td>
					<td>{{ $pb->name }}</td>
					<td>{{ $pb->alamat }}</td>
					<td>{{ $pb->erte }}</td>
					<td>{{ $pb->tlp }}</td>
					<td>{{ $pb->pos }}</td>
					<td>{{ $pb->kelompok->nama }}</td>
					<td>{{ $pb->jabatan->nama }}</td>
					<td>{{ $pb->usaha->jenis }}</td>
					<td>{{ $pb->usaha->nama }}</td>
					<td>
						<?php $Ksarana = App\KepemilikanSarana::where('id_user', $pb->id)->get(); ?>
						<?php $nmr = 1 ?>
						@foreach ( $Ksarana as $ks )
							{{ $nmr++ > 1 ? ", ".$ks->sarana->sub : $ks->sarana->sub }}
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
						<?php $nmr = 1 ?>
						@foreach( $bantuan as $b )
							 {{ $nmr++ > 1 ? ", ":"" }} {{ $b->tahun }}: {{ $b->nama }} 
						@endforeach
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>