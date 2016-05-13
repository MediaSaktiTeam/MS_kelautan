<!DOCTYPE html>

<html>

	<head>

		<title>@yield('title')</title>

		@include('app/layout/partials/meta')
		@yield('meta')

	</head>

	<body class="fixed-header dashboard">

		@include('app/layout/partials/header')

		@yield('konten')

		@include('app/layout/partials/footer')

		@yield('registerscript')
	</body>

</html>