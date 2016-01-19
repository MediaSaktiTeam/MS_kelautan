<?php
$IdBlogKat = array();
foreach( $BlogKategori as $BK ) {
	$IdBlogKat[] = $BK->id_kategori;
}
?>

@foreach( $Kategori as $Kat )
	<div class="checkbox-ion">
		<input type="checkbox" class="kategori" value="{{ $Kat->id }}" id="chk-{{ $Kat->id }}" <?php echo in_array($Kat->id, $IdBlogKat) ? "checked=''":""; ?>>
		<label for="chk-{{ $Kat->id }}">&nbsp; &nbsp;{{ $Kat->nama_kategori }}</label>
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