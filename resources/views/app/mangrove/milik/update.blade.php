@extends('app.layout.main')

@section('title')
	Luas Lahan Mangrove yang dimiliki | Sunting
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
								<a href="{{ route('mangrovemilik') }}">Luas Lahan Mangrove yang dimiliki</a>
							</li>
							<li>
								<a href="#" class="active">Sunting</a>
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
									<form id="form-personal" method="GET" action="{{ route('mangrovemilik_update') }}" role="form">
											<input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
											<label>KETERANGAN IDENTITAS</label>
											<div class="row">
												<div class="col-sm-4">
													<div class="form-group">
														<label>Kecamatan</label>
														<div id="kecamatan">
															<select class="full-width" data-init-plugin="select2" name="kecamatan" required  onchange="get_desa(this.value)">
																<option value="{{ $mangrovemilik->kecamatan }}" {{ Input::old('kecamatan') == $mangrovemilik->kecamatan ? "selected":"" }}>{{ $mangrovemilik->datakecamatan->nama }}</option>
																<?php $kecamatan = App\Kecamatan::where('id_kabupaten','7303')->get() ?>
																@foreach ( $kecamatan as $kec )
																	<option value="{{ $kec->id }}" {{ Input::old('kecamatan') == $kec->id ? "selected":"" }}>{{ $kec->nama }}</option>
																@endforeach
															</select>
														</div>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>Desa/Kelurahan</label>
														<span id="desa">
														<select class="full-width" name="desa" data-init-plugin="select2" required>
															<option value="{{ $mangrovemilik->desa }}" {{ Input::old('desa') == $mangrovemilik->desa ? "selected":"" }}>{{ $mangrovemilik->datadesa->nama }}</option>
														</select>
														</span>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>Luas Lahan Mangrove</label>
														<input type="number" class="form-control number" name="luas_lahan" value="{{ $mangrovemilik->luas_lahan }}">
													</div>
												</div>	
											</div>
											<div class="row">
												<div class="col-sm-4">
													<div class="form-group">
														<label>Kondisi Rusak</label>
														<input type="number" class="form-control number" name="kondisi_rusak" value="{{ $mangrovemilik->kondisi_rusak }}">
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>Kondisi Sedang</label>
														<input type="number" class="form-control number" name="kondisi_sedang" value="{{ $mangrovemilik->kondisi_sedang }}">
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>Kondisi Baik</label>
														<input type="number" class="form-control number" name="kondisi_baik" value="{{ $mangrovemilik->kondisi_baik }}">
													</div>
												</div>
											</div>
											<input type="hidden" id="mangrovemilik" name="id" value="{{ $mangrovemilik->id }}">
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



@endsection


@section('registerscript')
	<script>
		$(".menu-items .link-pesisir").addClass("active open");
		$(".menu-items .link-pesisir .sub-mangrove").addClass("active open");
		$(".menu-items .link-pesisir .sub-mangrove .sub-mangrove-milik").addClass("active");

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

		function get_kabupaten(id_prov){
			var _token = $('meta[name="csrf-token"]').attr('content');
			var url = "{{ url('get-kabupaten') }}";
			var url = url+"/"+id_prov;
			$.get(url, { id_prov:id_prov, _token:_token}, function(data){
				$('#kabupaten').html(data);
			});
		}

		function get_kecamatan(id_kabupaten){
			var _token = $('meta[name="csrf-token"]').attr('content');
			var url = "{{ url('get-kecamatan') }}";
			var url = url+"/"+id_kabupaten;
			$.get(url, { id_kabupaten:id_kabupaten, _token:_token}, function(data){
				$('#kecamatan').html(data);
			});
		}

		function get_desa(id_kecamatan){
			var _token = $('meta[name="csrf-token"]').attr('content');
			var url = "{{ url('get-desa') }}";
			var url = url+"/"+id_kecamatan;
			$.get(url, { id_kecamatan:id_kecamatan, _token:_token}, function(data){
				$('#desa').html(data);
			});
		}

	</script>
@endsection