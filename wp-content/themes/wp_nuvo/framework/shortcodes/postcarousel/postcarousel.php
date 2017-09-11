<?php
add_shortcode('ww-shortcode-carousel-post', 'ww_shortcode_carousel_post_render');
add_action('wp_enqueue_scripts','carousel_post_css');
function ww_shortcode_carousel_post_render($atts, $content = null) {
	global $post, $wp_query;
	extract(shortcode_atts(array(
		'title' => '',
		'heading_size' =>'h3',
		'title_color' =>'',
		'subtitle' => '',
		'subtitle_heading_size'=>'h4',
		'description' => '',
		'category' => '',
		'styles'=> 'style-1',
		'crop_image' => false,
		'width_image' => 300,
		'height_image' => 200,
		'width_item' => 150,
		'margin_item' => 20,
		'auto_scroll' => 'false',
		'show_nav' => false,
		'same_height' => false,
		'show_title' => true,
		'show_description' => true,
		'excerpt_length' => 100,
		'read_more' => '',
		'rows' => 1,
		'posts_per_page' => 12,
		'meta_key' => '',
		'meta_value' => '',
		'orderby' => 'none',
		'order' => 'none',
		'el_class' => ''
	), $atts));
	$crop_image=($crop_image=='false')?false:$crop_image;

	if (isset($category) && $category != '') {
		$cats = explode(',', $category);
		$category = array();
		foreach ((array) $cats as $cat) :
		$category[] = trim($cat);
		endforeach;
		if(!empty($meta_key)) {
			$args = array(
				'posts_per_page' => $posts_per_page,
				'tax_query' => array(
						array(
								'taxonomy' => 'category',
								'field' => 'id',
								'terms' => $category
						)
				),
				'meta_query' => array(
					array(
						'key' => $meta_key,
						'value' => $meta_value
					)
				),
				'orderby' => $orderby,
				'order' => $order,
				'post_type' => 'post',
				'post_status' => 'publish'
			);
		} else {
			$args = array(
				'posts_per_page' => $posts_per_page,
				'tax_query' => array(
						array(
								'taxonomy' => 'category',
								'field' => 'id',
								'terms' => $category
						)
				),
				'orderby' => $orderby,
				'order' => $order,
				'post_type' => 'post',
				'post_status' => 'publish'
			);
		}

	} else {
		if(!empty($meta_key)) {
			$args = array(
				'posts_per_page' => $posts_per_page,
				'meta_query' => array(
					array(
						'key' => $meta_key,
						'value' => $meta_value
					)
				),
				'orderby' => $orderby,
				'order' => $order,
				'post_type' => 'post',
				'post_status' => 'publish'
			);
		} else {
			$args = array(
				'posts_per_page' => $posts_per_page,
				'orderby' => $orderby,
				'order' => $order,
				'post_type' => 'post',
				'post_status' => 'publish'
			);
		}
	}

	$wp_query = new WP_Query($args);

	$date = time() . '_' . uniqid(true);
	ob_start();

	wp_register_script('bxslider', get_template_directory_uri() . '/js/jquery.bxslider.js', 'jquery', '1.0', TRUE);
	wp_register_script('jm-bxslider', get_template_directory_uri() . '/js/jquery.jm-bxslider.js', 'jquery', '1.0', TRUE);

	wp_enqueue_script('jquery-colorbox');
	wp_enqueue_script('bxslider');
	wp_enqueue_script('jm-bxslider');
	$cl_show = '';
	if ($title != "" || $description != "") {
		$cl_show .= 'show-header';
	}
	if ($show_nav == true || $show_nav == 1) {
		$cl_show .= ' show-nav';
	}
	/* */
	$_title_color = '';
	if($title_color){
	    $_title_color = 'style="color:'.$title_color.'!important;"';
	}

 	require get_template_directory()."/framework/shortcodes/postcarousel/styles/$styles.php";
    wp_reset_postdata();
    return ob_get_clean();
}
function carousel_post_css(){
    wp_enqueue_style('colorbox');
}