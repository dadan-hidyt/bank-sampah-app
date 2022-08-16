<?php create_breadcrumb(['akun']) ?>
<div class="ep-wrapper w-100">
    <div class="w-100 py-3">
        <div class="d-flex flex-column justify-content-center w-100">
         <div class="logo-profil rounded-circle border border-success mx-auto">
          <img id="logo" src="<?=base_url()?>assets/images/profile/female/image_6.png" class="rounded-circle profile">
      </div>
      <div class="w-100 text-center">
        <i id="pen_icon" class='mdi mdi-lead-pencil mdi-4x text-success'></i>
    </div>
</div>
<form action="" name="ep" class="w-100 d-flex flex-col">
    <input onchange="photo_preview(event)" type="file" name="file" id="file" class="file">
    <div class="ep-container w-100 mt-4 d-flex flex-wrap justify-content-between">
        <div class="w-100">
            <label for=" lastname">Username :</label>
            <input type="text" class="form-control border border-dark fs-2 py-4" value="<?= core()->user->getUsername() ?>">
        </div>
        <div class="w-100 mt-4">
            <label for=" lastname">Email :</label>
            <input type="text" name="lastname" class="form-control border border-dark fs-2 py-4" value="<?= core()->user->getEmail() ?>">
        </div>
      
        <div class="w-100 mt-4">
            <label for="email">Password lama:</label>
            <input type="email" name="email" class="form-control border border-dark fs-2 py-4" value="dadan.hdyt@gmail.com">
        </div>
        <div class="w-100 mt-4">
            <label for="email">Password Baru :</label>
            <input type="email" name="email" class="form-control border border-dark fs-2 py-4" value="dadan.hdyt@gmail.com">
        </div>
        <div class="w-100 mt-4">
            <label for="email">Ketikan ulang password baru :</label>
            <input type="email" name="email" class="form-control border border-dark fs-2 py-4" value="dadan.hdyt@gmail.com">
        </div>
        <button type="submit" class="btn btn-md mt-4 bg-success">Simpan perubahan</button>
        <a href="akun.php?data-diri" class="btn btn-md mt-4 bg-warning">Data Diri</a>
    </div>
</form>
</div>
</div>
<script>
 const logoImg = document.querySelector(".logo-profil");
 const editBtn = document.querySelector(".mdi-lead-pencil");
 const image_profile = document.querySelector('.profile')
 const original = image_profile.src;
 logoImg.addEventListener("click", function () {
    document.getElementById("file").click();
});
 editBtn.addEventListener("click", function () {
    document.getElementById("file").click();
});

 function photo_preview(event) {
     const file = event.target.files[0];

     const filename = file?.name ?? 'Tidak ada gambar';
       //icon edit
       const icon_edit = document.getElementById('pen_icon');
       icon_edit.classList.remove('mdi');
       icon_edit.classList.remove('mdi-lead-pencil');
       icon_edit.innerText = filename;
       //preview
       const image = URL.createObjectURL(file);
       if (image) {
        image_profile.src = image;
    } else {
        image_profile.src = original;
    }
}
</script>