<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
		<meta charset="utf-8" />
		<title>Bantaeng Perikanan</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<link rel="apple-touch-icon" href="assets/ico/60.png">
		<link rel="apple-touch-icon" sizes="76x76" href="assets/ico/76.png">
		<link rel="apple-touch-icon" sizes="120x120" href="assets/ico/120.png">
		<link rel="apple-touch-icon" sizes="152x152" href="assets/ico/152.png">
		<link rel="icon" type="image/x-icon" href="assets/ico/60.png" />
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-touch-fullscreen" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="default">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<link class="main-stylesheet" href="{{ url('resources/assets/app/css/app.css') }}" rel="stylesheet" type="text/css" />

		<!--[if lte IE 9]>
			<link href="assets/css/ie9.css" rel="stylesheet" type="text/css" />
		<![endif]-->
		<!--[if lt IE 9]>
			<link href="assets/libs/mapplic/css/mapplic-ie.css" rel="stylesheet" type="text/css" />
		<![endif]-->

		<script type="text/javascript">
		window.onload = function()
		{
			// fix for windows 8
			if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
				document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="assets/css/windows.chrome.fix.css" />'
		}
		</script>
	</head>
	<body class="fixed-header">
		
		<div class="login-wrapper ">
			<!-- START Login Background Pic Wrapper-->
			<div class="bg-pic">
				<!-- START Background Pic-->
				<img src="{{ url('resources/assets/app/img/dashboard/pages_hero.jpg') }}" data-src="{{ url('resources/assets/app/img/dashboard/pages_hero.jpg') }}" data-src-retina="{{ url('resources/assets/app/img/dashboard/pages_hero.jpg') }}" alt="" class="lazy">
				<!-- END Background Pic-->
			</div>
			<!-- END Login Background Pic Wrapper-->
			<!-- START Login Right Container-->
			<div class="login-container bg-white">
				<div class="p-l-50 m-l-20 p-r-50 m-r-20 p-t-50 m-t-30 sm-p-l-15 sm-p-r-15 sm-p-t-40">
					<img src="{{ url('resources/assets/app/img/logo.png') }}" alt="logo" data-src="{{ url('resources/assets/app/img/logo.png') }}" data-src-retina="{{ url('resources/assets/app/img/logo_2x.png') }}" width="178">
					<p class="p-t-35">Silahkan masuk untuk mengakses aplikasi</p>

					@if ( Session::has('gagal') )
						<div class="alert alert-danger no-margin">{{ Session::get('gagal') }}</div>
					@endif

					<!-- START Login Form -->
					<form id="form-login" class="p-t-15" role="form" method="post" action="{{ url('app/login') }}">
						{{ csrf_field() }}
						<!-- START Form Control-->
						<div class="form-group form-group-default">
							<label>Login</label>
							<div class="controls">
								<input type="text" name="username" placeholder="User Name" class="form-control" required>
							</div>
						</div>
						<!-- END Form Control-->
						<!-- START Form Control-->
						<div class="form-group form-group-default">
							<label>Password</label>
							<div class="controls">
								<input type="password" class="form-control" name="password" placeholder="Credentials" required>
							</div>
						</div>
						<!-- START Form Control-->
						<div class="row">
							<div class="col-md-6 no-padding">
								<div class="checkbox ">
									<input type="checkbox" value="1" name="remember" id="checkbox1">
									<label for="checkbox1">Keep Me Signed in</label>
								</div>
							</div>
						</div>
						<!-- END Form Control-->
						<button class="btn btn-primary btn-cons m-t-10" type="submit">Sign in</button>
					</form>
					<!--END Login Form-->
					<div class="pull-bottom sm-pull-bottom">
						<div class="m-b-30 p-r-80 sm-m-t-20 sm-p-r-15 sm-p-b-20 clearfix">
							<div class="col-sm-9 no-padding m-t-10">
								<p><small>
								Create a pages account. If you have a facebook account, log into it for this process. Sign in with <a href="#" class="text-info">Facebook</a> or <a href="#" class="text-info">Google</a></small>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END Login Right Container-->
		</div>

		<script src="{{ url('resources/assets/app/js/vendor.js') }}" type="text/javascript"></script>
	</body>
</html>