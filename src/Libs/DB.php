<?php
/**
 * Library cookie untuk menangani koneksi database
 * @author dadan
 * @package library
 */
namespace Libs;
class DB {
    private $db_config = [];
    private $error = false;
    private $connection = false;
    public $query_error = '';
    public function __construct() {
        $config = CONFIG['DB'] ?? null;
        if ($config) {
            $this->db_config = toObject($config);
        }
        /**
         * tes koneksi kedatabase
         * jika error tampilkan error
         * */
        $this->connection = $this->connect();
        if ($this->error) {
            die('DB: '.$this->error);
        }
    }
    public function connection() {
        return $this->connection ?? null;
    }
    public function connect() {
        $conn = @new \mysqli($this->db_config->HOST, $this->db_config->USER,$this->db_config->PASS,$this->db_config->DB);
        if ($conn->connect_errno) {
            $this->error = $conn->connect_error;
        }
        return $conn;
        
    }
    public function disconnect() {
        return $this->connect()->close();
    }
    /**
     * fungsi select
     * select('user',['id','name','data'])
     * 'select user,pass,db,name from users'
     * */
    public function get(string $tb, $fields = '*', $limit = false) {
        $query = "SELECT ";
        if (is_array($fields)) {
            $field_str = '';
           foreach($fields as $field) {
              $field_str .= '`'.$field.'`,';
           }
          $query .= trim($field_str,',');
        } else {
            $query .= $fields;
        }
        $query .= ' FROM `'.$tb.'`';
    
        if($limit) {
            $query .= ' LIMIT '.$limit;
        }
        $execute = $this->connection->query($query);
        if (!$execute) {
           $this->query_error = $this->connection->error;
        } else {
            $this->connection->close();
            return $execute;
        }
    }
    /**
     * query untuk getWhere(
     *      tabel,
     *      field,
     *      rows,
     *      value,
     *      oprator,
     *      limit
     * )
     * ex : DB::getWhere('foo',['bar','bazz'],'bar','baz','=',1);
     * SELECT `bar`,`baz' FROM foo WHERE `bar` = 'baz' LIMIT 1
     * */
      public function getWhere(string $tb, $fields = '*', $rows, $value,$operator = '=', $limit = false) {
        $query = "SELECT ";
        if (is_array($fields)) {
            $field_str = '';
           foreach($fields as $field) {
              $field_str .= '`'.$field.'`,';
           }
          $query .= trim($field_str,',');
        } else {
            $query .= $fields;
        }
        $query .= ' FROM `'.$tb.'`';
        $query .= sprintf('WHERE `%s` %s \'%s\'',$rows,$operator,$value);
        if($limit) {
            $query .= ' LIMIT '.$limit;
        }
        $execute = $this->connection->query($query);
        if (!$execute) {
           $this->query_error = $this->connection->error;
        } else {
            $this->connection->close();
            return $execute;
        }
    }
    /***
     *fungsi query
     * DB::query('SELECT * FROM foo');
     * */
    public function query($query = '') {
        $exec = $this->connection->query($query);
        if($exec) {
            return $exec;
        } else {
            $this->query_error = $this->connection->error;
        }
    }
    //...
}
