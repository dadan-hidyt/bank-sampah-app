<?php create_breadcrumb(['Pembelian' => 'pembelian.php', 'add transaksi'])?>
<style>
 /* utility */
 .absolute {
  position: absolute;
}

.relative {
  position: relative;
}

.border-gray,
.border-gray:focus {
  border: 1px solid #dddddd;
}

.border-bottom-gray {
  border-bottom: 1px solid #dddddd;
}

.bg-gray {
  background-color: #f0f0f0;
}

.rounded-md {
  border-radius: 6px;
}

.h-auto {
  height: auto;
}

.fs-16 {
  font-size: 16px !important;
}

.fs-14 {
  font-size: 14px;
}

.fs-20 {
  font-size: 20px;
}

.fs-24 {
  font-size: 24px !important;
}

/* content-style */
.card-trx {
  width: 100%;
  border: 1px solid #dddddd;
  background-color: #ffffff;
  border-radius: 6px;
}

.price-total {
  height: 100px;
}

@media (min-width: 992px) {
  .space {
    margin-top: 40px !important;
  }

  .lg-w-25 {
    width: 25% !important;
  }

  .lg-w-50 {
    width: 50% !important;
  }

  .lg-w-45 {
    width: 45% !important;
  }

  .lg-w-48 {
    width: 48% !important;
  }

  .lg-w-75 {
    width: 75% !important;
  }

  .trx-wrapper {
    flex-direction: row !important;
  }
}
</style>
<!-- new transaksi -->
<div class="col-12 py-2 mb-2">
  <div class="trx-wrapper d-flex flex-wrap justify-content-between">
    <div class="card-trx mt-3 lg-w-48">
      <div class="w-100 py-2 px-3 rounded-top border-bottom-gray bg-gray">
        Detail Transaksi
      </div>
      <form class="py-3 px-3 bg-white">
        <div class="mb-2 fs-14">INVOICE : <input type="text" class="text-black border-0 fs-14 bg-white"
          value="INV-BS-2022239835" disabled></div>
          <div class="mb-2 fs-14
          ">Tanggal : <input type="text" class="text-black border-0 fs-14 bg-white" value="04-07-2022"
          disabled></div>
          <div>Nama Member :
            <select class="py-1 px-2 rounded border-gray ml-2 bg-white" name="member"
            id="member">
            <option value="#">Pilih Member</option>
            <?php if(!empty($this->data['data_member'])) : ?>
              <?php foreach($this->data['data_member'] as $data): ?>
                <option value=""><?= $data['nama_lengkap'].' | '.$data['no_ktp'] ?></option>
              <?php endforeach; ?>
              <?php else: ?>
              <?php endif;?>
            </select>
          </div>
        </form>
      </div>
      <div class="card-trx d-flex flex-column mt-3 lg-w-48 bg-white">
        <div class="w-100 py-2 px-3 border-bottom-gray bg-gray">
          Detail Produk
        </div>
        <form class="d-flex py-3 px-3 h-100 align-items-center">
          <div class="w-75">
            <div class="d-flex w-100 mb-2 fs-14
            "><span>KODE PRODUK : </span><input type="text"
            class="w-50 text-black border-0 fs-14 bg-white px-2" value="-- Pilih Produk --" disabled>
          </div>
          <div>Pilih Produk : <select class="p-2 rounded-md border-gray ml-2 bg-white" name="member"
            id="member">
            <option value="#">Nama Produk</option>
            <option value="user_01">Kopi</option>
            <option value="user_02">Detergen</option>
            <option value="user_03">Batu Bata</option>
          </select>
        </div>
        <div class="d-flex w-100 mt-2 fs-14
        "><label for="quantity">Masukan Jumlah :</label>
        <input type="number" id="quantity" name="quantity" class="py-1 w-25 ml-2 rounded-md border-gray">
      </div>
    </div>
    <div class="w-25 d-flex justify-content-end">
      <button type="submit" class="text-white bg-primary py-2 px-4 rounded-md border-0">
        Pilih
      </button>
    </div>

  </form>
</div>
<div class="card-trx mt-3 space">
  <div class="w-100 py-2 px-3 border-bottom-gray bg-gray">
    Transaksi Terbaru
  </div>
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">No.</th>
          <th scope="col">Nama Produk</th>
          <th scope="col">Harga Produk</th>
          <th scope="col">Satuan</th>
          <th scope="col">Qty</th>
          <th scope="col">Total Harga</th>
        </tr>
      </thead>
      <tbody class="bg-white">
        <tr>
          <th scope="row">1</th>
          <td>Muhammad</td>
          <td>10000</td>
          <td>kg</td>
          <td>4pcs</td>
          <td>100000</td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Aisyah</td>
          <td>10000</td>
          <td>kg</td>
          <td>4pcs</td>
          <td>100000</td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>Fatimah</td>
          <td>10000</td>
          <td>gram</td>
          <td>4pcs</td>
          <td>100000</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
<div class="card-trx mt-3 lg-w-48 space">
  <div class="w-100 py-2 px-3 border-bottom-gray bg-gray">
    Rincian Pembayaran
  </div>
  <div class="price-total d-flex justify-content-between align-items-center px-3">
    <div class="w-50">
      <div class="fs-16">
        Total Bayar : RP.<span>105.000</span>
      </div>
    </div>
    <div>
     <button type="button" data-toggle="modal" data-target="#changeBank"
     class="py-2 px-4 border-0 bg-primary rounded-md text-white">
     Konfirmasi
   </button>
 </div>
</div>
</div>
</div>
</div>
<!-- modal -->
<div class="modal fade" id="changeBank" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content px-4 py-4">
    <div class="modal-header border-0 d-flex flex-column">
      <h5 class="modal-title fw-bold" id="exampleModalLongTitle">Metode Pembayaran</h5>
      <div class="d-flex flex-wrap wd-95 mt-1">
        <span class="fsi-14 wd-90 color-gray">Pilih Metode Pembayaran</span>
      </div>
    </div>
    <div class="modal-form">
      <!-- method -->
      <div class="picker d-flex w-100 mt-3 p-3 border shadow-sm rounded-md">
        <div class="d-flex flex-column w-100">
          <span class="fs-16 font-weight-bold">Uang Tunai</span>
          <span class="fs-14 mt-2">Bayar dengan uang tunai</span>
        </div>
      </div>
      <div class="picker d-flex w-100 mt-3 p-3 border shadow-sm rounded-md">
        <div class="d-flex flex-column w-100">
          <span class="fs-16 font-weight-bold">Saldo Bank Sampah</span>
          <span class="fs-14 mt-2">Bayar dengan saldo bank sampah</span>
        </div>
      </div>
    </div>
    <div class="modal-footer border-0 my-2">
      <button type="button" class="py-2 px-4 bg-gray border-0 rounded-md"
      data-dismiss="modal">Tutup</button>
      <button type="submit" class="py-2 px-4 bg-primary text-white border-0 rounded-md">Pilih</button>
    </div>
  </div>
</div>
</div>
<!-- end modal -->

<!-- end -->