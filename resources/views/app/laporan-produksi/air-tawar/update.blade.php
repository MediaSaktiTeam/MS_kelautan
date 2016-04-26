@extends('app.layout.main')

@section('title')
	Produksi Air Tawar
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
								<a href="{{ route('airtawar') }}">Air Tawar</a>
							</li>
							<li>
								<a href="#" class="active">Sunting Air Tawar</a>
							</li>
						</ul>
						
					</div>
				</div>

			</div>

			<br>

			<div class="container-fluid container-fixed-lg">
				<div class="inner" style="transform: translateY(0px); opacity: 1;">

					<div class="row">

						<div id="edit-airtawar">
							<div class="col-lg-7 col-md-6 ">

								<!-- START PANEL -->
								<div class="panel panel-transparent">
									<div class="panel-body">
										<form id="form-personal" method="GET" action="{{ route('airtawar_update') }}" role="form">
											
											<input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
											<label>KETERANGAN IDENTITAS</label>
											<div class="row">
												<div class="col-sm-6">
													<div class="form-group">
														<label>Provinsi</label>
														<span id="provinsi">
															<select class="full-width"  name="provinsi" data-init-plugin="select2" onchange="get_kabupaten(this.value)" required>
																<option value="">Pilih Provinsi</option>
																<?php $provinsi = App\Provinsi::where('nama','Sulawesi Selatan')->get() ?>
																@foreach ( $provinsi as $prov )
																	<option value="{{ $prov->id }}" {{ $airtawar->provinsi == $prov->id ? "selected":"" }}>{{ $prov->nama }}</option>
																@endforeach
															</select>
														</span>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Kabupaten/Kota</label>
														<span id="kabupaten">
															<select class="full-width" data-init-plugin="select2" name="kabupaten" required>
																<option value="">Pilih Kabupaten/Kota...</option>
																<option value="{{ $airtawar->kabupaten }}">{{ $airtawar->datakabupaten->nama }}</option>
															</select>

														</span>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label>Kecamatan</label>
														<div id="kecamatan">
															<select class="full-width" data-init-plugin="select2" name="kecamatan" required>
																<option value="">Pilih Kecamatan...</option>
																<option value="{{ $airtawar->kecamatan }}">{{ $airtawar->datakecamatan->nama }}</option>
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
															<option value="{{ $airtawar->desa }}">{{ $airtawar->desa }}</option>
														</select>
														</span>
													</div>
												</div>
											</div>

											<hr>
											<label>KETERANGAN PRODUKSI</label>
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label>Petani/RTP</label>
														<input type="number" name="rtp" value="{{ $airtawar->rtp }}" class="form-control" required="">
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label>Luas Areal (Ha)</label>
														<input type="number" name="luas_areal" value="{{ $airtawar->luas_areal }}" class="form-control" required="">
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label>Luas Tanam</label>
														<input type="number" name="luas_tanam" value="{{ $airtawar->luas_tanam }}" class="form-control" required="">
													</div>
												</div>
											</div>

											<hr>
											<label>PENEBARAN (Ekor)</label>
											<div class="row">
												<div class="col-md-3">
													<div class="form-group">
														<label>MAS</label>
														<input type="number" name="penebaran_mas" value="{{ $airtawar->penebaran_mas }}" class="form-control" required="">
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label>NILA</label>
														<input type="number" name="penebaran_nila" value="{{ $airtawar->penebaran_nila }}" class="form-control" required="">
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label>LELE</label>
														<input type="number" name="penebaran_lele" value="{{ $airtawar->penebaran_lele }}" class="form-control" required="">
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label>BAWAL</label>
														<input type="number" name="penebaran_bawal" value="{{ $airtawar->penebaran_bawal }}" class="form-control" required="">
													</div>
												</div>
											</div>
											<hr>
											<label>JUMLAH HIDUP</label>
											<div class="row">
												<div class="col-md-3">
													<div class="form-group">
														<label>MAS</label>
														<input type="number" name="jumlah_hidup_mas" value="{{ $airtawar->jumlah_hidup_mas }}" class="form-control" required="">
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label>NILA</label>
														<input type="number" name="jumlah_hidup_nila" value="{{ $airtawar->jumlah_hidup_nila }}" class="form-control" required="">
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label>LELE</label>
														<input type="number" name="jumlah_hidup_lele" value="{{ $airtawar->jumlah_hidup_lele }}" class="form-control" required="">
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label>BAWAL</label>
														<input type="number" name="jumlah_hidup_bawal" value="{{ $airtawar->jumlah_hidup_bawal }}" class="form-control" required="">
													</div>
												</div>
											</div>

			
											
											<div class="clearfix"></div>
											<br>
											<input type="hidden" id="id-airtawar" name="id">
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



@endsection


@section('registerscript')
	<script>
		$(".menu-items .link-pembudidaya").addClass("active open");
		$(".menu-items .link-pembudidaya .sub-laporan-produksi").addClass("active");
		$(".menu-items .link-pembudidaya .sub-laporan-produksi .sub-airtawar").addClass("active");

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
		        $(".btn-hapus").attr('href',"{{ url('/app/pengolah/hapus') }}/"+id);

			});

			$("#show-tambah-pemasar").click(function(){
				$("#tambah-pemasar").fadeIn();
				$("input[name='nik']").focus();
				$(this).hide();
			});

			// Show detail
			$(".panel").on('click', '.view', function(){
				var id = $(this).data('id');
				var url = "{{ url('app/pengolah/detail') }}";
				var url = url+'/'+id;
				$.get(url, {id:id, _token:_token}, function(data){
					$("#view-detail").html(data);
					$("#modal-view").modal('show');
				});
			});

			@if ( count($errors) > 0 || Session::has('gagal') || Session::has('error_nik') )
				$("#tambah-pemasar").fadeIn();
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
				var url = "{{ url('app/pengolah/search') }}";
				var url = url+"/"+cari;
				$.get(url, { cari:cari, _token:_token}, function(data){
					$('#show-pencarian').html(data);
				});
			}
		}

		$(function(){

			$(".btn-edit").click(function(){

				var id = $(this).data('id');
				var provinsi = $(this).data('provinsi');
				var kabupaten = $(this).data('kabupaten');
				var kecamatan = $(this).data('kecamatan');
				var desa = $(this).data('desa');
				var areal = $(this).data('areal');
				var tanam = $(this).data('tanam');
				$('#id-airtawar').val(id);
				$('#provinsi').val(provinsi);
				$('#kabupaten').val(kabupaten);
				$('#kecamatan').val(kecamatan);
				$('#desa').val(desa);
				$('#areal').val(areal);
				$('#tanam').val(tanam);
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