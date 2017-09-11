<?php
cs_options(array(
    'id'=>'img',
    'label'=>__('Category Image', THEMENAME),
    'type' => 'image',
    'desc'=> __('Select a background image for category', THEMENAME)
));
cs_options(array(
    'id'=>'bg_parallax',
    'label'=>__('Parallax Background Image', THEMENAME),
    'type'=>'select',
    'options'=>array(
        'yes'=>__('Yes', THEMENAME),
        'no'=>__('No', THEMENAME)
    )
));
cs_options(array(
    'id'=>'bg_parallax_speed',
    'label'=>'Parallax Speed',
    'type'=>'text',
    'desc'=>__('Default 0.6', THEMENAME)
));
?>