<?php $Ms = new App\Custom; ?>

<table class="table table-hover demo-table-dynamic custom" id="tableWithDynamicRows">
	<tbody>
		<tr>
			<td style="width:250px">NIK</td>
			<td><b>{{ $pembudidaya->nik }}</b></td>
		</tr>
		<tr>
			<td>Nama Lengkap</td>
			<td><b>{{ $pembudidaya->name }}</b></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td><b>{{ $pembudidaya->alamat }}</b></td>
		</tr>
		<tr>
			<td>RT</td>
			<td><b>{{ $pembudidaya->erte }}</b></td>
		</tr>
		<tr>
			<td>Telepon</td>
			<td><b>{{ $pembudidaya->tlp }}</b></td>
		</tr>
		<tr>
			<td>Kode POS</td>
			<td><b>{{ $pembudidaya->pos }}</b></td>
		</tr>
		<tr>
			<td>Nama Kelompok</td>
			<td><b>{{ $pembudidaya->kelompok->nama }}</b></td>
		</tr>
		<tr>
			<td>Jabatan</td>
			<td><b>{{ $pembudidaya->jabatan->nama }}</b></td>
		</tr>

		<tr>
			<td>Jenis Usaha</td>
			<td><b>
					{{ $pembudidaya->usaha->jenisusaha->nama }} 
					&nbsp; <i class="fa fa-angle-double-right"></i> &nbsp; 
					{{ $pembudidaya->usaha->nama }}
				</b>
			</td>
		</tr>

		<tr>
			<?php $Ksarana = App\KepemilikanSarana::where('id_user', $pembudidaya->id)->get(); ?>
			<td>Sarana / Prasarana yang dimiliki</td>
			<td><b>
					@foreach ( $Ksarana as $ks )
						<i class="fa fa-check-square-o"></i> {{ $ks->sarana->sub }} <br>
					@endforeach
				</b>
			</td>
		</tr>

	</tbody>
</table>

<h5>Data Produksi</h5>

<?php
	
	$produksi = DB::table('produksi as p')
						->leftJoin('users as u', 'p.id_user', '=', 'u.id')
						->select('p.*','u.id as id_user', 'u.name')
						->where('u.id', $pembudidaya->id)
						->orderBy('p.id','asc')
						->get();

?>
<table class="table table-bordered demo-table-dynamic custom" id="tableWithDynamicRows">
	<tr>
		<th>Tanggal</th>
		<th>Jenis Produksi</th>
		<th>Biaya Produksi</th>
	</tr>

	@if ( count($produksi) > 0 )

		@foreach( $produksi as $pr )
			<tr>
				<td>{{ $Ms->tgl_indo($pr->created_at) }}</td>
				<td>{{ $pr->jenis_produksi }}</td>
				<td>{{ $Ms->rupiah($pr->biaya_produksi) }}</td>
			</tr>
		@endforeach

	@else 

		<tr>
			<td colspan="3">Tidak ada data</td>
		</tr>

	@endif

</table>


<h5>Bantuan yang pernah didapatkan</h5>

<?php

	$bantuan_users = DB::table('app_bantuan as ab')
						->leftJoin('users as u', 'u.id', '=', 'ab.id_user')
						->leftJoin('app_kelompok as ak', 'u.id_kelompok', '=', 'ak.id_kelompok')
						->select('u.*','ak.nama as nama_kelompok', 'ab.tahun as tahun_bantuan')
							->where('u.id', $pembudidaya->id)
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