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

<?php

	if ( !IsBot::isThatBot() ) {

		$ip      = $_SERVER['REMOTE_ADDR'];

		$tanggal = date('Y-m-d');

		$waktu   = time();  

		$s = App\Statistik::where('ip', $ip)->where('tanggal', $tanggal)->count();


		if( $s == 0 ){

			$data = [ ['ip' => $ip, 'tanggal' => $tanggal, 'hits' => 1, 'online' => $waktu] ];

			DB::table('site_statistik')->insert($data);

		} else {

			App\Statistik::where('ip', $ip)->where('tanggal', $tanggal)->update(['hits' => DB::raw('hits + 1')]);

		}

	}

?>