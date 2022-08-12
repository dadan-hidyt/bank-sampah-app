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
    <form enctype="multipart/form-data" method='POST' action="">
        <div class="mt-4">
            <label for="" class="w-100 fs-16 font-weight-bold">Nama lengkap</label>
            <input name ='nama_lengkap' class="w-100 p-3 border border-gray rounded-lg" value="<?= core()->user->dataDiri()->nama_lengkap ?? null;?>">
        </div>
        <div class="mt-4">
            <label for="" class="w-100 fs-16 font-weight-bold">No. KTP</label>
            <input name ='no_ktp' class="w-100 p-3 border border-gray rounded-lg" value="<?= core()->user->dataDiri()->no_ktp ?? null; ?>">
        </div>
        <div class="d-flex mt-4">
            <div class="w-50 mr-2">
                <label for="" class="w-100 fs-16 font-weight-bold">Tempat lahir</label>
                <input name="tempat_lahir"  class="w-100 p-3 border border-gray rounded-lg" value="<?= core()->user->dataDiri()->tempat_lahir ?? null; ?>">
            </div>
            <div class="w-50 ml-2">
                <label for="" class="fs-16 font-weight-bold">Tanggal lahir</label>
                <input name="tanggal_lahir" type='date' class="w-100 p-3 border border-gray rounded-lg" value="<?= core()->user->dataDiri()->tanggal_lahir ?? null; ?>">
            </div>
        </div>
        <div class="d-flex mt-4 justify-content-between">
        <!-- <div class="w-25">
            <label for="" class="w-100 fs-16 font-weight-bold">Agama</label>
            <input  class="w-100 p-3 border border-gray rounded-lg" value="Islam KTP">
        </div> -->
        <div class="w-50 mr-2">
            <label for="" class="w-100 fs-16 font-weight-bold">Agama</label>
            <input name="agama" class="w-100 p-3 border border-gray rounded-lg" value="<?= core()->user->dataDiri()->agama ?? null ?>">
        </div>
        <div class="w-25 ml-2 mr-2">
            <label for="" class="w-100 fs-16 font-weight-bold">RT</label>
            <input name="rt" class="w-100 p-3 border border-gray rounded-lg" value="<?= core()->user->dataDiri()->rt ?? null ?>">
        </div>
        <div class="w-25 ml-2">
            <label for="" class="w-100 fs-16 font-weight-bold">RW</label>
            <input name="rw" class="w-100 p-3 border border-gray rounded-lg" value="<?= core()->user->dataDiri()->rw ?? null ?>">
            
        </div>
    </div>
    <div class="d-flex mt-4">
        <div class="w-50 mr-2">
            <label for="" class="fs-16 font-weight-bold">Kelurahan/Desa</label>
            <div >
             <select class="p-3 border border-gray rounded-lg" name="kelurahan_desa" id="">
                 <option value="Margalaksana">Desa Margalaksana</option>
                 <option value="Margalaksana">Desa Bangbayang</option>
                 <option value="Margalaksana">Desa sukamaju</option>
                 <option value="Margalaksana">Desa Sekarwangi</option>


             </select>
         </div>
     </div>
     <div class="w-50 ml-2">
        <label for="" class="w-100 fs-16 font-weight-bold">Kecamatan</label>
        <input name="kecamatan" class="w-100 p-3 border border-gray rounded-lg" value="<?= core()->user->dataDiri()->kecamatan ?? null; ?>">
    </div>
</div>
<div class="d-flex mt-4">
    <div class="w-50 mr-2">
        <label for="" class="w-100 fs-16 font-weight-bold">Kabupaten</label>
        <input name="kabupaten" class="w-100 p-3 border border-gray rounded-lg" value="<?= core()->user->dataDiri()->kabupaten ?? null ?>">
    </div>
    <div class="w-50 ml-2">
        <label for="" class="w-100 fs-16 font-weight-bold">Provinsi</label>
        <input name="provinsi" class="w-100 p-3 border border-gray rounded-lg" value="<?= core()->user->dataDiri()->provinsi ?? null ?>">
    </div>
</div>
<div class="mt-4">
    <label for="" class="w-100 fs-16 font-weight-bold">Alamat</label>
    <input name="alamat" class="w-100 p-3 border border-gray rounded-lg" value="<?= core()->user->dataDiri()->alamat ?? null ?>">
</div>

<div class="mt-4">
    <label for="" class="w-100 fs-16 font-weight-bold">Foto KK</label>
    <i>Upload foto KK maxsimal 10 MB</i>
    <input name="foto_kk" class="w-100 p-3 border border-gray rounded-lg" type="file">
</div>
<div class="mt-4">
    <label for="" class="w-100 fs-16 font-weight-bold">Foto KTP</label>
    <i>Upload foto KK maxsimal 10 MB</i>
    <input name="foto_ktp" class="w-100 p-3 border border-gray rounded-lg" type="file">
</div>
<div class="mt-4">
    <button name="update_data_diri" class="btn btn-primary">SUBMIT</button>
</div>
</form>

</div>
