<div class="row">
	<div class="col-sm-3">
		<table class="table table-bordered table-hover">
			<tr>
				<th width="10" style="padding:5px !important">No</th>
				<th style="padding:5px !important">Nama Desa</th>
			</tr>
			<?php $no = 1 ?>
			@foreach( $desa as $ds )
				<tr style="cursor: pointer;" class="desa" onclick="detail_desa({{ $ds->id }})">
					<td style="padding:5px !important">{{ $no++ }}</td>
					<td style="padding:5px !important">{{ $ds->nama }}</td>
				</tr>
			@endforeach
		</table>
	</div>

	<div class="col-sm-9" id="detail-desa">

	</div>
</div>