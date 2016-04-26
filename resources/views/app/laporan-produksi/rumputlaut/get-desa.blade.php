<select name="desa" data-init-plugin="select2" class="form-control full-width">
	<option value="">Pilih desa</option>
	<?php $desa = App\Kecamatan::find($id)->kecamatan ?>
	@foreach ( $desa as $des )
		<option value="{{ $des->id }}">{{ $des->nama }}</option>
	@endforeach
</select>