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
													<input type="text" class="form-control" name="nik" value="{{ $pembudidaya->nik }}" required>
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
											<div class="col-sm-6">
												<div class="form-group">
													<label>Nama Kelompok</label>
													<div class="input-group">
														<select class="full-width" name="id_kelompok" data-init-plugin="select2" required>
															<option value="">Pilih Kelompok...</option>
															@foreach( $kelompok as $klp )
																<option value="{{ $klp->id_kelompok }}" {{ $pembudidaya->id_kelompok == $klp->id_kelompok ? "selected":"" }}>{{ $klp->nama }}</option>
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
														<option value="Budidaya Air Laut" {{ $pembudidaya->usaha->jenis == "Budidaya Air Laut" ? "selected":"" }}>Budidaya Air Laut</option>
														<option value="Budidaya Air Tawar" {{ $pembudidaya->usaha->jenis == "Budidaya Air Tawar" ? "selected":"" }}>Budidaya Air Tawar</option>
														<option value="Budidaya Air Payau" {{ $pembudidaya->usaha->jenis == "Budidaya Air Payau" ? "selected":"" }}>Budidaya Air Payau</option>
													</select>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Jenis Usaha</label>
													<div id="usaha">
														<select class="full-width" data-init-plugin="select2" name="id_usaha" required>
															<option value="">Pilih Spesifik Usaha...</option>
															<?php $usaha = App\Usaha::where('jenis', $pembudidaya->usaha->jenis)->get(); ?>
															@foreach( $usaha as $us )
																<option value="{{ $us->id }}" {{ $pembudidaya->usaha->nama == $us->nama ? "selected":"" }}>{{ $us->nama }}</option>
															@endforeach
														</select>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Kepemilikan Sarana dan Prasarana</label>
													<div id="sarana">
														<select name="id_sarana[]" class="full-width" data-init-plugin="select2" multiple="" required>
															<?php $sarana = App\Sarana::where('jenis', $pembudidaya->usaha->jenis)->get(); ?>
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

	</script>
@endsection