<!-- s:sidebar -->
<div class="sidebar">
        <div class="user-profile">
          <div class="display-avatar border border-success">
            <img class="profile-img img-lg rounded-circle" style="object-fit: cover;" src="<?= base_url(); ?>assets/images/profile/female/image_6.png" alt="profile image">
          </div>
          <div class="info-wrapper">
            <p class="user-name">Member: Dadan ...</p>
            <h6 class="display-income">Rp. 29.000</h6>
          </div>
        </div>
        <ul class="navigation-menu">
           <li>
            <a href="home.php">
              <span class="link-title">Dashboard</span>
              <i class="mdi mdi-gauge link-icon"></i>
            </a>
          </li>
          <!-- get all -->
         <?php
         core()->menu_akses->setAkses(1);
         echo core()->menu_akses->getMenu();
         ?>
        </ul>
       
      </div>
<!-- e:sidebar -->