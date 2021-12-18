
<!-- ============================================================== -->
<!-- Top header  -->
<!-- ============================================================== -->
<!-- Start Navigation -->
@include('layouts.partial.loginmodal')
@include('layouts.partial.signupmodal')
<div class="header header-dark light-text">
	<div class="container">
		<nav id="navigation" class="navigation navigation-landscape">
			<div class="nav-header">
				<a class="nav-brand" href="{{ url('/') }}">
					<img src="assets/img/logo_omkost.png" class="logo" alt="" />
				</a>
				<div class="nav-toggle"></div>
			</div>
			<div class="nav-menus-wrapper" style="transition-property: none;">
				<ul class="nav-menu">
				
					<li><a href="#">Iklan Kos<span class="submenu-indicator"></span></a>
						<ul class="nav-dropdown nav-submenu">
							<li><a href="{{ url('/pencarian') }}">Cari Iklan</a></li>
							<li><a href="{{ url('/dashboard/iklan') }}">Pasang Iklan</a></li>
						</ul>
					</li>

					<li><a href="contact.html">Tentang Kami</a></li>
					
					<li><a href="contact.html">Hubungi Kami</a></li>

					<li><a href="contact.html">Komunitas</a></li>
				<!--
					<li><a href="#">Fitur Anggota<span class="submenu-indicator"></span></a>
						<ul class="nav-dropdown nav-submenu">
							<li><a href="{{ url('/blacklist') }}">Cek Blacklist</a></li>
							<li><a href="{{ url('/tukang') }}">Cari Tukang</a></li>
							<li><a href="{{ url('/toko') }}">Cari Toko</a></li>
						</ul>
					</li>
				-->
				</ul>
				@if(Cookie::has('nama'))
					<ul class="nav-menu nav-menu-social align-to-right dhsbrd">
						<li>
							<div class="btn-group account-drop">
								<button type="button" class="btn btn-order-by-filt" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<img src="https://via.placeholder.com/500x500" class="avater-img" alt="">{{ ucwords(Cookie::get('nama')) }}
								</button>
								<div class="dropdown-menu pull-right animated flipInX">
									<a href="{{ url('/dashboard') }}"><i class="ti-dashboard"></i>Dashboard</a>
									<a href="#" onclick="logout()"><i class="ti-power-off"></i>Logout</a>
								</div>
							</div>
						</li>
					</ul>
				@else
					<ul class="nav-menu align-to-right dhsbrd">
						
						<li class="add-listing bg-white">
							<a href="#" data-toggle="modal" data-target="#login" class="text-blue">
								<i class="fas fa-user-circle mr-1"></i><span class="dn-lg">Masuk</span>
							</a>
						</li>
					<!--
						<li class="add-listing bg-white">
							<a href="#" data-toggle="modal" data-target="#signup" class="theme-cl">
									<i class="fas fa-arrow-alt-circle-right mr-1"></i>Daftar
							</a>
						</li>
					-->
					</ul>
				@endif
				
			</div>
		</nav>
	</div>
</div>
<!-- End Navigation -->