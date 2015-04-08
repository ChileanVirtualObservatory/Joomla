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

//get column's width
$columnleft = $this->params->get('columnLeftWidth', '3');
$columnright = $this->params->get('columnRightWidth', '3');
$columncontent = $this->params->get('columnContentWidth');

// get scheme option
$schemeoption = $this->params->get('schemeOption', 'lcr');
$currentscheme = $this->params->get('currentScheme');

?>
<section id="jm-main" class="<?php echo $currentscheme.' '.$schemeoption; ?>">
	<div class="container<?php echo $fluid; ?>">
		<div class="row<?php echo $fluid; ?>">
			<div id="jm-content" class="span<?php echo $columncontent; ?>">
				<?php if($this->countModules('content-top')) : ?>
				<div id="jm-content-top">
					<?php echo DJModuleHelper::renderModules('content-top','jmmodule', $fluid); ?>
				</div>
				<?php endif; ?>
				<?php if (!in_array(JRequest::getVar('Itemid'),(array)$this->params->get('DisableComponentDisplay', array()))) { ?>
				<div id="jm-maincontent">
					<jdoc:include type="message" />
					<jdoc:include type="component" />
				</div>
				<?php } ?>
				<?php if($this->countModules('content-bottom')) : ?>
				<div id="jm-content-bottom">
					<?php echo DJModuleHelper::renderModules('content-bottom','jmmodule', $fluid); ?>
				</div>
				<?php endif; ?>
			</div>
			<?php if($this->countModules('left-column')) : ?>
			<aside id="jm-left" class="span<?php echo $columnleft; ?>">
				<?php echo DJModuleHelper::renderModules('left-column','jmmodule', $fluid); ?>
			</aside>
			<?php endif; ?>
			<?php if($this->countModules('right-column')) : ?>
			<aside id="jm-right" class="span<?php echo $columnright; ?>">
				<?php echo DJModuleHelper::renderModules('right-column','jmmodule', $fluid); ?>
			</aside>
			<?php endif; ?>
		</div>
	</div>
</section>