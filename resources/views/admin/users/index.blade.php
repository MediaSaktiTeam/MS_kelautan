@extends('admin.layout.main')

@section('konten')

<ol class="breadcrumb bc-3">
	<li>
		<a href="{{ route('user') }}">Beranda</a>
	</li>

	<li class="active">
		<strong>Pengguna</strong>
	</li>
</ol>
			
<h2>Pengguna</h2>
<br />


@if ( Session::has('success') ) 
	@include('admin/layout/inc/alert-sukses', ['message' => session('success')])
@endif

<div class="panel panel-primary">
	<div class="panel-heading">
		<div class="panel-title">Daftar Pengguna</div>
		
		<div class="panel-options">
			<a href="{{ route('user_tambah') }}" class="bg"><i class="entypo-plus"></i>Tambah Baru</a>
		</div>
	</div>
		
	<table class="table table-bordered table-responsive">
		<thead>
			<tr>
				<th>#</th>
				<th>Nama Lengkap</th>
				<th>Nama Pengguna</th>
				<th>Alamat Email</th>
				<th>Aksi</th>
			</tr>
		</thead>
		
		<tbody>

			<?php $no = 1; ?>

			@foreach( $Users as $User )

			<tr>
				<td>{{ $no }}</td>
				<td>{{ $User->name }} {{ Auth::User()->id == $User->id ? "(Anda)":"" }}</td>
				<td>{{ $User->username }}</td>
				<td>{{ $User->email }}</td>
				<td>
					@if ( Auth::User()->id != $User->id )
						<a href="#" data-toggle="modal" data-id="{{ $User->id }}" data-target="#modal-hapus" class="bg hapus"><i class="fa fa-trash-o"></i> &nbsp;Hapus</a>
					@endif
				</td>
			</tr>
			<?php $no++ ?>

			@endforeach
		</tbody>
	</table>

</div>

@endsection


@section('registerscript')

	<!-- Modal 1 (Basic)-->
	<div class='modal fade' id='modal-hapus'>
		<div class='modal-dialog'>
			<div class='modal-content'>

				<div class='modal-header'>
					<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
					<h4 class='modal-title'>Hapus Pengguna</h4>
				</div>
				
				<div class='modal-body'>
					Apakah Anda yakin menghapus pengguna ini?
				</div>
				
				<div class='modal-footer no-margin'>
					<button type='button' class='btn btn-default' data-dismiss='modal'>Kembali</button>
					<button type='button' id='hapus' class='btn btn-danger'>Hapus</button>
				</div>

			</div>
		</div>
	</div>

	<script>
		$('.nav-user').addClass('opened');
		$('.nav-user ul li:nth-child(1)').addClass('active');

		$(function(){
			$('.hapus').click(function(){
				var id = $(this).data('id');
				$('.modal #hapus').attr("onclick","location.href='{{ route('user_hapus') }}/"+id+"'");
			});
		});
	</script>

@endsection