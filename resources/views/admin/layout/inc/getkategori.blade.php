@foreach( $Kategori as $Kat )
	<div class="checkbox-ion">
		<input type="checkbox" class="kategori" value="{{ $Kat->id }}" id="hk-{{ $Kat->id }}">
		<label for="hk-{{ $Kat->id }}">&nbsp; &nbsp;{{ $Kat->nama_kategori }}</label>
	</div>
@endforeach


<script>
$(document).ready(function(){
  $('input').iCheck({
    checkboxClass: 'icheckbox_minimal-grey',
    radioClass: 'iradio_minimal-grey',
    increaseArea: '20%' // optional
  });
});
</script>