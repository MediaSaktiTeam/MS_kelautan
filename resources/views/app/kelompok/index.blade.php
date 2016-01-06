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
								<a href="#">Kelompok Nelayan</a>
							</li>
							<li>
								<a href="#" class="active">Tambah Kelompok</a>
							</li>
						</ul>
					</div>
				</div>
			</div>


			<!-- START CONTAINER FLUID -->
			<div class="container-fluid padding-25 sm-padding-10">

				
				<!-- START ROW -->
				<div class="row">
					<div class="col-md-5">
						<!-- START PANEL -->
						<div class="panel panel-default">
							<div class="panel-heading">
								<div class="panel-title">
									Kelompok Nelayan
								</div>
							</div>
							<div class="panel-body">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla, corrupti, esse. Earum!</p>
								<form class="style-form" method="GET" action="{{ route('kelompok_tambah') }}">
                					<input type="hidden" name="_token" value="{{ csrf_token() }}">
                					<div class="form-group form-group-default required">
										<label>Bidang Usaha</label>
										<select class="full-width" data-init-plugin="select2" name="tipe">
											<option value="Nelayan">Nelayan</option>
											<option value="Pembudidaya">Pembudidaya</option>
										</select>
									</div>
									<div class="form-group form-group-default required">
										<label>Nama Kelompok</label>
										<input type="text" name="nama" class="form-control" required>
									</div>
									<div class="form-group form-group-default required">
										<label>Alamat Sekretariat</label>
										<input type="text" name="alamat" class="form-control" required>
									</div>
									<div class="form-group form-group-default required">
										<label>Nomor Rekening</label>
										<input type="text" name="no_rekening" class="form-control" required>
									</div>
									<div class="form-group form-group-default required">
										<label>Nama Rekening</label>
										<input type="text" name="nama_rekening" class="form-control" required>
									</div>
									<div class="form-group form-group-default required">
										<label>Nama Bank</label>
										<input type="text" name="nama_bank" class="form-control" required>
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-primary btn-cons">Tambah</button>
									</div>
								</form>
							</div>
						</div>
						<!-- END PANEL -->
					</div>

					<div class="col-md-7">
						<!-- START PANEL -->
						<div class="panel panel-default">
							<div class="panel-body">
								<table class="table table-hover demo-table-dynamic custom" id="tableWithDynamicRows">
									<thead>
										<tr>
											<th>
												<button class="btn btn-check" data-toggle="modal" data-target="#modal-hapus" disabled id="hapus"><i class="pg-trash"></i></button>
											</th>
											<th>ID Kelompok</th>
											<th>Nama Kelompok</th>
											<th>Bidang Usaha</th>
										</tr>
									</thead>
									<tbody>
										@foreach($kelompok as $kel)
										<tr>
											<td>
												<div class="checkbox">
													<input type="checkbox" class="pilih" value="{{ $kel->id }}" id="checkbox{{ $kel->id }}">
													<label for="checkbox{{ $kel->id }}" class="m-l-20"></label>
												</div>
											</td>
											<td>{{ $kel->id }}</td>
											<td>{{ $kel->nama }}</td>
											<td>{{ $kel->tipe }}</td>
										</tr>
										@endforeach
									</tbody>
								</table>
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


<!-- MODAL STICK UP SMALL ALERT -->
<div class="modal fade stick-up" id="modal-hapus" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content-wrapper">
			<div class="modal-content">
				<div class="modal-header clearfix text-left">
					<button type="button" class="close" data-dismiss="modal"  aria-hidden="true"><i class="pg-close fs-14"></i></button>
					<h5>Hapus Data</h5>
				</div>
				<div class="modal-body">
					<p class="no-margin">Data akan dihapus. Apakah Anda yakin?</p>
				</div>
				<div class="modal-footer">
					<a class="btn btn-danger btn-hapus btn-cons pull-left inline">Ya</a>
					<button type="button" class="btn btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Tidak</button>
				</div>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- END MODAL STICK UP SMALL ALERT -->

@endsection


@section('registerscript')
	<script>
		$(".menu-items .link-kelompok").addClass("active");

		$(function(){

			$("#hapus").click(function(){

				if($(".pilih:checked").length) {
					var id = "";
					$(".pilih:checked").each(function() {
						id += $(this).val() + ",";
					});
					id =  id.slice(0,-1);
				}
				else {
					return false;
				}

				$(".btn-hapus").attr('href',"{{ route('kelompok_hapus') }}/"+id);

			});
		})();
	</script>
@endsection