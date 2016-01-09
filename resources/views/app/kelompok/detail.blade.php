<table class="table table-hover demo-table-dynamic custom" id="tableWithDynamicRows">
	<tbody>
		<tr>
			<td>Bidang Usaha</td>
			<td><b>{{ $kelompok->tipe }}</b></td>
		</tr>
		<tr>
			<td>Nama Kelompok</td>
			<td><b>{{ $kelompok->nama }}</b></td>
		</tr>
		<tr>
			<td>Alamat Sekretariat</td>
			<td><b>{{ $kelompok->alamat }}</b></td>
		</tr>
		<tr>
			<td>Nomor Rekening</td>
			<td><b>{{ $kelompok->no_rekening }}</b></td>
		</tr>
		<tr>
			<td>Nama Rekening</td>
			<td><b>{{ $kelompok->nama_rekening }}</b></td>
		</tr>
		<tr>
			<td>Nama Bank</td>
			<td><b>{{ $kelompok->nama_bank }}</b></td>
		</tr>
	</tbody>
</table>

<span id="id_kelompok" data-id="{{ $kelompok->id_kelompok }}"></span>