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
							@foreach($user as $u)
							<tr>
								<td>{{ $u->no_kartu_nelayan }}</td>
								<td>{{ $u->name }}</td>
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