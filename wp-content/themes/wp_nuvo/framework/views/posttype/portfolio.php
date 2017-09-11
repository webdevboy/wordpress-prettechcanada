<?php
function cs_add_post_type_portfolio() {
    $portfolio_labels = array(
        'name' => __('Portfolio', 'taxonomy general name', THEMENAME),
        'singular_name' => __('Portfolio Item', THEMENAME),
        'search_items' => __('Search Portfolio Items', THEMENAME),
        'all_items' => __('Portfolio', THEMENAME),
        'parent_item' => __('Parent Portfolio Item', THEMENAME),
        'edit_item' => __('Edit Portfolio Item', THEMENAME),
        'update_item' => __('Update Portfolio Item', THEMENAME),
        'add_new_item' => __('Add New Portfolio Item', THEMENAME),
        'not_found' => __('No portfolio found', THEMENAME)
    );

    $args = array(
        'labels' => $portfolio_labels,
        'rewrite' => array('slug' => 'portfolio'),
        'singular_label' => __('Project', THEMENAME),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'hierarchical' => true,
        'menu_position' => 9,
    	'capability_type'=>'post',
        'menu_icon' => 'dashicons-welcome-view-site',
        'supports' => array('title', 'editor', 'thumbnail', 'comments')
    );

    register_post_type('portfolio', $args);
    register_taxonomy('portfolio_category', 'portfolio', array('hierarchical' => true, 'label' => __('Portfolio Categories', THEMENAME), 'query_var' => true,'show_ui' => true, 'rewrite' => true));

    $labels = array(
        'name' => __('Portfolio Tags', 'taxonomy general name', THEMENAME),
        'singular_name' => __('Tag', 'taxonomy singular name', THEMENAME),
        'search_items' => __('Search Tags', THEMENAME),
        'popular_items' => __('Popular Tags', THEMENAME),
        'all_items' => __('All Tags', THEMENAME),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __('Edit Tag', THEMENAME),
        'update_item' => __('Update Tag', THEMENAME),
        'add_new_item' => __('Add New Tag', THEMENAME),
        'new_item_name' => __('New Tag Name', THEMENAME),
        'separate_items_with_commas' => __('Separate tags with commas', THEMENAME),
        'add_or_remove_items' => __('Add or remove tags', THEMENAME),
        'choose_from_most_used' => __('Choose from the most used tags', THEMENAME),
        'menu_name' => __('Portfolio Tags', THEMENAME),
    );

    register_taxonomy('portfolio_tag', 'portfolio', array(
        'hierarchical' => false,
        'labels' => $labels,
        'show_ui' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array('slug' => 'tag'),
    ));

}

add_action('init', 'cs_add_post_type_portfolio');