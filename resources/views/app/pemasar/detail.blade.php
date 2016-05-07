<h5>IDENTITAS</h5>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Provinsi</th>
			<th>Kabupaten</th>
			<th>Kecamatan</th>
			<th>Desa</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><b>{{ $pemasar->dataprovinsi->nama }}</b></td>
			<td><b>{{ $pemasar->datakabupaten->nama }}</b></td>
			<td><b>{{ $pemasar->datakecamatan->nama }}</b></td>
			<td><b>{{ $pemasar->datadesa->nama }}</b></td>
		</tr>
	</tbody>
</table>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Kode Jenis Kegiatan</th>
			<th>Nomor Urut Direktori</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><b>{{ $pemasar->kode_kegiatan }}</b></td>
			<td><b>{{ $pemasar->nomor_direktori }}</b></td>
		</tr>
	</tbody>
</table>
<h5>KETERANGAN UNIT PEMASAR</h5>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Nama Unit Pemasar</th>
			<th>Pemilik Unit Pemasar</th>
			<th>Alamat Unit Pemasar</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><b>{{ $pemasar->unit_pemasar }}</b></td>
			<td><b>{{ $pemasar->pemilik_pemasar }}</b></td>
			<td><b>{{ $pemasar->alamat_pemasar }}</b></td>
		</tr>
	</tbody>
</table>
<table class="table table-hover">
	<thead>
		<tr>
			<th>RT/RW</th>
			<th>Telepon</th>
			<th>Kode POS</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><b>{{ $pemasar->erte }}</b></td>
			<td><b>{{ $pemasar->tlp }}</b></td>
			<td><b>{{ $pemasar->pos }}</b></td>
		</tr>
	</tbody>
</table>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Jenis Kegiatan Pemasaran</th>
			<th>Tahun Mulai Usaha</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><b>{{ $pemasar->tipe }}</b></td>
			<td><b>{{ $pemasar->tahun_mulai }}</b></td>
		</tr>
	</tbody>
</table>