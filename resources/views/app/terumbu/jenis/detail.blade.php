<table class="table table-hover demo-table-dynamic custom" id="tableWithDynamicRows">
	<tbody>
		<tr>
			<td>Nama Kecamatan</td>
			<td><b>{{ $terumbujenis->datakecamatan->nama }}</b></td>
		</tr>
		<tr>
			<td>Jenis Ikan Karang</td>
			<td><b>{{ $terumbujenis->jenis_ikan}}</b></td>
		</tr>
	</tbody>
</table>

<span id="id_terumbu" data-id="{{ $terumbujenis->id_terumbu }}"></span>