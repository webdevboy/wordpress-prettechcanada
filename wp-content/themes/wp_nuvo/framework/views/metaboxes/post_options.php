<div id="cs-blog-loading" class="cs_loading" style="display: block;">
	<div id="followingBallsG">
	<div id="followingBallsG_1" class="followingBallsG">
	</div>
	<div id="followingBallsG_2" class="followingBallsG">
	</div>
	<div id="followingBallsG_3" class="followingBallsG">
	</div>
	<div id="followingBallsG_4" class="followingBallsG">
	</div>
	</div>
</div>
<div id="cs-blog-metabox" class='cs_metabox' style="display: none;">
	<div id="cs-tab-blog" class='categorydiv'>
	<ul class='category-tabs'>
	   <li class='cs-tab'><a href="#tabs-general"><i class="dashicons dashicons-admin-settings"></i> <?php echo _e('GENERAL',THEMENAME);?></a></li>
 	</ul>
 	<div class='cs-tabs-panel'>
 		<div id="tabs-general">
 			<?php
 			cs_options(array(
     			'id' => 'sub_title',
     			'label' => __('Sub Title', THEMENAME),
     			'type' => 'text'
 			));
 			cs_options(array(
     			'id' => 'post_icon',
     			'label' => __('Post icon', THEMENAME),
     			'type' => 'icon'
 			));
			?>
 		</div>
	</div>
	</div>
</div>
<div id="field_icon" style="display: none;"></div>