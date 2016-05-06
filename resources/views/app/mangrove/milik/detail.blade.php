<table class="table table-hover demo-table-dynamic custom" id="tableWithDynamicRows">
	<tbody>
		<tr>
			<td>Nama Kecamatan</td>
			<td><b>{{ $mangrovemilik->datakecamatan->nama }}</b></td>
		</tr>
		<tr>
			<td>Nama Desa</td>
			<td><b>{{ $mangrovemilik->desa}}</b></td>
		</tr>
		<tr>
			<td>Luas Lahan</td>
			<td><b>{{ $mangrovemilik->luas_lahan }}</b></td>
		</tr>
		<tr>
			<td>Kondisi Rusak</td>
			<td><b>{{ $mangrovemilik->kondisi_rusak }}</b></td>
		</tr>
		<tr>
			<td>Kondisi Sedang</td>
			<td><b>{{ $mangrovemilik->kondisi_sedang }}</b></td>
		</tr>
		<tr>
			<td>Kondisi Baik</td>
			<td><b>{{ $mangrovemilik->kondisi_baik }}</b></td>
		</tr>
	</tbody>
</table>

<span id="id_mangrove" data-id="{{ $mangrovemilik->id_mangrove }}"></span>