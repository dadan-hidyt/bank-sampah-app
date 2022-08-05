<!-- s:navigation -->
<nav class="t-header">
    <div class="t-header-brand-wrapper">
        <a href="index.html">
            <img width='30px' height="40px" class="logo" src="<?= base_url(); ?>assets/images/logo.svg" alt="">
            <img class="logo-mini" src="<?= base_url(); ?>assets/images/logo_mini.svg" alt="">
        </a>
    </div>
    <div class="t-header-content-wrapper">
        <div class="t-header-content">
            <button class="t-header-toggler t-header-mobile-toggler d-block d-lg-none">
                <i class="mdi mdi-menu"></i>
            </button>
            <ul class="nav ml-auto">


                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="appsDropdown" data-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-account-circle mdi-1x"></i>
                    </a>
                    <div class="dropdown-menu navbar-dropdown dropdown-menu-right" aria-labelledby="appsDropdown">
                        <div class="dropdown-header">
                            <h6 class="dropdown-title">Akun</h6>
                        </div>
                        <div class="dropdown-body border-top pt-0">
                            <a class="dropdown-grid">
                                <i class="grid-icon mdi mdi-arrow-up-bold-circle mdi-2x"></i>
                                <span class="grid-tittle">Profile</span>
                            </a>
                            <a class="dropdown-grid">
                                <i class="grid-icon mdi mdi-arrow-down-bold-circle mdi-2x"></i>
                                <span class="grid-tittle">Edit</span>
                            </a>
                            <a class="dropdown-grid">
                                <i class="grid-icon mdi mdi-logout mdi-2x"></i>
                                <span class="grid-tittle">Logout</span>
                            </a>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="logout"><i class="grid-icon mdi mdi-logout mdi-1x"></i></a>
                </li>

            </ul>
        </div>
    </div>
</nav>
<!-- e:navigation -->