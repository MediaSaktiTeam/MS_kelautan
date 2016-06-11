<script src="{{ url('resources/assets/app/js/select2.min.js') }}"></script>
<script type="text/javascript">
  $('select').select2();
</script>

<select class="full-width" data-init-plugin="select2" name="id_usaha" required>
	<option value="">Pilih Jenis Usaha...</option>
	@endforeach
</select>
