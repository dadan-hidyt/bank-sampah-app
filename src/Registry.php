<?php
final class Registry {
    private $registry = [];
    /**
     * setter
     */
    public function set($key,$value) {
        if (!$this->has($key)) {
            $this->registry[$key] = $value;
        } 
        return;
    }
    /**
     * getter
     */
    public function get($key) {
        if($this->has($key)) {
            return $this->registry[$key];
        } else {
            return;
        }
    }
    /**
     * mencocokan key
     */
    public function has($key) {
        if(isset($this->registry[$key])) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * mendapatkan data semua yang sudah
     * di registrasikan
     */
    public function getAll() {
        return $this->registry;
    }
    /**
     * getter
     */
    public function __get($name)
    {
        if($this->has($name)) {
            return $this->get($name);
        }
    }
    /**
     * setter
     */
    public function __set($name, $value)
    {
        if(!$this->has($name)) {
            $this->set($name,$value);
        }
    }
}