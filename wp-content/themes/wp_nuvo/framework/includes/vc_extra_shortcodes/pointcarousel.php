<?php
vc_map ( array (
		"name" => 'Point Carousel',
		"base" => "cs-pointcarousel",
		"icon" => "cs_icon_for_vc",
		"category" => __ ( 'CS Hero', THEMENAME ),
		"description" => __ ( 'Point Carousel', THEMENAME ),
		"params" => array (
				array (
						"type" => "textfield",
						"heading" => __ ( 'Title', THEMENAME ),
						"param_name" => "title"
				),
				array(
				    "type" => "dropdown",
				    "heading" => __("Heading size", THEMENAME),
				    "param_name" => "heading_size",
				    "value" => array(
				        "Default"   => "",
				        "Heading 1" => "h1",
				        "Heading 2" => "h2",
				        "Heading 3" => "h3",
				        "Heading 4" => "h4",
				        "Heading 5" => "h5",
				        "Heading 6" => "h6"
				    ),
				    "description" => 'Select your heading size for title.'
				),
				array(
				    "type" => "colorpicker",
				    "heading" => __('Title Color', THEMENAME),
				    "param_name" => "title_color"
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Sub Title', THEMENAME ),
						"param_name" => "subtitle"
				),
				array(
				    "type" => "dropdown",
				    "heading" => __("Sub Heading size", THEMENAME),
				    "param_name" => "subtitle_heading_size",
				    "value" => array(
				        "Default"   => "",
				        "Heading 1" => "h1",
				        "Heading 2" => "h2",
				        "Heading 3" => "h3",
				        "Heading 4" => "h4",
				        "Heading 5" => "h5",
				        "Heading 6" => "h6"
				    ),
				    "description" => 'Select your heading size for sub title.'
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Description', THEMENAME ),
						"param_name" => "description"
				),
				array (
						"type" => "pro_taxonomy",
						"taxonomy" => "pointofsale_category",
						"heading" => __ ( "Categories", THEMENAME ),
						"param_name" => "category",
						"description" => __ ( "Note: By default, all your projects will be displayed. <br>If you want to narrow output, select category(s) above. Only selected categories will be displayed.", THEMENAME, THEMENAME )
				),
				array (
						"type" => "dropdown",
						"class" => "",
						"heading" => __ ( "Styles", THEMENAME ),
						"param_name" => "styles",
						"value" => array (
								"Default Style 1" => "style-1"
						)
				),
				array (
						"type" => "checkbox",
						"heading" => __ ( 'Crop image', THEMENAME ),
						"param_name" => "crop_image",
						"value" => array (
								__ ( "Yes, please", THEMENAME ) => true
						),
						"description" => __ ( 'Crop or not crop image on your Post.', THEMENAME )
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Width image', THEMENAME ),
						"param_name" => "width_image",
						"description" => __ ( 'Enter the width of image. Default: 300.', THEMENAME )
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Height image', THEMENAME ),
						"param_name" => "height_image",
						"description" => __ ( 'Enter the height of image. Default: 200.', THEMENAME )
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Width item', THEMENAME ),
						"param_name" => "width_item",
						"description" => __ ( 'Enter the width of item. Default: 150.', THEMENAME )
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Margin item', THEMENAME ),
						"param_name" => "margin_item",
						"description" => __ ( 'Enter the margin of item. Default: 20.', THEMENAME )
				),
				array (
						"type" => "dropdown",
						"class" => "",
						"heading" => __ ( "Rows", THEMENAME ),
						"param_name" => "rows",
						"value" => array (
								"1 row" => "1",
								"2 rows" => "2",
								"3 rows" => "3",
								"4 rows" => "4"
						)
				),
				array (
						"type" => "checkbox",
						"heading" => __ ( 'Auto scroll', THEMENAME ),
						"param_name" => "auto_scroll",
						"value" => array (
								__ ( "Yes, please", THEMENAME ) => true
						),
						"description" => __ ( 'Auto scroll.', THEMENAME )
				),
				array (
						"type" => "checkbox",
						"heading" => __ ( 'Same height', THEMENAME ),
						"param_name" => "same_height",
						"value" => array (
								__ ( "Yes, please", THEMENAME ) => true
						),
						"description" => __ ( 'Same height.', THEMENAME )
				),
				array (
						"type" => "checkbox",
						"heading" => __ ( 'Show navigation', THEMENAME ),
						"param_name" => "show_nav",
						"value" => array (
								__ ( "Yes, please", THEMENAME ) => true
						),
						"description" => __ ( 'Show or hide navigation on your carousel post.', THEMENAME )
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Excerpt Length', THEMENAME ),
						"param_name" => "excerpt_length",
						"value" => '',
						"description" => __ ( 'The length of the excerpt, number of words to display. Set to "-1" for no excerpt. Default: 100.', THEMENAME )
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Read More', THEMENAME ),
						"param_name" => "read_more",
						"value" => '',
						"description" => __ ( 'Enter desired text for the link or for no link, leave blank or set to \"-1\".', THEMENAME )
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Number of posts to show per page', THEMENAME ),
						"param_name" => "posts_per_page",
						'value' => '12',
						"description" => __ ( 'The number of posts to display on each page. Set to "-1" for display all posts on the page.', THEMENAME )
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
				array (
						"type" => "textfield",
						"heading" => __ ( "Extra class name", "js_composer" ),
						"param_name" => "el_class",
						"description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer" )
				)
		)
) );