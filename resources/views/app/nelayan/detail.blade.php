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

<table class="table table-bordered demo-table-dynamic custom" id="tableWithDynamicRows">
	<tbody>
		<tr>
			<th>Nama Bantuan</th>
			<th style="width:100px">Tahun</th>
		</tr>


		<tr>
			<td>Mesin</td>
			<td>2014</td>
		</tr>
		<tr>
			<td>Perahu</td>
			<td>2015</td>
		</tr>
	</tbody>
</table>
