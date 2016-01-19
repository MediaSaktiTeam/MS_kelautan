@extends('admin.layout.main')

@section('title')
	Fasilitas
@endsection

@section('konten')

<ol class="breadcrumb bc-3">
	<li>
		<a href="{{ url('admin') }}">Beranda</a>
	</li>

	<li class="active">
		<strong>Fasilitas</strong>
	</li>
</ol>
			
<h2>Fasilitas</h2>
<br />

<div class="gallery-env">

	<div class="row">

	
		<div class="col-sm-12">
			<a href="javascript:;" onclick="jQuery('#modal-new').modal('show');" class="btn btn-info">Tambah Fasilitas Baru</a>

			<hr>
			
			<div class="image-categories">
				<span>Semua Fasilitas</span>
				<a class="pull-right" href="{{ route('fasilitas') }}"><i class="fa fa-refresh"></i>&nbsp; Refresh</a>
			</div>
		</div>
	
	</div>

	<div class="row">

			@if ( $Fasilitas->total() < 1 )
				<center>Belum ada fasilitas</center>
			@endif

		<?php $Fasilitas->setPath('fasilitas'); ?>

		@foreach( $Fasilitas as $fas )

		<div class="col-sm-2 col-xs-4" data-tag="1d">

			<article class="image-thumb">
				
				<a href="#" class="image">
					<img src="{{ url('resources/assets/img/fasilitas')}}/{{ $fas->nama_file }}" />
				</a>
				
				<div class="image-options">
					<a href="javascript:;"
						data-nama ="{{ $fas->nama_file }}" 
						data-id ="{{ $fas->id }}" class="delete"><i class="entypo-cancel"></i></a>
				</div>
				
			</article>

		</div>
		
		@endforeach

		<div class="clearfix"></div>
		<center>
			{!! $Fasilitas->render() !!}
		</center>
		
	</div>

</div>

@endsection



@section('registerscript')
	<!-- Modal 1 (Basic)-->
	<div class='modal fade' id='modal-hapus'>
		<div class='modal-dialog'>
			<div class='modal-content'>

				<div class='modal-header'>
					<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
					<h4 class='modal-title'>Hapus Gambar</h4>
				</div>
				
				<div class='modal-body'>
					Apakah Anda yakin menghapus fasilitas ini?
				</div>
				
				<div class='modal-footer no-margin'>
					<button type='button' class='btn btn-default' data-dismiss='modal'>Kembali</button>
					<button type='button' id="hapus" class='btn btn-danger'>Hapus</button>
				</div>

			</div>
		</div>
	</div>

	<!-- Modal 1 (Basic)-->
	<div class='modal fade custom-width' id='modal-new'>
		<div class='modal-dialog' style='width: 80%;'>
			<div class='modal-content'>

				<div class='modal-header'>
					<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
					<h4 class='modal-title'>Tambah Gambar Fasilitas</h4>
				</div>
				
				<div class='modal-body'>
					<ul class='nav nav-tabs bordered' style='margin-top:0'>
						<li class='active'>
							<a href='#upload' data-toggle='tab'>
								Unggah dari komputer
							</a>
						</li>
						<!-- <li>
							<a href='#fm' data-toggle='tab'>
								Media
							</a>
						</li> -->
					</ul>

					<div class='tab-content'>
						<div class='tab-pane active' id='upload'>
							<form action="{{ route('fasilitas_simpan') }}" enctype="multipart/form-data" class="dropzone dz-min" id="dropzone_example">
								{{ csrf_field() }}
								<div class="fallback">
									<input name="file" type="file" multiple />
								</div>
							</form>

							<div id='dze_info' class='hidden'>
	
								<br />
								<div class='panel panel-default'>
									<div class='panel-heading'>
										<div class='panel-title'>Informasi gambar</div>
									</div>
									
									<table class='table table-bordered'>
										<thead>
											<tr>
												<th width='40%'>Nama gambar</th>
												<th width='15%'>Ukuran</th>
												<th width='15%'>Tipe</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
										</tbody>
										<tfoot>
											<tr>
												<td colspan='4'></td>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>
						<!-- <div class='tab-pane' id='fm'>
							
							<img src='assets/images/fm.jpg' width='100%'>
								
						</div> -->
					</div>
				</div>

			</div>
		</div>
	</div>

	<script>
		$('.nav-fasilitas').addClass('active');

		$(function(){
			$(".delete").click(function(){
				var del_class = $(this);
				var nm_gambar = $(this).data('nama');
				var id_gambar = $(this).data('id');
				$("#modal-hapus").modal('show');
				$("#hapus").click(function(){

					var route = "{{ route('fasilitas_hapus') }}";
					var token = $("meta[name='csrf-token']").attr("content");

					$(this).html("<i class='fa fa-spinner fa-spin'></i>&nbsp; Hapus");
					$(this).addClass("disabled");

					$.ajax({
						url: route,
						type: "POST",
						headers: { "X-CSRF-TOKEN": token },	
						dataType: "html",
						data: {nm_gambar : nm_gambar, id_gambar : id_gambar},
						success: function(data){
							$("#hapus").html("Hapus");
							$("#hapus").removeClass("disabled");
							$("#modal-hapus").modal('hide');
							del_class.parent().parent().fadeOut('slow');
						},
						error: function(jqXHR, textStatus, errorThrown) {
							$("#hapus").html("Hapus");
							$("#hapus").removeClass("disabled");
							alert(textStatus+","+errorThrown);
						}
					});
				});
			});
		});

	</script>
@endsection