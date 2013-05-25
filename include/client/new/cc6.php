<!-- start of new cc6--!>
<?php
		//keep passing along our member's ID number
		$pass_mid = $_POST['pass_mid'];

		$query = "UPDATE client SET dRoute='" . $_POST['routen'] . "', dStop='" . $_POST['dStop']  . "', dDirections='" . 
			mysql_real_escape_string($_POST['directions']) . "'  WHERE mid='" . $pass_mid . "'";

		//Add the info from the last page to the client database
		mysql_query($query);//  or echo(mysql_error());

		//Find any one else on the same route
		$query = "SELECT * FROM client WHERE dRoute LIKE '" . $_POST['routen'] . "' AND mealstatus='A' ORDER BY dStop ASC";
		$result = mysql_query($query);// or echo(mysql_error());
		$outputR = "";
		$countR = 0;
		$midArray = array();
		$i=0;
		while($row = mysql_fetch_array($result)){
			$midArray[$i] = $row['mid'];
			$i++;
		}

		$nMid = count($midArray);
		for ($i = 0; $i < $nMid; $i++) {
			//use the the Member IDs to get the name and address.
			$query = "SELECT * FROM member WHERE mid='" . $midArray[$i] . "'";
			$result = mysql_query($query);// or echo(mysql_error());
			$row = mysql_fetch_array($result);
			$countR++;
			$outputR .=  "
				<div class=\"or_box\"><input type=\"text\" class=\"or_name\" value=\"" . substr($row['first_name'],0,1) . ". " . $row['last_name'];
			$outputR .=  "\" name=\"or_name" . $countR . "\"  id=\"or_name" . $countR . "\" disabled=\"disabled\" /><input type=\"text\" value=\"" . $row['address1'];
			$outputR .=  "\" name=\"or_add" . $countR . "\" id=\"or_add" . $countR . "\" disabled=\"disabled\"";
			if ($i != 0)
				$outputR .= " /><input type=\"button\" value=\"up\" onClick=\" switchBx(" . $countR . "," . ($countR - 1) . ")\" onFocus=\"this.blur()\" class=\"btn\"";
			else
				$outputR.= "style=\"padding-right:35px\"";
			$outputR .= " /><br /><input type=\"text\" value=\"";
			$outputR .= $row['address2'] . "\" id=\"or_addb" . $countR . "\" name=\"or_addb" . $countR . "\" disabled=\"disabled\"";
			if ($i < ($nMid - 1))
				$outputR .= " /><input type=\"button\" value=\"dn\" onClick=\" switchBx(" . $countR . "," . ($countR + 1) . ")\" onFocus=\"this.blur()\" class=\"btn\"";
			else
				$outputR .= "style=\"padding-right:35px\"";
			$outputR .= " /><input type=\"hidden\" name=\"or_mid" . $countR . "\" id=\"or_mid" . $countR . "\" value=\"" . $midArray[$i] . "\">";
			$outputR .= "<input type=\"hidden\" name=\"or_stp" . $countR . "\" value=\"" . ($countR) . "\"></div>";
		}
?>
																														<div id="fn" class="w8">
																															<form name="mowcreate" action="?do=new&cc=7" method="post">
																																<table width="100%"
																																	border="0" cellpadding="0"
																																	cellspacing="0">

																																	<tr id="ft">

																																		<td style="width:300px;border-top:1px solid #000;"> </td>

																																		<td class="ml"> </td>

																																		<td class="mc"> </td>

																																		<td class="rr"> </td>
																																	</tr>
																																	<tr id="sr">

																																		<td>
																																			<div style="font-size:13px;padding:0 25px; float:right; width:200px;color:#BBBBBB;">Lets enter information that will help when
																																				delivering the meals.<br />&nbsp;</div></td>

																																		<td class="gr"><img src="theme/default/p1/arw.gif" width="7" height="15" border="0" alt="" /></td>
																																		<th class="gd" rowspan="2" colspan="2">
																																			<div id="nf"><div class="gtle">Adjust the route order to accomadate this client.</div></div><div 
																																				style="padding-left:39px">
																																				<?php echo $outputR; ?><br /></div>

																																			<div class="snd"><input type="hidden" name="noStops" value="<?php echo $nMid; ?>">
																																			<input type="hidden" name="pass_mid" value="<?php echo $pass_mid; ?>"><input type="submit" value="Continue &raquo;" /></div>
</div>
