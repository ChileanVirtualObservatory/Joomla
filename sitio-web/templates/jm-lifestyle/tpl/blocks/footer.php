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

//get information about style switcher
$styleswitcher = $this->params->get('styleSwitcher', '1');

//get information about 'back to top' button
$backtotop = $this->params->get('backToTop', '1');

?>
<footer id="jm-footer">
	<div class="container<?php echo $fluid; ?>">
		<?php if($this->countModules('footer-mod')) : ?>
			<?php echo DJModuleHelper::renderModules('footer-mod','jmmodule', $fluid); ?>
		<?php endif; ?>
		<div class="row<?php echo $fluid; ?>">
			<?php if($this->countModules('copyrights')) : ?>
			<div class="span6">
				<div id="jm-copyrights">
					<?php echo DJModuleHelper::renderModules('copyrights','jmmodule', $fluid); ?>
				</div>
			</div>
			<?php endif; ?>
			<div class="span6 pull-right">
				<div id="jm-poweredby-styleswitcher" class="pull-right">
					<div id="jm-poweredby">
						<a href="http://www.joomla-monster.com/" onfocus="blur()" target="_blank" title="Joomla Templates">Joomla Templates</a> by Joomla-Monster.com
					</div>
					<?php if($styleswitcher == '1') : ?>
					<div id="jm-styleswitcher">
						<a href="#" id="style_icon-1"><span>&nbsp;</span></a>
						<a href="#" id="style_icon-2"><span>&nbsp;</span></a>
						<a href="#" id="style_icon-3"><span>&nbsp;</span></a>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</footer>
<?php if($backtotop == '1') : ?>
<p id="jm-back-top" style="display: block;"><a href="#top"><span></span>&nbsp;</a></p>
<?php endif; ?>