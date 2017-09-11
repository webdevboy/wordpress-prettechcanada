<?php
$sample_image_id = '';
/*--------------------------------------------------------------------------------------------------
	Main function for importing dummy data
--------------------------------------------------------------------------------------------------*/
if ( ! function_exists( 'installSample' ) ) {
	function installSample(){
		global $wp_filesystem;
		if (empty($wp_filesystem)) {
		    require_once (ABSPATH . '/wp-admin/includes/file.php');
		    WP_Filesystem();
		}
		if ( !defined('WP_LOAD_IMPORTERS') ) define('WP_LOAD_IMPORTERS', true);
			require_once ABSPATH . 'wp-admin/includes/import.php';
			$importer_error = false;
		if ( !class_exists( 'WP_Importer' ) ) {
			$class_wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
			if ( file_exists( $class_wp_importer ) )
			{
				require_once($class_wp_importer);
			}
			else
			{
				$importer_error = true;
			}
		}
		if ( !class_exists( 'WP_Import' ) ) {
			$class_wp_import = get_template_directory() . '/admin/sample/wordpress-importer/wordpress-importer.php';
			if ( file_exists( $class_wp_import ) )
			{
				require_once($class_wp_import);
				
			}
			else
			{
				$importer_error = true;
			}	  
		}
		if($importer_error)
		{
			die("Import error! Please unninstall WP importer plugin and try again");
		}
		$wp_import = new WP_Import();
		$wp_import->fetch_attachments = true;
		$i = 'wp-nuvo';
		if($_POST['data']!=''){
			$i = 'wp-nuvo-'.$_POST['data'];
		}
		ob_start();
		$select_data='all';
		update_option('cs-body-class',$i);
		$option_json = get_template_directory_uri() . '/admin/sample/'.$i.'/option.txt';
		$option_data = $wp_filesystem->get_contents( $option_json );
		cs_set_options($option_data);
		if(($select_data=='all')||($select_data=='slider')){
			cs_import_revslider($i);
			update_option('cs_consilium_dummy_slider',1);
		}
		if(($select_data=='all')||($select_data=='grid')){
			cs_import_grid($i);
			update_option('cs_consilium_dummy_grid',1);
		}
		if(($select_data=='all')||($select_data=='widget')){
			$widgets_json = get_template_directory_uri() . '/admin/sample/'.$i.'/widget_data.json';
			$widget_data = $wp_filesystem->get_contents( $widgets_json );
			cs_import_widget($widget_data);
			update_option('cs_consilium_dummy_widget',1);
		}
		if($select_data=='all'){
			$wp_import->import(get_template_directory() . '/admin/sample/'.$i.'/sample.xml');
			update_option('cs_consilium_dummy',1);
		}
		
		ob_end_clean();
		echo 'import_complete';
	}
}
if ( ! function_exists( 'cs_set_options' ) ){
	function cs_set_options($option){
		of_save_options(unserialize(base64_decode($option)));
	}
}
if ( ! function_exists( 'cs_replace_image_links_with_local' ) ) {
	function cs_replace_image_links_with_local( $zarray, $attack=false ) {
		//$new_array = array ();
		if($attack){
			return get_template_directory_uri().'/images/demo_images/sample.png';
		}
		if ( !is_array ( $zarray ) ) {
		
			return $zarray;
		
		}
		else {
			
			foreach ($zarray as $key => $val ) {
			
				$image_folder = '';
				$image_path = '';
			
				if ( !is_array( $val ) ) {
					// FUNCTIA DE SCHIMBAT URL SI UPLOAD POZA IN FOLDERUL WP-CONTENT
					
						if ( isImage ( $val ) ) {
						
							$image_name = basename($val);
							$i = 'wp-nuvo';
							if($_POST['data']!=''){
								$i = 'wp-nuvo-'.$_POST['data'];
							}
							$image_path_on_upload = explode( 'http://dev.joomlaman.com/'.$i.'/wp-content/uploads/',$val);
							$wp_upload_dir = wp_upload_dir();
							
							if ( !empty( $image_path_on_upload[1] ) ) {
							
								$image_to_check = $image_path_on_upload[1];
								$image_folder = explode ( $image_name , $image_path_on_upload[1] );
								$image_folder = $image_folder[0];
								
								$image_path = get_template_directory() .'/images/demo_images/'.$image_folder . $image_name;
							}
							
							if ( file_exists ( $image_path ) ) {
								
								if ( !is_dir( $wp_upload_dir['basedir'] . '/' .$image_folder ) ) {
									if ( !mkdir( $wp_upload_dir['basedir'] . '/' .$image_folder ,0777,true ) ){
										echo 'Directory could not be created : '.$image_folder;
									}
								}
								
								// Check if file is not already uploaded
								if ( !file_exists ( $wp_upload_dir['basedir'] . '/' .$image_folder . $image_name ) ) {			
									$wp_filetype = wp_check_filetype(basename($image_name), null );
									
									
									if (!@copy($image_path,$wp_upload_dir['basedir'].'/'. $image_folder . $image_name)) {
										echo 'Could not copy file';
									}
									$attachment = array(
										'guid' => $wp_upload_dir['baseurl'] . '/' .$image_folder . basename( $image_name ), 
										'post_mime_type' => $wp_filetype['type'],
										'post_title' => preg_replace('/\.[^.]+$/', '', basename($image_name)),
										'post_content' => '',
										'post_status' => 'inherit'
									);
																		
									$attach_id = wp_insert_attachment( $attachment, $wp_upload_dir['basedir'] . '/' . $image_folder . $image_name );
																		
									// you must first include the image.php file
									// for the function wp_generate_attachment_metadata() to work
									require_once(ABSPATH . 'wp-admin/includes/image.php');
									$attach_data = wp_generate_attachment_metadata( $attach_id, $image_name );
									wp_update_attachment_metadata( $attach_id, $attach_data );
								
									$new_array[$key] = $wp_upload_dir['baseurl'] . '/' . $image_folder . basename( $image_name );
									
								}
								else {
									$new_array[$key] = $wp_upload_dir['baseurl'] . '/' . $image_folder . basename( $image_name );
								}
								
							}
							else {
							
								$image_path = get_template_directory() .'/images/demo_images/' . 'sample.png';
								
								if ( !is_dir( $wp_upload_dir['basedir'] . '/' .$image_folder ) ) {
									if ( !mkdir( $wp_upload_dir['basedir'] . '/' .$image_folder ,0777,true ) ){
										echo 'Directory could not be created : '.$image_folder;
									}
								}
								
								// Check if file is not already uploaded
								if ( !file_exists ( $wp_upload_dir['basedir'] . '/' .$image_folder . 'sample.png' ) ) {			
									$wp_filetype = wp_check_filetype(basename($image_name), null );
									
									
									if (!@copy($image_path,$wp_upload_dir['basedir'].'/'. $image_folder . 'sample.png' ) ) {
										echo 'Could not copy file';
									}
									
									$attachment = array(
										'guid' => $wp_upload_dir['baseurl'] . '/' .$image_folder . 'sample.png', 
										'post_mime_type' => $wp_filetype['type'],
										'post_title' => preg_replace('/\.[^.]+$/', '', 'sample.png' ),
										'post_content' => '',
										'post_status' => 'inherit'
									);
																		
									$attach_id = wp_insert_attachment( $attachment, $wp_upload_dir['basedir'] . '/' . $image_folder . 'sample.png' );
									
									global $sample_image_id;
									$sample_image_id = $attach_id;
									
									// you must first include the image.php file
									// for the function wp_generate_attachment_metadata() to work
									require_once(ABSPATH . 'wp-admin/includes/image.php');
									$attach_data = wp_generate_attachment_metadata( $attach_id, $image_name );
									wp_update_attachment_metadata( $attach_id, $attach_data );
								
									$new_array[$key] = $wp_upload_dir['baseurl'] . '/' . $image_folder . 'sample.png';
									
								}
								else {
									$new_array[$key] = $wp_upload_dir['baseurl'] . '/' . $image_folder . 'sample.png';
								}
							
							}
						}
						else {
							$new_array[$key] = $val;
						}
				}
				else {
					$new_array[$key] = cs_replace_image_links_with_local( $val );
					
				}
			}
		
		}
		
		return $new_array; 
		
	}
}	
if ( ! function_exists( 'cs_update_featured' ) ) {
	function cs_update_featured( $id )
	{
		global $sample_image_id;
		return $sample_image_id;
	}
}
if ( ! function_exists( 'isImage' ) ) {
  function isImage( $url )
  {
    $pos = strrpos( $url, ".");
	if ($pos === false)
	  return false;
	$ext = strtolower(trim(substr( $url, $pos)));
	$imgExts = array(".gif", ".jpg", ".jpeg", ".png", ".tiff", ".tif"); // this is far from complete but that's always going to be the case...
	if ( in_array($ext, $imgExts) )
	  return true;
    return false;
  }
}
if(!function_exists('cs_import_revslider')){
	function cs_import_revslider($theme){
		if(file_exists(ABSPATH .'wp-content/plugins/revslider/revslider_admin.php')){
			require_once(ABSPATH .'wp-content/plugins/revslider/revslider_admin.php');
			if ($handle = opendir(get_template_directory().'/admin/sample/'.$theme.'/revslider')) {
			    while (false !== ($entry = readdir($handle))) {
			        if ($entry != "." && $entry != "..") {
			            $_FILES['import_file']['tmp_name']=get_template_directory().'/admin/sample/'.$theme.'/revslider/'.$entry;
			            $slider = new RevSlider();
						$response = $slider->importSliderFromPost(true, true);
			        }
			    }
			    closedir($handle);
			}
		}
	}
}
if(!function_exists('cs_import_grid')){
	function cs_import_grid($theme){
		if(file_exists(ABSPATH .'wp-content/plugins/essential-grid/admin/includes/import.class.php')){
			require_once(ABSPATH .'wp-content/plugins/essential-grid/admin/includes/import.class.php');
			if ($handle = opendir(get_template_directory().'/admin/sample/'.$theme.'/grid')) {
			    while (false !== ($entry = readdir($handle))) {
			        if ($entry != "." && $entry != "..") {
			        	$im = new Essential_Grid_Import();
			            $file_export=get_template_directory().'/admin/sample/'.$theme.'/grid/'.$entry;
			            $grid_extract = json_decode(file_get_contents($file_export), true);
						$grids = @$grid_extract['grids'];
						if(!empty($grids) && is_array($grids)){
							$grids_imported = $im->import_grids($grids);
						}
			        }
			    }
			    closedir($handle);
			}
		}
	}
}
if(!function_exists('cs_import_widget')){
	function cs_import_widget($import_array){
		global $wp_registered_sidebars;
		$json_data = $import_array;
    	$json_data = json_decode( $json_data, true );
		$sidebars_data = $json_data[0];
		$widget_data = $json_data[1];
		$new_widgets = array( );
		foreach ( $sidebars_data as $import_sidebar => $import_widgets ) :
			foreach ( $import_widgets as $import_widget ) :
				//if the sidebar exists
				if ( isset( $wp_registered_sidebars[$import_sidebar] ) ) :
					$title = trim( substr( $import_widget, 0, strrpos( $import_widget, '-' ) ) );
					$index = trim( substr( $import_widget, strrpos( $import_widget, '-' ) + 1 ) );
					$current_widget_data = get_option( 'widget_' . $title );
					$new_widget_name = cs_new_widget_name( $title, $index );
					$new_index = trim( substr( $new_widget_name, strrpos( $new_widget_name, '-' ) + 1 ) );
					if ( !empty( $new_widgets[ $title ] ) && is_array( $new_widgets[$title] ) ) {
						while ( array_key_exists( $new_index, $new_widgets[$title] ) ) {
							$new_index++;
						}
					}
					$current_sidebars[$import_sidebar][] = $title . '-' . $new_index;
					if ( array_key_exists( $title, $new_widgets ) ) {
						$new_widgets[$title][$new_index] = $widget_data[$title][$index];
						$multiwidget = $new_widgets[$title]['_multiwidget'];
						unset( $new_widgets[$title]['_multiwidget'] );
						$new_widgets[$title]['_multiwidget'] = $multiwidget;
					} else {
						$current_widget_data[$new_index] = $widget_data[$title][$index];
						$current_multiwidget = $current_widget_data['_multiwidget'];
						$new_multiwidget = isset($widget_data[$title]['_multiwidget']) ? $widget_data[$title]['_multiwidget'] : false;
						$multiwidget = ($current_multiwidget != $new_multiwidget) ? $current_multiwidget : 1;
						unset( $current_widget_data['_multiwidget'] );
						$current_widget_data['_multiwidget'] = $multiwidget;
						$new_widgets[$title] = $current_widget_data;
					}
				endif;
			endforeach;
		endforeach;
		if ( isset( $new_widgets ) && isset( $current_sidebars ) ) {
			update_option( 'sidebars_widgets', $current_sidebars );
			foreach ( $new_widgets as $title => $content )
				update_option( 'widget_' . $title, $content );
			return true;
		}
		return false;
	}
}
if(!function_exists('cs_new_widget_name')){
	function cs_new_widget_name($widget_name, $widget_index){
		$current_sidebars = get_option( 'sidebars_widgets' );
		$all_widget_array = array( );
		foreach ( $current_sidebars as $sidebar => $widgets ) {
			if ( !empty( $widgets ) && is_array( $widgets ) && $sidebar != 'wp_inactive_widgets' ) {
				foreach ( $widgets as $widget ) {
					$all_widget_array[] = $widget;
				}
			}
		}
		while ( in_array( $widget_name . '-' . $widget_index, $all_widget_array ) ) {
			$widget_index++;
		}
		$new_widget_name = $widget_name . '-' . $widget_index;
		return $new_widget_name;
	}
}
?>