<?php

add_action('init', 'custombtn_integrateWithVC');

function custombtn_integrateWithVC() {
    vc_map(array(
        "name" => __("Custom Button", THEMENAME),
        "base" => "cs-custombtn",
        "class" => "cs-custombtn",
        "category" => __('CS Hero', THEMENAME),
        "icon" => "cs_icon_for_vc",
        "params" => array(
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Element Selector", THEMENAME),
                "param_name" => "el_selector",
                "value" => ".section-scroll-top",
                "description" => __("Element Selector.", THEMENAME)
            ),
			array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Icon Class", THEMENAME),
                "param_name" => "icon_class",
                "value" => "fa fa-arrow-down",
                "description" => __("Icon Class.", THEMENAME)
            ),
			array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Extra Class", THEMENAME),
                "param_name" => "el_class",
                "value" => "",
                "description" => __("Extra Class.", THEMENAME)
            ),
        )
    ));
}
