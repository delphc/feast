<!-- The top panel which drops down. TODO: consider replacing JS dropdown with HTML5/CSS--!>
<!-- This <center> is an abomination --!>
<center> 
<div id="tp" class="w8" onMouseOver="vPanelOver()" onMouseOut="vPanelOut()">
<div id="fpanel" class="w8" style="height:1px;clear:both;overflow:hidden;">
<div style="text-align:left;width:200px; float:left; padding:8px 0 0 11px; color: #507F08;">
<b>Databases</b><br />
	<a href="client.php" style="padding-left:10px;">ClientDB</a><br />
</div>

<div style="text-align:left;width:200px; float:right; padding:8px 0 0 11px; color: #507F08;">
<?php echo "<b>".$l_settings."</b>"; ?><br />
<?php

    if ($usr_settings['usrlevel'] > 1)
	echo "<a href=\"settings.php?set=admin\" style=\"padding-left:10px;\">" . $p_adminset . "</a><br />";
    if ($usr_settings['usrlevel'] > 1)
	echo "<a href=\"settings.php?set=usradm\" style=\"padding-left:10px;\">" . $p_usradm . "</a><br />";
    if ($usr_settings['usrlevel'] > 0)
	echo "<a href=\"settings.php?set=user\" style=\"padding-left:10px;\">" . $p_usrset . "</a><br />";
    echo "<a href=\"logout.php\" style=\"padding-left:10px;\">" . $l_logout . "</a>";
?>
</div>
</div>
<div id="tu">
<div class="s15">
&nbsp;
</div>
<?php echo $p_currentuser . "<b>" . $usr_settings['displayname'] . "&nbsp;</b>"; 
?>
</div>
<div id="tt">
<a href="/"><img src="theme/default/p1/fdbsm.gif" width="67" height="31" border="0" alt="FeastDB" /></a>
</div>
<div id="tb">
&nbsp;
</div>
</div>
<?php
if(!isset($panel)){
	$panel=array();
	$panel['showbranches'] = TRUE;
}
if($panel['showbranches']){
  if($panel['bstyle'] == "light") {
    ?>
<div class="w8">
<div id="ul">&nbsp;
</div>
<div id="ur"><img src="theme/default/branche.gif" width="179" height="64" border="0" alt="" />
</div>
<?php
   } else {
    ?>
<div class="w8">
<div id="ul"><img src="theme/default/p1/brnch1.gif" width="345" 
height="111" border="0" alt="" / align="left">
</div>
<div id="ur"><img 
src="theme/default/p1/brnch2.gif" width="184" height="72" border="0" alt="" 
/>
</div>
<?php
   }
 }

?>

