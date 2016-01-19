
<div class="mail-header">
	<!-- title -->
	<div class="mail-title">
		Kirim Pesan <i class="entypo-pencil"></i>
	</div>
	
	<!-- links -->
	<div class="mail-links">
	
		<a onclick="$('#form-kirim-pesan').submit()" class="btn btn-success btn-icon">
			Kirim
			<i class="entypo-mail"></i>
		</a>
		
	</div>
</div>


<div class="mail-compose">

	@if ( count($errors) > 0 )
		<div class="alert alert-danger">
			@foreach( $errors->all() as $error )
            	<p>{{ $error }}</p>
            @endforeach
		</div>
	@endif

	<form method="post" role="form" id="form-kirim-pesan" action="{{ route('pesan_kirim') }}">
		
		{{ csrf_field() }}
		
		<div class="form-group">
			<label for="to">Kepada:</label>
			<input type="text" class="form-control" name="email" value="{{ isset( $To ) ? $To : Input::old('email') }}" id="to" tabindex="1" />
		</div>

		
		<div class="form-group">
			<label for="subject">Subjek:</label>
			<input type="text" class="form-control" name="subjek" value="{{ Input::old('subjek') }}" id="subject" tabindex="1" />
		</div>
		
		
		<div class="compose-message-editor">
			<textarea class="form-control" placeholder="Pesan" name="pesan">{{ Input::old('pesan') }}</textarea>
		</div>
		
	</form>

</div>

