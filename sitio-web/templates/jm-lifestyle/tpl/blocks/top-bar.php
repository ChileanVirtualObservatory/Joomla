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

//set grid size
if(!$this->countModules('top-bar1')) {
	$topbarspan1 = "12";
} else {
	$topbarspan1 = "6";
}

if(!$this->countModules('top-bar2')) {
	$topbarspan2 = "12";
} else {
	$topbarspan2 = "6";
}

?>
<?php if($this->countModules('top-bar1') or $this->countModules('top-bar2')) : ?>
<section id="jm-top-bar">
	<div class="container<?php echo $fluid; ?>">
		<div class="row<?php echo $fluid; ?>">
			<?php if($this->countModules('top-bar1')) : ?>
			<div class="span<?php echo $topbarspan2; ?>">
				<div id="jm-top-bar1">
					<?php echo DJModuleHelper::renderModules('top-bar1','jmmodule', $fluid); ?>
				</div>
			</div>
			<?php endif; ?>
			<?php if($this->countModules('top-bar2')) : ?>
			<div class="span<?php echo $topbarspan1; ?>">
				<div id="jm-top-bar2">
					<?php echo DJModuleHelper::renderModules('top-bar2','jmmodule', $fluid); ?>
				</div>
			</div>
			<?php endif; ?>
		</div>
	</div>
</section>
<?php endif; ?>