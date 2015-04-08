<?php
/*--------------------------------------------------------------
# Copyright (C) joomla-monster.com
# License: http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
# Website: http://www.joomla-monster.com
# Support: info@joomla-monster.com
---------------------------------------------------------------*/

defined('_JEXEC') or die;

// get direction
$direction = $this->params->get('direction', 'ltr');

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $direction; ?>">
	<?php $this->renderBlock('head'); ?>
	<body>
		<?php $this->renderBlock('top-bar'); ?>
		<?php $this->renderBlock('header'); ?>
		<?php $this->renderBlock('top'); ?>
		<?php $this->renderBlock('breadcrumbs'); ?>
		<?php $this->renderBlock('content-left-right'); ?>
		<?php $this->renderBlock('bottom'); ?>
		<!--<?php $this->renderBlock('footer'); ?>-->
	</body>
</html>