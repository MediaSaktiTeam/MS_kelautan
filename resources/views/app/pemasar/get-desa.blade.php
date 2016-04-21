<select name="desa" data-init-plugin="select2" class="form-control full-width">
	<option value="">Pilih desa</option>
	<?php $kecamatan = App\Kecamatan::find($id)->kecamatan ?>
	@foreach ( $kecamatan as $kec )
		<option value="{{ $kec->id }}">{{ $kec->nama }}</option>
	@endforeach
</select>