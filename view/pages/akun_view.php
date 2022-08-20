<?php create_breadcrumb(['akun']) ?>
<div class="ep-wrapper w-100">
  <div class="w-100 py-3">
    <div class="d-flex flex-column justify-content-center w-100">
     <div class="logo-profil rounded-circle border border-success mx-auto">
      <img id="logo" src="<?= base_url(core()->user->getPhoto() ?? 'assets/images/profile/female/image_1.png'); ?>" class="rounded-circle profile profile-photo">
    </div>
    <div class="w-100 text-center">
      <i id="pen_icon" class='mdi mdi-lead-pencil mdi-4x text-success'></i>
      <div id="progress"></div>
    </div>
  </div>
  <!-- begin:form -->
  <form action="" name="ep" class="w-100 d-flex flex-col">
    <input accept="image/*" onchange="photo(event)" type="file" name="file" id="file" class="file">
    <div class="ep-container w-100 mt-4 d-flex flex-wrap justify-content-between">
      <div class="w-100">
        <label for=" lastname">Username :</label>
        <input disabled type="text" class="form-control border border-dark fs-2 py-4" value="<?= core()->user->getUsername() ?>">
      </div>
      <div class="w-100 mt-4">
        <label for=" lastname">Email :</label>
        <input type="text" name="email" class="form-control border border-dark fs-2 py-4" value="<?= core()->user->getEmail() ?>">
      </div>
      <div class="mt-3 mb-2">
        <b>SECURITY</b>
      </div>
      <div class="w-100 mt-2">
        <label for="email">Password Baru :</label>
        <input type="email" name="password" class="form-control border border-dark fs-2 py-4">
      </div>
      <div class="w-100 mt-4">
        <label for="email">Ketikan ulang password baru :</label>
        <input type="email" name="repeat_password" class="form-control border border-dark fs-2 py-4">
      </div>
      <button type="submit" class="btn btn-md mt-4 bg-success">Simpan perubahan</button>
      <a href="akun.php?data-diri" class="btn btn-md mt-4 bg-warning">Data Diri</a>
    </div>
  </form>
  <!-- end:form -->
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
 //upload photo profile
 function photo(event) {
   const file = event.target.files[0];
   const filename = file?.name ?? 'Tidak ada gambar';
       //icon edit
       const icon_edit = document.getElementById('pen_icon');
       icon_edit.classList.remove('mdi');
       icon_edit.classList.remove('mdi-lead-pencil');
       icon_edit.innerText = filename;
       //preview
       const image = URL.createObjectURL(file);
       //if image not null or image not undefined
       if (image) {
        image_profile.src = image;
        const Data = new FormData();
        Data.append('gambar', file);
        const progress = document.querySelector('#progress');
        const AJAX = new XMLHttpRequest();
        AJAX.open('POST', '<?= base_url('ajax/setting/akun.php?profile_photo') ?>');
        AJAX.responseType = 'json';
        AJAX.upload.onprogress = function(e) {
          const complete = Math.ceil((e.loaded/e.total) * 100);
          progress.innerHTML = `<progress max='100' min='0' value='${complete}'></progress>`;
        }
        //if onload
        AJAX.onload = function(e) {
          const response = e.target.response;
          if (response.error == false) {
            progress.innerHTML = response.msg;
          } else {
            progress.innerHTML = response.msg;
          }
        }
        AJAX.send(Data);
      } else {
        image_profile.src = original;
      }
    }
  </script>