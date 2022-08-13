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


<div class="container mt-4">
	<h3 class="fw-bolder">Katalog Produk</h3>

		<div class="tabs-products mt-4">
			<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
			  <li class="nav-item">
			    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">All Products</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-best_product" role="tab" aria-controls="pills-profile" aria-selected="false">Best Product</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-organik_trash" role="tab" aria-controls="pills-contact" aria-selected="false">Organik</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-Nonorganik_trash" role="tab" aria-controls="pills-contact" aria-selected="false">Non-Organik</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-hasil_olahan" role="tab" aria-controls="pills-contact" aria-selected="false">Hasil Olahan</a>
			  </li>
			</ul>
			<div class="tab-content" id="pills-tabContent">
			  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">All product</div>
			  <div class="tab-pane fade" id="pills-best_product" role="tabpanel" aria-labelledby="pills-profile-tab">Best Product</div>
			  <div class="tab-pane fade" id="pills-organik_trash" role="tabpanel" aria-labelledby="pills-contact-tab">Organik</div>
			  <div class="tab-pane fade" id="pills-Nonorganik_trash" role="tabpanel" aria-labelledby="pills-contact-tab">Non-Organik</div>
			  <div class="tab-pane fade" id="pills-hasil_olahan" role="tabpanel" aria-labelledby="pills-contact-tab">Hasil Olahan</div>

			</div>
		</div>	

</div>