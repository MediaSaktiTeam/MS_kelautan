@extends('app.layout.main')

@section('title')
	Produksi | Sunting
@endsection


@section('konten')

<?php $Ms = new App\Custom; ?>

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
								<a href="{{ url('/app/'.strtolower($Ms->dek($_GET['pr']))) }}">{{ $Ms->dek($_GET['pr']) }}</a>
							</li>
							<li>
								<a href="{{ url('/app/produksi') }}?offset={{ $_GET['offset'] }}&limit={{ $_GET['limit'] }}&pr={{ $_GET['pr'] }}">Produksi</a>
							</li>
							<li>
								<a href="#" class="active">Sunting Produksi</a>
							</li>
						</ul>
					</div>
				</div>

			</div>

			<br>

			<div class="container-fluid container-fixed-lg">
				<div class="inner" style="transform: translateY(0px); opacity: 1;">

					<div class="row">
						<div class="col-lg-7 col-md-6 ">

							<!-- START PANEL -->
							<div class="panel panel-transparent">
								<div class="panel-body">
									<form id="form-personal" method="post" action="{{ url('/app/produksi/update') }}" role="form">

										<input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
										<input type="hidden" name="pr" value="{{ $_GET['pr'] }}">
										<input type="hidden" name="id" value="{{ $produksi->id }}">
										
										<div class="row">
											<div class="col-sm-12">
												@if ( Session::has('success') ) 
										    		@include('app/layout/partials/alert-sukses', ['message' => session('success')])
												@endif
												@if ( Session::has('gagal') )
										    		@include('app/layout/partials/alert-danger', ['message' => session('gagal')])
												@endif
												<div class="form-group">
													<label>NIK / Nama / Kelompok</label>
													<select class="full-width" onchange="get_data(this.value); get_jenis_bantuan(this.value)" data-init-plugin="select2" name="id_user" disabled="">
														<option value="">Pilih Pengguna</option>
														<?php

														$profesi = $Ms->dek($_GET['pr']);
														$data_users = DB::table('users as u')
												                            ->leftJoin('app_kelompok as ak', 'u.id_kelompok', '=', 'ak.id_kelompok')
												                            ->select('u.*', 'ak.nama as nama_kelompok')
												                                ->where('u.profesi', $profesi)
												                                ->orderBy('ak.nama', 'asc')->get(); ?>
														@foreach( $data_users as $du )
															<option value="{{ $du->id }}" {{ $du->id == $produksi->id_user ? "selected":""}}>{{ $du->nik }} <b>-</b> {{ $du->name }} <b>-</b> {{ $du->nama_kelompok }}</option>
														@endforeach
													</select>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Jenis Produksi</label>
													<input type="text" class="form-control" name="jenis_produksi" value="{{ $produksi->jenis_produksi }}">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Biaya Produksi</label>
													<input type="number" class="form-control" name="biaya_produksi" value="{{ $produksi->biaya_produksi }}">
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Jumlah Produksi</label>
													<input type="number" class="form-control" name="jumlah_produksi" value="{{ $produksi->jumlah_produksi }}">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Waktu Produksi</label>
													<input type="date" class="form-control" name="waktu_produksi" value="{{ $produksi->waktu_produksi }}">
												</div>
											</div>
										</div>

										@if ( $Ms->dek($_GET['pr']) == 'Nelayan' )
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label>Jenis Ikan</label>
													<input type="text" class="form-control" name="jenis_ikan" value="{{ $produksi->jenis_ikan }}">
												</div>
											</div>
										</div>
										@endif

										<div class="clearfix"></div>
										<br>
										
										<button class="btn btn-primary" type="submit">Simpan</button>
									</form>
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

		@include('app.layout.partials.copyright')

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
		$(".menu-items .link-{{ strtolower($Ms->dek($_GET['pr'])) }}").addClass("active open");
		$(".menu-items .link-{{ strtolower($Ms->dek($_GET['pr'])) }} .sub-produksi").addClass("active");

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
		        $(".btn-hapus").attr('href',"{{ route('pembudidaya_hapus') }}/"+id);

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