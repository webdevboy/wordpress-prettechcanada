<?php
global $smof_data;
$this->select(array(
    'id' => 'category_layout',
    'label' => __('Category Layout', THEMENAME),
    'default' => '',
    'value' => array(
        '' => __('Default', THEMENAME),
        'full-fixed' => __('Full Width', THEMENAME),
        'left-fixed' => __('Sidebar Left', THEMENAME),
        'right-fixed' => __('Sidebar Right', THEMENAME)
    ),
    'desc' => __('Select Layout for current Category', THEMENAME)
));
?>