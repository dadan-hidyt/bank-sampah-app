<?php
/**
 * class='begin_body dark'
 */
function set_attr($attr_name = 'class', $value = null) {
    if($value == null) {
        return;
    }
    if(is_array($value)) {
        $attr_v = '';
        foreach ($value as $attr_value) {
            $attr_v += $value.' ';
        }
    } else {
        $attr_v = $value;
    }
    $attr = sprintf('%s=\'%s\'',$attr_name,$attr_v);
    return $attr;
}