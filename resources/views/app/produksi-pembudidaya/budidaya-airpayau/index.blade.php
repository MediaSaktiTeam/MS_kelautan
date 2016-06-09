@extends('app.layout.main')

@section('title')
	Produksi Budidaya Air Payau
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
								<a href="{{ route('budidayaairpayau') }}">Budidaya Air Payau</a>
							</li>
						</ul>
						
						<button id="show-tambah-budidayaairpayau" class="btn btn-primary bg-blueblur m-t-10 m-b-10 pull-right">Tambah</button>
					</div>
				</div>

			</div>

			<br>

			<div class="container-fluid container-fixed-lg">
				<div class="inner" style="transform: translateY(0px); opacity: 1;">

					<div class="row">

						<div id="tambah-budidayaairpayau" style="display:none">
							<div class="col-lg-7 col-md-6 ">

								<!-- START PANEL -->
								<div class="panel panel-transparent">
									<div class="panel-body">
										<form id="form-personal" method="GET" action="{{ route('budidayaairpayau_tambah') }}" role="form">
											
											<input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
											<label><b>KETERANGAN PRODUKSI</b></label>
											<div class="row">
												<div class="col-md-6">
													<label>Lokasi</label>
													<div class="form-group">
														<input type="text" name="lokasi" value="{{ Input::old('lokasi') }}" class="form-control" placeholder="Lokasi" required="">
													</div>
												</div>
												<div class="col-md-6">
													<label>Potensi</label>
													<div class="form-group input-group">
														<input type="number" name="potensi" value="{{ Input::old('potensi') }}" class="form-control" placeholder="Jumlah" required="">
														<span class="input-group-addon">Ha</span>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<label>Petani/RTP</label>
													<div class="form-group input-group">
														<input type="number" name="rtp" value="{{ Input::old('rtp') }}" class="form-control" placeholder="Jumlah" required="">
														<span class="input-group-addon">RTP</span>
													</div>
												</div>
												<div class="col-md-6">
													<label>Luas Tanam</label>
													<div class="form-group input-group">
														<input type="number" name="luas_tanam" value="{{ Input::old('luas_tanam') }}" class="form-control" placeholder="Luas" required="">
														<span class="input-group-addon">Ha</span>
													</div>
												</div>
											</div>

											<hr>
											<label><b>Bibit</b></label>
											<div class="row">
												<div class="col-md-3">
														<label>Bandeng</label>
													<div class="form-group input-group">
														<input type="number" name="bibit_bandeng" value="{{ Input::old('bibit_bandeng') }}" class="form-control" placeholder="Jumlah" required="">
														<span class="input-group-addon">Ekor</span>
													</div>
												</div>
												<div class="col-md-3">
														<label>U. Windu</label>
													<div class="form-group input-group">
														<input type="number" name="bibit_windu" value="{{ Input::old('bibit_windu') }}" class="form-control" placeholder="Jumlah" required="">
														<span class="input-group-addon">Ekor</span>
													</div>
												</div>
												<div class="col-md-3">
														<label>U. Vannamae</label>
													<div class="form-group input-group">
														<input type="number" name="bibit_vannamae" value="{{ Input::old('bibit_vannamae') }}" class="form-control" placeholder="Jumlah" required="">
														<span class="input-group-addon">Ekor</span>
													</div>
												</div>
												<div class="col-md-3">
														<label>Ikan Lainnya</label>
													<div class="form-group input-group">
														<input type="number" name="bibit_lainnya" value="{{ Input::old('bibit_lainnya') }}" class="form-control" placeholder="Jumlah" required="">
														<span class="input-group-addon">Ekor</span>
													</div>
												</div>
											</div>
											<hr>
											<label><b>Produksi</b></label>
											<div class="row">
												<div class="col-md-3">
														<label>Bandeng</label>
													<div class="form-group input-group">
														<input type="number" name="produksi_bandeng" value="{{ Input::old('produksi_bandeng') }}" class="form-control" placeholder="Jumlah" required="">
														<span class="input-group-addon">Ekor</span>
													</div>
												</div>
												<div class="col-md-3">
														<label>U. Windu</label>
													<div class="form-group input-group">
														<input type="number" name="produksi_windu" value="{{ Input::old('produksi_windu') }}" class="form-control" placeholder="Jumlah" required="">
														<span class="input-group-addon">Ekor</span>
													</div>
												</div>
												<div class="col-md-3">
														<label>U. Vannamae</label>
													<div class="form-group input-group">
														<input type="number" name="produksi_vannamae" value="{{ Input::old('produksi_vannamae') }}" class="form-control" placeholder="Jumlah" required="">
														<span class="input-group-addon">Ekor</span>
													</div>
												</div>
												<div class="col-md-3">
														<label>Ikan Lainnya</label>
													<div class="form-group input-group">
														<input type="number" name="produksi_lainnya" value="{{ Input::old('produksi_lainnya') }}" class="form-control" placeholder="Jumlah" required="">
														<span class="input-group-addon">Ekor</span>
													</div>
												</div>
											</div>
											<hr>
											<label><b>KETERANGAN</b></label>
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<textarea name="keterangan" id="" cols="30" rows="10" value="{{ Input::old('keterangan') }}" class="form-control" required=""></textarea>
													</div>
												</div>
											</div>

											
											<div class="clearfix"></div>
											<br>
											<input type="hidden" id="id-airtawar" name="id">
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
										<form action="{{ url('/app/budidayaairpayau') }}">
											<div class="col-md-4">
												<div class="input-group">
													<input type="date" class="form-control" name="offset" value="{{ $_GET['offset'] }}"/>
													<span class="input-group-addon" style="border: 0;">-</span>
													<input type="date" class="form-control" name="limit" value="{{ $_GET['limit'] }}"/>
												</div>
											</div>

											<div class="col-md-1">
												<button class="btn btn-default">Tampilkan</button>
											</div>

										</form>

										<div class="col-md-offset-1 col-md-6">
											<div class="input-group">
												<input type="text" onkeyup="cari_data(this.value)" class="form-control" placeholder="Pencarian">
												<span class="input-group-btn">
													<a href="" class="btn btn-default" data-toggle="modal" data-target="#modal-ekspor"><i class="fa fa-file-archive-o"></i> &nbsp;Ekspor</a>
												</span>
											</div>
										</div>
										<br>

										<div id="show-pencarian"></div>

										<div id="show-data">
											<table class="table table-hover demo-table-dynamic custom">
												<thead>
													<tr>
														<th rowspan="2">
															<button class="btn btn-check" data-toggle="modal" data-target="#modal-hapus" disabled id="hapus"><i class="pg-trash"></i></button>
														</th>
														<th>No.</th>
														<th>Lokasi</th>
														<th>Jumlah RTP</th>
														<th>Potensi</th>
														<th>Luas Tanam</th>
														<th>Keterangan</th>
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
														$potensi = "";
														$luas_tanam = "";

													?>
													@foreach($budidayaairpayau as $ap)
														<tr>
															<td>
																<div class="checkbox">
																	<input type="checkbox" class="pilih" value="{{ $ap->id }}" id="at{{ $ap->id }}">
																	<label for="at{{ $ap->id }}" class="m-l-20"></label>
																</div>
															</td>
															<td>{{ $i++ }}</td>
															<td>{{ $ap->lokasi }}</td>
															<td>{{ $ap->rtp }}</td>
															<td>{{ $ap->potensi }}</td>
															<td>{{ $ap->luas_tanam }}</td>
															<td>{{ $ap->keterangan }}</td>
															<td style="text-align:center">
																<a class="btn btn-default btn-xs view" data-id="{{ $ap->id }}"><i class="fa fa-search-plus"></i></a>
																<a href="{{ route('budidayaairpayau_edit',$ap->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
															</td>
		
														</tr>
														<?php 
															$jumlahrtp += $ap->rtp;
															$potensi += $ap->potensi;
															$luas_tanam += $ap->luas_tanam;
														?>
													@endforeach
														<tr>
															<td><b>Jumlah</b></td>
															<td></td>
															<td></td>
															<td><b><?php echo round($jumlahrtp,2); ?></b></td>
															<td><b><?php echo round($potensi,2); ?> Ha</b></td>
															<td><b><?php echo round($luas_tanam,2); ?> Ha</b></td>
															<td></td>
														</tr>

												</tbody>

											</table>
											<center>{!! $budidayaairpayau->appends([ 'offset' => $_GET['offset'], 'limit' => $_GET['limit'] ])->links() !!}</center>
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
					<h5>Detail Laporan Produksi Budidaya Air Payau</h5>
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
							<a href="{{ url('/app/budidayaairpayau/export-excel?offset='.$_GET['offset'].'&limit='.$_GET['limit']) }}">
								<i class="fa fa-file-excel-o export-excel"></i>
								Unduh Dalam Format Mic.Excel
							</a>
						</div>
						<div class="col-md-6">
							<a href="{{ url('/app/budidayaairpayau/export-pdf?offset='.$_GET['offset'].'&limit='.$_GET['limit']) }}">
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
@endsection


@section('registerscript')
	<script>
		$(".menu-items .link-pembudidaya").addClass("active open");
		$(".menu-items .link-pembudidaya .sub-produksi").addClass("active");
		$(".menu-items .link-pembudidaya .sub-produksi .sub-budidayaairpayau").addClass("active");


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
		        $(".btn-hapus").attr('href',"{{ route('budidayaairpayau_hapus') }}/"+id);

			});

			$("#show-tambah-budidayaairpayau").click(function(){
				$("#tambah-budidayaairpayau").fadeIn();
				$("input[name='lokasi']").focus();
				$(this).hide();
			});

			// Show detail
			$(".panel").on('click', '.view', function(){
				var id = $(this).data('id');
				var url = "{{ url('app/budidayaairpayau/detail') }}";
				var url = url+'/'+id;
				$.get(url, {id:id, _token:_token}, function(data){
					$("#view-detail").html(data);
					$("#modal-view").modal('show');
				});
			});

			@if ( count($errors) > 0 || Session::has('gagal') || Session::has('error_nik') )
				$("#tambah-budidayaairpayau").fadeIn();
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
				var url = "{{ url('app/budidayaairpayau/cari') }}";
				var url = url+"/"+cari;
				$.get(url, { cari:cari, _token:_token}, function(data){
					$('#show-pencarian').html(data);
				});
			}
		}

	</script>
@endsection