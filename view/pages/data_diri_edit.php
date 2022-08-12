<?php create_breadcrumb(['akun' => 'akun.php', 'data_diri'=>'akun.php?data-diri','edit'])?>
<div class="profile-container w-75">
    <?= session()->getFlash('data_diri_edited'); ?>
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
            <input  class="w-100 p-3 border border-gray rounded-lg" value="<?= core()->user->dataDiri()->nama_lengkap ?? null;?>">
    </div>
    <div class="mt-4">
            <label for="" class="w-100 fs-16 font-weight-bold">No. KTP</label>
            <input  class="w-100 p-3 border border-gray rounded-lg" value="<?= core()->user->dataDiri()->no_ktp ?? null; ?>">
    </div>
    <div class="d-flex mt-4">
        <div class="w-50 mr-2">
            <label for="" class="w-100 fs-16 font-weight-bold">Tempat lahir</label>
            <input  class="w-100 p-3 border border-gray rounded-lg" value="<?= core()->user->dataDiri()->tempat_lahir ?? null; ?>">
        </div>
        <div class="w-50 ml-2">
            <label for="" class="fs-16 font-weight-bold">Tanggal lahir</label>
            <input  class="w-100 p-3 border border-gray rounded-lg" value="<?= core()->user->dataDiri()->tanggal_lahir ?? null; ?>">
        </div>
    </div>
    <div class="d-flex mt-4 justify-content-between">
        <!-- <div class="w-25">
            <label for="" class="w-100 fs-16 font-weight-bold">Agama</label>
            <input  class="w-100 p-3 border border-gray rounded-lg" value="Islam KTP">
        </div> -->
        <div class="w-50 mr-2">
        <label for="" class="w-100 fs-16 font-weight-bold">Agama</label>
            <input  class="w-100 p-3 border border-gray rounded-lg" value="<?= core()->user->dataDiri()->agama ?? null ?>">
        </div>
        <div class="w-25 ml-2 mr-2">
            <label for="" class="w-100 fs-16 font-weight-bold">RT</label>
            <input  class="w-100 p-3 border border-gray rounded-lg" value="<?= core()->user->dataDiri()->rt ?? null ?>">
        </div>
        <div class="w-25 ml-2">
            <label for="" class="w-100 fs-16 font-weight-bold">RW</label>
            <input  class="w-100 p-3 border border-gray rounded-lg" value="<?= core()->user->dataDiri()->rw ?? null ?>">
            
        </div>
    </div>
    <div class="d-flex mt-4">
        <div class="w-50 mr-2">
            <label for="" class="fs-16 font-weight-bold">Kelurahan/Desa</label>
            <div >
               <select class="p-3 border border-gray rounded-lg" name="" id="">
                   <option value="Margalaksana">Desa Margalaksana</option>
                   <option value="Margalaksana">Desa Bangbayang</option>
                   <option value="Margalaksana">Desa sukamaju</option>
                   <option value="Margalaksana">Desa Sekarwangi</option>
                   

               </select>
            </div>
        </div>
        <div class="w-50 ml-2">
            <label for="" class="w-100 fs-16 font-weight-bold">Kecamatan</label>
            <input  class="w-100 p-3 border border-gray rounded-lg" value="<?= core()->user->dataDiri()->kecamatan ?? null; ?>">
        </div>
    </div>
    <div class="d-flex mt-4">
    <div class="w-50 mr-2">
            <label for="" class="w-100 fs-16 font-weight-bold">Kabupaten</label>
            <input  class="w-100 p-3 border border-gray rounded-lg" value="<?= core()->user->dataDiri()->kabupaten ?? null ?>">
        </div>
        <div class="w-50 ml-2">
            <label for="" class="w-100 fs-16 font-weight-bold">Provinsi</label>
            <input  class="w-100 p-3 border border-gray rounded-lg" value="<?= core()->user->dataDiri()->provinsi ?? null ?>">
        </div>
    </div>
    <div class="mt-4">
    <label for="" class="w-100 fs-16 font-weight-bold">Alamat</label>
            <input  class="w-100 p-3 border border-gray rounded-lg" value="<?= core()->user->dataDiri()->alamat ?? null ?>">
    </div>
    <div class="mt-4">
        <a href="akun.php?data-diri&edit" class="btn btn-primary">Edit data diri</a>
    </div>

</div>
