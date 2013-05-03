<?php
/**
 * EGroupware - eTemplates for Application preferences
 * http://www.egroupware.org
 * generated by soetemplate::dump4setup() 2013-05-03 17:22
 *
 * @license http://opensource.org/licenses/gpl-license.php GPL - GNU General Public License
 * @package preferences
 * @subpackage setup
 * @version $Id$
 */

$templ_version=1;

$templ_data[] = array('name' => 'preferences.settings','template' => '','lang' => '','group' => '0','version' => '1.9.001','data' => 'a:5:{i:0;a:3:{s:4:"name";s:3:"msg";s:4:"type";s:5:"label";s:4:"span";s:10:",redItalic";}i:1;a:4:{s:4:"type";s:6:"select";s:4:"name";s:4:"type";s:8:"onchange";i:1;s:4:"span";s:9:",prefType";}i:2;a:5:{s:4:"type";s:6:"select";s:4:"name";s:7:"appname";s:4:"size";s:18:"Common preferences";s:8:"onchange";i:1;s:4:"span";s:8:",prefApp";}i:3;a:3:{s:4:"name";s:29:"tabs=tab1|tab2|tab3|tab4|tab5";s:4:"type";s:3:"tab";s:5:"label";s:29:"Tab 1|Tab 2|Tab 3|Tab 4|Tab 5";}i:4;a:5:{s:4:"type";s:4:"hbox";s:4:"size";s:1:"3";i:1;a:3:{s:5:"label";s:4:"Save";s:4:"name";s:12:"button[save]";s:4:"type";s:6:"button";}i:2;a:3:{s:5:"label";s:5:"Apply";s:4:"name";s:13:"button[apply]";s:4:"type";s:6:"button";}i:3;a:3:{s:5:"label";s:6:"Cancel";s:4:"name";s:14:"button[cancel]";s:4:"type";s:6:"button";}}}','size' => '','style' => '','modified' => '1367564824',);

$templ_data[] = array('name' => 'preferences.settings.general','template' => '','lang' => '','group' => '0','version' => '1.9.001','data' => 'a:1:{i:0;a:7:{s:4:"type";s:4:"grid";s:4:"name";s:7:"general";s:4:"data";a:2:{i:0;a:2:{s:1:"A";s:3:"50%";s:2:"c1";s:7:"prefRow";}i:1;a:2:{s:1:"A";a:5:{s:4:"type";s:3:"box";s:4:"size";s:1:"2";s:4:"span";s:9:",prefName";i:1;a:2:{s:4:"name";s:13:"${row}[label]";s:4:"type";s:5:"label";}i:2;a:3:{s:4:"name";s:12:"${row}[help]";s:4:"type";s:5:"label";s:4:"span";s:9:",prefHelp";}}s:1:"B";a:4:{s:4:"name";s:13:"${row}[value]";s:4:"type";s:4:"text";s:4:"span";s:10:",prefValue";s:4:"size";s:13:"@${row}[size]";}}}s:4:"cols";i:2;s:4:"rows";i:1;s:4:"size";s:16:"100%,,,prefTable";s:7:"options";a:2:{i:3;s:9:"prefTable";i:0;s:4:"100%";}}}','size' => '100%,,,prefTable','style' => '','modified' => '1367140794',);

$templ_data[] = array('name' => 'preferences.settings.tab1','template' => '','lang' => '','group' => '0','version' => '1.9.001','data' => 'a:1:{i:0;a:7:{s:4:"type";s:4:"grid";s:4:"name";s:4:"tab1";s:4:"data";a:2:{i:0;a:2:{s:1:"A";s:3:"50%";s:2:"c1";s:7:"prefRow";}i:1;a:2:{s:1:"A";a:5:{s:4:"type";s:3:"box";s:4:"size";s:1:"2";s:4:"span";s:9:",prefName";i:1;a:3:{s:3:"for";s:13:"${row}[value]";s:4:"name";s:13:"${row}[label]";s:4:"type";s:5:"label";}i:2;a:3:{s:4:"name";s:12:"${row}[help]";s:4:"type";s:5:"label";s:4:"span";s:9:",prefHelp";}}s:1:"B";a:4:{s:4:"type";s:3:"box";s:4:"size";s:1:"2";i:1;a:5:{s:4:"type";s:13:"@${row}[type]";s:4:"size";s:13:"@${row}[size]";s:7:"no_lang";s:1:"1";s:4:"name";s:13:"@${row}[name]";s:4:"span";s:10:",prefValue";}i:2;a:4:{s:7:"no_lang";s:1:"1";s:4:"name";s:15:"${row}[default]";s:4:"type";s:5:"label";s:4:"span";s:12:",prefDefault";}}}}s:4:"cols";i:2;s:4:"rows";i:1;s:4:"size";s:33:"100%,,,prefTable egwGridView_grid";s:7:"options";a:2:{i:3;s:26:"prefTable egwGridView_grid";i:0;s:4:"100%";}}}','size' => '100%,,,prefTable egwGridView_grid','style' => '','modified' => '1367565943',);

$templ_data[] = array('name' => 'preferences.settings.tab2','template' => '','lang' => '','group' => '0','version' => '1.9.001','data' => 'a:1:{i:0;a:7:{s:4:"type";s:4:"grid";s:4:"name";s:4:"tab2";s:4:"data";a:2:{i:0;a:2:{s:1:"A";s:3:"50%";s:2:"c1";s:7:"prefRow";}i:1;a:2:{s:1:"A";a:5:{s:4:"type";s:3:"box";s:4:"size";s:1:"2";s:4:"span";s:9:",prefName";i:1;a:3:{s:3:"for";s:13:"${row}[value]";s:4:"name";s:13:"${row}[label]";s:4:"type";s:5:"label";}i:2;a:3:{s:4:"name";s:12:"${row}[help]";s:4:"type";s:5:"label";s:4:"span";s:9:",prefHelp";}}s:1:"B";a:4:{s:4:"type";s:3:"box";s:4:"size";s:1:"2";i:1;a:5:{s:4:"type";s:13:"@${row}[type]";s:4:"size";s:13:"@${row}[size]";s:7:"no_lang";s:1:"1";s:4:"name";s:13:"@${row}[name]";s:4:"span";s:10:",prefValue";}i:2;a:4:{s:7:"no_lang";s:1:"1";s:4:"name";s:15:"${row}[default]";s:4:"type";s:5:"label";s:4:"span";s:12:",prefDefault";}}}}s:4:"cols";i:2;s:4:"rows";i:1;s:4:"size";s:33:"100%,,,prefTable egwGridView_grid";s:7:"options";a:2:{i:3;s:26:"prefTable egwGridView_grid";i:0;s:4:"100%";}}}','size' => '100%,,,prefTable egwGridView_grid','style' => '','modified' => '1367566575',);

$templ_data[] = array('name' => 'preferences.settings.tab3','template' => '','lang' => '','group' => '0','version' => '1.9.001','data' => 'a:1:{i:0;a:7:{s:4:"type";s:4:"grid";s:4:"name";s:4:"tab3";s:4:"data";a:2:{i:0;a:2:{s:1:"A";s:3:"50%";s:2:"c1";s:7:"prefRow";}i:1;a:2:{s:1:"A";a:5:{s:4:"type";s:3:"box";s:4:"size";s:1:"2";s:4:"span";s:9:",prefName";i:1;a:3:{s:3:"for";s:13:"${row}[value]";s:4:"name";s:13:"${row}[label]";s:4:"type";s:5:"label";}i:2;a:3:{s:4:"name";s:12:"${row}[help]";s:4:"type";s:5:"label";s:4:"span";s:9:",prefHelp";}}s:1:"B";a:4:{s:4:"type";s:3:"box";s:4:"size";s:1:"2";i:1;a:5:{s:4:"type";s:13:"@${row}[type]";s:4:"size";s:13:"@${row}[size]";s:7:"no_lang";s:1:"1";s:4:"name";s:13:"@${row}[name]";s:4:"span";s:10:",prefValue";}i:2;a:4:{s:7:"no_lang";s:1:"1";s:4:"name";s:15:"${row}[default]";s:4:"type";s:5:"label";s:4:"span";s:12:",prefDefault";}}}}s:4:"cols";i:2;s:4:"rows";i:1;s:4:"size";s:33:"100%,,,prefTable egwGridView_grid";s:7:"options";a:2:{i:3;s:26:"prefTable egwGridView_grid";i:0;s:4:"100%";}}}','size' => '100%,,,prefTable egwGridView_grid','style' => '','modified' => '1367566588',);

$templ_data[] = array('name' => 'preferences.settings.tab4','template' => '','lang' => '','group' => '0','version' => '1.9.001','data' => 'a:1:{i:0;a:7:{s:4:"type";s:4:"grid";s:4:"name";s:4:"tab4";s:4:"data";a:2:{i:0;a:2:{s:1:"A";s:3:"50%";s:2:"c1";s:7:"prefRow";}i:1;a:2:{s:1:"A";a:5:{s:4:"type";s:3:"box";s:4:"size";s:1:"2";s:4:"span";s:9:",prefName";i:1;a:3:{s:3:"for";s:13:"${row}[value]";s:4:"name";s:13:"${row}[label]";s:4:"type";s:5:"label";}i:2;a:3:{s:4:"name";s:12:"${row}[help]";s:4:"type";s:5:"label";s:4:"span";s:9:",prefHelp";}}s:1:"B";a:4:{s:4:"type";s:3:"box";s:4:"size";s:1:"2";i:1;a:5:{s:4:"type";s:13:"@${row}[type]";s:4:"size";s:13:"@${row}[size]";s:7:"no_lang";s:1:"1";s:4:"name";s:13:"@${row}[name]";s:4:"span";s:10:",prefValue";}i:2;a:4:{s:7:"no_lang";s:1:"1";s:4:"name";s:15:"${row}[default]";s:4:"type";s:5:"label";s:4:"span";s:12:",prefDefault";}}}}s:4:"cols";i:2;s:4:"rows";i:1;s:4:"size";s:33:"100%,,,prefTable egwGridView_grid";s:7:"options";a:2:{i:3;s:26:"prefTable egwGridView_grid";i:0;s:4:"100%";}}}','size' => '100%,,,prefTable egwGridView_grid','style' => '','modified' => '1367566604',);

$templ_data[] = array('name' => 'preferences.settings.tab5','template' => '','lang' => '','group' => '0','version' => '1.9.001','data' => 'a:1:{i:0;a:7:{s:4:"type";s:4:"grid";s:4:"name";s:4:"tab5";s:4:"data";a:2:{i:0;a:2:{s:1:"A";s:3:"50%";s:2:"c1";s:7:"prefRow";}i:1;a:2:{s:1:"A";a:5:{s:4:"type";s:3:"box";s:4:"size";s:1:"2";s:4:"span";s:9:",prefName";i:1;a:3:{s:3:"for";s:13:"${row}[value]";s:4:"name";s:13:"${row}[label]";s:4:"type";s:5:"label";}i:2;a:3:{s:4:"name";s:12:"${row}[help]";s:4:"type";s:5:"label";s:4:"span";s:9:",prefHelp";}}s:1:"B";a:4:{s:4:"type";s:3:"box";s:4:"size";s:1:"2";i:1;a:5:{s:4:"type";s:13:"@${row}[type]";s:4:"size";s:13:"@${row}[size]";s:7:"no_lang";s:1:"1";s:4:"name";s:13:"@${row}[name]";s:4:"span";s:10:",prefValue";}i:2;a:4:{s:7:"no_lang";s:1:"1";s:4:"name";s:15:"${row}[default]";s:4:"type";s:5:"label";s:4:"span";s:12:",prefDefault";}}}}s:4:"cols";i:2;s:4:"rows";i:1;s:4:"size";s:33:"100%,,,prefTable egwGridView_grid";s:7:"options";a:2:{i:3;s:26:"prefTable egwGridView_grid";i:0;s:4:"100%";}}}','size' => '100%,,,prefTable egwGridView_grid','style' => '','modified' => '1367583114',);

$templ_data[] = array('name' => 'preferences.test','template' => '','lang' => '','group' => '0','version' => '','data' => 'a:1:{i:0;a:4:{s:4:"type";s:4:"grid";s:4:"data";a:2:{i:0;a:0:{}i:1;a:1:{s:1:"A";a:3:{s:4:"type";s:5:"label";s:5:"label";s:5:"Label";s:4:"name";s:2:"id";}}}s:4:"rows";i:1;s:4:"cols";i:1;}}','size' => '','style' => '','modified' => '1367563385',);

