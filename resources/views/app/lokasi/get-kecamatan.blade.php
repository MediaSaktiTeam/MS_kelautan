<select name="kecamatan" class="form-control full-width" data-init-plugin="select2" onchange="get_desa(this.value)">
	<option value="">Pilih Kecamatan</option>
	<?php $kecamatan = App\Kabupaten::find($id)->kecamatan->where('id_kabupaten','7303') ?>
	@foreach ( $kecamatan as $kec )
		<option value="{{ $kec->id }}">{{ $kec->nama }}</option>
	@endforeach
</select>