<?php global $smof_data; ?>
		</div>
		<footer>
		<?php cshero_footer(); ?>
		<?php echo $smof_data["space_body"]; ?>
		<?php if($smof_data['footer_to_top'] == '1'): ?>
		<a id="back_to_top" class="back_to_top">
			<span class="go_up">
				<i style="" class="fa fa-arrow-up"></i>
			</span></a>
		<?php endif; ?>
		<div id="cs-debug-wrap" class="clearfix">
            <?php dynamic_sidebar('cshero-debug-widget');?>
        </div>
		<?php wp_footer(); ?>
<!-- Google Code for Remarketing Tag -->
<!--------------------------------------------------
Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. See more information and instructions on how to setup the tag on: http://google.com/ads/remarketingsetup
--------------------------------------------------->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 934317105;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/934317105/?value=0&amp;guid=ON&amp;script=0"/>
</div>
</noscript>		
</footer>
<script type="text/javascript">
var _ss = _ss || [];
_ss.push(['_setDomain', 'https://koi-3Q6IRVPYYW.marketingautomation.services/net']);
_ss.push(['_setAccount', 'KOI-3Q8DE68J0O']);
_ss.push(['_trackPageView']);
(function() {
    var ss = document.createElement('script');
    ss.type = 'text/javascript'; ss.async = true;

    ss.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'koi-3Q6IRVPYYW.marketingautomation.services/client/ss.js?ver=1.1.1';
    var scr = document.getElementsByTagName('script')[0];
    scr.parentNode.insertBefore(ss, scr);
})();
</script>	
</body>
</html>