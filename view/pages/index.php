<!-- s:homepage -->
<div class="row">
  <div class="col-12 py-2 mb-2">
    <h4>Dashboard</h4>
    <p class="text-gray">Selamat siang, <?= core()->user->getName(); ?>, anda login sebagai <?= strtoupper(core()->user->getAkses()); ?> </p>
  </div>
</div>
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
          <h1>RP. 120.000</h1>
        </div>
        <div class="d-flex mt-3 mb-3">
          <small class="mb-0 text-primary">Pengeluaran bulan ini (2)</small>
        </div>
        <div class="d-flex justify-content-between border-bottom py-2">
          <p class="text-black">Bayar iyuran masjid</p>
          <p class="text-gray">Rp. 10.000</p>
        </div>
        <div class="d-flex justify-content-between border-bottom py-2">
          <p class="text-black">Isi galon</p>
          <p class="text-gray">Rp. 5.000</p>
        </div>
        <a href="">See all</a>

      </div>
    </div>
  </div>
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

</div>
<!-- e:homepage -->