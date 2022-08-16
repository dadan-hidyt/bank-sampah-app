<?php
/**
 * menu akses
 */
class MenuAkses {
  private $akses;
    /**
     * get menu by accsess
     */
    public function setAkses($akses_id = false) {
      if($akses_id != false){
        $this->akses = $akses_id;
      }
    }
    /**
     * get menu
     * */
    public function getMenu() {
      /**
       * get menu in tb_menu
       */
      $menu_data = '';
      $menu = db()->query("SELECT
        tb_menu.*
        FROM
        tb_menu_akses
        INNER JOIN tb_akses ON tb_menu_akses.akses_id = tb_akses.fungsi_akses
        INNER JOIN tb_menu ON tb_menu.id_menu = tb_menu_akses.id_menu
        WHERE
        tb_akses.nama_akses = '".$this->akses."' AND tb_menu.parent_id = 0 AND tb_menu.active='Y'");
      if(empty($menu)) {
        return;
      }
      /**
       * Parsing menu
       * membuat menu 
       * */
      while ($data_menu = $menu->fetch_assoc()) {
        $menu_data .= '<li>';
        if($data_menu['link'] == '') {
          $menu_data .= '
          <a href="#'.$data_menu['nama_menu'].$data_menu['id_menu'].'" data-toggle="collapse" aria-expanded="false">
          <span class="link-title">'.$data_menu['nama_menu'].'</span>
          <i class="mdi '.$data_menu['icon'].' link-icon"></i>
          </a>'.PHP_EOL;
          $submenu = db()->query("SELECT * FROM tb_menu WHERE parent_id='".$data_menu['id_menu']."'");
          if ($submenu->num_rows > 0) {
            $menu_data .= '
            <ul class="collapse navigation-submenu" id="'.$data_menu['nama_menu'].$data_menu['id_menu'].'">';
            while ($submenu_data = $submenu->fetch_assoc()) {
              $menu_data .= '
              <li><a href="'.$submenu_data['link'].'">'.$submenu_data['nama_menu'].'</a></li>';
            }
            $menu_data .= '</ul>';
          }
        } else {
          $menu_data .= '<a href="'.$data_menu['link'].'">
          <span class="link-title">'.$data_menu['nama_menu'].'</span>
          <i class="mdi '.$data_menu['icon'].' link-icon"></i>
          </a>';
        }
        $menu_data .= '</li>';
      }       
      return $menu_data; 

    }
  }

  ?>