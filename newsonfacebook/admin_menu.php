<?php
/*
	+---------------------------------------------------------------+
	|	e107 website system
	|
	|	(C) MUWA-Spelle 2008-2011
	|	http://www.muwa-spelle.com
	|	info@muwa-spelle.com
	|
	+---------------------------------------------------------------+
*/

if (!e107_INIT) { die("Restricted Access"); }

global $pageid;

include_lan(e_PLUGIN.'newsonfacebook/languages/'.e_LANGUAGE.'/lan_admin.php');

$menu['config']['text'] = MAIN_ADMIN_L1;
$menu['config']['link'] = "admin.php";

show_admin_menu(MAIN_ADMIN_L0, $pageid, $menu);

?>