<?php
vc_map ( array (
		"name" => 'Latest Twitter',
		"base" => "cs-latest-twitter",
		"icon" => "cs_icon_for_vc",
		"category" => __ ( 'CS Hero', THEMENAME ),
		"description" => __ ('Latest Twitter Carousel (Horizontal & Vertical)',THEMENAME),
		"params" => array (
				array (
						"type" => "textfield",
						"value" => "",
						"heading" => __ ( 'Title', THEMENAME ),
						"param_name" => "twittertitle"
				),
				array (
						"type" => "dropdown",
						"heading" => __ ( "Heading size", THEMENAME ),
						"param_name" => "heading_size",
						"value" => array (
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
						"type" => "colorpicker",
						"heading" => __ ( 'Title Color', THEMENAME ),
						"param_name" => "title_color"
				),
				array (
						"type" => "textfield",
						"value" => "2Jd4h7mTLRi7XHlWMpX4w",
						"heading" => __ ( 'Consumer key', THEMENAME ),
						"param_name" => "consumerkey"
				),
				array (
						"type" => "textfield",
						"value" => "M3n1cMi3HPSmpKUJNgdPFmzjlDkXIDRTf1oHZIkM",
						"heading" => __ ( 'Consumer secret', THEMENAME ),
						"param_name" => "consumersecret"
				),
				array (
						"type" => "textfield",
						"value" => "1406608410-6TbCsgWzjqWD2aagTslnPd4ShxbWP9ZoFyXbiEN",
						"heading" => __ ( 'Access token', THEMENAME ),
						"param_name" => "accesstoken"
				),
				array (
						"type" => "textfield",
						"value" => "bnd86DE8Rm8A93MlwnylOGlWc8dvmQHrjzQT8BaI",
						"heading" => __ ( 'Accesstoken secret', THEMENAME ),
						"param_name" => "accesstokensecret"
				),
				array (
						"type" => "textfield",
						"value" => "0.002",
						"heading" => __ ( 'Cache time(hours)', THEMENAME ),
						"param_name" => "cachetime"
				),
				array (
						"type" => "textfield",
						"value" => "realjoomlaman",
						"heading" => __ ( 'Username', THEMENAME ),
						"param_name" => "username"
				),
				array (
						"type" => "dropdown",
						"value" => array (
								"1",
								"2",
								"3",
								"4",
								"5",
								"6",
								"7",
								"8",
								"9",
								"10"
						),
						"heading" => __ ( 'Tweets to show', THEMENAME ),
						"param_name" => "tweetstoshow"
				),
				array (
						"type" => "dropdown",
						"value" => array (
								"Yes",
								"No"
						),
						"heading" => __ ( 'Show avatar', THEMENAME ),
						"param_name" => "showavatar"
				),
				array (
						"type" => "dropdown",
						"value" => array (
								"true",
								"false"
						),
						"heading" => __ ( 'Exclude replies', THEMENAME ),
						"param_name" => "excludereplies"
				),
				array (
						"type" => "dropdown",
						"value" => array (
								"vertical" => "vertical",
								"horizontal" => "horizontal"
						),
						"heading" => __ ( 'Type of transition', THEMENAME ),
						"param_name" => "transition"
				),
				array (
						"type" => "textfield",
						"value" => "",
						"heading" => __ ( 'Extra class', THEMENAME ),
						"param_name" => "extra_class"
				),
				array (
						"type" => "dropdown",
						"value" => array (
								"true",
								"false"
						),
						"heading" => __ ( 'Auto Slide', THEMENAME ),
						"param_name" => "auto"
				),
				array (
						"type" => "dropdown",
						"value" => array (
								"Yes" => "1",
								"No" => "0"
						),
						"heading" => __ ( 'Pause on Hover', THEMENAME ),
						"param_name" => "pause"
				),
				array (
						"type" => "dropdown",
						"value" => array (
								"true",
								"false"
						),
						"heading" => __ ( 'Touch Enable', THEMENAME ),
						"param_name" => "touch"
				),
				array (
						"type" => "textfield",
						"value" => '4000',
						"heading" => __ ( 'Tweet Scroll', THEMENAME ),
						"param_name" => "tweetscroll"
				),
				array (
						"type" => "textfield",
						"value" => '4000',
						"heading" => __ ( 'Time Out', THEMENAME ),
						"param_name" => "timeout"
				),
				array (
						"type" => "dropdown",
						"value" => array (
								"Yes" => "true",
								"No" => "false"
						),
						"heading" => __ ( 'Show control', THEMENAME ),
						"param_name" => "showcontrol"
				)
		)
) );