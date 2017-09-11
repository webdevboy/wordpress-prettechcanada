<?php
/* --------------------------------------------------------------------- */
/* Shortcode Logo */
/* --------------------------------------------------------------------- */
vc_map(array(
    "name" => __("Logo",THEMENAME),
    "base" => "cs-shortcode-logo",
    "icon" => "cs_icon_for_vc",
    "category" => __('CS Hero',THEMENAME),
    "description" => __("Custom logo.", THEMENAME),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "js_composer"),
            "param_name" => "el_class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", THEMENAME)
        ),
        array(
            "type" => "attach_image",
            "heading" => __("Logo", THEMENAME),
            "param_name" => "logo",
            "value" => "",
            "description" => __("Default get logo from admin.", THEMENAME)
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Logo align", "js_composer"),
            "param_name" => "logo_align",
            "value" => array("Left" => "left", "Center" => "center", "Right" => "right"),
            "description" => __('Select your logo align.', THEMENAME)
        )
    )
));
?>