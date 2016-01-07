<script src="{{ url('resources/assets/app/js/select2.min.js') }}"></script>
<script type="text/javascript">
  $('select').select2();
</script>

<select class="full-width" data-init-plugin="select2" name="id_usaha" required>
	<option value="">Pilih Spesifik Usaha...</option>
	@foreach( $usaha as $us )
		<option value="{{ $us->id }}">{{ $us->nama }}</option>
	@endforeach
</select>