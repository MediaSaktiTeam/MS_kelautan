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
							@foreach( $users as $user )
							<tr>
								<td>{{ $user->no_kartu_nelayan }}</td>
								<td>{{ $user->name }}</td>
								<td>{{ $user->jabatan->nama }}</td>
								<td>
									<?php

										$bantuan_users = DB::table('app_bantuan as ab')
															->leftJoin('users as u', 'u.id', '=', 'ab.id_user')
															->leftJoin('app_kelompok as ak', 'u.id_kelompok', '=', 'ak.id_kelompok')
															->select('u.*','ak.nama as nama_kelompok', 'ab.tahun as tahun_bantuan','ab.nama_program')
																->where('u.id', $user->id)
																->orderBy('ab.id', 'desc')
																->orderBy('ab.id_user', 'desc')
																->orderBy('ab.tahun', 'desc')
																->get();
									?>

									@if ( count($bantuan_users) > 0 )

										<table class="table table-bordered">
											<tbody>

												
												<tr>
													<th style="width:100px;">Tahun</th>
													<th>Nama Program</th>
													<th>Nama Bantuan</th>
												</tr>

												<?php $no = 1 ?>

												@foreach( $bantuan_users as $bu )

													<?php

														if ( $no > 1 ) {
															if ( $id_user == $bu->id && $tb == $bu->tahun_bantuan )
																continue;
														}

														$id_user = $bu->id;
														$tb = $bu->tahun_bantuan;

													?>

													<tr>
														<td>{{ $bu->tahun_bantuan }}</td>
														<td>{{ $bu->nama_program }}</td>
														<td>
																<?php

																	$bantuan = DB::table('app_bantuan as ab')
																					->leftJoin('app_bantuan_master as abm', 'abm.id', '=', 'ab.id_bantuan')
																						->select('abm.nama')
																							->where('ab.id_user', $bu->id)
																							->where('ab.tahun', $bu->tahun_bantuan)
																							->orderBy('ab.tahun', 'asc')
																							->get(); ?>
																@foreach( $bantuan as $b )
																	<i class="fa fa-check-square-o"></i>  {{ $b->nama }}<br>
																@endforeach

														</td>
													</tr>

													<?php $no++ ?>

												@endforeach

											</tbody>
										</table>

									@else

										<span style="color:#ff5050">Belum pernah mendapatkan bantuan</span>

									@endif
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>