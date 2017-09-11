<?php
add_shortcode('cs-next-event', 'cs_shortcode_next_event_render');
function cs_shortcode_next_event_render($params, $content = null) {
	global $wpdb;
    extract(shortcode_atts(array(
        'title' => '',
        'image' => '',
        'description'=>'',
        'class' => ''
    ), $params));
    
    $date_sever = date_i18n('Y-m-d G:i:s');
    
    $gmt_offset = get_option( 'gmt_offset' );
    
    //date_default_timezone_set("America/Los_Angeles");
    wp_enqueue_script('jquery-plugin', get_template_directory_uri() . "/framework/shortcodes/eventcountdown/js/jquery.plugin.min.js");
    wp_enqueue_script('jquery-countdown', get_template_directory_uri() . "/framework/shortcodes/eventcountdown/js/jquery.countdown.min.js");
    wp_enqueue_script('custom-countdown', get_template_directory_uri() . "/framework/shortcodes/eventcountdown/js/custom.countdown.js");
	$querystr = "
	    SELECT e.post_id, e.event_name, e.event_start_date, e.event_start_time, e.post_content
	    FROM {$wpdb->prefix}em_events e
	    WHERE e.event_status = '1'
	    AND TIMESTAMP(CONCAT(e.event_start_date,' ',e.event_start_time)) >= TIMESTAMP('{$date_sever}')
	    ORDER BY e.event_start_date ASC, e.event_start_time ASC
 	";

	$pageposts = $wpdb->get_row($querystr);

	ob_start();
	?>
	<div class="cs-eventCount">
		<div class="cs-eventCount-header widget-block-header">
			<?php if($title): ?>
				<h1 class="cs-title"><?php echo esc_attr($title); ?></h1>
			<?php endif; ?>
			<?php if($description): ?>
				<p class="cs-desc"><?php echo esc_attr($description); ?></p>
			<?php endif; ?>
		</div>
		<?php if(count($pageposts)>0): ?>
			<?php 
			     $utc_date = date('Y,m,d,H,i,s', strtotime($pageposts->event_start_date." ".$pageposts->event_start_time));
			?>
			<div class="cs-eventCount-content">
				<?php $image = wp_get_attachment_image_src($image, 'full'); ?>
				<div class='cs-eventCount-introImg col-xs-12 col-sm-12 col-md-6 col-lg-6'><img alt="<?php echo esc_attr($pageposts->event_name); ?>" src="<?php echo esc_url($image[0]); ?>"/></div>
				<div class="cs-eventCount-contentWrap col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<h3 class="cs-eventCount-title"><a href="<?php echo get_permalink($pageposts->post_id); ?>"><?php echo esc_attr($pageposts->event_name); ?></a></h3>
					<div class="cs-eventCount-content-main"><?php echo cshero_string_limit_words(strip_tags($pageposts->post_content), 20); ?>...</div>
					<span id="event_countdown" class="" data-count="<?php echo esc_attr($utc_date);?>" data-timezone="<?php echo esc_attr($gmt_offset); ?>" data-label="<?php echo __('DAYS', THEMENAME).','.__('HOURS', THEMENAME).','.__('MINUTES', THEMENAME).','.__('SECONDS', THEMENAME); ?>"></span>
				</div>
			</div>
		<?php endif; ?>
	</div>
	<?php
	return ob_get_clean();
}