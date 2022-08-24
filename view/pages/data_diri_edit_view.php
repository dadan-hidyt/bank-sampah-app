<?php create_breadcrumb(['akun' => 'akun.php', 'data_diri'=>'akun.php?data-diri','edit'])?>
<div class="profile-container w-100 p-4 bg-white rounded shadow-sm">
    <?= session()->getFlash('data_diri_edited'); ?>
    <h2 class="font-weight-bold mt-0">
        DATA DIRI
    </h2>
    <form enctype="multipart/form-data" method='POST' action="">
        <div class="mt-4">
            <label for="" class="w-100 fs-16 font-weight-bold">Nama lengkap</label>
            <input required autofocus name ='nama_lengkap' class="w-100 p-3 border border-gray rounded-lg" value="<?= core()->user->dataDiri()->nama_lengkap ?? null;?>">
        </div>
        <div class="mt-4">
            <label for="" class="w-100 fs-16 font-weight-bold">No. KTP</label>
            <input required autofocus name ='no_ktp' class="w-100 p-3 border border-gray rounded-lg" value="<?= core()->user->dataDiri()->no_ktp ?? null; ?>">
        </div>
        <div class="d-flex mt-4">
            <div class="w-50 mr-2">
                <label for="" class="w-100 fs-16 font-weight-bold">Tempat lahir</label>
                <input required autofocus name="tempat_lahir"  class="w-100 p-3 border border-gray rounded-lg" value="<?= core()->user->dataDiri()->tempat_lahir ?? null; ?>">
            </div>
            <div class="w-50 ml-2">
                <label for="" class="fs-16 font-weight-bold">Tanggal lahir</label>
                <input required autofocus name="tanggal_lahir" type='date' class="w-100 p-3 border border-gray rounded-lg" value="<?= core()->user->dataDiri()->tanggal_lahir ?? null; ?>">
            </div>
        </div>
        <div class="d-flex mt-4 justify-content-between">
        <!-- <div class="w-25">
            <label for="" class="w-100 fs-16 font-weight-bold">Agama</label>
            <input required autofocus  class="w-100 p-3 border border-gray rounded-lg" value="Islam KTP">
        </div> -->
        <div class="w-50 mr-2">
            <label for="" class="w-100 fs-16 font-weight-bold">Agama</label>
            <select autofocus class='border border-gray rounded-lg w-100 p-3' name="agama" id="">
                <option value="islam">islam</option>
                <option value="kristen">kristen</option>
                <option value="budha">budha</option>
            </select>
        </div>
        <div class="w-25 ml-2 mr-2">
            <label for="" class="w-100 fs-16 font-weight-bold">RT</label>
            <input required autofocus name="rt" class="w-100 p-3 border border-gray rounded-lg" value="<?= core()->user->dataDiri()->rt ?? null ?>">
        </div>
        <div class="w-25 ml-2">
            <label for="" class="w-100 fs-16 font-weight-bold">RW</label>
            <input required autofocus name="rw" class="w-100 p-3 border border-gray rounded-lg" value="<?= core()->user->dataDiri()->rw ?? null ?>">
            
        </div>
    </div>
    <div class="d-flex mt-4">
        <div class="w-50 mr-2">
            <label for="" class="fs-16 font-weight-bold">Kelurahan/Desa</label>
            <div>
               <input required autofocus class="border border-gray rounded-lg w-100 p-3" value='<?= core()->user->dataDiri()->kelurahan_desa ?? null; ?>' name="kelurahan_desa" id="">
           </div>
       </div>
       <div class="w-50 ml-2">
        <label for="" class="w-100 fs-16 font-weight-bold">Kecamatan</label>
        <input required autofocus name="kecamatan" class="w-100 p-3 border border-gray rounded-lg" value="<?= core()->user->dataDiri()->kecamatan ?? null; ?>">
    </div>
</div>
<div class="d-flex mt-4">
    <div class="w-50 mr-2">
        <label for="" class="w-100 fs-16 font-weight-bold">Kabupaten</label>
        <input required autofocus name="kabupaten" class="w-100 p-3 border border-gray rounded-lg" value="<?= core()->user->dataDiri()->kabupaten ?? null ?>">
    </div>
    <div class="w-50 ml-2">
        <label for="" class="w-100 fs-16 font-weight-bold">Provinsi</label>
        <input required autofocus name="provinsi" class="w-100 p-3 border border-gray rounded-lg" value="<?= core()->user->dataDiri()->provinsi ?? null ?>">
    </div>
</div>
<div class="mt-4">
    <label for="" class="w-100 fs-16 font-weight-bold">Alamat</label>
    <textarea required autofocus name="alamat" class="w-100 p-3 border border-gray rounded-lg" value="<?= core()->user->dataDiri()->alamat ?? null ?>"><?= core()->user->dataDiri()->alamat ?? null ?></textarea>
</div>

<div class="mt-4">
    <label for="" class="w-100 fs-16 font-weight-bold">Foto KTP</label>
    <i>Upload foto KK maxsimal 10 MB</i>
    <input accept="image/*" name="foto_ktp" class="w-100 p-3 border border-gray rounded-lg" type="file">
    <?php if ((core()->user->dataDiri()->foto_ktp ?? null) !== null ): ?>
    <img width="400px" class="img-thumbnail mt-3" src="<?= base_url().core()->user->dataDiri()->foto_ktp ?>" alt="Foto KTP">
    <br>
    <a target="__blank" href="<?= base_url().core()->user->dataDiri()->foto_ktp ?>">Lihat</a>
<?php endif ?>
</div>
<div class="mt-4">
    <label for="" class="w-100 fs-16 font-weight-bold">Foto KK</label>
    <i>Upload foto KK maxsimal 10 MB</i>
    <input accept="image/*" name="foto_kk" class="w-100 p-3 border border-gray rounded-lg" type="file">
    <?php if ((core()->user->dataDiri()->photo_kk ?? null) !== null ): ?>
    <img width="400px" class="img-thumbnail mt-3" src="<?= base_url().core()->user->dataDiri()->photo_kk ?>" alt="Foto KK">
    <br>
    <a target="__blank" href="<?= base_url().core()->user->dataDiri()->photo_kk ?>">Lihat</a>
<?php endif ?>
</div>
<div class="mt-4">
    <?php if (!empty(core()->user->dataDiri())): ?>
    <button name="update_data_diri" class="btn btn-primary">UPDATE</button>
    <?php else: ?>
        <button name="tambah_data_diri" class="btn btn-primary">SUBMIT</button>
    <?php endif; ?>
</div>
</form>
</div>
