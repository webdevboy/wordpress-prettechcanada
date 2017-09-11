<?php
add_shortcode('cs-event-calendar', 'cs_shortcode_event_calendar_render');

function cs_shortcode_event_calendar_render($params, $content = null)
{
    extract(shortcode_atts(array(
        'title' => '',
        'image' => '',
        'description' => '',
        'class' => ''
    ), $params));
    // date_default_timezone_set("America/Los_Angeles");
    wp_enqueue_style('fullcalendar', get_template_directory_uri() . "/framework/shortcodes/eventscalendar/css/fullcalendar.css");
    wp_enqueue_script('moment', get_template_directory_uri() . "/framework/shortcodes/eventscalendar/js/moment.min.js");
    wp_enqueue_script('fullcalendar', get_template_directory_uri() . "/framework/shortcodes/eventscalendar/js/fullcalendar.min.js");
    wp_register_script('custom.fullcalendar', get_template_directory_uri() . "/framework/shortcodes/eventscalendar/js/custom.fullcalendar.js");
    wp_localize_script('custom.fullcalendar', 'events', array(
        'ajaxurl' => admin_url('admin-ajax.php')
    ));
    wp_enqueue_script('custom.fullcalendar');

    ob_start();
    ?>
    <div class="cs-calendar">
        <div class="event-calendar"></div>
    </div>
    <?php
    return ob_get_clean();
}
/**
 * get events
 */
add_action('wp_ajax_cshero_events_month', 'cshero_events_month_callback');
add_action('wp_ajax_nopriv_cshero_events_month', 'cshero_events_month_callback');

function cshero_events_month_callback()
{
    //header('Content-Type: application/json');
    global $wpdb;
    
    $month = $_REQUEST['month'];
    $year = $_REQUEST['year'];
    
    $start_month = strtotime($year.'-'.$month.'-01');
    $end_month = date('Y/m/d', strtotime('+1 month -1 second', $start_month));
    
    $start_month = date('Y/m/d', $start_month);
    
    $querystr = "
        SELECT e.post_id, e.event_name, e.event_start_date, e.event_start_time, e.event_end_date, e.event_end_time
        FROM {$wpdb->prefix}em_events as e
        WHERE e.event_status = '1'
        AND e.event_start_date >= '{$start_month}'
        AND e.event_start_date <= '{$end_month}'
    ";    
    $results = $wpdb->get_results($querystr, OBJECT);
    $events = array();
    foreach ($results as $event){
        $event_obj = new stdClass();
        
        $start_time = strtotime($event->event_start_time);
        $end_time = strtotime($event->event_end_time);
        
        $event_obj->title = $event->event_name.' ('.date('H:i a',$start_time).'-'.date('H:i a',$end_time).')';
        $event_obj->start = $event->event_start_date;
        $event_obj->url = get_the_permalink($event->post_id);
        $events[] = $event_obj;
        unset($event_obj);
    }
    die(json_encode($events));
}