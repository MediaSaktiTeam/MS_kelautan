@extends('app.layout.main')

@section('title')
	Master | Jenis Olahan
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
								<a href="#">Master</a>
							</li>
							<li>
								<a href="#" class="active">Jenis Olahan yang dimiliki</a>
							</li>
						</ul>
					</div>
				</div>
			</div>


			<!-- START CONTAINER FLUID -->
			<div class="container-fluid padding-25 sm-padding-10">

				
				<!-- START ROW -->
				<div class="row">
					<div class="col-md-6">
						@if ( Session::has('success') ) 
						    	@include('app/layout/partials/alert-sukses', ['message' => session('success')])
						@endif
						@if ( Session::has('delete') ) 
						    	@include('app/layout/partials/alert-sukses', ['message' => session('delete')])
						@endif
						@if ( Session::has('gagal') ) 
						    	@include('app/layout/partials/alert-danger', ['message' => session('gagal')])
						@endif

						@if ( count($errors) > 0 )
								@include('app/layout/partials/alert-danger', ['errors' => $errors])
						@endif
						<!-- START PANEL -->
						<div class="panel panel-default">
							<div class="panel-heading">
								<div class="panel-title">
									Master
								</div>
							</div>
							<div class="panel-body">
								<h5>Jenis Olahan</h5>
								<p>* Jenis Olahan yang dimiliki.</p>
								<form class="style-form" method="GET" action="{{ route('jenisolahan_tambah') }}">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<div class="form-group form-group-default required">
										<label>Jenis Olahan</label>
										<input type="text" name="jenis" class="form-control" required>
									</div>
									<div class="form-group">
										<button class="btn btn-primary btn-cons">Tambah</button>
									</div>
								</form>
							</div>
						</div>
						<!-- END PANEL -->
					</div>

					<div class="col-md-6">
						<!-- START PANEL -->
						<div class="panel panel-default">
							<div class="panel-body">
								<table class="table table-hover demo-table-dynamic custom" id="tableWithDynamicRows">
									<thead>
										<tr>
											<th>
												<button class="btn btn-check" data-toggle="modal" data-target="#modal-hapus" disabled id="hapus"><i class="pg-trash"></i></button>
											</th>
											<th>Jenis</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										@foreach($JenisOlahan as $jo)
										<tr>
											<td>
											<?php $data_master = App\KepemilikanSarana::where('id_sarana', $jo->id)->count(); ?>

													<?php
														$title = "";
														$disabled = "";
														if ( $data_master >= 1 ):
															$title = "Sarana nelayan sedang terpakai";
															$disabled = "disabled";
														endif
													?>
												<div class="checkbox" title="<?php echo $title ?>">
													<input type="checkbox" class="pilih" value="{{ $jo->id }}" id="checkbox{{ $jo->id }}" <?php echo $disabled ?>>
													<label for="checkbox{{ $jo->id }}" class="m-l-20"></label>
												</div>
											</td>
											<td>{{ $jo->jenis }}</td>
											<td><button class="btn btn-default btn-xs btn-edit" data-id="{{ $jo->id }}" data-jenis="{{ $jo->jenis }}" ><i class="fa fa-pencil"></i></button></td>
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


<!-- MODAL STICK UP EDIT -->
<div class="modal fade stick-up" id="modal-sunting" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content-wrapper">
			<div class="modal-content">
				<div class="modal-header clearfix text-left">
					<button type="button" class="close" data-dismiss="modal"  aria-hidden="true"><i class="pg-close fs-14"></i></button>
					<h5>Sunting Data</h5>
				</div>
				<div class="modal-body">
					<form class="style-form" method="GET" action="{{ route('jenisolahan_update') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group form-group-default required">
							<label>Jenis Olahan</label>
							<input type="text" id="jenis" name="jenis" class="form-control" required>
						</div>
						<div class="form-group">
							<input type="hidden" id="id-jenis" name="id">
							<button class="btn btn-primary btn-cons">Simpan</button>
							<button type="button" class="btn btn-default btn-cons" data-dismiss="modal">Kembali</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- END MODAL STICK UP EDIT -->
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
		$(".menu-items .link-master").addClass("active open");
		$(".menu-items .link-master .sub-saranapengolah").addClass("active");
		$(".menu-items .link-master .sub-jenisolahan").addClass("active");

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

				$(".btn-hapus").attr('href',"{{ route('jenisolahan_hapus') }}/"+id);
			});

			$(".btn-edit").click(function(){

				var id = $(this).data('id');
				var jenis = $(this).data('jenis');
				$('#id-jenis').val(id);
				$('#jenis').val(jenis);
				$('#modal-sunting').modal('show');

				$("select option").filter(function() {
				    if( $(this).val().trim() == jenis ){
				    	$(this).prop('selected', true);
				    	$(".select2-chosen").html(jenis);
				    }
				});
			});
		})();
	</script>
@endsection