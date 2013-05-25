<!-- start of new cc11--!>
<?php
	//keep passing along our member's ID number
		$pass_mid = $_POST['pass_mid'];

		$output="";
		$bTo= $_POST['billTo'];
		if ($bTo == "slf") {
			$query = "INSERT INTO client_billing (mid, billto) Values ('" . $pass_mid . "','" . $bTo. "')";
			mysql_query($query)  or die(mysql_error());
		}elseif ($bTo == "cur") {
			$query = "INSERT INTO client_billing (mid, billto, accountno, address1) Values ('" . $pass_mid;
			$query .= "','" . $bTo. "','" . $_POST['baccount'] . "','" . $_POST['betage'] . "')";
			mysql_query($query)  or die(mysql_error());
		} elseif ($bTo == "blu") {
			$query = "INSERT INTO client_billing (mid, billto, accountno, authno) Values ('" . $pass_mid;
			$query .= "','" . $bTo. "','" . $_POST['bacc'] . "','" . $_POST['bauth'] . "')";
			mysql_query($query)  or die(mysql_error());
		} elseif ($bTo == "oth") {
			$query = "INSERT INTO client_billing (mid, billto, salutation, address1, address2, address3, city, prov, post, phone, ext) Values ('" . $pass_mid;
			$query .= "','" . $bTo. "','" . $_POST['salut'] . "','" . $_POST['add1'] . "','" . $_POST['add2'] . "','" . $_POST['add3'];
			$query .= "','" . $_POST['city'] . "','" . $_POST['prov'] . "','" . strtoupper($_POST['post']) . "','" . $_POST['phone1'] . $_POST['phone2'] . "','" . $_POST['ext'] . "')";
			mysql_query($query)  or die(mysql_error());
		} else {
			$relno = substr($_POST['billTo'],3);
			$query = "INSERT INTO client_billing (mid, billto) Values ('" . $pass_mid . "','r" .  $relno . "')";
			mysql_query($query)  or die(mysql_error());
			$query = "SELECT * FROM client_relationships WHERE mid='" . $pass_mid . "' and rid='" . $relno . "'";
			$result = mysql_query($query) or die ('Error: '.mysql_error ());
			while($row = mysql_fetch_array( $result )) {
				$query = "UPDATE client_relationships SET billto='1' WHERE mid='" . $pass_mid . "' AND rid='" .$row['rid'] . "'";
				mysql_query($query)  or die(mysql_error());
			}
		}
?>
																																																														<div id="fn" class="w8">
																																																															<form name="mowcreate" action="?do=new&cc=done" method="post">
																																																																<table width="100%"
																																																																	border="0" cellpadding="0"
																																																																	cellspacing="0">

																																																																	<tr id="ft">

																																																																		<td class="ll"> </td>

																																																																		<td class="ml"> </td>

																																																																		<td class="mc"> </td>

																																																																		<td class="rr"> </td>
																																																																	</tr>
																																																																	<tr id="sr">

																																																																		<td class="ll">
																																																																			<div style="font-size:13px;padding:0 25px; float:right; width:250px;color:#BBBBBB;">Enter information needed for billing.<br />&nbsp;</div></td>

																																																																		<td class="gr"><img src="theme/default/p1/arw.gif" width="7" height="15" border="0" alt="" /></td>
																																																																		<th class="gd" rowspan="2" colspan="2">
																																																																			<div id="nf"><div class="gtle">Enter any shared notes for this client's file.<div
																																																																						style="height:150px;padding: 10px 0 0 10px"><textarea 
																																																																							rows="3" cols="20" style="height:70px;width:280px;" name="sharedNotes"></textarea></div>
																																																																			</div></div>
																																																																			<div class="snd"><input type="hidden" name="pass_mid" value="<?php echo $pass_mid; ?>"><input type="submit" value="Finish &raquo;" /></div>
</div>



