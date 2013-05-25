<?php
	//keep passing along our member's ID number
		$pass_mid = $_POST['pass_mid'];

		//prepare query
		//$query = "SELECT * FROM member WHERE last_name LIKE '" . $_POST['lname'] . "'";

		//Add the info from the last page to the client database
		//mysql_query($query)  or die(mysql_error());

?>
																																																																			<div id="fn" class="w8">
																																																																				<form>
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
																																																																								<div style="font-size:13px;padding:0 25px; float:right; width:250px;color:#BBBBBB;">Creation of a new client has 
																																																																									finished.<br />&nbsp;</div></td>

																																																																							<td class="gr"><img src="theme/default/p1/arw.gif" width="7" height="15" border="0" alt="" /></td>
																																																																							<th class="gd" rowspan="2" colspan="2">
																																																																								<div id="nf"><div class="gtle">Done!</div><div
																																																																										style="height:150px;padding: 10px 10px 0 50px;">You may now navigate away from this page or press 'Go' to continue to the clients 
																																																																										file.</div>
																																																																							</div></div>
																																																																							<div class="snd"><input type="button" onClick="window.open('?do=show&mid=<?php echo $pass_mid; ?>', '_self', ''); return false; " value="Go &raquo;"></div>
</div>
