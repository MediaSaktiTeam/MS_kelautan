<!DOCTYPE html>

<html>

	<head>

		<meta charset="utf-8">
		<title>@yield('title')</title>

		@include('front/layout/partials/meta')

		@yield('meta')

	</head>

	<body>

		@if ( Request::url() == url('/') )
			@include('front/layout/partials/header-home')
		@else
			@include('front/layout/partials/header')
		@endif

		@yield('konten')

		@include('front/layout/partials/footer')

		@yield('registerscript')
	</body>

</html>