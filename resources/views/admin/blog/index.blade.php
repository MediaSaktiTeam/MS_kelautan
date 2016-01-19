@extends('admin.layout.main')

@section('konten')

<div class="mail-env">
	
	
	<!-- Mail Body -->
	<div class="mail-body">
		
		<div class="mail-header">
			<!-- title -->
			<h3 class="mail-title">
			@if ( isset( $Cari ) && $Blogs->total() > 0 )
				Menemukan {{ $Blogs->total() }} berita dengan kata kunci <b> {{ $_GET['cari'] }} </b>
			@elseif ( isset( $Cari ) && $Blogs->total() < 1 )
				Tidak menemukan berita dengan kata kunci <b> {{ $Cari }} </b>
			@else
				Semua Berita
				<span class="count">({{ $Blogs->total() }})</span>
			@endif
			</h3>
			
			<!-- search -->
			<form method="get" role="form" action="{{ route('blog_cari') }}" id="form-cari" class="mail-search">
				<div class="input-group">
					<input type="text" class="form-control" id="cari" name="cari" placeholder="Cari berita..." />
					
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
					<th colspan="3" width="99%">
						
						<div class="mail-select-options"><button class="btn btn-default btn-sm" id="hapus-blog"><i class="fa fa-trash-o"></i>&nbsp; Hapus</button></div>
						
						@if ( $Status == "All" )
							<div class="mail-select-options"><button class="btn btn-default btn-sm" id="arsip-blog"><i class="entypo-archive"></i>&nbsp; Arsipkan</button></div>
							<div class="mail-select-options"><button class="btn btn-default btn-sm" id="draft-blog"><i class="entypo-install"></i>&nbsp; Pindah ke Draf</button></div>
						@endif

						@if ( $Status == "Arsip" )
							<div class="mail-select-options"><button class="btn btn-default btn-sm" id="publish-blog"><i class="entypo-publish"></i>&nbsp; Publikasikan</button></div>
						@endif

						@if ( $Status == "Draft" )
							<div class="mail-select-options"><button class="btn btn-default btn-sm" id="arsip-blog"><i class="entypo-archive"></i>&nbsp; Arsipkan</button></div>
							<div class="mail-select-options"><button class="btn btn-default btn-sm" id="publish-blog"><i class="entypo-publish"></i>&nbsp; Publikasikan</button></div>
						@endif


						<div class="mail-pagination" colspan="2">
							<strong>{{ (( $Blogs->currentPage() -1 ) * $Blogs->perPage() ) + 1 }} - {{ $Blogs->perPage() * $Blogs->currentPage() }}</strong> <span>dari {{ $Blogs->total() }}</span>
							
							<div class="btn-group">
								<?php

									$Prev = $Blogs->currentPage() > 1 ? $LinkPage.( $Blogs->currentPage() - 1)  : "#";
									$Next = $Blogs->hasMorePages() > 0 ? $LinkPage.( $Blogs->currentPage() + 1)  : "#";
								
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

				@if ( $Blogs->total() < 1 )

					<tr class="alert-empty"><!-- empty -->
						<td colspan="4" align="center">
							{{ isset( $Cari ) ? 'Tidak menemukan berita' : 'Kosong' }}
						</td>
					</tr>

				@else

					@foreach( $Blogs as $Blog )

						<tr class="unread" id="data-{{ $Blog->id }}"><!-- new email class: unread -->
							<td>
								<div class="checkbox checkbox-replace">
									<input type="checkbox" class="pilih" value="{{ $Blog->id }}" />
								</div>
							</td>
							<td class="col-name">
								<a href="{{ route('blog_edit', $Blog->id) }}" class="col-name">{{ $Blog->judul }}</a>
							</td>
							<td class="col-options">
								<?php

									$Kats = DB::table('site_kategori')
												->join('site_blog_kategori', 'site_kategori.id', '=', 'site_blog_kategori.id_kategori')
												->select('site_kategori.nama_kategori')
												->where('site_blog_kategori.id_blog', [$Blog->id])
												->get();
									$no = 1;
									$jml_kat = count($Kats);
									foreach( $Kats as $Kat ) {

										echo $Kat->nama_kategori;

										if ( $no < $jml_kat ) echo ", ";

										$no++;
									}

								?>
							</td>
							<td class="col-time">
								<?php echo explode(' ',$Blog->created_at)[0]; ?>
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
			<a href="{{ route('blog_tambah') }}" class="btn btn-success btn-icon btn-block">
				Tambah Baru
				<i class="entypo-pencil"></i>
			</a>
		</div>

		<!-- menu -->
		<ul class="mail-menu">
			<li class="{{ $Status == 'All' ? 'active':'' }}">
				<a href="{{ route('blog') }}">
					Semua Berita
				</a>
			</li>
			
			<li class="{{ $Status == 'Draft' ? 'active':'' }}">
				<a href="{{ route('blog_draft') }}">
					@if ( $JmlDraft > 0 )
						<span class="badge badge-gray pull-right">{{ $JmlDraft }}</span>
					@endif
					Draf
				</a>
			</li>
			
			<li class="{{ $Status == 'Arsip' ? 'active':'' }}">
				<a href="{{ route('blog_arsip') }}">
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
	$(".nav-blog").addClass("opened");
	$(".nav-blog ul li:nth-child(1)").addClass("active");

	var content = $(".table tbody tr td .checkbox").length;
	if (content == 0) {
		$(".alert-empty").show();
	};


	$("#hapus-blog").click(function(){
		
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

			var route = "{{ route('blog_hapus') }}";
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
					$("#hapus-blog").html("<i class='fa fa-trash-o'></i>&nbsp; Hapus");
					$("#hapus-blog").removeClass("disabled");

					var array = id.split(",");

					$.each(array,function(i){
						$("#data-"+array[i]).remove();
					});
				},
				error: function(jqXHR, textStatus, errorThrown) {
					$("#hapus-blog").html("<i class='fa fa-trash-o'></i>&nbsp; Hapus");
					$("#hapus-blog").removeClass("disabled");
					alert(textStatus+","+errorThrown);
				}
			});
		}
	});

	$("#draft-blog").click(function(){
		
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

			var route = "{{ route('blog_draft') }}";
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
					$("#draft-blog").html("<i class='entypo-install'></i>&nbsp; Pindahkan ke Draft");
					$("#draft-blog").removeClass("disabled");

					var array = id.split(",");
					
					$.each(array,function(i){
						$("#data-"+array[i]).remove();
					});
				},
				error: function(jqXHR, textStatus, errorThrown) {
					$("#draft-blog").html("<i class='entypo-install'></i>&nbsp; Pindahkan ke Draft");
					$("#draft-blog").removeClass("disabled");
					alert(textStatus+","+errorThrown);
				}
			});
		}
	});

	$("#arsip-blog").click(function(){
		
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

			var route = "{{ route('blog_arsip') }}";
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
					$("#arsip-blog").html("<i class='entypo-archive'></i>&nbsp; Arsipkan");
					$("#arsip-blog").removeClass("disabled");

					var array = id.split(",");
					
					$.each(array,function(i){
						$("#data-"+array[i]).remove();
					});
				},
				error: function(jqXHR, textStatus, errorThrown) {
					$("#arsip-blog").html("<i class='entypo-archive'></i>&nbsp; Arsipkan");
					$("#arsip-blog").removeClass("disabled");
					alert(textStatus+","+errorThrown);
				}
			});
		}
	});

	$("#publish-blog").click(function(){
		
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

			var route = "{{ route('blog_publish') }}";
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
					$("#publish-blog").html("<i class='entypo-publish'></i>&nbsp; Publikasikan");
					$("#publish-blog").removeClass("disabled");

					var array = id.split(",");
					
					$.each(array,function(i){
						$("#data-"+array[i]).remove();
					});
				},
				error: function(jqXHR, textStatus, errorThrown) {
					$("#publish-blog").html("<i class='entypo-publish'></i>&nbsp; Publikasikan");
					$("#publish-blog").removeClass("disabled");
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