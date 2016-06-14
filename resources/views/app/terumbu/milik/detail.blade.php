<table class="table table-hover demo-table-dynamic custom" id="tableWithDynamicRows">
	<tbody>
	<?php 
	$k_baik = $terumbumilik->luas_lahan - $terumbumilik->kondisi_rusak - $terumbumilik->kondisi_sedang;
	 ?>
		<tr>
			<td>Nama Kecamatan</td>
			<td><b>{{ $terumbumilik->datakecamatan->nama }}</b></td>
		</tr>
		<tr>
			<td>Nama Desa</td>
			<td><b>{{ $terumbumilik->datadesa->nama}}</b></td>
		</tr>
		<tr>
			<td>Luas Lahan Terumbu Karang</td>
			<td><b>{{ $terumbumilik->luas_lahan }} M<sup>2</sup></b></td>
		</tr>
		<tr>
			<td>Kondisi Rusak</td>
			<td><b>{{ $terumbumilik->kondisi_rusak }} M<sup>2</sup></b></td>
		</tr>
		<tr>
			<td>Kondisi Sedang</td>
			<td><b>{{ $terumbumilik->kondisi_sedang }} M<sup>2</sup></b></td>
		</tr>
		<tr>
			<td>Kondisi Baik</td>
			<td><b>{{ $terumbumilik->kondisi_baik }} M<sup>2</sup></b></td>
		</tr>
	</tbody>
</table>

<span id="id_terumbu" data-id="{{ $terumbumilik->id_terumbu }}"></span>