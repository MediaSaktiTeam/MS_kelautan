@extends('app.layout.main')

@section('title')
	Nelayan | Sunting
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
							<li>
								<a href="#" class="active">Sunting Nelayan</a>
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
									<form id="form-personal" method="post" action="{{ route('nelayan_update') }}" role="form">
										
										{{ csrf_field() }}

										<input type="hidden" name="id" value="{{ $nelayan->id }}">

										<div class="row clearfix">
											<div class="col-sm-6">
												<div class="form-group required">
													<label>NIK</label>
													<input type="text" class="form-control number" name="nik" value="{{ $nelayan->nik }}" required>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<label>Nama Lengkap</label>
													<input type="text" class="form-control" name="name" value="{{ $nelayan->name }}" required>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-6">
												<div class="form-group required">
													<label>No. Kartu Nelayan</label>
													<input type="text" class="form-control" name="no_kartu_nelayan" value="{{ $nelayan->no_kartu_nelayan }}" required>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<label>Alamat</label>
													<input type="text" class="form-control" name="alamat" value="{{ $nelayan->alamat }}" required>
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
																<option value="{{ $kec->id }}" {{ $kec->id == $nelayan->desa->kecamatan->id ? 'selected':'' }}>{{ $kec->nama }}</option>
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
															<option value="{{ $des->id }}" {{ $des->id == $nelayan->id_desa ? 'selected':'' }}>{{ $des->nama }}</option>
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
													<input type="text" class="form-control" name="erte" value="{{ $nelayan->erte }}">
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<label>Telepon</label>
													<input type="text" class="form-control" name="tlp" value="{{ $nelayan->tlp }}">
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<label>Kode POS</label>
													<input type="text" class="form-control" name="pos" value="{{ $nelayan->pos }}">
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
																<option value="{{ $klp->id_kelompok }}" {{ $nelayan->id_kelompok == $klp->id_kelompok ? "selected":"" }}>{{ $klp->nama }}</option>
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
															<option value="{{ $jab->id }}" {{ $nelayan->id_jabatan == $jab->id ? "selected":"" }}>{{ $jab->nama }}</option>
														@endforeach
													</select>
												</div>
											</div>
										</div>


										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label>Kepemilikan Sarana dan Prasarana</label>
												
													<select name="id_sarana[]" class="full-width" data-init-plugin="select2" multiple="" data-placeholder="Pilih Sarana / Prasaranan...">

														<?php $sarana = App\Sarana::where('tipe', 'Nelayan')->get(); ?>
														<?php $Ksarana = App\KepemilikanSarana::where('id_user', $nelayan->id)->get(); ?>
														<?php $Ksarana_arr = []; ?>

														@foreach ( $Ksarana as $val )
															<?php $Ksarana_arr[] = $val->id_sarana; ?>
														@endforeach

														<optgroup label="Perahu/Kapal">
														<?php $PK = App\Sarana::where('tipe','Nelayan')->where('jenis','Perahu Kapal')->get() ?>
														@foreach( $PK as $rpk )
															<option value="{{ $rpk->id }}" {{ in_array($rpk->id, $Ksarana_arr) ? "selected":""}}>{{ $rpk->sub }}</option>
														@endforeach
														</optgroup>

														<optgroup label="Alat Tangkap">
														<?php $PK = App\Sarana::where('tipe','Nelayan')->where('jenis','Alat Tangkap')->get() ?>
														@foreach( $PK as $rpk )
															<option value="{{ $rpk->id }}" {{ in_array($rpk->id, $Ksarana_arr) ? "selected":""}}>{{ $rpk->sub }}</option>
														@endforeach
														</optgroup>

														<optgroup label="Mesin">
														<?php $PK = App\Sarana::where('tipe','Nelayan')->where('jenis','Mesin')->get() ?>
														@foreach( $PK as $rpk )
															<option value="{{ $rpk->id }}" {{ in_array($rpk->id, $Ksarana_arr) ? "selected":""}}>{{ $rpk->sub }}</option>
														@endforeach
														</optgroup>
													</select>
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
		$(".menu-items .link-nelayan").addClass("active");

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
		        $(".btn-hapus").attr('href',"{{ route('nelayan_hapus') }}/"+id);

			});

		});

		function get_usaha(id){
			$('#usaha').html('<i class="fa fa-spinner fa-spin"></i>');
			var _token = $('meta[name="csrf-token"]').attr('content');
			var url = "{{ url('app/nelayan/usaha') }}";
			var url = url+"/"+id;
			$.get(url, { id:id, _token:_token}, function(data){
				$('#usaha').html(data);
			});
			get_sarana(id);
		}

		function get_sarana(id){
			$('#sarana').html('<i class="fa fa-spinner fa-spin"></i>');
			var _token = $('meta[name="csrf-token"]').attr('content');
			var url = "{{ url('app/nelayan/sarana') }}";
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