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
			<a href="#" class="login-bx btn">
				Login
			</a>
		</div>
	</div>
</nav>

<nav class="navbar navbar-mobile">
	<div class="container">
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
