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
    height: 120px;
  }

  @media (min-width: 992px) {
    .space {
      margin-top: 40px !important;
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
                    Detail Harga
                  </div>
                  <div class="py-5 fs-20 d-flex justify-content-center align-items-center h-100">Subtotal : Rp.
                    <span>100,000</span>
                  </div>
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
                          <th scope="col">Qty</th>
                          <th scope="col">Satuan</th>
                          <th scope="col">Total Harga</th>
                        </tr>
                      </thead>
                      <tbody class="bg-white">
                        <tr>
                          <th scope="row">1</th>
                          <td>Muhammad</td>
                          <td>10000</td>
                          <td>10</td>
                          <td>4pcs</td>
                          <td>100000</td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td>Aisyah</td>
                          <td>10000</td>
                          <td>10</td>
                          <td>4pcs</td>
                          <td>100000</td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td>Fatimah</td>
                          <td>10000</td>
                          <td>10</td>
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
                      <div class="fs-16 mt-2">
                        Kembalian : RP.<span>5.000</span>
                      </div>
                    </div>
                    <div>
                      <button type="button" class="py-2 px-4 border-0 bg-primary rounded-md text-white">
                        Konfirmasi
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- end -->
