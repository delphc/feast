<!-- start of new cc1 --!>

<?php
//see if client already exist in database
$query = "SELECT * FROM member WHERE last_name LIKE '" . $_POST['lname'] . "'";
$result = mysql_query($query);
//print out results
$hits = 0;
$output = "";
while($row = mysql_fetch_array( $result )) {
if ($row['first_name']==$_POST['fname']) {
$hits++; 
$output .= "<input onClick=\"enableSub('cnewhide','hide')\"  type=\"radio\" value=\"" . $row['mid'] . "\" name=\"slectNew\" /><a href=\"?do=show&mid=" . $row['mid'] . "\"><b>" .  $row['first_name'] . " " . $row['last_name'] . "</b></a><br />";
}
}
$output .= "<input onClick=\"enableSub('cnewhide','unhide')\" type=\"radio\" value=\"NEW\" name=\"slectNew\" id=\"slectNew\" 
/>Create a new client...";


?>

<!-- start of new cc1--!>
<div id="fn" class="w8">
	<form name="mowcreate" action="?do=new&cc=2" method="post" onSubmit="chkValue('slectNew')">

		<table width="100%" border="0" cellpadding="0" cellspacing="0">


			<tr id="ft">


				<td style="width:300px;border-top:1px solid #000;"> </td>


				<td class="ml"> </td>


				<td class="mc"> </td>


				<td class="rr"> </td>
			</tr>

			<tr id="sr">


				<td>

					<div style="font-size:13px;padding:0 25px; float:right; width:210px;color:#BBBBBB;">

						<?php if ($hits < 1) {
						?>There are no existing entries for a client by this name. Let's proceed.<br />&nbsp;</div></td>


				<td class="gr"><img src="theme/default/p1/arw.gif" width="7" height="15" border="0" alt="" /></td>
				<th class="gd" rowspan="2" colspan="2">

					<div id="nf">
						<div class="gtle">
							How can the client be contacted?<input type="hidden" name="slectNew" value="NEW"></div>


						<div>

							<table class="inpt">
								<?php } else { ?>There are entries in the database for clients with that name.<br />&nbsp;</div></td>


						<td class="gr"><img src="theme/default/p1/arw.gif" width="7" height="15" border="0" alt="" /></td>
						<th class="gd" rowspan="2" colspan="2">

							<div id="nf">
								<div class="gtle">Do you mean one of these people?
									<div style="width:260px;float:right;clear:both;"><?php echo $output; ?></div></div>


								<div style="height:220px">
									<div style="display:none" id="cnewhide">

										<table class="inpt">


											<tr>

												<td colspan="2">

													<div style="width:350px;padding:30px 0 20px 20px;clear:both;">If not, let's continue and add a new 
														client.</div></td></tr>
											<?php
											} ?>

											<tr>

												<td class="rt">name:</td>

												<td><input class="i9" type="text" name="f_name" value="<?php echo $_POST['fname']; ?>" maxlength="20" size="10" />
													<input class="i13" type="text" name="m_name" maxlength="20" size="10" style="margin:0 2px" />
													<input class="i13" type="text" name="l_name" id="Lname" maxlength="20" size="10" value="<?php echo $_POST['lname']; ?>" />
												</td>
											</tr>


											<tr>

												<td class="rt" rowspan="2">address:</td>
												<td><input class="i25" type="text" name="add1" maxlength="35" size="35" 
													/></td></tr>

											<tr>

												<td><input class="i25" type="text" name="add2" maxlength="35" size="35" />
												</td>
											</tr>

											<tr>

												<td class="rt">city:</td>
												<td><input class="i13" type="text" name="city" maxlength="25" size="25"
													/>&nbsp;province/state: <input class="i2" type="text" name="prov" maxlength="2" size="2" value="QC" />&nbsp; postal code: <input
													class="i5" type="text" name="post" maxlength="7" size="7" style="text-transform: uppercase;" /></td>
											</tr>

											<tr>

												<td class="rt">email:</td>

												<td><input class="i25" type="text" name="email" maxlength="45" size="10" /></td>
											</tr>

											<tr>

												<td class="rt">home&nbsp;phone:</td>
												<td>
													<input
													class="i2" type="text" name="phone1" maxlength="3" size="3"  value="514" /> <input class="i7" type="text"
													name="phone2" maxlength="10" size="10" />secondary phone:<input class="i2" type="text" name="phoneb1"
													maxlength="3" size="3"  value="514" />
													<input class="i7" type="text" name="phoneb2" maxlength="10" size="10" />
												</td>
											</tr>
										</table>
									</div>
								</div>
							</div>

							<?php if (!($hits < 1)) { ?>
						</div>

						<div class="snd" style="clear:both;"><input id="subB" type="submit" value="Continue &raquo;" disabled="true" /></div>

						<?php
						} 
						else { ?>

						<div class="snd" style="clear:both;"><input id="subB" type="submit" value="Continue &raquo;" /></div>

					</div>

					<?php } ?>
