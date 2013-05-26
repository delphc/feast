<!-- start of cc4.php --!>
<?php
		$pass_mid = $_POST['pass_mid'];
		//prepare certain variables
		if ($_POST['rAlert'] == "YES") 
			$rAlert = 1;
		else
			$rAlert = 0;
		$query = "UPDATE client SET rfref_loa='" . $_POST['rref1'] . "', rfref_iso='" . $_POST['rref2'] . "', rfref_fin='" . $_POST['rref3'];
		$query .= "', rfref_nut='" . $_POST['rref4'] . "', rfref_cog='" . $_POST['rref5'] . "', rfref_mob='" . $_POST['rref6'] . "', rfref_vis='";
		$query .= $_POST['rref7'] . "', rfref_aln='" . $_POST['rref8'] . "', rNotes='" . mysql_real_escape_string($_POST['rNotes']) . "', alert='" . $rAlert;
		$query .= "', alertmsg='" . mysql_real_escape_string($_POST['rAlertMsg']) . "' WHERE mid='" . $pass_mid . "'";


		//Add the info from the last page to the client database
		mysql_query($query); //  or echo(mysql_error());

?>

<?php function ccComment() { ?>
Alright. Next, we'll setup meal delivery.
<?php } ?>

<?php function ccForm() { ?>

<?php $pass_mid = $_POST['pass_mid']; ?>

<form name="mowcreate" action="?do=new&cc=5" method="post">
	<div class="gtle">Will the client have meals delivered on schedule? 
		<span style="font-size:10px">(Ongoing Delivery)</span>
	</div>
	<div class="cntr4">
		<select style="width:100px;margin-right:2px" name="dtype" id="EpiReg" onChange="dropdnChk('EpiReg','reg','rDays')">
			<option value="reg">Yes (Ongoing)</option>
			<option value="epi">No  (Episodic)</option>
		</select>
	</div>
	<div id="rDays">
		<div class="gtle">On what days should the client receive meals?</div>
		<div style="padding:0 0 10px 50px;">
			<input type="checkbox" name="dlvMon" value="1">Monday<br />
			<input type="checkbox" name="dlvTue" value="1">Tuesday<br />
			<input type="checkbox" name="dlvWed" value="1">Wednesday<br />
			<!-- <input type="checkbox" name="dlvMon" value="1">Thursday ?><br /> --!>
			<input type="checkbox" name="dlvFri" value="1">Friday<br />
			<input type="checkbox" name="dlvSat" value="1">Saturday
		</div>
	</div>
	<div class="gtle">When should the client start receiving meals?</div>
	<div class="cntr4">
		<select style="width:31px;margin-right:2px" name="mdayd">
			<option value="01">1</option>
			<option value="02">2</option>
			<option value="03">3</option>
			<option value="04">4</option>
			<option value="05">5</option>
			<option value="06">6</option>
			<option value="07">7</option>
			<option value="08">8</option>
			<option value="09">9</option>
			<option>10</option>
			<option>11</option>
			<option>12</option>
			<option>13</option>
			<option>14</option>
			<option>15</option>
			<option>16</option>
			<option>17</option>
			<option>18</option>
			<option>19</option>
			<option>20</option>
			<option>21</option>
			<option>22</option>
			<option>23</option>
			<option>24</option>
			<option>25</option>
			<option>26</option>
			<option>27</option>
			<option>28</option>
			<option>29</option>
			<option>30</option>
			<option>31</option>
		</select>
		<select style="width:45px;margin-right:2px" name="mdaym">
			<option value="01">Jan</option>
			<option value="02">Feb</option>
			<option value="03" >Mar</option>
			<option value="04" >Apr</option>

			<option value="05" >May</option>
			<option value="06">Jun</option>
			<option value="07" >Jul</option>
			<option value="08" >Aug</option>

			<option value="09" >Sep</option>
			<option value="10">Oct</option>
			<option value="11" >Nov</option>
			<option value="12" >Dec</option>
		</select> 
		<label>year: </label><input class="i3" type="text" name="mdayy" maxlength="4" size="4" value="<?php echo date('Y'); ?>"/>
	</div>
	<div class="snd">
		<input type="hidden" name="pass_mid" value="<?php echo $pass_mid; ?>">
		<input type="submit" value="Continue &raquo;" />
	</div>
</form>
<?php } ?>

