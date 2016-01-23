<script src="{{ url('resources/assets/app/js/select2.min.js') }}"></script>
<script type="text/javascript">
  $('select').select2({
	  placeholder: "Pilih Sarana / Prasarana..."
	});
</script>

<select name="id_sarana[]" class="full-width" data-init-plugin="select2" multiple="">
	@foreach( $sarana as $sa )
		<option value="{{ $sa->id }}">{{ $sa->sub }}</option>
	@endforeach
</select>