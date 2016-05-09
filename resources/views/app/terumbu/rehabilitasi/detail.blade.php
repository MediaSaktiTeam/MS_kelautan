<table class="table table-hover demo-table-dynamic custom" id="tableWithDynamicRows">
	<tbody>
		<tr>
			<td>Nama Kecamatan</td>
			<td><b>{{ $terumburehabilitasi->datakecamatan->nama }}</b></td>
		</tr>
		<tr>
			<td>Nama Desa</td>
			<td><b>{{ $terumburehabilitasi->datadesa->nama}}</b></td>
		</tr>
		<tr>
			<td>Direhabilitasi</td>
			<td><b>{{ $terumburehabilitasi->direhabilitasi }} M<sup>2</sup></b></td>
		</tr>
	</tbody>
</table>

<span id="id_terumbu" data-id="{{ $terumburehabilitasi->id_terumbu }}"></span>