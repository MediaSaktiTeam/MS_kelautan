<table class="table table-hover demo-table-dynamic custom" id="tableWithDynamicRows">
	<tbody>
		<tr>
			<td>Nama Kecamatan</td>
			<td><b>{{ $mangroverehabilitasi->datakecamatan->nama }}</b></td>
		</tr>
		<tr>
			<td>Nama Desa</td>
			<td><b>{{ $mangroverehabilitasi->datadesa->nama}}</b></td>
		</tr>
		<tr>
			<td>Direhabilitasi</td>
			<td><b>{{ $mangroverehabilitasi->direhabilitasi }} M<sup>2</sup></b></td>
		</tr>
		<tr>
			<td>Berubah Fungsi</td>
			<td><b>{{ $mangroverehabilitasi->berubah_fungsi }} M<sup>2</sup></b></td>
		</tr>
		<tr>
			<td>Lahan Tambak</td>
			<td><b>{{ $mangroverehabilitasi->lahan_tambak }} M<sup>2</sup></b></td>
		</tr>
		<tr>
			<td>Penggaraman</td>
			<td><b>{{ $mangroverehabilitasi->penggaraman }} M<sup>2</sup></b></td>
		</tr>
	</tbody>
</table>

<span id="id_mangrove" data-id="{{ $mangroverehabilitasi->id_mangrove }}"></span>