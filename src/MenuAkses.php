<?php
/**
 * menu akses
 */
class MenuAkses {
    private $akses;
    /**
     * get menu
     */
    public function getMenu() {
        $data = <<<EOLL
        <li>
            <a href='home.php'>
              <span class="link-title">DASHBOARD</span>
              <i class="mdi mdi-gauge link-icon"></i>
            </a>
          </li>
          <li>
            <a href="pages/icons/material-icons.html">
              <span class="link-title">KEUANGAN</span>
              <i class="mdi mdi-wallet link-icon"></i>
            </a>
          </li> 
          <li>
            <a href="#transaksi" data-toggle="collapse" aria-expanded="false">
              <span class="link-title">TRANSAKSI</span>
              <i class="mdi mdi-file-document link-icon"></i>
            </a>
            <ul class="collapse navigation-submenu" id="transaksi">
              <li>
                <a href="pages/ui-components/buttons.html">Penjualan</a>
              </li>
              <li>
                <a href="pages/ui-components/tables.html">Pembelian</a>
              </li>
            </ul>
          </li>

           <li>
            <a href="pages/icons/material-icons.html">
              <span class="link-title">AKUN</span>
              <i class="mdi mdi-settings link-icon"></i>
            </a>
          </li>   
          <li>
            <a href="pages/icons/material-icons.html">
              <span class="link-title">LOGOUT</span>
              <i class="mdi mdi-logout link-icon"></i>
            </a>
          </li>        
        EOLL;
        return $data;
    }
}

?>