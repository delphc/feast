<!-- start of new cc3--!>
<?php	
		//keep passing along our member's ID number
		$pass_mid = $_POST['pass_mid'];

		//prepare certain variables
		if ($_POST['lang'] == "other")
			$lang1 = $_POST['lang_oth'];
		else
			$lang1 = $_POST['lang'];
		if ($_POST['bdayy'] >= 1900)
			$bdayCl = $_POST['bdayy'] . "-" . $_POST['bdaym'] . "-" . $_POST['bdayd'];
		else
			$bdayCl = '0000-00-00';

		$query = "INSERT INTO client
			(mid,mlang,clang,gender,cdif_exd,cdif_hoh,bday)";

		$query .= " VALUES ('" . 
			$pass_mid . "','" . 
			$lang1 . "','" . 
			$_POST['clang'] .  "','" . 
			$_POST['gender'] . "','" . 
			$_POST['cdiff1'] . "','" . 
			$_POST['cdiff2'] . "','" . 
			$bdayCl . "')";

		//Add the info from the last page to the client database
		mysql_query($query);//  or echo(mysql_error());

?>

<?php function ccComment() { ?>
Next, we'll enter information about the	referral.
<?php } ?>

<?php function ccForm() { ?>

<?php $pass_mid = $_POST['pass_mid']; ?>

<form name="mowcreate" action="?do=new&cc=4" method="post">
	<div class="gtle">Why was the client referred?</div>
	<table class="inpt">
		<tr>
			<td style="padding-left:10px;width:185px;">
				<input type="checkbox" name="rref1" value="1">Loss of Autonomy<br />
				<input type="checkbox" name="rref2" value="1">Social Isolation<br />
				<input type="checkbox" name="rref3" value="1">Financial Difficulty<br />
				<input type="checkbox" name="rref4" value="1">Malnutrition<br />
				<input type="checkbox" name="rref5" value="1">Cognitive Problems<br />
				<input type="checkbox" name="rref6" value="1">Reduced Mobility<br />
				<input type="checkbox" name="rref7" value="1">Visually Impaired<br />
				<input type="checkbox" name="rref8" value="1">Lives Alone<br />
			</td>

			<td><textarea rows="3" cols="20" style="height:160px;width:280px;" name="rNotes"></textarea>
				<br /><br />
			</td>
		</tr>
	</table>

	<div class="gtle">Are there an IMPORTANT alerts for this client?</div>
	<div style="padding-left:50px;clear:both;">

		<div id="rAlert" style="display:none;width:370px;float:right;">
			<textarea rows="3" cols="2" style="height:40px;width:260px;" name="rAlertMsg"></textarea><br />
		</div>
		<input onClick="enableSub('rAlert','hide')" type="radio" value="no" name="rAlert" checked="checked" />No<br />
		<input onClick="enableSub('rAlert','unhide')" type="radio" value="YES" name="rAlert" />Yes

	</div>

	<div class="snd" style="clear:both;">
		<input type="hidden" name="pass_mid" value="<?php echo $pass_mid; ?>">
		<input type="submit" value="Continue &raquo;" />
	</div>
</form>
<?php } ?>
