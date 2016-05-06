@extends('app.layout.main')

@section('title')
	Pengaturan
@endsection



@section('konten')

<?php $SC = new App\Custom; ?>

<!-- START PAGE-CONTAINER -->
<div class="page-container">

	<!-- START PAGE CONTENT WRAPPER -->
	<div class="page-content-wrapper">
		
		<!-- START PAGE CONTENT -->
		<div class="content sm-gutter">
			
			<div class="jumbotron bg-darkblue" data-pages="parallax">
				<div class="container-fluid container-fixed-lg">
					<div class="inner" style="transform: translateY(0px); opacity: 1;">
						<!-- START BREADCRUMB -->
						<ul class="breadcrumb">
							<li>
								<a href="#">Pengaturan</a>
							</li>
						</ul>
					</div>
				</div>
			</div>


			<!-- START CONTAINER FLUID -->
			<div class="container-fluid padding-25 sm-padding-10">

				<div class="row"> 
					<div class="col-md-8"> 
						@if ( Session::has('success') ) 
				    		@include('app/layout/partials/alert-sukses', ['message' => session('success')])
						@endif

						@if ( Session::has('gagal') ) 
				    		@include('app/layout/partials/alert-danger', ['message' => session('gagal')])
						@endif
					</div>
				</div>

				<!-- START ROW -->
				<div class="row">
					<div id="col-tambah" class="col-md-4">
						<!-- START PANEL -->
						<div class="panel panel-default">
							<div class="panel-heading">
								<div class="panel-title">
									Informasi Dasar
								</div>
							</div>
							<div class="panel-body">
								<form class="style-form" id="form-kelompok" method="GET" action="{{ route('pengaturan_update') }}">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<div class="form-group form-group-default required">
										<label>Nama Pengguna</label>
										<input type="hidden" name="id" value="{{ Auth::user()->id }}">
										<input type="text" id="nama" name="username" value="{{ Auth::user()->username }}" class="form-control" required>
									</div>
									<p class="help">* Nama pengguna digunakan untuk <i>login</i></p>
									<br>
									<div class="form-group form-group-default required">
										<label>Nama Tampilan</label>
										<input type="text" id="nama" name="name" value="{{ Auth::user()->name }}" class="form-control" required>
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-primary btn-cons btn-simpan">Simpan</button>
									</div>
								</form>
							</div>
						</div>
						<!-- END PANEL -->
					</div>

					<div id="col-tambah" class="col-md-4">
						<!-- START PANEL -->
						<div class="panel panel-default">
							<div class="panel-heading">
								<div class="panel-title">
									Ubah Kata Sandi
								</div>
							</div>
							<div class="panel-body">
								<form class="style-form" id="form-kelompok" method="GET" action="{{ route('pengaturan_update_password') }}">
									{{ csrf_field() }}
									<div class="form-group form-group-default required">
										<label>Kata Sandi Lama</label>
										<input type="password" id="sandi-lama" name="sandi_lama" placeholder="{{ $SC->waktu_lalu(Auth::user()->tgl_password) }}" class="form-control" required>
									</div>
									<div class="form-group form-group-default required">
										<label>Kata Sandi Baru</label>
										<input type="password" id="sandi-baru" name="sandi_baru" class="form-control" disabled>
									</div>
									<div class="form-group form-group-default required" id="con-label-ulang-sandi">
										<label>Ulangi Kata Sandi Baru</label>
										<input type="password" id="ulang-sandi" class="form-control" disabled>
									</div>
									<div class="form-group">
										<button type="submit" disabled class="btn btn-primary btn-cons btn-simpan btn-ganti-password">Simpan</button>
									</div>
								</form>
							</div>
						</div>
						<!-- END PANEL -->
					</div>
				</div>
			</div>
			<!-- END CONTAINER FLUID -->
		</div>
		<!-- END PAGE CONTENT -->
		<!-- START COPYRIGHT -->
			@include('app.layout.partials.copyright')
		<!-- END COPYRIGHT -->
	</div>
	<!-- END PAGE CONTENT WRAPPER -->

</div>
<!-- END PAGE CONTAINER -->

@endsection


@section('registerscript')
	<script>
		$(".menu-items .link-pengaturan").addClass("active");

		$(function(){

			$("#sandi-lama").keyup(function(){
				var sandi_lama = $(this).val();
				if ( sandi_lama != "" ) {
					$("#sandi-baru").removeAttr('disabled');
				} else {
					$("#sandi-baru").attr('disabled','');
				}
			});

			$("#sandi-baru").keyup(function(){
				var sandi_baru = $(this).val();
				if ( sandi_baru != "" ) {
					$("#ulang-sandi").removeAttr('disabled');
				} else {
					$("#ulang-sandi").attr('disabled','');
				}
			});

			$("#ulang-sandi").keyup(function(){
				var sandi_baru = $("#sandi-baru").val();
				var ulang_sandi = $(this).val();

				if ( sandi_baru == ulang_sandi ) {
					$("#con-label-ulang-sandi").removeClass('has-error');
					$(".btn-ganti-password").removeAttr('disabled');
				} else {
					$("#con-label-ulang-sandi").addClass('has-error');
					$(".btn-ganti-password").attr('disabled','');
				}
			});

		});
	</script>
@endsection