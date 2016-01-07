@extends('app.layout.main')

@section('title')
	Pembudidaya | Tambah
@endsection



@section('konten')

<!-- START PAGE-CONTAINER -->
<div class="page-container">

	<!-- START PAGE CONTENT WRAPPER -->
	<div class="page-content-wrapper">
		
		<!-- START PAGE CONTENT -->			
		<div class="content">
			
			<div class="jumbotron bg-darkblue" data-pages="parallax">
				<div class="container-fluid container-fixed-lg">
					<div class="inner" style="transform: translateY(0px); opacity: 1;">
						<!-- START BREADCRUMB -->
						<ul class="breadcrumb pull-left">
							<li>
								<a href="{{ route('pembudidaya') }}">Pembudidaya</a>
							</li>
						</ul>
						
						<button id="show-tambah-pembudidaya" class="btn btn-primary bg-blueblur m-t-10 m-b-10 pull-right">Tambah</button>
					</div>
				</div>

			</div>

			<br>

			<div class="container-fluid container-fixed-lg">
				<div class="inner" style="transform: translateY(0px); opacity: 1;">

					<div class="row">

						<div id="tambah-pembudidaya" style="display:none">
							<div class="col-lg-7 col-md-6 ">

								<!-- START PANEL -->
								<div class="panel panel-transparent">
									<div class="panel-heading">
										<h3>Budidaya perikanan adalah</h3>
										<p>usaha pemeliharaan dan pengembang biakan ikan atau organisme air lainnya.</p>
									</div>
									<div class="panel-body">
										<form id="form-personal" method="post" action="{{ route('pembudidaya_simpan') }}" role="form">
											
											{{ csrf_field() }}

											<div class="row clearfix">
												<div class="col-sm-6">
													<div class="form-group required">
														<label>NIK</label>
														<input type="text" class="form-control" name="nik" required>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label>Nama Lengkap</label>
														<input type="text" class="form-control" name="name" required>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-sm-12">
													<div class="form-group">
														<label>Alamat</label>
														<input type="text" class="form-control" name="alamat" required>
													</div>
												</div>
											</div>
											
											<div class="row">
												<div class="col-sm-6">
													<div class="form-group">
														<label>Nama Kelompok</label>
														<div class="input-group">
															<select class="full-width" name="id_kelompok" data-init-plugin="select2" required>
																<option value="">Pilih Kelompok...</option>
																@foreach( $kelompok as $klp )
																	<option value="{{ $klp->id_kelompok }}">{{ $klp->nama }}</option>
																@endforeach
															</select>
															<div class="input-group-btn">
																<button class="btn btn-primary" type="button">+</button>
															</div>
														</div>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label>Jabatan Dalam Kelompok</label>
														<div class="input-group">
															<select class="full-width" name="id_jabatan" data-init-plugin="select2" required>
																<option value="">Pilih Jabatan...</option>
																@foreach( $jabatan as $jab )
																	<option value="{{ $jab->id }}">{{ $jab->nama }}</option>
																@endforeach
															</select>
															<div class="input-group-btn">
																<button class="btn btn-primary" type="button">+</button>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label>Jenis Usaha Budidaya</label>
														<select onchange="get_usaha(this.value)" class="full-width" required data-init-plugin="select2">
															<option value="">Pilih Jenis Usaha...</option>
															<option value="Budidaya Air Laut">Budidaya Air Laut</option>
															<option value="Budidaya Air Tawar">Budidaya Air Tawar</option>
															<option value="Budidaya Air Payau">Budidaya Air Payau</option>
														</select>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label>Jenis Usaha</label>
														<select class="full-width" data-init-plugin="select2" disabled>
															<option value="">Pilih Jenis Usaha...</option>
														</select>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Kepemilikan Sarana dan Prasarana</label>
														<select class="full-width" data-init-plugin="select2" disabled>
															<option value="">Pilih Sarana / Prasarana...</option>
														</select>
													</div>
												</div>
											</div>

											<div class="clearfix"></div>
											<button class="btn btn-primary" type="submit">Tambah</button>
										</form>
									</div>
								</div>
								<!-- END PANEL -->
							</div>
						</div>

						<div class="col-md-12">
								
								@if ( Session::has('success') ) 
						    		@include('app/layout/partials/alert-sukses', ['message' => session('success')])
								@endif

								@if ( Session::has('gagal') ) 
						    		@include('app/layout/partials/alert-danger', ['message' => session('gagal')])
								@endif

								@if ( count($errors) > 0 )
									@include('app/layout/partials/alert-danger', ['errors' => $errors])
								@endif

							
							<!-- START PANEL -->
							<div class="panel panel-default">
								<div class="panel-body">
									<div class="">
										<input type="text" class="form-control" placeholder="Pencarian">
										<br>

										<table class="table table-hover demo-table-dynamic custom" id="tableWithDynamicRows">
											<thead>
												<tr>
													<th>
														<button class="btn btn-check" data-toggle="modal" data-target="#modal-hapus" disabled id="hapus"><i class="pg-trash"></i></button>
													</th>
													<th>Nama Lengkap</th>
													<th>Nama Kelompok</th>
													<th>Jabatan Kelompok</th>
													<th>Jenis Usaha</th>
													<th style="text-align:center">Aksi</th>
												</tr>
											</thead>
											<tbody>
												@foreach( $pembudidaya as $pb )
													<tr>
														<td>
															<div class="checkbox">
																<input type="checkbox" class="pilih" value="{{ $pb->id }}" id="pb{{ $pb->id }}">
																<label for="pb{{ $pb->id }}" class="m-l-20"></label>
															</div>
														</td>
														<td>{{ $pb->name }}</td>
														<td>{{ $pb->kelompok->nama }}</td>
														<td>{{ $pb->jabatan->nama }}</td>
														<td>{{ $pb->usaha->jenis }}</td>
														<td style="text-align:center">
															<a class="btn btn-default btn-xs view" data-id="{{ $pb->id }}"><i class="fa fa-search-plus"></i></a>
															<a href="{{ route('pembudidaya_edit',$pb->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
														</td>
													</tr>
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- END PANEL -->
						</div>
					</div>
				</div>
			</div>
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

<!-- MODAL STICK UP VIEW -->
<div class="modal fade stick-up" id="modal-view" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content-wrapper">
			<div class="modal-content">
				<div class="modal-header clearfix text-left">
					<button type="button" class="close" data-dismiss="modal"  aria-hidden="true"><i class="pg-close fs-14"></i></button>
					<h5>Detail Pembudidaya</h5>
				</div>
				<div class="modal-body" id="view-detail">

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Kembali</button>
				</div>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

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
		$(".menu-items .link-pembudidaya").addClass("active");

		$(function(){

			var _token = $('meta[name="csrf-token"]').attr('content');

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
		        $(".btn-hapus").attr('href',"{{ route('pembudidaya_hapus') }}/"+id);

			});

			$("#show-tambah-pembudidaya").click(function(){
				$("#tambah-pembudidaya").fadeIn();
				$("input[name='nik']").focus();
				$(this).hide();
			});

			// Show detail
			$(".view").click(function(){
				var id = $(this).data('id');
				var url = "{{ url('app/pembudidaya/detail') }}";
				var url = url+'/'+id;
				$.get(url, {id:id, _token:_token}, function(data){
					$("#view-detail").html(data);
					$("#modal-view").modal('show');
				});
			});

		});

		function get_usaha(id){
			$('#usaha').html('<i class="fa fa-spinner fa-spin"></i>');
			var _token = $('meta[name="csrf-token"]').attr('content');
			var url = "{{ url('app/pembudidaya/usaha') }}";
			var url = url+"/"+id;
			$.get(url, { id:id, _token:_token}, function(data){
				$('#usaha').html(data);
			});
			get_sarana(id);
		}

		function get_sarana(id){
			$('#sarana').html('<i class="fa fa-spinner fa-spin"></i>');
			var _token = $('meta[name="csrf-token"]').attr('content');
			var url = "{{ url('app/pembudidaya/sarana') }}";
			var url = url+"/"+id;
			$.get(url, { id:id, _token:_token}, function(data){
				$('#sarana').html(data);
			});
		}

	</script>
@endsection