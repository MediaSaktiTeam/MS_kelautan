

	<table class="table table-bordered table-responsive">
		<thead>
			<tr>
				<th rowspan="2">No.</th>
				<th rowspan="2">Lokasi</th>
				<th rowspan="2">Potensi</th>
				<th rowspan="2">Jumlah RTP</th>
				<th rowspan="2">Luas Tanam (Ha)</th>
				<th colspan="2">Jumlah Bibit</th>
				<th colspan="2">Produksi</th>
				<th rowspan="2">Keterangan</th>
			</tr>
			<tr>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th>Catoni</th>
				<th>Spenosun</th>
				<th></th>
			</tr>
		</thead>
		
		<tbody>

		<?php 
			$i = 1; 
			$potensi = "";
			$jumlahrtp = "";
			$luas_tanam = "";
			$jumlah_bibit = "";
			$produksi_catoni = "";
			$produksi_spenosun = "";
			$produksi_lainnya = "";
		?>

		@foreach( $budidayarumputlaut as $brl )

			<tr>
				<td><?php echo $i  ?></td>
				<td>{{ $brl->lokasi }}</td>
				<td>{{ $brl->potensi }}</td>
				<td>{{ $brl->rtp }}</td>
				<td>{{ $brl->luas_tanam }} Ha</td>
				<td>{{ $brl->jumlah_bibit }}</td>
				<td>{{ $brl->produksi_catoni }}</td>
				<td>{{ $brl->produksi_spenosun }}</td>
				<td>{{ $brl->keterangan }}</td>
			</tr>
				
			<?php 

				$i = $i + 1;
				$potensi += $brl->potensi;
				$jumlahrtp += $brl->rtp;
				$luas_tanam += $brl->luas_tanam;
				$jumlah_bibit += $brl->jumlah_bibit;
				$produksi_catoni += $brl->produksi_catoni;
				$produksi_spenosun += $brl->produksi_spenosun;
			?>

		@endforeach
			<tr>
				<td colspan="2"><b>JUMLAH</b></td>
				<td><b><?php echo round($potensi,2); ?></b> Ha</td>
				<td><b><?php echo round($jumlahrtp,2); ?></b></td>
				<td><b><?php echo round($luas_tanam,2); ?></b> Ha</td>
				<td><b><?php echo round($jumlah_bibit,2); ?></b></td>
				<td><b><?php echo round($produksi_catoni,2); ?></b></td>
				<td><b><?php echo round($produksi_spenosun,2); ?></b></td>
				<td></td>
			</tr>
			
		</tbody>
	</table>