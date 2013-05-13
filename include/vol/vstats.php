<?php
//TIME SETTINGS
$shift_length = array();
$shift_length["KAN"] = 180;
$shift_length["KPN"] = 150;
$shift_length["KRN"] = 150;
$shift_length["LVN"] = 180;
$shift_length["DVN"] = 180;
$doStats = "select";
$err=0;
//if (isset($_GET['print']))
//$printNow = 1;

function errwrite($write_err){
  $fh = fopen("../errors/fdb.err", 'a');
  fwrite($fh, date("Y-m-d") . ":" . $writ_err . "\n");
  fclose($fh);
  return(0);
}


$insertStats = 0;
$resave = 0;
$gotoWeek = "";

if (isset($_GET['view'])) {
	$gotoWeek = mysql_real_escape_string($_GET['view']);
	$doStats = "insert";
}


if (isset($_GET['save'])) {
  $doStats = $_GET['save'];
  if ($doStats == "yes")
    $insertStats = 1;
  elseif ($doStats == "1")
    $insertStats = 1;
  else
    $doStats = "insert";
} elseif (isset($_POST['mod']))
  $doStats = $_POST['mod'];
if ($doStats == "save") {
  $doStats = "insert";
  $insertStats = 1;
} elseif ($doStats == "resave") {
  $doStats = "insert";
  $resave = 1;
  $insertStats = 1;
} 



//calculate weekdays
   if (isset($_POST['day1'])){
      $yesterday1 = $_POST["day1"];
      $yesterday6 = $_POST["day6"];
      $today = time();  
      $ys = strtotime($yesterday1);
      $ts = $ys;
   } elseif ($gotoWeek) {
      $today = time();  
      $ys = strtotime($gotoWeek);
      $ts = $ys;
   } else 
      $ts = time() - 604800;

   // find the year (ISO-8601 year number) and the current week  
   $year = date('o', $ts);  
   $week = date('W', $ts);  
   // print week for the current date 
    $ts = strtotime($year.'W'.$week.'1');  
    $next_week = '<a class="changewk" href="vol.php?do=stats&view='. date("Y-m-d", $ts + 604800) . '">' . date("M j", $ts + 604800) . " - ";
    $last_week = '<a class="changewk"  href="vol.php?do=stats&view='. date("Y-m-d", $ts - 604800) . '">&laquo;' . date("M j", $ts - 604800) . " - ";
    $week_month = "<small>week of</small> <b>" . date("M j, Y", $ts);  

    $ts = strtotime($year.'W'.$week.'7');  
    $week_month .= " - " . date("M j, Y", $ts) . "</b><br/>&nbsp;";
    $next_week .= date("M j", $ts + 604800) . "&raquo;</a>";
    $last_week .= date("M j", $ts - 604800) . "</a>";
    
    $week_hidden = array();
    $week_no = array();
    $weekday = array();
    $weekday[1] = "M";
    $weekday[2] = "T";
    $weekday[3] = "W";
    $weekday[4] = "R";
    $weekday[5] = "F";
    $weekday[6] = "S";

   for($i=1; $i<7; $i++) {  
     // timestamp from ISO week date format  
     $ts = strtotime($year.'W'.$week.$i);  
     $week_hidden[$i] = date("Y-m-d", $ts);  
     $week_no[$i] = "<b style=\"font-size:35px;color:#BADD78\">" . date("j", $ts) . "</b>";
  }  

if ($doStats == "insert") {
	if ($insertStats) {


		//ensure this years billing table exists
		include '/srv/http/feastdb/include/config/mysql_login.php';
		mysql_connect("localhost", $mysqluser, $mysqlpass);


for ($day = 1;$day <= 6;$day++){
    if ($resave) {
	$query = "DELETE FROM mowvol.stats WHERE (date = '" . $week_hidden[$day] . "' AND how = 'KAN')";
	$query .= " OR (date = '" . $week_hidden[$day] . "' AND how = 'KPN')";
	$query .= " OR (date = '" . $week_hidden[$day] . "' AND how = 'KRN')";
	$query .= " OR (date = '" . $week_hidden[$day] . "' AND how = 'LVN')";
	$query .= " OR (date = '" . $week_hidden[$day] . "' AND how = 'DVN')";
	if(!mysql_query($query)) {
	  $err++;
	  errwrite(mysql_error());
	}
    }

    if ($day == 4) {
	$i = 1;

	$ths_how = "KRN";
	for (;$i <= 4;$i++) {
	  $ths_entry = "d" . $day . 'kThur' . $i;
	  if (isset($_POST[$ths_entry]))
	    if (trim($_POST[$ths_entry]) != "") {
	      $query = "INSERT INTO mowvol.stats (mid, date, weekday, minutes, how, editor) VALUES ('";
	      $query .= mysql_real_escape_string(trim($_POST[$ths_entry])) . "','" . $week_hidden[$day] . "','" . $weekday[$day];
	      $query .= "','" . $shift_length[$ths_how] . "','" . $ths_how . "','" . $f_user_name . "')";
	      if(!mysql_query($query)) {
		  $err++;
		  errwrite(mysql_error());
	      }
	    }
	}

    } else {

	$ths_how = "KAN";
	for ($i = 1;$i <= 6;$i++) {
	  $query = "";
	  $ths_entry = "d" . $day . 'kAM' . $i;
	  if (isset($_POST[$ths_entry]))
	    if (trim($_POST[$ths_entry]) != "") {

	      $query = "INSERT INTO mowvol.stats (mid, date, weekday, minutes, how, editor) VALUES ('";
	      $query .= mysql_real_escape_string(trim($_POST[$ths_entry])) . "','" . $week_hidden[$day] . "','" . $weekday[$day];
	      $query .= "','" . $shift_length[$ths_how] . "','" . $ths_how . "','" . $f_user_name . "')";
	      if(!mysql_query($query)) {
		  $err++;
		  errwrite(mysql_error());
	      }
	    }
	}
	$ths_how = "KPN";
	for ($i = 1;$i <= 4;$i++) {
	  $query = "";
	  $ths_entry = "d" . $day . 'kPM' . $i;
	  if (isset($_POST[$ths_entry]))
	    if (trim($_POST[$ths_entry]) != "") {
	      $query = "INSERT INTO mowvol.stats (mid, date, weekday, minutes, how, editor) VALUES ('";
	      $query .= mysql_real_escape_string(trim($_POST[$ths_entry])) . "','" . $week_hidden[$day] . "','" . $weekday[$day];
	      $query .= "','" . $shift_length[$ths_how] . "','" . $ths_how . "','" . $f_user_name . "')";
	      if(!mysql_query($query)) {
		  $err++;
		  errwrite(mysql_error());
	      }
	    }
	}
	$ths_how = "DVN";
	for ($i = 1;$i <= 2;$i++) {
	  $query = "";
	  $ths_entry = "d" . $day . 'driv' . $i;
	  if (isset($_POST[$ths_entry]))
	    if (trim($_POST[$ths_entry]) != "") {
	      $query = "INSERT INTO mowvol.stats (mid, date, weekday, minutes, how, editor) VALUES ('";
	      $query .= mysql_real_escape_string(trim($_POST[$ths_entry])) . "','" . $week_hidden[$day] . "','" . $weekday[$day];
	      $query .= "','" . $shift_length[$ths_how] . "','" . $ths_how . "','" . $f_user_name . "')";
	      if(!mysql_query($query)) {
		  $err++;
		  errwrite(mysql_error());
	      }
	    }
	}
	$ths_how = "LVN";
	for ($i = 1;$i <= 27;$i++) {
	  $query = "";
	  $ths_entry = "d" . $day . 'livr' . $i;
	  if (isset($_POST[$ths_entry]))
	    if (trim($_POST[$ths_entry]) != "") {
	      $query = "INSERT INTO mowvol.stats (mid, date, weekday, minutes, how, editor) VALUES ('";
	      $query .= mysql_real_escape_string(trim($_POST[$ths_entry])) . "','" . $week_hidden[$day] . "','" . $weekday[$day];
	      $query .= "','" . $shift_length[$ths_how] . "','" . $ths_how . "','" . $f_user_name . "')";
	      if(!mysql_query($query)) {
		  $err++;
		  errwrite(mysql_error());
	      }
	    }
	}
    }
}

//recalculate weekdays for next week input
    
    //add one week
    $ts = $ys + 604800;


   // find the year (ISO-8601 year number) and the current week  
   $year = date('o', $ts);  
   $week = date('W', $ts);  
   // print week for the current date 
    $ts = strtotime($year.'W'.$week.'1');  
    $next_week = '<a class="changewk" href="vol.php?do=stats&view='. date("Y-m-d", $ts + 604800) . '">' . date("M j", $ts + 604800) . " - ";
    $last_week = '<a class="changewk"  href="vol.php?do=stats&view='. date("Y-m-d", $ts - 604800) . '">&laquo;' . date("M j", $ts - 604800) . " - ";
    $week_month = "<small>week of</small> <b>" . date("M j, Y", $ts);  

    $ts = strtotime($year.'W'.$week.'7');  
    $week_month .= " - " . date("M j, Y", $ts) . "</b><br/>&nbsp;";
    $next_week .= date("M j", $ts + 604800) . "&raquo;</a>";
    $last_week .= date("M j", $ts - 604800) . "</a>";

    $week_hidden = array();
    $week_no = array();

   for($i=1; $i<7; $i++) {  
     // timestamp from ISO week date format  
     $ts = strtotime($year.'W'.$week.$i);  
     $week_hidden[$i] = date("Y-m-d", $ts);  
     $week_no[$i] = "<b style=\"font-size:35px;color:#BADD78\">" . date("j", $ts) . "</b>";
  }  

?><div id="ut"><div id="us"><ul><li class="dv"><a
class="pg" href="?do=stats&save=reset"><span 
class="h6">&nbsp;<br></span>statistics</a></li><li 
class="sp"><b><span>&nbsp;<br></span>&nbsp;</b></li><li class="dv"><a
href="?do=create"><span class="h6">&nbsp;<br></span>create&nbsp;new</a></li><li class="sp"><b><span>&nbsp;<br></span>&nbsp;</b></li><?php
 //<li class="dv"><a href="bio.php"><span class="h6">&nbsp;<br></span>adv.&nbsp;search</a></li>
?><li class="df"><a href="?do=search"><span class="h6">&nbsp;<br></span><?php echo $l_search; ?></a></li></ul></div></div></div><div id="fn" class="w8" style="width:920px"><form autocomplete="off" name="volstats" action="?do=stats" method="post"><table width="920px" border="0" cellpadding="0"
cellspacing="0">
<tr id="ft">
<td class="ll"> </td>
<td class="ml"> </td>
<td class="mc" colspan="2"> </td>
</tr><tr id="sr">
<td class="ll"><div style="font-size:13px;padding:0 20px; float:right; width:120px;color:#BBBBBB;">Enter weekly stats.&nbsp;</div></td>
<td class="gr"><img src="theme/default/p1/arw.gif" width="7" height="15" border="0" alt="" /></td>
<th class="gd" rowspan="2" colspan="2"><div id="nf"><div class="gtle" style="padding:0 14px 15px;font-size:13px;color:#FFF;"><?php

    if ($err > 0)
      echo "There were <b>" . $err . "</b> errors when attempting to save statistics for the entered week.<br />";
    else
      echo "All data <b>saved</b> successfully for the week of <b>" . date("M j, Y", $ys) . "</b>.<br />";
	
} else { ?><div id="ut"><div id="us"><ul><li class="dv"><a
class="pg" href="?do=stats&save=reset"><span 
class="h6">&nbsp;<br></span>statistics</a></li><li 
class="sp"><b><span>&nbsp;<br></span>&nbsp;</b></li><li class="dv"><a
href="?do=create"><span class="h6">&nbsp;<br></span>create&nbsp;new</a></li><li class="sp"><b><span>&nbsp;<br></span>&nbsp;</b></li><?php
 //<li class="dv"><a href="bio.php"><span class="h6">&nbsp;<br></span>adv.&nbsp;search</a></li>
?><li class="df"><a href="?go=search"><span class="h6">&nbsp;<br></span><?php echo $l_search; ?></a></li></ul></div></div></div><div id="fn" class="w8" style="width:920px"><form autocomplete="off" name="volstats" action="?do=stats" method="post"><table width="920px" border="0" cellpadding="0"
cellspacing="0">
<tr id="ft">
<td class="ll"> </td>
<td class="ml"> </td>
<td class="mc" colspan="2"> </td>
</tr><tr id="sr">
<td class="ll"><div style="font-size:13px;padding:0 20px; float:right; width:120px;color:#BBBBBB;">Enter weekly stats.&nbsp;</div></td>
<td class="gr"><img src="theme/default/p1/arw.gif" width="7" height="15" border="0" alt="" /></td>
<th class="gd" rowspan="2" colspan="2"><div id="nf"><div class="gtle"><?php

}

?>&nbsp;</div><div
style="clear:both;text-align:right;">
<table cellspacing="0" class="inStat">
<tr class="row-align-top">
<td><b>&nbsp;<?php echo $last_week; ?></b></td>
<td>&nbsp;</td>
<td colspan="2"><center><?php echo $week_month; ?></center>
</td>
<td>&nbsp;</td>
<td><b><?php echo $next_week; ?>&nbsp;</b></td>
</tr>
<tr><?php
$day = 1;
$counter = 0;

for (;$day <= 6;$day++){
    
    $kitchenAM = array();
    $kitchenPM = array();
    $thursday = array();
    $livraison = array();
    $driver = array();
    $kani = 0;
    $kpni = 0;
    $krni = 0;
    $dvni = 0;
    $lvni = 0;

    $query = "SELECT * FROM mowvol.stats WHERE date = \"" . $week_hidden[$day] . "\"";
    $result = mysql_query($query);
    while($row = mysql_fetch_array( $result )) {
	$counter++;
	if($row['how'] == "KAN") {
	   $kani++;
	   $kitchenAM[$kani]["mid"] = $row["mid"];
	    $q2 = "SELECT * FROM mowdata.member WHERE mid = \"" . $row["mid"] . "\"";
	    $r2 = mysql_query($q2);
	    if ($person = mysql_fetch_array( $r2))
		$kitchenAM[$kani]["name"] = $person["first_name"] . " " . $person["last_name"];	
	    else
		$kitchenAM[$kani]["name"] = "";
	} elseif($row['how'] == "KPN") {
	   $kpni++;
	   $kitchenPM[$kpni]["mid"] = $row["mid"];
	    $q2 = "SELECT * FROM mowdata.member WHERE mid = \"" . $row["mid"] . "\"";
	    $r2 = mysql_query($q2);
	    if ($person = mysql_fetch_array( $r2))
		$kitchenPM[$kpni]["name"] = $person["first_name"] . " " . $person["last_name"];	
	    else
		$kitchenPM[$kpni]["name"] = "";
	} elseif($row['how'] == "KRN") {
	   $krni++;
	   $thursday[$krni]["mid"] = $row["mid"];
	    $q2 = "SELECT * FROM mowdata.member WHERE mid = \"" . $row["mid"] . "\"";
	    $r2 = mysql_query($q2);
	    if ($person = mysql_fetch_array( $r2))
		$thursday[$krni]["name"] = $person["first_name"] . " " . $person["last_name"];	
	    else
		$thursday[$krni]["name"] = "";
	} elseif($row['how'] == "LVN") {
	   $lvni++;
	   $livraison[$lvni]["mid"] = $row["mid"];
	    $q2 = "SELECT * FROM mowdata.member WHERE mid = \"" . $row["mid"] . "\"";
	    $r2 = mysql_query($q2);
	    if ($person = mysql_fetch_array( $r2))
		$livraison[$lvni]["name"] = $person["first_name"] . " " . $person["last_name"];	
	    else
		$livraison[$lvni]["name"] = "";
	} elseif($row['how'] == "DVN") {
	   $dvni++;
	   $driver[$dvni]["mid"] = $row["mid"];
	    $q2 = "SELECT * FROM mowdata.member WHERE mid = \"" . $row["mid"] . "\"";
	    $r2 = mysql_query($q2);
	    if ($person = mysql_fetch_array( $r2))
		$driver[$dvni]["name"] = $person["first_name"] . " " . $person["last_name"];	
	    else
		$driver[$dvni]["name"] = "";

	}
    }



    if ($day == 4) {
      ?>
      <td style="vertical-align:top;padding-top:108px;width:115px">
      <b>Kitchen AM</b><br/><?php
      $i = 1;
      $day = 4;
	      for (;$i <= 4;$i++) {
		$tmp_div = "hidden";
		$tmp_inp = "inline";
		$tmp_content = "";
		$tmp_name = "";
		if ($thursday[$i]["name"] != "") {
		   $tmp_div = "block";
		   $tmp_inp = "displaynone";
		   $tmp_name = $thursday[$i]["name"];
		   $tmp_content = $thursday[$i]["name"] . " <a href=\"javascript:reEdit('d" . $day . "f" . $i . "')\">edit</a>";
		}
		echo '<input type="text" class="' . $tmp_inp . '" id="d' . $day . 'f' . $i . '" onkeyup="javascript:autosuggest(' . "'d$day" . "f$i')" . '" value="' . $tmp_name . '" /><input type="hidden" name="d' . $day . "kThur" . $i . '" id="hd' . $day . 'f' . $i . '" value="' . $thursday[$i]["mid"] . '" />';
		echo '<div class="' . $tmp_div . '" id="sd' . $day . 'f' . $i . '">' . $tmp_content . '</div>' . "\n";
	      }
      ?>
      <div style="display:hidden" id="sd1f4"></div><br/><input type="hidden" name="day<?php echo $day; ?>" value="<?php echo $week_hidden[$day]; ?>" /><center id="sDay<?php echo $day; ?>"><?php echo $week_no[$day]; ?></center>
      </td><?php
    } else {
      ?><td style="vertical-align:top;width:115px"><b>Kitchen AM</b><br/><?php
      $i = 1;


	      for (;$i <= 6;$i++){
		$j = $i;
		$tmp_div = "hidden";
		$tmp_inp = "inline";
		$tmp_content = "";
		$tmp_name = "";
		if ($kitchenAM[$i]["name"] != "") {
		   $tmp_div = "block";
		   $tmp_inp = "displaynone";
		   $tmp_name = $kitchenAM[$i]["name"];
		   $tmp_content = $kitchenAM[$i]["name"] . " <a href=\"javascript:reEdit('d" . $day . "f" . $i . "')\">edit</a>";
		}
		echo '<input type="text" class="' . $tmp_inp . '" id="d' . $day . 'f' . $i . '" onkeyup="javascript:autosuggest(' . "'d$day" . "f$i')" . '" value="' . $tmp_name . '" /><input type="hidden" name="d' . $day . "kAM" . $j . '" id="hd' . $day . 'f' . $i . '"  value="' . $kitchenAM[$i]["mid"] . '" />';
		echo '<div class="' . $tmp_div . '" id="sd' . $day . 'f' . $i . '">' . $tmp_content . '</div>' . "\n";
	      }	
      ?>
      <div style="display:hidden" id="sd1f4"></div>
      <br/><b>Kitchen PM</b><br/>
      <?php
	      
	      for (;$i <= 10;$i++){
		$j = $i - 6;
		$tmp_div = "hidden";
		$tmp_inp = "inline";
		$tmp_content = "";
		$tmp_name = "";
		if ($kitchenPM[$j]["name"] != "") {
		   $tmp_div = "block";
		   $tmp_inp = "displaynone";
		   $tmp_name = $kitchenPM[$j]["name"];
		   $tmp_content = $kitchenPM[$j]["name"] . " <a href=\"javascript:reEdit('d" . $day . "f" . $i . "')\">edit</a>";
		}
		echo '<input type="text" class="' . $tmp_inp . '" id="d' . $day . 'f' . $i . '" onkeyup="javascript:autosuggest(' . "'d$day" . "f$i')" . '" value="' . $tmp_name . '" /><input type="hidden" name="d' . $day . "kPM" . $j . '" id="hd' . $day . 'f' . $i . '"  value="' . $kitchenPM[$j]["mid"] . '" />';
		echo '<div class="' . $tmp_div . '" id="sd' . $day . 'f' . $i . '">' . $tmp_content . '</div>' . "\n";
	      }
      ?><br /><input type="hidden" name="day<?php echo $day; ?>" value="<?php echo $week_hidden[$day]; ?>" /><center id="sDay<?php echo $day; ?>"><?php echo $week_no[$day]; ?></center>
      <br/><b>Delivery (Drivers)</b><br/>
      <?php

	      for (;$i <= 12;$i++){
		$j = $i - 10;
		$tmp_div = "hidden";
		$tmp_inp = "inline";
		$tmp_content = "";
		$tmp_name = "";
		if ($driver[$j]["name"] != "") {
		   $tmp_div = "block";
		   $tmp_inp = "displaynone";
		   $tmp_name = $driver[$j]["name"];
		   $tmp_content = $driver[$j]["name"] . " <a href=\"javascript:reEdit('d" . $day . "f" . $i . "')\">edit</a>";
		}
		echo '<input type="text" class="' . $tmp_inp . '"  id="d' . $day . 'f' . $i . '" onkeyup="javascript:autosuggest(' . "'d$day" . "f$i')" . '" value="' . $tmp_name . '" /><input type="hidden" name="d' . $day . "driv" . $j . '" id="hd' . $day . 'f' . $i . '" value="' . $driver[$j]["mid"] . '" />';
		echo '<div class="' . $tmp_div . '" id="sd' . $day . 'f' . $i . '">' . $tmp_content . '</div>' . "\n";
	      }
      ?>
     <br/><b>Delivery</b><br/>
      <?php

	      for (;$i <= 27;$i++){
		$j = $i - 12;
		$tmp_div = "hidden";
		$tmp_inp = "inline";
		$tmp_content = "";
		$tmp_name = "";
		if ($livraison[$j]["name"] != "") {
		   $tmp_div = "block";
		   $tmp_inp = "displaynone";
		   $tmp_name = $livraison[$j]["name"];
		   $tmp_content = $livraison[$j]["name"] . " <a href=\"javascript:reEdit('d" . $day . "f" . $i . "')\">edit</a>";
		}
		echo '<input type="text" class="' . $tmp_inp . '"  id="d' . $day . 'f' . $i . '" onkeyup="javascript:autosuggest(' . "'d$day" . "f$i')" . '" value="' . $tmp_name . '" /><input type="hidden" name="d' . $day . "livr" . $j . '" id="hd' . $day . 'f' . $i . '" value="' . $livraison[$j]["mid"] . '" />';
		echo '<div class="' . $tmp_div . '" id="sd' . $day . 'f' . $i . '">' . $tmp_content . '</div>' . "\n";
	      }
      ?>
      <br/>
      </td><?php
    }
} ?></tr>
</table></div>
</div></div><div class="snd"><input type="hidden" name="mod" value="<?php 

	if ($counter > 0)
	   echo "re";

?>save" /><input type="submit" value="Save Stats &raquo;" /><br /><br /></div>
</th></tr><tr>
<td rowspan="2"><img src="theme/default/p1/apl.gif" width="138"height="150" border="0"alt="FeastDB" /></td>
<td class="gr"> </td></tr></table></form></div><?php
 } elseif ($doStats == "view") {
    include '../include/vol/showstats.php';
 } else {
?><div id="ut"><div id="us"><ul><li class="dv"><a
class="pg" href="#"><span 
class="h6">&nbsp;<br></span>statistics</a></li><li 
class="sp"><b><span>&nbsp;<br></span>&nbsp;</b></li><li class="dv"><a
href="?do=create"><span class="h6">&nbsp;<br></span>create&nbsp;new</a></li><li class="sp"><b><span>&nbsp;<br></span>&nbsp;</b></li><?php
 //<li class="dv"><a href="bio.php"><span class="h6">&nbsp;<br></span>adv.&nbsp;search</a></li>
?><li class="df"><a href="?go=search"><span class="h6">&nbsp;<br></span><?php echo $l_search; ?></a></li></ul></div></div></div><div id="fn" class="w8"><table width="100%" border="0" cellpadding="0"
cellspacing="0">
<tr id="ft">
<td class="ll"> </td>
<td class="ml"> </td>
<td class="mc" colspan="2"></td>
</tr><tr id="sr">
<td class="ll"><div style="font-size:13px;padding:0 25px; float:right; width:200px;color:#BBBBBB;">You may view or enter stats.<br />&nbsp;</div></td>
<td class="gr"><img src="theme/default/p1/arw.gif" width="7" height="15" border="0" alt="" /></td>
<th class="gd" rowspan="2" colspan="2"><div id="nf"><div class="gtle">&nbsp;<!--Insert Stats:--></div>
<div style="width:350px;clear:both;text-align:right;">

</div>
</div></div><div class="snd">
<center style="font-weight:normal;color:#FFF"><br /><br />Please select whether to enter or view volunteer statistics.<br/><br/><form autocomplete="off" style="display:inline;margin:15px" name="stats" action="?do=stats" method="post"><input type="hidden" name="mod" value="view" /><input type="submit" disabled="disabled" value="View Stats &raquo;" /></form>
<form autocomplete="off" style="display:inline;" name="stats" action="?do=stats" method="post"><input type="hidden" name="mod" value="insert" /><input type="submit" value="Enter Stats &raquo;" /></form></div></center>
</th></tr><tr>
<td rowspan="2"><img src="theme/default/p1/apl.gif" width="138"height="150" border="0"alt="FeastDB" /></td>
<td class="gr"> </td></tr></table></div><?php
}

?><div class="fbt"><a 
href="http://www.fireboytech.com"></a></div>
</div></div></div></center></body></html><?php 


 ?>
