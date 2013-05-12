<div id="ut"><div id="us"><ul><li class="df"><a
class="pg" href="contacts.php"><span class="h6">&nbsp;<br></span>search</a></li><li class="sp"><b><span>&nbsp;<br></span>&nbsp;</b></li><li class="dv"><a
href="?do=new"><span class="h6">&nbsp;<br></span>create&nbsp;new</a></li><li class="sp"><b><span>&nbsp;<br></span>&nbsp;</b></li><li class="dv"><a
href="bio.php"><span class="h6">&nbsp;<br></span>adv.&nbsp;search</a></li></ul></div></div></div>
<div id="fn" class="w8"><form name="mowquery" autocomplete="off"><table width="100%" border="0" cellpadding="0" cellspacing="0"><tr id="ft"><td class="ll">&nbsp;</td><td class="ml">&nbsp;</td><td class="mc">&nbsp;</td><td class="mr">&nbsp;</td>
<td class="rr" rowspan="3"><!--dd-->&nbsp;</td></tr><tr id="sr"><td>&nbsp;</td><td class="rt"><img src="theme/default/p1/sr_nd.gif" width="21" height="18" border="0" alt="" /></td>
<td id="sf"><div style="width:248px;height:18px;"><input type="text" id="mq_sr" name="mquery" size="10"  onkeyup="javascript:autosuggest()"/><div id="mq_ac"></div></div>
</td><td class="mg"><img src="theme/default/p1/arr_r.gif" width="9" height="18" border="0" alt="" /></td></tr>
<tr><td><img src="theme/default/p1/apup.gif" width="161" height="74" border="0" alt="" /></td><td valign="top">&nbsp;</td><td class="rt"><img src="theme/default/p1/fdbgr.gif" width="110" height="44" border="0" alt="" /></td><td class="mg">&nbsp;</td></tr></table></form></div><div id="sep" class="w8">&nbsp;</div>
<div id="cn" class="w8"><div id="ca"><img src="theme/default/p1/aplo.gif" width="164" height="66" border="0" alt="" /></div>
<div id="shw"><?php

include '/var/www/feastdb/include/config/mysql_login.php';
mysql_connect("localhost", $mysqluser, $mysqlpass);
mysql_select_db("mowdata");
$query = "SELECT * FROM member
 WHERE mid = '" . $_GET['mid'] . "'";
$result = mysql_query($query);
// store the record of the "example" table into $row
$row = mysql_fetch_array( $result );
// Print out the contents of the entry 

echo "<span style=\"font-size:16px;\"><b>" . $row['first_name'] . " " . $row['last_name'] . "</b></span><br />";
echo "phone: " . substr($row['phone'],0,3) . "-" . substr($row['phone'],3,3) . "-". substr($row['phone'],6);
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;email: <a href=\"mailto:" . $row['email'] . "\">" .  $row['email'] . "</a><br />";
if (strlen($row['phoneb']) > 4) {
echo "phone 2: " . substr($row['phoneb'],0,3) . "-" . substr($row['phoneb'],3,3) . "-" . substr($row['phoneb'],6) . "<br />";
}
echo "address: " . $row['address1'] . "<br />";
if ($row['address2'] != "")
echo $row['address2'] . "<br />";
echo $row['city'] . ", " . $row['prov'] . "&nbsp;&nbsp;&nbsp; " . $row['post'] . "<br />";


?></div><div id="edit_tag"><a href="?do=edit&mid=<?php echo $row['mid']; ?>">edit&nbsp;profile</a>
</div></div></div>
</center></body></html>
