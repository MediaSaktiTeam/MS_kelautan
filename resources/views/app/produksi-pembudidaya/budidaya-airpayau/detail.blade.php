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
			<td><b>{{ $budidayaairpayau->lokasi }}</b></td>
			<td><b>{{ $budidayaairpayau->rtp }}</b></td>
			<td><b>{{ $budidayaairpayau->potensi }}</b></td>
			<td><b>{{ $budidayaairpayau->luas_tanam}} Ha</b></td>
		</tr>
	</tbody>
</table>
<h5>JUmlah Bibit</h5>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Bandeng</th>
			<th>U. Windu</th>
			<th>U. Vannamae</th>
			<th>Lainnya</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><b>{{ $budidayaairpayau->bibit_bandeng }} Ekor</b></td>
			<td><b>{{ $budidayaairpayau->bibit_windu }} Ekor</b></td>
			<td><b>{{ $budidayaairpayau->bibit_vannamae }} Ekor</b></td>
			<td><b>{{ $budidayaairpayau->bibit_lainnya }} Ekor</b></td>
		</tr>
	</tbody>
</table>
<h5>Produksi</h5>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Bandeng</th>
			<th>U. windu</th>
			<th>U. vannamae</th>
			<th>Lainnya</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><b>{{ $budidayaairpayau->produksi_bandeng }} Ekor</b></td>
			<td><b>{{ $budidayaairpayau->produksi_windu }} Ekor</b></td>
			<td><b>{{ $budidayaairpayau->produksi_vannamae }} Ekor</b></td>
			<td><b>{{ $budidayaairpayau->produksi_lainnya }} Ekor</b></td>
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
			<td><b>{{ $budidayaairpayau->keterangan }}</b></td>
		</tr>
	</tbody>
</table>