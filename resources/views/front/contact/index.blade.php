@extends('front.layout.main')

@section('title')
Kontak Dinas Perikanan dan Kelautan Kab. Bantaeng
@endsection

@section('description')
Kontak Dinas Perikanan dan Kelautan Kab. Bantaeng
@endsection


@section('konten')

<?php $sc = new App\Custom ?>

            <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                
                <div class="top-headline">
                
                    <h1 class="headline-title">Kontak</h1>

                    <div class="separator"><i class="fa fa-anchor"></i></div>

                    <h4 class="description">
                        Kontak Dinas Perikanan dan Kelautan Kab. Bantaeng
                    </h4>

                </div> <!-- end headline -->

            </div> <!-- end col-sm-8 -->

        </div>  <!-- end container -->

    </header>
	
	<!-- CONTACT -->
	<section class="section-contact">
		
		<div class="container">
			
			<div class="col-sm-12 col-md-7">
				
				<div class="col-xs-12 col-sm-6">
					
					<figure class="contact-image">
						
						<img src="{{ url('resources/assets/front') }}/img/contact.png" class="u-photo" alt="">

					</figure>

				</div> <!-- end col-sm-6 -->

				<div class="col-xs-12 col-sm-6 contact-line">
					
					<h4 class="contact-top-title">Kontak</h4>

					<div class="h-adr">

						<h5 class="contact-title">Alamat</h5>
						
						<p>
						  <span class="p-street-address">{{ $setting->alamat }}</span>
						</p>

						<h5 class="contact-title">Telpon</h5>

						<p class="tel">							
							<span class="value">{{ $setting->phone }}</span>
						</p>

						<h5 class="contact-title">email</h5>

						<p class="u-email">
							{{ $setting->email }}
						</p>

					</div> <!-- end h-adr -->

				</div> <!-- end col-sm-6 -->

			</div> <!-- end col-sm-6 -->

			<div class="col-sm-12 col-md-5">

				<div class="stamp">

					<figure class="stamp-image clearfix">
						<img src="{{ url('resources/assets/front') }}/img/stamp.png" class="u-photo" alt="">						
					</figure>

				</div> <!-- end stamp -->
					
				<div style="display:none;color:#21366c" class="alert alert-success">
					<h5>Terimakasih, Pesan Anda Telah Terkirim</h5>
				</div>

				<div id="kontak-form">
					<h4 class="contact-form-title">
						Tulis Pesan
					</h4>

					<form method="post" id="contact-form" class="form-inline">
						
						<input type="text" name="nama" id="nama" class="first-name" placeholder="Nama *" required>
						<input type="email" name="email" id="email" class="email-address" placeholder="Email *" required>
						<input type="text" name="subject" id="subject" class="subject-address" placeholder="Subjek *" required>

						<textarea name="pesan" id="pesan" placeholder="Pesan *" required></textarea>

						<input type="submit" id="kirim-pesan" value="kirim pesan">

					</form>
				</div>

			</div> <!-- end col-sm-6 -->

		</div> <!-- end container -->

	</section>
	<!-- END CONTACT -->


	<!-- MAP -->
	<section class="section-map">

		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3971.1317935133084!2d119.94619841435453!3d-5.547470656676725!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbeb2c7b5fdb0d9%3A0xa5955803cb901862!2sDinas+Perikanan%2C+dan+Kelautan!5e0!3m2!1sid!2sid!4v1456159876464" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
	
	</section>
	<!-- END MAP -->
	
@endsection

@section('registerscript')

	<script>
		$(function(){

			var _token = $("meta[name='csrf-token']").attr('content');

			$("#contact-form").submit(function(){

				$("#kirim-pesan").val('Sedang Mengirim Pesan...');
				$("#kirim-pesan").attr('disabled','');
				var url = "{{ route('post_contact') }}";

				var nama = $("#nama").val();
				var email = $("#email").val();
				var subject = $("#subject").val();
				var pesan = $("#pesan").val();

				$.post(url, { nama:nama,email:email,subject:subject,pesan:pesan,_token:_token }, function(){
					$("#kontak-form").hide();
					$(".alert-success").fadeIn();
				});

				$("#kirim-pesan").val('Kirim Pesan');
			});
		});
	</script>

@endsection