@extends('app.layout.main')

@section('title')
	Nelayan | Tambah
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
								<a href="{{ route('nelayan') }}">Bantuan</a>
							</li>
						</ul>
						
						<button id="show-tambah-nelayan" class="btn btn-primary bg-blueblur m-t-10 m-b-10 pull-right">Tambah</button>
					</div>
				</div>

			</div>

			<br>

			<div class="container-fluid container-fixed-lg">
				<div class="inner" style="transform: translateY(0px); opacity: 1;">

					<div class="row">

						<div id="tambah-nelayan" style="display:none">
							<div class="col-md-6">

								<!-- START PANEL -->
								<div class="panel panel-transparent">
									<div class="panel-body">
										<form id="form-personal" method="post" action="{{ route('nelayan_simpan') }}" role="form">
											
											{{ csrf_field() }}

											<div class="row clearfix">
												<div class="col-sm-12">
													<div class="form-group required">
														<label>NIK / Nama / Kelompok</label>
														<select id="bidang-usaha" class="full-width" data-init-plugin="select2" name="tipe">
															<option value=""></option>
														</select>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-sm-6">
													<div class="form-group required">
														<label>Jenis Bantuan</label>
														<input type="text" class="form-control" name="no_kartu_nelayan" required>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label>Tahun</label>
														<select id="bidang-usaha" class="full-width" data-init-plugin="select2" name="tipe">
															<option value="">2011</option>
															<option value="">2012</option>
															<option value="">2013</option>
															<option value="">2014</option>
															<option value="">2015</option>
															<option value="">2016</option>
															<option value="">2017</option>
															<option value="">2018</option>
															<option value="">2019</option>
															<option value="">2020</option>
															<option value="">2021</option>
															<option value="">2022</option>
															<option value="">2023</option>
															<option value="">2024</option>
															<option value="">2025</option>
															<option value="">2026</option>
															<option value="">2027</option>
															<option value="">2028</option>
															<option value="">2029</option>
															<option value="">2030</option>
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

								<!-- START PANEL -->
								<div class="panel panel-transparent">
									<div class="panel-body">
										<div class="form-group">
											<label>Keterangan</label>
										</div>
										<table class="table">
											<tr>
												<td>NIK</td>
												<td><b>0981293890</b></td>
											</tr>
											<tr>
												<td>Nama</td>
												<td><b>Gifa Eriyanto</b></td>
											</tr>
											<tr>
												<td>Bidang Usaha</td>
												<td><b>Nelayan</b></td>
											</tr>
											<tr>
												<td>Kelompok</td>
												<td><b>Media SAKTI</b></td>
											</tr>
										</table>
									</div>
								</div>
								<!-- END PANEL -->
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
											<table class="table table-hover demo-table-dynamic custom" id="tableWithDynamicRows">
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
													<tr>
														<td>
															<div class="checkbox">
																<input type="checkbox" class="pilih" value="" id="checkbox">
																<label for="checkbox" class="m-l-20"></label>
															</div>
														</td>
														<td>1</td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td>
															<a class="btn btn-default btn-xs view" data-id="" data-toggle="modal" data-target="#modal-view"><i class="fa fa-search-plus"></i></a>
															<a href="javascript:;"
																data-id=""
																data-nama=""
																data-tipe=""
																data-alamat=""
																data-norek=""
																data-narek=""
																data-bank="" class="btn btn-edit btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
														</td>
													</tr>
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
		<!-- START CONTAINER FLUID -->


		<div class="container-fluid container-fixed-lg footer">
			<div class="copyright sm-text-center">
				<p class="small no-margin pull-left sm-pull-reset">
					<span class="hint-text">Copyright © 2015 </span>
					<span class="font-montserrat">Media SAKTI</span>.
					<span class="hint-text">All rights reserved. </span>
					<span class="sm-block"><a href="#" class="m-l-10 m-r-10">Terms of use</a> | <a href="#" class="m-l-10">Privacy Policy</a></span>
				</p>
				<p class="small no-margin pull-right sm-pull-reset">
					<a href="#">Hand-crafted</a> <span class="hint-text">&amp; Made with Love ®</span>
				</p>
				<div class="clearfix"></div>
			</div>
		</div>
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
					<h5>Detail nelayan</h5>
				</div>
				<div class="modal-body" id="view-detail">

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Kembali</button>
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
	<div class="modal-dialog modal-sm">
		<div class="modal-content-wrapper">
			<div class="modal-content">
				<div class="modal-header clearfix text-left">
					<button type="button" class="close" data-dismiss="modal"  aria-hidden="true"><i class="pg-close fs-14"></i></button>
					<h5>Ekspor Data</h5>
				</div>
				<div class="modal-body">
					<p class="no-margin">
						<a href="">
							<img src="" alt="">
							Unduh Dalam Format Mic.Excel
						</a>
						<a href="">
							<img src="" alt="">
							Unduh Dalam Format PDF
						</a>
					</p>
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
		        $(".btn-hapus").attr('href',"{{ route('nelayan_hapus') }}/"+id);

			});

			$("#show-tambah-nelayan").click(function(){
				$("#tambah-nelayan").fadeIn();
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

		function get_sarana(id){
			$('#sarana').html('<i class="fa fa-spinner fa-spin"></i>');
			var _token = $('meta[name="csrf-token"]').attr('content');
			var url = "{{ url('app/nelayan/sarana') }}";
			var url = url+"/"+id;
			$.get(url, { id:id, _token:_token}, function(data){
				$('#sarana').html(data);
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
				var url = "{{ url('app/nelayan/cari') }}";
				var url = url+"/"+cari;
				$.get(url, { cari:cari, _token:_token}, function(data){
					$('#show-pencarian').html(data);
				});
			}
		}
	</script>
@endsection