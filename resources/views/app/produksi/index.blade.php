@extends('app.layout.main')

@section('title')
	Produksi Pembudidaya | Tambah
@endsection


@section('konten')

<?php $Ms = new App\Custom ?>

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
								<a href="{{ url('/app/'.strtolower($Ms->dek($_GET['pr']))) }}">{{ $Ms->dek($_GET['pr']) }}</a>
							</li>
							<li>
								<a href="" class="active">Produksi</a>
							</li>
						</ul>
						
						<button id="show-tambah-produksi" class="btn btn-primary bg-blueblur m-t-10 m-b-10 pull-right">Tambah</button>
					</div>
				</div>

			</div>

			<br>

			<div class="container-fluid container-fixed-lg">
				<div class="inner" style="transform: translateY(0px); opacity: 1;">

					<div class="row">

						<div id="tambah-produksi" style="display:none">
							<div class="col-lg-7 col-md-6 ">
								@if ( Session::has('gagal') )
						    		@include('app/layout/partials/alert-danger', ['message' => session('gagal')])
								@endif
								<!-- START PANEL -->
								<div class="panel panel-transparent">
									<div class="panel-body">
										<form id="form-personal" method="post" action="{{ url('/app/produksi/store') }}" role="form">
											
											<input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
											<input type="hidden" name="pr" value="{{ $_GET['pr'] }}">
											<input type="hidden" name="offset" value="{{ $_GET['offset'] }}">
											<input type="hidden" name="limit" value="{{ $_GET['limit'] }}">

											<div class="row">
												<div class="col-sm-12">
													<div class="form-group">
														<label>NIK / Nama / Kelompok</label>
														<select class="full-width" onchange="get_data(this.value)" data-init-plugin="select2" name="id_user" required>
															<option value="">Pilih Pengguna</option>
															@foreach( $users as $u )
																<option value="{{ $u->id }}" {{ Input::old('id_user') == $u->id ? "selected":"" }} >{{ $u->nik }} <b>-</b> {{ $u->name }} <b>-</b> {{ $u->nama_kelompok }}</option>
															@endforeach
														</select>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label>Jenis Produksi</label>
														<input type="text" class="form-control" name="jenis_produksi" value="{{ Input::old('jenis_produksi') }}">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Biaya Produksi</label>
														<input type="number" class="form-control" name="biaya_produksi" value="{{ Input::old('biaya_produksi') }}">
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label>Jumlah Produksi</label>
														<input type="number" class="form-control" name="jumlah_produksi" value="{{ Input::old('jumlah_produksi') }}">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Waktu Produksi</label>
														<input type="date" class="form-control" name="waktu_produksi" value="{{ Input::old('waktu_produksi') }}">
													</div>
												</div>

											</div>

											@if ( $Ms->dek($_GET['pr']) == 'Nelayan' )
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label>Jenis Ikan</label>
															<input type="text" class="form-control" name="jenis_ikan" value="{{ Input::old('jenis_ikan') }}">
														</div>
													</div>
												</div>
											@endif

											<div class="clearfix"></div>
											<br>
											
											<button class="btn btn-primary" type="submit">Tambah</button>
										</form>
									</div>
								</div>
								<!-- END PANEL -->

							</div>
							</div>
						</div>

						<div class="col-md-12">
							@if ( Session::has('success') ) 
					    		@include('app/layout/partials/alert-sukses', ['message' => session('success')])
							@endif

							<!-- START PANEL -->
							<div class="panel panel-default">
								<div class="panel-body">
									<div class="">

										<form action="{{ url('/app/produksi') }}">

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

											<input type="hidden" name="pr" value="{{ $_GET['pr'] }}">

										</form>

										<div class="col-md-offset-2 col-md-5">
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
														<th>
															<button class="btn btn-check" data-toggle="modal" data-target="#modal-hapus" disabled id="hapus"><i class="pg-trash"></i></button>
														</th>
														<th>No.</th>
														<th>Nama Lengkap</th>
														<th>Jenis Produksi</th>
														@if ( $Ms->dek($_GET['pr']) == 'Nelayan' )
															<th>Jenis Ikan</th>
														@endif
														<th>Biaya Produksi</th>
														<th>Jumlah Produksi</th>
														<th>Waktu Produksi</th>
														<th style="text-align:center">Aksi</th>
													</tr>
												</thead>

												<tbody>
													<?php $no = 1 ?>

													@if ( $produksi->total() > 0 )

														@foreach($produksi as $per)
															<tr>
																<td>
																	<div class="checkbox">
																		<input type="checkbox" class="pilih" value="{{ $per->id }}" id="{{ $per->id }}">
																		<label for="{{ $per->id }}" class="m-l-20"></label>
																	</div>
																</td>
																<td>{{ $no++ }}</td>
																<td>{{ $per->name }}</td>
																<td>{{ $per->jenis_produksi }}</td>
																@if ( $Ms->dek($_GET['pr']) == 'Nelayan' )
																	<td>{{ $per->jenis_ikan }}</td>
																@endif

																<td>{{ $Ms->rupiah($per->biaya_produksi) }}</td>
																<td>{{ $per->jumlah_produksi }}</td>
																<td>{{ $per->waktu_produksi }}</td>
																<td style="text-align:center">
																	<a href="{{ url('/app/produksi/edit') }}/{{ $per->id }}?offset={{ $_GET['offset'] }}&limit={{ $_GET['limit'] }}&pr={{ $_GET['pr'] }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
																</td>

															</tr>
														@endforeach

													@else
														<tr>
															<td colspan="9"  class="not-found">
																<img src="{{ url('resources/assets/app/img/not_found.png') }}" alt="">
																<span>Tidak ada data</span>
															</td>
														</tr>
													@endif
												</tbody>

											</table>
											<center>{!! $produksi->appends(['pr' => $_GET['pr']])->links() !!}</center>
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
					<h5>Detail pengolah</h5>
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
							<a href="{{ url('/app/produksi/export-excel') }}?offset={{ $_GET['offset'] }}&limit={{ $_GET['limit'] }}&pr={{ $_GET['pr'] }}">
								<i class="fa fa-file-excel-o export-excel"></i>
								Unduh Dalam Format Mic.Excel
							</a>
						</div>
						<div class="col-md-6">
							<a href="{{ url('/app/produksi/export-pdf') }}?offset={{ $_GET['offset'] }}&limit={{ $_GET['limit'] }}&pr={{ $_GET['pr'] }}">
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

@endsection


@section('registerscript')
	<script>
		$(".menu-items .link-{{ strtolower($Ms->dek($_GET['pr'])) }}").addClass("active open");
		$(".menu-items .link-{{ strtolower($Ms->dek($_GET['pr'])) }} .sub-produksi").addClass("active");

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
		        $(".btn-hapus").attr('href',"{{ url('/app/produksi/hapus') }}/"+id);

			});

			$("#show-tambah-produksi").click(function(){
				$("#tambah-produksi").fadeIn();
				$("input[name='nik']").focus();
				$(this).hide();
			});

			@if ( Session::has('gagal') )
				$("#tambah-produksi").fadeIn();
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
				var url = "{{ url('/app/produksi/search') }}";
				var pr = "{{ $Ms->dek($_GET['pr']) }}";
				var offset = "{{ $_GET['offset'] }}";
				var limit = "{{ $_GET['limit'] }}";
				$.get(url, { cari:cari, _token:_token, pr:pr, offset:offset, limit:limit}, function(data){
					$('#show-pencarian').html(data);
				});
			}
		}
	</script>
@endsection