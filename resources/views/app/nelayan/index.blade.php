@extends('app.layout.main')

@section('title')
	Nelayan | Tambah
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
						<ul class="breadcrumb">
							<li>
								<a href="{{ route('nelayan') }}">Nelayan</a>
							</li>
						</ul>
					</div>
				</div>

			</div>

			<br>

			<div class="container-fluid container-fixed-lg">
				<div class="inner" style="transform: translateY(0px); opacity: 1;">

					<div class="row">

						<div id="tambah-nelayan" style="display:none">
							<div class="col-lg-7 col-md-6 ">

								<!-- START PANEL -->
								<div class="panel panel-transparent">
									<div class="panel-body">
										<form id="form-personal" method="post" action="{{ route('nelayan_simpan') }}" role="form">
											
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
												<div class="col-sm-6">
													<div class="form-group required">
														<label>No. Kartu Nelayan</label>
														<input type="text" class="form-control" name="no_kartu_nelayan" required>
													</div>
												</div>
												<div class="col-sm-6">
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
														<label>Kepemilikan Sarana dan Prasarana</label>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-sm-12">
													<div class="form-group">
														<select name="id_sarana[]" class="full-width" data-init-plugin="select2" multiple="" data-placeholder="Pilih Sarana / Prasaranan...">

															<optgroup label="Perahu/Kapal">
															<?php $PK = App\Sarana::where('tipe','Nelayan')->where('jenis','Perahu Kapal')->get() ?>
															@foreach( $PK as $rpk )
																<option value="{{ $rpk->id }}">{{ $rpk->sub }}</option>
															@endforeach
															</optgroup>

															<optgroup label="Alat Tangkap">
															<?php $PK = App\Sarana::where('tipe','Nelayan')->where('jenis','Alat Tangkap')->get() ?>
															@foreach( $PK as $rpk )
																<option value="{{ $rpk->id }}">{{ $rpk->sub }}</option>
															@endforeach
															</optgroup>

															<optgroup label="Mesin">
															<?php $PK = App\Sarana::where('tipe','Nelayan')->where('jenis','Mesin')->get() ?>
															@foreach( $PK as $rpk )
																<option value="{{ $rpk->id }}">{{ $rpk->sub }}</option>
															@endforeach
															</optgroup>
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
							
							<div class="col-lg-5 col-md-6">
								<!-- START PANEL -->
								<div class="panel panel-transparent">
									<div class="panel-heading">
										<div class="panel-title">Keterangan</div>
									</div>
									<div class="panel-body">
										<h3>Showcase and guide users with a <br>better User Interface &amp; Experience.
										</h3>
										<p>Forms are one of the most important components
											<br> when it comes to a dashboard. Recognizing that fact, users are
											<br>able work in a maximum content width.
										</p>
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

							<button id="show-tambah-nelayan" style="margin-bottom:20px" class="btn btn-primary">Tambah</button>
							
							<!-- START PANEL -->
							<div class="panel panel-default">
								<div class="panel-body">
									<div class="">
										<table class="table table-hover demo-table-dynamic custom" id="tableWithDynamicRows">
											<thead>
												<tr>
													<th>
														<button class="btn btn-check" data-toggle="modal" data-target="#modal-hapus" disabled id="hapus"><i class="pg-trash"></i></button>
													</th>
													<th>Nama Lengkap</th>
													<th>Nama Kelompok</th>
													<th>Jabatan Kelompok</th>
													<th style="text-align:center">Aksi</th>
												</tr>
											</thead>
											<tbody>
												@foreach( $nelayan as $nel )
													<tr>
														<td>
															<div class="checkbox">
																<input type="checkbox" class="pilih" value="{{ $nel->id }}" id="pb{{ $nel->id }}">
																<label for="pb{{ $nel->id }}" class="m-l-20"></label>
															</div>
														</td>
														<td>{{ $nel->name }}</td>
														<td>{{ $nel->kelompok->nama }}</td>
														<td>{{ $nel->jabatan->nama }}</td>
														<td style="text-align:center">
															<a class="btn btn-default btn-xs view" data-id="{{ $nel->id }}"><i class="fa fa-search-plus"></i></a>
															<a href="{{ route('nelayan_edit',$nel->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
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
					<h5>Detail nelayan</h5>
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
		$(".menu-items .link-nelayan").addClass("active");

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
		        $(".btn-hapus").attr('href',"{{ route('nelayan_hapus') }}/"+id);

			});

			$("#show-tambah-nelayan").click(function(){
				$("#tambah-nelayan").fadeIn();
				$("input[name='nik']").focus();
				$(this).hide();
			});

			// Show detail
			$(".view").click(function(){
				var id = $(this).data('id');
				var url = "{{ url('app/nelayan/detail') }}";
				var url = url+'/'+id;
				$.get(url, {id:id, _token:_token}, function(data){
					$("#view-detail").html(data);
					$("#modal-view").modal('show');
				});
			});

		});

		function get_sarana(id){
			$('#sarana').html('<i class="fa fa-spinner fa-spin"></i>');
			var _token = $('meta[name="csrf-token"]').attr('content');
			var url = "{{ url('app/nelayan/sarana') }}";
			var url = url+"/"+id;
			$.get(url, { id:id, _token:_token}, function(data){
				$('#sarana').html(data);
			});
		}

	</script>
@endsection