<?php

/*--------------------------------------------------------------
# Copyright (C) joomla-monster.com
# License: http://www.joomla-monster.com/license.html Joomla-Monster Proprietary Use License
# Website: http://www.joomla-monster.com
# Support: info@joomla-monster.com
---------------------------------------------------------------*/

//get direction
$direction = $this->params->get('direction', 'ltr');

// template layout
$templatewidthtype = $this->params->get('templateWidthType', '0');
$fluidwidth = $this->params->get('templateFluidWidth', '1170px');
$responsivelayout = $this->params->get('responsiveLayout', '1');

// font settings
$bodyfontcolor = $this->params->get('bodyFontColor', '#686662'); 
$bodyfontsize = $this->params->get('bodyFontSize', '14');
$bodyfonttype = $this->params->get('bodyFontType', '0');
$bodyfontfamily = $this->params->get('bodyFontFamily', 'Arial, Helvetica, sans-serif'); 
$bodycustomfont = $this->params->get('bodyCustomFont', 'Tahoma');  
$bodygooglewebfonturl = $this->params->get('bodyGoogleWebFontUrl');
$bodygooglewebfontfamily = $this->params->get('bodyGoogleWebFontFamily');

$headingsfontsize = $this->params->get('headingsFontSize', '34');
$headingsfonttype = $this->params->get('headingsFontType', '0');
$headingsfontfamily = $this->params->get('headingsFontFamily', 'Arial, Helvetica, sans-serif'); 
$headingscustomfont = $this->params->get('headingsCustomFont', 'Tahoma');   
$headingsgooglewebfonturl = $this->params->get('headingsGoogleWebFontUrl');
$headingsgooglewebfontfamily = $this->params->get('headingsGoogleWebFontFamily');

$djmenufontsize = $this->params->get('djmenuFontSize', '18');
$djmenufonttype = $this->params->get('djmenuFontType', '0');
$djmenufontfamily = $this->params->get('djmenuFontFamily', 'Arial, Helvetica, sans-serif');
$djmenucustomfont = $this->params->get('djmenuCustomFont', 'Tahoma');  
$djmenugooglewebfonturl = $this->params->get('djmenuGoogleWebFontUrl');
$djmenugooglewebfontfamily = $this->params->get('djmenuGoogleWebFontFamily');

$articlesfontsize = $this->params->get('articlesFontSize', '34');
$articlesfonttype = $this->params->get('articlesFontType', '0');
$articlesfontfamily = $this->params->get('articlesFontFamily', 'Arial, Helvetica, sans-serif');
$articlescustomfont = $this->params->get('articlesCustomFont', 'Tahoma'); 
$articlesgooglewebfonturl = $this->params->get('articlesGoogleWebFontUrl');
$articlesgooglewebfontfamily = $this->params->get('articlesGoogleWebFontFamily');

$advancedfontsize = $this->params->get('advancedFontSize', '18');
$advancedfonttype = $this->params->get('advancedFontType', '0');
$advancedfontfamily = $this->params->get('advancedFontFamily', 'Arial, Helvetica, sans-serif');
$advancedcustomfont = $this->params->get('advancedCustomFont', 'Tahoma');   
$advancedgooglewebfonturl = $this->params->get('advancedGoogleWebFontUrl');
$advancedgooglewebfontfamily = $this->params->get('advancedGoogleWebFontFamily');
$advancedselectors = $this->params->get('advancedSelectors');

//grid layout
$gridright = $this->params->get('grid_right');
$gridcontent = $this->params->get('grid_content');

$gridright_fl = $this->params->get('grid_right_fl');
$gridcontent_fl = $this->params->get('grid_content_fl');

$gridright_res = $this->params->get('grid_right_res');
$gridcontent_res = $this->params->get('grid_content_res');

$gridright_fl_res = $this->params->get('grid_right_fl_res');
$gridcontent_fl_res = $this->params->get('grid_content_fl_res');

$gridright_1200 = $this->params->get('grid_right_1200');
$gridcontent_1200 = $this->params->get('grid_content_1200');

$gridright_fl_1200 = $this->params->get('grid_right_fl_1200');
$gridcontent_fl_1200 = $this->params->get('grid_content_fl_1200');

$gutter = $this->params->get('grid_gutter');
$gutter_768 = $this->params->get('grid_gutter_768');
$gutter_fluid = $this->params->get('grid_gutter_fl');
$gutter_1200 = $this->params->get('grid_gutter_1200');
$gutter_fluid_768 = $this->params->get('grid_gutter_fl_res');
$gutter_fluid_1200 = $this->params->get('grid_gutter_fl_1200');

?>

body {
	color:<?php echo $bodyfontcolor; ?>;
	<?php 
	switch($bodyfonttype) {
		case "0":
			echo "font-family: ".$bodyfontfamily.";";
		break;
		case "1":
			echo "font-family: ".$bodycustomfont.";";
		break;
		case "2":		
			echo "font-family: ".$bodygooglewebfontfamily.";";
		break;
		default: 
			echo "font-family: Tahoma;";
	}
	?>
	font-size: <?php echo $bodyfontsize; ?>px;
}

.dj-image-hover {
	color:<?php echo $bodyfontcolor; ?>;
}

.container-fluid {
	<?php if ($templatewidthtype != '0') : ?>
	max-width: <?php echo $fluidwidth; ?>;
	<?php endif; ?>
}

<?php if ($templatewidthtype != '0') : ?>
	#jm-top-bar,
	#jm-top,
	#jm-bar,
	#jm-header,
	#jm-top,
	#jm-breadcrumbs-fontswitcher,
	#jm-main,
	#jm-bottom,
	#jm-footer {
		padding-left: 20px;
		padding-right: 20px;
	}
<?php endif; ?>

<?php if (($responsivelayout == "0") && ($templatewidthtype == '0')) : ?>
#jm-top-bar,
#jm-bar-header,
#jm-bar-header-in,
#jm-breadcrumbs-fontswitcher,
#jm-main,
#jm-top,
#jm-bottom,
#jm-footer {
	min-width: 990px;
}	
<?php endif; ?>	

<?php if ($direction == 'ltr') : ?>
	<?php if ($templatewidthtype == '0') : ?>
	.lcr.scheme3 #jm-content {
	    margin-right: <?php echo $gridright; ?>px; 
	    margin-left: -<?php echo ($gridright + $gridcontent); ?>px;
	}
	<?php endif; ?>
	<?php if ($templatewidthtype == '1') : ?>
	.lcr.scheme3 #jm-content {
	    margin-right: <?php echo $gridright_fl; ?>% !important; 
	    margin-left: -<?php echo ($gridright_fl + $gridcontent_fl); ?>% !important;
	}
	.lrc.scheme3 #jm-content,
	.lrc.scheme2 #jm-content,
	.lcr.scheme2.noright #jm-content {
		margin-left: <?php echo $gutter_fluid; ?>%;
	}
	<?php endif; ?>
<?php endif; ?>

<?php if ($direction == 'rtl') : ?>
	<?php if ($templatewidthtype == '0') : ?>
	.lcr.scheme3 #jm-content {
	    margin-right: <?php echo $gridright + $gutter; ?>px; 
	    margin-left: -<?php echo ($gridright + $gridcontent); ?>px;
	}
	<?php endif; ?>
	<?php if ($templatewidthtype == '1') : ?>
	.lcr.scheme3 #jm-content {
	    margin-right: <?php echo $gridright_fl; ?>% !important; 
	    margin-left: -<?php echo ($gridright_fl + $gridcontent_fl); ?>% !important;
	}
	.clr.scheme3 #jm-content,
	.clr.scheme2 #jm-content {
		margin-right: <?php echo $gutter_fluid; ?>%;
	}
	<?php endif; ?>
<?php endif; ?>

<?php if ($responsivelayout == "1") : ?>
@media (min-width: 1200px) {	
	<?php if ($direction == 'ltr') : ?>
		<?php if ($templatewidthtype == '0') : ?>
		.lcr.scheme3 #jm-content {
		    margin-right: <?php echo $gridright_1200; ?>px; 
		    margin-left: -<?php echo ($gridright_1200 + $gridcontent_1200); ?>px;
		}
		<?php endif; ?>
		<?php if ($templatewidthtype == '1') : ?>
		.lcr.scheme3 #jm-content {
		    margin-right: <?php echo $gridright_fl_1200; ?>% !important; 
		    margin-left: -<?php echo ($gridright_fl_1200 + $gridcontent_fl_1200); ?>% !important;
		}
		.lrc.scheme3 #jm-content,
		.lrc.scheme2 #jm-content,
		.lcr.scheme2.noright #jm-content {
			margin-left: <?php echo $gutter_fluid_1200; ?>%;
		}
		<?php endif; ?>
	<?php endif; ?>
	
	<?php if ($direction == 'rtl') : ?>
		<?php if ($templatewidthtype == '0') : ?>
		.lcr.scheme3 #jm-content {
		    margin-right: <?php echo $gridright_1200 + $gutter_1200; ?>px; 
		    margin-left: -<?php echo ($gridright_1200 + $gridcontent_1200); ?>px;
		}
		<?php endif; ?>
		<?php if ($templatewidthtype == '1') : ?>
		.lcr.scheme3 #jm-content {
		    margin-right: <?php echo $gridright_fl_1200; ?>% !important; 
		    margin-left: -<?php echo ($gridright_fl_1200 + $gridcontent_fl_1200); ?>% !important;
		}
		.clr.scheme3 #jm-content,
		.clr.scheme2 #jm-content {
			margin-right: <?php echo $gutter_fluid_1200; ?>%;
		}
		<?php endif; ?>
	<?php endif; ?>
}	
@media (min-width: 768px) and (max-width: 979px) {
	<?php if ($direction == 'ltr') : ?>
		<?php if ($templatewidthtype == '0') : ?>
		.lcr.scheme3 #jm-content {
		    margin-right: <?php echo $gridright_res; ?>px; 
		    margin-left: -<?php echo ($gridright_res + $gridcontent_res); ?>px;
		}
		<?php endif; ?>
		<?php if ($templatewidthtype == '1') : ?>
		.lcr.scheme3 #jm-content {
		    margin-right: <?php echo $gridright_fl_res; ?>% !important; 
		    margin-left: -<?php echo ($gridright_fl_res + $gridcontent_fl_res); ?>% !important;
		}
		.lrc.scheme3 #jm-content,
		.lrc.scheme2 #jm-content,
		.lcr.scheme2.noright #jm-content {
			margin-left: <?php echo $gutter_fluid_768; ?>%;
		}
		<?php endif; ?>
	<?php endif; ?>	
	<?php if ($direction == 'rtl') : ?>
		<?php if ($templatewidthtype == '0') : ?>
		.lcr.scheme3 #jm-content {
		    margin-right: <?php echo $gridright_res + $gutter_768; ?>px; 
		    margin-left: -<?php echo ($gridright_res + $gridcontent_res); ?>px;
		}
		<?php endif; ?>
		<?php if ($templatewidthtype == '1') : ?>
		.lcr.scheme3 #jm-content {
		    margin-right: <?php echo $gridright_fl_res; ?>% !important; 
		    margin-left: -<?php echo ($gridright_fl_res + $gridcontent_fl_res); ?>% !important;
		}
		.clr.scheme3 #jm-content,
		.clr.scheme2 #jm-content {
			margin-right: <?php echo $gutter_fluid_768; ?>%;
		}
		<?php endif; ?>
	<?php endif; ?>	
}
<?php endif; ?>	

.jm-module h3.jm-title {
	<?php 
	switch($headingsfonttype) {
		case "0":
			echo "font-family: ".$headingsfontfamily.";";
		break;
		case "1":
			echo "font-family: ".$headingscustomfont.";";
		break;
		case "2":		
			echo "font-family: ".$headingsgooglewebfontfamily.";";
		break;
		default: 
			echo "font-family: Tahoma;";
	}
	?>
	font-size: <?php echo $headingsfontsize; ?>px;
}

.dj-main li a.dj-up_a {
	<?php 
	switch($djmenufonttype) {
		case "0":
			echo "font-family: ".$djmenufontfamily.";";
		break;
		case "1":
			echo "font-family: ".$djmenucustomfont.";";
		break;
		case "2":		
			echo "font-family: ".$djmenugooglewebfontfamily.";";
		break;
		default: 
			echo "font-family: Tahoma;";
	}
	?>
	font-size: <?php echo $djmenufontsize; ?>px;
}

.page-header h2,
h2.item-title,
.tag-category h2 {
	<?php 
	switch($articlesfonttype) {
		case "0":
			echo "font-family: ".$articlesfontfamily.";";
		break;
		case "1": 
			echo "font-family: ".$articlescustomfont.";";
		break;
		case "2":		
			echo "font-family: ".$articlesgooglewebfontfamily.";";
		break;
		default: 
			echo "font-family: Tahoma;";
	}
	?>
	font-size: <?php echo $articlesfontsize; ?>px;
}

<?php if($advancedselectors != '') {
	echo $advancedselectors; ?> {
	<?php 
	switch($advancedfonttype) {
		case "0":
			echo "font-family: ".$advancedfontfamily.";";
		break;
		case "1": 
			echo "font-family: ".$advancedcustomfont.";";
		break;
		case "2":		
			echo "font-family: ".$advancedgooglewebfontfamily.";";
		break;
		default: 
			echo "font-family: Tahoma;";
	}
	?>
	font-size: <?php echo $advancedfontsize; ?>px;
}
<?php } ?>