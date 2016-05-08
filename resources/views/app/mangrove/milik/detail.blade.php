<table class="table table-hover demo-table-dynamic custom" id="tableWithDynamicRows">
	<tbody>
		<tr>
			<td>Nama Kecamatan</td>
			<td><b>{{ $mangrovemilik->datakecamatan->nama }}</b></td>
		</tr>
		<tr>
			<td>Nama Desa</td>
			<td><b>{{ $mangrovemilik->datadesa->nama}}</b></td>
		</tr>
		<tr>
			<td>Luas Lahan</td>
			<td><b>{{ $mangrovemilik->luas_lahan }} M<sup>2</sup></b></td>
		</tr>
		<tr>
			<td>Kondisi Rusak</td>
			<td><b>{{ $mangrovemilik->kondisi_rusak }} M<sup>2</sup></b></td>
		</tr>
		<tr>
			<td>Kondisi Sedang</td>
			<td><b>{{ $mangrovemilik->kondisi_sedang }} M<sup>2</sup></b></td>
		</tr>
		<tr>
			<td>Kondisi Baik</td>
			<td><b>{{ $mangrovemilik->kondisi_baik }} M<sup>2</sup></b></td>
		</tr>
	</tbody>
</table>

<span id="id_mangrove" data-id="{{ $mangrovemilik->id_mangrove }}"></span>