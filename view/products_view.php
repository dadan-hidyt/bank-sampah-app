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
			  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
			  	
			  	<div class="row_all_product row">
			  		<?php 
			  			for ($i=0; $i <= 11; $i++) { 
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
			  <div class="tab-pane fade" id="pills-best_product" role="tabpanel" aria-labelledby="pills-profile-tab">Best Product</div>
			  <div class="tab-pane fade" id="pills-organik_trash" role="tabpanel" aria-labelledby="pills-contact-tab">Organik</div>
			  <div class="tab-pane fade" id="pills-Nonorganik_trash" role="tabpanel" aria-labelledby="pills-contact-tab">Non-Organik</div>
			  <div class="tab-pane fade" id="pills-hasil_olahan" role="tabpanel" aria-labelledby="pills-contact-tab">Hasil Olahan</div>

			</div>
		</div>	

</div>