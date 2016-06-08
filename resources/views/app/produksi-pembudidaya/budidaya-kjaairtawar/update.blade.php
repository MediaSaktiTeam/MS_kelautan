@extends('app.layout.main')

@section('title')
	Produksi KJA Air Tawar
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
								<a href="{{ route('kjaairtawar') }}">KJA Air Tawar</a>
							</li>
							<li>
								<a href="#" class="active">Sunting KJA Air Tawar</a>
							</li>
						</ul>
						
					</div>
				</div>

			</div>

			<br>

			<div class="container-fluid container-fixed-lg">
				<div class="inner" style="transform: translateY(0px); opacity: 1;">

					<div class="row">

						<div id="edit-kjaairtawar">
							<div class="col-lg-7 col-md-6 ">

								<!-- START PANEL -->
								<div class="panel panel-transparent">
									<div class="panel-body">
										<form id="form-personal" method="GET" action="{{ route('kjaairtawar_update') }}" role="form">

											<label><b>KETERANGAN PRODUKSI</b></label>
											<div class="row">
												<div class="col-md-6">
													<label>Lokasi</label>
													<div class="form-group">
														<input type="text" name="lokasi" value="{{ $kjaairtawar->lokasi }}" class="form-control" placeholder="Lokasi" required="">
													</div>
												</div>
												<div class="col-md-6">
													<label>Potensi</label>
													<div class="form-group input-group">
														<input type="number" name="potensi" value="{{ $kjaairtawar->potensi }}" class="form-control" placeholder="Jumlah" required="">
														<span class="input-group-addon">Ha</span>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<label>Petani/RTP</label>
													<div class="form-group input-group">
														<input type="number" name="rtp" value="{{ $kjaairtawar->rtp }}" class="form-control" placeholder="Jumlah" required="">
														<span class="input-group-addon">RTP</span>
													</div>
												</div>
												<div class="col-md-6">
													<label>Luas Tanam</label>
													<div class="form-group input-group">
														<input type="number" name="luas_tanam" value="{{ $kjaairtawar->luas_tanam }}" class="form-control" placeholder="Luas" required="">
														<span class="input-group-addon">Ha</span>
													</div>
												</div>
											</div>

											<hr>
											<label><b>Bibit</b></label>
											<div class="row">
												<div class="col-md-3">
														<label>Nila</label>
													<div class="form-group input-group">
														<input type="number" name="bibit_nila" value="{{ $kjaairtawar->bibit_nila }}" class="form-control" placeholder="Jumlah" required="">
														<span class="input-group-addon">Ekor</span>
													</div>
												</div>
												<div class="col-md-3">
														<label>Lele</label>
													<div class="form-group input-group">
														<input type="number" name="bibit_lele" value="{{ $kjaairtawar->bibit_lele }}" class="form-control" placeholder="Jumlah" required="">
														<span class="input-group-addon">Ekor</span>
													</div>
												</div>
												<div class="col-md-3">
														<label>Udang</label>
													<div class="form-group input-group">
														<input type="number" name="bibit_udang" value="{{ $kjaairtawar->bibit_udang }}" class="form-control" placeholder="Jumlah" required="">
														<span class="input-group-addon">Ekor</span>
													</div>
												</div>
												<div class="col-md-3">
														<label>Bibit Lainnya</label>
													<div class="form-group input-group">
														<input type="number" name="bibit_lainnya" value="{{ $kjaairtawar->bibit_lainnya }}" class="form-control" placeholder="Jumlah" required="">
														<span class="input-group-addon">Ekor</span>
													</div>
												</div>
											</div>
											<hr>
											<label><b>Produksi</b></label>
											<div class="row">
												<div class="col-md-3">
														<label>Nila</label>
													<div class="form-group input-group">
														<input type="number" name="produksi_nila" value="{{ $kjaairtawar->produksi_nila }}" class="form-control" placeholder="Jumlah" required="">
														<span class="input-group-addon">Ekor</span>
													</div>
												</div>
												<div class="col-md-3">
														<label>Lele</label>
													<div class="form-group input-group">
														<input type="number" name="produksi_lele" value="{{ $kjaairtawar->produksi_lele }}" class="form-control" placeholder="Jumlah" required="">
														<span class="input-group-addon">Ekor</span>
													</div>
												</div>
												<div class="col-md-3">
														<label>Udang</label>
													<div class="form-group input-group">
														<input type="number" name="produksi_udang" value="{{ $kjaairtawar->produksi_udang }}" class="form-control" placeholder="Jumlah" required="">
														<span class="input-group-addon">Ekor</span>
													</div>
												</div>
												<div class="col-md-3">
														<label>Produksi Lainnya</label>
													<div class="form-group input-group">
														<input type="number" name="produksi_lainnya" value="{{ $kjaairtawar->produksi_lainnya }}" class="form-control" placeholder="Jumlah" required="">
														<span class="input-group-addon">Ekor</span>
													</div>
												</div>
											</div>
											<hr>
											<label><b>KETERANGAN</b></label>
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<textarea name="keterangan" id="" cols="30" rows="10" class="form-control" required="">{{ $kjaairtawar->keterangan }}</textarea>
													</div>
												</div>
											</div>
											<input type="hidden" id="id-kjaairtawar" name="id" value="{{ $kjaairtawar->id }}">

			
											
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
		$(".menu-items .link-pembudidaya .sub-produksi").addClass("active");
		$(".menu-items .link-pembudidaya .sub-produksi .sub-kjaairtawar").addClass("active");

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
				$('#id-kjaairtawar').val(id);
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