@extends('app.layout.main')

@section('title')
	Master | Jenis Usaha
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
								<a href="#" class="active">Jenis Usaha Pembudidaya</a>
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
								<h5>Jenis Usaha</h5>
								<form class="style-form" method="GET" action="{{ route('usaha_tambah') }}">
									<div class="form-group form-group-default required">
										<label>Jenis Usaha</label>
										<input type="text" name="nama" class="form-control" required>
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
								<table class="table table-hover demo-table-dynamic custom">
									<thead>
										<tr>
											<th width="70">
												<button class="btn btn-check" data-toggle="modal" data-target="#modal-hapus" disabled id="hapus"><i class="pg-trash"></i></button>
											</th>
											<th>Jenis Usaha</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										@foreach($masterusaha as $pd)
										<tr>
											<?php
												$id = $pd->id;
												if ($id < 3) {
											?>
												<td></td>
												<td>{{ $pd->nama }}</td>
												<td></td>
											<?php
												} else {
											?>
												<td>
												<?php $data_master = App\User::where('id_usaha', $pd->id)->count(); ?>

														<?php
															$title = "";
															$disabled = "";
															if ( $data_master >= 1 ):
																$title = "Produksi sedang terpakai";
																$disabled = "disabled";
															endif
														?>
													<div class="checkbox" title="<?php echo $title ?>">
														<input type="checkbox" class="pilih" value="{{ $pd->id }}" id="checkbox{{ $pd->id }}" <?php echo $disabled ?> >
														<label for="checkbox{{ $pd->id }}" class="m-l-20"></label>
													</div>
												</td>
												<td>{{ $pd->nama }}</td>
												<td><button class="btn btn-default btn-xs btn-edit"  data-id="{{ $pd->id }}"  data-nama="{{ $pd->nama }}"><i class="fa fa-pencil"></i></button></td>
											<?php
												}
											?>
										</tr>
										@endforeach
									</tbody>
								</table>
								<center>{!! $masterusaha->links() !!}</center>
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
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i></button>
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
					<form class="style-form" method="GET" action="{{ route('usaha_update') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group form-group-default required">
							<label>Nama Usaha</label>
							<input type="text" id="nama" name="nama" class="form-control" required>
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

@endsection


@section('registerscript')
	<script>
		$(".menu-items .link-master").addClass("active open");
		$(".menu-items .link-master .sub-master-usaha").addClass("active");
		
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

				$(".btn-hapus").attr('href',"{{ route('usaha_hapus') }}/"+id);
			});
			$(".btn-edit").click(function(){

				var id = $(this).data('id');
				var nama = $(this).data('nama');
				var jenis = $(this).data('jenis');
				var namajenis = $(this).data('namajenis');
				$('#id-jenis').val(id);
				$('#nama').val(nama);
				$('#modal-sunting').modal('show');

				$("select option").filter(function() {
				    if( $(this).val().trim() == jenis ){
				    	$(this).prop('selected', true);
				    	$(".select2-chosen").html(namajenis);
				    }
				});
			});
		})();
	</script>
@endsection