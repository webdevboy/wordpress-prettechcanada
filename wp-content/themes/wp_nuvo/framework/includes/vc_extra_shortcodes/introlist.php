<?php
vc_map(array(
    "name" => __("Intro List", THEMENAME),
    "base" => "cs-introlist",
    "icon" => "cs_icon_for_vc",
    "category" => __('CS Hero', THEMENAME),
    "description" => __("Intro Posts.", THEMENAME),
    "params" => array(
        array(
            "type" => "pro_taxonomy",
            "taxonomy" => "category",
            "heading" => __("Categories", THEMENAME),
            "param_name" => "category",
            "description" => __("Note: By default, all your projects will be displayed. <br>If you want to narrow output, select category(s) above. Only selected categories will be displayed.", THEMENAME, THEMENAME)
        ),
        array (
            "type" => "textfield",
            "heading" => __ ( 'Excerpt Length', THEMENAME ),
            "param_name" => "excerpt_length",
            "value" => '',
            "description" => __ ( 'The length of the excerpt, number of words to display. null for no excerpt.', THEMENAME )
        ),
        array (
            "type" => "checkbox",
            "heading" => __ ( 'Crop Big Images', THEMENAME ),
            "param_name" => "crop_big",
            "value" => array (
                __ ( "Yes, please", THEMENAME ) => true
            ),
            "description" => __ ( 'Crop or not crop image on your Post.', THEMENAME )
        ),
        array (
            "type" => "textfield",
            "heading" => __ ( 'Width image', THEMENAME ),
            "param_name" => "big_width",
            "description" => __ ( 'Enter the width of image. Default: 465.', THEMENAME )
        ),
        array (
            "type" => "textfield",
            "heading" => __ ( 'Height image', THEMENAME ),
            "param_name" => "big_height",
            "description" => __ ( 'Enter the height of image. Default: 340.', THEMENAME )
        ),
        array (
            "type" => "checkbox",
            "heading" => __ ( 'Crop Mini Images', THEMENAME ),
            "param_name" => "crop_mini",
            "value" => array (
                __ ( "Yes, please", THEMENAME ) => true
            ),
            "description" => __ ( 'Crop or not crop image on your Post.', THEMENAME )
        ),
        array (
            "type" => "textfield",
            "heading" => __ ( 'Width image', THEMENAME ),
            "param_name" => "mini_width",
            "description" => __ ( 'Enter the width of image. Default: 465.', THEMENAME )
        ),
        array (
            "type" => "textfield",
            "heading" => __ ( 'Height image', THEMENAME ),
            "param_name" => "mini_height",
            "description" => __ ( 'Enter the height of image. Default: 170.', THEMENAME )
        ),
        array (
            "type" => "dropdown",
            "heading" => __ ( 'Order by', THEMENAME ),
            "param_name" => "orderby",
            "value" => array (
                "None" => "none",
                "Title" => "title",
                "Date" => "date",
                "ID" => "ID"
            ),
            "description" => __ ( 'Order by ("none", "title", "date", "ID").', THEMENAME )
        ),
        array (
            "type" => "dropdown",
            "heading" => __ ( 'Order', THEMENAME ),
            "param_name" => "order",
            "value" => Array (
                "None" => "none",
                "ASC" => "ASC",
                "DESC" => "DESC"
            ),
            "description" => __ ( 'Order ("None", "Asc", "Desc").', THEMENAME )
        ),
    )
));
?>