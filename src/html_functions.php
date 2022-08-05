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

function set_body_class($class = null) {
    return $class ?? false ? set_attr('class', $class) : '';
}

function set_body_id($id = null) {
    return $id ?? false ? set_attr('id', $id) : '';
}