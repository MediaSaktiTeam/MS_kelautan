<?php $Ms = new App\Custom; ?>

<table class="table table-hover demo-table-dynamic custom" id="tableWithDynamicRows">
	<tbody>
		<tr>
			<td style="width:250px">NIK</td>
			<td><b>{{ $pengolah->nik }}</b></td>
		</tr>
		<tr>
			<td>Nama Lengkap</td>
			<td><b>{{ $pengolah->name }}</b></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td><b>{{ $pengolah->alamat }}</b></td>
		</tr>
		<tr>
			<td>Nama Kelompok</td>
			<td><b>{{ $pengolah->kelompok->nama }}</b></td>
		</tr>
		<tr>
			<td>Jabatan</td>
			<td><b>{{ $pengolah->jabatan->nama }}</b></td>
		</tr>

		<tr>
			<td>Jenis Olahan</td>
			<td><b>{{ $pengolah->olahan->jenis }}</b></td>
		</tr>

		<tr>
			<td>Legalitas Produksi</td>
			<td><b>{{ $pengolah->legalitas_produksi }}</b></td>
		</tr>

		<tr>
			<td>Merek Dagang</td>
			<td><b>{{ $pengolah->merekdagang->merek }}</b></td>
		</tr>

		<tr>
			<td>Modal yang dimiliki</td>
			<td><b>{{ $pengolah->modal_dimiliki }}</b></td>
		</tr>

		<tr>
			<td>Modal Pinjaman</td>
			<td><b>{{ $pengolah->modal_pinjaman }}</b></td>
		</tr>


		<tr>
			<td>Omzet Perbulan</td>
			<td><b>{{ $pengolah->omzet_perbulan }}</b></td>
		</tr>

		<tr>
			<?php $Ksarana = App\KepemilikanSarana::where('id_user', $pengolah->id)->get(); ?>
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

<h5>Data Produksi</h5>

<?php
	
	$produksi = DB::table('produksi as p')
						->leftJoin('users as u', 'p.id_user', '=', 'u.id')
						->select('p.*','u.id as id_user', 'u.name')
						->where('u.id', $pengolah->id)
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