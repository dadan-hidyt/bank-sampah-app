<style>
    .register{
        margin-top: -50px;
    }
    .form-control{
        caret-color:red;
        border:2px solid #dedede;
    }
    .grid{
        border-radius: 10px;
        box-shadow:none;
        overflow: hidden;
        border:none;
    }
    .grid-header{
        border:none;
    }
    .authentication-theme {
        border:none;
    }
</style>
<!-- begin:login -->
<div class="authentication-theme auth-style_1 mb-5">
    <div class="col-md-4 register mx-auto">
        <div class="grid">
            <div class="grid-header">
                <b>Register</b>
            </div>
            <div class="grid-body mt-0">
                <div>
                    <?php
                        //get flash
                    $error =  session()->getFlash('register_gagal_message');
                    if(!empty($error)) {
                     ?>
                     <div id="message-alert">
                         <?=  $error; ?>
                     </div>
                     <?php
                 }
                 ?>
             </div>
             <form action="" method='POST'>
                <div class="form-group">
                    <label for="email/username">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class='form-control form-control-lg'>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="username" name="username" class='form-control form-control-lg'>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class='form-control form-control-lg'>
                </div>
                <div class="form-group">
                    <label for="phone_number">Nomor Hp</label>
                    <input type="phone_number" name="no_hp" class='form-control form-control-lg'>
                </div>
                <div class="form-group">
                    <label for="password">Buat Password</label>
                    <input type="password" name="password" class='form-control form-control-lg'>
                </div>
                <div class="form-group">
                    <label for="password_confirm">Konfimasi Password</label>
                    <input type="password" name="konfirmasi_password" class='form-control form-control-lg'>
                </div>
                <div class="form-group">
                    <label for="daftar_sebagai">Daftar sebagai</label>
                    <select name="sebagai" class="form-control form-control-lg" id="daftar_sebagai">
                        <?php 
                        $query = db()->query("SELECT id_akses,nama_akses FROM tb_akses");
                        while ($result = $query->fetch_assoc()) {
                           if ($result['nama_akses'] !== 'admin') {
                               ?>
                               <option value="<?= $result['id_akses'] ?>"><?= $result['nama_akses']; ?></option>
                               <?php
                           }
                       }
                       ?>
                   </select>
               </div>
               <div class="w-100 d-flex justify-content-end mb-3">
                Sudah punya akun? <a href="login.php">login</a>
            </div>
            <div class="form-group">
                <button name="daftar" type="submit" class="btn btn-block btn-primary">DAFTAR</button>
            </div>
        </form>
    </div>
</div>
</div>
</div>
<script>
    window.onload = function() {
     setTimeout(function(){
        $('#message-alert').hide(200).animate({opacity:0})
    },5000);
 }
</script>