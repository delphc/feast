<div id="ut"><div id="us"><ul><li class="sp"><b><span> <br></span> </b></li><li class="dv"><a
href="bio.php"><span class="h6"> <br></span>adv. search</a></li><li class="sp"><b><span> <br></span> </b></li><li class="dv"><a
class="pg" href="resources.php"><span class="h6"> <br></span>volunteers</a></li><li class="sp"><b><span> <br></span> </b></li><li class="dv"><a
href="?do=new"><span class="h6"> <br></span>create new</a></li><li class="sp"><b><span> <br></span> </b></li><li class="df"><a
href="?go=search"><span class="h6"> <br></span>search</a></li></ul></div></div></div>
<div id="fn" class="w8"><form name="mowcreate" onReset="return confirm('Do you really want to reset the form?')"  action="?do=advresult" method="post"><table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr id="ft">
<td class="ll"> </td>
<td class="ml"> </td>
<td class="mc"> </td>
<td class="rr"> </td>
</tr>
<tr id="sr">
<td class="ll" rowspan="2"><img src="theme/default/p1/apl.gif" width="138" height="150" border="0" alt="FeastDB" /></td>
<td class="gr">
<img src="theme/default/p1/arw.gif" width="7" height="15" border="0" alt="" /></td>
<th class="gd" rowspan="2" colspan="2"><div id="nf"><?
include '/srv/http/feastdb/include/config/mysql_login.php';
mysql_connect("localhost", $mysqluser, $mysqlpass);
mysql_select_db("mowdata");
$query = "SELECT * FROM member WHERE first_name LIKE '" . "%st%'";
// $_POST['f_name'] . "'";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array( $result )) {
        // Print out the contents of each row
//echo "first: ".$row['first_name'];
}
?>search for <input class="i13" type="text" name="f_name" maxlength="20" size="10" /> in <select style="width:99px;margin-right:2px" name="qcontain">
<option value="name">either name</option>
<option value="f_name">only first name</option>
<option value="l_name">only last name</option>
<option value="phone">phone number</option>
<option value="email">email</option>
<option value="orient">orientation</option>
<option value="address">address</option>
<option value="1_lang">first language</option>
<option value="2_lang">second language</option>
<option value="occ">occupation</option>
</select> by <select style="width:99px;margin-right:2px" name="qcontain">
<option value="contain">contains</option>
<option value="start">starts with</option>
<option value="end">ends with</option>
<option value="nocontain">does not contain</option>
</select><br /><br />
search within results:
search for <input class="i13" type="text" name="f_name" maxlength="20" size="10" /> in <select 
style="width:99px;margin-right:2px$
<option value="name">either name</option>
<option value="f_name">only first name</option>
<option value="l_name">only last name</option>
<option value="phone">phone number</option>
<option value="email">email</option>
<option value="orient">orientation</option>
<option value="address">address</option>
<option value="1_lang">first language</option>
<option value="2_lang">second language</option>
<option value="occ">occupation</option>
</select> by <select style="width:99px;margin-right:2px" name="qcontain">
<option value="contain">contains</option>
<option value="start">starts with</option>
<option value="end">ends with</option>
<option value="nocontain">does not contain</option>
</select><br />
search for <input class="i13" type="text" name="f_name" maxlength="20" size="10" /> in <select 
style="width:99px;margin-right:2px$
<option value="name">either name</option>
<option value="f_name">only first name</option>
<option value="l_name">only last name</option>
<option value="phone">phone number</option>
<option value="email">email</option>
<option value="orient">orientation</option>
<option value="address">address</option>
<option value="1_lang">first language</option>
<option value="2_lang">second language</option>
<option value="occ">occupation</option>
</select> by <select style="width:99px;margin-right:2px" name="qcontain">
<option value="contain">contains</option>
<option value="start">starts with</option>
<option value="end">ends with</option>
<option value="nocontain">does not contain</option></select><br><br>pass-times, abilities, interests: 
<input  type="checkbox" name="able1" id="part" value="yes" style="border:0;background:transparent" />
Performingl Arts
<input  type="checkbox" name="able2" id="cook" value="yes" style="border:0;background:transparent" />
Culinary Expertise<input  type="checkbox" name="able3"  id="crafts" value="yes" style="border:0;background:transparent" />
Crafts<input  type="checkbox" name="able4"  id="speak" value="yes" style="border:0;background:transparent" /><br/>
Public Speaking<input  type="checkbox" name="able5" id="IT" value="yes" style="border:0;background:transparent" />
IT / Computers<input  type="checkbox" name="able6"  id="music" value="yes" style="border:0;background:transparent" />
Music<input  type="checkbox" name="able7"  id="media" value="yes" style="border:0;background:transparent" />
Media<input  type="checkbox" name="able8"  id="bike" value="yes" style="border:0;background:transparent" />
Bike Mechanic<input  type="checkbox" name="able9"  id="gard" value="yes" style="border:0;background:transparent" />
Gardening<input  type="checkbox" name="able10"  id="fund" value="yes" style="border:0;background:transparent" />
Fundraising<input  type="checkbox" name="able11"  id="vart" value="yes" style="border:0;background:transparent" />Visual Arts<br/>other
<input class="i25" type="text" name="ablem" maxlength="25" size="1+0" />
<br />
 what do you do?: <input type="radio" name="occup" value="seeking">Seeking Work<br />
<input type="radio" name="occup" value="working">Working<br />
<input type="radio" name="occup" value="school">Studying<br />
<input type="radio" name="occup" value="retired">Retired<br />
<input type="radio" name="occup" value="mom">Care giver<br />
<input type="radio" name="occup" value="visit">Visiting/Vacation<br />
<input type="radio" name="occup" value="other">other<br />
<input class="i25" type="text" name="occupo" id="heardo" maxlength="15" size="10" />
<br />
 where else do you volunteer: <input class="i25" type="ovol" name="ovol" maxlength="18" size="10" />
<br />
 hw did you hear about Santropol: 
<input type="radio" name="heard" value="sant"> Neighbourhood / Santropol Cafe<br />
<input type="radio" name="heard" value="media"> Media<br />
<input type="radio" name="heard" value="event"> Special Event<br />
<input type="radio" name="heard" value="wom"> Word of Mouth<br />
<input type="radio" name="heard" value="ecole"> School<br />

<div id="snd"><input type="submit" value="Search" /> 
<input type="reset" value="Reset" /></div>
</div></div></th>
</tr>
<tr>
<td class="gr"> </td></tr></table></form></div><div class="fbt"><a href="http://www.fireboytech.com"></a></div>
</div></div></div></center></body></html>
