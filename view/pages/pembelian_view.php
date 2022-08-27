<?php create_breadcrumb(['pembelian']) ?>
<div class="mt-2">
    <div class="bg-white">
        <div class="button-control py-2 px-2 shadow-sm">
            <div class="row p-2">
                <div class="mr-4">
                    <a href="" class="btn btn-warning btn-sm"><i class="mdi mdi-printer"></i>&nbsp;CETAK</a>
                    <?php if (core()->user->isPenampung()) : ?>
                        <a href="add_transaksi_beli.php" class="btn btn-success btn-sm"><i class="mdi mdi-printer"></i>&nbsp;TAMBAH TRANSAKSI</a>
                    <?php endif ?>
                </div>
            </div>
        </div>
        <div class="mt-3">
            <div class="">
                <table id="tabel-penjualan" class="table text-center table-hover table-responsive table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>TX-ID</th>
                            <th>TANGGAL</th>
                            <th>Penjual</th>
                            <th>Total Harga</th>
                            <th>ACT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>TRX-JL-9233-2021-2-2</td>
                            <td>@{echo date('h:i:s d-m-Y')}</td>
                            <td>WENDI SEPARATOR</td>
                            <td>+39.000</td>
                            <td>
                                <a class="btn btn-sm btn-warning" href="">CETAK</a>
                                <a class="btn btn-sm btn-success" href="">DETAL</a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>TRX-JL-9233-2021-2-2</td>
                            <td>@{echo date('h:i:s d-m-Y')}</td>
                            <td>WENDI SEPARATOR</td>
                            <td>+39.000</td>
                            <td>
                                <a class="btn btn-sm btn-warning" href="">CETAK</a>
                                <a class="btn btn-sm btn-success" href="">DETAL</a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>TRX-JL-9233-2021-2-2</td>
                            <td>@{echo date('h:i:s d-m-Y')}</td>
                            <td>WENDI SEPARATOR</td>
                            <td>+39.000</td>
                            <td>
                                <a class="btn btn-sm btn-warning" href="">CETAK</a>
                                <a class="btn btn-sm btn-success" href="">DETAL</a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>TRX-JL-9233-2021-2-2</td>
                            <td>@{echo date('h:i:s d-m-Y')}</td>
                            <td>WENDI SEPARATOR</td>
                            <td>+39.000</td>
                            <td>
                                <a class="btn btn-sm btn-warning" href="">CETAK</a>
                                <a class="btn btn-sm btn-success" href="">DETAL</a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>TRX-JL-9233-2021-2-2</td>
                            <td>@{echo date('h:i:s d-m-Y')}</td>
                            <td>WENDI SEPARATOR</td>
                            <td>+39.000</td>
                            <td>
                                <a class="btn btn-sm btn-warning" href="">CETAK</a>
                                <a class="btn btn-sm btn-success" href="">DETAL</a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>TRX-JL-9233-2021-2-2</td>
                            <td>@{echo date('h:i:s d-m-Y')}</td>
                            <td>WENDI SEPARATOR</td>
                            <td>+39.000</td>
                            <td>
                                <a class="btn btn-sm btn-warning" href="">CETAK</a>
                                <a class="btn btn-sm btn-success" href="">DETAL</a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>TRX-JL-9233-2021-2-2</td>
                            <td>@{echo date('h:i:s d-m-Y')}</td>
                            <td>WENDI SEPARATOR</td>
                            <td>+39.000</td>
                            <td>
                                <a class="btn btn-sm btn-warning" href="">CETAK</a>
                                <a class="btn btn-sm btn-success" href="">DETAL</a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>TRX-JL-9233-2021-2-2</td>
                            <td>@{echo date('h:i:s d-m-Y')}</td>
                            <td>WENDI SEPARATOR</td>
                            <td>+39.000</td>
                            <td>
                                <a class="btn btn-sm btn-warning" href="">CETAK</a>
                                <a class="btn btn-sm btn-success" href="">DETAL</a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>TRX-JL-9233-2021-2-2</td>
                            <td>@{echo date('h:i:s d-m-Y')}</td>
                            <td>WENDI SEPARATOR</td>
                            <td>+39.000</td>
                            <td>
                                <a class="btn btn-sm btn-warning" href="">CETAK</a>
                                <a class="btn btn-sm btn-success" href="">DETAL</a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>TRX-JL-9233-2021-2-2</td>
                            <td>@{echo date('h:i:s d-m-Y')}</td>
                            <td>WENDI SEPARATOR</td>
                            <td>+39.000</td>
                            <td>
                                <a class="btn btn-sm btn-warning" href="">CETAK</a>
                                <a class="btn btn-sm btn-success" href="">DETAL</a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>TRX-JL-9233-2021-2-2</td>
                            <td>@{echo date('h:i:s d-m-Y')}</td>
                            <td>WENDI SEPARATOR</td>
                            <td>+39.000</td>
                            <td>
                                <a class="btn btn-sm btn-warning" href="">CETAK</a>
                                <a class="btn btn-sm btn-success" href="">DETAL</a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>TRX-JL-9233-2021-2-2</td>
                            <td>@{echo date('h:i:s d-m-Y')}</td>
                            <td>WENDI SEPARATOR</td>
                            <td>+39.000</td>
                            <td>
                                <a class="btn btn-sm btn-warning" href="">CETAK</a>
                                <a class="btn btn-sm btn-success" href="">DETAL</a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>TRX-JL-9233-2021-2-2</td>
                            <td>@{echo date('h:i:s d-m-Y')}</td>
                            <td>WENDI SEPARATOR</td>
                            <td>+39.000</td>
                            <td>
                                <a class="btn btn-sm btn-warning" href="">CETAK</a>
                                <a class="btn btn-sm btn-success" href="">DETAL</a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>TRX-JL-9233-2021-2-2</td>
                            <td>@{echo date('h:i:s d-m-Y')}</td>
                            <td>WENDI SEPARATOR</td>
                            <td>+39.000</td>
                            <td>
                                <a class="btn btn-sm btn-warning" href="">CETAK</a>
                                <a class="btn btn-sm btn-success" href="">DETAL</a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>TRX-JL-9233-2021-2-2</td>
                            <td>@{echo date('h:i:s d-m-Y')}</td>
                            <td>WENDI SEPARATOR</td>
                            <td>+39.000</td>
                            <td>
                                <a class="btn btn-sm btn-warning" href="">CETAK</a>
                                <a class="btn btn-sm btn-success" href="">DETAL</a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>TRX-JL-9233-2021-2-2</td>
                            <td>@{echo date('h:i:s d-m-Y')}</td>
                            <td>WENDI SEPARATOR</td>
                            <td>+39.000</td>
                            <td>
                                <a class="btn btn-sm btn-warning" href="">CETAK</a>
                                <a class="btn btn-sm btn-success" href="">DETAL</a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>TRX-JL-9233-2021-2-2</td>
                            <td>@{echo date('h:i:s d-m-Y')}</td>
                            <td>WENDI SEPARATOR</td>
                            <td>+39.000</td>
                            <td>
                                <a class="btn btn-sm btn-warning" href="">CETAK</a>
                                <a class="btn btn-sm btn-success" href="">DETAL</a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>TRX-JL-9233-2021-2-2</td>
                            <td>@{echo date('h:i:s d-m-Y')}</td>
                            <td>WENDI SEPARATOR</td>
                            <td>+39.000</td>
                            <td>
                                <a class="btn btn-sm btn-warning" href="">CETAK</a>
                                <a class="btn btn-sm btn-success" href="">DETAL</a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>TRX-JL-9233-2021-2-2</td>
                            <td>@{echo date('h:i:s d-m-Y')}</td>
                            <td>WENDI SEPARATOR</td>
                            <td>+39.000</td>
                            <td>
                                <a class="btn btn-sm btn-warning" href="">CETAK</a>
                                <a class="btn btn-sm btn-success" href="">DETAL</a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>TRX-JL-9233-2021-2-2</td>
                            <td>@{echo date('h:i:s d-m-Y')}</td>
                            <td>WENDI SEPARATOR</td>
                            <td>+39.000</td>
                            <td>
                                <a class="btn btn-sm btn-warning" href="">CETAK</a>
                                <a class="btn btn-sm btn-success" href="">DETAL</a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>TRX-JL-9233-2021-2-2</td>
                            <td>@{echo date('h:i:s d-m-Y')}</td>
                            <td>WENDI SEPARATOR</td>
                            <td>+39.000</td>
                            <td>
                                <a class="btn btn-sm btn-warning" href="">CETAK</a>
                                <a class="btn btn-sm btn-success" href="">DETAL</a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>TRX-JL-9233-2021-2-2</td>
                            <td>@{echo date('h:i:s d-m-Y')}</td>
                            <td>WENDI SEPARATOR</td>
                            <td>+39.000</td>
                            <td>
                                <a class="btn btn-sm btn-warning" href="">CETAK</a>
                                <a class="btn btn-sm btn-success" href="">DETAL</a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>TRX-JL-3444234324-2021-2-2</td>
                            <td>@{echo date('h:i:s d-m-Y')}</td>
                            <td>WENDI SEPARATOR</td>
                            <td>+3.000</td>
                            <td>
                                <a class="btn btn-sm btn-warning" href="">CETAK</a>
                                <a class="btn btn-sm btn-success" href="">DETAL</a>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>TRX-JL-3444234-2021-2-2</td>
                            <td>@{echo date('h:i:s d-m-Y')}</td>
                            <td>WENDI SEPARATOR</td>
                            <td>+3.000</td>
                            <td>
                                <a class="btn btn-sm btn-warning" href="">CETAK</a>
                                <a class="btn btn-sm btn-success" href="">DETAL</a>
                            </td>
                        </tr>
                    </tbody>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <script>
        $('#tabel-penjualan').DataTable({});
    </script>