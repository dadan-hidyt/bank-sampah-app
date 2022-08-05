<div class="ep-wrapper w-100">
    <h1 class="py-4">Edit Profile</h1>
    <div class="w-100 py-3">
            <div class="d-flex flex-column justify-content-center w-100">
               <div class="logo-profil rounded-circle border border-success mx-auto">
                  <img id="logo" src="<?=base_url()?>assets/images/profile/female/image_6.png" class="rounded-circle">
               </div>
               <div class="w-100 text-center">
                <i class='mdi mdi-lead-pencil mdi-4x text-success'></i>
               </div>
            </div>
        <form action="" name="ep" class="w-100 d-flex flex-col justify-content-center">
        <input type="file" name="file" id="file" class="file">
        <div class="ep-container w-50 mt-4 d-flex flex-wrap justify-content-between">
            <div class="w-100">
                <label for=" lastname">Nama depan :</label>
                <input type="text" class="form-control border border-success fs-2 py-4" value="Dadan">
            </div>
            <div class="w-100 mt-4">
                <label for=" lastname">Nama belakang :</label>
                <input type="text" name="lastname" class="form-control border border-success fs-2 py-4" value="Hidayat">
            </div>
            <div class="w-100 mt-4">
                <label for="username">Username :</label>
                <input type="text" name="username" class="form-control border border-success fs-2 py-4" value="dadanhidyat">
            </div>
            <div class="w-100 mt-4">
                <label for="email">Email :</label>
                <input type="email" name="email" class="form-control border border-success fs-2 py-4" value="dadan.hdyt@gmail.com">
            </div>
            <button type="submit" class="btn btn-md mt-4 bg-success">Simpan perubahan</button>
        </div>
        </form>
    </div>
</div>
<script>
    const logoImg = document.querySelector(".logo-profil");
    const editBtn = document.querySelector(".mdi-lead-pencil");
    logoImg.addEventListener("click", function () {
        document.getElementById("file").click();
    });
    editBtn.addEventListener("click", function () {
        document.getElementById("file").click();
    });
</script>