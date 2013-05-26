<!-- start of new cc1 --!>


<?php function ccComment() { ?>
	Create a new client, or exit if they already exist in the database.
<?php } ?>

<?php function ccWarning() { ?>

	<?php
	//see if client already exist in database
	$query = "SELECT * FROM member WHERE last_name LIKE '" . $_POST['lname'] . "'";
	$result = mysql_query($query);
	//print out results
	$hits = 0;
	$output = "<ul style='list-style-type: none;'>";
	while($row = mysql_fetch_array( $result )) {
		if ($row['first_name']==$_POST['fname']) {
			$hits++; 
			$output .= "<li><b>" . $row['first_name'] . " " . $row['last_name'] . "</b></li>";
		}
	}
	$output .= "</ul>";
	?>
	
	<?php if($hits > 0): ?>
	<div id="warning">
		<p>Heads up, these clients already exist in the database:</p>
		<p><?php echo $output; ?></p>
	</div>
	<?php endif; ?>

<?php } ?>

<?php function ccBaseForm() { ?>
<div id="form">
	<form name="mowcreate" action="?do=new&cc=2" method="post">
		<table class="fields">
			<tr>
				<td class="label"> name: </td>
				<td class="field"><input class="i9" type="text" name="f_name" value="<?php echo $_POST['fname']; ?>" maxlength="20" size="10" />
				<input class="i13" type="text" name="m_name" maxlength="20" size="10" style="margin:0 2px" />
				<input class="i13" type="text" name="l_name" id="Lname" maxlength="20" size="10" value="<?php echo $_POST['lname']; ?>" /></td>
			</tr>

			<tr>
				<td class="label"> address: </td>
				<td class="field"><input class="i25" type="text" name="add1" maxlength="35" size="35">
					<input class="i25" type="text" name="add2" maxlength="35" size="35" /></td>
			</tr>

			<tr>
				<td class="label"> city: </td>
				<td class="field"><input class="i13" type="text" name="city" maxlength="25" size="25"/></td>
			</tr>


			<tr><td class="label">province/state:</td><td class="field"><input class="i2" type="text" name="prov" maxlength="2" size="2" value="QC" /></td></tr>
			<tr><td class="label">postal code:</td><td class="field"><input class="i5" type="text" name="post" maxlength="7" size="7" style="text-transform: uppercase;" /></td></tr>
			<tr><td class="label">email:</td><td class="field"><input class="i25" type="text" name="email" maxlength="45" size="10" /></td></tr>

			<tr>
				<td class="label">home phone:</td>
				<td class="field"><input class="i2" type="text" name="phone1" maxlength="3" size="3"  value="514" />
				<input class="i7" type="text" name="phone2" maxlength="10" size="10" /></td>
			</tr>

			<tr>
				<td class="label">secondary phone:</td>
				<td class="field"><input class="i2" type="text" name="phoneb1" maxlength="3" size="3"  value="514" />
				<input class="i7" type="text" name="phoneb2" maxlength="10" size="10" /></td>
			</tr>
		</table>

		<div class="snd" style="clear:both;"><input id="subB" type="submit" value="Continue &raquo;" /></div>
	</div>

<?php } ?>

<?php function ccForm() {
	ccWarning();
	ccBaseForm();
} ?>


