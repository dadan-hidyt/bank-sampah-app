<!-- s:sidebar -->
<div class="sidebar">
  <div class="user-profile">
    <div class="display-avatar border border-success">
      <img class="profile-img img-lg rounded-circle" style="object-fit: cover;" src="<?= base_url(core()->user->getPhoto() ?? 'assets/images/profile/female/image_1.png'); ?>" alt="profile image">
    </div>
  <!--   <div class="info-wrapper">
    </div> -->
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
  core()->menu_akses->setAkses(core()->user->getAkses());
  echo core()->menu_akses->getMenu();
  ?>
  <li>
    <a onclick="return confirm('Yakin dek?')" href="logout.php">
      <span class="link-title">Logout</span>
      <i class="mdi mdi-gauge link-icon"></i>
    </a>
  </li>
</ul>
</div>
<!-- e:sidebar -->