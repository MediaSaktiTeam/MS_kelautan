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
								<a href="{{ route('tambak') }}">Air Tawar</a>
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

						<div id="edit-tambak">
							<div class="col-lg-7 col-md-6 ">

								<!-- START PANEL -->
								<div class="panel panel-transparent">
									<div class="panel-body">
										<form id="form-personal" method="GET" action="{{ route('tambak_update') }}" role="form">
											
											<label><b>KETERANGAN IDENTITAS</b></label>
											<div class="row">
												<?php $provinsi = App\Provinsi::get() ?>
												@foreach ( $provinsi as $prov )
													<input type="hidden" name="provinsi" value="{{ $prov->id }}">
												@endforeach

												<?php $kabupaten = App\Kabupaten::get() ?>
												@foreach ( $kabupaten as $kab )
													<input type="hidden" name="kabupaten" value="{{ $kab->id }}">
												@endforeach

												<div class="col-md-6">
													<div class="form-group">
														<label>Kecamatan</label>
														<div id="kecamatan">
															<select class="full-width" data-init-plugin="select2" onchange="get_desa(this.value)" name="kecamatan" required>
																<?php $kecamatan = App\Kecamatan::get() ?>
																@foreach ( $kecamatan as $kec )
																	<option value="{{ $kec->id }}" {{ $kec->id == $tambak->kecamatan ? "selected":"" }}>{{ $kec->nama }}</option>
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
															<option value="{{ $tambak->desa }}" {{ Input::old('desa') == $tambak->desa ? "selected":"" }}>{{ $tambak->datadesa->nama }}</option>
														</select>
														</span>
													</div>
												</div>
											</div>
											<hr>
											<label><b>KETERANGAN LAHAN</b></label>
											<div class="row">
												<div class="col-md-6">
												<label>Panjang Garis Pantai</label>
													<div class="form-group">
														<input type="number" name="panjang_pantai" value="{{ $tambak->rtp }}" class="form-control" placeholder="Panjang Garis Pantai" required="">
													</div>
												</div>
												<label>Petani/RTP</label>
												<div class="col-md-6">
													<div class="form-group input-group">
														<input type="number" name="rtp" value="{{ $tambak->rtp }}" class="form-control" placeholder="Jumlah" required="">
														<span class="input-group-addon">RTP</span>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-md-6">
													<label>Luas Potensi</label>
													<div class="form-group input-group">
														<input type="number" name="potensi" value="{{ $tambak->potensi }}" class="form-control" placeholder="Luas" required="">
														<span class="input-group-addon">Ha</span>
													</div>
												</div>
												<div class="col-md-6">
													<label>Luas Tanam</label>
													<div class="form-group input-group">
														<input type="number" name="luas_tanam" value="{{ $tambak->luas_tanam }}" class="form-control" placeholder="Luas" required="">
														<span class="input-group-addon">Ha</span>
													</div>
												</div>
											</div>

											<hr>
											<label><b>PENEBARAN</b></label>
											<div class="row">
												<div class="col-md-4">
													<label>Windu</label>
													<div class="form-group input-group">
														<input type="number" name="penebaran_windu" value="{{ $tambak->penebaran_windu }}" class="form-control" required="">
														<span class="input-group-addon">Ekor</span>
													</div>
												</div>
												<div class="col-md-4">
													<label>Vanamae</label>
													<div class="form-group input-group">
														<input type="number" name="penebaran_vanamae" value="{{ $tambak->penebaran_vanamae }}" class="form-control" required="">
														<span class="input-group-addon">Ekor</span>
													</div>
												</div>
												<div class="col-md-4">
													<label>Bandeng</label>
													<div class="form-group input-group">
														<input type="number" name="penebaran_bandeng" value="{{ $tambak->penebaran_bandeng }}" class="form-control" required="">
														<span class="input-group-addon">Ekor</span>
													</div>
												</div>
											</div>
											<hr>
											<label><b>JUMLAH HIDUP</b></label>
											<div class="row">
												<div class="col-md-4">
													<label>Windu</label>
													<div class="form-group input-group">
														<input type="number" name="jumlah_hidup_windu" value="{{ $tambak->jumlah_hidup_windu }}" class="form-control" required="">
														<span class="input-group-addon">Ekor</span>
													</div>
												</div>
												<div class="col-md-4">
													<label>Vanamae</label>
													<div class="form-group input-group">
														<input type="number" name="jumlah_hidup_vanamae" value="{{ $tambak->jumlah_hidup_vanamae }}" class="form-control" required="">
														<span class="input-group-addon">Ekor</span>
													</div>
												</div>
												<div class="col-md-4">
													<label>Bandeng</label>
													<div class="form-group input-group">
														<input type="number" name="jumlah_hidup_bandeng" value="{{ $tambak->jumlah_hidup_bandeng }}" class="form-control" required="">
														<span class="input-group-addon">Ekor</span>
													</div>
												</div>
											</div>
											<label><b>PAKAN</b></label>
											<div class="row">
												<div class="col-md-4">
													<label>Pellet</label>
													<div class="form-group input-group">
														<input type="number" name="pakan_pelet" value="{{ $tambak->pakan_pelet }}" class="form-control" required="">
														<span class="input-group-addon">Kg</span>
													</div>
												</div>
												<div class="col-md-4">
													<label>Dedak</label>
													<div class="form-group input-group">
														<input type="number" name="pakan_dedak" value="{{ $tambak->pakan_dedak }}" class="form-control" required="">
														<span class="input-group-addon">Kg</span>
													</div>
												</div>											
											</div>
											<hr>
											<label><b>KETERANGAN</b></label>
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<textarea name="keterangan" cols="30" rows="10" class="form-control" required="">{{ $tambak->keterangan }}</textarea>
													</div>
												</div>
											</div>
											
											<div class="clearfix"></div>
											<input type="hidden" id="id-tambak" name="id" value="{{ $tambak->id }}">
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
		$(".menu-items .link-pembudidaya .sub-laporan-produksi .sub-tambak").addClass("active");

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
				$('#id-tambak').val(id);
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