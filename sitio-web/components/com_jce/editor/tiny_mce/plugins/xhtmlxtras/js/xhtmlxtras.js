/* JCE Editor - 2.3.3.2 | 13 July 2013 | http://www.joomlacontenteditor.net | Copyright (C) 2006 - 2013 Ryan Demmer. All rights reserved | GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html */
var XHTMLXtrasDialog={settings:{},init:function(){tinyMCEPopup.resizeToInnerSize();var ed=tinyMCEPopup.editor,se=ed.selection,n=se.getNode(),element=tinyMCEPopup.getWindowArg('element');if(element){n=ed.dom.getParent(n,element);}
TinyMCE_Utils.fillClassList('class');$.Plugin.init();if(n){var text=n.textContent||n.innerText||'';if(se.isCollapsed()||text==se.getContent({format:'text'})){$(':input').each(function(){var k=$(this).attr('id');if(/on(click|dblclick)/.test(k)){k='data-mce-'+k;}
$(this).val(ed.dom.getAttrib(n,k));});$('#insert').button('option','label',ed.getLang('update','Insert'));}}
$('#remove').button({icons:{primary:'ui-icon-minus'}}).toggle(!!element);if(ed.settings.schema!=='html5'&&ed.settings.validate===true){$('input.html5').parent('td').parent('tr').hide();}
if(!tinymce.is(n,':input, form')){$('input.form').parent('td').parent('tr').hide();}
if(!tinymce.is(n,'img')){$('input.media').parent('td').parent('tr').hide();}},insert:function(){var ed=tinyMCEPopup.editor,se=ed.selection,n=se.getNode(),elm;tinyMCEPopup.restoreSelection();var element=tinyMCEPopup.getWindowArg('element');var args={};$(':input').each(function(){var k=$(this).attr('id'),v=$(this).val();if(/on(click|dblclick)/.test(k)){k='data-mce-'+k;}
args[k]=v;});if(element){if(n.nodeName.toLowerCase()==element){elm=n;}else{elm=ed.dom.getParent(n,element);}
ed.formatter.apply(element.toLowerCase(),args,elm);}else{var isTextSelection=se.getContent()==se.getContent({format:'text'});if(n==ed.getBody()||isTextSelection){ed.formatter.apply('attributes',args);}else{ed.dom.setAttribs(n,args);}}
ed.undoManager.add();tinyMCEPopup.close();},remove:function(){var ed=tinyMCEPopup.editor;var element=tinyMCEPopup.getWindowArg('element');if(element){ed.formatter.remove(element);ed.undoManager.add();}
tinyMCEPopup.close();},insertDateTime:function(id){document.getElementById(id).value=this.getDateTime(new Date(),"%Y-%m-%dT%H:%M:%S");},getDateTime:function(d,fmt){fmt=fmt.replace("%D","%m/%d/%y");fmt=fmt.replace("%r","%I:%M:%S %p");fmt=fmt.replace("%Y",""+d.getFullYear());fmt=fmt.replace("%y",""+d.getYear());fmt=fmt.replace("%m",this.addZeros(d.getMonth()+1,2));fmt=fmt.replace("%d",this.addZeros(d.getDate(),2));fmt=fmt.replace("%H",""+this.addZeros(d.getHours(),2));fmt=fmt.replace("%M",""+this.addZeros(d.getMinutes(),2));fmt=fmt.replace("%S",""+this.addZeros(d.getSeconds(),2));fmt=fmt.replace("%I",""+((d.getHours()+11)%12+1));fmt=fmt.replace("%p",""+(d.getHours()<12?"AM":"PM"));fmt=fmt.replace("%%","%");return fmt;},addZeros:function(value,len){var i;value=""+value;if(value.length<len){for(i=0;i<(len-value.length);i++)
value="0"+value;}
return value;}};tinyMCEPopup.onInit.add(XHTMLXtrasDialog.init,XHTMLXtrasDialog);