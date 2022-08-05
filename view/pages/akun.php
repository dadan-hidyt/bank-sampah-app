<div class="ep-wrapper w-100">
    <h1 class="py-4">Edit Profile</h1>
    <div class="w-100 py-3">
            <div class="d-flex flex-column justify-content-center w-100">
               <div class="logo-profil rounded-circle border border-primary mx-auto">
                  <img id="logo" src="<?=base_url()?>assets/images/profile/female/image_6.png" class="rounded-circle">
               </div>
               <div class="w-100 text-center">
                <i class='mdi mdi-lead-pencil mdi-4x text-primary'></i>
               </div>
            </div>
        <form action="" name="ep" class="w-100 d-flex flex-col justify-content-center">
        <input type="file" name="file" id="file" class="file">
        <div class="ep-container w-50 mt-4 d-flex justify-content-between">
            <div class="w-50 px-4">
                <input type="text" class="form-control py-4" placeholder="Nama Depan" value="Dadan">
            </div>
            <div class="w-50 px-4">
                <input type="text" class="form-control py-4" placeholder="Nama Belakang" value="Hidayat">
            </div>
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