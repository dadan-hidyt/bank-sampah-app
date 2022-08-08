<?php
/**
 * menu akses
 */
class MenuAkses {
    private $akses;
    /**
     * get menu
     */
    public function setAkses($akses_id = false) {
      if($akses_id != false){
        $this->akses = $akses_id;
      }
    }
    public function getMenu() {
      /**
       * get menu in tb_menu
       */
        $menu = db()->query("SELECT
                      tb_menu.*
                  FROM
                      tb_menu_akses
                  INNER JOIN tb_akses ON tb_menu_akses.akses_id = tb_akses.fungsi_akses
                  INNER JOIN tb_menu ON tb_menu.id_menu = tb_menu_akses.id_menu
                  WHERE
                  tb_akses.id_akses = '2' AND tb_menu.parent_id = 0");

        while ($data_menu = $menu->fetch_assoc()) {
             ?>
             <li>
               <a href=""><?= $data_menu['nama_menu'] ?></a>
               <?php
                $d = db()->query("SELECT * FROM menu WHERE parent_id='{$data_menu['id_menu']}'");
                while ($dd = $d->fetch_assoc()) {
                  echo $dd['config']
                }
               ?>
             </li>
             <?php
        }        
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
                <a href="penjualan.php">Penjualan</a>
              </li>
              <li>
                <a href="pembelian.php">Pembelian</a>
              </li>
            </ul>
          </li>

           <li>
            <a href="akun.php">
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