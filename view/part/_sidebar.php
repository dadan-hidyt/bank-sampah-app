<!-- s:sidebar -->
<div class="sidebar">
        <div class="user-profile">
          <div class="display-avatar animated-avatar">
            <img class="profile-img img-lg rounded-circle" style="object-fit: cover;" src="<?= base_url(); ?>assets/images/profile/male/image_5.png" alt="profile image">
          </div>
        </div>
        <ul class="navigation-menu">
          <li class="nav-category-divider">Dadan Hidayat</li>
          <!-- get all -->
         <?php
         echo core()->menu_akses->getMenu();
         ?>
        </ul>
       
      </div>
<!-- e:sidebar -->