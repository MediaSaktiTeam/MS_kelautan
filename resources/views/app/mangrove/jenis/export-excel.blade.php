	<table class="table table-bordered table-responsive">
		<thead>
			<tr>
				<th>No.</th>
				<th>NIK</th>
				<th>Nama Lengkap</th>
				<th>Alamat</th>
				<th>Nama Kelompok</th>
				<th>Jabatan Kelompok</th>
				<th>Jenis Olahan</th>
				<th>Legalitas Produksi</th>
				<th>Merek Dagang</th>
				<th>Modal yang dimiliki</th>
				<th>Modal Pinjaman</th>
				<th>Omzet Perbulan</th>
				<th>Sarana/Prasarana yang dimiliki</th>

			</tr>
		</thead>
		
		<tbody>

			<?php $i = 1 ?>
			
			@foreach( $pengolah as $pe )

				<tr>
					<td><?php echo $i  ?></td>
					<td>{{ $pe->nik }}</td>
					<td>{{ $pe->name }}</td>
					<td>{{ $pe->alamat }}</td>
					<td>{{ $pe->kelompok->nama }}</td>
					<td>{{ $pe->jabatan->nama }}</td>
					<td>{{ $pe->olahan->jenis }}</td>
					<td>{{ $pe->legalitas_produksi }}</td>
					<td>{{ $pe->merekdagang->merek }}</td>
					<td>{{ $pe->modal_dimiliki }}</td>
					<td>{{ $pe->modal_pinjaman }}</td>
					<td>{{ $pe->omzet_perbulan }}</td>
					<td>
						<?php $Ksarana = App\KepemilikanSarana::where('id_user', $pe->id)->get(); ?>
						@foreach ( $Ksarana as $ks )
							- {{ $ks->sarana->jenis }} {{ $ks->sarana->sub }}
						@endforeach
					</td>
				</tr>

				<?php $i = $i + 1 ?>

			@endforeach
		</tbody>
	</table>