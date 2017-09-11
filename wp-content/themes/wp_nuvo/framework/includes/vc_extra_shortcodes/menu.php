<?php
/* --------------------------------------------------------------------- */
/* Shortcode Menu */
/* --------------------------------------------------------------------- */
$custom_menus = array();
$menus = get_terms('nav_menu', array('hide_empty' => false));
if (is_array($menus)) {
    foreach ($menus as $single_menu) {
        $custom_menus[$single_menu->name] = $single_menu->term_id;
    }
}

vc_map(array(
    "name" => 'Menu',
    "base" => "cs-shortcode-menu",
    "icon" => "cs_icon_for_vc",
    "category" => __('CS Hero',THEMENAME),
    "class" => "wpb_vc_wp_widget",
    "description" => __("Load a menu", THEMENAME),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __('Title', THEMENAME),
            "param_name" => "title"
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Menu", "js_composer"),
            "param_name" => "nav_menu",
            "value" => $custom_menus,
            "description" => __(empty($custom_menus) ? "Custom menus not found. Please visit <b>Appearance > Menus</b> page to create new menu." : "Select menu", THEMENAME),
            "admin_label" => true
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Menu align", "js_composer"),
            "param_name" => "menu_align",
            "value" => array("None" => "", "Left" => "left", "Center" => "center", "Right" => "right"),
            "description" => __('Select your menu align.', THEMENAME)
        ),
        array(
            "type" => "textfield",
            "heading" => __('Line height', THEMENAME),
            "param_name" => "menu_line_height",
            "value" => '80'
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "js_composer"),
            "param_name" => "el_class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", THEMENAME)
        )
    )
));
?>