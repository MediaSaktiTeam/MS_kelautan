<select class="full-width" data-init-plugin="select2" name="sarana">
	<option value="">Pilih Spesifik Usaha...</option>
	@foreach( $sarana as $sa )
		<option value="{{ $sa->id }}">{{ $sa->nama }}</option>
	@endforeach
</select>