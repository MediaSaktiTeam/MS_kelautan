




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
							<form class="style-form" id="form-lapor-masalah" method="GET" action="{{ url('/app/lapor-masalah') }}">
								{{ csrf_field() }}
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
									<input type="hidden" name="subjek" value="Laporan Masalah Dinas Kelautan dan Perikanan Bantaeng">
									<input type="hidden" name="url" value="{{ $_SERVER['REQUEST_URI'] }}">
								</div>
								<div class="form-group form-group-default required">
									<label>Deskripsi Masalah</label>
									<textarea name="pesan" style="height: 150px;" rows="10" class="form-control" required></textarea>
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


		@if ( Session::has('EmailSukses') || Session::has('EmailGagal') )

			<div class="modal fade slide-up" id="modal-status-email" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content-wrapper">
						<div class="modal-content">
							<div class="modal-header clearfix text-left">
								<button type="button" class="close" data-dismiss="modal"  aria-hidden="true"><i class="pg-close fs-14"></i></button>
								<h5>Informasi</h5>
								<hr>
							</div>
							<div class="modal-body">
								<div class="row">
									<div class="col-md-12">
										@if ( Session::has('EmailSukses') ) 
											{{ Session::get('EmailSukses') }}
										@else
											{{ Session::get('EmailGagal') }}
										@endif
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>

		@endif

		<script src="{{ url('resources/assets/app/js/vendor.js') }}" type="text/javascript"></script>

		@if ( Session::has('EmailSukses') || Session::has('EmailGagal') )
			<script>
				$("#modal-status-email").modal('show');
			</script>
		@endif

		<script>
			$('#form-lapor-masalah').submit(function(){
				$(this).find('button').attr('disabled','');
				$(this).find('button').html("Sedang Mengirim Laporan &nbsp;<i class='fa fa-spinner fa-spin'></i>");
			});
		</script>