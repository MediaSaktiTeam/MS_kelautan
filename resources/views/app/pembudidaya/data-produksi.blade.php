<script src="{{ url('resources/assets/app/js/select2.min.js') }}"></script>
<script type="text/javascript">
  $('select').select2();
</script>

<select onchange="get_sarana(this.value)" class="full-width" data-init-plugin="select2" name="id_usaha" required>
	<option value="">Pilih Jenis Usaha...</option>
	@foreach( $produksi as $p )
		<option value="{{ $p->id }}">{{ $p->nama }}</option>
	@endforeach
</select>