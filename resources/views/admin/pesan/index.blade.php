@extends('admin.layout.main')

@section('konten')

<ol class="breadcrumb bc-3">
	<li>
		<a href="{{ url('admin') }}">Beranda</a>
	</li>

	<li class="active">
		<strong>Pesan Masuk</strong>
	</li>
</ol>
			
<h2>{{ $Tipe == "Masuk" ? "Pesan Masuk":"Pesan Terkirim" }}</h2>

<hr>
<div class="mail-env">

	<!-- compose new email button -->
	<div class="mail-sidebar-row visible-xs">
		<a href="{{ route('pesan_tulis') }}" class="btn btn-success btn-icon btn-block">
			Tulis Pesan
			<i class="entypo-pencil"></i>
		</a>
	</div>
	
	
	<!-- Mail Body -->
	<div class="mail-body">
		
		@if ( $Hal == "" )
			<div class="mail-header">
				<!-- title -->
				<h3 class="mail-title">
				@if ( isset( $Cari ) )
					@if ( $Pesan->total() > 0 )
						Menemukan <span class="count">{{ $Pesan->total() }}</span> pesan dengan kata kunci <b>{{ $Cari }}</b>
					@else
						Tidak menemukan pesan dengan kata kunci <b>{{ $Cari }}</b>
					@endif
				@else
						{{ $Tipe == 'Masuk' ? 'Pesan Masuk':'Pesan Terkirim' }}
						<span class="count">({{ $Pesan->total() }})</span>
				@endif
				</h3>

				<!-- search -->
				<form method="get" action="{{ route('pesan_cari') }}" role="form" class="mail-search">
					<div class="input-group">
						<input type="hidden" name="tipe" value="{{ $Tipe }}">
						<input type="text" class="form-control" name="cari" placeholder="Cari pesan {{ $Tipe }}..." />
						
						<div class="input-group-addon">
							<i class="entypo-search"></i>
						</div>
					</div>
				</form>
			</div>
		@endif
		
		@if ( Session::has('success') )
			@include('admin/layout/inc/alert-sukses', ['message' => Session::get('success')]);
		@endif

		<?php

		switch( $Hal ) :

		case "": ?>

			<!-- mail table -->
			<table class="table mail-table">
				<!-- mail table header -->
				<thead>
					<tr>
						<th width="5%">
							<div class="checkbox checkbox-replace">
								<input type="checkbox" />
							</div>
						</th>
						<th colspan="4">
							
							<div class="mail-select-options"><button class="btn btn-default btn-sm" id="hapus"><i class="fa fa-trash-o"></i>&nbsp; Hapus</button></div>
							<div class="mail-select-options"><button class="btn btn-default btn-sm" id="dibaca"><i class="fa fa-check"></i>&nbsp; Tandai Semua Sudah Dibaca</button></div>
							
							<div class="mail-pagination" colspan="2">
								<strong>
									{{ (( $Pesan->currentPage() -1 ) * $Pesan->perPage() ) + 1 }} - {{ $Pesan->perPage() * $Pesan->currentPage() }}
								</strong> <span>dari {{ $Pesan->total() }}</span>
								
								<div class="btn-group">
									<?php
									
										$LinkPage = isset( $Cari ) ? "cari?tipe=$Tipe&cari=$Cari&page=" : "pesan?tipe=$Tipe&page=";
										$Prev = $Pesan->currentPage() > 1 ? $LinkPage.( $Pesan->currentPage() - 1)  : "#";
										$Next = $Pesan->hasMorePages() > 0 ? $LinkPage.( $Pesan->currentPage() + 1)  : "#";
									
									?>
									<a href="{{ $Prev }}" class="btn btn-sm btn-white"><i class="entypo-left-open"></i></a>
									<a href="{{ $Next }}" class="btn btn-sm btn-white"><i class="entypo-right-open"></i></a>
								</div>
							</div>
						</th>
					</tr>
				</thead>
				
				<!-- email list -->
				<tbody>

					@if ( $Pesan->total() < 1 )
						<tr><!-- empty -->
							<td colspan="4" align="center">
								{{ isset( $Cari ) ? 'Tidak menemukan pesan' : 'Kosong' }}
							</td>
						</tr>
					@endif

					@foreach( $Pesan as $Pes )
					<tr <?php echo $Pes->baru == 1 ? "class='unread'":""; ?> id="data-{{ $Pes->id }}">
						<td>
							<div class="checkbox checkbox-replace">
								<input class="pilih" type="checkbox" value="{{ $Pes->id }}" />
							</div>
						</td>
						<td class="col-name">
							<a href="{{ route('pesan_detail', ['id' => $Pes->id, 'tipe' => $Tipe]) }}" class="col-name">{{ $Tipe == "Masuk" ? $Pes->nama : $Pes->email }}</a>
						</td>
						<td class="col-subject">
							<a href="{{ route('pesan_detail', ['id' => $Pes->id, 'tipe' => $Tipe]) }}">
								{{ !empty( $Pes->subjek ) ? $Pes->subjek : 'Tidak ada subjek' }}
							</a>
						</td>
						<td class="col-options"></td>
						<td class="col-time">
							@if ( strtotime(explode(" ",$Pes->created_at)[0]) == strtotime(date('Y-m-d')) )
								{{ substr(explode(" ",$Pes->created_at)[1], 0,5) }}
							@else
								{{ explode(" ",$Pes->created_at)[0] }}
							@endif
						</td>
					</tr>
					@endforeach
				</tbody>
				
				<!-- mail table footer -->
				<tfoot>
					<tr>
						<th width="5%">
							<div class="checkbox checkbox-replace">
								<input type="checkbox" />
							</div>
						</th>
						<th colspan="4">
							
							<div class="mail-pagination" colspan="2">
								<strong>
									{{ (( $Pesan->currentPage() -1 ) * $Pesan->perPage() ) + 1 }} - {{ $Pesan->perPage() * $Pesan->currentPage() }}
								</strong> <span>dari {{ $Pesan->total() }}</span>
								
								<div class="btn-group">
									<a href="{{ $Prev }}" class="btn btn-sm btn-white"><i class="entypo-left-open"></i></a>
									<a href="{{ $Next }}" class="btn btn-sm btn-white"><i class="entypo-right-open"></i></a>
								</div>
							</div>
						</th>
					</tr>
				</tfoot>
			</table>

		<?php break; ?>

		<?php case "detail": ?>

			@include('admin.layout.inc.message-detail', ['Pes' => $Pes])

		<?php break; ?>


		<?php case "tulis": ?>

			@include('admin.layout.inc.message-tulis', ['To' => $To])

		<?php break; ?>


		<?php endswitch ?>

	</div>
	
	<!-- Sidebar -->
	<div class="mail-sidebar">
		
		<!-- compose new email button -->
		<div class="mail-sidebar-row hidden-xs">
			<a href="{{ route('pesan_tulis') }}" class="btn btn-success btn-icon btn-block">
				Tulis Pesan
				<i class="entypo-pencil"></i>
			</a>
		</div>
		
		<!-- menu -->
		<ul class="mail-menu">
			<li <?php echo $Tipe == "Masuk" ? "class='active'":""; ?>>
				<a href="{{ route('pesan') }}">
					@if ( $JmlPesanBaru > 0 )
						<span class="badge badge-danger pull-right">{{ $JmlPesanBaru }}</span>
					@endif
					Pesan Masuk
				</a>
			</li>
			
			<li <?php echo $Tipe == "Keluar" ? "class='active'":""; ?>>
				<a href="{{ route('pesan', ['tipe' => 'Keluar']) }}">
					@if ( $JmlPesanTerkirim > 0 )
						<span class="badge badge-gray pull-right">{{ $JmlPesanTerkirim }}</span>
					@endif
					Pesan Terkirim
				</a>
			</li>

		</ul>
		
		
	</div>
	
</div>

@endsection

@section('registerscript')

	<script>
		$(".nav-inbox").addClass("opened");
		$(".nav-inbox ul li:nth-child(1)").addClass("active");

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
			
			var konfir = ( confirm("Anda ingin menghapus pesan ini..?") );
			if ( konfir == true ) {

				var route = "{{ route('pesan_hapus') }}";
				var token = $("meta[name='csrf-token']").attr("content");

				$(this).html("<i class='fa fa-spinner fa-spin'></i>&nbsp; Hapus");
				$(this).addClass("disabled");		

				$.ajax({
					url: route,
					type: "POST",
					headers: { "X-CSRF-TOKEN": token },	
					dataType: "html",
					data: {id : id},
					success: function(data){
						$("#hapus").html("<i class='fa fa-trash-o'></i>&nbsp; Hapus");
						$("#hapus").removeClass("disabled");

						var array = id.split(",");

						$.each(array,function(i){
							$("#data-"+array[i]).remove();
						});
					},
					error: function(jqXHR, textStatus, errorThrown) {
						$("#hapus").html("<i class='fa fa-trash-o'></i>&nbsp; Hapus");
						$("#hapus").removeClass("disabled");
						alert(textStatus+","+errorThrown);
					}
				});
			}
		});

		$("#dibaca").click(function(){
			
			var route = "{{ route('pesan_read_all') }}";
			var token = $("meta[name='csrf-token']").attr("content");

			$.ajax({
				url: route,
				type: "POST",
				headers: { "X-CSRF-TOKEN": token },	
				dataType: "html",
				success: function(data){
					$("tbody tr").addClass("unread");
				},
				error: function(jqXHR, textStatus, errorThrown) {
					alert(textStatus+","+errorThrown);
				}
			});
		});
	</script>
	
@endsection