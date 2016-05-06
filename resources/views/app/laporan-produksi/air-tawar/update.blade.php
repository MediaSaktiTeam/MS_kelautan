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
											
											<label>KETERANGAN IDENTITAS</label>
											<div class="row">
												<?php $provinsi = App\Provinsi::get() ?>
												@foreach ( $provinsi as $prov )
													<input type="hidden" name="provinsi" value="{{ $prov->id }}">
												@endforeach

												<?php $kabupaten = App\Kabupaten::get() ?>
												@foreach ( $kabupaten as $kab )
													<input type="hidden" name="kabupaten" value="{{ $kab->id }}">
												@endforeach

												<div class="col-md-3">
													<div class="form-group">
														<label>Kecamatan</label>
														<div id="kecamatan">
															<select class="full-width" data-init-plugin="select2" onchange="get_desa(this.value)" name="kecamatan" required>
																<?php $kecamatan = App\Kecamatan::get() ?>
																@foreach ( $kecamatan as $kec )
																	<option value="{{ $kec->id }}" {{ $kec->id == $airtawar->kecamatan ? "selected":"" }}>{{ $kec->nama }}</option>
																@endforeach

															</select>
														</div>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="form-group">
														<label>Desa/Kelurahan</label>
														<span id="desa">
														<select class="full-width" name="desa" data-init-plugin="select2" required>
															<option value="{{ $airtawar->desa }}" {{ Input::old('desa') == $airtawar->desa ? "selected":"" }}>{{ $airtawar->datadesa->nama }}</option>
														</select>
														</span>
													</div>
												</div>
											</div>

											<hr>
											<label>KETERANGAN PRODUKSI</label>
											<div class="row">
												<div class="col-md-4">
														<label>Petani/RTP</label>
													<div class="form-group input-group">
														<input type="number" name="rtp" value="{{ $airtawar->rtp }}" class="form-control" placeholder="Jumlah" required="">
														<span class="input-group-addon">RTP</span>
													</div>
												</div>
												<div class="col-md-4">
														<label>Luas Areal</label>
													<div class="form-group input-group">
														<input type="number" name="luas_areal" value="{{ $airtawar->luas_areal }}" class="form-control" placeholder="Luas" required="">
														<span class="input-group-addon">Ha</span>
													</div>
												</div>
												<div class="col-md-4">
														<label>Luas Tanam</label>
													<div class="form-group input-group">
														<input type="number" name="luas_tanam" value="{{ $airtawar->luas_tanam }}" class="form-control" placeholder="Luas" required="">
														<span class="input-group-addon">Ha</span>
													</div>
												</div>
											</div>

											<hr>
											<label>PENEBARAN</label>
											<div class="row">
												<div class="col-md-3">
														<label>MAS</label>
													<div class="form-group input-group">
														<input type="number" name="penebaran_mas" value="{{ $airtawar->penebaran_mas }}" class="form-control" placeholder="Jumlah" required="">
														<span class="input-group-addon">Ekor</span>
													</div>
												</div>
												<div class="col-md-3">
														<label>NILA</label>
													<div class="form-group input-group">
														<input type="number" name="penebaran_nila" value="{{ $airtawar->penebaran_nila }}" class="form-control" placeholder="Jumlah" required="">
														<span class="input-group-addon">Ekor</span>
													</div>
												</div>
												<div class="col-md-3">
														<label>LELE</label>
													<div class="form-group input-group">
														<input type="number" name="penebaran_lele" value="{{ $airtawar->penebaran_lele }}" class="form-control" placeholder="Jumlah" required="">
														<span class="input-group-addon">Ekor</span>
													</div>
												</div>
												<div class="col-md-3">
														<label>BAWAL</label>
													<div class="form-group input-group">
														<input type="number" name="penebaran_bawal" value="{{ $airtawar->penebaran_bawal }}" class="form-control" placeholder="Jumlah" required="">
														<span class="input-group-addon">Ekor</span>
													</div>
												</div>
											</div>
											<hr>
											<label>JUMLAH HIDUP</label>
											<div class="row">
												<div class="col-md-3">
														<label>MAS</label>
													<div class="form-group input-group">
														<input type="number" name="jumlah_hidup_mas" value="{{ $airtawar->jumlah_hidup_mas }}" class="form-control" placeholder="Jumlah" required="">
														<span class="input-group-addon">Ekor</span>
													</div>
												</div>
												<div class="col-md-3">
														<label>NILA</label>
													<div class="form-group input-group">
														<input type="number" name="jumlah_hidup_nila" value="{{ $airtawar->jumlah_hidup_nila }}" class="form-control" placeholder="Jumlah" required="">
														<span class="input-group-addon">Ekor</span>
													</div>
												</div>
												<div class="col-md-3">
														<label>LELE</label>
													<div class="form-group input-group">
														<input type="number" name="jumlah_hidup_lele" value="{{ $airtawar->jumlah_hidup_lele }}" class="form-control" placeholder="Jumlah" required="">
														<span class="input-group-addon">Ekor</span>
													</div>
												</div>
												<div class="col-md-3">
														<label>BAWAL</label>
													<div class="form-group input-group">
														<input type="number" name="jumlah_hidup_bawal" value="{{ $airtawar->jumlah_hidup_bawal }}" class="form-control" placeholder="Jumlah" required="">
														<span class="input-group-addon">Ekor</span>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<div class="form-group input-group">
														<label>Keterangan</label>
														<textarea name="keterangan" cols="30" rows="10" class="form-control" required="">{{ $airtawar->keterangan }}</textarea>
													</div>
												</div>
											</div>
											<input type="hidden" id="id-airtawar" name="id" value="{{ $airtawar->id }}">

			
											
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