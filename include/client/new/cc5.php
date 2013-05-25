<!-- start of new cc5--!>
<?php
		//keep passing along our member's ID number
		$pass_mid = $_POST['pass_mid'];

		//prepare certain variables
		if ($_POST['mdayy'] >= 1900)
			$mFday = $_POST['mdayy'] . "-" . $_POST['mdaym'] . "-" . $_POST['mdayd'];
		else
			$mFday = '0000-00-00';
		if ($_POST['dtype'] == "reg")
			$dType = "R";
		else
			$dType = "E";
		$query = "UPDATE client SET dType='" . $dType . "', dMon='" . $_POST['dlvMon'] . "', dTue='" . $_POST['dlvTue'] . "', dWed='";
		$query .= $_POST['dlvWed'] . "', dFri='" . $_POST['dlvFri'] . "', dSat='" . $_POST['dlvSat'] . "', firstmealdate='" . $mFday . "', mealstatus='A'  WHERE mid='" . $pass_mid . "'";

		//Add the info from the last page to the client database
		mysql_query($query);//  or echo(mysql_error());

?>
																									<div id="fn" class="w8">
																										<form name="mowcreate" action="?do=new&cc=6" method="post">
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
																														<div id="nf"><div class="gtle">Which route will this client be on?</div><div class="cntr4">
																																<select style="width:135px;margin-right:2px" name="routen">

																																	<option value="CS">Centre Sud</option>

																																	<option value="CDN">Cote De Neiges</option>

																																	<option value="ME">Mile End</option>

																																	<option value="MG">McGill</option>

																																	<option value="MGW">McGill West</option>

																																	<option value="NDG">Notre Dame de Grace</option>

																																	<option value="CV">Downtown</option>

																																	<option value="WM">Westmount</option>
																															</select></div>

																															<div class="gtle">Please enter any directions which 
																																may be helpful in finding the client's residence.</div>
																															<div 
																																style="padding:2px 0 4px 80px"><textarea rows="3" cols="20" style="width:270px;" name="directions"></textarea>
																														</div></div>
																														<div class="snd"><input type="hidden" name="pass_mid" value="<?php echo $pass_mid; ?>"><input type="submit" value="Continue &raquo;" /></div>
</div>
