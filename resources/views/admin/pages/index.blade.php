@extends('admin.layout.main')

@section('konten')

<div class="mail-env">
	
	
	<!-- Mail Body -->
	<div class="mail-body">
		
		<div class="mail-header">
			<!-- title -->
			<h3 class="mail-title">
			@if ( isset( $Cari ) && $Pages->total() > 0 )
				Menemukan {{ $Pages->total() }} halaman dengan kata kunci <b> {{ $_GET['cari'] }} </b>
			@elseif ( isset( $Cari ) && $Pages->total() < 1 )
				Tidak menemukan halaman dengan kata kunci <b> {{ $_GET['cari'] }} </b>
			@else
				Semua Halaman
				<span class="count">({{ $Pages->total() }})</span>
			@endif
			</h3>
			
			<!-- search -->
			<form method="get" role="form" action="{{ route('page_cari') }}" id="form-cari" class="mail-search">
				<div class="input-group">
					<input type="text" class="form-control" id="cari" name="cari" placeholder="Cari halaman..." />
					
					<div class="input-group-addon">
						<i class="entypo-search"></i>
					</div>
				</div>
			</form>
		</div>
		
		
		<!-- mail table -->
		<table class="table mail-table">
			<!-- mail table header -->
			<thead>
				<tr>
					<th width="1%">
						<div class="checkbox checkbox-replace">
							<input type="checkbox" />
						</div>
					</th>
					<th colspan="3">
						
						<div class="mail-select-options"><button class="btn btn-default btn-sm" id="hapus-page"><i class="fa fa-trash-o"></i>&nbsp; Hapus</button></div>
						
						@if ( $Status == "All" )
							<div class="mail-select-options"><button class="btn btn-default btn-sm" id="arsip-page"><i class="entypo-archive"></i>&nbsp; Arsipkan</button></div>
							<div class="mail-select-options"><button class="btn btn-default btn-sm" id="draft-page"><i class="entypo-install"></i>&nbsp; Pindah ke Draf</button></div>
						@endif

						@if ( $Status == "Arsip" )
							<div class="mail-select-options"><button class="btn btn-default btn-sm" id="publish-page"><i class="entypo-publish"></i>&nbsp; Publikasikan</button></div>
						@endif

						@if ( $Status == "Draft" )
							<div class="mail-select-options"><button class="btn btn-default btn-sm" id="arsip-page"><i class="entypo-archive"></i>&nbsp; Arsipkan</button></div>
							<div class="mail-select-options"><button class="btn btn-default btn-sm" id="publish-page"><i class="entypo-publish"></i>&nbsp; Publikasikan</button></div>
						@endif


						<div class="mail-pagination" colspan="2">
							<strong>{{ (( $Pages->currentPage() -1 ) * $Pages->perPage() ) + 1 }} - {{ $Pages->perPage() * $Pages->currentPage() }}</strong> <span>dari {{ $Pages->total() }}</span>
							
							<div class="btn-group">
								<?php
								
									$LinkPage = isset( $Cari ) ? "cari?cari=$Cari&page=" : "page?page=";
									$Prev = $Pages->currentPage() > 1 ? $LinkPage.( $Pages->currentPage() - 1)  : "#";
									$Next = $Pages->hasMorePages() > 0 ? $LinkPage.( $Pages->currentPage() + 1)  : "#";
								
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

				@if ( $Pages->total() < 1 )

					<tr class="alert-empty"><!-- empty -->
						<td colspan="4" align="center">
							{{ isset( $Cari ) ? 'Tidak menemukan halaman' : 'Kosong' }}
						</td>
					</tr>

				@else

					@foreach( $Pages as $Page )

						<tr class="unread" id="data-{{ $Page->id }}"><!-- new email class: unread -->
							<td>
								<div class="checkbox checkbox-replace">
									<input type="checkbox" class="pilih" value="{{ $Page->id }}" />
								</div>
							</td>
							<td class="col-name">
								<a href="{{ route('page_edit', $Page->id) }}" class="col-name">{{ $Page->judul }}</a>
							</td>
							<td class="col-time">
								<?php echo explode(' ',$Page->created_at)[0]; ?>
							</td>
						</tr>
					@endforeach

				@endif
				
			</tbody>
		</table>
	</div>
	
	<!-- Sidebar -->
	<div class="mail-sidebar">
		
		<!-- compose new email button -->
		<div class="mail-sidebar-row hidden-xs">
			<a href="{{ route('page_tambah') }}" class="btn btn-success btn-icon btn-block">
				Tambah Baru
				<i class="entypo-pencil"></i>
			</a>
		</div>

		<!-- menu -->
		<ul class="mail-menu">
			<li class="{{ $Status == 'All' ? 'active':'' }}">
				<a href="{{ route('page') }}">
					Semua halaman
				</a>
			</li>
			
			<li class="{{ $Status == 'Draft' ? 'active':'' }}">
				<a href="{{ route('page_draft') }}">
					@if ( $JmlDraft > 0 )
						<span class="badge badge-gray pull-right">{{ $JmlDraft }}</span>
					@endif
					Draf
				</a>
			</li>
			
			<li class="{{ $Status == 'Arsip' ? 'active':'' }}">
				<a href="{{ route('page_arsip') }}">
					@if ( $JmlArsip > 0 )
						<span class="badge badge-gray pull-right">{{ $JmlArsip }}</span>
					@endif
					Arsip
				</a>
			</li>
		</ul>
		
	</div>
	
</div>
<hr>

@endsection

@section('registerscript')

	<script>
		$(".nav-page").addClass("opened");
		$(".nav-page ul li:nth-child(1)").addClass("active");

		var content = $(".table tbody tr td .checkbox").length;
		if (content == 0) {
			$(".alert-empty").show();
		};


		$("#hapus-page").click(function(){
			
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
			
			var konfir = ( confirm("Anda ingin menghapus data ini..?") );
			if ( konfir == true ) {

				var route = "{{ route('page_hapus') }}";
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
						$("#hapus-page").html("<i class='fa fa-trash-o'></i>&nbsp; Hapus");
						$("#hapus-page").removeClass("disabled");

						var array = id.split(",");

						$.each(array,function(i){
							$("#data-"+array[i]).remove();
						});
					},
					error: function(jqXHR, textStatus, errorThrown) {
						$("#hapus-page").html("<i class='fa fa-trash-o'></i>&nbsp; Hapus");
						$("#hapus-page").removeClass("disabled");
						alert(textStatus+","+errorThrown);
					}
				});
			}
		});

		$("#draft-page").click(function(){
			
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
			
			var konfir = ( confirm("Anda ingin memindahkan data ini ke Draft..?") );
			if ( konfir == true ) {

				var route = "{{ route('page_draft') }}";
				var token = $("meta[name='csrf-token']").attr("content");

				$(this).html("<i class='fa fa-spinner fa-spin'></i>&nbsp; Pindahkan ke Draft");
				$(this).addClass("disabled");		

				$.ajax({
					url: route,
					type: "POST",
					headers: { "X-CSRF-TOKEN": token },	
					dataType: "html",
					data: {id : id},
					success: function(data){
						$("#draft-page").html("<i class='entypo-install'></i>&nbsp; Pindahkan ke Draft");
						$("#draft-page").removeClass("disabled");

						var array = id.split(",");
						
						$.each(array,function(i){
							$("#data-"+array[i]).remove();
						});
					},
					error: function(jqXHR, textStatus, errorThrown) {
						$("#draft-page").html("<i class='entypo-install'></i>&nbsp; Pindahkan ke Draft");
						$("#draft-page").removeClass("disabled");
						alert(textStatus+","+errorThrown);
					}
				});
			}
		});

		$("#arsip-page").click(function(){
			
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
			
			var konfir = ( confirm("Anda ingin mengarsipkan data ini..?") );
			if ( konfir == true ) {

				var route = "{{ route('page_arsip') }}";
				var token = $("meta[name='csrf-token']").attr("content");

				$(this).html("<i class='fa fa-spinner fa-spin'></i>&nbsp; Arsipkan");
				$(this).addClass("disabled");		

				$.ajax({
					url: route,
					type: "POST",
					headers: { "X-CSRF-TOKEN": token },	
					dataType: "html",
					data: {id : id},
					success: function(data){
						$("#arsip-page").html("<i class='entypo-archive'></i>&nbsp; Arsipkan");
						$("#arsip-page").removeClass("disabled");

						var array = id.split(",");
						
						$.each(array,function(i){
							$("#data-"+array[i]).remove();
						});
					},
					error: function(jqXHR, textStatus, errorThrown) {
						$("#arsip-page").html("<i class='entypo-archive'></i>&nbsp; Arsipkan");
						$("#arsip-page").removeClass("disabled");
						alert(textStatus+","+errorThrown);
					}
				});
			}
		});

		$("#publish-page").click(function(){
			
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
			
			var konfir = ( confirm("Anda ingin mempublikasikan data ini..?") );
			if ( konfir == true ) {

				var route = "{{ route('page_publish') }}";
				var token = $("meta[name='csrf-token']").attr("content");

				$(this).html("<i class='fa fa-spinner fa-spin'></i>&nbsp; Publikasikan");
				$(this).addClass("disabled");		

				$.ajax({
					url: route,
					type: "POST",
					headers: { "X-CSRF-TOKEN": token },	
					dataType: "html",
					data: {id : id},
					success: function(data){
						$("#publish-page").html("<i class='entypo-publish'></i>&nbsp; Publikasikan");
						$("#publish-page").removeClass("disabled");

						var array = id.split(",");
						
						$.each(array,function(i){
							$("#data-"+array[i]).remove();
						});
					},
					error: function(jqXHR, textStatus, errorThrown) {
						$("#publish-page").html("<i class='entypo-publish'></i>&nbsp; Publikasikan");
						$("#publish-page").removeClass("disabled");
						alert(textStatus+","+errorThrown);
					}
				});
			}
		});

		$("#form-cari").submit(function(){
			var cari = $("#cari").val();
			if ( cari == "" ) {
				return false;
			}
		});
	</script>

@endsection