<html lang="en">

<head>

	<meta name="author" content="Media Sakti">

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Validasi</title>

	<style>
	<!-- input {
	    border: 1px solid #444;
	    padding: 10px;
	    background: rgba(255,255,255,0.5);
	    margin: 0 0 10px 0;
	    outline: none;
	    width: 100%;
	} 

	.readonly {
		/*background: rgba(0,0,0,0.1);*/
		border-top: none;
		border-left: none;
		border-right: none;
		border-bottom: 2px solid #000;
	}
	-->
	</style>

</head>

<body>

<center>
	Kirimkan ID di bawah ini ke <b>"support@media-sakti.com"</b>. Jangan lupa untuk menyebutkan nama instansi anda.<br>
	Kami akan mengirimkan key untuk mengaktifkan aplikasi anda.<br>

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

</body>
</html>