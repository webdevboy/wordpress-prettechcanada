<?php
add_action('init', 'cs_add_post_type_menu');

function cs_add_post_type_menu()
{
    $labels = array(
        'name' => __('Restaurant Menu', THEMENAME),
        'singular_name' => __('Menu', THEMENAME),
        'add_new' => __('Add New', THEMENAME),
        'add_new_item' => __('Add New Menu', THEMENAME),
        'edit_item' => __('Edit Menu', THEMENAME),
        'new_item' => __('New Menu', THEMENAME),
        'all_items' => __('Menu', THEMENAME),
        'view_item' => __('View Menu', THEMENAME),
        'search_items' => __('Search Menu', THEMENAME),
        'not_found' => __('No menu found', THEMENAME),
        'not_found_in_trash' => __('No menu found in Trash', THEMENAME),
        'menu_name' => __('Restaurant Menu', THEMENAME)
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'restaurantmenu'
        ),
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 9,
        'menu_icon' => 'dashicons-welcome-write-blog',
        'supports' => array(
            'title',
            'editor',
            'author',
            'thumbnail',
            'excerpt',
            'comments'
        )
    );
    register_post_type('restaurantmenu', $args);
    register_taxonomy('restaurantmenu_category', 'restaurantmenu', array(
        'hierarchical' => true,
        'label' => __('Menu Categories', THEMENAME),
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true
    ));

    $labels = array(
        'name' => __('Menu Tags', 'taxonomy general name', THEMENAME),
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
        'menu_name' => __('Menu Tags', THEMENAME)
    );

    register_taxonomy('menu_tag', 'restaurantmenu', array(
        'hierarchical' => false,
        'labels' => $labels,
        'show_ui' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'tag'
        )
    ));
}
/* custom filter */
add_action('restrict_manage_posts', 'restrict_listings_by_restaurantmenu');

function restrict_listings_by_restaurantmenu()
{
    global $typenow;
    global $wp_query;
    if ($typenow == 'restaurantmenu') {
        $taxonomy = 'restaurantmenu_category';
        $term = isset($wp_query->query['restaurantmenu_category']) ? $wp_query->query['restaurantmenu_category'] : '';
        $business_taxonomy = get_taxonomy($taxonomy);
        wp_dropdown_categories(array(
            'show_option_all' => __("Show All", THEMENAME),
            'taxonomy' => $taxonomy,
            'name' => 'restaurantmenu_category',
            'orderby' => 'name',
            'selected' => $term,
            'hierarchical' => true,
            'depth' => 3,
            'show_count' => true, // Show # listings in parens
            'hide_empty' => true // Don't show businesses w/o listings
        ));
    }
}
add_filter('parse_query', 'convert_restaurantmenu_id_to_taxonomy_term_in_query');

function convert_restaurantmenu_id_to_taxonomy_term_in_query($query)
{
    global $pagenow;
    $qv = &$query->query_vars;
    if ($pagenow == 'edit.php' && isset($qv['restaurantmenu_category']) && is_numeric($qv['restaurantmenu_category'])) {
        $term = get_term_by('id', $qv['restaurantmenu_category'], 'restaurantmenu_category');
        $qv['restaurantmenu_category'] = ($term ? $term->slug : '');
    }
}
/* custom collumn */
add_filter('manage_edit-restaurantmenu_columns', 'set_custom_restaurantmenu_columns');
add_action('manage_restaurantmenu_posts_custom_column', 'custom_restaurantmenu_column', 10, 2);

function set_custom_restaurantmenu_columns($columns)
{
    $columns['price'] = __('Price', THEMENAME);
    $columns['special'] = __('Chefs Special', THEMENAME);

    return $columns;
}

function custom_restaurantmenu_column($column, $post_id)
{
    switch ($column) {
        case 'price':
            echo get_post_meta($post_id, 'cs_menu_price', true).get_post_meta($post_id, 'cs_price_unit', true);
            break;
        case 'special':
            if(get_post_meta($post_id, 'cs_menu_special', true) == 'yes'){
                echo '<i class="dashicons dashicons-awards"></i>';
            }
            break;
    }
}