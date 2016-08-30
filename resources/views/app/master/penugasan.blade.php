@extends('app.layout.main')

@section('title')
	Master | Penugasan
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
								<a href="#" class="active">Master penugasan</a>
							</li>
						</ul>
					</div>
				</div>
			</div>


			<!-- START CONTAINER FLUID -->
			<div class="container-fluid padding-25 sm-padding-10">

				
				<!-- START ROW -->
				<div class="row">
					<div class="col-md-4">
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

							<?php
								$halaman = ['Pembudidaya','Pembudidaya Produksi','Pembudidaya Rumput Laut','Pembudidaya KJA Air Laut',
											'Pembudidaya Kolam Air Tawar','Pembudidaya KJA Air Tawar','Pembudidaya Air Payau','Pembudidaya Laporan Produksi Air Tawar',
											'Pembudidaya Laporan Produksi Rumput Laut','Pembudidaya Laporan Produksi Tambak',
											'Nelayan','Nelayan Produksi','Pengolah','Pemasar','Produksi Pengolah','Mangrove Dimiliki',
											'Mangrove Direhabilitasi','Jenis Mangrove','Terumbu Dimiliki','Terumbu Direhabiltasi',
											'Terumbu Jenis Ikan','Jumlah Penduduk','Kelompok','Bantuan'];
							?>
								<h5>Master Penugasan</h5>
								<p>* Master penugasan digunakan untuk melengkapi keterangan pada footer laporan.</p>
								<form class="style-form" method="GET" action="{{ route('penugasan_tambah') }}">
									<div class="form-group form-group-default required">
										<label>Laporan pada halaman</label>
										<select class="full-width" data-init-plugin="select2" name="halaman">
											@foreach( $halaman as $hal )
												<option value="{{ $hal }}">{{ $hal }}</option>
											@endforeach
										</select>
									</div>
									<div class="form-group form-group-default required">
										<label>Tanda Tangan Kolom Kanan</label>
										<select class="full-width" data-init-plugin="select2" name="kolom_kanan">
											@foreach( $laporan as $lap )
												<option value="{{ $lap->id }}">{{ $lap->jabatan }} ({{ $lap->nama }})</option>
											@endforeach
										</select>
									</div>
									<div class="form-group form-group-default required">
										<label>Tanda Tangan Kolom Kiri</label>
										<select class="full-width" data-init-plugin="select2" name="kolom_kiri">
											@foreach( $laporan as $lap )
												<option value="{{ $lap->id }}">{{ $lap->jabatan }} ({{ $lap->nama }})</option>
											@endforeach
										</select>
									</div>
									<div class="form-group">
										<button class="btn btn-primary btn-cons">Tambah</button>
									</div>
								</form>
							</div>
						</div>
						<!-- END PANEL -->
					</div>

					<div class="col-md-8">
						<!-- START PANEL -->
						<div class="panel panel-default">
							<div class="panel-body">
								<table class="table table-hover demo-table-dynamic custom">
									<thead>
										<tr>
											<th width="70">
												<button class="btn btn-check" data-toggle="modal" data-target="#modal-hapus" disabled id="hapus"><i class="pg-trash"></i></button>
											</th>
											<th>Halaman</th>
											<th>Ttd Kol. Kanan</th>
											<th>Ttd Kol. Kiri</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										@foreach($penugasan as $lp)
										<tr>
											<td>
												<div class="checkbox">
													<input type="checkbox" class="pilih" value="{{ $lp->id }}" id="checkbox{{ $lp->id }}">
													<label for="checkbox{{ $lp->id }}" class="m-l-20"></label>
												</div>
											</td>
											<td>{{ $lp->halaman }}</td>
											<td>{{ $lp->ttdkanan->jabatan }} ({{ $lp->ttdkanan->nama }})</td>
											<td>{{ $lp->ttdkiri->jabatan }} ({{ $lp->ttdkiri->nama }})</td>
											<td><button class="btn btn-default btn-xs btn-edit" 
												data-id="{{ $lp->id }}"
												data-halaman="{{ $lp->halaman }}"
												data-kolomkanantext="{{ $lp->ttdkanan->jabatan }} ({{ $lp->ttdkanan->nama }})"
												data-kolomkiritext="{{ $lp->ttdkiri->jabatan }} ({{ $lp->ttdkiri->nama }})"
												data-kolomkiriid="{{ $lp->kolom_kiri }}"
												data-kolomkananid="{{ $lp->kolom_kanan }}"><i class="fa fa-pencil"></i></button></td>
										</tr>
										@endforeach
									</tbody>
								</table>
								<center>{!! $penugasan->links() !!}</center>
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
					<form class="style-form" method="GET" action="{{ route('penugasan_update') }}">
						<div class="form-group form-group-default required">
						<label>Laporan pada halaman</label>
							<select class="full-width" data-init-plugin="select2" id="halaman" name="halaman">
								@foreach( $halaman as $hal )
									<option value="{{ $hal }}">{{ $hal }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group form-group-default required">
							<label>Tanda Tangan Kolom Kanan</label>
							<select class="full-width" data-init-plugin="select2" id="kolom-kanan" name="kolom_kanan">
								@foreach( $laporan as $lap )
									<option value="{{ $lap->id }}">{{ $lap->jabatan }} ({{ $lap->nama }})</option>
								@endforeach
							</select>
						</div>
						<div class="form-group form-group-default required">
							<label>Tanda Tangan Kolom Kiri</label>
							<select class="full-width" data-init-plugin="select2" id="kolom-kiri" name="kolom_kiri">
								@foreach( $laporan as $lap )
									<option value="{{ $lap->id }}">{{ $lap->jabatan }} ({{ $lap->nama }})</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<input type="hidden" id="id-tugas" name="id">
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
		$(".menu-items .link-master li.link-laporan").addClass("active open");
		$(".menu-items .link-master .sub-penugasan").addClass("active");
		
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

				$(".btn-hapus").attr('href',"{{ route('penugasan_hapus') }}/"+id);
			});
			$(".btn-edit").click(function(){

				var id = $(this).data('id');
				var halaman = $(this).data('halaman');
				var kolomkanantext = $(this).data('kolomkanantext');
				var kolomkiritext = $(this).data('kolomkiritext');
				var kolomkananid = $(this).data('kolomkananid');
				var kolomkiriid = $(this).data('kolomkiriid');

				$('#id-tugas').val(id);

				$("#halaman option").filter(function() {
				    if( $(this).val().trim() == halaman ){
				    	$(this).prop('selected', true);
				    	$("#select2-chosen-7").html(halaman);
				    }
				});
				$("#kolom-kanan option").filter(function() {
				    if( $(this).val().trim() == kolomkananid ){
				    	$(this).prop('selected', true);
				    	$("#select2-chosen-8").html(kolomkanantext);
				    }
				});
				$("#kolom-kiri option").filter(function() {
				    if( $(this).val().trim() == kolomkiriid ){
				    	$(this).prop('selected', true);
				    	$("#select2-chosen-9").html(kolomkiritext);
				    }
				});
				$('#modal-sunting').modal('show');
			});
		})();
	</script>
@endsection