<table class="table table-hover demo-table-dynamic custom" id="tableWithDynamicRows">
						<thead>
							<tr>
								<th>ID</th>
								<th>Nama Anggota</th>
								<th>Jabatan</th>
								<th>Bantuan yang telah diterima</th>
							</tr>
						</thead>
						<tbody>
							<?php $anggota = App\User::where('id_kelompok')->get() ?>
							@foreach( $anggota as $ang )
							<tr>
								<td>{{ $ang->no_kartu_nelayan }}</td>
								<td>{{ $ang->name }}</td>
								<td>Ketua</td>
								<td>
									<ul class="list-unstyled">
										<li><b>2014:</b> Kapal/Perahu</li>
										<li><b>2015:</b> Alat Tangkap</li>
									</ul>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>