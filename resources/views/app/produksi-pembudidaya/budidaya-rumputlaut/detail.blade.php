<h5>Data Identitas</h5>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Lokasi</th>
			<th>Jumlah RTP</th>
			<th>Potensi</th>
			<th>Luas Tanam</th>
			<th>Jumlah Bibit</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><b>{{ $budidayarumputlaut->lokasi }}</b></td>
			<td><b>{{ $budidayarumputlaut->rtp }}</b></td>
			<td><b>{{ $budidayarumputlaut->potensi }}</b></td>
			<td><b>{{ $budidayarumputlaut->luas_tanam}} Ha</b></td>
			<td><b>{{ $budidayarumputlaut->jumlah_bibit}} Ha</b></td>
		</tr>
	</tbody>
</table>
<h5>Produksi</h5>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Catoni</th>
			<th>Spenosun</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><b>{{ $budidayarumputlaut->produksi_catoni }} Ekor</b></td>
			<td><b>{{ $budidayarumputlaut->produksi_spenosun }} Ekor</b></td>
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
			<td><b>{{ $budidayarumputlaut->keterangan }}</b></td>
		</tr>
	</tbody>
</table>