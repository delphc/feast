<?php

		//keep passing along our member's ID number
		$pass_mid = $_POST['pass_mid'];

		//update stop number for each client
		for ($i = 1; $i <= $_POST['noStops']; $i++) {
			$query = "UPDATE client SET dStop='" . $_POST['or_stp' . $i] . "' WHERE mid='" . $_POST['or_mid' . $i] . "'";
			//line for debugging
			//echo $_POST['or_stp' . $i] . "-$i" . $_POST['or_mid' . $i] . "<br />";
			mysql_query($query);//  or echo(mysql_error());
		}

?>

<?php function ccComment() { ?>
Next, we'll enter meal restrictions and preferences.
<?php } ?>

<?php function ccForm() { ?>
<?php $pass_mid = $_POST['pass_mid']; ?>

<form name="mowcreate" action="?do=new&cc=8" method="post">

	<div class="gtle">What size of meal will the client normally want?</div>

	<div style="padding:0 0 0 85px;">
		<div style="width:120px;float:left;">
			<input type="radio" name="dportion" value="H" />half<br />
			<input type="radio" name="dportion" value="R" checked="checked" />regular
		</div>
		<div style="width:120px;float:left;">
			<input type="radio" name="dportion" value="L" />large<br />
			<input type="radio" name="dportion" value="D" />double
		</div>
	</div>

	<div class="gtle" style="clear:both;">What special preparations need to be done for this client?</div>
	<div style="padding:0 0 10px 85px">
		<div style="width:120px;float:left;">
			<input type="checkbox" name="dietr_pr1" value="1" id="pr1" onClick="addText('label', 'cut up food','pr1')" />Cut Up<br />
			<input type="checkbox" name="dietr_pr2" value="1" id="pr2" onClick="addText('label', 'puree','pr2')" />Puree</div>
		<div style="width:120px;float:left;">
			<input type="checkbox" name="dietr_pr3" value="1" id="pr3" onClick="addText('label', 'date','pr3')" />Print Date<br />
		</div>
	</div>

	<div class="gtle" style="clear:both;">What ingredient restrictions does the client have?</div>
	<div style="padding:0 0 10px 60px">

		<table cellspacing="0" style="border:1px solid #456F06;width:80%;padding:4px;margin:2px;clear:both;">
			<tr>
				<td>
					<input type="checkbox" name="dietr_i1" id="di1" value="1" onClick="addText('label', 'no salt','di1')" />salt<br />
					<input type="checkbox" name="dietr_i2" value="1" id="di2" onClick="addText('label', 'no spicy','di2')" />spicy<br />
					<input type="checkbox" name="dietr_i3" value="1" id="di3" onClick="addText('label', 'no chocolate','di3')" />chocolate<br />
					<input type="checkbox" name="dietr_i4" value="1" id="di4" onClick="addText('label', 'no dairy','di4')" />dairy<br />
					<input type="checkbox" name="dietr_i5" value="1" id="di5" onClick="addText('label', 'no lactose','di5')" />lactose<br />
					<input type="checkbox" name="dietr_i6" value="1" id="di6" onClick="addText('label', 'no MSG','di6')" />MSG<br />
					<input type="checkbox" name="dietr_i7" value="1" id="di7" onClick="addText('label', 'no rice','di7')" />rice<br />
					<input type="checkbox" name="dietr_i8" value="1" id="di8" onClick="addText('label', 'no potato','di8')" />potato<br />
				</td>
				<td style="vertical-align:top;">
					<input type="checkbox" name="dietr_i9" value="1" id="di9" onClick="addText('label', 'no nuts','di9')" />nuts<br />
					<input type="checkbox" name="dietr_i10" value="1" id="di10" onClick="addText('label', 'no pasta','di10')" />pasta<br />
					<input type="checkbox" name="dietr_i11" value="1" id="di11" onClick="addText('label', 'no poultry','di11')" />poultry<br />
					<input type="checkbox" name="dietr_i12" value="1" id="di12" onClick="addText('label', 'no ham','di12')" />ham<br />
					<input type="checkbox" name="dietr_i13" value="1" id="di13" onClick="addText('label', 'no pork','di13')" />pork<br />
					<input type="checkbox" name="dietr_i14" value="1" id="di14" onClick="addText('label', 'no beef','di14')" />beef<br />
					<input type="checkbox" name="dietr_i15" value="1" id="di15" onClick="addText('label', 'no veal','di15')" />veal<br />
					<input type="checkbox" name="dietr_i16" value="1" id="di16" onClick="addText('label', 'no fish','di16')" />fish<br />
		</td></tr></table>
	</div>
	<div class="gtle" style="clear:both;">What special restrictions does the client have?</div>
	<div 
		style="padding:0 0 10px 60px">
		<table cellspacing="0" style="border:1px solid #456F06;width:80%;padding:4px;margin:2px;">
			<tr>
				<td style="vertical-align:top;">
					<input type="checkbox" name="dDiabetic" value="1" id="ds1" onClick="addText('label', 'Diabetic','ds1')" />diabetic<br />
					<input type="checkbox" name="dAllergy" value="1" id="ds2" onClick="addText('label', 'ALLERGY:','ds2')" />allergy<br />
					<input type="checkbox" name="dGluten" value="1" id="ds3" onClick="addText('label', 'gluten','ds3')" />gluten intolerent<br />
		</td></tr></table>
	</div>
	<div class="gtle" style="clear:both;">Does the client have any restrictions not categorized above?</div>
	<div class="cntr4">
		<input type="checkbox" name="dDiv" value="1" id="dDiv" /> Yes (specialized label will always be printed)
	</div>

	<div class="gtle" style="clear:both;">Verify and add any remaining specifications for the label.</div>
	<div class="cntr4"><textarea rows="3" cols="20" style="height:70px;width:280px;" name="dLabel" id="label"></textarea><br />
	</div>
	<div class="snd">
		<input type="hidden" name="pass_mid" value="<?php echo $pass_mid; ?>" />
		<input type="submit" value="Continue &raquo;" />
	</div>
</form>
<?php } ?>
