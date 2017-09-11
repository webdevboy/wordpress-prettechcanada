<?php
add_shortcode('cs-event-carousel', 'cs_shortcode_event_carousel');
global $types;
function cs_shortcode_event_carousel($atts, $content = null) {
    global $post, $wp_query, $wpdb, $types;

    extract(shortcode_atts(array(
    'title' => '',
    'heading_size' =>'h3',
    'title_color' =>'',
    'subtitle' => '',
    'subtitle_heading_size'=>'h4',
    'description' => '',
    'category' => '',
    'styles'=> 1,
    'type' => 0,
    'crop_image' => false,
    'width_image' => 300,
    'height_image' => 200,
    'width_item' => 150,
    'margin_item' => 20,
    'auto_scroll' => false,
    'show_nav' => false,
    'same_height' => false,
    'show_title' => false,
    'show_date' => false,
    'show_description' => false,
    'excerpt_length' => 100,
    'read_more' => '',
    'rows' => 1,
    'posts_per_page' => 12,
    'orderby' => 'event_start_date',
    'order' => 'DESC',
    'el_class' => ''
        ), $atts));
    
    
    $date_sever = date_i18n('Y-m-d G:i:s');
    
    
    /* Query */
        $c_from = '';
        $c_and = '';
        if($category){
            $c_from = ",{$wpdb->prefix}term_relationships as r,{$wpdb->prefix}term_taxonomy as x,{$wpdb->prefix}terms as t";
            $c_and =" AND p.ID = r.object_id
            AND r.term_taxonomy_id = x.term_taxonomy_id
            AND x.term_id = t.term_id
            AND t.term_id in ({$category})";
        }
    
        $types = $type;
        $pageposts = null;
        $querystr = '';
        $querystr .= "SELECT e.*
                      FROM {$wpdb->prefix}em_events as e,{$wpdb->prefix}posts as p{$c_from}
                      WHERE e.event_status = '1'
                      AND e.post_id = p.ID{$c_and}";
        switch ($type){
            case '1':
                $querystr.=" AND TIMESTAMP(CONCAT(e.event_start_date,' ',e.event_start_time)) >= TIMESTAMP('{$date_sever}')";
                break;
            case '2':
                $querystr.=" AND TIMESTAMP(CONCAT(e.event_start_date,' ',e.event_start_time)) >= TIMESTAMP('{$date_sever}') AND TIMESTAMP(CONCAT(e.event_end_date,' ',e.event_end_time)) <= TIMESTAMP('{$date_sever}')";
                break;
        }
        $querystr.=" ORDER BY e.{$orderby} {$order} LIMIT 0, {$posts_per_page}";

        $pageposts = $wpdb->get_results($querystr, OBJECT);

        $date = time() . '_' . uniqid(true);

        wp_register_script('bxslider', get_template_directory_uri() . '/js/jquery.bxslider.js', 'jquery', '1.0', TRUE);
        wp_register_script('jm-bxslider', get_template_directory_uri() . '/js/jquery.jm-bxslider.js', 'jquery', '1.0', TRUE);

    	wp_enqueue_script('bxslider');
    	wp_enqueue_script('jm-bxslider');

        $cl_show = '';
        if ($title != "" || $description != "") {
            $cl_show .= 'show-header';
        }
        if ($show_nav == true || $show_nav == 1) {
            $cl_show .= ' show-nav';
        }
        ob_start();
        if(!empty($pageposts)){
            require 'styles/style-1.php';
        }
        return ob_get_clean();
}