<nav class="navbar navbar-desk navbar-light">
	<div class="container">
		<a class="navbar-brand" href="#">
			<img src="assets/images/client-side/logo-app.svg" alt="logo-app">
		</a>
		
		<div class="navbar-menu d-flex align-items-center">
			<a href="#" class="nav-link active d-flex align-items-center">
				<i class='bx bx-home-alt' ></i>
				<span>Beranda</span>
			</a>
			<a href="#" class="nav-link">
				<span>Berita</span>
			</a>
			<a href="#" class="nav-link">
				<span>Trending</span>
			</a>
			<a href="#" class="nav-link">
				<span>Notifikasi</span>
			</a>

			<div class="search-box d-flex align-items-center">
				<div class="search-ico d-flex align-items-center justify-content-center">
					<i class='bx bx-search' ></i>
				</div>
				
				<input type="text" class="input-search" placeholder="Cari sesuatu...">
			</div>
			<a href="app" class="login-bx btn">
				Login
			</a>
		</div>
	</div>
</nav>
<nav class="navbar navbar-mobile">
	<div class="container p-3">
		<div class="navbar-menu_mobile d-flex m-auto align-items-center justify-content-between">
			<a href="#" class="nav-link mbl-v d-flex flex-column  align-items-center justify-content-center  active">
				<i class='bx bx-home-alt' ></i>
			</a>
			<a href="#" class="nav-link mbl-v d-flex flex-column  align-items-center justify-content-center ">
				<i class='bx bx-news' ></i>
			</a>
			<a href="#" class="nav-link mbl-v d-flex flex-column  align-items-center justify-content-center ">
				<i class='bx bx-bell' ></i>
			</a>
			<a href="#" class="nav-link mbl-v d-flex flex-column  align-items-center justify-content-center ">
				<i class='bx bx-user' ></i>
			</a>
		</div>
	</div>
</nav>
<section class="carousel-section">
	<div class="container">
		<div class="carousel-box">
			<div class="owl-carousel">
	            <div class="item">
	            	<img src="https://images.unsplash.com/photo-1592890278983-18616401d4ed?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1074&q=80" alt="">
	            </div>
	            <div class="item">
	              <img src="https://images.unsplash.com/photo-1606037150583-fb842a55bae7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1074&q=80" alt="">
	            </div>
	            <div class="item">
	              <img src="https://images.unsplash.com/photo-1528190336454-13cd56b45b5a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="">
	            </div>
	        </div>
		</div>
	</div>
</section>
<section class="best-product_section mt-5">
	<div class="container">
		<div class="best-product_header d-flex align-items-center justify-content-between">
			<div class="best-product_title">
				<img src="assets/images/client-side/logo-app.svg" alt="Logo-app">
				<h2>Produk Terlaris</h2>
			</div>
			<div class="button-more">
				<a href="" class="nav-link m-0 p-0">
					<span>Lihat Lainnya</span> 
					<i class='bx bx-chevron-right'></i>
				</a>
			</div>
		</div>

		<div class="best-product_row row mt-3">
			<?php 
				for ($i=0; $i <=3; $i++) { 
					?> 
						<div class="col-md-3 mt-4">
							<div class="card-product">
								<div class="container-bx">
									<div class="card-img">
										<img src="https://images.unsplash.com/photo-1592890278983-18616401d4ed?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1074&q=80" alt="">
									</div>
									<div class="card-product_body mt-4 d-flex align-items-center justify-content-between">
										<div class="card-body_title">
											<h5 class="produk_name mt-2">
												Nama Produk
											</h5>
											<span class="product_price">IDR Harga</span>
										</div>
										<div class="button-view_detail">
											<a href="#" class="d-flex align-items-center justify-content-center">
												<i class='bx bx-detail' ></i>
											</a>
										</div>
									</div>
								</div>
								
							</div>
						</div>
					<?php
				}
			?>
		</div>
	</div>
</section>
<section class="trend-product_section mt-5">
	<div class="container">
		<div class="trend-product_header d-flex align-items-center justify-content-between">
			<div class="best-product_title">
				<img src="assets/images/client-side/logo-app.svg" alt="Logo-app">
				<h2>Analitik Produk</h2>
			</div>
			<div class="button-more">
				<a href="#" class="nav-link m-0 p-0">
					<span>Lihat Lainnya</span> 
					<i class='bx bx-chevron-right'></i>
				</a>
			</div>
		</div>


		<div class="trend-product_row row mt-3">
			<div class="col-md-4 mt-4">
				<div class="card-product_trend d-flex align-items-center justify-content-center p-3">
					<div class="card-trend_img">
						<img src="https://images.unsplash.com/photo-1606037150583-fb842a55bae7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1074&q=80" alt="">
					</div>
					<div class="card-trend_body">
						<div class="product-desc">
							<h5 class="product-name">Nama Produk</h5>
							<span class="price-awal">IDR Harga Awal</span>
							<div class="price-trend_up mt-2">
								<span class="price_">IDR Harga Saat ini</span>
								<i class='bx bx-trending-up'></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 mt-4">
				<div class="card-product_trend d-flex align-items-center justify-content-center p-3">
					<div class="card-trend_img">
						<img src="https://images.unsplash.com/photo-1606037150583-fb842a55bae7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1074&q=80" alt="">
					</div>
					<div class="card-trend_body">
						<div class="product-desc">
							<h5 class="product-name">Nama Produk</h5>
							<span class="price-awal">IDR Harga Awal</span>
							<div class="price-trend_down mt-2">
								<span class="price_">IDR Harga Saat ini</span>
								<i class='bx bx-trending-down'></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 mt-4">
				<div class="card-product_trend d-flex align-items-center justify-content-center p-3">
					<div class="card-trend_img">
						<img src="https://images.unsplash.com/photo-1606037150583-fb842a55bae7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1074&q=80" alt="">
					</div>
					<div class="card-trend_body">
						<div class="product-desc">
							<h5 class="product-name">Nama Produk</h5>
							<span class="price-awal">IDR Harga Awal</span>
							<div class="price-trend_up mt-2">
								<span class="price_">IDR Harga Saat ini</span>
								<i class='bx bx-trending-up'></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>



	</div>
</section>
<section class="berita-terkini_section mt-5 mb-5">
	<div class="container">
		<div class="berita-terkini_row row mt-3">
			<div class="col-md-6">
				<div class="card-berita">
					<div class="card-gradient"></div>
					<img src="https://images.unsplash.com/photo-1592890278983-18616401d4ed?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1074&q=80" alt="">
					<div class="card-berita_desc text-white px-4">
						<div class="title-berita d-flex flex-column">
							<a href="#" class="text-dec">Judul berita</a>
							<span class="berita-excerpt">
								Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consequuntur expedita odio dicta, laudantium illum?
							</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="berita-terkini_row-2 d-flex flex-column justify-content-between">
					<div class="card-berita">
					<div class="card-gradient"></div>
					<img src="https://images.unsplash.com/photo-1592890278983-18616401d4ed?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1074&q=80" alt="">
					<div class="card-berita_desc text-white px-4">
						<div class="title-berita d-flex flex-column">
							<a href="#" class="text-dec">Judul berita</a>
							<span class="berita-excerpt">
								Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consequuntur expedita odio dicta, laudantium illum?
							</span>
						</div>
					</div>
				</div>
				<div class="card-berita">
					<div class="card-gradient"></div>
					<img src="https://images.unsplash.com/photo-1592890278983-18616401d4ed?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1074&q=80" alt="">
					<div class="card-berita_desc text-white px-4">
						<div class="title-berita d-flex flex-column">
							<a href="#" class="text-dec">Judul berita</a>
							<span class="berita-excerpt">
								Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consequuntur expedita odio dicta, laudantium illum?
							</span>
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="footer py-5">
	<div class="container">
		<div class="row-footer row">
			<div class="col-md-5">
				<div class="footer-logo">
					<img src="assets/images/client-side/logo-app.svg" alt="Logo-app">
					<div class="footer-desc mt-4">
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea aspernatur consequatur eum modi, enim culpa rem. Laboriosam recusandae, esse est.</p>
					</div>
					<div class="footer-sosial_media mt-4 d-flex">
						<a href="#" class="sosial-media_icon">
							<i class='bx bxl-instagram'></i>
						</a>
						<a href="#" class="sosial-media_icon">
							<i class='bx bxl-facebook'></i>
						</a>
						<a href="#" class="sosial-media_icon">
							<i class='bx bxl-twitter' ></i>
						</a>
						<a href="#" class="sosial-media_icon">
							<i class='bx bxl-youtube'></i>
						</a>
					</div>
				</div>
			</div>
			<div class="col-md-7">
				<div class="row-navigation row">
					<div class="col-md-4">
						<ul class="nav-footer">
							<li class="mb-3">
								<h6>Navigasi Cepat</h6>
							</li>
							<li><a href="#" class="nav-link p-0 py-2">Beranda</a></li>
							<li><a href="#" class="nav-link p-0 py-2">Berita</a></li>
							<li><a href="#" class="nav-link p-0 py-2">Trending</a></li>
							<li><a href="#" class="nav-link p-0 py-2">Notifikasi</a></li>
						</ul>
					</div>
					<div class="col-md-4">
						<ul class="nav-footer">
							<li class="mb-3">
								<h6>Produk Kami</h6>
							</li>
							<li><a href="#" class="nav-link p-0 py-2">Sampah Mentah</a></li>
							<li><a href="#" class="nav-link p-0 py-2">Olahan Sampah</a></li>
						</ul>
					</div>
					<div class="col-md-4">
						<ul class="nav-footer">
							<li class="mb-3">
								<h6>Kontak Kami</h6>
							</li>
							<li>
								<form action="" class="search-box_footer">
									<input type="text" placeholder="Kontak Kami">
									<button class="btn-submit" type="submit">
										Send
									</button>
								</form>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<script src="<?= base_url() ?>assets/js/Jquery.js"></script>
<script src="assets/vendors/OwlCarousel/dist/owl.carousel.min.js"></script>

<script>
$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})
</script>

</script>

