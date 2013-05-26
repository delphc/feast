<!-- start of new cc8--!>
<?php
		//keep passing along our member's ID number
		$pass_mid = $_POST['pass_mid'];

		//prepare certain variables
		$diDairy = 0;
		if ($_POST['dietr_i4'] == "1")
			$diDairy = 1;
		if ($_POST['dietr_i5'] == "1")
			$diDairy = 1;

		//prepare query 
		$query = "UPDATE client SET mPortion='" . $_POST['dportion'] . "', mMealmod_cut='" . $_POST['dietr_pr1'] . "', mMealmod_dat='" . $_POST['dietr_pr3'] . "', ";
		$query .= "mMealmod_pur='" . $_POST['dietr_pr2'] . "', mMealallergy='" . $_POST['dAllergy'] . "', mMealdiabete='" . $_POST['dDiabetic'] . "', mDiet_salt='" . $_POST['dietr_i1'] . "', ";
		$query .= "mDiet_milk='" . $diDairy . "', mDiet_fish='" . $_POST['dietr_i16'] . "', mDiet_ham='" . $_POST['dietr_i12'] . "', mDiet_poul='" . $_POST['dietr_i11'] . "', ";
		$query .= "mDiet_beef='" . $_POST['dietr_i14'] . "', mDiet_pork='" . $_POST['dietr_i13'] . "', mDiet_veal='" . $_POST['dietr_i15'] . "', mDiet_spicy='" . $_POST['dietr_i2'] . "', ";
		$query .= "mDiet_nuts='" . $_POST['dietr_i9'] . "',  mDiet_choc='" . $_POST['dietr_i3'] . "', mDiet_rice='" . $_POST['dietr_i7'] . "', mDiet_ptat='" . $_POST['dietr_i8'] . "', mDiet_past='" . $_POST['dietr_i10'] . "', ";
		$query .= "mDiet_msg='" . $_POST['dietr_i6'] . "', mDiet_glut='" . $_POST['dGluten'] . "', mDiet_div='" . $_POST['dDiv'] . "', mLabel='" . $_POST['dLabel'] . "'  WHERE mid='" . $pass_mid . "'";

		//Add the info from the last page to the client database
		mysql_query($query);//  or echo(mysql_error());

?>

<?php function ccComment() { ?>
Now, setup the selected meal options and side dishes.
<?php } ?>

<?php function ccForm() { ?>
<?php $pass_mid = $_POST['pass_mid']; ?>
<form name="mowcreate" action="?do=new&cc=9" method="post">
	<div class="gtle">
		<table class="inpt">
			<tr>
				<td>How many meals (by default) should be delivered?</td>
				<td style="width:135px"><select style="width:35px;margin-right:2px" name="nmeals">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
			</select></td></tr>
			<tr>
				<td>How many fruit salads?</td>     
				<td><select style="width:35px;margin-right:2px" name="nsf">
						<option>0</option>
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
			</select></td></tr>
			<tr>
				<td>How many green salads?</td>
				<td><select style="width:35px;margin-right:2px" name="ngs">
						<option>0</option>
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
			</select></td></tr>
			<tr>
				<td>How many deserts?</td>
				<td><select style="width:35px;margin-right:2px" name="nds">
						<option>0</option>
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
			</select></td></tr>
			<tr>
				<td>How many diabetic deserts?</td>
				<td><select style="width:35px;margin-right:2px" name="ndd">
						<option>0</option>
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
			</select></td></tr>
			<tr>
				<td>How many puddings?</td>
				<td><select style="width:35px;margin-right:2px" name="npd">
						<option>0</option>
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
			</select></td></tr>
			<tr>
				<td>Should the client receive the Gazette?</td>
				<td><select style="width:45px;margin-right:2px" name="ngz">
						<option value="0">no</option>
						<option value="1">yes</option>
			</select></td></tr>
			<tr>
				<td>Does the client receive vegetable baskets?</td>
				<td><select style="width:45px;margin-right:2px" name="nvb">
						<option value="0">no</option>
						<option value="1">yes</option>
			</select></td></tr>
		</table>
	</div>
	<div class="snd">
		<input type="hidden" name="pass_mid" value="<?php echo $pass_mid; ?>" />
		<input type="submit" value="Continue &raquo;" />
	</div>
</form>
<?php } ?>
