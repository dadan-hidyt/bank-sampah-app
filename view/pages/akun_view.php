<?php create_breadcrumb(['akun']) ?>
<div class="ep-wrapper w-100">
  <div class="w-100 py-3">
    <div class="d-flex mb-3 flex-column justify-content-center w-100">
     <div class="logo-profil border border-success">
      <img id="logo" src="<?= base_url(core()->user->getPhoto() ?? 'assets/images/profile/female/image_1.png'); ?>" class="profile">
    </div>
    <div class="w-100">
      <i style='cursor:pointer;' id="pen_icon" class='mdi mdi-lead-pencil mdi-4x text-success'>EDIT</i>
      <div id="progress"></div>
    </div>
  </div>
  <!-- begin:form -->
     <form action="" name="ep" class="w-100 bg-white p-4 rounded shadow-sm d-flex flex-col">
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
           <div class="w-100 mt-4">
                   <button type="submit" class="btn btn-md mt-4 bg-success">Simpan perubahan</button>
           </div>
         </div>
        </form>

      <div class="mt-3 bg-white p-4 w-100 mb-2 rounded shadow-sm">
        <form id='security' action='akun.php?security_update' method='POST'>
        <b>SECURITY</b>
        <?php
        //get flash
        $error =  session()->getFlash('security_update');
        if(!empty($error)) {
          ?>
            <?php echo $error; ?>
          <?php
        }
        ?>
      <div class="w-100">
        <label for="email">Password Baru :</label>
        <input type="text" name="password" class="form-control border border-dark fs-2 py-4">
      </div>
      <div class="w-100 mt-4">
        <label for="email">Ketikan ulang password baru :</label>
        <input type="text" name="repeat_password" class="form-control border border-dark fs-2 py-4">
      </div>
     <div class="d-flex justify-content-between">  
      <button type="submit" class="btn btn-md mt-4 bg-success">Simpan perubahan</button>
      <a href="akun.php?data-diri" class="btn btn-md mt-4 bg-warning">Data Diri</a>
    </div>
      </form>
    </div>
  </div>

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