<table class="table table-hover demo-table-dynamic custom" id="tableWithDynamicRows">
	<tbody>
		<tr>
			<td style="width:250px">NIK</td>
			<td><b>{{ $nelayan->nik }}</b></td>
		</tr>
		<tr>
			<td style="width:250px">No Kartu Nelayan</td>
			<td><b>{{ $nelayan->no_kartu_nelayan }}</b></td>
		</tr>
		<tr>
			<td>Nama Lengkap</td>
			<td><b>{{ $nelayan->name }}</b></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td><b>{{ $nelayan->alamat }}</b></td>
		</tr>
		<tr>
			<td>Nama Kelompok</td>
			<td><b>{{ $nelayan->kelompok->nama }}</b></td>
		</tr>
		<tr>
			<td>Jabatan</td>
			<td><b>{{ $nelayan->jabatan->nama }}</b></td>
		</tr>

		<tr>
			<?php $Ksarana = App\KepemilikanSarana::where('id_user', $nelayan->id)->get(); ?>
			<td>Sarana / Prasarana yang dimiliki</td>
			<td><b>
					@foreach ( $Ksarana as $ks )
						<i class="fa fa-check-square-o"></i> 
							{{ $ks->sarana->jenis }}
							&nbsp; <i class="fa fa-angle-double-right"></i> &nbsp;
							{{ $ks->sarana->sub }} 
						<br>
					@endforeach
				</b>
			</td>
		</tr>

	</tbody>
</table>

<h5>Bantuan yang pernah didapatkan</h5>

<?php

	$bantuan_users = DB::table('app_bantuan as ab')
						->leftJoin('users as u', 'u.id', '=', 'ab.id_user')
						->leftJoin('app_kelompok as ak', 'u.id_kelompok', '=', 'ak.id_kelompok')
						->select('u.*','ak.nama as nama_kelompok', 'ab.tahun as tahun_bantuan')
							->where('u.id', $nelayan->id)
							->orderBy('ab.id', 'desc')
							->orderBy('ab.id_user', 'desc')
							->orderBy('ab.tahun', 'desc')
							->get();
?>

@if ( count($bantuan_users) > 0 )

	<table class="table table-bordered demo-table-dynamic custom" id="tableWithDynamicRows">
		<tbody>

			
			<tr>
				<th style="width:100px">Tahun</th>
				<th>Nama Bantuan</th>
			</tr>

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
					<td>{{ $bu->tahun_bantuan }}</td>
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
				</tr>

				<?php $no++ ?>

			@endforeach

		</tbody>
	</table>

@else

	<span style="color:red">Belum pernah mendapatkan bantuan</span>

@endif