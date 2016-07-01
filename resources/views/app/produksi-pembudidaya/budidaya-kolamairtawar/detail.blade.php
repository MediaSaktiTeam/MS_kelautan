<h5>Data Identitas</h5>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Lokasi</th>
			<th>Jumlah RTP</th>
			<th>Potensi</th>
			<th>Luas Tanam</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><b>{{ $kolamairtawar->lokasi }}</b></td>
			<td><b>{{ $kolamairtawar->rtp }}</b></td>
			<td><b>{{ $kolamairtawar->potensi }}</b></td>
			<td><b>{{ $kolamairtawar->luas_tanam}} Ha</b></td>
		</tr>
	</tbody>
</table>
<h5>Jumlah Bibit</h5>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Nila</th>
			<th>Lele</th>
			<th>Udang</th>
			<th>Lainnya</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><b>{{ $kolamairtawar->bibit_nila }} Ekor</b></td>
			<td><b>{{ $kolamairtawar->bibit_lele }} Ekor</b></td>
			<td><b>{{ $kolamairtawar->bibit_udang }} Ekor</b></td>
			<td><b>{{ $kolamairtawar->bibit_lainnya }} Ekor</b></td>
		</tr>
	</tbody>
</table>
<h5>Produksi</h5>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Nila</th>
			<th>Lele</th>
			<th>Udang</th>
			<th>Lainnya</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><b>{{ $kolamairtawar->produksi_nila }} Ekor</b></td>
			<td><b>{{ $kolamairtawar->produksi_lele }} Ekor</b></td>
			<td><b>{{ $kolamairtawar->produksi_udang }} Ekor</b></td>
			<td><b>{{ $kolamairtawar->produksi_lainnya }} Ekor</b></td>
		</tr>
	</tbody>
</table>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Keterangan</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><b>{{ $kolamairtawar->keterangan }}</b></td>
		</tr>
	</tbody>
</table>