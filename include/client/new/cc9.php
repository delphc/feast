<!-- start of new cc9--!>
<?php
		//keep passing along our member's ID number
		$pass_mid = $_POST['pass_mid'];

		//prepare certain variables
		$diDairy = 0;
		if ($_POST['dietr_i4'] == "1")
			$diDairy = 1;
		if ($_POST['dietr_i5'] == "1")
			$diDairy = 1;

		$query = "INSERT INTO meals_default (mid) VALUES (". $pass_mid . ")";
		$result = mysql_query($query);
		$query = "SELECT * FROM client WHERE mid='" . $pass_mid . "'";
		$result = mysql_query($query);
		$row = mysql_fetch_array( $result );
		$portionD = $row['mPortion'];
		//prepare query
		$query = "UPDATE meals_default set dMonNumber='" . $_POST['nmeals'] . "', dMonPortion='" . $portionD . "', dMonSideds='";
		$query .= $_POST['nds'] . "', dMonSidedd='" . $_POST['ndd'] . "', dMonSidefs='" . $_POST['nsf'] . "', dMonSidegs='" . $_POST['ngs'] . "', dMonSidepd='" . $_POST['npd'] . "', dMonSidegz='" . $_POST['ngz'] . "', dMonSidevb='" . $_POST['nvb'] . "', dMonSidevz='" . $_POST['nvz'] . "', dTueNumber='" . $_POST['nmeals'] . "', dTuePortion='" . $portionD . "', dTueSideds='" . $_POST['nds'] . "', dTueSidedd='" . $_POST['ndd'] . "', dTueSidefs='" . $_POST['nsf'] . "', dTueSidegs='" . $_POST['ngs'] . "', dTueSidepd='" . $_POST['npd'] . "', dTueSidegz='" . $_POST['ngz'] . "', dTueSidevb='" . $_POST['nvb'] . "', dTueSidevz='" . $_POST['ngz'] . "', dWedNumber='" . $_POST['nmeals'] . "', dWedPortion='" . $portionD . "', dWedSideds='" . $_POST['nds'] . "', dWedSidedd='" . $_POST['ndd'] . "', dWedSidefs='" . $_POST['nsf'] . "', dWedSidegs='" . $_POST['ngs'] . "', dWedSidepd='" . $_POST['npd'] . "', dWedSidegz='" . $_POST['ngz'] . "', dWedSidevb='" . $_POST['nvb'] . "', dWedSidevz='" . $_POST['ngz'] . "', dFriNumber='" . $_POST['nmeals'] . "', dFriPortion='" . $portionD . "', dFriSideds='" . $_POST['nds'] . "', dFriSidedd='" . $_POST['ndd'] . "', dFriSidefs='" . $_POST['nsf'] . "', dFriSidegs='" . $_POST['ngs'] . "', dFriSidepd='" . $_POST['npd'] . "', dFriSidegz='" . $_POST['ngz'] . "', dFriSidevb='" . $_POST['nvb'] . "', dFriSidevz='" . $_POST['ngz'] . "', dSatNumber='" . $_POST['nmeals'] . "', dSatPortion='" . $portionD . "', dSatSideds='" . $_POST['nds'] . "', dSatSidedd='" . $_POST['ndd'] . "', dSatSidefs='" . $_POST['nsf'] . "', dSatSidegs='" . $_POST['ngs'] . "', dSatSidepd='" . $_POST['npd'] . "', dSatSidegz='" . $_POST['ngz'] . "', dSatSidevb='" . $_POST['nvb'] . "', dSatSidevz='" . $_POST['ngz']  . "' WHERE mid = " . $pass_mid;
		//Add the info from the last page to the client database
		mysql_query($query);//  or echo(mysql_error());

?>
																																													<div id="fn" class="w8">
																																														<form name="mowcreate" action="?do=new&cc=10" method="post">
																																															<table width="100%" border="0" cellpadding="0"cellspacing="0">

																																																<tr id="ft">

																																																	<td style="width:300px;border-top:1px solid #000;"> </td>

																																																	<td class="ml"> </td>

																																																	<td class="mc"> </td>

																																																	<td class="rr"> </td>
																																																</tr>
																																																<tr id="sr">

																																																	<td>
																																																		<div style="font-size:13px;padding:0 25px; float:right; width:250px;color:#BBBBBB;">Next, enter some contacts for this client.<br 
																																																			/>&nbsp;</div></td>

																																																	<td class="gr"><img src="theme/default/p1/arw.gif" width="7" height="15" border="0" alt="" /></td>
																																																	<th class="gd" rowspan="2" colspan="2">
																																																		<div id="nf"><div class="gtle">Enter a third party contact for the client.</div>

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

																																																								<option>son</option></select>&nbsp;&nbsp;&nbsp;&nbsp;<input name="rel_refr" class="chkbx" style="padding-left: 10px;" type="checkbox" value="1" />&nbsp;Referring&nbsp;Party&nbsp;&nbsp;&nbsp;&nbsp;<input name="rel_emrg" class="chkbx" type="checkbox" value="1" />&nbsp;Emergency&nbsp;Contact<br>

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
																																																							type="text">&nbsp;<input class="i7" name="phonec2" maxlength="10" size="10" type="text"> ext. <input class="i3" name="phonec3" maxlength="6" size="6" type="text">
																																																				</td></tr></table>
																																																			</div>
																																																			<div class="snd"><input type="hidden" name="relDo" value="add">
																																																			<input type="hidden" name="pass_mid" value="<?php echo $pass_mid; ?>"><input type="submit" value="Add Relationship &raquo;" /></div>
</div>
