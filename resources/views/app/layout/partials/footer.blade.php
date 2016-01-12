

		<!-- START OVERLAY -->
		<div class="overlay hide" data-pages="search">
			<!-- BEGIN Overlay Content !-->
			<div class="overlay-content has-results m-t-20">
				<!-- BEGIN Overlay Header !-->
				<div class="container-fluid">
					<!-- BEGIN Overlay Logo !-->
					<img class="overlay-brand" src="{{ url('resources/assets/app/img/logo.png') }}" alt="logo" data-src="{{ url('resources/assets/app/img/logo.png') }}" data-src-retina="{{ url('resources/assets/app/img/logo_2x.png') }}" width="78" height="22">
					<!-- END Overlay Logo !-->
					<!-- BEGIN Overlay Close !-->
					<a href="#" class="close-icon-light overlay-close text-black fs-16">
						<i class="pg-close"></i>
					</a>
					<!-- END Overlay Close !-->
				</div>
				<!-- END Overlay Header !-->
				<div class="container-fluid">
					<!-- BEGIN Overlay Controls !-->
					<input id="overlay-search" class="no-border overlay-search bg-transparent" placeholder="Search..." autocomplete="off" spellcheck="false">
					<br>
					<div class="inline-block">
						<div class="checkbox right">
							<input id="checkboxn" type="checkbox" value="1" checked="checked">
							<label for="checkboxn"><i class="fa fa-search"></i> Search within page</label>
						</div>
					</div>
					<div class="inline-block m-l-10">
						<p class="fs-13">Press enter to search</p>
					</div>
					<!-- END Overlay Controls !-->
				</div>
				<!-- BEGIN Overlay Search Results, This part is for demo purpose, you can add anything you like !-->
				<div class="container-fluid">
					<span>
								<strong>suggestions :</strong>
						</span>
					<span id="overlay-suggestions"></span>
					<br>
					<div class="search-results m-t-40">
						<p class="bold">Pages Search Results</p>
						<div class="row">
							<div class="col-md-6">
								<!-- BEGIN Search Result Item !-->
								<div class="">
									<!-- BEGIN Search Result Item Thumbnail !-->
									<div class="thumbnail-wrapper d48 circular bg-success text-white inline m-t-10">
										<div>
											<img width="50" height="50" src="{{ url('resources/assets/app/img/profiles/avatar.jpg') }}" data-src="{{ url('resources/assets/app/img/profiles/avatar.jpg') }}" data-src-retina="{{ url('resources/assets/app/img/profiles/avatar2x.jpg') }}" alt="">
										</div>
									</div>
									<!-- END Search Result Item Thumbnail !-->
									<div class="p-l-10 inline p-t-5">
										<h5 class="m-b-5"><span class="semi-bold result-name">ice cream</span> on pages</h5>
										<p class="hint-text">via john smith</p>
									</div>
								</div>
								<!-- END Search Result Item !-->
								<!-- BEGIN Search Result Item !-->
								<div class="">
									<!-- BEGIN Search Result Item Thumbnail !-->
									<div class="thumbnail-wrapper d48 circular bg-success text-white inline m-t-10">
										<div>T</div>
									</div>
									<!-- END Search Result Item Thumbnail !-->
									<div class="p-l-10 inline p-t-5">
										<h5 class="m-b-5"><span class="semi-bold result-name">ice cream</span> related topics</h5>
										<p class="hint-text">via pages</p>
									</div>
								</div>
								<!-- END Search Result Item !-->
								<!-- BEGIN Search Result Item !-->
								<div class="">
									<!-- BEGIN Search Result Item Thumbnail !-->
									<div class="thumbnail-wrapper d48 circular bg-success text-white inline m-t-10">
										<div><i class="fa fa-headphones large-text "></i>
										</div>
									</div>
									<!-- END Search Result Item Thumbnail !-->
									<div class="p-l-10 inline p-t-5">
										<h5 class="m-b-5"><span class="semi-bold result-name">ice cream</span> music</h5>
										<p class="hint-text">via pagesmix</p>
									</div>
								</div>
								<!-- END Search Result Item !-->
							</div>
							<div class="col-md-6">
								<!-- BEGIN Search Result Item !-->
								<div class="">
									<!-- BEGIN Search Result Item Thumbnail !-->
									<div class="thumbnail-wrapper d48 circular bg-info text-white inline m-t-10">
										<div><i class="fa fa-facebook large-text "></i>
										</div>
									</div>
									<!-- END Search Result Item Thumbnail !-->
									<div class="p-l-10 inline p-t-5">
										<h5 class="m-b-5"><span class="semi-bold result-name">ice cream</span> on facebook</h5>
										<p class="hint-text">via facebook</p>
									</div>
								</div>
								<!-- END Search Result Item !-->
								<!-- BEGIN Search Result Item !-->
								<div class="">
									<!-- BEGIN Search Result Item Thumbnail !-->
									<div class="thumbnail-wrapper d48 circular bg-complete text-white inline m-t-10">
										<div><i class="fa fa-twitter large-text "></i>
										</div>
									</div>
									<!-- END Search Result Item Thumbnail !-->
									<div class="p-l-10 inline p-t-5">
										<h5 class="m-b-5">Tweats on<span class="semi-bold result-name"> ice cream</span></h5>
										<p class="hint-text">via twitter</p>
									</div>
								</div>
								<!-- END Search Result Item !-->
								<!-- BEGIN Search Result Item !-->
								<div class="">
									<!-- BEGIN Search Result Item Thumbnail !-->
									<div class="thumbnail-wrapper d48 circular text-white bg-danger inline m-t-10">
										<div><i class="fa fa-google-plus large-text "></i>
										</div>
									</div>
									<!-- END Search Result Item Thumbnail !-->
									<div class="p-l-10 inline p-t-5">
										<h5 class="m-b-5">Circles on<span class="semi-bold result-name"> ice cream</span></h5>
										<p class="hint-text">via google plus</p>
									</div>
								</div>
								<!-- END Search Result Item !-->
							</div>
						</div>
					</div>
				</div>
				<!-- END Overlay Search Results !-->
			</div>
			<!-- END Overlay Content !-->
		</div>
		<!-- END OVERLAY -->


		<!-- MODAL STICK UP SMALL ALERT -->
		<div class="modal fade slide-up" id="modal-help" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content-wrapper">
					<div class="modal-content">
						<div class="modal-header clearfix text-left">
							<button type="button" class="close" data-dismiss="modal"  aria-hidden="true"><i class="pg-close fs-14"></i></button>
							<h5>Laporkan Masalah</h5>
							<hr>
						</div>
						<div class="modal-body">
							<form class="style-form" id="form-kelompok" method="GET" action="">
								<div class="form-group form-group-default">
									<label>Kode Laporan</label>
									<?php
										$seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'
														 .'0123456789');
										shuffle($seed); 
										$rand = '';
										foreach (array_rand($seed, 5) as $k) $rand .= $seed[$k];
									?>
									<b>#<?php echo $rand; ?></b>
								</div>
								<div class="form-group form-group-default required">
									<label>Deskripsi Masalah</label>
									<textarea name="" style="height: 150px;" rows="10" class="form-control"></textarea>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-primary btn-cons btn-simpan">Kirim</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
		<!-- END MODAL STICK UP SMALL ALERT -->




		<script src="{{ url('resources/assets/app/js/vendor.js') }}" type="text/javascript"></script>