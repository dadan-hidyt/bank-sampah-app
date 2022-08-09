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
/**
 * set body id 
 **/
function set_body_id($id = null) {
    return $id ?? false ? set_attr('id', $id) : '';
}
/**
 * membuat link dengan html
 * */
function create_link($link, $name = '',$target = '__blank') {
    return sprintf('<a href=\'%s\' target=\'%s\'>%s</a>', $link,$name,$target);
}