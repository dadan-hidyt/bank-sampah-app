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
<div class="authentication-theme auth-style_1">
    <div class="col-md-4 mx-auto mt-3">
        <div class="grid">
            <div class="grid-header">
                <b>Login</b>
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
                        <label for="email/username">Email atau usename</label>
                        <input type="text" name="email" class='form-control form-control-lg'>
                    </div>
                    <div class="form-group">
                        <label for="Password">Password</label>
                        <input type="password" name="password" class='form-control form-control-lg'>
                    </div>

                    <div class="d-flex justify-content-between">
                        <div class="form-group">
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" name="remember_me" class="form-check-input"> Ingat Saya <i class="input-frame"></i>
                            </label>
                        </div>
                    </div>
                    <div class="text-right">
                        Belum punya akun? <a href="daftar_akun.php">register</a>
                    </div>
                </div>
                
                <div class="form-group">
                    <button class="btn btn-block btn-primary">LOGIN</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<!-- end:login -->