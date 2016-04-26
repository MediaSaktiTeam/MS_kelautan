<select name="kabupaten" class="form-control full-width" data-init-plugin="select2" onchange="get_kecamatan(this.value)">
	<option value="">Pilih Kabupaten</option>
	<?php $kabupaten = App\Provinsi::find($id)->kabupaten->where('nama','Kab. Bantaeng') ?>
	@foreach ( $kabupaten as $kab )
		<option value="{{ $kab->id }}">{{ $kab->nama }}</option>
	@endforeach
</select>