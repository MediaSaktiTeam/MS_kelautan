@extends('app.layout.main')

@section('title')
	Produksi Rumput Laut
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
								<a href="{{ route('rumputlaut') }}">Rumput Laut</a>
							</li>
						</ul>
						
						<button id="show-tambah-pemasar" class="btn btn-primary bg-blueblur m-t-10 m-b-10 pull-right">Tambah</button>
					</div>
				</div>

			</div>

			<br>

			<div class="container-fluid container-fixed-lg">
				<div class="inner" style="transform: translateY(0px); opacity: 1;">

					<div class="row">

						<div id="tambah-pemasar" style="display:none">
							<div class="col-lg-8 col-md-5 ">

								<!-- START PANEL -->
								<div class="panel panel-transparent">
									<div class="panel-body">
										<form id="form-personal" method="GET" action="{{ route('rumputlaut_tambah') }}" role="form">
											
											<input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
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
													<label>Kecamatan</label>
													<div class="form-group">
														<div id="kecamatan">
															<select class="full-width" onchange="get_desa(this.value)" data-init-plugin="select2" name="kecamatan" required>
																<option value="">Pilih Kecamatan...</option>
																<?php $kecamatan = App\Kecamatan::get() ?>
																@foreach ( $kecamatan as $kec )
																	<option value="{{ $kec->id }}">{{ $kec->nama }}</option>
																@endforeach
															</select>
														</div>
													</div>
												</div>
												<div class="col-sm-6">
													<label>Desa/Kelurahan</label>
													<div class="form-group">
														<span id="desa">
														<select class="full-width" name="desa" data-init-plugin="select2" required>
															<option value="">Pilih Desa/Kelurahan...</option>
														</select>
														</span>
													</div>
												</div>
											</div>

											<hr>
											<label><b>KETERANGAN PRODUKSI</b></label>
											<div class="row">
												<div class="col-md-4">
													<label>Petani/RTP</label>
													<div class="form-group input-group">
														<input type="number" name="rtp" value="{{ Input::old('rtp') }}" class="form-control" placeholder="Jumlah" required="">
														<span class="input-group-addon">RTP</span>
													</div>
												</div>
												<div class="col-md-4">
													<label>Panjang Garis Pantai</label>
													<div class="form-group input-group">
														<input type="number" name="panjang_pantai" value="{{ Input::old('panjang_pantai') }}" class="form-control" placeholder="Panjang" required="">
														<span class="input-group-addon">Km</span>
													</div>
												</div>
												<div class="col-md-4">
													<label>Potensi</label>
													<div class="form-group input-group">
														<input type="number" name="potensi" value="{{ Input::old('potensi') }}" class="form-control" placeholder="Luas" required="">
														<span class="input-group-addon">Ha</span>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<label>Luas Tanam</label>
													<div class="form-group input-group">
														<input type="number" name="luas_tanam" value="{{ Input::old('luas_tanam') }}" class="form-control" placeholder="Luas" required="">
														<span class="input-group-addon">Ha</span>
													</div>
												</div>
												<div class="col-md-4">
													<label>Bentangan</label>
													<div class="form-group">
														<input type="number" name="bentangan" value="{{ Input::old('bentangan') }}" class="form-control" placeholder="Jumlah" required="">
													</div>
												</div>
											</div>
											<hr>
											<label><b>DATA BIBIT</b></label>
											<div class="row">
												<div class="col-md-3">
														<label>Bibit cottoni</label>
													<div class="form-group input-group">
														<input type="number" name="bibit_cottoni" value="{{ Input::old('bibit_cottoni') }}" class="form-control" placeholder="Jumlah" required="">
														<span class="input-group-addon">Kg</span>
													</div>
												</div>
												<div class="col-md-3">
														<label>bibit spinosum</label>
													<div class="form-group input-group">
														<input type="number" name="bibit_spinosum" value="{{ Input::old('bibit_spinosum') }}" class="form-control" placeholder="Jumlah" required="">
														<span class="input-group-addon">Kg</span>
													</div>
												</div>
												<div class="col-md-3">
														<label>cottoni basah</label>
													<div class="form-group input-group">
														<input type="number" name="cottoni_basah" value="{{ Input::old('cottoni_basah') }}" class="form-control" placeholder="Jumlah" required="">
														<span class="input-group-addon">Kg</span>
													</div>
												</div>
												<div class="col-md-3">
														<label>cottoni kering</label>
													<div class="form-group input-group">
														<input type="number" name="cottoni_kering" value="{{ Input::old('cottoni_kering') }}" class="form-control" placeholder="Jumlah" required="">
														<span class="input-group-addon">Kg</span>
													</div>
												</div>
											</div>
											<hr>
											<label><b>JUMLAH HIDUP</b></label>
											<div class="row">
												<div class="col-md-3">
														<label>spinosum basah</label>
													<div class="form-group input-group">
														<input type="number" name="spinosum_basah" value="{{ Input::old('spinosum_basah') }}" class="form-control" placeholder="Jumlah" required="">
														<span class="input-group-addon">Kg</span>
													</div>
												</div>
												<div class="col-md-3">
														<label>spinosum kering</label>
													<div class="form-group input-group">
														<input type="number" name="spinosum_kering" value="{{ Input::old('spinosum_kering') }}" class="form-control" placeholder="Jumlah" required="">
														<span class="input-group-addon">Kg</span>
													</div>
												</div>
											</div>
											<hr>
											<label><b>KETERANGAN</b></label>
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<textarea name="keterangan" id="" cols="30" rows="10" value="{{ Input::old('keterangan') }}" class="form-control" placeholder="Masukkan Keterangan" required=""></textarea>
													</div>
												</div>
											</div>

											
											<div class="clearfix"></div>
											<br>
											<input type="hidden" id="id-rumputlaut" name="id">
											<button class="btn btn-primary" type="submit">Tambah</button>
										</form>
									</div>
								</div>
								<!-- END PANEL -->

							</div>
						</div>

						<div class="col-md-12">
							<!-- START PANEL -->
							<div class="panel panel-default">
								<div class="panel-body">
									<div class="">
										<div class="input-group">
											<input type="text" onkeyup="cari_data(this.value)" class="form-control" placeholder="Pencarian">
											<span class="input-group-btn">
												<a href="" class="btn btn-default" data-toggle="modal" data-target="#modal-ekspor"><i class="fa fa-file-archive-o"></i> &nbsp;Ekspor</a>
											</span>
										</div>
										<br>

										<div id="show-pencarian"></div>

										<div id="show-data">
											<table class="table table-hover demo-table-dynamic custom">
												<thead>
													<tr>
														<th>
															<button class="btn btn-check" data-toggle="modal" data-target="#modal-hapus" disabled id="hapus"><i class="pg-trash"></i></button>
														</th>
														<th>No.</th>
														<th>Kecamatan</th>
														<th>Desa</th>
														<th>Petani/RTP</th>
														<th>Panjang Pantai</th>
														<th>Potensi</th>
														<th>Luas Tanam</th>
														<th>bentangan</th>
														<th style="text-align:center">Aksi</th>
													</tr>
												</thead>
												@if ( Session::has('success') ) 
												    	@include('app/layout/partials/alert-sukses', ['message' => session('success')])
												@endif
												@if ( Session::has('delete') ) 
												    	@include('app/layout/partials/alert-sukses', ['message' => session('delete')])
												@endif
												@if ( Session::has('gagal') ) 
												    	@include('app/layout/partials/alert-danger', ['message' => session('gagal')])
												@endif

												@if ( count($errors) > 0 )
														@include('app/layout/partials/alert-danger', ['errors' => $errors])
												@endif
												<tbody>
													<?php
														if ( isset($_GET['page']) ) {
															$i = ($_GET['page'] - 1) * $limit + 1;
														} else {
															$i = 1;
														}
														$jumlahrtp = "";
														$panjang_pantai = "";
														$potensi = "";
														$luas_tanam = "";
														$bentangan = "";
													?>
													@foreach($rumputlaut as $rl)
														<tr>
															<td>
																<div class="checkbox">
																	<input type="checkbox" class="pilih" value="{{ $rl->id }}" id="at{{ $rl->id }}">
																	<label for="at{{ $rl->id }}" class="m-l-20"></label>
																</div>
															</td>
															<td>{{ $i++ }}</td>
															<td>{{ $rl->datakecamatan->nama }}</td>
															<td>{{ $rl->datadesa->nama }}</td>
															<td>{{ $rl->rtp }}</td>
															<td>{{ $rl->panjang_pantai }}</td>
															<td>{{ $rl->potensi }}</td>
															<td>{{ $rl->luas_tanam }} Ha</td>
															<td>{{ $rl->bentangan }}</td>
															<td style="text-align:center">
																<a class="btn btn-default btn-xs view" data-id="{{ $rl->id }}"><i class="fa fa-search-plus"></i></a>
																<a href="{{ route('rumputlaut_edit',$rl->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
															</td>
		
														</tr>

														<?php 
															$jumlahrtp += $rl->rtp;
															$panjang_pantai += $rl->panjang_pantai;
															$potensi += $rl->potensi;
															$luas_tanam += $rl->luas_tanam;
															$bentangan += $rl->bentangan;
														 ?>
													@endforeach
														<tr>
															<td><b>Jumlah</b></td>
															<td></td>
															<td></td>
															<td></td>
															<td><b><?php echo round($jumlahrtp,2); ?></b></td>
															<td><b><?php echo round($panjang_pantai,2); ?> Ha</b></td>
															<td><b><?php echo round($potensi,2); ?> Ha</b></td>
															<td><b><?php echo round($luas_tanam,2); ?> Ha</b></td>
															<td><b><?php echo round($bentangan,2); ?> Ha</b></td>
															<td></td>
														</tr>	
													

												</tbody>

											</table>
											<center>{!! $rumputlaut->links() !!}</center>
										</div>

									</div>
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
			@include('app.layout.partials.copyright')
		<!-- END COPYRIGHT -->

	</div>
	<!-- END PAGE CONTENT WRAPPER -->

</div>
<!-- END PAGE CONTAINER -->

<!-- MODAL STICK UP VIEW -->
<div class="modal fade stick-up" id="modal-view" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content-wrapper">
			<div class="modal-content">
				<div class="modal-header clearfix text-left">
					<button type="button" class="close" data-dismiss="modal"  aria-hidden="true"><i class="pg-close fs-14"></i></button>
					<h5>Detail Laporan Produksi Rumput Laut</h5>
				</div>
				<div class="modal-body" id="view-detail">

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


<!-- MODAL STICK UP SMALL ALERT -->
<div class="modal fade slide-up" id="modal-ekspor" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content-wrapper">
			<div class="modal-content">
				<div class="modal-header clearfix text-left">
					<button type="button" class="close" data-dismiss="modal"  aria-hidden="true"><i class="pg-close fs-14"></i></button>
					<h5>Ekspor Data</h5>
					<hr>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<a href="{{ url('/app/rumputlaut/export-excel') }}">
								<i class="fa fa-file-excel-o export-excel"></i>
								Unduh Dalam Format Mic.Excel
							</a>
						</div>
						<div class="col-md-6">
							<a href="{{ url('/app/rumputlaut/export-pdf') }}">
								<i class="fa fa-file-pdf-o export-pdf"></i>
								Unduh Dalam Format PDF
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- END MODAL STICK UP SMALL ALERT -->

@if ( Session::has('error_nik') )

	

@endif

@endsection


@section('registerscript')
	<script>
		$(".menu-items .link-pembudidaya").addClass("active open");
		$(".menu-items .link-pembudidaya .sub-laporan-produksi").addClass("active");
		$(".menu-items .link-pembudidaya .sub-laporan-produksi .sub-rumputlaut").addClass("active");

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
		        $(".btn-hapus").attr('href',"{{ url('/app/rumputlaut/hapus') }}/"+id);

			});

			$("#show-tambah-pemasar").click(function(){
				$("#tambah-pemasar").fadeIn();
				$("input[name='nik']").focus();
				$(this).hide();
			});

			// Show detail
			$(".panel").on('click', '.view', function(){
				var id = $(this).data('id');
				var url = "{{ url('app/rumputlaut/detail') }}";
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
				var url = "{{ url('app/rumputlaut/cari') }}";
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
				$('#id-rumputlaut').val(id);
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