<?php
/*--------------------------------------------------------------
# Copyright (C) joomla-monster.com
# License: http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
# Website: http://www.joomla-monster.com
# Support: info@joomla-monster.com
---------------------------------------------------------------*/

defined('_JEXEC') or die;

//get template width type
$templatewidthtype = $this->params->get('templateWidthType', '0');
$fluid = ($templatewidthtype != '0') ? '-fluid' : '';

//get information about font size switcher
$fontswitcher = $this->params->get('fontSizeSwitcher', '0');

if(!$fontswitcher) {
	$breadcrumbsspan = "12";
} else {
	$breadcrumbsspan = "10";
}

if(!$this->countModules('breadcrumbs')) {
	$fontswitcherspan = "12";
} else {
	$fontswitcherspan = "2";
}

?>
<?php if($this->countModules('breadcrumbs') or $fontswitcher == "1") : ?>
<section id="jm-breadcrumbs-fontswitcher">
	<div class="container<?php echo $fluid; ?>">
		<div class="row<?php echo $fluid; ?>">
			<?php if($this->countModules('breadcrumbs')) : ?>
			<div class="span<?php echo $breadcrumbsspan; ?>">
				<div id="jm-breadcrumbs">
					<?php echo DJModuleHelper::renderModules('breadcrumbs','jmmodule', $fluid); ?>
				</div>
			</div>
			<?php endif; ?>
			<?php if($fontswitcher) : ?>
			<div class="span<?php echo $fontswitcherspan; ?>">
	            <div id="jm-font-switcher">
	                <a href="index.php" class="texttoggler" rel="smallview" title="small size"><img src="<?php echo JMF_TPL_URL ?>/images/smaller.png" alt="Smaller" /></a>
	                <a href="index.php" class="texttoggler" rel="normalview" title="normal size"><img src="<?php echo JMF_TPL_URL ?>/images/default.png" alt="Default" /></a>
	                <a href="index.php" class="texttoggler" rel="largeview" title="large size"><img src="<?php echo JMF_TPL_URL ?>/images/larger.png" alt="Larger" /></a>
	            	<script type="text/javascript">
					//documenttextsizer.setup("shared_css_class_of_toggler_controls")
					documenttextsizer.setup("texttoggler")
					</script>
	            </div>
			</div>
			<?php endif; ?>
		</div>
	</div>
</section>
<?php endif; ?>