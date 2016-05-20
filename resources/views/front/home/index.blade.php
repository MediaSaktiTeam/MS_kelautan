@extends('front.layout.main')

@section('title')
{{ $setting->sitename }}
@endsection

@section('description')
{{ $setting->description }}
@endsection

@section('konten')

			<div class="col-sm-12 col-md-12 col-lg-10 col-lg-offset-1 clearfix">
				
				<div class="top-headline">
					<?php $set = App\Setting::find(1) ?>
					<h1 class="headline-title">{{ $set->sitename }}</h1>

						<div class="separator"><i class="fa fa-anchor"></i></div>

					<h4 class="description">
						{{ $set->description }}
					</h4>

					<div class="detail-button">
							<a href="#" class="btn scrolling-btn">Details</a>

					</div> <!-- end detail-button -->

				</div> <!-- end headline -->

			</div> <!-- end col-sm-10 -->

		</div>	<!-- end container -->

	</header>
	<!-- END HEADER -->


	<!-- QUOTE -->
	<section class="section-quote">
		
		<div class="container">			
				
				<div class="quote-body col-sm-6">
				
					<h2 class="quote-name">Prof. Dr. Ir. H. M. Nurdin Abdullah, M.A</h2>

					<h5 class="sub-info">Bupati Kab. Bantaeng</h5>

					<div class="separator"><i class="fa fa-quote-left"></i></div>

					<p class="quote-role">
						Ucapan terima kasih kepada semua pihak yang telah mendukung Pembuatan Website Perikanan ini. Semoga Website ini dapat menjadi salah satu referensi dalam upaya mengembangkan potensi sumber daya alam dan sumber daya manusia di Kabupaten Bantaeng. Insya Allah.
					</p>

					<a href="#" data-toggle="modal" data-target="#bupati">~ Selengkapnya ~</a>

				</div> <!-- end col-sm-6 -->

				<div class="col-sm-6">
					
					<img src="{{ url('resources/assets/front') }}/img/bupati_diskanlutbantaeng.png" alt="" class="u-photo quote-image">

				</div> <!-- end col-sm-6 -->			

		</div> <!-- end container -->

	</section>
	<!-- END SECTION QUOTE -->


	<!-- QUOTE -->
	<section class="section-quote section-quote-2">
		
		<div class="container">			

				<div class="col-sm-6">
					
					<img src="{{ url('resources/assets/front') }}/img/kadis_diskanlutbantaeng.png" alt="" class="u-photo quote-image">

				</div> <!-- end col-sm-6 -->			
				
				<div class="quote-body col-sm-6">
				
					<h2 class="quote-name">Ir. Muh. Dimiati Nongpa, M.P</h2>

					<h5 class="sub-info">Kepala Dinas Perikanan dan Kelautan Kab. Bantaeng</h5>

					<div class="separator"><i class="fa fa-quote-left"></i></div>

					<p class="quote-role">
						Insya Allah kedepannya dengan terbentuknya website ini akan kami lengkapi semua data diwilayah pesisir Bantaeng. Kepada semua Pihak yang telah mendukung terbentuknya Website Dinas Perikanan dan Kelautan Kabupaten Bantaeng ini saya menyampaikan Terima Kasih yang Tak terhingga. Semoga mendapatkan amalan disisi-NYA.
					</p>

					<a href="#" data-toggle="modal" data-target="#kadis">~ Selengkapnya ~</a>

				</div> <!-- end col-sm-6 -->

		</div> <!-- end container -->

	</section>
	<!-- END SECTION QUOTE -->


	<!-- VERTICAL SLIDER -->
	<section class="slider-vertical">
		
		<div class="container">

			<div class="arrow-wrap col-xs-12 col-sm-5">
		    	
				<span class="vertical-top"><i class="fa fa-chevron-up"></i></span> 
			   	<span class="vertical-bottom"><i class="fa fa-chevron-down"></i></span>

			</div>
			
			<div class="vertical col-sm-12">	
				
				<div class="vertical-inner">
					
					@foreach ( $blogs as $blog )

						<div class="slide clearfix">

							<div class="vertical-text col-xs-12 col-sm-6">
					             	
								<h2 class="vertical-title"><a href="{{ url('/blog') }}/{{ $blog->slug }}">{{ $blog->judul }}</a></h2>
								<h6 class="sub-info">
								<?php $i = 0 ?>
								@foreach( $blog->kategori as $kat)
									{{ count( $blog->kategori ) != $i++ + 1 ? $kat->nama_kategori.", " : $kat->nama_kategori }}
								@endforeach
								</h6>

								<div class="separator-box"><i class="fa fa-anchor"></i></div>

								<p class="vertical-content"> {{ str_limit(strip_tags($blog->konten),100) }} </p>

					        </div>

					    	<div class="vertical-image shadow col-xs-12 col-sm-6 col-lg-5">
					    		@if ( empty( $blog->gambar ) )
									<img src="{{ url('resources/assets/front') }}/img/vertical.png" alt="{{ $blog->judul }}">
								@else
									<img src="{{ url('resources/assets/img') }}/{{ $blog->gambar }}" alt="{{ $blog->judul }}">
								@endif
							</div>		

						</div> <!-- end slide -->

					@endforeach

				</div>

			</div> <!-- end vertical-slider -->			
			
		</div>
		
	</section>
	<!-- END VERTICAL SLIDER -->



	<!-- VISI MISI -->
	<section class="section-card">
		
		<div class="container">
			
			<div class="col-sm-11 col-md-8 col-lg-7 col-sm-offset-1">
				
				<div class="h-card">

					<div class="card-text-wrap col-sm-12">
						
						<header class="card-header">

							<h4 class="p-name">Visi dan Misi DISKANLUT Kab. Bantaeng</h4>

							<h6 class="sub-info">Profil</h6>

						</header>

						<div class="separator-box"></div>

						<div class="p-role">
								
						{{ $setting->visi_misi }}

						</div> <!-- end entry-summary -->

						<div class="detail-button">
							
							<?php $visi_misi = App\Page::where('judul', 'LIKE', '%visi%'); ?>
								@if ( $visi_misi->count() > 0 )
									<a href="{{ url('/page') }}/{{ $visi_misi->first()->slug }}" class="btn u-url">Lihat Detail</a>	
								@endif

						</div> <!-- end detail-button -->	

					</div>	

				</div> <!-- end h-card -->

			</div> <!-- end col-sm-7 -->

		</div> <!-- end container -->

	</section>
	<!-- END VISI MISI -->


	<!-- CONTACT -->
	<section class="section-contact">
		
		<div class="container">
			
			<div class="col-sm-12 col-md-5">

				<div class="col-xs-12 col-sm-12 contact-line">
					
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

			<div class="col-sm-12 col-md-7">

				<div class="stamp">

					<br>
					<br>

				</div> <!-- end stamp -->


				<div style="display:none;color:#21366c" class="alert alert-success">
					<i class="fa fa-check" style="font-size: 60px;color: #C09575;"></i>
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




	<!-- Modal -->
	<div class="modal fade" id="bupati" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h2 class="quote-name">Prof. Dr. Ir. H. M. Nurdin Abdullah, M.A</h2>
					<h5 class="sub-info">Bupati Kab. Bantaeng</h5>
				</div>
				<div class="modal-body">

					<p class="quote-role">
						<b>Assalamu Alaikum Warahmatullahi Wabarakatu</b>
					</p>

					<p class="quote-role">
						Saya menyambut baik website Perikanan Kabupaten Bantaeng karena website ini akan memberikan banyak informasi kepada semua pihak, khususnya pada stakeholder yang membutuhkan data perikanan sebagai dasar untuk mendukung pengembangan sub sektor perikanan di Kabupaten Bantaeng.
					</p>

					<p class="quote-role">
						Kabupaten Bantaeng saat ini terus melakukan berbagai terobosan di bidang perikanan dan kelautan yang sifatnya menyentuh langsung kepada pelaku bisnis mulai skala kecil hingga skala besar (Industri Perikanan). Bentuk dukungan ini telah tertuang dalam berbagai kerjasama dengan stakeholder daerah dan provinsi.
					</p>

					<p class="quote-role">
						Ucapan terima kasih kepada semua pihak yang telah mendukung Pembuatan Website Perikanan ini. Semoga Website ini dapat menjadi salah satu referensi dalam upaya mengembangkan potensi sumber daya alam dan sumber daya manusia di Kabupaten Bantaeng. Insya Allah.
					</p>

					<div class="row" style="font-size: 12px">	
						<p class="col-sm-offset-6 col-sm-6 col-xs-offset-6 col-xs-6">
							Bantaeng, Agustus 2015 <br>

							<b>BUPATI <br>

							Prof.Dr.Ir.H.M.Nurdin Abdullah, M.A</b>
						</p>
					</div>

				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="kadis" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h2 class="quote-name">Ir. Muh. Dimiati Nongpa, M.P</h2>
					<h5 class="sub-info">Kepala Dinas Perikanan dan Kelautan Kab. Bantaeng</h5>
				</div>
				<div class="modal-body">

					<p class="quote-role">
						<b>Assalamu Alaikum Warahmatullahi Wabarakatu</b>
					</p>

					<p class="quote-role">
						Syukur Alhamdulillah dipanjatkan kepada Allah SWT yang telah memberi kesempatan dan kemampuan kepada kita sehingga pembuatan Website Dinas Perikanan dan Kelautan Kab. Bantaeng ini dapat diselesaikan. Website ini dibuat dengan tujuan agar ketersediaan informasi terupdate data perikanan dan kelautan Kabupaten Bantaeng bisa lebih dikenal oleh seluruh masyarakat sekitar. Disadari bahwa masih terbatasnya data ditingkat kelurahan dan desa sehingga beberapa bagian dari website Dinas Perikanan dan Kelautan ini belum terisi dengan lengkap. Insya Allah kedepannya dengan terbentuknya website ini akan kami lengkapi semua data diwilayah pesisir Bantaeng. Kepada semua Pihak yang telah mendukung terbentuknya Website Dinas Perikanan dan Kelautan Kabupaten Bantaeng ini saya menyampaikan Terima Kasih yang Tak terhingga. Semoga mendapatkan amalan disisi-NYA. Akhirnya saya harap Website ini dapat bermanfaat bagi kita semua yang membutuhkan informasi seputar Dinas Perikanan dan Kelautan Kabupaten Bantaeng.
					</p>

					<div class="row" style="font-size: 12px">	
						<p class="col-sm-offset-6 col-sm-6 col-xs-offset-6 col-xs-6">
							Bantaeng, Agustus 2015 <br>

							Kepala Dinas Perikanan dan Kelautan,<br>

							<b>Ir.MUH. DIMIATI NONGPA, M.P<br>

							NIP:19640715199303 1 016</b>
						</p>
					</div>

				</div>
			</div>
		</div>
	</div>


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