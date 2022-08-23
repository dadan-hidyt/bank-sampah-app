<!-- s:homepage -->
<div class="row">
  <div class="col-12 py-2 mb-2">
    <h4>Dashboard</h4>
    <p class="text-gray">Selamat siang, <?= empty(core()->user->getNama()) ? core()->user->getUsername() : core()->user->getNama(); ?>, anda login sebagai <?= strtoupper(core()->user->getAkses()); ?> </p>
  </div>
</div>
<?php
$data_diri =  core()->user->dataDiri();
$message = null;
if (empty($data_diri)) {
  $message = <<<MSG_EOF
      Data diri tidak lengkap! Silahkan isi data diri terlebih dahulu! <a href="akun.php?data-diri&edit">Isi / Edit data diri</a>
    MSG_EOF;
}
if (!empty($message)) {
?>
  <p class="alert alert-warning"><i class="mdi mdi-information"></i><?= $message; ?></p>
<?php
}
?>
<!-- S:HOMEPAGE -->
<div class="row">
  <div class="col-lg-4 col-md-6 col-sm-12 equel-grid">
    <div class="grid">
      <div class="grid-body">
        <div class="split-header">
          <p class="card-title">SALDO</p>
          <span class="btn action-btn btn-xs component-flat" data-toggle="tooltip" data-placement="left" title="Available balance since the last week">
            <i class="mdi mdi-information-outline text-muted mdi-2x"></i>
          </span>
        </div>
        <div class="d-flex align-items-end mt-2">
          <h1>RP. <?= core()->user->getSaldo(); ?></h1>
        </div>
        <div class="d-flex mt-3 mb-3">
          <small class="mb-0 text-primary">History (<?= count($this->data['history_tabungan']) ?>)</small>
        </div>
        <?php if (!empty($this->data['history_tabungan'])) : ?>
          <?php foreach ($this->data['history_tabungan'] as $value) : ?>
            <?php if ($value['saldo_masuk'] != 0) : ?>
              <div class="d-flex justify-content-between border-bottom py-2">
                <p class="text-black">Saldo masuk</p>
                <p class="text-gray">+<?= formatRupiah($value['saldo_masuk']) ?> <i><?= $value['deskripsi'] ?></i></p>
              </div>
            <?php elseif ($value['saldo_keluar'] != 0) : ?>
              <div class="d-flex justify-content-between border-bottom py-2">
                <p class="text-black">Saldo keluar</p>
                <p class="text-gray">-<?= formatRupiah($value['saldo_keluar']) ?> <i><?= $value['deskripsi'] ?></i></p>
              </div>
            <?php endif ?>
          <?php endforeach ?>
          <a href="">Lihat lainya</a>
        <?php else : ?>
          <span>Belum ada saldo apapun!</span>
        <?php endif ?>
      </div>
    </div>
  </div>
  <!-- start update harga -->
  <div class="col-lg-8 col-md-6 equel-grid">
    <div class="grid">
      <div class="grid-body py-3">
        <p class="card-title ml-n1">UPDATE HARGA</p>
      </div>
      <div class="table-responsive">
        <table class="table table-stretched">
          <thead>
            <tr>
              <th>Nama Barang</th>
              <th>Satuan</th>
              <th>Harga Hari Ini</th>
              <th>Harga Sebelumnya</th>
              <th>Change</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <p class="mb-n1 font-weight-medium">Botol AQUA</p>
              </td>
              <td class="font-weight-medium">KG</td>
              <td class="font-weight-medium">Rp. 4000</td>
              <td class="font-weight-medium">Rp. 3.500</td>
              <td class="text-danger font-weight-medium">
                <div class="badge badge-success"><i class="mdi mdi-arrow-up"></i> 500</div>
              </td>
            </tr>

            <tr>
              <td>
                <p class="mb-n1 font-weight-medium">Kertas</p>
              </td>
              <td class="font-weight-medium">KG</td>
              <td class="font-weight-medium">Rp. 2000</td>
              <td class="font-weight-medium">Rp. 2500</td>
              <td class="text-danger font-weight-medium">
                <div class="badge badge-danger"><i class="mdi mdi-arrow-down"></i> 500</div>
              </td>
            </tr>

            <tr>
              <td>
                <p class="mb-n1 font-weight-medium">Kaleng</p>
              </td>
              <td class="font-weight-medium">KG</td>
              <td class="font-weight-medium">Rp. 10.000</td>
              <td class="font-weight-medium">Rp. 8.000</td>
              <td class="text-danger font-weight-medium">
                <div class="badge badge-success"><i class="mdi mdi-arrow-up"></i>2.000</div>
              </td>
            </tr>

            <tr>
              <td>
                <p class="mb-n1 font-weight-medium">Bungkus Kopi ABC</p>
              </td>
              <td class="font-weight-medium">KG</td>
              <td class="font-weight-medium">Rp. 5.000</td>
              <td class="font-weight-medium">Rp. 4.500</td>
              <td class="text-danger font-weight-medium">
                <div class="badge badge-success"><i class="mdi mdi-arrow-up"></i>500</div>
              </td>
            </tr>

          </tbody>
        </table>
      </div>
    </div>
  </div>

  <?php if (core()->user->isMember()) : ?>
    <div class="col-md-12 equel-grid">
      <div class="grid">
        <div class="grid-body py-3">
          <p class="card-title ml-n1">PENJUALAN BULAN INI</p>
        </div>
        <div class="table-responsive">
          <table class="table table-hover table-sm">
            <thead>
              <tr class="solid-header">
                <th colspan="2" class="pl-4">PENAMPUNG</th>
                <th>NO TRANSAKSI</th>
                <th>SALDO</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="pr-0 pl-4">
                  <img class="profile-img img-sm" src="../assets/images/profile/male/image_4.png" alt="profile image">
                </td>
                <td class="pl-md-0">
                  <small class="text-black font-weight-medium d-block">KARTA-RW-10</small>
                  <span class="text-gray">
                    <i class="text-primary mdi mdi-map-marker"></i>Jl. Prabu gajah agung nomor 3</span>
                </td>
                <td>
                  <a href="transaksi.php?detail="><small>TRX-JL-92731020920201</small></a>
                </td>
                <td> +RP. 78.000 </td>
              </tr>
              <tr>
                <td class="pr-0 pl-4">
                  <img class="profile-img img-sm" src="../assets/images/profile/male/image_4.png" alt="profile image">
                </td>
                <td class="pl-md-0">
                  <small class="text-black font-weight-medium d-block">KARTA-RW-10</small>
                  <span class="text-gray">
                    <i class="text-primary mdi mdi-map-marker"></i>Jl. Prabu gajah agung nomor 3</span>
                </td>
                <td>
                  <a href="transaksi.php?detail="><small>TRX-JL-92731020934431</small></a>
                </td>
                <td> +RP. 8.000 </td>
              </tr>

            </tbody>
          </table>
        </div>
        <a class="border-top px-3 py-2 d-block text-gray" href="#">
          <small class="font-weight-medium"><i class="mdi mdi-chevron-down mr-2"></i>View All Order History</small>
        </a>
      </div>
    </div>
  <?php endif ?>

</div>
<!-- e:homepage -->