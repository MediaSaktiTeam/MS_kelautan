@extends('admin.layout.main')

@section('konten')

<div class="mail-env">
	
	
	<!-- Mail Body -->
	<div class="mail-body">
		
		<div class="mail-header">
			<!-- title -->
			<h3 class="col-md-5 no-margin">
				Sunting Berita
			</h3>
			
			<!-- links -->
			@if ( $Blog->arsip != 1 )
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
		
			<form method="post" id="form-add" enctype="multipart/form-data" role="form" action="{{ route('blog_update', [$Blog->id]) }}">

				<input type="hidden" name="draft" id="draft" value="0">

				<input type="hidden" name="kategori" value="" id="kategori">

				<input type="hidden" name="gambar_" value="{{ $Blog->gambar }}" id="gambar_">

				<input type="hidden" name="hapus_gambar" value="0" id="hapus-gambar_">

				{{ csrf_field() }}
				
				<div class="form-group">
					<label for="to">Judul Berita:</label>
					<input type="text" name="judul" class="form-control post-title" id="to" tabindex="1" value="{{ $Blog->judul }}" />
				</div>
				
				
				<div class="compose-message-editor">
					<textarea name="konten" id="editor">
					{{ $Blog->konten }}
					</textarea>
				</div>

				<br>
				<br>

				<div class="row">
					<label class="col-sm-12 control-label">Kata Kunci Pencarian</label>
					
					<div class="col-sm-12">
						
						<input type="text" name="tags" value="{{ $Blog->tag }}" class="form-control tagsinput" />
						<p><i>Kata kunci akan membantu pengunjung menemukan berita ini di Google.</i></p>
						
					</div>
				</div>
				
		
		</div>
	</div>
	
	<!-- Sidebar -->
	<div class="mail-sidebar">
		
			<!-- compose new email button -->
			<div class="mail-sidebar-row hidden-xs">
				<button class="btn btn-success btn-icon btn-block" onclick="get_kategori_value()">
					{{ $Blog->draft == 0 && $Blog->arsip == 0 ? 'Simpan' : 'Publikasikan' }}
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
									@if ( !empty($Blog->gambar) )
										<img width="150" src="<?= url("resources/assets/img/blog/$Blog->gambar") ?>" id="view-gambar" alt="...">
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
										@if ( !empty($Blog->gambar) )
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
				
				<li class="custom">
					<div class="panel panel-primary" data-collapsed="0">
						<div class="panel-heading">
							<div class="panel-title">
								Kategori
							</div>
						</div>
						<div class="panel-body">
							<span id="container-kategori">
								<i class="fa fa-spinner fa-spin"></i>
							</span>

							<hr>

							<a href="javascript:;" onclick="jQuery('#modal-kategori').modal('show');"><i class="entypo-plus"></i>Kategori Baru</a>
						</div>
					</div>
				</li>
			</ul>

		</form>
		
	</div>
	
</div>
<hr>

@endsection

@section('head')
	<link href="{{ url('resources/assets/admin/libs/icheck-1.x/skins/all.css') }}" rel="stylesheet">
@endsection

@section('registerscript')

	<!-- Modal 1 (Basic)-->
	<div class='modal fade' id='modal-kategori'>
		<div class='modal-dialog'>
			<div class='modal-content'>
					<div class='modal-header'>
						<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
						<h4 class='modal-title'>Tambah Kategori</h4>
					</div>
					
					<div class='modal-body'>
						<input type='text' id='nama-kategori' class='form-control' placeholder='Tulis Kategori Baru disini'>
					</div>
					
					<div class='modal-footer no-margin'>
						<button type='button' class='btn btn-default' data-dismiss='modal'>Kembali</button>
						<button type='button' id='tambah-kategori' class='btn btn-success'>Tambah</button>
					</div>
			</div>
		</div>
	</div>

	<script src="{{ url('resources/assets/admin/libs/ckeditor-full/ckeditor.js') }}"></script>
	<script src="{{ url('resources/assets/admin/libs/js/fileinput.js') }}"></script>
	<script src="{{ url('resources/assets/admin/libs/icheck-1.x/icheck.js?v=1.0.2') }}"></script>

	<script>
		CKEDITOR.replace( 'editor' );
	</script>
	<script>
		$('.nav-blog').addClass('opened');
		$('.nav-blog ul li:nth-child(1)').addClass('active');
	</script>

	<script>
			function get_kategori_value(){			  
			    var e = '';
			    $('.checkbox-ion input.kategori:checked').each(function() {
			        e = e + $(this).val();
			        e = e+',';
			    });
			    $('#kategori').val(e);
			}
		$(function(){

			function get_kategori(){
				$.get("{{ route('get_kategori_edit', [$Blog->id ]) }}", function(data){
					$('#container-kategori').html(data);
				});
			}

			get_kategori();

			$('#simpan-draft').click(function(){
				get_kategori_value();
				$('#form-add #draft').attr('value','1');
				$('#form-add').submit();
			});

			$('#tambah-kategori').click(function(){

				var kategori = $('#nama-kategori').val();
				var route = "{{ route('tambah_kategori') }}";

				$(this).html("<i class='fa fa-spinner fa-spin'></i>");

				if ( kategori == '' ) {
					$('#nama-kategori').focus();
					$("#tambah-kategori").html("Tambah");
				} else {


					$.ajax({
						url: route,
						type: 'POST',
						headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },	
						dataType: 'html',
						data: {kategori : kategori},
						error: function(jqXHR, textStatus, errorThrown) {
							alert(textStatus+' : '+errorThrown);
						},
						success: function(data){
							var data1 = jQuery.parseJSON(data);
							
							var id_ = data1.id;

							if ( id_ != 0 ) {

								get_kategori();
								$('#nama-kategori').val('');
								$('#modal-kategori').modal('hide');
							} else {
								alert('Kategori Telah Ada');
							}
						}

					 });
					
				}

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