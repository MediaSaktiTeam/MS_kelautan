<h5>Data Identitas</h5>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Kecamatan</th>
			<th>Desa</th>
			<th>Petani/RTP</th>
			<th>Luas Areal</th>
			<th>Luas Tanam</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><b>{{ $airtawar->datakecamatan->nama }}</b></td>
			<td><b>{{ $airtawar->desa }}</b></td>
			<td><b>{{ $airtawar->rtp }}</b></td>
			<td><b>{{ $airtawar->luas_areal }} Ha</b></td>
			<td><b>{{ $airtawar->luas_tanam}} Ha</b></td>
		</tr>
	</tbody>
</table>
<h5>Penebaran</h5>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Mas</th>
			<th>Nila</th>
			<th>lele</th>
			<th>Bawal</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><b>{{ $airtawar->penebaran_mas }} Ekor</b></td>
			<td><b>{{ $airtawar->penebaran_nila }} Ekor</b></td>
			<td><b>{{ $airtawar->penebaran_lele }} Ekor</b></td>
			<td><b>{{ $airtawar->penebaran_bawal }} Ekor</b></td>
		</tr>
	</tbody>
</table>
<h5>Jumlah Hidup</h5>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Mas</th>
			<th>Nila</th>
			<th>lele</th>
			<th>Bawal</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><b>{{ $airtawar->jumlah_hidup_mas }} Ekor</b></td>
			<td><b>{{ $airtawar->jumlah_hidup_nila }} Ekor</b></td>
			<td><b>{{ $airtawar->jumlah_hidup_lele }} Ekor</b></td>
			<td><b>{{ $airtawar->jumlah_hidup_bawal }} Ekor</b></td>
		</tr>
	</tbody>
</table>