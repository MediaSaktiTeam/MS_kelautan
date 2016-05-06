<html lang="en">

<head>

	<meta name="author" content="Media Sakti">

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Validasi</title>

	<style>
		* {
			font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
			line-height: 24px;
		}
		input {
			border: 1px solid #444;
			padding: 10px;
			background: rgba(255,255,255,0.5);
			margin: 0 0 10px 0;
			outline: none;
			width: 100%;
		} 

		.readonly {
			border-top: none;
			border-left: none;
			border-right: none;
			border-bottom: 2px solid #000;
		}
		.vh-center {
			height: 100vh;
			display: flex;
			-webkit-box-pack: center;
			-webkit-justify-content: center;
			-ms-flex-pack: center;
			align-items: center;
			justify-content: center;
		}
	</style>

</head>

<body>

	<div class="vh-center">

		<div>

			<center>

				<h1>Opps!!!</h1>
				<h3>Aplikasi Anda belum aktif. </h3>
				<p>Kirimkan ID di bawah ini ke <b>"support@media-sakti.com"</b>. Jangan lupa untuk menyebutkan nama instansi Anda.<br>
				Kami akan mengirimkan key untuk mengaktifkan aplikasi Anda.</p>

				@if ( Session::has('gagal') )
					<br>
					<span style="color:red">
					{{ Session::get('gagal') }}
					</span>
				@endif

				<br>
			</center>

			<form action="{{ url('/mediasakti/validasi-app') }}" method="post">
				{{ csrf_field() }}
				<table border="0" align="center" width="800px">
					<tr>
						<td>ID</td><td><input type="text" readonly class="readonly" style="cursor:text" value="{{ $validasi }}"></td>
					</tr>
					<tr>
						<td>Serial</td><td><input type="text" name="key" required></td>
					</tr>
					<tr>
						<td>&nbsp;</td><td><button>Aktifkan Aplikasi</button></td>
					</tr>

				</table>
			</form>

		</div>

	</div>

</body>
</html>