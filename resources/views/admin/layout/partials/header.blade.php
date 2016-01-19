	<div class="sidebar-menu">
		
			
		<header class="logo-env">
			
			<!-- logo -->
			<div class="logo">
				<a href="{{ url('admin') }}">
					<img src="{{ url('resources/assets/admin/images/logo@2x.png') }}" width="120" alt="" />
				</a>
			</div>
			
						<!-- logo collapse icon -->
						
			<div class="sidebar-collapse">
				<a href="#" class="sidebar-collapse-icon with-animation"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
					<i class="entypo-menu"></i>
				</a>
			</div>
			
									
			
			<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
			<div class="sidebar-mobile-menu visible-xs">
				<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
					<i class="entypo-menu"></i>
				</a>
			</div>
			
		</header>
				
		<ul id="main-menu" class="">
			<!-- add class "multiple-expanded" to allow multiple submenus to open -->
			<!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
			<!-- Search Bar -->
			<li id="search">
				<form method="get" action="{{ route('pencarian') }}">
					<input type="hidden" name="TabAktif" value="blog">
					<input type="text" name="cari" class="search-input" placeholder="Apa yang Anda cari..."/>
					<button type="submit">
						<i class="entypo-search"></i>
					</button>
				</form>
			</li>
			<li>
				<a href="{{ url('/') }}" target="_blank">
					<i class="entypo-monitor"></i>
					<span>Halaman Depan</span>
				</a>
			</li>
			<li class="nav-index">
				<a href="{{ url('admin') }}">
					<i class="entypo-gauge"></i>
					<span>Beranda</span>
				</a>
			</li>
			<li class="nav-menu">
				<a href="{{ route('menu') }}">
					<i class="entypo-link"></i>
					<span>Menu</span>
				</a>
			</li>
			<li class="nav-blog">
				<a href="#">
					<i class="entypo-pencil"></i>
					<span>Berita</span>
				</a>
				<ul>
					<li>
						<a href="{{ route('blog') }}">
							<i class="entypo-list"></i>
							<span>Semua Berita</span>
						</a>
					</li>
					<li>
						<a href="{{ route('blog_tambah') }}">
							<i class="entypo-plus-squared"></i>
							<span>Tambah Baru</span>
						</a>
					</li>
					<li>
						<a href="{{ route('kategori') }}">
							<i class="entypo-tag"></i>
							<span>Kategori</span>
						</a>
					</li>
					<!-- <li>
						<a href="blog-tag.php">
							<i class="entypo-quote"></i>
							<span>Kata Kunci</span>
						</a>
					</li> -->
				</ul>
			</li>
			<li class="nav-page">
				<a href="#">
					<i class="entypo-newspaper"></i>
					<span>Halaman</span>
				</a>
				<ul>
					<li>
						<a href="{{ route('page') }}">
							<i class="entypo-list"></i>
							<span>Semua Halaman</span>
						</a>
					</li>
					<li>
						<a href="{{ route('page_tambah') }}">
							<i class="entypo-plus-squared"></i>
							<span>Tambah Baru</span>
						</a>
					</li>
				</ul>
			</li>
			<li class="nav-inbox">
				<a href="#">
					<i class="entypo-mail"></i>
					<span>Pesan</span>
				</a>
				<ul>
					<li>
						<a href="{{ route('pesan') }}">
							<i class="entypo-inbox"></i>
							<span>Kotak Masuk</span>
						</a>
					</li>
					<li>
						<a href="{{ route('pesan_tulis') }}">
							<i class="entypo-plus-squared"></i>
							<span>Tulis Pesan Baru</span>
						</a>
					</li>
				</ul>
			</li>

			<li class="nav-galeri">
				<a href="{{ route('galeri') }}">
					<i class="entypo-picture"></i>
					<span>Galeri</span>
				</a>
			</li>
			<li class="nav-user">
				<a href="#">
					<i class="entypo-user"></i>
					<span>Pengguna</span>
				</a>
				<ul>
					<li>
						<a href="{{ route('user') }}">
							<i class="entypo-users"></i>
							<span>Semua Pengguna</span>
						</a>
					</li>
					<li>
						<a href="{{ route('user_tambah') }}">
							<i class="entypo-user-add"></i>
							<span>Tambah Baru</span>
						</a>
					</li>
				</ul>
			</li>
			<li class="nav-setting">
				<a href="{{ route('setting') }}">
					<i class="entypo-tools"></i>
					<span>Pengaturan</span>
				</a>
			</li>
		</ul>
				
	</div>