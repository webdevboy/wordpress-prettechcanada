<?php
vc_map(array(
    "name" => 'Cover Slider',
    "base" => "cs-coverslider",
    "icon" => "cs_icon_for_vc",
    "category" => __('CS Hero', THEMENAME),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __('Title', THEMENAME),
            "param_name" => "title"
        ),
        array(
            "type" => "textfield",
            "heading" => __('Description', THEMENAME),
            "param_name" => "description"
        ),
        array(
            "type" => "dropdown",
            "heading" => __('From Source', THEMENAME),
            "param_name" => "source",
            "value" => array(
                'Chefs Specials'=>'chefs_specials',
                'Latest Events' => 'latest_events',
                'Custom' => 'custom',
            ),
            "description" => __('Select source for Slider', THEMENAME)
        ),
        array(
            "type" => "pro_taxonomy",
            "taxonomy" => "restaurantmenu_category",
            "heading" => __("Categories", THEMENAME),
            "param_name" => "menucategory",
            "dependency"=> array(
                'element' => 'source',
                'value' => array('chefs_specials')
            ),
            "description" => __("Note: By default, all your projects will be displayed. <br>If you want to narrow output, select category(s) above. Only selected categories will be displayed.", THEMENAME)
        ),
        array(
            "type" => "pro_taxonomy",
            "taxonomy" => "event-categories",
            "heading" => __("Categories", THEMENAME),
            "param_name" => "eventcategory",
            "dependency"=> array(
                'element' => 'source',
                'value' => array('latest_events')
            ),
            "description" => __("Note: By default, all your projects will be displayed. <br>If you want to narrow output, select category(s) above. Only selected categories will be displayed.", THEMENAME)
        ),
        array(
            "type" => "textfield",
            "heading" => __('Items', THEMENAME),
            "param_name" => "items",
            "value" => 3,
            "description" => __('Limit items', THEMENAME),
            "dependency"=> array(
                'element' => 'source',
                'value' => array('chefs_specials','latest_events')
            )
        ),
        array(
            "type" => "textarea_html",
            "heading" => __('Custom html', THEMENAME),
            "param_name" => "content",
            "value" => 3,
            "description" => __('Only for custom source', THEMENAME),
            "dependency"=> array(
                'element' => 'source',
                'value' => array('custom')
            )
        )
    )
));