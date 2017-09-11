<div id="cs-blog-metabox" class='cs_metabox'>
	<div id="cs-tab-blog" class='categorydiv'>
    	<ul class='category-tabs'>
    	   <li class='cs-tab'><a href="#tabs-general"><i class="dashicons dashicons-admin-settings"></i> <?php echo _e('GENERAL',THEMENAME);?></a></li>
     	</ul>
     	<div class='cs-tabs-panel'>
     		<div id="tabs-general">
     		<?php
        	$this->text('portfolio_link',
        			'Link URL',
        			'',
        			__('Please input the URL for your link. http://www.youwebsite.com',THEMENAME)
        	);
        	$this->taxonomy(
        	    'portfolio_category_',
        	    'Portfolio Categories',
        	    'portfolio_category',
        	    array(),
        	    false,
        	    __('Select Portfolio Categories for Carousel',THEMENAME)
        	);
        	?>
    	    </div>
    	</div>
	</div>
</div>
<?php
