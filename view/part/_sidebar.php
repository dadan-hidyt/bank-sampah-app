<!-- s:sidebar -->
<div class="sidebar">
        <div class="user-profile">
          <div class="display-avatar border border-success">
            <img class="profile-img img-lg rounded-circle" style="object-fit: cover;" src="<?= base_url(); ?>assets/images/profile/female/image_6.png" alt="profile image">
          </div>
        </div>
        <ul class="navigation-menu">
          <li class="nav-category-divider">Dadan Hidayat</li>
          <!-- get all -->
         <?php
          core()->menu_akses->getMenu();
         ?>
        </ul>
       
      </div>
<!-- e:sidebar -->