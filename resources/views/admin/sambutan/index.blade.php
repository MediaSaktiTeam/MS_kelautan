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
			
<h2>Sambutan
	<div class="pull-right">
		<a href="{{ route('sambutan_add') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
	</div>
</h2>
<br />

@if ( Session::has('success') ) 
	@include('admin/layout/inc/alert-sukses', ['message' => session('success')])
@endif

<form role="form" method="post" enctype="multipart/form-data" class="form-horizontal form-groups-bordered validate" action="{{ route('sambutan_update') }}">
	
	{{ csrf_field() }}

	<div class="row">
		<?php $i = 1 ?>
		@foreach( $sambutan as $sb)

			<div class="col-md-6">
				
				<div class="panel panel-primary" data-collapsed="0">
					
					<div class="panel-body">

						<h3>Sambutan {{ $i }}
							<div class="pull-right">
								<a href="{{ route('sambutan_truncate', $sb->id) }}" onclick="return confirm('Anda ingin mengosongkan sambutan {{ $i }}')" class="btn btn-warning btn-sm">Kosongkan Sambutan {{ $i }}</a> 
								<a href="{{ route('sambutan_delete', $sb->id) }}" onclick="return confirm('Anda ingin menghapus sambutan {{ $i }}')" title="Hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a> 
							</div>
						</h3>
						
						<div class="col-md-12">

							<input type="hidden" name="id[]" value="{{ $sb->id }}">
							<div class="form-group">
								<label for="field-1" class="control-label">Nama</label>
								<input type="text" class="form-control" name="nama[]" value="{{ $sb->nama }}">
							</div>
							<div class="form-group">
								<label for="field-1" class="control-label">NIP</label>
								<input type="text" class="form-control" name="nip[]" value="{{ $sb->nip }}">
							</div>
							<div class="form-group">
								<label for="field-1" class="control-label">Jabatan</label>
								<input type="text" class="form-control" name="jabatan[]" value="{{ $sb->jabatan }}">
							</div>

							<div class="form-group">
								<label for="field-1" class="control-label">Tanggal</label>
								<input type="text" class="form-control" name="tgl[]" value="{{ $sb->tgl }}">
							</div>
							
							<div class="form-group">
								<label for="field-2" class="control-label">Deskripsi</label>
								<textarea class="form-control" name="deskripsi[]" id="field-2">{{ $sb->deskripsi }}</textarea>
								<p><i>Potongan Paragraf Pertama</i></p>
							</div>

							<div class="form-group">
								<label for="field-2" class="control-label">Sambutan</label>
								<textarea name="sambutan[]" id="editor{{ $i }}">
									{{ $sb->sambutan }}
								</textarea>
							</div>
							
							<div class="form-group">
								<label class="control-label">Gambar</label>
								
								<input type="file" name="gambar[]" class="btn btn-default">	
								@if ( !empty( $sb->foto ) )					
									<br>
									<img src="/resources/assets/img/sambutan/{{ $sb->foto }}" width="50%">
								@endif

							</div>

						</div>
				
					</div>
				
				</div>
			
			</div>

			@if ( $i % 2 == 0 )
				<div class="clearfix"></div><hr>
			@endif

			@php($i++)
		@endforeach

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
		@foreach( $sambutan as $sb)
			CKEDITOR.replace( 'editor{{ $sb->id }}' );
		@endforeach
		
	</script>
	<script>
		$('.nav-page').addClass('opened');
		$('.nav-page ul li:nth-child(3)').addClass('active');
	</script>
@endsection