<?php


?><div id="ut"><div id="us"><ul><li class="sp"><b><span>&nbsp;<br></span>&nbsp;</b></li><li class="dv"><a
href="bio.php"><span class="h6">&nbsp;<br></span>adv.&nbsp;search</a></li><li class="sp"><b><span>&nbsp;<br></span>&nbsp;</b></li><li class="dv"><a
class="pg" href="resources.php"><span class="h6">&nbsp;<br></span>volunteers</a></li><li class="sp"><b><span>&nbsp;<br></span>&nbsp;</b></li><li class="dv"><a
href="resources.php"><span class="h6">&nbsp;<br></span>create&nbsp;new</a></li><li class="sp"><b><span>&nbsp;<br></span>&nbsp;</b></li><li class="df"><a
href="?go=search"><span class="h6">&nbsp;<br></span>search</a></li></ul></div></div></div><?php
$query = "SELECT * FROM member
 WHERE mid = '" . $_GET['mid'] . "'";
$result = mysql_query($query);
// store the record of the "example" table into $row
$row = mysql_fetch_array( $result );
// Print out the contents of the entry 
$prep_phone1 = substr($row['phone'] ,0,3);
$prep_phone2 = substr($row['phone'], 3);
$prep_phoneb1 = substr($row['phoneb'] ,0,3);
$prep_phoneb2 = substr($row['phoneb'], 3);


?>
<div id="fn" class="w8"><form name="mowcreate" onReset="return confirm('Do you really want to reset the form?')"  action="?do=modify" method="post"><table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr id="ft">
<td class="ll">&nbsp;</td>
<td class="ml">&nbsp;</td>
<td class="mc">&nbsp;</td>
<td class="rr">&nbsp;</td>
</tr>
<tr id="sr">
<td class="ll" rowspan="2"><img src="theme/default/p1/apl.gif" width="138" height="150" border="0" alt="FeastDB" /></td>
<td class="gr">
<img src="theme/default/p1/arw.gif" width="7" height="15" border="0" alt="" /></td>
<th class="gd" rowspan="2" colspan="2"><div id="nf">
&nbsp;first&nbsp;name:&nbsp;<input class="i13" type="text" name="f_name" maxlength="20" size="10" value="<?php echo $row['first_name']; ?>"/>
&nbsp;inital:&nbsp;<input class="i3" type="text" name="m_name" maxlength="1" size="10"  value="<?php echo $row['m_name']; ?>" />
&nbsp;last&nbsp;name:&nbsp;<input class="i13" type="text" name="l_name" maxlength="20" size="10"  value="<?php echo $row['last_name']; ?>" />
<br />
&nbsp;address1:&nbsp;<input class="i25" type="text" name="add1" maxlength="35" size="35"  value="<?php echo $row['address1']; ?>" />&nbsp;address2:&nbsp;<input class="i25" type="text" name="add2" maxlength="35" size="35"  value="<?php echo $row['address2']; ?>" />
<br />
&nbsp;city:&nbsp;<input class="i25" type="text" name="city" maxlength="25" size="25"  value="<?php echo $row['city']; ?>" />
<br />
&nbsp;province/state:&nbsp;<input class="i2" type="text" name="prov" maxlength="2" size="2"  value="<?php echo $row['prov']; ?>" />&nbsp;postal&nbsp;code:&nbsp;<input class="i5" type="text" name="post" maxlength="7" size="7"  value="<?php echo $row['post']; ?>" /><br />
&nbsp;email:&nbsp;<input class="i25" type="text" name="email" maxlength="45" size="10"  value="<?php echo $row['email']; ?>" />
<br />
&nbsp;phone&nbsp;<input class="i2" type="text" name="phone1" maxlength="3" size="3"  value="<?php echo $prep_phone1; ?>" />&nbsp;<input class="i7" type="text" name="phone2" maxlength="10" size="10" value="<?php echo $prep_phone2; ?>" />
&nbsp;&nbsp;&nbsp;&nbsp;phone&nbsp;2&nbsp;<input class="i2" 
type="text" 
name="phoneb1" 
maxlength="3" size="3"  value="<?php echo $prep_phoneb1; ?>" 
/>&nbsp;<input class="i7" 
type="text" name="phoneb2" maxlength="10" size="10" value="<?php echo 
$prep_phoneb2; ?>" />
<br />
<?php
$query = "SELECT * FROM volunteer
 WHERE mid = '" . $_GET['mid'] . "'";
$result = mysql_query($query);
// store the record of the "example" table into $row
$row = mysql_fetch_array( $result );
// Print out the contents of the entry
$prep_uphone1 = substr($row['urgphone'] ,0,3);
$prep_uphone2 = substr($row['urgphone'], 3);
$prep_drvyear = substr($row['drvexp'],0,4);
$prep_drvmonth = substr($row['drvexp'],5,2);
$prep_byear = substr($row['bday'],0,4);
$prep_bmonth = substr($row['bday'],5,2);
$prep_bday = substr($row['bday'],8,2);
$prep_oyear = substr($row['mbirth'],0,4);
$prep_omonth = substr($row['mbirth'],5,2);
$prep_oday = substr($row['mbirth'],8,2);
$prep_rphone1 = substr($row['refphone'] ,0,3);
$prep_rphone2 = substr($row['refphone'], 3);
?>
<div class="bxd">
<div class="bxt">
&nbsp;&nbsp;&nbsp;<b>Emergency Contact Information</b></div>
<div class="bxl">&nbsp;contact name:&nbsp;</div>
<div class="bxr">
<input class="i19" type="text" name="urgn" maxlength="40" size="15"  value="<?php echo $row['urgname']; ?>" ></div>
<div class="bxm">
&nbsp;relationship:&nbsp;
<select style="width:51px;margin-right:2px" name="urgr">
<option<?php if  ($row['urgrelate'] == "parent") echo " selected=\"selected\""; ?>>parent</option>
<option<?php if  ($row['urgrelate'] == "spouse") echo " selected=\"selected\""; ?>>spouse</option>
<option<?php if  ($row['urgrelate'] == "friend") echo " selected=\"selected\""; ?>>friend</option>
<option<?php if  ($row['urgrelate'] == "relative") echo " selected=\"selected\""; ?>>relative</option>
<option<?php if  ($row['urgrelate'] == "other") echo " selected=\"selected\""; ?>>other</option>
</select>&nbsp;&nbsp;&nbsp;phone:&nbsp;<input class="i2" type="text" name="urgp1" maxlength="3" size="10" value="<?php echo $prep_uphone1; ?>" ><input class="i5" type="text" style="margin-left:2px" name="urgp2" maxlength="11" size="10" value="<?php echo $prep_uphone2; ?>" />
</div>
<div class="bxl">&nbsp;miscellaneous:&nbsp;</div>
<div class="bxr">
<input class="i19" type="text" maxlength="45" size="10" name="urgo" value="<?php echo $row['urgother']; ?>" ></div>

</div>
<div class="bxd">
<div class="bxt"><input  type="checkbox" name="drvr" id="drvr" value="yes" onChange="en_drive()" style="border:0;background:transparent" <?php if  ($row['drv_do'] == 1) echo " checked=\"checked\""; ?> />
<b>Member has a valid driver's license.</b></div>
<div class="bxl">&nbsp;name on license:&nbsp;<br />&nbsp;license number:&nbsp;<br />&nbsp;expiry:&nbsp;<select style="width:45px;margin-right:2px" name="dlexpm" id="dlexpm" >
<option<?php if  ($prep_drvmonth == "01") echo " selected=\"selected\""; ?> value="01">Jan</option>
<option<?php if  ($prep_drvmonth == "02") echo " selected=\"selected\""; ?> value="02" >Feb</option>
<option<?php if  ($prep_drvmonth == "03") echo " selected=\"selected\""; ?> value="03" >Mar</option>
<option<?php if  ($prep_drvmonth == "04") echo " selected=\"selected\""; ?> value="04" >Apr</option>
<option<?php if  ($prep_drvmonth == "05") echo " selected=\"selected\""; ?> value="05" >May</option>
<option<?php if  ($prep_drvmonth == "06") echo " selected=\"selected\""; ?> value="06" >Jun</option>
<option<?php if  ($prep_drvmonth == "07") echo " selected=\"selected\""; ?> value="07" >Jul</option>
<option<?php if  ($prep_drvmonth == "08") echo " selected=\"selected\""; ?> value="08" >Aug</option>
<option<?php if  ($prep_drvmonth == "09") echo " selected=\"selected\""; ?> value="09" >Sep</option>
<option<?php if  ($prep_drvmonth == "10") echo " selected=\"selected\""; ?> value="10" >Oct</option>
<option<?php if  ($prep_drvmonth == "11") echo " selected=\"selected\""; ?> value="11" >Nov</option>
<option<?php if  ($prep_drvmonth == "12") echo " selected=\"selected\""; ?> value="12" >Dec</option>
</select>
</div>
<div class="bxr">
<input class="i19" type="text" name="dlname" id="dlname" maxlength="40" size="10"  value="<?php echo $row['drvname']; ?>" /><br/><input class="i19" type="text" name="dlno" id="dlno" maxlength="17" size="10"  value="<?php echo $row['drvlicense']; ?>" /><br/>
<select style="width:55px;margin-right:2px" name="dlexpy" id="dlexpy" >
<option<?php if  ($prep_drvyear == "2008") echo " selected=\"selected\" "; ?>>2008</option>
<option<?php if  ($prep_drvyear == "2009") echo " selected=\"selected\" "; ?>>2009</option>
<option<?php if  ($prep_drvyear == "2010") echo " selected=\"selected\" "; ?>>2010</option>
<option<?php if  ($prep_drvyear == "2011") echo " selected=\"selected\" "; ?>>2011</option>
<option<?php if  ($prep_drvyear == "2012") echo " selected=\"selected\" "; ?>>2012</option>
<option<?php if  ($prep_drvyear == "2013") echo " selected=\"selected\" "; ?>>2013</option>
<option<?php if  ($prep_drvyear == "2014") echo " selected=\"selected\" "; ?>>2014</option>
<option<?php if  ($prep_drvyear == "2015") echo " selected=\"selected\" "; ?>>2015</option>
<option<?php if  ($prep_drvyear == "2016") echo " selected=\"selected\" "; ?>>2016</option>
<option<?php if  ($prep_drvyear == "2016") echo " selected=\"selected\" "; ?>>2017</option>
<option<?php if  ($prep_drvyear == "2018") echo " selected=\"selected\" "; ?>>2018</option>
<option<?php if  ($prep_drvyear == "2019") echo " selected=\"selected\" "; ?>>2019</option>
</select>prov<input class="i7" type="text" name="dlprov" id="dlprov" maxlength="18" size="10"  value="<?php echo $row['drvprov']; ?>" />
</div></div>
<select style="width:31px;margin-right:2px" name="bdayd">
<option<?php if  ($prep_bday == "01") echo " selected=\"selected\""; ?> value="01">1</option>
<option<?php if  ($prep_bday == "02") echo " selected=\"selected\""; ?> value="02">2</option>
<option<?php if  ($prep_bday == "03") echo " selected=\"selected\""; ?> value="03">3</option>
<option<?php if  ($prep_bday == "04") echo " selected=\"selected\""; ?> value="04">4</option>
<option<?php if  ($prep_bday == "05") echo " selected=\"selected\""; ?> value="05">5</option>
<option<?php if  ($prep_bday == "06") echo " selected=\"selected\""; ?> value="06">6</option>
<option<?php if  ($prep_bday == "07") echo " selected=\"selected\""; ?> value="07">7</option>
<option<?php if  ($prep_bday == "08") echo " selected=\"selected\""; ?> value="08">8</option>
<option<?php if  ($prep_bday == "09") echo " selected=\"selected\""; ?> value="09">9</option>
<option<?php if  ($prep_bday == "10") echo " selected=\"selected\""; ?>>10</option>
<option<?php if  ($prep_bday == "11") echo " selected=\"selected\""; ?>>11</option>
<option<?php if  ($prep_bday == "12") echo " selected=\"selected\""; ?>>12</option>
<option<?php if  ($prep_bday == "13") echo " selected=\"selected\""; ?>>13</option>
<option<?php if  ($prep_bday == "14") echo " selected=\"selected\""; ?>>14</option>
<option<?php if  ($prep_bday == "15") echo " selected=\"selected\""; ?>>15</option>
<option<?php if  ($prep_bday == "16") echo " selected=\"selected\""; ?>>16</option>
<option<?php if  ($prep_bday == "17") echo " selected=\"selected\""; ?>>17</option>
<option<?php if  ($prep_bday == "18") echo " selected=\"selected\""; ?>>18</option>
<option<?php if  ($prep_bday == "19") echo " selected=\"selected\""; ?>>19</option>
<option<?php if  ($prep_bday == "20") echo " selected=\"selected\""; ?>>20</option>
<option<?php if  ($prep_bday == "21") echo " selected=\"selected\""; ?>>21</option>
<option<?php if  ($prep_bday == "22") echo " selected=\"selected\""; ?>>22</option>
<option<?php if  ($prep_bday == "23") echo " selected=\"selected\""; ?>>23</option>
<option<?php if  ($prep_bday == "24") echo " selected=\"selected\""; ?>>24</option>
<option<?php if  ($prep_bday == "25") echo " selected=\"selected\""; ?>>25</option>
<option<?php if  ($prep_bday == "26") echo " selected=\"selected\""; ?>>26</option>
<option<?php if  ($prep_bday == "27") echo " selected=\"selected\""; ?>>27</option>
<option<?php if  ($prep_bday == "28") echo " selected=\"selected\""; ?>>28</option>
<option<?php if  ($prep_bday == "29") echo " selected=\"selected\""; ?>>29</option>
<option<?php if  ($prep_bday == "30") echo " selected=\"selected\""; ?>>30</option>
<option<?php if  ($prep_bday == "31") echo " selected=\"selected\""; ?>>31</option>
</select>
<select style="width:45px;margin-right:2px" name="bdaym">
<option<?php if  ($prep_bmonth == "01") echo " selected=\"selected\""; ?> value="01">Jan</option>
<option<?php if  ($prep_bmonth == "02") echo " selected=\"selected\""; ?> value="02" >Feb</option>
<option<?php if  ($prep_bmonth == "03") echo " selected=\"selected\""; ?> value="03" >Mar</option>
<option<?php if  ($prep_bmonth == "04") echo " selected=\"selected\""; ?> value="04" >Apr</option>
<option<?php if  ($prep_bmonth == "05") echo " selected=\"selected\""; ?> value="05" >May</option>
<option<?php if  ($prep_bmonth == "06") echo " selected=\"selected\""; ?> value="06" >Jun</option>
<option<?php if  ($prep_bmonth == "07") echo " selected=\"selected\""; ?> value="07" >Jul</option>
<option<?php if  ($prep_bmonth == "08") echo " selected=\"selected\""; ?> value="08" >Aug</option>
<option<?php if  ($prep_bmonth == "09") echo " selected=\"selected\""; ?> value="09" >Sep</option>
<option<?php if  ($prep_bmonth == "10") echo " selected=\"selected\""; ?> value="10" >Oct</option>
<option<?php if  ($prep_bmonth == "11") echo " selected=\"selected\""; ?> value="11" >Nov</option>
<option<?php if  ($prep_bmonth == "12") echo " selected=\"selected\""; ?> value="12" >Dec</option>
</select>&nbsp;year:&nbsp;<input class="i3" type="text" name="bdayy" maxlength="4" size="4"  value="<?php echo $prep_byear; ?>" />
orientation day<select style="width:31px;margin-right:2px" name="odayd">
<option<?php if  ($prep_oday == "01") echo " selected=\"selected\""; ?> value="01">1</option>
<option<?php if  ($prep_oday == "02") echo " selected=\"selected\""; ?> value="02">2</option>
<option<?php if  ($prep_oday == "03") echo " selected=\"selected\""; ?> value="03">3</option>
<option<?php if  ($prep_oday == "04") echo " selected=\"selected\""; ?> value="04">4</option>
<option<?php if  ($prep_oday == "05") echo " selected=\"selected\""; ?> value="05">5</option>
<option<?php if  ($prep_oday == "06") echo " selected=\"selected\""; ?> value="06">6</option>
<option<?php if  ($prep_oday == "07") echo " selected=\"selected\""; ?> value="07">7</option>
<option<?php if  ($prep_oday == "08") echo " selected=\"selected\""; ?> value="08">8</option>
<option<?php if  ($prep_oday == "09") echo " selected=\"selected\""; ?> value="09">9</option>
<option<?php if  ($prep_oday == "10") echo " selected=\"selected\""; ?>>10</option>
<option<?php if  ($prep_oday == "11") echo " selected=\"selected\""; ?>>11</option>
<option<?php if  ($prep_oday == "12") echo " selected=\"selected\""; ?>>12</option>
<option<?php if  ($prep_oday == "13") echo " selected=\"selected\""; ?>>13</option>
<option<?php if  ($prep_oday == "14") echo " selected=\"selected\""; ?>>14</option>
<option<?php if  ($prep_oday == "15") echo " selected=\"selected\""; ?>>15</option>
<option<?php if  ($prep_oday == "16") echo " selected=\"selected\""; ?>>16</option>
<option<?php if  ($prep_oday == "17") echo " selected=\"selected\""; ?>>17</option>
<option<?php if  ($prep_oday == "18") echo " selected=\"selected\""; ?>>18</option>
<option<?php if  ($prep_oday == "19") echo " selected=\"selected\""; ?>>19</option>
<option<?php if  ($prep_oday == "20") echo " selected=\"selected\""; ?>>20</option>
<option<?php if  ($prep_oday == "21") echo " selected=\"selected\""; ?>>21</option>
<option<?php if  ($prep_oday == "22") echo " selected=\"selected\""; ?>>22</option>
<option<?php if  ($prep_oday == "23") echo " selected=\"selected\""; ?>>23</option>
<option<?php if  ($prep_oday == "24") echo " selected=\"selected\""; ?>>24</option>
<option<?php if  ($prep_oday == "25") echo " selected=\"selected\""; ?>>25</option>
<option<?php if  ($prep_oday == "26") echo " selected=\"selected\""; ?>>26</option>
<option<?php if  ($prep_oday == "27") echo " selected=\"selected\""; ?>>27</option>
<option<?php if  ($prep_oday == "28") echo " selected=\"selected\""; ?>>28</option>
<option<?php if  ($prep_oday == "29") echo " selected=\"selected\""; ?>>29</option>
<option<?php if  ($prep_oday == "30") echo " selected=\"selected\""; ?>>30</option>
<option<?php if  ($prep_oday == "31") echo " selected=\"selected\""; ?>>31</option>
</select>
<select style="width:45px;margin-right:2px" name="odaym">
<option<?php if  ($prep_omonth == "01") echo " selected=\"selected\""; ?> value="01">Jan</option>
<option<?php if  ($prep_omonth == "02") echo " selected=\"selected\""; ?> value="02" >Feb</option>
<option<?php if  ($prep_omonth == "03") echo " selected=\"selected\""; ?> value="03" >Mar</option>
<option<?php if  ($prep_omonth == "04") echo " selected=\"selected\""; ?> value="04" >Apr</option>
<option<?php if  ($prep_omonth == "05") echo " selected=\"selected\""; ?> value="05" >May</option>
<option<?php if  ($prep_omonth == "06") echo " selected=\"selected\""; ?> value="06" >Jun</option>
<option<?php if  ($prep_omonth == "07") echo " selected=\"selected\""; ?> value="07" >Jul</option>
<option<?php if  ($prep_omonth == "08") echo " selected=\"selected\""; ?> value="08" >Aug</option>
<option<?php if  ($prep_omonth == "09") echo " selected=\"selected\""; ?> value="09" >Sep</option>
<option<?php if  ($prep_omonth == "10") echo " selected=\"selected\""; ?> value="10" >Oct</option>
<option<?php if  ($prep_omonth == "11") echo " selected=\"selected\""; ?> value="11" >Nov</option>
<option<?php if  ($prep_omonth == "12") echo " selected=\"selected\""; ?> value="12" >Dec</option>
</select>&nbsp;year:&nbsp;
<select style="width:55px;margin-right:2px" name="odayy">
<?php
                                $thsyear = 2000;
                                $endyear = date("Y");

                                $error_catch = 0;
                                while($endyear >= $thsyear){
					if  ($prep_oyear == (string)$thsyear) 
						echo "<option selected=\"selected\">" . $thsyear . "</option>\n";
					else
                                        	echo "<option>" . $thsyear . "</option>\n";

                                        $thsyear++;
                                }			
?>
</select>
<br />
&nbsp;permanent:&nbsp;<input class="i25" type="text" name="padd" maxlength="45" size="10" value="<?php echo $row['padd']; ?>" />
<br />
&nbsp;city:&nbsp;<input class="i25" type="text" name="pcity" maxlength="21" size="10" value="<?php echo $row['pcity']; ?>" />
<br />
&nbsp;province/state:&nbsp;<input class="i2" type="text" name="pprov" maxlength="2" size="2" value="<?php echo $row['pprov']; ?>" />
<br />
&nbsp;postal&nbsp;code:&nbsp;<input class="i5" type="text" name="ppost" maxlength="7" size="7" value="<?php echo $row['ppost']; ?>" />
<br /><br />
&nbsp;reference:&nbsp;<input class="i25" type="text" name="rname" maxlength="40" size="10" value="<?php echo $row['refname']; ?>" /><select style="width:61px;margin-right:2px" name="rrel">
<option<?php if  ($row['refrelate'] == "parent") echo " selected=\"selected\""; ?>>parent</option>
<option<?php if  ($row['refrelate'] == "spouse") echo " selected=\"selected\""; ?>>spouse</option>
<option<?php if  ($row['refrelate'] == "friend") echo " selected=\"selected\""; ?>>friend</option>
<option<?php if  ($row['refrelate'] == "relative") echo " selected=\"selected\""; ?>>relative</option>
<option<?php if  ($row['refrelate'] == "teacher") echo " selected=\"selected\""; ?>>teacher</option>
<option<?php if  ($row['refrelate'] == "coworker") echo " selected=\"selected\""; ?>>coworker</option>
<option<?php if  ($row['refrelate'] == "other") echo " selected=\"selected\""; ?>>other</option>
</select>
<br />
&nbsp;phone:&nbsp;<input class="i2" type="text" name="rphon1" maxlength="3" size="3"  value="<?php echo $prep_rphone1; ?>" />&nbsp;<input class="i7" type="text" name="rphon2" maxlength="10" size="10" value="<?php echo $prep_rphone2; ?>" />
<br />
&nbsp;other:&nbsp;<input class="i25" type="text" name="rmisc" maxlength="20" size="10" value="<?php echo $row['refoth']; ?>" />
<br />
&nbsp;where you from:&nbsp;<input class="i25" type="text" name="orig" maxlength="25" size="25" value="<?php echo $row['origin']; ?>" />
<br />
&nbsp;mother tongue:&nbsp;
<select style="width:60px;margin-right:2px" name="lang" id="lang" onChange="en_lang()">
<option value="EN"<?php if  ($row['mlang'] == "EN") echo " selected=\"selected\""; ?>>English</option>
<option value="FR" <?php if  ($row['mlang'] == "FR") echo " selected=\"selected\""; ?>>French</option>
<option value="other" <?php if  (($row['mlang'] != "EN") && ($row['mlang'] != "FR")) echo " selected=\"selected\""; ?>>other...</option>
</select>
<input class="i10" type="text" name="lang2" id="lang2" maxlength="3" size="10" disabled="disabled" value="<?php if  (($row['mlang'] != "EN") && ($row['mlang'] != "FR")) echo $row['mlang']; ?>" />
<br />
&nbsp;other languages:&nbsp;<select style="width:60px;margin-right:2px" name="olang" id="olang">
<option value="EN"<?php if  (substr($row['mlang2'], 0 ,2) == "EN") echo " selected=\"selected\""; ?>>English</option>
<option value="FR" <?php if  (substr($row['mlang2'], 0 ,2) == "FR") echo " selected=\"selected\""; ?>>French</option>
</select><?php
$mlang_oth = "";
if (substr($row['mlang2'] ,2,1)=="-")
$mlang_oth = substr($row['mlang2'] ,3);
?><input class="i25" type="text" name="olang2" maxlength="23" size="10" value="<?php echo $mlang_oth; ?>"/>
<br />
&nbsp;pass-times, abilities, interests:&nbsp;
<input  type="checkbox" name="able1" id="part" value="yes" style="border:0;background:transparent" <?php if  ($row['able1'] == 1) echo " checked=\"checked\""; ?> />
Performingl Arts
<input  type="checkbox" name="able2" id="cook" value="yes" style="border:0;background:transparent" <?php if  ($row['able2'] == 1) echo " checked=\"checked\""; ?> />
Culinary Expertise<input  type="checkbox" name="able3"  id="crafts" value="yes" style="border:0;background:transparent" <?php if  ($row['able3'] == 1) echo " checked=\"checked\""; ?> />
Crafts<input  type="checkbox" name="able4"  id="speak" value="yes" style="border:0;background:transparent" <?php if  ($row['able4'] == 1) echo " checked=\"checked\""; ?> /><br/>
Public Speaking<input  type="checkbox" name="able5" id="IT" value="yes" style="border:0;background:transparent" <?php if  ($row['able5'] == 1) echo " checked=\"checked\""; ?> />
IT / Computers<input  type="checkbox" name="able6"  id="music" value="yes" style="border:0;background:transparent" <?php if  ($row['able6'] == 1) echo " checked=\"checked\""; ?> />
Music<input  type="checkbox" name="able7"  id="media" value="yes" style="border:0;background:transparent" <?php if  ($row['able7'] == 1) echo " checked=\"checked\""; ?> />
Media<input  type="checkbox" name="able8"  id="bike" value="yes" style="border:0;background:transparent" <?php if  ($row['able8'] == 1) echo " checked=\"checked\""; ?> />
Bike Mechanic<input  type="checkbox" name="able9"  id="gard" value="yes" style="border:0;background:transparent" <?php if  ($row['able9'] == 1) echo " checked=\"checked\""; ?> />
Gardening<input  type="checkbox" name="able10"  id="fund" value="yes" style="border:0;background:transparent" <?php if  ($row['able10'] == 1) echo " checked=\"checked\""; ?> />
Fundraising<input  type="checkbox" name="able11"  id="vart" value="yes" style="border:0;background:transparent" <?php if  ($row['able11'] == 1) echo " checked=\"checked\""; ?> />Visual Arts<br/>other
<input class="i25" type="text" name="ablem" maxlength="25" size="10"  value="<?php echo $row['able_mr']; ?>" />
<br />
&nbsp;what do you do?:&nbsp;<input type="radio" name="occup" value="seeking">Seeking Work<br />
<input type="radio" name="occup" <?php if  ($row['occup'] == "working") echo " checked=\"checked\""; ?> value="working">Working<br />
<input type="radio" name="occup" <?php if  ($row['occup'] == "school") echo " checked=\"checked\""; ?> value="school">Studying<br />
<input type="radio" name="occup" <?php if  ($row['occup'] == "retired") echo " checked=\"checked\""; ?> value="retired">Retired<br />
<input type="radio" name="occup" <?php if  ($row['occup'] == "mom") echo " checked=\"checked\""; ?> value="mom">Care giver<br />
<input type="radio" name="occup"  <?php if  ($row['occup'] == "visit") echo " checked=\"checked\""; ?> value="visit">Visiting/Vacation<br />
<input type="radio" name="occup" value="other" <?php
$occ_oth = 0;
if  (!(($row['occup'] == "mom") || ($row['occup'] == "working") || ($row['occup'] == "school") ||  ($row['occup'] == "retired") || ($row['occup'] == "visit"))) {
$occ_oth = 1;
echo "checked=\"checked\" ";
}
?>/>other<br />
<input class="i25" type="text" name="occupo" id="heardo" maxlength="15" size="10" <?php if  ($occ_oth == 1) echo "value=\"" . $row['occup'] . "\""; ?> />
<br />
&nbsp;where else do you volunteer:&nbsp;<input class="i25" type="ovol" name="ovol" maxlength="18" size="10" value="<?php echo $row['othr_vol']; ?>" />
<br />
&nbsp;hw did you hear about Santropol:&nbsp;
<input type="radio" name="heard" <?php if  ($row['heard'] == "sant") echo " checked=\"checked\""; ?> value="sant"> Neighbourhood / Santropol Cafe<br />
<input type="radio" name="heard" value="media"<?php if  ($row['heard'] == "media") echo " checked=\"checked\""; ?>> Media<br />
<input type="radio" name="heard" value="event"<?php if  ($row['heard'] == "event") echo " checked=\"checked\""; ?>> Special Event<br />
<input type="radio" name="heard" value="wom"<?php if  ($row['heard'] == "wom") echo " checked=\"checked\""; ?>> Word of Mouth<br />
<input type="radio" name="heard" value="ecole"<?php if  ($row['heard'] == "ecole") echo " checked=\"checked\""; ?>> School<br />
<input type="radio" name="heard" value="mvb"<?php if  ($row['heard'] == "mvb") echo " checked=\"checked\""; ?>> Montreal Volunteer Board<br />
<input type="radio" name="heard" value="web"<?php if  ($row['heard'] == "web") echo " checked=\"checked\""; ?>> Internet<br />
<input type="radio" name="heard" value="other"<?php
$hear_oth = 0;
if  (!(($row['heard'] == "sant") || ($row['heard'] == "media") || ($row['heard'] == "event") || ($row['heard'] == "wom") || ($row['heard'] == "ecole") || ($row['heard'] == "mvb") || ($row['heard'] == "web"))) {
$hear_oth = 1;
echo "checked=\"checked\" ";
}
?> /> Other<br />
<input class="i25" type="text" name="heardo" id="heardo" maxlength="18" size="10"<?php if  ($hear_oth == 1) echo "value=\"" . $row['heard'] . "\""; ?>  />
<br />
<br />
Notes: <br /><textarea rows="3" cols="20" style="width:270px;" name="notes" value="<?php echo $row['notes']; ?>" ></textarea>
<div id="snd"><input type="submit" value="Modify Entry" /> 
<input type="reset" value="Reset Form" /><input type="hidden" name="mid" value="<?php echo $_GET['mid']; ?>"></div>
</div></div></th>
</tr>
<tr>
<td class="gr">&nbsp;</td></tr></table></form></div>
</div></div></div></center></body></html>
