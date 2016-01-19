@extends('admin.layout.main')

@section('konten')

<ol class="breadcrumb bc-3">
	<li>
		<a href="{{ url('admin') }}">Beranda</a>
	</li>

	<li class="active">
		<strong>Pengaturan Akun</strong>
	</li>
</ol>
			
<h2>Pengaturan Akun</h2>
<br />

@if ( Session::has('success') ) 
	@include('admin/layout/inc/alert-sukses', ['message' => session('success')])
@endif

<span id="error">
@if ( count($errors) > 0 )
	@include('admin/layout/inc/alert-danger', ['errors' => $errors]);
@endif
</span>

<form role="form" method="post" class="form-horizontal form-groups-bordered validate" action="{{ route('user_simpan_pengaturan') }}">
	{{ csrf_field() }}
	<div class="row">
		<div class="col-md-12">
			
			<div class="panel panel-primary" data-collapsed="0">
				
				<div class="panel-body">
							
						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">Nama Lengkap</label>
							
							<div class="col-sm-5">
								<input type="text" class="form-control" name="name" value="{{ $User->name }}" data-validate="required" data-message-required="Wajib diisi">
							</div>
						</div>

						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">Nama Pengguna</label>
							
							<div class="col-sm-5">
								<input type="text" class="form-control" name="username" value="{{ $User->username }}" data-validate="required" data-message-required="Wajib diisi">
							</div>
						</div>

						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">Kata Sandi</label>
							
							<div class="col-sm-5">
								<input type="password" class="form-control" value="123456" disabled>
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-5">
								<button type="submit" class="btn btn-success">Simpan</button>
								<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-ganti-password"><i class="fa fa-unlock"></i> Ganti Kata Sandi</button>
							</div>
						</div>
					
				</div>
			
			</div>
		
		</div>
	</div>

</form>

@endsection

@section('registerscript')

	<!-- Modal 1 (Basic)-->
	<div class='modal fade' id='modal-ganti-password'>
		<form method="post" action="{{ route('user_ganti_password') }}">

			{{ csrf_field() }}

			<div class='modal-dialog'>
				<div class='modal-content'>
						<div class='modal-header'>
							<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
							<h4 class='modal-title'>Ganti Password</h4>
						</div>
						
						<div class='modal-body'>

							@if ( count( $errors ) )
								<div class="alert alert-danger">
									@foreach( $errors->all() as $error )
										{{ $error }}<br>
									@endforeach
								</div>
							@endif

							@if ( Session::has('err') )
								<div class="alert alert-danger">
									{{ Session::get('err') }}
								</div>
							@endif

							<input type='password' name='pass_lama' class='form-control' placeholder='Tulis Password Lama'>
							<br>
							<input type='password' name='pass_baru' class='form-control' placeholder='Tulis Password Baru'>
							<br>
							<input type='password' name='pass_konfir' class='form-control' placeholder='Tulis Ulang Password Baru'>
						</div>
						
						<div class='modal-footer no-margin'>
							<button type='button' class='btn btn-default' data-dismiss='modal'>Kembali</button>
							<button type='submit' id='ganti-password' class='btn btn-success'>Simpan Perubahan</button>
						</div>
				</div>
			</div>
		</form>
	</div>

	@if ( count( $errors ) || Session::has('err') )
		<script>
			$(function(){
				$("#error").hide();
				$("#modal-ganti-password").modal('show');
			});
		</script>
	@endif

@endsection