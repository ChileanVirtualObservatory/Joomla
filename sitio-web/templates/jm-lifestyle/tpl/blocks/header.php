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

//get logo and site description
$logo = $this->params->get('logo');
$logotext = $this->params->get('logoText');
$sitedescription = $this->params->get('siteDescription');

//get info about top module
$notop = !$this->countModules('top') ? 'class="notop"' : '';

//get info about header module
$noheader = !$this->countModules('header') ? 'class="noheader"' : '';

//set grid size
$djmenuspan = ($logo == '') && ($logotext == '') && ($sitedescription == '') ? '12' : '8';
$logospan = $this->countModules('top-menu-nav') ? '4' : '12';

?>
<?php if (($logo != '') or ($logotext != '') or ($sitedescription != '') or $this->countModules('top-menu-nav') or $this->countModules('header')) : ?>
<div id="jm-bar-header" <?php echo $noheader; ?>>
	<div id="jm-bar-header-in">
		<?php if (($logo != '') or ($logotext != '') or ($sitedescription != '') or $this->countModules('top-menu-nav')) : ?>
		<header id="jm-bar">
			<div id="jm-bar-in" class="container<?php echo $fluid; ?>">
				<div class="row<?php echo $fluid; ?>">
		        	<?php if (($logo != '') or ($logotext != '') or ($sitedescription != '')) : ?>
		        	<div class="span<?php echo $logospan; ?>">
		                <div id="jm-logo-sitedesc">
		                    <?php if (($logo != '') or ($logotext != '')) : ?>
		                    <h1 id="jm-logo">
		                    	<a href="<?php echo JURI::base(); ?>" onfocus="blur()" >
		                    		<?php if ($logo != '') : ?>
		                    		<img src="<?php echo JURI::base(); echo htmlspecialchars($logo); ?>" alt="<?php echo htmlspecialchars($logotext);?>" border="0" />
		                    		<?php else : ?>
		                    		<?php echo htmlspecialchars($logotext);?>
		                    		<?php endif; ?>
		                    	</a>
		                    </h1>
		                    <?php endif; ?>
		                    <?php if ($sitedescription != '') : ?>
		                    <div id="jm-sitedesc">
		                    	<?php echo htmlspecialchars($sitedescription); ?>
		                    </div>
		                    <?php endif; ?>
		                </div>
		            </div>
		            <?php endif; ?>
					<?php if($this->countModules('top-menu-nav')) : ?>
					<div class="span<?php echo $djmenuspan; ?>">
						<nav id="jm-djmenu" class="pull-right">
							<?php echo DJModuleHelper::renderModules('top-menu-nav','jmmodule', $fluid); ?>
						</nav>
					</div>
					<?php endif; ?>
				</div>
			</div>	
		</header>
		<?php endif; ?>
		<?php if($this->countModules('header')) : ?>
		<section id="jm-header" <?php echo $notop; ?>>
			<div class="container<?php echo $fluid; ?>">
				<?php if($this->countModules('header-mod1') or $this->countModules('header-mod2')) : ?>
				<div id="jm-header-mods">
					<div class="row<?php echo $fluid; ?>">
						<?php if($this->countModules('header-mod1')) : ?>
						<div class="span3">
							<div id="jm-header-mod1">
								<?php echo DJModuleHelper::renderModules('header-mod1','jmmodule', $fluid); ?>
							</div>
						</div>
						<?php endif; ?>
						<?php if($this->countModules('header-mod2')) : ?>
						<div class="span3 pull-right">
							<div id="jm-header-mod2">
								<?php echo DJModuleHelper::renderModules('header-mod2','jmmodule', $fluid); ?>
							</div>
						</div>
						<?php endif; ?>
					</div>
				</div>
				<?php endif; ?>
				<jdoc:include type="modules" name="header" style="raw"/>
			</div>
		</section>
		<?php endif; ?>
	</div>
</div>
<?php endif; ?>