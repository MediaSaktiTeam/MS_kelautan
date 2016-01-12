<script src="{{ url('resources/assets/app/js/select2.min.js') }}"></script>
<script type="text/javascript">
  $('select').select2({
	  placeholder: "Pilih Jenis Bantuan..."
	});
</script>

<label>Jenis Bantuan</label>
<select name="id_bantuan[]" class="full-width" data-init-plugin="select2" multiple="" required>
	@foreach( $bantuan as $ba )
		<option value="{{ $ba->id }}">{{ $ba->nama }}</option>
	@endforeach
</select>