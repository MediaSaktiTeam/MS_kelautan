<label>Sub Menu dari:</label>
<select class="form-control parent_id" name="parent_id">
	<option value="0" selected="">Bukan Submenu</option>
	@foreach($Menus as $Menu)
		<option value="{{ $Menu->id }}">{{ $Menu->judul }}</option>
	@endforeach
</select>