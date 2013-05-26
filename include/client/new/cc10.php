<?php
		//keep passing along our member's ID number
		$pass_mid = $_POST['pass_mid'];

		if ($_POST['relDo'] == "add") {

			//prepare certain variables
			switch ($_POST['slctRel']) {
			case "case worker":
			case "nurse":
			case "doctor":
			case "dietician":
			case "physiotherapist":
				$isProf = 1;
				break;
			default:
				$isProf = 0;
			}
			if (isset($_POST['email']))
				$psemail = $_POST['email'];
			else
				$psemail = "";
			$cPhoneA = $_POST['phone1'] . str_replace("-","",$_POST['phone2']);
			$cPhoneB = $_POST['phoneb1'] . str_replace("-","",$_POST['phoneb2']);
			$cPhoneC = $_POST['phonec1'] . str_replace("-","",$_POST['phonec2']);
			$query = "INSERT INTO contacts (first_name, last_name,organ,relate, address1, address2, city, prov,";
			$query .= "post, email, phone1, phone2, phone3, phone3ext, editor) Values ('";
			$query .= mysql_real_escape_string(trim($_POST['relf_name']))  . "','" . mysql_real_escape_string(trim($_POST['rell_name']));
			$query .=  "','" . $_POST['relorg'] . "','" . $_POST['slctRel'] . "','";
			$query .= mysql_real_escape_string($_POST['add1']) . "','" . mysql_real_escape_string($_POST['add2']) . "','" . $_POST['city'] . "','" . $_POST['prov'] . "','" . $_POST['post'];
			$query .= "','" . $psemail . "','" . $cPhoneA . "','"  . $cPhoneB . "','" . $cPhoneC . "','" . $_POST['phonec3'] . "','" . $f_user . "')";

			//add the entry 
			mysql_query($query)  or die(mysql_error() . $query);
			//and then get the Member ID
			$query = "SELECT MAX(rid) AS rid FROM contacts";
			$result = mysql_query($query) or die(mysql_error());
			$rid ="";

			$row = mysql_fetch_array($result);
			$rid = $row['rid'] ;	

			//set vars for relationship table
			$rel_refr = 0;
			$rel_emrg = 0;
			if (isset($_POST['rel_refr']))
				$rel_refr = 1;//$_POST['rel_refr'];
			if (isset($_POST['rel_emrg']))
				$rel_emrg = 1;//$_POST['rel_emrg'];

			$query = "INSERT INTO client_relationships (mid,rid,emerge,refer) Values (";
			$query .= $pass_mid . "," . $rid . "," . $rel_emrg . "," . $rel_refr . ")";
			//add the entry 
			mysql_query($query)  or die(mysql_error());

?>
<div id="fn" class="w8">
	<form name="mowcreate" action="?do=new&cc=10" method="post">
		<table width="100%"
			border="0" cellpadding="0"
			cellspacing="0">


			<tr id="ft">

				<td style="width:300px;border-top:1px solid #000;"> </td>

				<td class="ml"> </td>

				<td class="mc"> </td>

				<td class="rr"> </td>
			</tr>
			<tr id="sr">

				<td>
					<div style="font-size:13px;padding:0 25px; float:right; width:250px;color:#BBBBBB;">Next, enter some contacts for this client.<br 
						/>&nbsp;</div></td>

				<td class="gr"><img src="theme/default/p1/arw.gif" width="7" height="15" border="0" alt="" /></td>
				<th class="gd" rowspan="2" colspan="2">
					<div id="nf"><div class="gtle"><center>
								<table cellpadding="0" cellspacing="0" class="relshw">
									<tr style="font-size:80%;font-style:italic;font-weight:bold;">

										<td>name</td><td>relationship</td><td>organization</td><td>phone</td><td>emerg</td><td>refered</td></tr><?php

			$i=0;
			$query = "SELECT * FROM client_relationships WHERE mid='" . $pass_mid . "'";
			$result = mysql_query($query);
			while($person =  mysql_fetch_array( $result )) {

				//set some vars
				$i++;
				$isOdd = "";

				$query = "SELECT * FROM contacts WHERE rid='" . $person['rid'] . "'";
				$result = mysql_query($query);
				$row =  mysql_fetch_array( $result );
				$rPhone	= $row['phone1'];
				$isRefer = "&nbsp;";
				$isEmrg = "&nbsp;";
				//is the row an odd number - vary colour
				if ($person['emerge'] == 1)
					$isEmrg = "<img src=\"checksm.gif\" border=\"0\" style=\"padding-top:4px\">";
				if ($person['refer'] == 1)
					$isRefer = "<img src=\"checksm.gif\" border=\"0\" style=\"padding-top:4px\">";
				if ( $i&1 )
					$isOdd = " class=\"odd\"";
				if ($row['prof'] == 1 )
					$rPhone = $row['phone3'] . " ext. " . $row['phone3ext'];
				echo "
					<tr" .$isOdd . ">
					<td>".$row['first_name'] . " " . $row['last_name'] . "</td><td>" . $row['relate'] . "</td>

					<td>" .  $row['organ'] . "</td><td>" . $rPhone . "</td><td>" . $isEmrg . "</td><td>" . $isRefer . "</td></tr>";
			}

			?></table></center>Enter a third party contact for the client.</div>

<div class="gtle" id="cworkers" style="display:none;">&nbsp;</div>

<table class="inpt"><tbody>
		<tr>

			<td class="rt">first&nbsp;name:</td><td><input class="i13" name="relf_name" maxlength="20" size="10" type="text">

				&nbsp;last&nbsp;name:&nbsp;<input class="i13" name="rell_name" id="rell_name" maxlength="20" size="10" type="text" onkeyup="javascript:autocw('<?php echo $pass_mid; ?>')">
		</td></tr>
		<tr>
			<td class="rt">relationship:
				<div id="relOdiv" style="padding-top: 2px;">organization:</div></td>
			<td><select 
					name="slctRel" id="slctRel" onchange="relDiv()">

					<option>case worker</option><option>nurse</option><option>dietician</option><option>physiotherapist</option><option>doctor</option>

					<option>next of kin</option><option>husband</option><option>grandchild</option><option>wife</option><option>mother</option>


					<option>father</option><option>brother</option><option>sister</option><option>friend</option><option>guardian</option><option>daughter</option>

					<option>son</option></select>&nbsp;&nbsp;&nbsp;&nbsp;<input name="rel_refr" class="chkbx" style="padding-left: 10px;" 
				type="checkbox" value="1" />&nbsp;Referring&nbsp;Party&nbsp;&nbsp;&nbsp;&nbsp;<input name="rel_emrg" class="chkbx" 
				type="checkbox" value="1" />&nbsp;Emergency&nbsp;Contact<br>

				<div id="relOfdiv" style="padding-top: 2px;"><input class="i25" name="relorg" id="relOrg" maxlength="30" size="30" type="text"></div>
		</td></tr>
		<tr>
			<td class="rt" rowspan="2">address:</td><td><input class="i25" name="add1" maxlength="35" size="35" 
				type="text"></td></tr>
		<tr>
			<td><input class="i25" name="add2" maxlength="35" size="35" type="text">
		</td></tr>
		<tr>
			<td class="rt">city:</td><td><input class="i13" name="city" maxlength="25" size="25" 
				type="text">&nbsp;province/state:&nbsp;<input class="i2" name="prov" maxlength="2" size="2" value="QC" 
				type="text">&nbsp;&nbsp;postal&nbsp;code:&nbsp;<input class="i5" name="post" maxlength="7" size="7" type="text" style="text-transform: uppercase;"></td></tr>
		<tr>
			<td 
				class="rt">email:</td>
			<td><input class="i25" name="email" maxlength="45" size="10" type="text"></td></tr>
		<tr>
			<td class="rt">
				<div 
					id="relHphone" style="padding-bottom: 2px; display: none;">home&nbsp;phone:</div>cell&nbsp;phone:</td>
			<td>
				<div
					id="relHfphone" style="display: none; padding-bottom: 2px;"><input class="i2" name="phone1" maxlength="3" size="3" value="514"
					type="text">&nbsp;<input class="i7" name="phone2" maxlength="10" size="10" type="text"><br /></div><input class="i2" name="phoneb1" 
				maxlength="3" size="3" value="514" type="text">&nbsp;<input class="i7" name="phoneb2" maxlength="10" size="10" 
				type="text"></td></tr>
		<tr>
			<td class="rt">work:</td><td><input class="i2" name="phonec1" maxlength="3" size="3" value="514" 
				type="text">&nbsp;<input class="i7" name="phonec2" maxlength="10" size="10" type="text"> ext. <input class="i3" name="phonec3" 
				maxlength="6" size="6" type="text">
	</td></tr></table>
</div>
<div class="snd"><input type="hidden" name="relDo" id="relDo" value="add"><input type="hidden" name="pass_mid" value="<?php echo $pass_mid; ?>"><input type="submit" value="Add Relationship &raquo;" /><input type="button" onClick="document.getElementById('relDo').value='done';document.mowcreate.submit(); return false;" value="No More Relationships&raquo;" /></div><?php
		} else {
			//keep passing along our member's ID number
			$pass_mid = $_POST['pass_mid'];

			//get client's name
			$query = "SELECT * FROM member WHERE mid = '" . $pass_mid . "'";
			$result = mysql_query($query) or die ('Error: '.mysql_error ());
			$row = mysql_fetch_array( $result );
			//$row = mysql_fetch_array( $result );
			//echo $query . "III";
			$billName = strtoupper($row['last_name'] . ", " . $row['first_name'] . "  - ");

			$i=0;
			$relBill = "";
			$relHidden = "";
			$query = "SELECT * FROM client_relationships WHERE mid='" . $pass_mid . "'";
			$result = mysql_query($query);
			while($row = mysql_fetch_array( $result )) {
				$query2 = "SELECT * FROM contacts WHERE rid='" . $row['rid'] . "'";
				$result2 = mysql_query($query2);
				$row2 = mysql_fetch_array( $result2 );

				//only family are likely to be billed for the meals
				//if ($row['prof'] != 1 ){
				$i++;
				$relBill .= "
					<option value=\"rel" . $row['rid'] . "\">" . $row2['first_name'] . " " . $row2['last_name'] . "</option>";
				//$relHidden .= "<input type=\"hidden\" name=\"rel" . $i . "\" value=\"" . $row['rid'] . "\" />";
				//} 
			}
?>
<!-- start of new cc10--!>
<div id="fn" class="w8">
	<form name="mowcreate" action="?do=new&cc=11" method="post">
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
					<div style="font-size:13px;padding:0 25px; float:right; width:250px;color:#BBBBBB;">Finally, enter any information to 
						share with others when they work with this client.<br />&nbsp;</div></td>
				<td class="gr"><img src="theme/default/p1/arw.gif" width="7" height="15" border="0" alt="" /></td>
				<th class="gd" rowspan="2" colspan="2">
					<div id="nf"><div class="gtle">Select the party to be billed for the meals service.<div
								style="padding: 10px 0 0 10px">
								<select name="billTo" id="billTo" onChange="billSlct()">
									<option value="slf">Self Funded</option>
									<?php echo $relBill; ?>
									<option value="cur">Curateur Public</option>
									<option value="blu">Blue Cross</option>
									<option value="oth">Other</option>
								</select><?php echo $relHidden; ?>
							</div>
							<div id="bdivoth" style="clear:both;display:none">
								<table class="inpt">
									<tr>
										<td class="rt">salutation:</td><td>
											<input class="i25" name="salut" maxlength="30" size="30" type="text"></td></tr>
									<tr>
										<td class="rt" rowspan="3">address:</td><td><input class="i25" name="add1" maxlength="35" size="35" 
											type="text"></td></tr>
									<tr>
										<td><input class="i25" name="add2" maxlength="35" size="35" type="text">
									</td></tr>
									<tr>
										<td><input class="i25" name="add3" maxlength="35" size="35" type="text">
									</td></tr>
									<tr>
										<td class="rt">city:</td><td><input class="i13" name="city" maxlength="25" size="25" 
											type="text" value="Montreal">&nbsp;province/state:&nbsp;<input class="i2" name="prov" maxlength="2" size="2" value="QC" 
											type="text"></td></tr>
									<tr>
										<td class="rt">postal&nbsp;code:</td><td><input class="i5" name="post" maxlength="7" size="7" type="text" style="text-transform: uppercase;"></td></tr>
									<tr>
										<td class="rt">phone:</td><td><input class="i2" name="phone1" maxlength="3" size="3" value="514" 
											type="text">&nbsp;<input class="i7" name="phone2" maxlength="10" size="10" type="text"> ext. <input class="i3" name="ext" maxlength="6" size="6" type="text">
								</td></tr></table>
							</div>
							<div id="bdivcur" style="display:none;"><?php 
								echo $billName . "#<input type=\"text\" style=\"width:50px\" name=\"baccount\" maxlength=\"12\"><br />";
								echo $bcurateur_address . "<input type=\"text\" style=\"width:18px;\" value=\"12\" name=\"betage\" maxlength=\"3\" /><sup>e</sup> " . $bcurateur_address2 . "<br />" . $bcurateur_address3; 
								?></div>
							<div id="bdivblu" style="display:none;"><?php 
								echo $bbluecross_sal . "<br />" . $bbluecross_address;
								?><br />client # <input type="text" style="width:80px" name="bacc" maxlength="12"><br />
								authorization # <input type="text" style="width:80px" name="bauth" maxlength="15"><br />
								provider # <?php echo $bprovider; ?>
							</div>
					</div></div>
					<div class="snd"><input type="hidden" name="pass_mid" value="<?php echo $pass_mid; ?>"><input type="submit" value="Finish &raquo;" /></div>
					<?php
					}
					?>
				</div>
