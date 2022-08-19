<style>
    .register{
        margin-top: -50px;
    }
</style>
<!-- container -->
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
                            $error =  session()->getFlash('login_gagal_message');
                            if(!empty($error)) {
                                echo $error;
                            }
                        ?>
                    </div>
                   <form action="" method='post'>
                        <div class="form-group">
                            <label for="email/username">Nama Lengkap</label>
                            <input type="text" name="email" class='form-control form-control-lg'>
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
                            <input type="phone_number" name="phone_number" class='form-control form-control-lg'>
                        </div>
                        <div class="form-group">
                            <label for="password">Buat Password</label>
                            <input type="password" name="password" class='form-control form-control-lg'>
                        </div>
                        <div class="form-group">
                            <label for="password_confirm">Konfimasi Password</label>
                            <input type="password_confirm" name="password_confirm" class='form-control form-control-lg'>
                        </div>
                        <div class="w-100 d-flex justify-content-end mb-3">
                            Sudah punya akun? <a href="login.php">login</a>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-block btn-primary">DAFTAR</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- end:login -->
<!-- end:contaner -->