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
									<form id="form-personal" method="GET" action="{{ route('pemasar_update') }}" role="form">
									
											<input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
											<label>KETERANGAN IDENTITAS</label>
											<div class="row">
												<div class="col-sm-6">
													<div class="form-group">
														<label>Provinsi</label>
														<span id="provinsi">
															<select class="full-width" name="provinsi" data-init-plugin="select2" onchange="get_kabupaten(this.value)" required>
																<?php $provinsi = App\Provinsi::get() ?>
																@foreach ( $provinsi as $prov )
																	<option value="{{ $prov->id }}" {{ $prov->id == $pemasar->provinsi ? "selected":"" }}>{{ $prov->nama }}</option>
																@endforeach
															</select>
														</span>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label>Kabupaten/Kota</label>
														<span id="kabupaten">
															<select class="full-width" data-init-plugin="select2" onchange="get_kecamatan(this.value)" name="kabupaten" required>
																<?php $kabupten = App\Kabupaten::get() ?>
																@foreach ( $kabupten as $kab )
																	<option value="{{ $kab->id }}" {{ $kab->id == $pemasar->kabupten ? "selected":"" }}>{{ $kab->nama }}</option>
																@endforeach

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
															<select class="full-width" data-init-plugin="select2" onchange="get_desa(this.value)" name="kecamatan" required>
																<?php $kecamatan = App\Kecamatan::get() ?>
																@foreach ( $kecamatan as $kec )
																	<option value="{{ $kec->id }}" {{ $kec->id == $pemasar->kecamatan ? "selected":"" }}>{{ $kec->nama }}</option>
																@endforeach

															</select>
														</div>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label>Desa/Kelurahan</label>
														<span id="desa">
														<select class="full-width" name="desa" data-init-plugin="select2" required>
															<option value="{{ $pemasar->desa }}" {{ Input::old('desa') == $pemasar->desa ? "selected":"" }}>{{ $pemasar->datadesa->nama }}</option>
														</select>
														</span>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-sm-6">
													<div class="form-group">
														<label>Kode Jenis Kegiatan</label>
														<input type="text" class="form-control" name="kode_kegiatan" value="{{ $pemasar->kode_kegiatan }}">
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label>Nomor Urut Direktori</label>
														<input type="text" class="form-control" name="nomor_direktori" value="{{ $pemasar->nomor_direktori }}">
													</div>
												</div>
											</div>
											<hr>
											<label>KETERANGAN UNIT PEMASAR</label>
											<div class="row">
												<div class="col-sm-6">
													<div class="form-group">
														<label>Nama Unit Pemasar</label>
														<input type="text" class="form-control" name="unit_pemasar" value="{{ $pemasar->unit_pemasar }}">
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label>Nama Pemilik Unit Pemasar</label>
														<input type="text" class="form-control" name="pemilik_pemasar" value="{{ $pemasar->pemilik_pemasar }}">
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-sm-12">
													<div class="form-group">
														<label>Alamat Unit Pemasar</label>
														<input type="text" class="form-control" name="alamat_pemasar" value="{{ $pemasar->alamat_pemasar }}">
													</div>
												</div>
											</div>
											
											<div class="row">
												<div class="col-sm-4">
													<div class="form-group">
														<label>RT/RW</label>
														<input type="text" class="form-control" name="erte" value="{{ $pemasar->erte }}">
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>Telepon</label>
														<input type="text" class="form-control number" name="tlp" value="{{ $pemasar->tlp }}">
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>Kode POS</label>
														<input type="text" class="form-control" name="pos" value="{{ $pemasar->pos }}">
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
															<input type="radio"  value="pengumpul" name="tipe" id="pengumpul" {{ $pemasar->tipe == 'Pengumpul' ? "checked":"" }}>
															<label for="pengumpul">Pengumpul</label>
															</div>
														</div>
														<div class="col-sm-4">
															<div class="radio radio-success">
															<input type="radio"  value="pedagang" name="tipe" id="pedagang" {{ $pemasar->tipe == 'Pedagang' ? "checked":"" }}>
															<label for="pedagang">Pedagang</label>
															</div>
														</div>
														<div class="col-sm-4">
															<div class="radio radio-success">
															<input type="radio"  value="pengecer" name="tipe" id="pengecer" {{ $pemasar->tipe == 'Pengecer' ? "checked":"" }}>
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
														<input type="date" class="form-control" name="tahun_mulai" value="{{ $pemasar->tahun_mulai }}">
													</div>
												</div>
											</div>
											<input type="hidden" id="id-airtawar" name="id" value="{{ $pemasar->id }}">
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




@endsection


@section('registerscript')
	<script>
		$(".menu-items .link-pengolah").addClass("active open");
		$(".menu-items .link-pengolah .sub-pemasar").addClass("active");

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