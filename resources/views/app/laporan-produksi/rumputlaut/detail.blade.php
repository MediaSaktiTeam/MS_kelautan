<h5>Data Identitas</h5>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Kecamatan</th>
			<th>Desa</th>
			<th>Petani/RTP</th>
			<th>Panjang Pantai</th>
			<th>Potensi</th>
			<th>Luas Tanam</th>
			<th>Bentangan</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>{{ $rumputlaut->datakecamatan->nama }}</td>
			<td>{{ $rumputlaut->desa }}</td>
			<td>{{ $rumputlaut->rtp }}</td>
			<td>{{ $rumputlaut->panjang_pantai }}</td>
			<td>{{ $rumputlaut->potensi }}</td>
			<td>{{ $rumputlaut->luas_tanam }} Ha</td>
			<td>{{ $rumputlaut->bentangan }}</td>
		</tr>
	</tbody>
</table>
<h5>Bibit</h5>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Cottoni</th>
			<th>Spinosum</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>{{ $rumputlaut->bibit_cottoni }}</td>
			<td>{{ $rumputlaut->bibit_spinosum }}</td>
		</tr>
	</tbody>
</table>
<h5>Jenis Bibit Cottoni</h5>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Basah</th>
			<th>Kering</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>{{ $rumputlaut->cottoni_basah }}</td>
			<td>{{ $rumputlaut->cottoni_kering }}</td>
		</tr>
	</tbody>
</table>
<h5>Jenis Bibit Spinosum</h5>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Basah</th>
			<th>Kering</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>{{ $rumputlaut->spinosum_basah }}</td>
			<td>{{ $rumputlaut->spinosum_kering }}</td>
		</tr>
	</tbody>
</table>