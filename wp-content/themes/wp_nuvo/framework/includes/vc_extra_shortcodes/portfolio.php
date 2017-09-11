<?php
vc_map ( array (
		"name" => 'Portfolio',
		"base" => "cs-portfolio",
		"icon" => "cs_icon_for_vc",
		"category" => __ ( 'CS Hero', THEMENAME ),
		"description" => __ ( "Portfolio", THEMENAME ),
		"params" => array (
				array (
						"type" => "pro_taxonomy",
						"taxonomy" => "portfolio_category",
						"heading" => __ ( "Categories", THEMENAME ),
						"param_name" => "category",
						"description" => __ ( "Note: By default, all your projects will be displayed. <br>If you want to narrow output, select category(s) above. Only selected categories will be displayed.", THEMENAME )
				),
				array (
						"type" => "dropdown",
						"class" => "",
						"heading" => __ ( "Appearance", THEMENAME ),
						"param_name" => "type",
						"value" => array (
								"Grid" => "grid",
								"Masonry" => "masonry"
						)
				),
				array (
						"type" => "dropdown",
						"class" => "",
						"heading" => __ ( "Columns", THEMENAME ),
						"param_name" => "columns",
						"value" => array (
								"1 column" => "1",
								"2 columns" => "2",
								"3 columns" => "3",
								"4 columns" => "4"
						)
				),
				array (
						"type" => "checkbox",
						"heading" => __ ( 'Crop image', THEMENAME ),
						"param_name" => "crop_image",
						"value" => array (
								__ ( "Yes, please", THEMENAME ) => true
						),
						"description" => __ ( 'Crop or not crop image on your Portfolio.', THEMENAME )
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
						"type" => "dropdown",
						"class" => "",
						"heading" => __ ( "Style", THEMENAME ),
						"param_name" => "style",
						"value" => array (
								"Style 1" => "style1",
								"Style 2" => "style2",
								"Style 3" => "style3"
						),
						"description" => __ ( "Style 1 only show plus button", THEMENAME )
				),
				array (
						"type" => "checkbox",
						"heading" => __ ( 'Filter', THEMENAME ),
						"param_name" => "filter",
						"value" => array (
								__ ( "Yes, please", "js_composer" ) => "true"
						),
						"description" => __ ( 'Would you like your portfolio items to be filter?', THEMENAME )
				),
				array (
						"type" => "checkbox",
						"heading" => __ ( 'Show title', THEMENAME ),
						"param_name" => "show_title",
						"value" => array (
								__ ( "Yes, please", "js_composer" ) => "true"
						),
						"description" => __ ( 'Show or hide title on your Portfolio.', THEMENAME )
				),
				array (
						"type" => "checkbox",
						"heading" => __ ( 'Show category', THEMENAME ),
						"param_name" => "show_category",
						"value" => array (
								__ ( "Yes, please", "js_composer" ) => "true"
						),
						"description" => __ ( 'Show or hide category on your Portfolio.', THEMENAME )
				),
				array (
						"type" => "checkbox",
						"heading" => __ ( 'Show description', THEMENAME ),
						"param_name" => "show_description",
						"value" => array (
								__ ( "Yes, please", "js_composer" ) => "true"
						),
						"description" => __ ( 'Show or hide description on your Portfolio.', THEMENAME )
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Number of posts to show per page', THEMENAME ),
						"param_name" => "posts_per_page",
						'value' => '12',
						"description" => __ ( 'The number of posts to display on each page. Set to "-1" for display all posts on the page.', THEMENAME )
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Excerpt Length', THEMENAME ),
						"param_name" => "excerpt_length",
						'value' => '100',
						"description" => __ ( 'The length of the excerpt, number of words to display. Set to "-1" for no excerpt.', THEMENAME )
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Show Enlarge', THEMENAME ),
						"param_name" => "enlarge",
						"value" => 'Enlarge',
						"description" => __ ( 'Enter desired text for the link or for no link, leave blank or set to \"-1\".', THEMENAME )
				),
				array (
						"type" => "checkbox",
						"heading" => __ ( 'Show Read More', THEMENAME ),
						"param_name" => "read_more",
						"value" => array (
								__ ( "Yes, please", "js_composer" ) => "true"
						)
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
				)
		)
) );