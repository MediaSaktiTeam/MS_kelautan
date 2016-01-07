<select class="full-width" data-init-plugin="select2" name="usaha">
	<option value="">Pilih Spesifik Usaha...</option>
	@foreach( $usaha as $us )
		<option value="{{ $us->id }}">{{ $us->nama }}</option>
	@endforeach
</select>