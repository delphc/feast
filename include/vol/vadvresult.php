<div id="ut"><div id="us"><ul><li class="sp"><b><span> <br></span> </b></li><li class="dv"><a
href="bio.php"><span class="h6"> <br></span>adv. search</a></li><li class="sp"><b><span> <br></span> </b></li><li class="dv"><a
class="pg" href="resources.php"><span class="h6"> <br></span>volunteers</a></li><li class="sp"><b><span> <br></span> </b></li><li class="dv"><a
href="resources.php"><span class="h6"> <br></span>create new</a></li><li class="sp"><b><span> <br></span> </b></li><li class="df"><a
href="?go=search"><span class="h6"> <br></span>search</a></li></ul></div></div></div>
<div id="fn" class="w8"><form name="mowcreate" onReset="return confirm('Do you really want to reset the form?')"  action="?do=advsearch" method="post"><table width="100%" border="0" cellpadding="0" cellspacing="0">
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
<option>name</option>
<option>first name</option>
<option>last name</option>
<option>phone number</option>
<option>email</option>
<option>orientation</option>
<option>address</option>
<option>first language</option>
<option>second language</option>
<option>occupation</option>
</select> by <select style="width:99px;margin-right:2px" name="qcontain">
<option>contains</option>
<option>starts with</option>
<option>ends with</option>
<option>does not contain</option>
</select><br /><br />

 last name: <input class="i13" type="text" name="l_name" maxlength="20" size="10" />
<br />
 address1: <input class="i25" type="text" name="add1" maxlength="35" size="35" /> address2: <input class="i25" type="text" name="add2" maxlength="35" size="35" />
<br />
 city: <input class="i25" type="text" name="city" maxlength="25" size="25" />
<br />
 province/state: <input class="i2" type="text" name="prov" maxlength="2" size="2" value="QC" />
  postal code: <input class="i5" type="text" 
name="post" maxlength="7" size="7" /><br />
 email: <input class="i25" type="text" name="email" maxlength="45" size="10" />
<br />
 phone <input class="i2" type="text" name="phone1" 
maxlength="3" size="3"  value="514" /> <input class="i7" 
type="text" name="phone2" maxlength="10" size="10" 
/>    phone 2 <input class="i2" 
type="text" 
name="phoneb1" 
maxlength="3" size="3"  value="514" /> <input class="i7" 
type="text" name="phoneb2" maxlength="10" size="10" />
<br />
<div class="bxd">
<div class="bxt">
   <b>Emergency Contact Information</b></div>
<div class="bxl"> contact name: </div>
<div class="bxr">
<input class="i19" type="text" name="urgn" maxlength="40" size="15" /></div>
<div class="bxm">
 relationship: 
<select style="width:51px;margin-right:2px" name="urgr">
<option>parent</option>
<option>spouse</option>
<option>friend</option>
<option>relative</option>
<option>other</option>
</select>   phone: <input class="i2" type="text" name="urgp1" maxlength="3" size="10" value="514"><input class="i5" type="text" style="margin-left:2px" name="urgp2" maxlength="11" size="10" />
</div>
<div class="bxl"> miscellaneous: </div>
<div class="bxr">
<input class="i19" type="text" maxlength="45" size="10" name="urgo"></div>

</div>
<div class="bxd">
<div class="bxt"><input  type="checkbox" name="drvr" id="drvr" value="yes" onChange="en_drive()" style="border:0;background:transparent" />
<b>Member has a valid driver's license.</b></div>
<div class="bxl"> name on license: <br /> license number: <br /> expiry: <select style="width:45px;margin-right:2px" name="dlexpm" id="dlexpm" >
<option value="01">Jan</option>
<option value="02" >Feb</option>
<option value="03" >Mar</option>
<option value="04" >Apr</option>
<option value="05" >May</option>
<option value="06" >Jun</option>
<option value="07" >Jul</option>
<option value="08" >Aug</option>
<option value="09" >Sep</option>
<option value="10" >Oct</option>
<option value="11" >Nov</option>
<option value="12" >Dec</option>
</select>
</div>
<div class="bxr">
<input class="i19" type="text" name="dlname" id="dlname" maxlength="40" size="10" /><br/><input class="i19" type="text" name="dlno" id="dlno" maxlength="17" size="10" /><br/>
<select style="width:55px;margin-right:2px" name="dlexpy" id="dlexpy" >
<option>2008</option>
<option>2009</option>
<option>2010</option>
<option>2011</option>
<option>2012</option>
<option>2013</option>
<option>2014</option>
<option>2015</option>
<option>2016</option>
<option>2017</option>
<option>2018</option>
</select>prov<input class="i7" type="text" name="dlprov" id="dlprov" maxlength="18" size="10" />
</div></div>
<select style="width:31px;margin-right:2px" name="bdayd">
<option value="01">1</option>
<option value="02">2</option>
<option value="03">3</option>
<option value="04">4</option>
<option value="05">5</option>
<option value="06">6</option>
<option value="07">7</option>
<option value="08">8</option>
<option value="09">9</option>
<option>10</option>
<option>11</option>
<option>12</option>
<option>13</option>
<option>14</option>
<option>15</option>
<option>16</option>
<option>17</option>
<option>18</option>
<option>19</option>
<option>20</option>
<option>21</option>
<option>22</option>
<option>23</option>
<option>24</option>
<option>25</option>
<option>26</option>
<option>27</option>
<option>28</option>
<option>29</option>
<option>30</option>
<option>31</option>
</select>
<select style="width:45px;margin-right:2px" name="bdaym">
<option value="01">Jan</option>
<option value="02" >Feb</option>
<option value="03" >Mar</option>
<option value="04" >Apr</option>
<option value="05" >May</option>
<option value="06" >Jun</option>
<option value="07" >Jul</option>
<option value="08" >Aug</option>
<option value="09" >Sep</option>
<option value="10" >Oct</option>
<option value="11" >Nov</option>
<option value="12" >Dec</option>
</select> year: <input class="i3" type="text" name="bdayy" maxlength="4" size="4" />
orientation day<select style="width:31px;margin-right:2px" name="odayd">
<option value="01">1</option>
<option value="02">2</option>
<option value="03">3</option>
<option value="04">4</option>
<option value="05">5</option>
<option value="06">6</option>
<option value="07">7</option>
<option value="08">8</option>
<option value="09">9</option>
<option>10</option>
<option>11</option>
<option>12</option>
<option>13</option>
<option>14</option>
<option>15</option>
<option>16</option>
<option>17</option>
<option>18</option>
<option>19</option>
<option>20</option>
<option>21</option>
<option>22</option>
<option>23</option>
<option>24</option>
<option>25</option>
<option>26</option>
<option>27</option>
<option>28</option>
<option>29</option>
<option>30</option>
<option>31</option>
</select>
<select style="width:45px;margin-right:2px" name="odaym">
<option value="01">Jan</option>
<option value="02" >Feb</option>
<option value="03" >Mar</option>
<option value="04" >Apr</option>
<option value="05" >May</option>
<option value="06" >Jun</option>
<option value="07" >Jul</option>
<option value="08" >Aug</option>
<option value="09" >Sep</option>
<option value="10" >Oct</option>
<option value="11" >Nov</option>
<option value="12" >Dec</option>
</select> year: 
<select style="width:55px;margin-right:2px" name="odayy">
<option>2000</option>
<option>2001</option>
<option>2002</option>
<option>2003</option>
<option>2004</option>
<option>2005</option>
<option>2006</option>
<option>2007</option>
<option>2008</option>
<option>2009</option>
<option>2010</option>
</select>
<br />
 permanent: <input class="i25" type="text" name="padd" maxlength="45" size="10" />
<br />
 city: <input class="i25" type="text" name="pcity" maxlength="21" size="10" />
<br />
 province/state: <input class="i2" type="text" name="pprov" maxlength="2" size="2" value="QC" />
<br />
 postal code: <input class="i5" type="text" name="ppost" maxlength="7" size="7" />
<br /><br />
 reference: <input class="i25" type="text" name="rname" maxlength="40" size="10" /><select style="width:61px;margin-right:2px" name="rrel">
<option>parent</option>
<option>spouse</option>
<option>friend</option>
<option>relative</option>
<option>teacher</option>
<option>coworker</option>
<option>other</option>
</select>
<br />
 phone: <input class="i2" type="text" name="rphon1" maxlength="3" size="3"  value="514" /> <input class="i7" type="text" name="rphon2" maxlength="10" size="10" />
<br />
 other: <input class="i25" type="text" name="rmisc" maxlength="20" size="10" />
<br />
 where you from: <input class="i25" type="text" name="orig" maxlength="25" size="25" />
<br />
 mother tongue: 
<select style="width:60px;margin-right:2px" name="lang" id="lang" onChange="en_lang()">
<option value="EN">English</option>
<option value="FR" >French</option>
<option value="other" >other...</option>
</select>
<input class="i10" type="text" name="lang2" id="lang2" maxlength="3" size="10" disabled="disabled" />
<br />
 other languages: <select style="width:60px;margin-right:2px" name="olang" id="olang">
<option value="EN">English</option>
<option value="FR" >French</option>
</select><input class="i25" type="text" name="olang2" maxlength="23" size="10" />
<br />
 pass-times, abilities, interests: 
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
<input type="radio" name="heard" value="mvb"> Montreal Volunteer Board<br />
<input type="radio" name="heard" value="web"> Internet<br />
<input type="radio" name="heard" value="other"> Other<br />
<input class="i25" type="text" name="heardo" id="heardo" maxlength="18" size="10" />
<br />
<br />
Notes: <br /><textarea rows="3" cols="20" style="width:270px;" name="notes"></textarea>
<div id="snd"><input type="submit" value="Create Entry" /> 
<input type="reset" value="Reset Form" /></div>
</div></div></th>
</tr>
<tr>
<td class="gr"> </td></tr></table></form></div><div class="fbt"><a href="http://www.fireboytech.com"></a></div>
</div></div></div></center></body></html>
