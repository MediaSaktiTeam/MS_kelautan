

	<table class="table table-bordered table-responsive">
		<thead>
			<tr>
				<th rowspan="2">No.</th>
				<th rowspan="2">Kecamatan</th>
				<th rowspan="2">Desa</th>
				<th rowspan="2">Petani/RTP</th>
				<th rowspan="2">Luas Areal (Ha)</th>
				<th rowspan="2">Luas Tanam (Ha)</th>
				<th colspan="4">Penebaran</th>
				<th colspan="4">Jumlah Hidup</th>
				<th rowspan="2">Keterangan</th>
			</tr>
			<tr>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th>Mas</th>
				<th>Nila</th>
				<th>Lele</th>
				<th>Bawal</th>
				<th>Mas</th>
				<th>Nila</th>
				<th>Lele</th>
				<th>Bawal</th>
				<th></th>
			</tr>
		</thead>
		
		<tbody>

		<?php 
			$i = 1; 
			$jumlahrtp = "";
				$luas_areal = "";
				$luas_tanam = "";
				$penebaran_mas = "";
				$penebaran_nila = "";
				$penebaran_lele = "";
				$penebaran_bawal = "";
				$jumlah_hidup_mas = "";
				$jumlah_hidup_nila = "";
				$jumlah_hidup_lele = "";
				$jumlah_hidup_bawal = "";
		?>

		@foreach( $airtawar as $at )

			<tr>
				<td><?php echo $i  ?></td>
				<td>{{ $at->datakecamatan->nama }}</td>
				<td>{{ $at->datadesa->nama }}</td>
				<td>{{ $at->rtp }}</td>
				<td>{{ $at->luas_areal }} Ha</td>
				<td>{{ $at->luas_tanam }} Ha</td>
				<td>{{ $at->penebaran_mas }}</td>
				<td>{{ $at->penebaran_nila }}</td>
				<td>{{ $at->penebaran_lele }}</td>
				<td>{{ $at->penebaran_bawal }}</td>
				<td>{{ $at->jumlah_hidup_mas }}</td>
				<td>{{ $at->jumlah_hidup_nila }}</td>
				<td>{{ $at->jumlah_hidup_lele }}</td>
				<td>{{ $at->jumlah_hidup_bawal }}</td>
				<td>{{ $at->keterangan }}</td>
			</tr>
				
			<?php 

				$i = $i + 1;
				$jumlahrtp += $at->rtp;
				$luas_areal += $at->luas_areal;
				$luas_tanam += $at->luas_tanam;
				$penebaran_mas += $at->penebaran_mas;
				$penebaran_nila += $at->penebaran_nila;
				$penebaran_lele += $at->penebaran_lele;
				$penebaran_bawal += $at->penebaran_bawa;
				$jumlah_hidup_mas += $at->jumlah_hidup_mas;
				$jumlah_hidup_nila += $at->jumlah_hidup_nila;
				$jumlah_hidup_lele += $at->jumlah_hidup_lele;
				$jumlah_hidup_bawal += $at->jumlah_hidup_bawal;

			?>
		@endforeach
			<tr>
				<td colspan="3"><b>JUMLAH</b></td>
				<td><b><?php echo round($jumlahrtp,2); ?></b></td>
				<td><b><?php echo round($luas_areal,2); ?></b> Ha</td>
				<td><b><?php echo round($luas_tanam,2); ?></b> Ha</td>
				<td><b><?php echo round($penebaran_mas,2); ?></b></td>
				<td><b><?php echo round($penebaran_nila,2); ?></b></td>
				<td><b><?php echo round($penebaran_lele,2); ?></b></td>
				<td><b><?php echo round($penebaran_bawal,2); ?></b></td>
				<td><b><?php echo round($jumlah_hidup_mas,2); ?></b></td>
				<td><b><?php echo round($jumlah_hidup_nila,2); ?></b></td>
				<td><b><?php echo round($jumlah_hidup_lele,2); ?></b></td>
				<td><b><?php echo round($jumlah_hidup_bawal,2); ?></b></td>
				<td></td>
			</tr>
			
		</tbody>
	</table>