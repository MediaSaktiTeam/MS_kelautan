@extends('app.layout.main')

@section('title')
	Master | Lokasi
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
								<a href="#" class="active">Lokasi</a>
							</li>
						</ul>
					</div>
				</div>
			</div>


			<!-- START CONTAINER FLUID -->
			<div class="container-fluid padding-25 sm-padding-10">

				
				<!-- START ROW -->
				<div class="row">
					<div class="col-md-12">
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
									Master Kecamatan
								</div>
							</div>
							<div class="panel-body">
								<h5>Keterangan Lokasi</h5>
								<p>Berikut adalah daftar kecamatan di Kab. Bantaeng, silahkan sunting ID lokasi sesuai kebutuhan Anda!</p>

								<form class="style-form" method="GET" action="{{ route('kec_update') }}">
									<?php
										$i = 1;
										$bagi_dua = ceil(count($kecamatan)/2);
									?>
									@foreach( $kecamatan as $kec )
									
										@if ( $i == 1 )
											<div class="col-md-6">
										@endif

											<div class="form-group form-group-default input-group">
												<input type="hidden" name="id_kec[]" value="{{ $kec['id'] }}">
												<input type="text" name="kec[]" class="form-control" value="{{ $kec->id }}" style="margin-top: 13px;">
												<span class="input-group-addon" style="width: 85%; text-align: left; background: transparent; font-weight: bold;">{{ $kec->nama }}</span>
											</div>

										@if ( $i == $bagi_dua )
											</div>
										@endif

										@php($i++)
									@endforeach

									<div class="col-md-12">
										<hr>
										<div class="form-group pull-right">
											<button type="submit" class="btn btn-primary btn-cons">Simpan</button>
										</div>
									</div>
								</form>
							</div>
						</div
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
					<form class="style-form" method="GET" action="{{ route('bantuan_update') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group form-group-default required">
							<label>Bidang Usaha</label>
							<select class="full-width" data-init-plugin="select2" name="jenis" id="jenis">
								<option value="Nelayan">Nelayan</option>
								<option value="Pembudidaya">Pembudidaya</option>
							</select>
						</div>
						<div class="form-group form-group-default required">
							<label>Nama Bantuan</label>
							<input type="text" id="nama" name="nama" class="form-control" required>
						</div>
						<div class="form-group">
							<input type="hidden" id="id-jenis" name="id">
							<button type="submit" class="btn btn-primary btn-cons">Simpan</button>
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
		$(".menu-items .link-master .link-lokasi").addClass("active open");
		$(".menu-items .link-master .link-lokasi .sub-menu ").addClass("active open");
		$(".menu-items .link-master .link-lokasi .sub-menu .sub-kecamatan").addClass("active");
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

				$(".btn-hapus").attr('href',"/"+id);

			});

			$(".btn-edit").click(function(){

				var id = $(this).data('id');
				var nama = $(this).data('nama');
				var jenis = $(this).data('jenis');
				$('#id-jenis').val(id);
				$('#nama').val(nama);
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