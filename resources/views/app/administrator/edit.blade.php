<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="id" value="{{ $user->id }}">
<div class="form-group form-group-default required">
	<label>Username</label>
	<input type="text" name="username" class="form-control" value="{{ $user->username }}" required>
</div>

<br>
<div class="form-group required">
	<label>Hak Akses</label>
	<div class="checkbox" title="hak_akses">
		<input type="checkbox" id="nelayan1" name="nelayan" {{ $role->nelayan == 1 ? "checked=''":"" }}>
		<label for="nelayan1">Nelayan</label>
	</div>

	<div class="checkbox" title="hak_akses">
		<input type="checkbox" id="pembudidaya2" name="pembudidaya" {{ $role->pembudidaya == 1 ? "checked=''":"" }}>
		<label for="pembudidaya2">Pembudidaya</label>
	</div>

	<div class="checkbox" title="hak_akses">
		<input type="checkbox" id="pengolah2" name="pengolah" {{ $role->pengolah == 1 ? "checked=''":"" }}>
		<label for="pengolah2">Pengolah</label>
	</div>

	<div class="checkbox" title="hak_akses">
		<input type="checkbox" id="pengolah2" name="pesisir" {{ $role->pesisir == 1 ? "checked=''":"" }}>
		<label for="pengolah2">pesisir</label>
	</div>
</div>

<div class="form-group">
	<button class="btn btn-primary btn-cons">Simpan</button>
</div>