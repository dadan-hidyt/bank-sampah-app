<?php
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
}