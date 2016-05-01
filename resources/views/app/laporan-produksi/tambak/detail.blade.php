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
			<td><b>{{ $tambak->datakecamatan->nama }}</b></td>
			<td><b>{{ $tambak->desa }}</b></td>
			<td><b>{{ $tambak->rtp }}</b></td>
			<td><b>{{ $tambak->luas_areal }} Ha</b></td>
			<td><b>{{ $tambak->luas_tanam}} Ha</b></td>
		</tr>
	</tbody>
</table>
<h5>Penebaran</h5>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Windu</th>
			<th>Vanamae</th>
			<th>Bandeng</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><b>{{ $tambak->penebaran_windu }} Ekor</b></td>
			<td><b>{{ $tambak->penebaran_vanamae }} Ekor</b></td>
			<td><b>{{ $tambak->penebaran_bandeng }} Ekor</b></td>
		</tr>
	</tbody>
</table>
<h5>Jumlah Hidup</h5>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Windu</th>
			<th>Vanamae</th>
			<th>Bandeng</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><b>{{ $tambak->jumlah_hidup_windu }} Ekor</b></td>
			<td><b>{{ $tambak->jumlah_hidup_vanamae }} Ekor</b></td>
			<td><b>{{ $tambak->jumlah_hidup_bandeng }} Ekor</b></td>
		</tr>
	</tbody>
</table>
<h5>Pakan</h5>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Pellet</th>
			<th>Dedak</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><b>{{ $tambak->pakan_pelet }}</b></td>
			<td><b>{{ $tambak->pakan_dedak }}</b></td>
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
			<td><b>keterangan</b></td>
		</tr>
	</tbody>
</table>