<?php
vc_map(array(
    "name" => 'Menu Food',
    "base" => "cs-menufood",
    "icon" => "cs_icon_for_vc",
    "category" => __('CS Hero', THEMENAME),
    "description" => __('For Restaurant Menu.', THEMENAME),
    "params" => array(
        array(
            "type" => "pro_taxonomy",
            "taxonomy" => "restaurantmenu_category",
            "heading" => __("Categories", THEMENAME),
            "param_name" => "category",
            "description" => __("Note : Select a category (default show all).", THEMENAME)
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Show/Hidden Category Heading", THEMENAME),
            "param_name" => "show_hidden_category_heading",
            "value" => array(
                "Show" => "1",
                "Hidden" => "2"
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Category Heading", THEMENAME),
            "param_name" => "category_heading",
            "value" => array(
                "Heading 1" => "h1",
                "Heading 2" => "h2",
                "Heading 3" => "h3",
                "Heading 4" => "h4",
                "Heading 5" => "h5",
                "Heading 6" => "h6"
            ),
            "description" => __('Select your heading size for category title.', THEMENAME)
        ),
        array(
            "type" => "textfield",
            "heading" => __('Category Padding', THEMENAME),
            "param_name" => "category_padding",
            "value" => '60px 0 40px 0',
            "description" => __('Enter the padding for categories.', THEMENAME)
        ),
        array(
            "type" => "textfield",
            "heading" => __('Number posts', THEMENAME),
            "param_name" => "num_post",
            "value" => '6',
            "description" => __('Enter the number posts in categories.', THEMENAME)
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Post Heading", THEMENAME),
            "param_name" => "post_heading",
            "value" => array(
                "Heading 3" => "h3",
                "Heading 1" => "h1",
                "Heading 2" => "h2",
                "Heading 4" => "h4",
                "Heading 5" => "h5",
                "Heading 6" => "h6"
            ),
            "description" => __('Select your heading size for post title.', THEMENAME)
        ),
        array(
            "type" => "dropdown",
            "heading" => __('Layout', THEMENAME),
            "param_name" => "layout",
            "value" => array(
                'Layout 1' => '1',
                'Layout 2' => '2',
                'Layout 3' => '3'
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => __('Number Colunm (1...4)', THEMENAME),
            "param_name" => "layout_colunm",
            "value" => array(
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4'
            ),
            "description" => __('Select the number colunm of menu. Default: 1 colunm (min 1 and max 4)', THEMENAME)
        ),
        array(
            "type" => "textfield",
            "heading" => __('Excerpt Length', THEMENAME),
            "param_name" => "excerpt_length",
            "value" => '',
            "description" => __('The length of the excerpt, number of words to display.', THEMENAME)
        ),
        array(
            "type" => "checkbox",
            "heading" => __('Show Price', THEMENAME),
            "param_name" => "show_price",
            "value" => array(
                __("Yes, please", THEMENAME) => true
            )
        ),
        array(
            "type" => "checkbox",
            "heading" => __('Enable Link', THEMENAME),
            "param_name" => "show_link",
            "value" => array(
                __("Yes, please", THEMENAME) => true
            )
        ),
        array(
            "type" => "checkbox",
            "heading" => __('Show Image', THEMENAME),
            "param_name" => "image",
            "value" => array(
                __("Yes, please", THEMENAME) => true
            )
        ),
        array(
            "type" => "checkbox",
            "heading" => __('Crop Image', THEMENAME),
            "param_name" => "crop_image",
            "value" => array(
                __("Yes, please", THEMENAME) => true
            )
        ),
        array(
            "type" => "textfield",
            "heading" => __('Width image', THEMENAME),
            "param_name" => "width_image",
            "description" => __('Enter the width of image. Default: 200.', THEMENAME)
        ),
        array(
            "type" => "textfield",
            "heading" => __('Height image', THEMENAME),
            "param_name" => "height_image",
            "description" => __('Enter the height of image. Default: 200.', THEMENAME)
        ),
        array(
            "type" => "dropdown",
            "heading" => __('Order by', THEMENAME),
            "param_name" => "orderby",
            "value" => array(
                "Default" => "",
                "Title" => "title",
                "Date" => "date",
                "ID" => "ID"
            ),
            "description" => __('Order by ("Default", "Title", "Create Date", "ID").', THEMENAME)
        ),
        array(
            "type" => "dropdown",
            "heading" => __('Order', THEMENAME),
            "param_name" => "order",
            "value" => Array(
                "Default" => "",
                "DESC" => "DESC",
                "ASC" => "ASC"
            ),
            "description" => __('Order ("Default", "Asc", "Desc").', THEMENAME)
        )
    )
)
);