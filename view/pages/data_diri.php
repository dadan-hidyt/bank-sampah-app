<?php create_breadcrumb(['akun' => 'akun.php', 'data_diri'])?>
<div class="profile-container w-75">
    <div class="profile d-flex">
        <div class="logo-profil">
            <img src="<?=base_url()?>assets/images/profile/female/image_6.png">
        </div>
        <div class="status ml-4 d-flex flex-column justify-content-center">
            <h1 class="font-weight-bold mb-2">Dadan Hidayat</h1>
            <span class="font-weight-bold">Lihat informasi pribadimu di halaman ini</span>
        </div>
    </div>
    <h2 class="font-weight-bold mt-5">
        Informasi Pribadi
    </h2>
    <div class="mt-4">
            <label for="" class="w-100 fs-16 font-weight-bold">Nama lengkap</label>
            <input readonly='true' disabled='true' class="w-100 p-3 border border-gray rounded-lg" value="<?= core()->user->dataDiri()->nama_lengkap; ?>">
    </div>
    <div class="mt-4">
            <label for="" class="w-100 fs-16 font-weight-bold">No. KTP</label>
            <input readonly='true' disabled='true' class="w-100 p-3 border border-gray rounded-lg" value="<?= core()->user->dataDiri()->no_ktp; ?>">
    </div>
    <div class="d-flex mt-4">
        <div class="w-50 mr-2">
            <label for="" class="w-100 fs-16 font-weight-bold">Tempat lahir</label>
            <input readonly='true' disabled='true' class="w-100 p-3 border border-gray rounded-lg" value="<?= core()->user->dataDiri()->tempat_lahir; ?>">
        </div>
        <div class="w-50 ml-2">
            <label for="" class="fs-16 font-weight-bold">Tanggal lahir</label>
            <input readonly='true' disabled='true' class="w-100 p-3 border border-gray rounded-lg" value="<?= core()->user->dataDiri()->tanggal_lahir; ?>">
        </div>
    </div>
    <div class="d-flex mt-4 justify-content-between">
        <!-- <div class="w-25">
            <label for="" class="w-100 fs-16 font-weight-bold">Agama</label>
            <input readonly='true' disabled='true' class="w-100 p-3 border border-gray rounded-lg" value="Islam KTP">
        </div> -->
        <div class="w-50 mr-2">
        <label for="" class="w-100 fs-16 font-weight-bold">Agama</label>
            <input readonly='true' disabled='true' class="w-100 p-3 border border-gray rounded-lg" value="<?= core()->user->dataDiri()->agama ?>">
        </div>
        <div class="w-25 ml-2 mr-2">
            <label for="" class="w-100 fs-16 font-weight-bold">RT</label>
            <input readonly='true' disabled='true' class="w-100 p-3 border border-gray rounded-lg" value="<?= core()->user->dataDiri()->rt ?>">
        </div>
        <div class="w-25 ml-2">
            <label for="" class="w-100 fs-16 font-weight-bold">RW</label>
            <input readonly='true' disabled='true' class="w-100 p-3 border border-gray rounded-lg" value="<?= core()->user->dataDiri()->rw ?>">
            
        </div>
    </div>
    <div class="d-flex mt-4">
        <div class="w-50 mr-2">
            <label for="" class="fs-16 font-weight-bold">Kelurahan/Desa</label>
            <div class="p-3 border border-gray rounded-lg">
                <span><?= core()->user->dataDiri()->kelurahan_desa ?></span>
            </div>
        </div>
        <div class="w-50 ml-2">
            <label for="" class="w-100 fs-16 font-weight-bold">Kecamatan</label>
            <input readonly='true' disabled='true' class="w-100 p-3 border border-gray rounded-lg" value="<?= core()->user->dataDiri()->kecamatan; ?>">
        </div>
    </div>
    <div class="d-flex mt-4">
    <div class="w-50 mr-2">
            <label for="" class="w-100 fs-16 font-weight-bold">Kabupaten</label>
            <input readonly='true' disabled='true' class="w-100 p-3 border border-gray rounded-lg" value="<?= core()->user->dataDiri()->kabupaten ?>">
        </div>
        <div class="w-50 ml-2">
            <label for="" class="w-100 fs-16 font-weight-bold">Provinsi</label>
            <input readonly='true' disabled='true' class="w-100 p-3 border border-gray rounded-lg" value="<?= core()->user->dataDiri()->provinsi ?>">
        </div>
    </div>
    <div class="mt-4">
    <label for="" class="w-100 fs-16 font-weight-bold">Alamat</label>
            <input readonly='true' disabled='true' class="w-100 p-3 border border-gray rounded-lg" value="<?= core()->user->dataDiri()->alamat ?>">
    </div>
    <div class="mt-4">
        <a href="akun.php?data-diri&edit" class="btn btn-primary">Edit data diri</a>
    </div>

</div>
