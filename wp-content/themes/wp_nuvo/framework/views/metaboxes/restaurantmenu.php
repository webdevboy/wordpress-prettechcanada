<?php global $smof_data; ?>
<div class='cs_metabox'>
	<div id="cs-tab-blog" class='categorydiv'>
	<ul class='category-tabs'>
	   <li class='cs-tab'><a href="#tabs-price"><i class="dashicons dashicons dashicons-cart"></i> <?php echo __('PRICE',THEMENAME); ?></a></li>
	   <li class='cs-tab'><a href="#tabs-field"><i class="dashicons dashicons dashicons-awards"></i> <?php echo __('TAGS',THEMENAME); ?></a></li>
 	</ul>
 	<div class='cs-tabs-panel'>
	 	<div id="tabs-price">
		<?php
    		cs_options(array(
        		'id' => 'menu_price',
        		'label' => __('Price',THEMENAME),
        		'type' => 'text'
		    ));
    		cs_options(array(
        		'id' => 'price_unit',
        		'label' => __('Unit ($)',THEMENAME),
        		'value' => $smof_data['restaurant_menu_price'],
        		'type' => 'text'
    		));
    		cs_options(array(
        		'id' => 'menu_special',
        		'label' => __('CHEFS SPECIAL',THEMENAME),
        		'options' => array('no' => 'No', 'yes' => 'Yes'),
        		'type' => 'select'
    		));
		?>
		</div>
		<div id="tabs-field">
		<?php
		cs_options(array(
    		'id' => 'menu_custom_field_1',
    		'label' => __('Text 1', THEMENAME),
    		'type' => 'text'
		));
		cs_options(array(
    		'id' => 'menu_custom_field_icon_1',
    		'label' => __('Icon 1', THEMENAME),
    		'type' => 'icon'
		 ));
		cs_options(array(
    		'id' => 'menu_custom_field_desc_1',
    		'label' => __('Desc Field 1', THEMENAME),
    		'type' => 'text'
		));
		cs_options(array(
    		'id' => 'menu_custom_field_2',
    		'label' => __('Text 2', THEMENAME),
    		'type' => 'text'
		));
		cs_options(array(
    		'id' => 'menu_custom_field_icon_2',
    		'label' => __('Icon 2', THEMENAME),
    		'type' => 'icon'
		));
		cs_options(array(
    		'id' => 'menu_custom_field_desc_2',
    		'label' => __('Desc Field 2', THEMENAME),
    		'type' => 'text'
		));
		cs_options(array(
    		'id' => 'menu_custom_field_3',
    		'label' => __('Text 3', THEMENAME),
    		'type' => 'text'
		));
		cs_options(array(
    		'id' => 'menu_custom_field_icon_3',
    		'label' => __('Icon 3', THEMENAME),
    		'type' => 'icon'
		));
		cs_options(array(
    		'id' => 'menu_custom_field_desc_3',
    		'label' => __('Desc Field 3', THEMENAME),
    		'type' => 'text'
		));
		cs_options(array(
    		'id' => 'menu_custom_field_4',
    		'label' => __('Text 4', THEMENAME),
    		'type' => 'text'
		));
		cs_options(array(
    		'id' => 'menu_custom_field_icon_4',
    		'label' => __('Icon 4', THEMENAME),
    		'type' => 'icon'
		));
		cs_options(array(
    		'id' => 'menu_custom_field_desc_4',
    		'label' => __('Desc Field 4', THEMENAME),
    		'type' => 'text'
		));
		cs_options(array(
    		'id' => 'menu_custom_field_5',
    		'label' => __('Text 5', THEMENAME),
    		'type' => 'text'
		));
		cs_options(array(
    		'id' => 'menu_custom_field_icon_5',
    		'label' => __('Icon 5', THEMENAME),
    		'type' => 'icon'
		));
		cs_options(array(
    		'id' => 'menu_custom_field_desc_5',
    		'label' => __('Desc Field 5', THEMENAME),
    		'type' => 'text'
		));
		?>
		</div>
	</div>
	</div>
</div>
<div id="field_icon" style="display: none;"></div>