@extends('admin.layout.main')

@section('konten')

<ol class="breadcrumb bc-3">
	<li>
		<a href="{{ url('admin') }}">Beranda</a>
	</li>

	<li class="active">
		<strong>Pengaturan</strong>
	</li>
</ol>
			
<h2>Pengaturan</h2>
<br />

@if ( Session::has('success') ) 
	@include('admin/layout/inc/alert-sukses', ['message' => session('success')])
@endif

<form role="form" method="post" enctype="multipart/form-data" class="form-horizontal form-groups-bordered validate" action="{{ route('setting_update', ['id' => 1]) }}">
	
	{{ csrf_field() }}

	<div class="row">
		<div class="col-md-12">
			
			<div class="panel panel-primary" data-collapsed="0">
				
				<div class="panel-body">
					
						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">Nama Situs</label>
							
							<div class="col-sm-5">
								<input type="text" class="form-control" name="sitename" value="{{ $Set->sitename }}" data-validate="required" data-message-required="Wajib diisi">
							</div>
						</div>
						
						<div class="form-group">
							<label for="field-2" class="col-sm-3 control-label">Deskripsi Situs</label>
							
							<div class="col-sm-5">
								<textarea class="form-control" name="description" id="field-2" data-validate="required" data-message-required="This is custom message for required field.">{{ $Set->description }}</textarea>
								<br>
								<p><i>Jelaskan tentang apa situs ini dengan singkat.</i></p>
							</div>
						</div>

						<div class="form-group">
							<label for="field-4" class="col-sm-3 control-label">Alamat email</label>
							
							<div class="col-sm-5">
								<input type="text" class="form-control" id="field-4" value="{{ $Set->email }}" name="email" data-validate="required" data-message-required="Wajib diisi">
								<br>
								<p><i>Alamat ini digunakan untuk tujuan admin, seperti pesan masuk.</i></p>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label">Kata Kunci Pencarian</label>
							
							<div class="col-sm-5">
								
								<input type="text" name="tag" value="{{ $Set->tag }}" class="form-control tagsinput" />
								<p><i>Kata kunci akan membantu pengunjung menemukan website ini di Google.</i></p>
								
							</div>
						</div>

						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">Social setting</label>
							
							<div class="col-sm-5">
								<div class="input-group">
									<span class="input-group-addon">&nbsp;<i class="fa fa-facebook"></i>&nbsp;</span>
									<input type="text" class="form-control" name="fb" value="{{ $Set->fb }}">
								</div>
								<br>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-twitter"></i></span>
									<input type="text" class="form-control" name="twitter" value="{{ $Set->twitter }}">
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Gambar Utama</label>
							
							<div class="col-sm-5">
								
								<input type="file" name="gambar" class="btn btn-default">	
								@if ( !empty( $Set->gambar_utama ) )					
									<br>
									<img src="{{ url(Config::get('config.img_loc')) }}/{{ $Set->gambar_utama }}" width="50%">
								@endif
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-5">
								<button type="submit" class="btn btn-success">Simpan Perubahan</button>
								<button type="reset" onclick="location.href='{{ route('setting_refresh') }}'"class="btn">Kembalikan Perubahan</button>
							</div>
						</div>					
				</div>
			
			</div>
		
		</div>
	</div>

</form>

@endsection

@section('registerscript')
	<script>
		$('.nav-setting').addClass('active');
	</script>
@endsection