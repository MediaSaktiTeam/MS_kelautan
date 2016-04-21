@extends('app.layout.main')

@section('title')
	Bantuan | Sunting
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
							<li>
								<a href="#" class="active">Sunting Bantuan</a>
							</li>
						</ul>
						
					</div>
				</div>

			</div>

			<br>

			<div class="container-fluid container-fixed-lg">
				<div class="inner" style="transform: translateY(0px); opacity: 1;">

					<div class="row">

						<div id="tambah-nelayan">
							<div class="col-md-6">

								<!-- START PANEL -->
								<div class="panel panel-transparent">
									<div class="panel-body">
										<form id="form-personal" method="post" action="{{ route('ref_bantuan_update') }}" role="form">
											
											<input type="hidden" name="id" value="{{ $user->id }}">
											<input type="hidden" name="tahun_edit" value="{{ $user->tahun_bantuan }}">
											{{ csrf_field() }}

											<div class="row clearfix">
												<div class="col-sm-12">
													<div class="form-group required">
														<label>NIK / Nama / Kelompok</label>
														<select class="full-width" onchange="get_data(this.value); get_jenis_bantuan(this.value)" data-init-plugin="select2" name="id_user" disabled>
															<option value="">Pilih Pengguna</option>
															<?php

															$data_users = DB::table('users as u')
													                            ->leftJoin('app_kelompok as ak', 'u.id_kelompok', '=', 'ak.id_kelompok')
													                            ->select('u.*', 'ak.nama as nama_kelompok')
													                                ->where('u.profesi','<>','Admin')
													                                ->orderBy('ak.nama', 'asc')->get(); ?>
															@foreach( $data_users as $du )
																<option value="{{ $du->id }}" {{ $du->id == $user->id ? "selected":""}}>{{ $du->nik }} <b>-</b> {{ $du->name }} <b>-</b> {{ $du->nama_kelompok }}</option>
															@endforeach
														</select>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-sm-8">
													<div class="form-group required" id="list-bantuan">
														<label>Jenis Bantuan</label>
														<select name="id_bantuan[]" class="full-width" data-init-plugin="select2" multiple="" required data-placeholder="Pilih Jenis Bantuan...">

															<?php 

																$list_all_bantuan = App\Bantuan::where('jenis', $user->profesi)->get();

																$list_bantuan = DB::table('app_bantuan as ab')
																						->leftJoin('app_bantuan_master as abm', 'abm.id', '=', 'ab.id_bantuan')
																							->select('abm.nama','abm.id')
																								->where('ab.id_user', $user->id)
																								->where('ab.tahun', $user->tahun_bantuan)
																								->orderBy('ab.tahun', 'asc')
																								->get();
																foreach( $list_bantuan as $lb ){
																	$data_list_bantuan[] = $lb->id;
																}

															?>

															@foreach( $list_all_bantuan as $lab )
																<option value="{{ $lab->id }}" {{ in_array($lab->id, $data_list_bantuan) ? "selected":"" }}>{{ $lab->nama }}</option>
															@endforeach

														</select>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>Tahun</label>
														<select name="tahun_update" class="full-width" data-init-plugin="select2" required>
															@for( $t = 2011; $t < date('Y') + 2; $t++)
																<option value="{{ $t }}" {{ $t == $user->tahun_bantuan ? "selected":"" }}>{{ $t }}</option>
															@endfor
														</select>
													</div>
												</div>
											</div>

											<div class="row clearfix">
												<div class="col-sm-12">
													<div class="form-group required">
														<label>Nama Program</label>
														<input type="text" name="nama_program" value="{{ $user->nama_program }}" required class="form-control">
													</div>
												</div>
											</div>

											<div class="clearfix"></div>
											<br>
											
											<button class="btn btn-primary" type="submit">Simpan</button>
										</form>
									</div>
								</div>
								<!-- END PANEL -->
							</div>

							<div class="col-md-6">

								<div id="preview-data"></div>

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
		$(".menu-items .link-bantuan").addClass("active");

		function get_data(id){
			$('#preview-data').html('<div style="margin-top:30px;margin-left:30px"><i class="fa fa-spinner fa-spin"></i></div>');
			var _token = $('meta[name="csrf-token"]').attr('content');
			var url = "{{ url('app/bantuan/data-preview') }}";
			var url = url+"/"+id;
			$.get(url, { id:id, _token:_token}, function(data){
				$('#preview-data').html(data);
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

		get_data({{ $user->id }});
	</script>
@endsection