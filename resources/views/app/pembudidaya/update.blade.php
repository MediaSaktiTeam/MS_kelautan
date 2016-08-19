@extends('app.layout.main')

@section('title')
	Pembudidaya | Sunting
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
								<a href="{{ route('pembudidaya') }}">Pembudidaya</a>
							</li>
							<li>
								<a href="#" class="active">Sunting Pembudidaya</a>
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

							@if ( Session::has('error_nik') )
								<?php $user = App\User::where('nik', Session::get('error_nik'))->first() ?>
					    		<div class="alert alert-danger">GAGAL!!! NIK <b>{{ Session::get('error_nik') }}</b> telah terdaftar. <a href="javascript:;" data-toggle="modal" data-target="#modal-double-nik">Lihat</a></div> 
							@endif

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
							<div class="panel panel-transparent">
								<div class="panel-body">
									<form id="form-personal" method="post" action="{{ route('pembudidaya_update') }}" role="form">
										
										{{ csrf_field() }}

										<input type="hidden" name="id" value="{{ $pembudidaya->id }}">

										<div class="row clearfix">
											<div class="col-sm-6">
												<div class="form-group required">
													<label>NIK</label>
													<input type="text" class="form-control number" name="nik" value="{{ $pembudidaya->nik }}" required>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<label>Nama Lengkap</label>
													<input type="text" class="form-control" name="name" value="{{ $pembudidaya->name }}" required>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-12">
												<div class="form-group">
													<label>Alamat</label>
													<input type="text" class="form-control" name="alamat" value="{{ $pembudidaya->alamat }}" required>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
												<label>Kecamatan</label>
													<div id="kecamatan">
														<select class="full-width" data-init-plugin="select2" name="kecamatan" onchange="get_desa(this.value)" required>
															<option value="">Pilih Kecamatan...</option>
															<?php $kecamatan = App\Kecamatan::get() ?>
															@foreach ( $kecamatan as $kec )
																<option value="{{ $kec->id }}" {{ $kec->id == $pembudidaya->desa->kecamatan->id ? 'selected':'' }}>{{ $kec->nama }}</option>
															@endforeach
														</select>
													</div>
												</div>
											</div>

											<div class="col-sm-6">
												<label><b>Desa/Kelurahan</b></label>
												<div class="form-group">
													<span id="desa">
													<select class="full-width" name="desa" data-init-plugin="select2" required>
														<?php $desa = App\Desa::all() ?>
														@foreach ( $desa as $des )
															<option value="{{ $des->id }}" {{ $des->id == $pembudidaya->id_desa ? 'selected':'' }}>{{ $des->nama }}</option>
														@endforeach
													</select>
													</span>
												</div>
											</div>
										</div>

										<div class="row">
												<div class="col-sm-4">
													<div class="form-group">
														<label>RT/RW</label>
														<input type="text" class="form-control" name="erte" value="{{ $pembudidaya->erte }}">
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>Telepon</label>
														<input type="text" class="form-control" name="tlp" value="{{ $pembudidaya->tlp }}">
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>Kode POS</label>
														<input type="text" class="form-control" name="pos" value="{{ $pembudidaya->pos }}">
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
s																<option value="{{ $klp->id_kelompok }}" {{ $pembudidaya->id_kelompok == $klp->id_kelompok ? "selected":"" }}>{{ $klp->nama }}</option>
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
															<option value="{{ $jab->id }}" {{ $pembudidaya->id_jabatan == $jab->id ? "selected":"" }}>{{ $jab->nama }}</option>
														@endforeach
													</select>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label>Jenis Usaha Budidaya</label>
													<select onchange="get_usaha(this.value)" class="full-width" required data-init-plugin="select2">
														<option value="">Pilih Jenis Usaha...</option>
														<?php $jenisUsaha = App\JenisUsaha::all() ?>
														@foreach( $jenisUsaha as $ju )
															<option value="{{ $ju->id }}" {{ $pembudidaya->jenis_usaha ==  $ju->id ? 'selected':'' }}>{{ $ju->nama }}</option>
														@endforeach
													</select>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Jenis Produksi</label>
													<div id="usaha">
														<select class="full-width" data-init-plugin="select2" name="id_usaha" required>
															<option value="">Pilih Jenis produksi...</option>
															<?php $masterproduksi = App\MasterProduksi::where('jenis_produksi', $pembudidaya->jenis_usaha)->get(); ?>
															@foreach( $masterproduksi as $mp )
																<option value="{{ $mp->id }}" {{ $pembudidaya->produksi->nama == $mp->nama ? "selected":"" }}>{{ $mp->nama }}</option>
															@endforeach
														</select>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Kepemilikan Sarana dan Prasarana</label>
													<div id="sarana">
														<select name="id_sarana[]" class="full-width" data-init-plugin="select2" multiple="">
															<?php $sarana = App\Sarana::where('jenis', $pembudidaya->jenisusaha->nama)->get(); ?>
															<?php $Ksarana = App\KepemilikanSarana::where('id_user', $pembudidaya->id)->get(); ?>
															<?php $Ksarana_arr = []; ?>
															@foreach ( $Ksarana as $val )
																<?php $Ksarana_arr[] = $val->id_sarana; ?>
															@endforeach

															@foreach( $sarana as $sa )
																<option value="{{ $sa->id }}" {{ in_array($sa->id, $Ksarana_arr) ? "selected":""}}>{{ $sa->sub }}</option>
															@endforeach
														</select>
													</div>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-6">
												<div class="form-group">
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
												</div>
											</div>
											
										</div>

										<div class="clearfix"></div>
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
		$(".menu-items .link-pembudidaya").addClass("active");

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

		function get_desa(id_kecamatan){
			$('#desa').html("<i class='fa fa-spinner fa-spin'></i>");
			var url = "{{ url('get-desa') }}";
			var url = url+"/"+id_kecamatan;
			$.get(url, { id_kecamatan:id_kecamatan}, function(data){
				$('#desa').html(data);
			});
		}

	</script>
@endsection