<table class="table">
			<tr>
				<th rowspan="2">No.</th>
				<th rowspan="2">Kecamatan</th>
				<th rowspan="2">Desa</th>
				<th rowspan="2">Petani/RTP</th>
				<th rowspan="2">Panjang Pantai</th>
				<th rowspan="2">Potensi</th>
				<th rowspan="2">Luas Tanam</th>
				<th rowspan="2">Bentangan</th>
				<th rowspan="2">Jumlah Bibit Cottonii</th>
				<th rowspan="2">Jumlah Bibit Spinosum</th>
				<th colspan="2">Produksi Eucheuma Cottonii</th>
				<th colspan="2">Produksi Eucheuma Spinosum</th>
				<th rowspan="2">Keterangan</th>
			</tr>
			<tr>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th>Basah</th>
				<th>Kering</th>
				<th>Basah</th>
				<th>Kering</th>
				<th></th>
			</tr>

		<?php $i = 1 ?>

		@foreach( $rumputlaut as $rl )

			<tr>
				<td><?php echo $i  ?></td>
				<td>{{ $rl->datakecamatan->nama }}</td>
				<td>{{ $rl->desa }}</td>
				<td>{{ $rl->rtp }}</td>
				<td>{{ $rl->panjang_pantai }}</td>
				<td>{{ $rl->potensi }} Ha</td>
				<td>{{ $rl->luas_tanam }} Ha</td>
				<td>{{ $rl->bentangan }}</td>
				<td>{{ $rl->bibit_cottoni }} Kg</td>
				<td>{{ $rl->bibit_spinosum }} Kg</td>
				<td>{{ $rl->cottoni_basah }} KgCB</td>
				<td>{{ $rl->cottoni_kering }} KgCK</td>
				<td>{{ $rl->spinosum_basah }} KgSB</td>
				<td>{{ $rl->spinosum_kering }} KgSK</td>
				<td>isi keterangan</td>
			</tr>
				
			<?php $i = $i + 1 ?>

		@endforeach
			
	</table>