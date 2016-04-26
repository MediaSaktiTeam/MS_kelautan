@extends('app.layout.main')

@section('title')
	Mangrove| Tambah
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
								<a href="{{ route('mangrove') }}">Mangrove</a>
							</li>
						</ul>
						
						<button id="show-tambah-mangrove" class="btn btn-primary bg-blueblur m-t-10 m-b-10 pull-right">Tambah</button>
					</div>
				</div>

			</div>

			<br>

			<div class="container-fluid container-fixed-lg">
				<div class="inner" style="transform: translateY(0px); opacity: 1;">

					<div class="row">

						<div id="tambah-mangrove" style="display:none">
							<div class="col-lg-7 col-md-6 ">

								<!-- START PANEL -->
								<div class="panel panel-transparent">
									<div class="panel-body">
										<form id="form-personal" method="GET" action="{{ route('mangrove_tambah') }}" role="form">
											
											<input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
											<label>KETERANGAN IDENTITAS</label>
											<div class="row">
												<div class="col-sm-6">
													<div class="form-group">
														<label>Provinsi</label>
														<span id="provinsi">
															<select class="full-width" name="provinsi" data-init-plugin="select2" onchange="get_kabupaten(this.value)" required>
																<option value="">Pilih Provinsi</option>
																<?php $provinsi = App\Provinsi::where('nama','Sulawesi Selatan')->get() ?>
																@foreach ( $provinsi as $prov )
																	<option value="{{ $prov->id }}">{{ $prov->nama }}</option>
																@endforeach
															</select>
														</span>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label>Kabupaten/Kota</label>
														<span id="kabupaten">
															<select class="full-width" data-init-plugin="select2" name="kabupaten" required>
																<option value="">Pilih Kabupaten/Kota...</option>
															</select>
														</span>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-sm-6">
													<div class="form-group">
														<label>Kecamatan</label>
														<div id="kecamatan">
															<select class="full-width" data-init-plugin="select2" name="kecamatan" required>
																<option value="">Pilih Kecamatan...</option>
															</select>
														</div>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label>Desa/Kelurahan</label>
														<span id="desa">
														<select class="full-width" name="desa" data-init-plugin="select2" required>
															<option value="">Pilih Desa/Kelurahan...</option>
														</select>
														</span>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-sm-6">
													<div class="form-group">
														<label>Kode Jenis Kegiatan</label>
														<input type="text" class="form-control" name="kode_kegiatan" value="">
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label>Nomor Urut Direktori</label>
														<input type="text" class="form-control" name="nomor_direktori" value="">
													</div>
												</div>
											</div>
											<hr>
											<label>KETERANGAN UNIT PEMASAR</label>
											<div class="row">
												<div class="col-sm-6">
													<div class="form-group">
														<label>Nama Unit Pemasar</label>
														<input type="text" class="form-control" name="unit_pemasar" value="">
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label>Nama Pemilik Unit Pemasar</label>
														<input type="text" class="form-control" name="pemilik_pemasar" value="">
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-sm-12">
													<div class="form-group">
														<label>Alamat Unit Pemasar</label>
														<input type="text" class="form-control" name="alamat_pemasar" value="">
													</div>
												</div>
											</div>
											
											<div class="row">
												<div class="col-sm-4">
													<div class="form-group">
														<label>RT/RW</label>
														<input type="text" class="form-control" name="alamat_erte" value="">
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>Telepon</label>
														<input type="text" class="form-control number" name="telepon" value="">
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>Kode POS</label>
														<input type="text" class="form-control" name="kode_pos" value="">
													</div>
												</div>
											</div>
											<hr>
											<div class="row">
												<div class="col-sm-12">
													<label>Jenis Kegiatan Pemasaran yang Utama</label>
													<div clas="form-group">
														<div class="col-sm-4">
															<div class="radio radio-success">
															<input type="radio"  value="pengumpul" name="Pengumpul" id="pengumpul">
															<label for="pengumpul">Pengumpul</label>
															</div>
														</div>
														<div class="col-sm-4">
															<div class="radio radio-success">
															<input type="radio"  value="pedagang" name="Pedagang" id="pedagang">
															<label for="pedagang">Pedagang</label>
															</div>
														</div>
														<div class="col-sm-4">
															<div class="radio radio-success">
															<input type="radio"  value="pengecer" name="Pengecer" id="pengecer">
															<label for="pengecer">Pengecer</label>
															</div>
														</div>
													</div>
												</div>
											</div>
									
											<div class="row">
												<div class="col-sm-12">
													<div clas="form-group">
														<label>Tahun Mulai Usaha</label>
														<input type="date" class="form-control" name="tahun_mulai" value="">
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
							<div class="panel panel-default">
								<ul class="nav nav-tabs nav-tabs-fillup">
									<li class="active">
										<a data-toggle="tab" href="#slide1"><span>Home</span></a>
									</li>
									<li>
										<a data-toggle="tab" href="#slide2"><span>Profile</span></a>
									</li>
									<li>
										<a data-toggle="tab" href="#slide3"><span>Messages</span></a>
									</li>
								</ul>
								<!-- START PANEL -->
								<div class="tab-content">
									<div class="tab-pane slide-left active" id="slide1">
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
													<table class="table table-hover demo-table-dynamic custom">
														<thead>
															<tr>
																<th>
																	<button class="btn btn-check" data-toggle="modal" data-target="#modal-hapus" disabled id="hapus"><i class="pg-trash"></i></button>
																</th>
																<th>No.</th>
																<th>Nama Lengkap</th>
																<th>Nama Kelompok</th>
																<th>Jabatan Kelompok</th>
																<th>Jenis Olahan</th>
																<th style="text-align:center">Aksi</th>
															</tr>
														</thead>

														<tbody>
																<tr>
																	<td>
																		<div class="checkbox">
																			<input type="checkbox" class="pilih" value="" id="">
																			<label for="" class="m-l-20"></label>
																		</div>
																	</td>
																	<td></td>
																	<td></td>
																	<td></td>
																	<td></td>
																	<td></td>
																	<td style="text-align:center">
																		<a class="btn btn-default btn-xs view" data-id=""><i class="fa fa-search-plus"></i></a>
																		<a href="" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
																	</td>
																</tr>
														</tbody>

													</table>
													<center></center>
												</div>

											</div>
										</div>
									</div>
									<div class="tab-pane slide-left" id="slide2">a</div>
									<div class="tab-pane slide-left" id="slide3">b</div>
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
							<a href="{{ url('/app/mangrove/export-excel') }}">
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

@if ( Session::has('error_nik') )

	<!-- MODAL STICK UP VIEW -->
	<div class="modal fade stick-up" id="modal-double-nik" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-md">
			<div class="modal-content-wrapper">
				<div class="modal-content">
					<div class="modal-header clearfix text-left">
						<button type="button" class="close" data-dismiss="modal"  aria-hidden="true"><i class="pg-close fs-14"></i></button>
						<h5>Data</h5>
					</div>
					<div class="modal-body" id="view-detail">
						<table class="table">
							<tr>
								<td style="width:100px">NIK</td><td>: {{ $user->nik }}</td>
							</tr>
							<tr>
								<td style="width:100px">Nama</td><td>: {{ $user->name }}</td>
							</tr>
							<tr>
								<td style="width:100px">Kelompok</td><td>: {{ $user->kelompok->nama }}</td>
							</tr>
							<tr>
								<td style="width:100px">Profesi</td><td>: {{ $user->profesi }}</td>
							</tr>
						</table>
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

@endif

@endsection


@section('registerscript')
	<script>
		$(".menu-items .link-pesisir").addClass("active open");
		$(".menu-items .link-pesisir .sub-mangrove").addClass("active");

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
		        $(".btn-hapus").attr('href',"{{ url('/app/mangrove/hapus') }}/"+id);

			});

			$("#show-tambah-mangrove").click(function(){
				$("#tambah-mangrove").fadeIn();
				$("input[name='nik']").focus();
				$(this).hide();
			});

			// Show detail
			$(".panel").on('click', '.view', function(){
				var id = $(this).data('id');
				var url = "{{ url('app/mangrove/detail') }}";
				var url = url+'/'+id;
				$.get(url, {id:id, _token:_token}, function(data){
					$("#view-detail").html(data);
					$("#modal-view").modal('show');
				});
			});

			@if ( count($errors) > 0 || Session::has('gagal') || Session::has('error_nik') )
				$("#tambah-mangrove").fadeIn();
			@endif

		});

		function cari_data(cari){
			if ( cari == "" ) {
				$("#show-data").show();
				$("#show-pencarian").hide();
			} else {

				$("#show-data").hide();
				$("#show-pencarian").show();
				$("#show-pencarian").html('<tr><td colspan="6"><i class="fa fa-spinner fa-spin"></i></td></tr>');
				var _token = $('meta[name="csrf-token"]').attr('content');
				var url = "{{ url('app/mangrove/search') }}";
				var url = url+"/"+cari;
				$.get(url, { cari:cari, _token:_token}, function(data){
					$('#show-pencarian').html(data);
				});
			}
		}
	</script>
@endsection