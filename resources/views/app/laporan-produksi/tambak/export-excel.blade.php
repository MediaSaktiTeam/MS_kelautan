<table class="table table-bordered">
		<thead>
			<tr>
				<th rowspan="2">No.</th>
				<th rowspan="2">Kecamatan</th>
				<th rowspan="2">Desa</th>
				<th rowspan="2">Petani/RTP</th>
				<th rowspan="2">Panjang Pantai</th>
				<th rowspan="2">Potensi</th>
				<th rowspan="2">Luas Tanam</th>
				<th colspan="3">Penebaran</th>
				<th colspan="3">Jumlah Hidup</th>
				<th colspan="2">Pakan</th>
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
				<th>Windu</th>
				<th>Vanamae</th>
				<th>Bandeng</th>
				<th>Windu</th>
				<th>Vanamae</th>
				<th>Bandeng</th>
				<th>Pellet</th>
				<th>Dedak</th>
				<th></th>
			</tr>
		</thead>
		
		<tbody>
			<?php $i = 1 ?>

		@foreach( $tambak as $tb )

			<tr>
				<td><?php echo $i  ?></td>
				<td>{{ $tb->datakecamatan->nama }}</td>
				<td>{{ $tb->desa }}</td>
				<td>{{ $tb->rtp }}</td>
				<td>{{ $tb->panjang_pantai }}</td>
				<td>{{ $tb->potensi }}</td>
				<td>{{ $tb->luas_tanam }} Ha</td>
				<td>{{ $tb->penebaran_windu }}</td>
				<td>{{ $tb->penebaran_vanamae }}</td>
				<td>{{ $tb->penebaran_bandeng }}</td>
				<td>{{ $tb->jumlah_hidup_windu }}</td>
				<td>{{ $tb->jumlah_hidup_vanamae }}</td>
				<td>{{ $tb->jumlah_hidup_bandeng }}</td>
				<td>{{ $tb->pakan_pelet }}</td>
				<td>{{ $tb->pakan_dedak }}</td>
				<td>Isi keterangan</td>
			</tr>
				
			<?php $i = $i + 1 ?>

		@endforeach			
		</tbody>
	</table>