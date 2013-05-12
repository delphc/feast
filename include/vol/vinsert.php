<?php

if (isset($_POST['email']))
$psemail = $_POST['email'];
else
$psemail = "";
$query = "INSERT INTO member 
(first_name,m_name,last_name,address1,address2,city,prov,post,phone,phoneb,email,mvol) 
";
$query .= " VALUES ('" . trim($_POST['f_name']) . "','" . $_POST['m_name'] . "','" . trim($_POST['l_name']) . "','" . $_POST['add1'] . "','" .  $_POST['add2'] . "','" . $_POST['city'] . "','" . $_POST['prov'] . "','" . $_POST['post'] . "','" . $_POST['phone1'] . str_replace("-","",$_POST['phone2']) . "','" .  $_POST['phoneb1'] . str_replace("-","",$_POST['phoneb2'])  . "','" .  $psemail . "', 1) ";
mysql_query($query)  or die(mysql_error());


$query = "SELECT * FROM member WHERE first_name LIKE '" . $_POST['f_name'] . "'"; 
$result = mysql_query($query) or die(mysql_error());  
$midVol ="";
while($row = mysql_fetch_array($result)){
if (($row['first_name'] == trim($_POST['f_name'])) && ($row['last_name'] == trim($_POST['l_name'])) && ($row['email'] == $psemail))
$midVol = $row['mid'] ;
}

if ($midVol != "") {
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
$drvDo = "1,'" .  $_POST['dlname']. "','" . $_POST['dlno'] . "','" .  $_POST['dlprov'] . "','" .  $_POST['dlexpy']  . "-" . $_POST['dlexpm']  . "-00'" ;
} else {
$drvDo = "0, '', '', '', ''" ;
}
$notes = htmlspecialchars($_POST['notes']);
$query = "INSERT INTO volunteer (mid, mbirth, urgname, urgphone, urgrelate, urgother, drv_do, drvname, drvlicense, drvprov, drvexp, bday, refname, refrelate, refphone, mlang, mlang2, origin, padd, pcity, pprov, ppost, refoth, heard, othr_vol, occup, able1, able2, able3, able4, able5, able6, able7, able8, able9, able10, able11, able_mr, notes) ";
$query .= " VALUES ('" . $midVol . "','" . $mbirthVol . "','" . $_POST['urgn'] . "','" . $_POST['urgp1']  . $_POST['urgp2'] . "','" . $_POST['urgr'] . "','" . $_POST['urgo'] . "', " . $drvDo .  " ,'" . $bdayVol ."' ,'" . $_POST['rname'] . "','" . $_POST['rrel']  . "','". $_POST['rphon1']  . $_POST['rphon2'] . "','" . $langV . "' , '". $lang2V . "' , '". $_POST['orig'] . "', '" .   $_POST['padd'] . "','" . $_POST['pcity'] . "','" . $_POST['pprov']. "','" . $_POST['ppost'] . "','" .  $_POST['rmisc'] . "','" . $hearV . "','" . $_POST['ovol'] . "','" . $occV . "' ";
$i = 1;
$able="";
while ($i <= 11) {
$str = "able" . $i;
if ($_POST[$str]=="yes")
$able .= ", 1 ";
else
$able .= ", 0 ";
$i++;
}
$query .= $able . ", '" .$_POST['ablem'] . "','" . $notes .  "') ";
mysql_query($query)  or die(mysql_error());
}


?><div class="w8"><div id="ul"><img src="theme/default/p1/brnch1.gif" width="345" height="111" border="0" alt="" / align="left"></div><div id="ur"><img src="theme/default/p1/brnch2.gif" width="184" height="72" border="0" alt="" /></div><div id="ut"></div></div>

<center>
<div id="center"><div id="idgroup"><div style="float:left; margin: 0;width:273px; height:138px;background: url(img/alertleft.gif)"><div id="infoalign">
<acronym title="FEASTDB: A FIREBOY TECHNOLOGIES PRODUCT">A new entry was successfully created for <b><?php echo $_POST['f_name'] . " " . $_POST['l_name']; ?></b> in the feast database.</acronym><br /><br /><form action="?go=search" method="post">
<input type="submit" value="continue" /></form>
</div></div><div style="float:left; margin: 0;width:101px; height:138px;background: url(img/alertright.gif)">&nbsp;</div></div>
</div></center>
</div></div></div></center></body></html>
