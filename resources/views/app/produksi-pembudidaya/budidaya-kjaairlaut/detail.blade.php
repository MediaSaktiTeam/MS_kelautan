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
			<td><b>{{ $kjaairlaut->lokasi }}</b></td>
			<td><b>{{ $kjaairlaut->rtp }}</b></td>
			<td><b>{{ $kjaairlaut->potensi }}</b></td>
			<td><b>{{ $kjaairlaut->luas_tanam}} Ha</b></td>
		</tr>
	</tbody>
</table>
<h5>Bibit</h5>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Kakap</th>
			<th>Udang</th>
			<th>Lainnya</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><b>{{ $kjaairlaut->bibit_kakap }} Ekor</b></td>
			<td><b>{{ $kjaairlaut->bibit_udang }} Ekor</b></td>
			<td><b>{{ $kjaairlaut->bibit_lainnya }} Ekor</b></td>
		</tr>
	</tbody>
</table>
<h5>Produksi</h5>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Kakap</th>
			<th>Udang</th>
			<th>Lainnya</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><b>{{ $kjaairlaut->produksi_kakap }} Ekor</b></td>
			<td><b>{{ $kjaairlaut->produksi_udang }} Ekor</b></td>
			<td><b>{{ $kjaairlaut->produksi_lainnya }} Ekor</b></td>
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
			<td><b>{{ $kjaairlaut->keterangan }}</b></td>
		</tr>
	</tbody>
</table>