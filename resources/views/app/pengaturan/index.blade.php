@extends('app.layout.main')

@section('title')
	Kelompok Nelayan | Tambah
@endsection



@section('konten')

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
										<input type="hidden" name="id" value="{{ $user->id }}">
										<input type="text" id="nama" name="username" value="{{ $user->username }}" class="form-control" required>
									</div>
									<div class="form-group form-group-default required">
										<label>Nama Tampilan</label>
										<input type="text" id="nama" name="name" value="{{ $user->name }}" class="form-control" required>
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
								<form class="style-form" id="form-kelompok" method="GET" action="">
									<div class="form-group form-group-default required">
										<label>Kata Sandi Lama</label>
										<input type="text" id="nama" name="nama" placeholder="Diubah 2 bulan yang lalu" class="form-control" required>
									</div>
									<div class="form-group form-group-default required">
										<label>Kata Sandi Baru</label>
										<input type="text" id="nama" name="nama" placeholder="Diubah 2 bulan yang lalu" class="form-control" disabled>
									</div>
									<div class="form-group form-group-default required">
										<label>Ulangi Kata Sandi Baru</label>
										<input type="text" id="nama" name="nama" placeholder="Diubah 2 bulan yang lalu" class="form-control" disabled>
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-primary btn-cons btn-simpan">Simpan</button>
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
		<!-- START CONTAINER FLUID -->


		<div class="container-fluid container-fixed-lg footer">
			<div class="copyright sm-text-center">
				<p class="small no-margin pull-left sm-pull-reset">
					<span class="hint-text">Copyright © 2015 </span>
					<span class="font-montserrat">Media SAKTI</span>.
					<span class="hint-text">All rights reserved. </span>
					<span class="sm-block"><a href="#" class="m-l-10 m-r-10">Terms of use</a> | <a href="#" class="m-l-10">Privacy Policy</a></span>
				</p>
				<p class="small no-margin pull-right sm-pull-reset">
					<a href="#">Hand-crafted</a> <span class="hint-text">&amp; Made with Love ®</span>
				</p>
				<div class="clearfix"></div>
			</div>
		</div>
		<!-- END COPYRIGHT -->
	</div>
	<!-- END PAGE CONTENT WRAPPER -->

</div>
<!-- END PAGE CONTAINER -->

@endsection


@section('registerscript')
	<script>
		$(".menu-items .link-pengaturan").addClass("active");
	</script>
@endsection