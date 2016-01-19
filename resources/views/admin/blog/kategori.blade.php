@extends('admin.layout.main')

@section('konten')
<div class="mail-env">
	
	
	<!-- Mail Body -->
	<div class="mail-body">
		
		<div class="mail-header">
			<!-- title -->
			<h3 class="mail-title">
				Semua Kategori
				<span class="count">({{ $Kategori->total() }})</span>
			</h3>
			
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
					<th width="99%">
						<div class="mail-select-options"><button class="btn btn-default btn-sm" id="hapus"><i class="fa fa-trash-o"></i>&nbsp; Hapus</button></div>
						<div class="mail-select-options"><button class="btn btn-default btn-sm" id="refresh" style="display:none" onclick="location.href='{{ route('kategori') }}'"><i class="fa fa-refresh"></i>&nbsp; Refresh</button></div>

						<div class="mail-pagination" colspan="2">
							<strong>{{ (( $Kategori->currentPage() -1 ) * $Kategori->perPage() ) + 1 }} - {{ $Kategori->perPage() }}</strong> <span>dari {{ $Kategori->total() }}</span>
							
							<div class="btn-group">
								<?php
									$Prev = $Kategori->currentPage() > 1 ? "kategori?page=".( $Kategori->currentPage() - 1)  : "#";
									$Next = $Kategori->hasMorePages() > 0 ? "kategori?page=".( $Kategori->currentPage() + 1)  : "#"
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

				@if ( $Kategori->total() < 1 )

					<tr class="alert-empty"><!-- empty -->
						<td colspan="2" align="center">
							Belum Ada Kategori
						</td>
					</tr>

				@else

					@foreach( $Kategori as $Kat )

						<tr class="unread" id="data-{{ $Kat->id }}"><!-- new email class: unread -->
							<td>
								<div class="checkbox checkbox-replace">
									<input type="checkbox" class="pilih" value="{{ $Kat->id }}" />
								</div>
							</td>
							<td class="col-name">
								<a href="#" data-id="{{ $Kat->id }}" data-kat="{{ $Kat->nama_kategori }}" data-target="#modal-edit-kategori" data-toggle="modal" class="col-name">{{ $Kat->nama_kategori }}</a>
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
			<a href="#" data-toggle="modal" data-target="#modal-kategori" class="btn btn-success btn-icon btn-block">
				Tambah Baru
				<i class="entypo-pencil"></i>
			</a>
		</div>

		<!-- menu -->
		<ul class="mail-menu">
			<li class="active">
				<a href="#">
					Semua Kategori
				</a>
			</li>
		</ul>
		
	</div>
	
</div>
<hr>

@endsection

@section('registerscript')

	<div class="modal fade" id="modal-kategori">
		<div class="modal-dialog">
			<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Tambah Kategori</h4>
					</div>
					
					<div class="modal-body">
						<input type="text" id="nama-kategori" class="form-control" placeholder="Tulis Kategori Baru disini">
					</div>
					
					<div class="modal-footer no-margin">
						<button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
						<button type="button" id="tambah-kategori" class="btn btn-success">Tambah</button>
					</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="modal-edit-kategori">
		<div class="modal-dialog">
			<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Edit Kategori</h4>
					</div>
					
					<div class="modal-body">
						<input type="hidden" name="id" id="id-kategori">
						<input type="text" id="nama-kategori-edit" class="form-control" placeholder="Tulis Kategori Baru disini">
					</div>
					
					<div class="modal-footer no-margin">
						<button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
						<button type="button" id="update-kategori" class="btn btn-success">Simpan</button>
					</div>
			</div>
		</div>
	</div>

	<script>
		$(".nav-blog").addClass("opened");
		$(".nav-blog ul li:nth-child(3)").addClass("active");

		var content = $(".table tbody tr td .checkbox").length;
		if (content == 0) {
			$(".alert-empty").show();
		};

		$("#tambah-kategori").click(function(){

			$(this).html("<i class='fa fa-spinner fa-spin'></i>");
			var kategori = $("#nama-kategori").val();
			var route = "{{ route('kategori_simpan') }}";

			if ( kategori == "" ) {
				$("#nama-kategori").focus();
				$("#tambah-kategori").html("Tambah");
			} else {


				$.ajax({
					url: route,
					type: "POST",
					headers: { "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content") },	
					dataType: "html",
					data: {kategori : kategori},
					error: function(jqXHR, textStatus, errorThrown) {
						alert(textStatus+" : "+errorThrown);
					},
					success: function(data){
						if ( data.trim() != 0 ) {
							$("#nama-kategori").val("");
							$("#tambah-kategori").html("Tambah");
							$("#modal-kategori").modal("hide");
							$("tbody").prepend(data);
							$("#refresh").show();
						} else {
							alert("Kategori Telah Ada");
							$("#tambah-kategori").html("Tambah");
						}
					}

				 });
				
			}

		});

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
			
			var konfir = ( confirm("Anda ingin menghapus data ini..?") );
			if ( konfir == true ) {

				var route = "{{ route('kategori_hapus') }}";
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


		$("#modal-edit-kategori").on("show.bs.modal", function (event) {
			
			var dt = $(event.relatedTarget);
			var id = dt.data("id");
			var kat = dt.data("kat");

			var modal = $(this);

			modal.find("#id-kategori").val(id);
			modal.find("#nama-kategori-edit").val(kat);
			
		});

		$("#update-kategori").click(function(){

			$(this).html("<i class='fa fa-spinner fa-spin'></i>");
			var id = $("#id-kategori").val();
			var kategori = $("#nama-kategori-edit").val();
			var route = "{{ route('kategori_update') }}";

			if ( kategori == "" ) {
				$("#nama-kategori").focus();
				$("#update-kategori").html("Simpan");
			} else {


				$.ajax({
					url: route,
					type: "POST",
					headers: { "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content") },	
					dataType: "html",
					data: {kategori : kategori, id : id},
					error: function(jqXHR, textStatus, errorThrown) {
						alert(textStatus+" : "+errorThrown);
					},
					success: function(data){

						if ( data.trim() != "0" ) {
							$("#nama-kategori").val("");
							$("#update-kategori").html("Simpan");
							$("#modal-edit-kategori").modal("hide");
							$("#data-"+data+" .col-name a").text(kategori);
							$("#data-"+data).addClass("highlight");
						} else {
							alert("Kategori Telah Ada");
							$("#update-kategori").html("Simpan");
						}
					}

				 });
				
			}

		});

	</script>

@endsection