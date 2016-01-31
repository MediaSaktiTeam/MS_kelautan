@extends('app.layout.main')

@section('title')
	Bantuan
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
								<a href="{{ route('ref_bantuan') }}">Bantuan</a>
							</li>
						</ul>
						
						<button id="show-tambah-bantuan" class="btn btn-primary bg-blueblur m-t-10 m-b-10 pull-right">Tambah</button>
					</div>
				</div>

			</div>

			<br>

			<div class="container-fluid container-fixed-lg">
				<div class="inner" style="transform: translateY(0px); opacity: 1;">

					<div class="row">

						<div id="tambah-bantuan" style="display:none">
							<div class="col-md-6">

								<!-- START PANEL -->
								<div class="panel panel-transparent">
									<div class="panel-body">
										<form id="form-personal" method="post" action="{{ route('ref_bantuan_simpan') }}" role="form">
											
											{{ csrf_field() }}

											<div class="row clearfix">
												<div class="col-sm-12">
													<div class="form-group required">
														<label>NIK / Nama / Kelompok</label>
														<select class="full-width" onchange="get_data(this.value)" data-init-plugin="select2" name="id_user" required>
															<option value="">Pilih Pengguna</option>
															@foreach( $users as $u )
																<option value="{{ $u->id }}">{{ $u->nik }} <b>-</b> {{ $u->name }} <b>-</b> {{ $u->nama_kelompok }}</option>
															@endforeach
														</select>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-sm-8">
													<div class="form-group required" id="list-bantuan">
														<label>Jenis Bantuan</label>
														<select class="full-width" data-init-plugin="select2" required>
															<option value="">Jenis Bantuan...</option>
														</select>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>Tahun</label>
														<select name="tahun" class="full-width" data-init-plugin="select2" required>
															@for( $t = 2011; $t < date('Y') + 2; $t++)
																<option value="{{ $t }}" {{ $t == date('Y') ? "selected":"" }}>{{ $t }}</option>
															@endfor
														</select>
													</div>
												</div>
											</div>

											<div class="clearfix"></div>
											<br>
											
											<button class="btn btn-primary" type="submit">Tambah</button>
										</form>
									</div>
								</div>
								<!-- END PANEL -->
							</div>

							<div class="col-md-6">


								<div id="preview-data"></div>


							</div>
						</div>

						<div class="col-md-12">
								
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
														<th>Nama Anggota</th>
														<th>Bidang Usaha</th>
														<th>Nama Kelompok</th>
														<th>Jenis Bantuan</th>
														<th>Tahun</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>
													<?php $no = 1 ?>
													@foreach( $bantuan_users as $bu )

														<?php

															if ( $no > 1 ) {
																if ( $id_user == $bu->id && $tb == $bu->tahun_bantuan )
																	continue;
															}

															$id_user = $bu->id;
															$tb = $bu->tahun_bantuan;

														?>
														
														<tr>
															<td>
																<div class="checkbox">
																	<input type="checkbox" class="pilih" value="{{ $bu->id }}|{{ $bu->tahun_bantuan }}" id="pb{{ $bu->id }}|{{ $bu->tahun_bantuan }}">
																	<label for="pb{{ $bu->id }}|{{ $bu->tahun_bantuan }}" class="m-l-20"></label>
																</div>
															</td>
															<td>{{ $no }}</td>
															<td>{{ $bu->name }}</td>
															<td>{{ $bu->profesi }}</td>
															<td>{{ $bu->nama_kelompok }}</td>
															<td>
																<ul class="list-unstyled">
																	<?php

																		$bantuan = DB::table('app_bantuan as ab')
																						->leftJoin('app_bantuan_master as abm', 'abm.id', '=', 'ab.id_bantuan')
																							->select('abm.nama')
																								->where('ab.id_user', $bu->id)
																								->where('ab.tahun', $bu->tahun_bantuan)
																								->orderBy('ab.tahun', 'asc')
																								->get(); ?>
																	@foreach( $bantuan as $b )
																		<li><i class="fa fa-check-square-o"></i>  {{ $b->nama }}</li>
																	@endforeach
																</ul>

															</td>
															<td>{{ $bu->tahun_bantuan }}</td>
															<td>
																<a href="{{ route('ref_bantuan_edit', [ $bu->id, $bu->tahun_bantuan]) }}" class="btn btn-edit btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
															</td>
														</tr>

													<?php $no++ ?>

													@endforeach

												</tbody>
											</table>
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
					<h5>Detail Bantuan</h5>
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
							<a href="{{ url('/app/bantuan/export-excel') }}">
								<i class="fa fa-file-excel-o export-excel"></i>
								Unduh Dalam Format Mic.Excel
							</a>
						</div>
						<div class="col-md-6">
							<a href="{{ url('/app/bantuan/export-pdf') }}">
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
		$(".menu-items .link-bantuan").addClass("active");

		$(function(){

			var _token = $('meta[name="csrf-token"]').attr('content');

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
		        $(".btn-hapus").attr('href',"{{ route('ref_bantuan_hapus') }}/"+id);

			});

			$("#show-tambah-bantuan").click(function(){
				$("#tambah-bantuan").fadeIn();
				$("input[name='nik']").focus();
				$(this).hide();
			});

			// Show detail
			$(".panel").on('click','.view', function(){
				var id = $(this).data('id');
				var url = "{{ url('app/nelayan/detail') }}";
				var url = url+'/'+id;
				$.get(url, {id:id, _token:_token}, function(data){
					$("#view-detail").html(data);
					$("#modal-view").modal('show');
				});
			});

		});

		function get_data(id){
			$('#preview-data').html('<div style="margin-top:30px;margin-left:30px"><i class="fa fa-spinner fa-spin"></i></div>');
			var _token = $('meta[name="csrf-token"]').attr('content');
			var url = "{{ url('app/bantuan/data-preview') }}";
			var url = url+"/"+id;
			$.get(url, { id:id, _token:_token}, function(data){
				$('#preview-data').html(data);
				get_jenis_bantuan(id);
			});
		}

		function get_jenis_bantuan(id){
			$("#list-bantuan").html('<i class="fa fa-spinner fa-spin"></i>');
			var _token = $('meta[name="csrf-token"]').attr('content');
			var url = "{{ url('app/bantuan/list-bantuan') }}";
			var url = url+"/"+id;
			$.get(url, { id:id, _token:_token}, function(data){
				$('#list-bantuan').html(data);
			});

		}

		function cari_data(cari){
			if ( cari == "" ) {
				$("#show-data").show();
				$("#show-pencarian").hide();
			} else {
				$("#show-data").hide();
				$("#show-pencarian").show();
				$("#show-pencarian").html('<tr><td colspan="6"><i class="fa fa-spinner fa-spin"></i></td></tr>');
				var _token = $('meta[name="csrf-token"]').attr('content');
				var url = "{{ url('app/bantuan/cari') }}";
				var url = url+"/"+cari;
				$.get(url, { cari:cari, _token:_token}, function(data){
					$('#show-pencarian').html(data);
				});
			}
		}
	</script>
@endsection