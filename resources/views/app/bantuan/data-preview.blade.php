<br>
<!-- START PANEL -->
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="panel-title">Keterangan</div>
	</div>
	<div class="panel-body">
		<table class="table">
			<tr>
				<td>NIK</td>
				<td><b>{{ $user->nik }}</b></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td><b>{{ $user->name }}</b></td>
			</tr>
			<tr>
				<td>Bidang Usaha</td>
				<td><b>{{ $user->profesi }}</b></td>
			</tr>
			<tr>
				<td>Kelompok</td>
				<td><b>{{ $user->nama_kelompok }}</b></td>
			</tr>

			<tr>
				<td>Bantuan yg pernah didapat</td>
				<td>
					<ul class="list-unstyled">
						<?php
							$bantuan = DB::table('app_bantuan as ab')
											->leftJoin('app_bantuan_master as abm', 'abm.id', '=', 'ab.id_bantuan')
												->select('abm.nama', 'ab.tahun')
													->where('ab.id_user', $user->id)
													->orderBy('ab.tahun', 'asc')
													->get(); ?>
						@if ( count($bantuan) > 0 )
						
							@foreach( $bantuan as $b )
								<li><b>{{ $b->tahun }}:</b> {{ $b->nama }}</li>
							@endforeach

						@else

							<li style="color:red">Belum pernah mendapatkan bantuan</li>

						@endif
					</ul>
				</td>
			</tr>
		</table>
	</div>
</div>
<!-- END PANEL -->