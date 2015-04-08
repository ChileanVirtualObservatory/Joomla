<?php 
/**
 * @version 1.7.3
 * @package DJ-Menu
 * @copyright Copyright (C) 2012 DJ-Extensions.com LTD, All rights reserved.
 * @license http://www.gnu.org/licenses GNU/GPL
 * @author url: http://dj-extensions.com
 * @author email contact@dj-extensions.com
 * @developer Szymon Woronowski - szymon.woronowski@design-joomla.eu
 *
 * DJ Menu is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * DJ Menu is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with DJ Menu. If not, see <http://www.gnu.org/licenses/>.
 *
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

// joomla3.0 compability
defined('DS') or define('DS', DIRECTORY_SEPARATOR);

// Include the syndicate functions only once
require_once (dirname(__FILE__).DS.'helper.php');

$app = JFactory::getApplication();
$document = JFactory::getDocument();

JHTML::_('behavior.framework');

$document->addScript('modules/mod_djmenu/assets/js/dropline-helper.js');

if($params->get('select',1)) {
	$document->addScript('modules/mod_djmenu/assets/js/djselect.js');
	$document->addScriptDeclaration("window.addEvent('domready',function(){document.id('dj-main$module->id').addClass('allowHide')});");
	$document->addStyleDeclaration("
		.dj-select {display: none;margin:10px;padding:5px;font-size:1.5em;max-width:95%;height:auto;}
		@media (max-width: ".$params->get('width',800)."px) {
  			#dj-main$module->id.allowHide { display: none; }
  			#dj-main$module->id"."select { display: inline-block; }
		}
	");
}

if($params->get('css',1) || !file_exists(JPATH_ROOT.DS.'templates'.DS.$app->getTemplate().DS.'css'.DS.'djmenu_fx.css')) {
	$css_fx = 'modules/mod_djmenu/assets/css/djmenu_fx.css';
} else {
	$css_fx = 'templates/'.$app->getTemplate().'/css/djmenu_fx.css';
}
if($params->get('css',1) || !file_exists(JPATH_ROOT.DS.'templates'.DS.$app->getTemplate().DS.'css'.DS.'djmenu.css')) {
	$css = 'modules/mod_djmenu/assets/css/djmenu.css';
} else {
	$css = 'templates/'.$app->getTemplate().'/css/djmenu.css';
}

if($params->get('moo',1)) {	
	
	$document->addScript('modules/mod_djmenu/assets/js/djmenu.js');
	$document->addStyleSheet($css);
	$document->addStyleSheet($css_fx);
	
	$effect = $params->get('effect');
	if($effect!='linear') $effect.=':out';
	if(!is_numeric($duration = $params->get('duration'))) $duration = 200;
	if(!is_numeric($delay = $params->get('delay'))) $delay = 1200;
	$height_fx = ($params->get('height_fx')) ? 'true' : 'false';
	$width_fx = ($params->get('width_fx')) ? 'true' : 'false';
	$opacity_fx = ($params->get('opacity_fx')) ? 'true' : 'false';
	$height_fx_sub = ($params->get('height_fx_sub')) ? 'true' : 'false';
	$width_fx_sub = ($params->get('width_fx_sub')) ? 'true' : 'false';
	$opacity_fx_sub = ($params->get('opacity_fx_sub')) ? 'true' : 'false';
	$wrapper_id = $params->get('wrapper');
	
	$options = "{wrapper: document.id('$wrapper_id'), transition: '$effect', duration: $duration, delay: $delay,
		height_fx: $height_fx, width_fx: $width_fx, opacity_fx: $opacity_fx,
		height_fx_sub: $height_fx_sub, width_fx_sub: $width_fx_sub, opacity_fx_sub: $opacity_fx_sub }";
	
	$js = "window.addEvent('domready',function(){ this.djmenu$module->id = new DJMenus(document.id('dj-main$module->id'), $options); });";
	
	$document->addScriptDeclaration($js);
	
} else {
	
	if(preg_match('/MSIE 6.0/',$_SERVER['HTTP_USER_AGENT'])) { // IE6
		$css = $css_fx;
		$document->addScript('modules/mod_djmenu/assets/js/ie6Hover.js');
	}
	$document->addStyleSheet($css);
}

$params->def('module_id',$module->id);
$djmenu = new modDJMenuHelper();

require(JModuleHelper::getLayoutPath('mod_djmenu'));

?>