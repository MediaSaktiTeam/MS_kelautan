<table class="table table-hover demo-table-dynamic custom" id="tableWithDynamicRows">
	<tbody>
		<tr>
			<td>Nama Kecamatan</td>
			<td><b>{{ $mangrovejenis->datakecamatan->nama }}</b></td>
		</tr>
		<tr>
			<td>Jenis Mangrove</td>
			<td><b>{{ $mangrovejenis->jenis_mangrove}}</b></td>
		</tr>
	</tbody>
</table>

<span id="id_mangrove" data-id="{{ $mangrovejenis->id_mangrove }}"></span>