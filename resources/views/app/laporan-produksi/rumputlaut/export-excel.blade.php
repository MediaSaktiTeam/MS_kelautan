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

		<?php 
			$i = 1;
				$jumlahrtp =""; 	
				$panjang_pantai =""; 	
				$potensi =""; 	
				$luas_tanam =""; 
				$bentangan =""; 
				$bibit_cottoni =""; 
				$bibit_spinosum =""; 
				$cottoni_basah =""; 
				$cottoni_kering =""; 
				$spinosum_basah =""; 
				$spinosum_kering ="";
		 ?>

		@foreach( $rumputlaut as $rl )

			<tr>
				<td><?php echo $i  ?></td>
				<td>{{ $rl->datakecamatan->nama }}</td>
				<td>{{ $rl->datadesa->nama }}</td>
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
				<td>{{ $rl->keterangan }}</td>
			</tr>
				
			<?php 

				$i = $i + 1; 
				$jumlahrtp += $rl->rtp;
				$panjang_pantai += $rl->panjang_pantai;
				$potensi += $rl->potensi;
				$luas_tanam += $rl->luas_tanam;
				$bentangan += $rl->bentangan;
				$bibit_cottoni += $rl->bibit_cottoni;
				$bibit_spinosum += $rl->bibit_spinosum;
				$cottoni_basah += $rl->cottoni_basah;
				$cottoni_kering += $rl->cottoni_kering;
				$spinosum_basah += $rl->spinosum_basah;
				$spinosum_kering += $rl->spinosum_kering;

			?>

		@endforeach
			<tr>
				<td colspan="3"><b>JUMLAH</b></td>
				<td><b><?php echo round($jumlahrtp,2); ?></b></td>
				<td><b><?php echo round($panjang_pantai,2); ?></b> Ha</td>
				<td><b><?php echo round($potensi,2); ?></b> Ha</td>
				<td><b><?php echo round($luas_tanam,2); ?></b></td>
				<td><b><?php echo round($bentangan,2); ?></b></td>
				<td><b><?php echo round($bibit_cottoni,2); ?></b></td>
				<td><b><?php echo round($bibit_spinosum,2); ?></b></td>
				<td><b><?php echo round($cottoni_basah,2); ?></b></td>
				<td><b><?php echo round($cottoni_kering,2); ?></b></td>
				<td><b><?php echo round($spinosum_basah,2); ?></b></td>
				<td><b><?php echo round($spinosum_kering,2); ?></b></td>
				<td></td>
			</tr>
			
	</table>