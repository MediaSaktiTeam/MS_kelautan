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
					{{ $pembudidaya->usaha->jenis }} 
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
