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
			<td><b>{{ $kjaairtawar->lokasi }}</b></td>
			<td><b>{{ $kjaairtawar->rtp }}</b></td>
			<td><b>{{ $kjaairtawar->potensi }}</b></td>
			<td><b>{{ $kjaairtawar->luas_tanam}} Ha</b></td>
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
			<td><b>{{ $kjaairtawar->bibit_nila }} Ekor</b></td>
			<td><b>{{ $kjaairtawar->bibit_lele }} Ekor</b></td>
			<td><b>{{ $kjaairtawar->bibit_udang }} Ekor</b></td>
			<td><b>{{ $kjaairtawar->bibit_lainnya }} Ekor</b></td>
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
			<td><b>{{ $kjaairtawar->produksi_nila }} Ekor</b></td>
			<td><b>{{ $kjaairtawar->produksi_lele }} Ekor</b></td>
			<td><b>{{ $kjaairtawar->produksi_udang }} Ekor</b></td>
			<td><b>{{ $kjaairtawar->produksi_lainnya }} Ekor</b></td>
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
			<td><b>{{ $kjaairtawar->keterangan }}</b></td>
		</tr>
	</tbody>
</table>