@extends('app.layout.main')

@section('title')
	Pengolah | Tambah
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
								<a href="{{ route('pengolah') }}">Pengolah</a>
							</li>
						</ul>
						
						<button id="show-tambah-pengolah" class="btn btn-primary bg-blueblur m-t-10 m-b-10 pull-right">Tambah</button>
					</div>
				</div>

			</div>

			<br>

			<div class="container-fluid container-fixed-lg">
				<div class="inner" style="transform: translateY(0px); opacity: 1;">

					<div class="row">

						@if ( Session::has('gagal') )
				    		@include('app/layout/partials/alert-danger', ['message' => session('gagal')])
						@endif

						@if ( count($errors) > 0 )
							@include('app/layout/partials/alert-danger', ['errors' => $errors])
						@endif

						<div id="tambah-pengolah" style="display:none">
							<div class="col-lg-7 col-md-6 ">

								<!-- START PANEL -->
								<div class="panel panel-transparent">
									<div class="panel-body">
										<form id="form-personal" method="post" action="{{ url('/app/pengolah/store') }}" role="form">
											
											{{ csrf_field() }}

											<div class="row clearfix">
												<div class="col-sm-6">
													<div class="form-group required">
														<label>NIK</label>
														<input type="text" class="form-control number" name="nik" value="{{ Input::old('nik') }}" required>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label>Nama Lengkap</label>
														<input type="text" class="form-control" name="name" name="nik" value="{{ Input::old('name') }}" required>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-sm-12">
													<div class="form-group">
														<label>Alamat</label>
														<input type="text" class="form-control" name="alamat" value="{{ Input::old('alamat') }}" required>
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
																	<option value="{{ $klp->id_kelompok }}" {{ Input::old('id_kelompok') == $klp->id_kelompok ? "selected":"" }}>{{ $klp->nama }}</option>
																@endforeach
															</select>
															<div class="input-group-btn">
																<a class="btn btn-primary" href="/app/kelompok">+</a>
															</div>
														</div>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label>Jabatan Dalam Kelompok</label>
														<select class="full-width" name="id_jabatan" data-init-plugin="select2" required>
															<option value="">Pilih Jabatan...</option>
															@foreach( $jabatan as $jab )
																<option value="{{ $jab->id }}" {{ Input::old('id_jabatan') == $jab->id ? "selected":"" }}>{{ $jab->nama }}</option>
															@endforeach
														</select>
													</div>
												</div>
											</div>


											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label>Jenis Olahan</label>
														<div id="usaha">
															<select class="full-width" data-init-plugin="select2" name="id_jenis_olahan" required>
																<option value="">Pilih Jenis Olahan...</option>
																<?php $JO = App\JenisOlahan::all() ?>
																@foreach( $JO as $jo )
																	<option value="{{ $jo->id }}">{{ $jo->jenis }}</option>
																@endforeach
															</select>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Kepemilikan Sarana dan Prasarana</label>
														<select name="id_sarana[]" class="full-width" data-init-plugin="select2" multiple="" data-placeholder="Pilih Sarana / Prasaranan...">

															<optgroup label="Bantuan">
															<?php $PK = App\Sarana::where('tipe','Pengolah')->where('jenis','Bantuan')->get() ?>
															@foreach( $PK as $rpk )
																<option value="{{ $rpk->id }}">{{ $rpk->sub }}</option>
															@endforeach
															</optgroup>

															<optgroup label="Swadaya">
															<?php $PK = App\Sarana::where('tipe','Pengolah')->where('jenis','Swadaya')->get() ?>
															@foreach( $PK as $rpk )
																<option value="{{ $rpk->id }}">{{ $rpk->sub }}</option>
															@endforeach
															</optgroup>
														</select>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label>Legalitas Produksi</label>

														<?php $jenis_legalitas = ['P-IRT', 'Depkes', 'Halal']; ?>

														<select class="full-width" data-init-plugin="select2" name="jenis_legalitas" required>
															<option value="">Pilih Legalitas Produksi...</option>
															@for ( $i = 0; $i < count( $jenis_legalitas ); $i++ )
																<option value="{{ $jenis_legalitas[$i] }}">{{ $jenis_legalitas[$i] }}</option>
															@endfor
														</select>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Modal yang dimiliki</label>
														<input type="text" class="form-control number" name="modal" value="{{ Input::old('modal') }}">
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label>Modal Pinjaman</label>
														<input type="text" class="form-control number" name="modal_pinjaman" value="{{ Input::old('modal_pinjaman') }}">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Omzet Perbulan</label>
														<input type="text" class="form-control number" name="omzet" value="{{ Input::old('omzet') }}">
													</div>
												</div>
											</div>

											<div class="clearfix"></div>
											<br>
											
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
							
							<!-- START PANEL -->
							<div class="panel panel-default">
								<div class="panel-body">
									<div class="">
										<div class="input-group">
											<input type="text" onkeyup="cari_data(this.value)" class="form-control" placeholder="Pencarian">
											<span class="input-group-btn">
												<a href="" class="btn btn-default" data-toggle="modal" data-target="#modal-ekspor"><i class="fa fa-file-archive-o"></i> &nbsp;Ekspor</a>
											</span>
										</div>
										<br>

										<div id="show-pencarian"></div>

										<div id="show-data">
											<table class="table table-hover demo-table-dynamic custom" id="tableWithDynamicRows">
												<thead>
													<tr>
														<th>
															<button class="btn btn-check" data-toggle="modal" data-target="#modal-hapus" disabled id="hapus"><i class="pg-trash"></i></button>
														</th>
														<th>Nama Lengkap</th>
														<th>Nama Kelompok</th>
														<th>Jabatan Kelompok</th>
														<th>Jenis Olahan</th>
														<th style="text-align:center">Aksi</th>
													</tr>
												</thead>

												<tbody>
												</tbody>

											</table>
										</div>

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
			@include('app.layout.partials.copyright')
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
					<h5>Detail pengolah</h5>
				</div>
				<div class="modal-body" id="view-detail">

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default btn-cons no-margin inline" data-dismiss="modal">Kembali</button>
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


<!-- MODAL STICK UP SMALL ALERT -->
<div class="modal fade slide-up" id="modal-ekspor" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content-wrapper">
			<div class="modal-content">
				<div class="modal-header clearfix text-left">
					<button type="button" class="close" data-dismiss="modal"  aria-hidden="true"><i class="pg-close fs-14"></i></button>
					<h5>Ekspor Data</h5>
					<hr>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<a href="{{ url('/app/pengolah/export-excel') }}">
								<i class="fa fa-file-excel-o export-excel"></i>
								Unduh Dalam Format Mic.Excel
							</a>
						</div>
						<div class="col-md-6">
							<a href="{{ url('/app/pengolah/export-pdf') }}">
								<i class="fa fa-file-pdf-o export-pdf"></i>
								Unduh Dalam Format PDF
							</a>
						</div>
					</div>
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
		$(".menu-items .link-pengolah").addClass("active");

		$(function(){

			var _token = $('meta[name="csrf-token"]').attr('content');

			$("table").on('click', '#hapus', function(){

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
		        $(".btn-hapus").attr('href',"{{ url('/app/pengolah/hapus') }}/"+id);

			});

			$("#show-tambah-pengolah").click(function(){
				$("#tambah-pengolah").fadeIn();
				$("input[name='nik']").focus();
				$(this).hide();
			});

			// Show detail
			$(".panel").on('click', '.view', function(){
				var id = $(this).data('id');
				var url = "{{ url('app/pengolah/detail') }}";
				var url = url+'/'+id;
				$.get(url, {id:id, _token:_token}, function(data){
					$("#view-detail").html(data);
					$("#modal-view").modal('show');
				});
			});
			$("#tambah-pengolah").fadeIn();

			@if ( count($errors) > 0 || Session::has('gagal') )
				$("#tambah-pengolah").fadeIn();
				get_usaha( "{{ Input::old('jenis_usaha') }}" );
			@endif

		});
	</script>
@endsection