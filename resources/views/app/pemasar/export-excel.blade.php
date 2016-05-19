
	<table class="table table-bordered table-responsive">
		<thead>
			<tr>
				<th>No.</th>
				<th>Provinsi</th>
				<th>Kabupaten</th>
				<th>Kecamatan</th>
				<th>Desa</th>
				<th>Kode Jenis Kegiatan</th>
				<th>Nomor Urut Direktori</th>
				<th>Nama Unit Pemasar</th>
				<th>Pemilik Unit Pemasar</th>
				<th>Alamat Unit Pemasar</th>
				<th>RT/RW</th>
				<th>Telepon</th>
				<th>Kode POS</th>
				<th>Jenis Kegiatan Pemasaran</th>
				<th>Tahun Mulai Usaha</th>
			</tr>
			
		</thead>
		
		<tbody>

		<?php $i = 1; ?>

		@foreach( $pemasar as $ps )

			<tr>
				<td><?php echo $i  ?></td>
				<td>{{ $ps->provinsi }}</td>
				<td>{{ $ps->kabupaten }}</td>
				<td>{{ $ps->kecamatan }}</td>
				<td>{{ $ps->desa }}</td>
				<td>{{ $ps->kode_kegiatan }}</td>
				<td>{{ $ps->nomor_direktori }}</td>
				<td>{{ $ps->unit_pemasar }}</td>
				<td>{{ $ps->pemilik_pemasar }}</td>
				<td>{{ $ps->alamat_pemasar }}</td>
				<td>{{ $ps->erte }}</td>
				<td>{{ $ps->tlp }}</td>
				<td>{{ $ps->pos }}</td>
				<td>{{ $ps->tipe }}</td>
				<td>{{ $ps->tahun_mulai }}</td>
			</tr>
			<?php $i = $i + 1; ?>
		@endforeach

			
		</tbody>
	</table>