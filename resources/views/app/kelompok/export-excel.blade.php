	<table class="table table-bordered table-responsive">
		<thead>
			<tr>
				<th>Bidang Usaha</th>
				<th>Id Kelompok</th>
				<th>Nama Kelompok</th>
				<th>Alamat Sekretariat</th>
				<th>No. Rekening</th>
				<th>Nama Rekening</th>
				<th>Nama Bank</th>
			</tr>
		</thead>
		
		<tbody>

			@foreach( $kelompok as $kl )

			<tr>
				<td>{{ $kl->tipe }}</td>
				<td>{{ $kl->id_kelompok }}</td>
				<td>{{ $kl->nama }}</td>
				<td>{{ $kl->alamat }}</td>
				<td>{{ $kl->no_rek }}</td>
				<td>{{ $kl->nama_rekening }}</td>
				<td>{{ $kl->nama_bank }}</td>
			</tr>

			@endforeach
			
		</tbody>
	</table>