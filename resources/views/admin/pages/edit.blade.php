
@extends('admin.layout.main')

@section('konten')

<div class="mail-env">
	
	
	<!-- Mail Body -->
	<div class="mail-body">
		
		<div class="mail-header">
			<!-- title -->
			<h3 class="col-md-5 no-margin">
				Sunting Halaman
			</h3>
			
			<!-- links -->
			@if ( $Page->arsip != 1 )
			<div class="col-md-7">

				<div class="pull-right">
			
					<a href="#" id="simpan-draft" class="btn btn-default btn-icon">
						Simpan di Draf
						<i class="entypo-tag"></i>
					</a>

				</div>
				
			</div>
			@endif
		</div>
		
		@if ( Session::has('success') ) 
    		@include('admin/layout/inc/alert-sukses', ['message' => session('success')])
		@endif

		@if ( count($errors) > 0 )
			@include('admin/layout/inc/alert-danger', ['errors' => $errors]);
		@endif

		<div class="mail-compose">
		
			<form method="post" id="form-add" enctype="multipart/form-data" role="form" action="{{ route('page_update', [$Page->id]) }}">

				<input type="hidden" name="draft" id="draft" value="0">

				<input type="hidden" name="gambar_" value="{{ $Page->gambar }}" id="gambar_">

				<input type="hidden" name="hapus_gambar" value="0" id="hapus-gambar_">

				{{ csrf_field() }}
				
				<div class="form-group">
					<label for="to">Judul Halaman:</label>
					<input type="text" name="judul" class="form-control post-title" id="to" tabindex="1" value="{{ $Page->judul }}" />
				</div>
				
				
				<div class="compose-message-editor">
					<textarea name="konten" id="editor">
					{{ $Page->konten }}
					</textarea>
				</div>		
		
		</div>
	</div>
	
	<!-- Sidebar -->
	<div class="mail-sidebar">
		
			<!-- compose new email button -->
			<div class="mail-sidebar-row hidden-xs">
				<button class="btn btn-success btn-icon btn-block" onclick="get_kategori_value()">
					{{ $Page->draft == 0 && $Page->arsip == 0 ? 'Simpan' : 'Publikasikan' }}
					<i class="entypo-megaphone"></i>
				</button>
			</div>
			
			<!-- menu -->
			<ul class="mail-menu">
				<li class="custom">
					<div class="panel panel-primary" data-collapsed="0">
						<div class="panel-heading">
							<div class="panel-title">
								Gambar Utama
							</div>
						</div>
						<div class="panel-body">
							<div class="fileinput fileinput-new" data-provides="fileinput">
								<div class="fileinput-new thumbnail" style="width: 100%; height: auto;" data-trigger="fileinput">
									@if ( !empty($Page->gambar) )
										<img width="150" src="<?= url("resources/assets/img/page/$Page->gambar") ?>" id="view-gambar" alt="...">
									@else
										<img width="150" src="{{ url('resources/assets/admin/images/blank.png') }}" alt="...">
									@endif
								</div>
								<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 150px; max-height: auto"></div>
								<div>
									<span class="btn btn-white btn-file">
										<span class="fileinput-new">Pilih Gambar</span>
										<span class="fileinput-exists">Ganti</span>
										<input type="file" name="gambar" accept="image/*">
									</span>

									<span class="btn">
										@if ( !empty($Page->gambar) )
											<a href="#" class="hapus-gambar" data-dismiss="fileinput">Hapus</a>
										@else
											<a href="#" class="" data-dismiss="fileinput">Hapus</a>
										@endif
									</span>
								</div>
							</div>
						</div>
					</div>
				</li>

			</ul>

		</form>
		
	</div>
	
</div>
<hr>

@endsection

@section('registerscript')

	<script src="{{ url('resources/assets/admin/libs/ckeditor-full/ckeditor.js') }}"></script>
	<script src="{{ url('resources/assets/admin/libs/js/fileinput.js') }}"></script>

	<script>
		CKEDITOR.replace( 'editor' );
	</script>
	<script>
		$('.nav-page').addClass('opened');
		$('.nav-page ul li:nth-child(2)').addClass('active');
	</script>

	<script>

		$(function(){

			$('#simpan-draft').click(function(){
				$('#form-add #draft').attr('value','1');
				$('#form-add').submit();
			});

			$(".hapus-gambar").click(function(){

				$("#hapus-gambar_").val('1');

				$("#view-gambar").attr('src',"{{ url('resources/assets/admin/images/blank.png') }}");

			});

		});

		CKEDITOR.editorConfig = function( config ) {
			config.skin = 'bootstrapck';
			config.filebrowserBrowseUrl = '../../../resources/assets/admin/libs/filemanager/index.html';
	 		config.filebrowserImageBrowseUrl = '../../../resources/assets/admin/libs/filemanager/index.html' ;
		};

	</script>

@endsection