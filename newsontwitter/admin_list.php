<?php
/*
	+---------------------------------------------------------------+
	|	e107 website system
	|
	|	(C) MUWA-Spelle 2008-2012
	|	http://www.muwa-spelle.com
	|	info@muwa-spelle.com
	|
	+---------------------------------------------------------------+
*/

$eplug_admin = true;
require_once("../../class2.php");
if ( ! getperms('P')) { header('location:'.e_BASE.'index.php'); exit(); }

require_once(e_PLUGIN."newsontwitter/include.php");
global $pref, $sql, $tp;

include_lan(e_PLUGIN.'newsontwitter/languages/'.e_LANGUAGE.'.php');

$pageid = 'list';
{
	include_once(e_ADMIN."header.php");
    
    if(e_QUERY){
    	$f = newsontwitter::build_api();
    	{
    		newsontwitter::remove_by_tid($sql, $f, e_QUERY);
    	}
    }
    
    {
    	$text = "<table style=\"width: 100%;\">";
			$text .= "<tr>";
				$text .= "<th class=\"fcaption name\">".NEWSONTWITTER_LIST_L1."</th>";
				$text .= "<th class=\"fcaption title\">".NEWSONTWITTER_LIST_L2."</th>";
				$text .= "<th class=\"fcaption time\">".NEWSONTWITTER_LIST_L3."</th>";
				$text .= "<th class=\"fcaption action\">".NEWSONTWITTER_LIST_L4."</th>";
			$text .= "</tr>";
			
			{
				$list = newsontwitter::list_all($sql);
				foreach($list as $news){
					$text .= "<tr>";
						$text .= "<td class=\"forumheader2 name\">";
							$text .= $news->getTId();
						$text .= "</td>";
						$text .= "<td class=\"forumheader2 title\">";
							$text .= $news->getTitle();
						$text .= "</td>";
						$text .= "<td class=\"forumheader2 time\">";
							$text .= $news->getTime();
						$text .= "</td>";
						$text .= "<td class=\"forumheader2 action\">";
							$text .= "<a href=\"".e_SELF."?{$news->getTId()}\">".ADMIN_DELETE_ICON."</a>";
						$text .= "</td>";
					$text .= "</tr>";
				}
			}
		$text .= "</table>";
    	{
    		$ns->tablerender(MAIN_ADMIN_NEWSONTWITTER_L2, $text);
    	}
    }
    
    require_once(e_ADMIN.'footer.php');
}

?>