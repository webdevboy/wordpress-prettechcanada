<?php
if (class_exists ( 'Woocommerce' )) {
	vc_map ( array (
			"name" => 'Shop Carousel',
			"base" => "cs-shop-carousel",
			"icon" => "cs_icon_for_vc",
			"category" => __ ( 'CS Hero', THEMENAME ),
			"description" => __ ( 'Shop Carousel', THEMENAME, THEMENAME ),
			"params" => array (
					array (
						"type" => "textfield",
						"heading" => __ ( 'Heading', THEMENAME ),
						"param_name" => "title",
						"admin_label" => true
					),
					array(
					    "type" => "dropdown",
					    "heading" => __("Heading size", THEMENAME),
					    "param_name" => "heading_size",
					    "value" => array(
					        "Default"   => "h3",
					        "Heading 1" => "h1",
					        "Heading 2" => "h2",
					        "Heading 3" => "h3",
					        "Heading 4" => "h4",
					        "Heading 5" => "h5",
					        "Heading 6" => "h6"
					    ),
					    "description" => 'Select your heading size for title.'
					),
					array (
				        "type" => "dropdown",
				        "class" => "",
				        "heading" => __ ( "Heading Align", THEMENAME ),
				        "param_name" => "title_align",
				        "value" => array (
				            "Left" => "text-left",
				            "Center" => "text-center",
				            "Right" => "text-right"
				        ),
				        "description" => __("Select align for Title", THEMENAME)
				    ),
					array(
					    "type" => "colorpicker",
					    "heading" => __('Heading Color', THEMENAME),
					    "param_name" => "title_color",
					),
					array (
				        "type" => "dropdown",
				        "class" => "",
				        "heading" => __ ( "Heading Style", THEMENAME ),
				        "param_name" => "heading_style",
				        "value" => array (
				            "Default" => "default",
				            "Border Bottom" => "border-bottom",
				            "Overline" => "overline",
				            "Underline" => "underline",
				            "Line Through" => "line-through",
				            "Dotted Bottom" =>"dotted-bottom"
				        ),
				        "description" => __("Select heading style", THEMENAME)
				    ),
					array (
							"type" => "textfield",
							"heading" => __ ( 'Sub Heading', THEMENAME ),
							"param_name" => "subtitle",
					),
					array(
					    "type" => "dropdown",
					    "heading" => __("Sub Heading size", THEMENAME),
					    "param_name" => "subtitle_heading_size",
					    "value" => array(
					        "Default"   => "h4",
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
							"param_name" => "description",
					),
					array (
							"type" => "",
							"heading" => __ ( 'Source Option', THEMENAME ),
							"param_name" => "source_option",
							'value' => '',
					),
					array (
							"type" => "pro_taxonomy",
							"taxonomy" => "product_cat",
							"heading" => __ ( "Categories", THEMENAME ),
							"param_name" => "category",
							"description" => __ ( "Note: By default, all your projects will be displayed. <br>If you want to narrow output, select category(s) above. Only selected categories will be displayed.", THEMENAME )
					),
					array (
							"type" => "dropdown",
							"heading" => __ ( 'Show Item title', THEMENAME ),
							"param_name" => "show_title",
							"value" => array (
								__("Yes", THEMENAME) => '1',
	                			__("No", THEMENAME) => '0'
							),
							"description" => __ ( 'Show/Hide title of each product.', THEMENAME )
					),

					array(
					    "type" => "colorpicker",
					    "heading" => __('Items Heading Color', THEMENAME),
					    "param_name" => "item_title_color"
					),
					array(
					    "type" => "dropdown",
					    "heading" => __("Item Heading size", THEMENAME),
					    "param_name" => "item_heading_size",
					    "value" => array(
					        "Default"   => "h3",
					        "Heading 1" => "h1",
					        "Heading 2" => "h2",
					        "Heading 3" => "h3",
					        "Heading 4" => "h4",
					        "Heading 5" => "h5",
					        "Heading 6" => "h6"
					    ),
					    "description" => 'Select your heading size for each item title.'
					),
					array (
						"type" => "dropdown",
						"heading" => __ ( 'Show image', THEMENAME ),
						"param_name" => "show_image",
						"value" => array (
							__("Yes", THEMENAME) => '1',
                			__("No", THEMENAME) => '0'
						),
						"description" => __ ( 'Show/Hide image of each product.', THEMENAME )
					),
					array (
							"type" => "dropdown",
							"heading" => __ ( 'Crop image', THEMENAME ),
							"param_name" => "crop_image",
							"value" => array (
								__("No", THEMENAME) => '0',
								__("Yes", THEMENAME) => '1'

							),
							"description" => __ ( 'Crop or not crop image on your product.', THEMENAME )
					),
					array (
							"type" => "textfield",
							"heading" => __ ( 'Width image', THEMENAME ),
							"param_name" => "width_image",
							"description" => __ ( 'Enter the width of image. Default: 360.', THEMENAME )
					),
					array (
							"type" => "textfield",
							"heading" => __ ( 'Height image', THEMENAME ),
							"param_name" => "height_image",
							"description" => __ ( 'Enter the height of image. Default: 240.', THEMENAME )
					),
					array (
							"type" => "textfield",
							"heading" => __ ( 'Image border radius', THEMENAME ),
							"param_name" => "image_border",
							"description" => __ ( 'Enter style border radius for image. Ex 3px for rounded, or 50% for circle.', THEMENAME )
					),
					array (
							"type" => "dropdown",
							"heading" => __ ( 'Show Category', THEMENAME ),
							"param_name" => "show_category",
							"value" => array (
								__("Yes", THEMENAME) => '1',
	                			__("No", THEMENAME) => '0'
							),
							"description" => __ ( 'Show/Hide Category of post', THEMENAME )
					),

					array (
							"type" => "dropdown",
							"heading" => __ ( 'Show price', THEMENAME ),
							"param_name" => "show_price",
							"value" => array (
									__ ( "Yes", "js_composer" ) => '1',
									__ ( "No", "js_composer" ) => '0',
							),
							"description" => __ ( 'Show or hide price on your Product.', THEMENAME )
					),
					array (
							"type" => "dropdown",
							"heading" => __ ( 'Show add to cart', THEMENAME ),
							"param_name" => "show_add_to_cart",
							"value" => array (
									__ ( "Yes, please", "js_composer" ) => '1',
									__ ( "No, please", "js_composer" ) => '0'
							),
							"description" => __ ( 'Show or hide add to cart on your Product.', THEMENAME )
					),
					array (
							"type" => "textfield",
							"heading" => __ ( 'Number of posts to show per page', THEMENAME ),
							"param_name" => "posts_per_page",
							'value' => '12',
							"description" => __ ( 'The number of posts to display on each page. Set to "-1" for display all posts on the page.', THEMENAME )
					),
					array (
							"type" => "",
							"heading" => __ ( 'Carousel Style', THEMENAME ),
							"param_name" => "carousel_style",
							'value' => '',
							"description" => __ ( 'All config of Carousel', THEMENAME )
					),
					array (
							"type" => "dropdown",
							"class" => "",
							"heading" => __ ( "Style", THEMENAME ),
							"param_name" => "style",
							"value" => array (
									"Style 1" => "layout-1",
									"Style 2" => "layout-2"
							),
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
							"type" => "textfield",
							"heading" => __ ( 'Speed', THEMENAME ),
							"param_name" => "speed",
							"description" => __ ( 'Enter the speed of carousel. Default: 500.', THEMENAME )
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
							),
					),
					array (
							"type" => "dropdown",
							"heading" => __ ( 'Auto scroll', THEMENAME ),
							"param_name" => "auto_scroll",
							"value" => array (
									__ ( "Yes", THEMENAME ) => '1',
									__ ( "No", THEMENAME ) => '0'
							),
							"description" => __ ( 'Auto scroll.', THEMENAME )
					),
					array (
							"type" => "dropdown",
							"heading" => __ ( 'Show Navigation', THEMENAME ),
							"param_name" => "show_nav",
							"value" => array (
									__ ( "Yes, please", THEMENAME ) => '1',
									__ ( "No, please", THEMENAME ) => '0'
							),
							"description" => __ ( 'Show or hide navigation.', THEMENAME )
					),
					array (
							"type" => "dropdown",
							"heading" => __ ( 'Show Pager', THEMENAME ),
							"param_name" => "show_pager",
							"value" => array (
									__ ( "Yes, please", THEMENAME ) => '1',
									__ ( "No, please", THEMENAME ) => '0',
							),
							"description" => __ ( 'Show or hide pager on your carousel shop.', THEMENAME )
					),

					array (
							"type" => "",
							"heading" => __ ( 'Order Style', THEMENAME ),
							"param_name" => "order_styke",
							'value' => '',
							"description" => __ ( 'All config of Order', THEMENAME )
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
							"value" => array (
									"None" => "none",
									"Ascending" => "asc",
									"Descending" => "desc"
							),
							"description" => __ ( 'Order ("none", "asc", "desc").', THEMENAME )
					),
					array (
							"type" => "",
							"heading" => __ ( 'Extra Param', THEMENAME ),
							"param_name" => "extra_param",
							'value' => '',
					),
					array (
							"type" => "textfield",
							"heading" => __ ( 'Read More Link', THEMENAME ),
							"param_name" => "morelink",
							'value' => '',
					),
					array (
							"type" => "textfield",
							"heading" => __ ( 'Read More Text', THEMENAME ),
							"param_name" => "moretext",
							'value' => '',
					)
			)
	) );
}