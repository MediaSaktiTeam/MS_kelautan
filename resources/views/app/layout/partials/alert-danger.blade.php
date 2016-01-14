<div class="alert alert-danger alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert">
		<span aria-hidden="true">&times;</span>
		<span class="sr-only">Close</span>
	</button>

	@if ( count($errors->all()) > 0 )
		@foreach( $errors->all() as $error )
	    	<p>{{ $error }}</p>
	    @endforeach
	@else
		{!! $message !!}
	@endif
</div>