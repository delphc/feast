<?php
if ($_POST['mid'] > 20) {
include '/var/www/feastdb/include/config/mysql_login.php';
mysql_connect("localhost", $mysqluser, $mysqlpass);
mysql_select_db("mowdata");

for ($i=0;$i<=11;$i++){
	if (!isset($_POST['able' . $i])) {
	    //If not isset -> set with dumy value
	    $_POST['able' . $i] = 0;
	}
} 
if (!isset($_POST['drvr']))
	$_POST['drvr'] = 0;
if (!isset($_POST['dlno']))
	$_POST['dlno'] = 0;
if (!isset($_POST['dlname']))
	$_POST['dlname'] = 0;
if (!isset($_POST['rmisc']))
	$_POST['rmisc'] = "";
if (!isset($_POST['occupo']))
	$_POST['occupo'] = "";
if (isset($_POST['email']))
$psemail = $_POST['email'];
else
$psemail = "";
$query = "UPDATE member SET ";
$query .= "first_name = '" . trim($_POST['f_name']) . "' , m_name='" . $_POST['m_name'] . "' , ";
$query .= "last_name='" . trim($_POST['l_name']) . "' , ";
$query .= "address1='" . $_POST['add1'] . "' , address2='" . $_POST['add2'] . "' , ";
$query .= "city='" . $_POST['city'] . "' , prov='" . $_POST['prov'] . "' , post='" . $_POST['post'] . "' , ";
$query .= "phone='" . $_POST['phone1'] . str_replace("-","",$_POST['phone2']) . "' , ";
$query .= "phoneb='" . $_POST['phoneb1'] . str_replace("-","",$_POST['phoneb2']) . "' , ";
$query .= "email='" . $psemail . "' , ";
$query .= "mvol='1' WHERE mid = '" . $_POST['mid'] ."'";
$result = mysql_query($query) or die(mysql_error()); 
$mbirthVol = $_POST['odayy'] . "-" . $_POST['odaym'] . "-" . $_POST['odayd'];
if (is_numeric($_POST['bdayy'])){
if ($_POST['bdayy'] >= 1900)
$bdayVol = $_POST['bdayy'] . "-" . $_POST['bdaym'] . "-" . $_POST['bdayd'];
else
$bdayVol = '0000-00-00';
} else {
$bdayVol = '0000-00-00';
}
if ($_POST['lang'] == "other")
$langV = $_POST['lang2'];
else
$langV = $_POST['lang'];

if ($_POST['occup'] == "other")
$occV = $_POST['occupo'];
else
$occV = $_POST['occup'];

if ($_POST['heard'] == "other")
$hearV = $_POST['heardo'];
else
$hearV = $_POST['heard'];
$lang2V = $_POST['olang'] . "-" . $_POST['olang2'];
if ($_POST['drvr']=="yes"){
$drvDo = "drv_do = 1 , drvname = '" .  $_POST['dlname']. "' , drvlicense = '" . $_POST['dlno'] . "' , drvprov = '" .  $_POST['dlprov'] . "' , drvexp = '" .  $_POST['dlexpy']  . "-" . $_POST['dlexpm']  . "-00'" ;
} else {
$drvDo = "drv_do = 0 , drvname = '' , drvlicense = '' , drvprov = '' , drvexp = '0000-00-00'";
}
$notes = htmlspecialchars($_POST['notes']);
$query = "UPDATE volunteer SET ";
$query .= "mbirth='" . $mbirthVol . "' , ";
$query .= "urgname='" . $_POST['urgn'] . "' , ";
$query .= "urgphone='" . $_POST['urgp1'] . $_POST['urgp2'] . "' , ";
$query .= "urgrelate='" . $_POST['urgr'] . "' , ";
$query .= "urgother='" . $_POST['urgo'] . "' , ";
$query .= $drvDo . " , ";
$query .= "bday='" . $bdayVol . "' , ";
$query .= "refname='" . mysql_real_escape_string($_POST['rname']) . "' , refrelate='" . $_POST['rrel'] . "' , ";
$query .= "refphone='" . $_POST['rphon1'] . $_POST['rphon2'] . "' , ";
$query .= "mlang='" . $langV . "' , mlang2='" . $lang2V . "' , ";
$query .= "origin='" . $_POST['orig'] . "' , ";
$query .= "padd='" . $_POST['padd'] . "' , pcity='" . $_POST['pcity'] . "' , ";
$query .= "pprov='" . $_POST['pprov'] . "' , ppost='" . $_POST['ppost'] . "' , ";
$query .= "refoth='" . $_POST['rmisc'] . "' , ";
$query .= "heard='" . $hearV . "' , othr_vol='" . $_POST['ovol'] . "' , ";
$query .= "occup='" . $occV . "' , ";
$i = 1;
$able="";
while ($i <= 11) {
$str = "able" . $i;
$able .= $str;
if ($_POST[$str]=="yes")
$able .= "= 1 ";
else
$able .= "= 0 ";
$able .=  " , ";
$i++;
}
$query .= $able . " able_mr='" . $_POST['ablem'] . "' , notes='" . $_POST['notes'] . "' WHERE mid='" . $_POST['mid'] ."'";

//uncomment for debugging
//echo $query;
$result = mysql_query($query) or die(mysql_error());  
}
?><div class="w8"><div id="ul"><img src="theme/default/p1/brnch1.gif" width="345" height="111" border="0" alt="" / align="left"></div><div id="ur"><img src="theme/default/p1/brnch2.gif" width="184" height="72" border="0" alt="" /></div><div id="ut"></div></div>

<center>
<div id="center"><div id="idgroup"><div style="float:left; margin: 0;width:273px; height:138px;background: url(img/alertleft.gif)"><div id="infoalign">
<acronym title="FEASTDB: A FIREBOY TECHNOLOGIES PRODUCT">An entry was successfully modified for <b><?php echo $_POST['f_name'] . " " . $_POST['l_name']; ?></b> in the feast database.</acronym><br /><br /><form action="?go=search" method="post">
<input type="submit" value="continue" /></form>
</div></div><div style="float:left; margin: 0;width:101px; height:138px;background: url(img/alertright.gif)">&nbsp;</div></div>
</div></center>
</div></div></div></center></body></html>
