/* JCE Editor - 2.3.3.2 | 13 July 2013 | http://www.joomlacontenteditor.net | Copyright (C) 2006 - 2013 Ryan Demmer. All rights reserved | GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html */
(function($){Joomla.submitbutton=submitbutton=function(button){if(button=="cancelEdit"){try{Joomla.submitform(button);}catch(e){submitform(button);}
return;}
var $profiles=$jce.Profiles;if($profiles.validate()){$profiles.onSubmit();try{Joomla.submitform(button);}catch(e){submitform(button);}}};$.jce.Profiles={options:{},init:function(){var self=this,init=true;var dir=$('body').css('direction')=='rtl'?'right':'left';$('a#users-add').button({icons:{primary:'ui-icon-person'}});$("#tabs-editor").tabs({'active':0,beforeActivate:function(event,ui){$(ui.oldTab).removeClass('active');$(ui.newTab).addClass('active');}}).find('ul.ui-tabs-nav > li.ui-state-default:first-child').addClass('active');$("#tabs-plugins").tabs({beforeActivate:function(event,ui){$(ui.oldTab).removeClass('active');$(ui.newTab).addClass('active');}}).find('ul.ui-tabs-nav > li.ui-state-default:not(.ui-state-disabled):first').addClass('active').children('a.ui-tabs-anchor').click();$('input.checkbox-list-toggle-all').click(function(){$('input[type="checkbox"]','#user-groups').prop('checked',this.checked).trigger('check');});$('input[name="components-select"]').click(function(){$('input[type="checkbox"]','#components').prop('disabled',(this.value=='all')).trigger('disable').filter(':checked').prop('checked',false).trigger('check');});$("select.editable, select.combobox").combobox(this.options.combobox);$('input.color').colorpicker($.extend(this.options.colorpicker,{parent:'#jce'}));$('select.extensions, input.extensions, textarea.extensions').extensionmapper(this.options.extensions);this.createLayout();$('select.checklist, input.checklist').checkList({onCheck:function(){self.setRows();}});$('#paramseditorwidth').change(function(){var v=$(this).val()||600,s=v+'px';if(/%/.test(v)){s=v,v=600;}else{v=parseInt(v),s=v+'px';}
$('span.widthMarker span','#profileLayoutTable').html(s);$('#editor_container').width(v);$('span.widthMarker, #statusbar_container span.mceStatusbar').width(v);});$('#paramseditorheight').change(function(){var v=$(this).val()||'auto';if(/%/.test(v)){v='auto';}else{if($.type(v)=='number'){v=parseInt(v);}}});$('#paramseditortoolbar_theme').change(function(){var v=$(this).val();if(v.indexOf('.')!=-1){v=v.split('.');var s=v[0]+'Skin';var c=v[1];v=s+' '+s+c.charAt(0).toUpperCase()+c.substring(1);}else{v+='Skin';}
$('span.profileLayoutContainer').each(function(){var cls=this.className;cls=cls.replace(/([a-z0-9]+)Skin([a-z0-9]*)/gi,'');this.className=$.trim(cls);}).addClass(v);});$('#paramseditortoolbar_align').change(function(){var v=$(this).val();$('ul.sortableList','#toolbar_container').removeClass('mceLeft mceCenter mceRight').addClass('mce'+v.charAt(0).toUpperCase()+v.substring(1));self._fixLayout();}).change();$('#paramseditorpath').change(function(){$('span.mceStatusbar span.mcePathLabel').toggle($(this).val()==1);}).change();$('ul#profileAdditionalFeatures input:checkbox').click(function(){self.setPlugins();});$('#paramseditortoolbar_location').change(function(){var $after=$('#editor_container');if($(this).val()=='top'){$after=$('span.widthMarker');}
$('#toolbar_container').insertAfter($after);}).change();$('#paramseditorstatusbar_location').change(function(){var v=$(this).val();$('#statusbar_container').show();if(v=='none'){$('#statusbar_container').hide();}
var $after=$('#editor_container');if(v=='top'){$after=$('span.widthMarker');if($('#paramseditortoolbar_location').val()=='top'){$after=$('#toolbar_container');}}
$('#statusbar_container').insertAfter($after);}).change();$('#paramseditorresizing').change(function(){var v=$(this).val();$('a.mceResize','#statusbar_container').toggle(v==1);}).change();$('#paramseditortoggle').change(function(){var v=$(this).val();$('#editor_toggle').toggle(v==1);}).change();$('#paramseditortoggle_label').on('change keyup',function(){if(this.value){$('#editor_toggle').text(this.value);}});$('#users').click(function(e){var n=e.target;if($(n).is('span.users-list-delete')){$(n).parent().parent().remove();}});$('#tabs-features :input[name], #tabs-editor :input[name], #tabs-plugins :input[name]').change(function(){if(init){return;}
var name=this.name.replace('!"#$%&()*+,./:;<=>?@[\]^`{|}~','\\$1','g');$(this).add('[name="'+name+'"]').addClass('isdirty');});$('input.plugins-enable-checkbox').on('click',function(){var s=this.checked,name=$(this).data('name'),proxy=$(this).next('input[type="hidden"]');if($(proxy).length==0){proxy=$('<input type="hidden" name="'+$(this).attr('name')+'" />').insertAfter(this);}
$(this).change().val(s?1:0).removeAttr('name');$(proxy).val(s?1:0).change();$('select.plugins-default-select',$(this).parents('fieldset:first')).children('option[value="'+name+'"]').prop('disabled',!s).parent().val(function(i,v){if(v===name){return"";}
return v;});}).change(function(){$(this).removeClass('isdirty');});init=false;},validate:function(){var required=[];$(':input.required').each(function(){if($(this).val()===''){var parent=$(this).parents('div.tab-pane').get(0);required.push("\n"+$('#tabs ul li a[href=#'+parent.id+']').html()+' - '+$.trim($('label[for="'+this.id+'"]').html()));}});if(required.length){var msg=$.jce.options.labels.required;msg+=required.join(',');alert(msg);return false;}
return true;},onSubmit:function(){$('div#tabs-editor, div#tabs-plugins').find(':input[name].placeholder').prop('disabled',true);$('#tabs-features :input[name], #tabs-editor :input[name], #tabs-plugins :input[name]').not('.isdirty').prop('disabled',true).parents('.ui-radio, .ui-checkbox').addClass('disabled');},_fixLayout:function(){$('span.mceButton, span.mceSplitButton').removeClass('mceStart mceEnd');$('span.mceListBox').parent('span.sortableRowItem').prev('span.sortableRowItem').children('span.mceButton:last, span.mceSplitButton:last').addClass('mceEnd');$('span.mceListBox').parent('span.sortableRowItem').next('span.sortableRowItem').children('span.mceButton:first, span.mceSplitButton:first').addClass('mceStart');},createLayout:function(){var self=this;$("ul.sortableList").sortable({connectWith:'ul.sortableList',axis:'y',update:function(event,ui){self.setRows();self.setPlugins();},start:function(event,ui){$(ui.placeholder).width($(ui.item).width());},placeholder:'sortableListItem sortable-highlight',opacity:0.8});$('span.sortableOption').hover(function(){$(this).append('<span role="button"/>');},function(){$(this).empty();}).click(function(){var $parent=$(this).parents('li.sortableListItem').first();var $target=$('ul.sortableList','#profileLayoutTable').not($parent.parent());$parent.appendTo($target);$(this).empty();self.setRows();self.setPlugins();});$('span.sortableRow').sortable({connectWith:'span.sortableRow',tolerance:'pointer',update:function(event,ui){self.setRows();self.setPlugins();self._fixLayout();},start:function(event,ui){$(ui.placeholder).width($(ui.item).width());},opacity:0.8,placeholder:'sortableRowItem sortable-highlight'});this._fixLayout();},setRows:function(){var rows=[];$('span.sortableRow','#toolbar_container').has('span.sortableRowItem').each(function(){rows.push($.map($('span.sortableRowItem',this),function(el){return $(el).data('name');}).join(','));});var v=rows.join(';');$('input[name="rows"]').val(v).change();},setLayout:function(){var $spans=$('span.profileLayoutContainerCurrent > span').not('span.widthMarker');$.each(['toolbar','editor','statusbar'],function(){$('#paramseditor'+this+'_location').val($spans.index($('#'+this+'_container')));});},setPlugins:function(){var self=this,plugins=[];$('span.sortableRow span.plugin','#toolbar_container').each(function(){plugins.push($(this).data('name'));});$('ul#profileAdditionalFeatures input:checkbox:checked').each(function(){plugins.push($(this).val());});$('input[name="plugins"]').val(plugins.join(',')).change();this.setParams(plugins);},setParams:function(plugins){var $tabs=$('div#tabs-plugins > ul.nav.nav-tabs > li');$tabs.removeClass('tab-disabled ui-state-disabled').removeClass('active ui-tabs-active ui-state-active').each(function(i){var name=$(this).data('name');var s=$.inArray(name,plugins)!=-1;$('input[name], select[name]',this).prop('disabled',!s);if(!s){$(this).addClass('tab-disabled');}});$tabs.not('.tab-disabled').first().addClass('active ui-tabs-active ui-state-active');}};$(document).ready(function(){$.jce.Profiles.init();});})(jQuery);