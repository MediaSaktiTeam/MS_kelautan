@extends('admin.layout.main')

@section('title')
	Menu
@endsection

@section('konten')

<div class="row">

	<div class="col-md-12">
		<h2>Menu</h2>
		<br />
	</div>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<div class="panel-title">
				<table border="0">
					<tr>
						<td>Pilih menu yang akan di edit:&nbsp;&nbsp;&nbsp;</td>
						<td>
							<select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
								<option value="{{ route('menu', ['jenis' => 'Header']) }}" {{ $Jenis == "Header" ? "selected":"" }}>Header Menu</option>
								<option value="{{ route('menu', ['jenis' => 'Footer']) }}" {{ $Jenis == "Footer" ? "selected":"" }}>Footer Menu</option>
							</select>	
						</td>
					</tr>
				</table>
			</div>
		</div>

		<div class="panel-body">

			<div class="col-md-4">

				<div class="panel-group joined" id="menu-accord">

					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#menu-accord" href="#collapseOne-1">
									Kategori
								</a>
							</h4>
						</div>
						<div id="collapseOne-1" class="panel-collapse collapse in">
							<div class="panel-body" style="background:#fdfdfd;height:auto;max-height:200px;overflow-y:scroll;color:#444">
								@foreach( $Kategori as $Kat )
									<div class="checkbox checkbox-replace">
										<input type="checkbox" name="kategori[]" value="{{ $Kat->id }}" />
										<label>{{ $Kat->nama_kategori }}</label>
									</div>
									<br>
								@endforeach
							</div>

							<div class="panel-footer" style="background:#fff">
								<span class="parent-menu"></span>
								<br>
								<button class="btn btn-default col-md-12 tambah-menu" data-tipe="Kategori">Tambahkan ke menu <i class="entypo-right-open"></i></button>
							</div>

						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#menu-accord" href="#collapseOne-2">
									Halaman
								</a>
							</h4>
						</div>
						<div id="collapseOne-2" class="panel-collapse collapse">
							<div class="panel-body" style="background:#fdfdfd;height:auto;max-height:220px;overflow-y:scroll;color:#444">
								@foreach( $Pages as $Page )
									<div class="checkbox checkbox-replace">
										<input type="checkbox" name="page[]" value="{{ $Page->id }}" />
										<label>{{ str_limit($Page->judul, 35) }}</label>
									</div>
									<br>
								@endforeach
							</div>

							<div class="panel-footer" style="background:#fff">
								<span class="parent-menu"></span>
								<br>
								<button class="btn btn-default col-md-12 tambah-menu" data-tipe="Halaman">Tambahkan ke menu <i class="entypo-right-open"></i></button>
							</div>
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#menu-accord" href="#collapseOne-3">
									Custom
								</a>
							</h4>
						</div>
						<div id="collapseOne-3" class="panel-collapse collapse">
							<div class="panel-body" style="background:#fdfdfd;height:auto;max-height:200px;overflow-y:scroll;color:#444">
								<table border="0" width="100%">
									<tr>
										<td>Link/Url &nbsp;&nbsp;</td>
										<td><input type="text" id="link" class="form-control" name="link" value="http://"></td>
									</tr>
									<tr><td colspan="2"></td></tr>
									<tr>
										<td>Nama Menu&nbsp;&nbsp;</td>
										<td><input type="text" id="nama_menu" class="form-control" name="nama_menu" placeholder="Nama Menu"></td>
									</tr>
								</table>
							</div>

							<div class="panel-footer" style="background:#fff">
								<span class="parent-menu"></span>
								<br>
								<button class="btn btn-default col-md-12 tambah-menu" data-tipe="Custom">Tambahkan ke menu <i class="entypo-right-open"></i></button>
							</div>

						</div>
					</div>

				</div>
			
			</div>
			
			<div class="col-md-8">

				<h3>{{ $Jenis }} Menu <small>Drag Menu untuk mengubah urutan</small> <span id="spinner"></span></h3>
				<br>

				<div id="list">
					<div class="panel-group joined" id="primary-menu">

						@foreach( $Menus as $Menu )

							<div class="panel panel-default" id="arrayOrder-{{ $Menu->id }}" 
								style="margin-bottom:5px;color:#000">

								<div class="panel-heading" style="border:none;background:#eee;">
									<h4 class="panel-title">
											<a data-toggle="collapse" data-parent="#primary-menu" href="#menu-{{ $Menu->id }}">
											<span class='judul'>{{ $Menu->judul }}</span>
											<label class="pull-right">
												<small>{{ $Menu->jenis }}</small>
											</label>
										</a>
									</h4>

								</div>

								<div id="menu-{{ $Menu->id }}" class="panel-collapse collapse">
									<div class="panel-body" style="background:#fafafa;color:#444">
										
										<input type="hidden" name="id" value="{{ $Menu->id }}">

										@if ( $Menu->jenis == "Kategori" || $Menu->jenis == "Halaman" )
											<label>Nama Menu</label>
											<input type="text" class="form-control" name="nama_menu" value="{{ $Menu->judul }}">
											<input type="hidden" name="link" value="{{ $Menu->link }}">
										@else
											<label>Nama Menu</label>
											<input type="text" class="form-control" name="nama_menu" value="{{ $Menu->judul }}">
											<br>
											<label>Link/Url</label>
											<input type="text" class="form-control" name="link" value="{{ $Menu->link }}">
										
										@endif
										
										<br>

										<a href="javascript:;" class="update-menu-item" style="color:green">Simpan</a>
										<label class="pull-right">
											<a href="javascript:;" class="hapus-menu-item" style="color:#a00">Hapus</a>
										</label>
									</div>

								</div>

					<!-- SUB MENU -->

								<?php $CekMenu = App\Menu::where('parent_id', $Menu->id)->count(); ?>

								@if ( $CekMenu > 0 )
									<div style="margin-left:30px;margin-right:30px;margin-top:10px">
										<div class="panel-group joined" id="secondary-menu">

											<?php $SubMenu = App\Menu::where('parent_id', $Menu->id)
																->orderBy('urutan','asc')
																->get(); ?>

											@foreach( $SubMenu as $Sub )

												<div class="panel panel-default" id="arrayOrder2-{{ $Sub->id }}" style="margin-bottom:5px;color:#000">
													<div class="panel-heading" style="border:none;background:#eee;">
														<h4 class="panel-title">
																<a data-toggle="collapse" data-parent="#secondary-menu" href="#sub-menu-{{ $Sub->id }}">
																<span class='judul'>{{ $Sub->judul }} <small> &nbsp; Sub Menu</small></span>
																<label class="pull-right">
																	<small>{{ $Sub->jenis }}</small>
																</label>
															</a>
														</h4>

													</div>

													<div id="sub-menu-{{ $Sub->id }}" class="panel-collapse collapse">
														<div class="panel-body" style="background:#fff;color:#444">
															
															<input type="hidden" name="id" value="{{ $Sub->id }}">

															@if ( $Sub->jenis == "Kategori" || $Sub->jenis == "Halaman" )
																<label>Nama Menu</label>
																<input type="text" class="form-control" name="nama_menu" value="{{ $Sub->judul }}">
																<input type="hidden" name="link" value="{{ $Sub->link }}">
															@else
																<label>Nama Menu</label>
																<input type="text" class="form-control" name="nama_menu" value="{{ $Sub->judul }}">
																<br>
																<label>Link/Url</label>
																<input type="text" class="form-control" name="link" value="{{ $Sub->link }}">
															
															@endif
															
															<br>

															<a href="javascript:;" class="update-menu-item" style="color:green">Simpan</a>
															<label class="pull-right">
																<a href="javascript:;" class="hapus-menu-item" style="color:#a00">Hapus</a>
															</label>
														</div>

													</div>
												</div>

											@endforeach

										</div>
									</div>

								@endif

							</div>

						@endforeach

						@if (count($Menus) < 1 )
							<div>Belum ada menu</div>
						@endif

					</div>
				</div>

			</div>

		</div>

	</div>

</div>
	

@endsection

@section('registerscript')

	<script src="{{ url( Config::get('config.public_loc') ) }}/admin/libs/camohub-jquery-sortable/jquery-sortable-lists.js"></script>
	
	<script>
		$('.nav-menu').addClass('active');

		@if ( isset( $_GET['act'] ) )
			toastr.success('Sub Menu Ditambahkan');
		@endif

		$(function() {

			var token = $('meta[name="csrf-token"]').attr('content');

			function hapus_combobox_value(id){
				$(".parent_id option[value='"+id+"']").remove();
			}

			function uncheck_combo_box(){
				$("body").find(".checkbox").removeClass('checked');
				$("body").find(".checkbox input[type='checkbox']").attr('checked', false);
			}

			function getParentMenu(token){
				$(".parent-menu").html("<center><p><i class='fa fa-spinner fa-spin'></i></p></center>");
				$.get("{{ route('menu_parent_menu', ['lokasi' => $Jenis]) }}", {_token:token }, function(data){
					$(".parent-menu").html(data);
				});
			}

			getParentMenu(token);

			$("#list #primary-menu").sortable({ opacity: 0.8, cursor: 'move', update: function() {
					
					$("#spinner").html("<i class='fa fa-spinner fa-spin'></i>");

					var route = "{{ route('menu_update_urutan') }}";
					var urutan = $(this).sortable("serialize"); 

					$.ajax({
						url: route,
						type: 'POST',
						headers: { 'X-CSRF-TOKEN': token },	
						dataType: 'html',
						data: { urutan:urutan },
						error: function(jqXHR, textStatus, errorThrown) {
							$("#spinner").html('');
							toastr.info(textStatus+' : '+errorThrown);
						},
						success: function(data){
							$("#spinner").html('');
							toastr.success('Urutan menu tersimpan');
						}

					 });	
				}								  
			});

			$("#list #secondary-menu").sortable({ opacity: 0.8, cursor: 'move', update: function() {

					$("#spinner").html("<i class='fa fa-spinner fa-spin'></i>");

					var route = "{{ route('menu_update_urutan') }}";
					var urutan2 = $(this).sortable("serialize"); 

					$.ajax({
						url: route,
						type: 'POST',
						headers: { 'X-CSRF-TOKEN': token },	
						dataType: 'html',
						data: { urutan:urutan2 },
						error: function(jqXHR, textStatus, errorThrown) {
							$("#spinner").html('');
							toastr.info(textStatus+' : '+errorThrown);
						},
						success: function(data){
							$("#spinner").html('');
							toastr.success('Urutan menu tersimpan');
						}

					 });	
				}			
			});

			// SIMPAN MENU
			$(".tambah-menu").click(function(){

				var tambah_menu = $(this);
				var route 		= "{{ route('menu_simpan') }}";
				var tipe 		= tambah_menu.data('tipe');
				var parent_id 	= $(this).parent().find("select.parent_id option:selected").val();
				var lokasi 		= "{{ $Jenis }}";
				
				tambah_menu.html('<i class="fa fa-spinner fa-spin"></i>');

				if ( ( tipe == "Kategori" ) || ( tipe == "Halaman" ) )  {

					var arr_value = [];

					if ( tipe == "Kategori" ) {
						$("input[name^='kategori[]']:checked").each(function(){
							arr_value.push($(this).val());
						});
					} else {
						$("input[name^='page[]']:checked").each(function(){
							arr_value.push($(this).val());
						});
					}

					if ( arr_value == "" ) {
						tambah_menu.html("Tambahkan ke menu <i class='entypo-right-open'></i>");
						return false;
					} else {

						$.ajax({
							url: route,
							type: 'POST',
							headers: { 'X-CSRF-TOKEN': token },	
							dataType: 'html',
							data: { arr_value:arr_value, tipe : tipe, parent_id : parent_id, lokasi:lokasi },
							error: function(jqXHR, textStatus, errorThrown) {
								uncheck_combo_box();
								tambah_menu.html("Tambahkan ke menu <i class='entypo-right-open'></i>");
								toastr.info(textStatus+' : '+errorThrown);
							},
							success: function(data){
								tambah_menu.html("Tambahkan ke menu <i class='entypo-right-open'></i>");
								uncheck_combo_box();
								getParentMenu(token);
								if ( parent_id == 0 ) {
									$("#primary-menu").append(data);
									toastr.success('Menu Ditambahkan');
								} else {
									location.href='<?php echo route("menu", ["jenis" => $Jenis]) ?>';
								}
							}

						 });
					}

				} else {

					var link 	= $("#link").val();
					var judul 	= $("#nama_menu").val();

					if ( judul != "" ) {

						$.ajax({
							url: route,
							type: 'POST',
							headers: { 'X-CSRF-TOKEN': token },	
							dataType: 'html',
							data: { link:link, judul:judul,tipe : tipe, parent_id : parent_id, lokasi:lokasi },
							error: function(jqXHR, textStatus, errorThrown) {
								uncheck_combo_box();
								tambah_menu.html("Tambahkan ke menu <i class='entypo-right-open'></i>");
								toastr.info(textStatus+' : '+errorThrown);
							},
							success: function(data){
								uncheck_combo_box();
								tambah_menu.html("Tambahkan ke menu <i class='entypo-right-open'></i>");
								getParentMenu(token);
								if ( parent_id == 0 ) {
									$("#primary-menu").append(data);
									toastr.success('Menu Ditambahkan');
								} else {
									location.href='<?php echo route("menu", ["jenis" => $Jenis]) ?>';
								}
							}

						 });
					} else {
						tambah_menu.html("Tambahkan ke menu <i class='entypo-right-open'></i>");
						$("#nama_menu").focus();
					}
				}
				
			});
	
			// UPDATE MENU
				$("#list").on("click", ".update-menu-item", function(){
					var update 	= $(this);
					var id 		= update.parent().find("input[name='id']").val();
					var judul 	= update.parent().find("input[name='nama_menu']").val();
					var link 	= update.parent().find("input[name='link']").val();
					var route 	= "{{ route('menu_update') }}";

					update.html('<i class="fa fa-spinner fa-spin"></i>');

					if ( judul != "" ) {

						$.ajax({
							url: route,
							type: 'POST',
							headers: { 'X-CSRF-TOKEN': token },	
							dataType: 'html',
							data: { id:id, judul : judul, link : link },
							error: function(jqXHR, textStatus, errorThrown) {
								update.html('Simpan');
								toastr.info(textStatus+' : '+errorThrown);
							},
							success: function(data){
								update.html('Simpan');
								toastr.success('Menu Tersimpan');
								update.parent().find("input[name='nama_menu']").val(judul);
								update.parent().find("input[name='link']").val(link);
								update.parent().parent().parent().find(".judul").text(judul);
							}

						});
					}
				});
			
			// HAPUS MENU
			$("#list").on("click", ".hapus-menu-item", function(){
				var hapus 	= $(this);
				var route 	= "{{ route('menu_hapus') }}";
				var id 		= $(this).parent().parent().find("input[name='id']").val();
				$(this).html('<i class="fa fa-spinner fa-spin"></i>');

				$.ajax({
					url: route,
					type: 'POST',
					headers: { 'X-CSRF-TOKEN': token },	
					dataType: 'html',
					data: { id:id },
					error: function(jqXHR, textStatus, errorThrown) {
						hapus.html('Hapus');
						toastr.info(textStatus+' : '+errorThrown);
					},
					success: function(data){
						hapus.html('Hapus');
						hapus_combobox_value(id);
						toastr.success('Menu Terhapus');
						$("#arrayOrder-"+id).fadeOut('slow');
						setTimeout(function(){ $("#arrayOrder-"+id).remove(); }, 500);
						$("#arrayOrder2-"+id).fadeOut('slow');
						setTimeout(function(){ $("#arrayOrder2-"+id).remove(); }, 500);
						
					}

				});
			});

		});

	</script>


@endsection