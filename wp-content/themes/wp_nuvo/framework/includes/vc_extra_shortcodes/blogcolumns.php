<?php
vc_map(array(
    "name" => 'Post Columns',
    "base" => "cs-post-columns",
    "icon" => "cs_icon_for_vc",
    "category" => __('CS Hero', THEMENAME),
    "description" => __ ( 'Show list Post by Category', THEMENAME ),
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
            "type" => "pro_taxonomy",
            "taxonomy" => "category",
            "heading" => __("Categories", THEMENAME),
            "param_name" => "category",
            "description" => __("Note: By default, all your projects will be displayed. <br>If you want to narrow output, select category(s) above. Only selected categories will be displayed.", THEMENAME, THEMENAME)
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => __("Colunm", THEMENAME),
            "param_name" => "colunm",
            "value" => array(
                "1" => "1",
                "2" => "2",
                "3" => "3",
                "4" => "4"
            )
        ),
        array(
            "type" => "textfield",
            "heading" => __('Number of posts to show per page', THEMENAME),
            "param_name" => "posts_per_page",
            'value' => '6',
            "description" => __('The number of posts to display on each page. Set to "-1" for display all posts on the page.', THEMENAME)
        )
    )
));