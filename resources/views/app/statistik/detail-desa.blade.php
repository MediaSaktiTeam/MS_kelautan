<div class="row">
	<div class="col-sm-12">
		<div style="font-size: 20px;font-weight: bold">Desa {{ $desa->nama }}</div>
		<hr>

		<p><b>Produksi Air Tawar</b></p>

	<!-- Air tawar -->
		@if ( count($airtawar) > 0 )

			<table class="table table-hover">
				<thead>
					<tr>
						<th>No.</th>
						<th>Desa</th>
						<th>Petani/RTP</th>
						<th>Luas Areal (Ha)</th>
						<th>Luas Tanam (Ha)</th>
						<th style="text-align:center">Aksi</th>
					</tr>
				</thead>

				<tbody>
					<?php $i = 1 ?>

						@foreach($airtawar as $at)
							<tr>
								<td>{{ $i++ }}</td>
								<td>{{ $at->datadesa->nama }}</td>
								<td>{{ $at->rtp }}</td>
								<td>{{ $at->luas_areal }} Ha</td>
								<td>{{ $at->luas_tanam }} Ha</td>
								<td style="text-align:center">
									<a class="btn btn-default btn-xs view-air-tawar" data-id="{{ $at->id }}"><i class="fa fa-search-plus"></i></a>
								</td>
							</tr>
						@endforeach
						
				</tbody>

			</table>

		@else
			<p>Tidak ada data</p>
			<hr>
		@endif

	<!-- Rumput Laut -->
		<p><b>Produksi Rumput Laut</b></p>

		@if ( count($rumputlaut) > 0 )
			<table class="table table-hover">
				<thead>
					<tr><th>No.</th>
						<th>Desa</th>
						<th>Petani/RTP</th>
						<th>Panjang Pantai</th>
						<th>Potensi</th>
						<th>Luas Tanam</th>
						<th>Bentangan</th>
						<th>Aksi</th>
					</tr>
				</thead>

				<tbody>
					<?php $i = 1 ?>
					@foreach($rumputlaut as $rl)
						<tr>
							<td>{{ $i++ }}</td>
							<td>{{ $rl->datadesa->nama }}</td>
							<td>{{ $rl->rtp }}</td>
							<td>{{ $rl->panjang_pantai }}</td>
							<td>{{ $rl->potensi }}</td>
							<td>{{ $rl->luas_tanam }} Ha</td>
							<td>{{ $rl->bentangan }}</td>
							<td style="text-align:center">
								<a class="btn btn-default btn-xs view-rumput-laut" data-id="{{ $rl->id }}"><i class="fa fa-search-plus"></i></a>
							</td>

						</tr>
					@endforeach
				</tbody>

			</table>

		@else
			<p>Tidak ada data</p>
			<hr>
		@endif

	<!-- Tambak -->
		<p><b>Produksi Tambak</b></p>

		@if ( count($tambak) > 0 )

			<table class="table table-hover">
				<thead>
					<tr>
						<th>No.</th>
						<th>Desa</th>
						<th>Petani/RTP</th>
						<th>Panjang Pantai</th>
						<th>Potensi</th>
						<th>Luas Tanam (Ha)</th>
						<th style="text-align:center">Aksi</th>
					</tr>
				</thead>

				<tbody>
					<?php $i = 1; ?>

					@foreach($tambak as $at)
						<tr>
							<td>{{ $i++ }}</td>
							<td>{{ $at->datadesa->nama }}</td>
							<td>{{ $at->rtp }}</td>
							<td>{{ $at->panjang_pantai }} Ha</td>
							<td>{{ $at->potensi }}</td>
							<td>{{ $at->luas_tanam }} Ha</td>
							<td style="text-align:center">
								<a class="btn btn-default btn-xs view-tambak" data-id="{{ $at->id }}"><i class="fa fa-search-plus"></i></a>
							</td>

						</tr>
					@endforeach
				</tbody>

			</table>

		@else
			<p>Tidak ada data</p>
			<hr>
		@endif


	<!-- Pesisir -->

		<br>
		<h4>Lahan Mangrove</5>

		<!-- Mangrove Dimiliki -->
			<p style="margin-top: 10px"><b>Lahan Mangrove Yang Dimiliki</b></p>

			@if ( count($mangrovemilik) > 0 )

				<table class="table table-hover">
					<thead>
						<tr>
							<th>Nama Desa</th>
							<th>Luas Lahan Mangrove</th>
							<th>Kondisi Rusak</th>
							<th>Kondisi Sedang</th>
							<th>Kondisi Baik</th>
						</tr>
					</thead>

					<tbody>
					
					@foreach($mangrovemilik as $mi)

						<tr>
							<td>{{ $mi->datadesa->nama }}</td>
							<td>{{ $mi->luas_lahan }} M<sup>2</sup></td>
							<td>{{ $mi->kondisi_rusak }} M<sup>2</sup></td>
							<td>{{ $mi->kondisi_sedang }} M<sup>2</sup></td>
							<td>{{ $mi->kondisi_baik }} M<sup>2</sup></td>
						</tr>

					@endforeach

					</tbody>

				</table>

			@else
				<p>Tidak ada data</p>
				<hr>
			@endif

		<!-- Mangrove Direhabilitasi -->
			<p style="margin-top: 10px"><b>Lahan Mangrove Yang Direhabilitasi</b></p>

			@if ( count($mangroverehabilitasi) > 0 )

				<table class="table table-hover">
					<thead>
						<tr>
							<th>Nama Desa</th>
							<th>Direhabilitasi</th>
							<th>Berubah Fungsi</th>
							<th>Lahan Tambak</th>
							<th>Penggaraman</th>
						</tr>
					</thead>

					<tbody>

					@foreach($mangroverehabilitasi as $rehab)
						<tr>
							<td>{{ $rehab->datadesa->nama }}</td>
							<td>{{ $rehab->direhabilitasi }} M<sup>2</sup></td>
							<td>{{ $rehab->berubah_fungsi }} M<sup>2</sup></td>
							<td>{{ $rehab->lahan_tambak }} M<sup>2</sup></td>
							<td>{{ $rehab->penggaraman }} M<sup>2</sup></td>
						</tr>
					@endforeach

					</tbody>

				</table>

			@else
				<p>Tidak ada data</p>
				<hr>
			@endif

		<br>
		<h4>Terumbu Karang</h4>

		<!-- Terumbu karang dimiliki -->
			<p style="margin-top: 10px"><b>Terumbu Karang Yang Dimiliki</b></p>

			@if ( count($terumbumilik) > 0 )

				<table class="table table-hover">
					<thead>
						<tr>
							<th>Nama Desa</th>
							<th>Luas Lahan T.Karang</th>
							<th>Kondisi Rusak</th>
							<th>Kondisi Sedang</th>
							<th>Kondisi Baik</th>
						</tr>
					</thead>

					<tbody>

					@foreach($terumbumilik as $mil)
						<tr>
							<td>{{ $mil->datadesa->nama }}</td>
							<td>{{ $mil->luas_lahan }} M<sup>2</sup></td>
							<td>{{ $mil->kondisi_rusak }} M<sup>2</sup></td>
							<td>{{ $mil->kondisi_sedang }} M<sup>2</sup></td>
							<td>{{ $mil->kondisi_baik }} M<sup>2</sup></td>
						</tr>
					@endforeach

					</tbody>

				</table>

			@else
				<p>Tidak ada data</p>
				<hr>
			@endif

		<!-- Terumbu karang Direhabilitasi -->
			<p style="margin-top: 10px"><b>Terumbu Karang Direhabilitasi</b></p>

			@if ( count($terumburehabilitasi) > 0 )

				<table class="table table-hover">
					<thead>
						<tr>
							<th>Nama Kecamatan</th>
							<th>Nama Desa</th>
							<th>Direhabilitasi</th>
						</tr>
					</thead>

					<tbody>

					@foreach($terumburehabilitasi as $rehab)
						<tr>
							<td>{{ $rehab->datakecamatan->nama }}</td>
							<td>{{ $rehab->datadesa->nama }}</td>
							<td>{{ $rehab->direhabilitasi }} M<sup>2</sup></td>
						</tr>
					@endforeach

					</tbody>

				</table>

			@else
				<p>Tidak ada data</p>
				<hr>
			@endif
	</div>

</div>