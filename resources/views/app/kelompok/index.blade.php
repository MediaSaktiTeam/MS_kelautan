@extends('app.layout.main')

@section('title')
	Kelompok Nelayan | Tambah
@endsection



@section('konten')

<!-- START PAGE-CONTAINER -->
<div class="page-container">

	<!-- START PAGE CONTENT WRAPPER -->
	<div class="page-content-wrapper">
		
		<!-- START PAGE CONTENT -->
		<div class="content sm-gutter">
			
			<div class="jumbotron bg-darkblue" data-pages="parallax">
				<div class="container-fluid container-fixed-lg">
					<div class="inner" style="transform: translateY(0px); opacity: 1;">
						<!-- START BREADCRUMB -->
						<ul class="breadcrumb">
							<li>
								<a href="#">Kelompok Nelayan</a>
							</li>
							<li>
								<a href="#" class="active">Tambah Kelompok</a>
							</li>
						</ul>
					</div>
				</div>
			</div>


			<!-- START CONTAINER FLUID -->
			<div class="container-fluid padding-25 sm-padding-10">

				
				<!-- START ROW -->
				<div class="row">
					<div id="col-tambah" class="col-md-4">
						<!-- START PANEL -->
						<div class="panel panel-default">
							<div class="panel-heading">
								<div class="panel-title">
									Kelompok Nelayan
								</div>
							</div>
							<div class="panel-body">
							<p>Silahkan tambahkan kelompok baru, selanjutnya tekan tombol <b>tambah anggota</b> untuk menambahkan anggota kelompok.</p>
								<form class="style-form" id="form-kelompok" method="GET" action="{{ route('kelompok_tambah') }}">
									<input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
									
									<?php
										$seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'
														 .'0123456789');
										shuffle($seed); 
										$rand = '';
										foreach (array_rand($seed, 5) as $k) $rand .= $seed[$k];
									?>
									<input type="hidden" id="id-kelompok" name="id" value="<?php echo $rand; ?>">
									
									<div class="form-group form-group-default required">
										<label>Bidang Usaha</label>
										<select id="bidang-usaha" class="full-width" data-init-plugin="select2" name="tipe">
											<option value="Nelayan">Nelayan</option>
											<option value="Pembudidaya">Pembudidaya</option>
										</select>
									</div>
									<div class="form-group form-group-default required">
										<label>Nama Kelompok</label>
										<input type="text" id="nama" name="nama" class="form-control" required>
									</div>
									<div class="form-group form-group-default required">
										<label>Alamat Sekretariat</label>
										<input type="text" id="alamat" name="alamat" class="form-control" required>
									</div>
									<div class="form-group form-group-default required">
										<label>Nomor Rekening</label>
										<input type="text" id="norek" name="no_rekening" class="form-control" required>
									</div>
									<div class="form-group form-group-default required">
										<label>Nama Rekening</label>
										<input type="text" id="narek" name="nama_rekening" class="form-control" required>
									</div>
									<div class="form-group form-group-default required">
										<label>Nama Bank</label>
										<input type="text" id="nama-bank" name="nama_bank" class="form-control" required>
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-primary btn-cons btn-simpan">Tambah</button>
									</div>
								</form>
							</div>
						</div>
						<!-- END PANEL -->
					</div>

					<div class="col-md-8">
						<!-- START PANEL -->
						<div class="panel panel-default">
							<div class="panel-body">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Pencarian">
									<span class="input-group-btn">
										<a href="" class="btn btn-default" data-toggle="modal" data-target="#modal-ekspor"><i class="fa fa-file-archive-o"></i> &nbsp;Ekspor</a>
									</span>
								</div>
								<br>

								<table class="table table-hover demo-table-dynamic custom" id="tableWithDynamicRows">
									<thead>
										<tr>
											<th>
												<button class="btn btn-check" data-toggle="modal" data-target="#modal-hapus" disabled id="hapus"><i class="pg-trash"></i></button>
											</th>
											<th>ID Kelompok</th>
											<th>Nama Kelompok</th>
											<th>Bidang Usaha</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										@foreach($kelompok as $kel)
										<tr>
											<td>
											<?php $data_user = App\User::where('id_kelompok', $kel->id_kelompok)->count(); ?>

												<?php
													$title = "";
													$disabled = "";
													if ( $data_user >= 1 ):
														$title = "Kelompok sedang terpakai";
														$disabled = "disabled";
													endif
												?>
												<div class="checkbox" title="<?php echo $title ?>">
													<input type="checkbox" class="pilih" value="{{ $kel->id_kelompok }}" id="checkbox{{ $kel->id_kelompok }}" <?php echo $disabled ?> >
													<label for="checkbox{{ $kel->id_kelompok }}" class="m-l-20"></label>
												</div>
											
											</td>
											<td>{{ $kel->id_kelompok }}</td>
											<td>{{ $kel->nama }}</td>
											<td>{{ $kel->tipe }}</td>
											<td>
												<a class="btn btn-default btn-xs view" data-id="{{ $kel->id_kelompok }}" data-toggle="modal" data-target="#modal-view"><i class="fa fa-search-plus"></i></a>
												<a href="javascript:;"
													data-id="{{ $kel->id_kelompok }}"
													data-nama="{{ $kel->nama }}"
													data-tipe="{{ $kel->tipe }}"
													data-alamat="{{ $kel->alamat }}"
													data-norek="{{ $kel->no_rekening }}"
													data-narek="{{ $kel->nama_rekening }}"
													data-bank="{{ $kel->nama_bank }}" class="btn btn-edit btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
						<!-- END PANEL -->
					</div>
				</div>
			</div>
			<!-- END CONTAINER FLUID -->
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
	<div class="modal-dialog">
		<div class="modal-content-wrapper">
			<div class="modal-content">
				<div class="modal-header clearfix text-left">
					<button type="button" class="close" data-dismiss="modal"  aria-hidden="true"><i class="pg-close fs-14"></i></button>
					<h5>Detail Kelompok</h5>
				</div>
				<div class="modal-body" id="view-detail">
					
				</div>
				<div class="modal-footer">
					<a class="btn btn-primary btn-hapus btn-cons pull-left inline view-anggota" data-id="" data-dismiss="modal">Lihat Anggota</a>
					<button type="button" class="btn btn-default btn-cons no-margin inline" data-dismiss="modal">Kembali</button>
				</div>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- END MODAL STICK UP VIEW -->


<!-- MODAL STICK UP VIEW -->
<div class="modal fade stick-up" id="modal-view-anggota" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content-wrapper">
			<div class="modal-content">
				<div class="modal-header clearfix text-left">
					<button type="button" class="close" data-dismiss="modal"  aria-hidden="true"><i class="pg-close fs-14"></i></button>
					<h5>Daftar Anggota Kelompok</h5>
				</div>
				<div class="modal-body" id="view-detail-anggota">
					
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
<!-- END MODAL STICK UP VIEW -->


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
							<a href="">
								<i class="fa fa-file-excel-o export-excel"></i>
								Unduh Dalam Format Mic.Excel
							</a>
						</div>
						<div class="col-md-6">
							<a href="">
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
		$(".menu-items .link-kelompok").addClass("active");

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
				$(".btn-hapus").attr('href',"{{ route('kelompok_hapus') }}/"+id);

			});

			$("#show-tambah-kelompok").click(function(){
				$("#tambah-kelompok").fadeIn();
				$("input[name='nik']").focus();
				$(this).hide();
			});

			// Show detail
			$(".view").click(function(){
				var id = $(this).data('id');
				var url = "{{ url('app/kelompok/detail') }}";
				var url = url+'/'+id;
				$.get(url, {id:id, _token:_token}, function(data){
					$("#view-detail").html(data);
					$("#modal-view").modal('show');
					var id_kelompok = $('.modal').find('#id_kelompok').data('id');
					$("#modal-view .view-anggota").attr('data-id',id_kelompok);
				});
			});

			// Show detail Anggota
			$(".view-anggota").click(function(){
				var id = $(this).attr('data-id');
				var url = "{{ url('app/kelompok/detail-anggota') }}";
				var url = url+'/'+id;
				$.get(url, {id:id, _token:_token}, function(data){
					$("#view-detail-anggota").html(data);
					$("#modal-view-anggota").modal('show');
				});
			});

			// Edit
			$(".btn-edit").click(function(){
				var id 		= $(this).data('id');
				var nama 	= $(this).data('nama');
				var tipe 	= $(this).data('tipe');
				var alamat 	= $(this).data('alamat');
				var norek 	= $(this).data('norek');
				var narek 	= $(this).data('narek');
				var bank 	= $(this).data('bank');

				$("#col-tambah").hide();

				$("select option").filter(function() {
				    if( $(this).val().trim() == tipe ){
				    	$(this).prop('selected', true);
				    	$(".select2-chosen").html(tipe);
				    }
				});

				$("#id-kelompok").val(id);
				$("#nama").val(nama);
				$("#alamat").val(alamat);
				$("#narek").val(narek);
				$("#norek").val(norek);
				$("#nama-bank").val(bank);
				$(".btn-simpan").html('Simpan');

				$("#form-kelompok").attr("action","{{ route('kelompok_update') }}");

				$("#col-tambah").fadeIn();
			});

		});

	</script>
@endsection