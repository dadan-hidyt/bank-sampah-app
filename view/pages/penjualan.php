<?php create_breadcrumb(['penjualan']) ?>
<div class="mt-4">
    <div class="button-action mb-4 mt-3">
        <a class="btn btn-warning" href="">PRINT</a>
    </div>
    <div class="table-responsive shadow-sm">
    <table class="table table-hover table-bordered">
    <tr>
       <thead>
        <tr>
            <th>#</th>
            <th>TX-ID</th>
            <th>TANGGAL</th>
            <th>PENAMPUNG</th>
            <th>SALDO</th>
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
                <a href="">CETAK LAPORAN</a> -
                <a href="">DETAIL</a>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>TRX-JL-3444234324-2021-2-2</td>
            <td>@{echo date('h:i:s d-m-Y')}</td>
            <td>WENDI SEPARATOR</td>
            <td>+3.000</td>
            <td>
                <a href="">CETAK</a> - 
                <a href="">DETAIL</a>
            </td>
        </tr>
        <tr>
            <td>3</td>
            <td>TRX-JL-3444234-2021-2-2</td>
            <td>@{echo date('h:i:s d-m-Y')}</td>
            <td>WENDI SEPARATOR</td>
            <td>+3.000</td>
            <td>
                <a href="">CETAK</a> - 
                <a href="">DETAIL</a>
            </td>
        </tr>
       </tbody>
    </tr>
</table>
    </div>
</div>