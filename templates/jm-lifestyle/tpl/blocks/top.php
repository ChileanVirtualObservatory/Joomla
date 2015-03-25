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

?>
<?php if($this->countModules('top')) : ?>
<section id="jm-top">
	<div class="container<?php echo $fluid; ?>">
		<?php echo DJModuleHelper::renderModules('top','jmmodule', $fluid); ?>
	</div>
</section>
<?php endif; ?>