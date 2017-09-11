<?php
function cs_add_post_type_point_of_sale()
{
    $labels = array(
        'name' => __('Point of Sale', THEMENAME),
        'singular_name' => __('Point of Sale', THEMENAME),
        'add_new' => __('Add New', THEMENAME),
        'add_new_item' => __('Add New Point', THEMENAME),
        'edit_item' => __('Edit Point', THEMENAME),
        'new_item' => __('New Point', THEMENAME),
        'all_items' => __('Point of Sale', THEMENAME),
        'view_item' => __('View Point', THEMENAME),
        'search_items' => __('Search Point', THEMENAME),
        'not_found' => __('No Point found', THEMENAME),
        'not_found_in_trash' => __('No Point found in Trash', THEMENAME),
        'menu_name' => __('Point of Sale', THEMENAME)
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'pointofsale'
        ),
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 9,
        'menu_icon' => 'dashicons-location',
        'supports' => array(
            'title',
            'editor',
            'author',
            'thumbnail',
            'excerpt',
            'comments'
        )
    );
    register_post_type('pointofsale', $args);
    register_taxonomy('pointofsale_category', 'pointofsale', array(
        'hierarchical' => true,
        'label' => __('Categories', THEMENAME),
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true
    ));

    register_taxonomy('pointofsale_tag', 'pointofsale', array(
        'hierarchical' => false,
        'label' => __('Tags', THEMENAME),
        'show_ui' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'tag'
        )
    ));
}
add_action('init', 'cs_add_post_type_point_of_sale');