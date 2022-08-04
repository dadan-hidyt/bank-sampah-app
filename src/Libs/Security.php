<?php
namespace Libs;
class Security{
    public function clean_string($string) {
        $string = preg_replace("/%(.*)%/",'',$string);
        return $string;
    }
}