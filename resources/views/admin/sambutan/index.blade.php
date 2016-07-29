@extends('admin.layout.main')

@section('konten')

<ol class="breadcrumb bc-3">
	<li>
		<a href="{{ url('admin') }}">Beranda</a>
	</li>

	<li class="active">
		<strong>Sambutan</strong>
	</li>
</ol>
			
<h2>Sambutan</h2>
<br />

@if ( Session::has('success') ) 
	@include('admin/layout/inc/alert-sukses', ['message' => session('success')])
@endif

<form role="form" method="post" enctype="multipart/form-data" class="form-horizontal form-groups-bordered validate" action="{{ route('sambutan_update') }}">
	
	{{ csrf_field() }}

	<div class="row">
		<div class="col-md-6">
			
			<div class="panel panel-primary" data-collapsed="0">
				
				<div class="panel-body">

					<h3>Sambutan 1</h3>
					
					<div class="col-md-12">

						<div class="form-group">
							<label for="field-1" class="control-label">Nama</label>
							<input type="text" class="form-control" name="nama" value="{{ $bupati->nama }}" data-validate="required" data-message-required="Wajib diisi">
						</div>
						<div class="form-group">
							<label for="field-1" class="control-label">NIP</label>
							<input type="text" class="form-control" name="nip" value="{{ $bupati->nip }}">
						</div>
						<div class="form-group">
							<label for="field-1" class="control-label">Jabatan</label>
							<input type="text" class="form-control" name="jabatan" value="{{ $bupati->jabatan }}" data-validate="required" data-message-required="Wajib diisi">
						</div>

						<div class="form-group">
							<label for="field-1" class="control-label">Tanggal</label>
							<input type="text" class="form-control" name="tgl" value="{{ $bupati->tgl }}" data-validate="required" data-message-required="Wajib diisi">
						</div>
						
						<div class="form-group">
							<label for="field-2" class="control-label">Deskripsi</label>
							<textarea class="form-control" name="deskripsi" id="field-2" data-validate="required" data-message-required="Wajib diisi">{{ $bupati->deskripsi }}</textarea>
							<p><i>Potongan Paragraf Pertama</i></p>
						</div>

						<div class="form-group">
							<label for="field-2" class="control-label">Sambutan</label>
							<textarea name="sambutan" id="editor">
								{{ $bupati->sambutan }}
							</textarea>
						</div>
						
						<div class="form-group">
							<label class="control-label">Gambar</label>
							
							<input type="file" name="gambar" class="btn btn-default">	
							@if ( !empty( $bupati->foto ) )					
								<br>
								<img src="/resources/assets/img/sambutan/{{ $bupati->foto }}" width="50%">
							@endif

						</div>

					</div>
			
				</div>
			
			</div>
		
		</div>

		<div class="col-md-6">
			
			<div class="panel panel-primary" data-collapsed="0">
				
				<div class="panel-body">

					<h3>Sambutan 2</h3>
					
					<div class="col-md-12">

						<div class="form-group">
							<label for="field-1" class="control-label">Nama</label>
							<input type="text" class="form-control" name="nama2" value="{{ $kadis->nama }}" data-validate="required" data-message-required="Wajib diisi">
						</div>
						<div class="form-group">
							<label for="field-1" class="control-label">NIP</label>
							<input type="text" class="form-control" name="nip2" value="{{ $kadis->nip }}">
						</div>
						<div class="form-group">
							<label for="field-1" class="control-label">Jabatan</label>
							<input type="text" class="form-control" name="jabatan2" value="{{ $kadis->jabatan }}" data-validate="required" data-message-required="Wajib diisi">
						</div>

						<div class="form-group">
							<label for="field-1" class="control-label">Tanggal</label>
							<input type="text" class="form-control" name="tgl2" value="{{ $kadis->tgl }}" data-validate="required" data-message-required="Wajib diisi">
						</div>
						
						<div class="form-group">
							<label for="field-2" class="control-label">Deskripsi</label>
							<textarea class="form-control" name="deskripsi2" id="field-2" data-validate="required" data-message-required="Wajib diisi">{{ $kadis->deskripsi }}</textarea>
							<p><i>Potongan Paragraf Pertama</i></p>
						</div>

						<div class="form-group">
							<label for="field-2" class="control-label">Sambutan</label>
							<textarea name="sambutan2" id="editor2">
								{{ $kadis->sambutan }}
							</textarea>
						</div>

						<div class="form-group">
							<label class="control-label">Gambar</label>
								
							<input type="file" name="gambar2" class="btn btn-default">	
							@if ( !empty( $bupati->foto ) )					
								<br>
								<img src="/resources/assets/img/sambutan/{{ $kadis->foto }}" width="50%">
							@endif

						</div>

					</div>
	
				</div>
			
			</div>
		
		</div>

	</div>

	<div class="col-md-12">
		<div class="form-group">
			<center>
			<button type="submit" class="btn btn-success">Simpan Perubahan</button>
			</center>
		</div>		
	</div>
</form>

@endsection

@section('registerscript')
	<script src="{{ url('resources/assets/admin/libs/ckeditor-full/ckeditor.js') }}"></script>

	<script>
		CKEDITOR.editorConfig = function( config ) {
			config.toolbar = [ { name : 'basicstyles', items: ['Bold','Italic'] } ];
			config.skin = 'bootstrapck';
		}
		CKEDITOR.replace( 'editor' );
		CKEDITOR.replace( 'editor2' );
	</script>
	<script>
		$('.nav-page').addClass('opened');
		$('.nav-page ul li:nth-child(3)').addClass('active');
	</script>
@endsection