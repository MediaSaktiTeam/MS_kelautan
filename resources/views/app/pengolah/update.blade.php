@extends('app.layout.main')

@section('title')
	Pengolah | Sunting
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
								<a href="{{ route('pengolah') }}">Pengolah</a>
							</li>
							<li>
								<a href="#" class="active">Sunting Pengolah</a>
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
									<form id="form-personal" method="post" action="{{ url('/app/pengolah/update') }}/{{ $pe->id }}" role="form">
											
											{{ csrf_field() }}

											<div class="row clearfix">
												<div class="col-sm-6">
													<div class="form-group required">
														<label>NIK</label>
														<input type="text" class="form-control number" name="nik" value="{{ $pe->nik }}" required>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label>Nama Lengkap</label>
														<input type="text" class="form-control" name="name" name="nik" value="{{ $pe->name }}" required>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-sm-12">
													<div class="form-group">
														<label>Alamat</label>
														<input type="text" class="form-control" name="alamat" value="{{ $pe->alamat }}" required>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-sm-4">
													<div class="form-group">
														<label>RT/RW</label>
														<input type="text" class="form-control" name="erte" value="{{ $pe->erte }}">
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>Telepon</label>
														<input type="text" class="form-control" name="tlp" value="{{ $pe->tlp }}">
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>Kode POS</label>
														<input type="text" class="form-control" name="pos" value="{{ $pe->pos }}">
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
																	<option value="{{ $klp->id_kelompok }}" {{ $pe->id_kelompok == $klp->id_kelompok ? "selected":"" }}>{{ $klp->nama }}</option>
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
															<?php $jabatan = App\Jabatan::orderBy('nama', 'asc')->get() ?>
															@foreach( $jabatan as $jab )
																<option value="{{ $jab->id }}" {{ $pe->id_jabatan == $jab->id ? "selected":"" }}>{{ $jab->nama }}</option>
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
															<select class="full-width" data-init-plugin="select2" name="jenis_olahan" required>
																<option value="">Pilih Jenis Olahan...</option>
																<?php $JO = App\JenisOlahan::all() ?>
																@foreach( $JO as $jo )
																	<option value="{{ $jo->id }}" {{ $pe->id_jenis_olahan == $jo->id ? "selected":"" }}>{{ $jo->jenis }}</option>
																@endforeach
															</select>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Merek Dagang</label>
														<div id="usaha">
															<select class="full-width" data-init-plugin="select2" name="merek_dagang">
																<option value="">Pilih Merek Dagang...</option>
																<?php $merekDagang = App\MerekDagang::all() ?>
																@foreach( $merekDagang as $md )
																	<option value="{{ $md->id }}" {{ $pe->id_merek_dagang == $md->id ? "selected":"" }}>{{ $md->merek }}</option>
																@endforeach
															</select>
														</div>
													</div>
												</div>

											</div>

											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label>Kepemilikan Sarana dan Prasarana</label>
														<select name="id_sarana[]" class="full-width" data-init-plugin="select2" multiple="" data-placeholder="Pilih Sarana / Prasaranan...">

															<?php $sarana = App\Sarana::where('tipe', 'Pengolah')->get(); ?>
															<?php $Ksarana = App\KepemilikanSarana::where('id_user', $pe->id)->get(); ?>
															<?php $Ksarana_arr = []; ?>

															@foreach ( $Ksarana as $val )
																<?php $Ksarana_arr[] = $val->id_sarana; ?>
															@endforeach

															<optgroup label="Bantuan">
															<?php $PK = App\Sarana::where('tipe','Pengolah')->where('jenis','Bantuan')->get() ?>
															@foreach( $PK as $rpk )
																<option value="{{ $rpk->id }}" {{ in_array($rpk->id, $Ksarana_arr) ? "selected":""}}>{{ $rpk->sub }}</option>
															@endforeach
															</optgroup>

															<optgroup label="Swadaya">
															<?php $PK = App\Sarana::where('tipe','Pengolah')->where('jenis','Swadaya')->get() ?>
															@foreach( $PK as $rpk )
																<option value="{{ $rpk->id }}" {{ in_array($rpk->id, $Ksarana_arr) ? "selected":""}}>{{ $rpk->sub }}</option>
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

														<?php $legalitas_produksi = ['P-IRT', 'Depkes', 'Halal']; ?>

														<select class="full-width" data-init-plugin="select2" name="legalitas_produksi" required>
															<option value="">Pilih Legalitas Produksi...</option>
															@for ( $i = 0; $i < count( $legalitas_produksi ); $i++ )
																<option value="{{ $legalitas_produksi[$i] }}" {{ $pe->legalitas_produksi == $legalitas_produksi[$i] ? "selected":"" }}>{{ $legalitas_produksi[$i] }}</option>
															@endfor
														</select>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Modal yang dimiliki</label>
														<input type="text" class="form-control number" name="modal_dimiliki" value="{{ $pe->modal_dimiliki }}">
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label>Modal Pinjaman</label>
														<input type="text" class="form-control number" name="modal_pinjaman" value="{{ $pe->modal_pinjaman }}">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Omzet Perbulan</label>
														<input type="text" class="form-control number" name="omzet_perbulan" value="{{ $pe->omzet_perbulan }}">
													</div>
												</div>
											</div>

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
		$(".menu-items .link-pengolah").addClass("active");

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