<table class="table table-hover demo-table-dynamic custom" id="tableWithDynamicRows">
	<tbody>
	<?php $total= $jumlahpenduduk->laki + $jumlahpenduduk->perempuan + $jumlahpenduduk->jumlah_kk; ?>
	
		<tr>
			<td><b>Nama Kecamatan</b></td>
			<td><b>Laki-laki (org)</b></td>
			<td><b>Perempuan (org)</b></td>
			<td><b>Jumlah KK</b></td>
			<td><b>Total</b></td>
		</tr>
		<tr>
		
			<td>{{ $jumlahpenduduk->datakecamatan->nama }}</td>
			<td>{{ $jumlahpenduduk->laki }}</td>
			<td>{{ $jumlahpenduduk->perempuan }}</td>
			<td>{{ $jumlahpenduduk->jumlah_kk }}</td>
			<td><?php echo $total; ?></td>
		
		</tr>
	</tbody>
</table>

<span id="id_jumlahpenduduk" data-id="{{ $jumlahpenduduk->id_jumlahpenduduk }}"></span>