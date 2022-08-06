<?php
/**
 * Library cookie untuk menangani koneksi database
 * @author dadan
 * @package library
 */
namespace Libs;
class DB {
    private $db_config = [];
    public function __construct() {
        $config = CONFIG['DB'] ?? null;
        if ($config) {
            $this->config = $config;
        }
    }
    public function connect() {
        return 'usep';
    }
    public function query($query = '') {

    }
    public function prepare() {

    }
}
