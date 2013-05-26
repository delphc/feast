<?php
include '../include/lib/functions.php';

//easily change important vars (list them here)
$bcurateur_address = "600 Boul. René Lévesque Ouest, ";
$bcurateur_address2 = "étage";
$bcurateur_address3 = "Montréal, Québec  H3B 4W9";
$bbluecross_sal = "National Provider Center";
$bbluecross_address = "Provider Reimbursement Claims<br />C.P. 6200<br />STANLCD1<br />Moncton, NB  E1C 8R2";
$bprovider = "SR 20922";

?>

<!-- Beginning of cstartnewentry1.php --!>

<?php
if (! isset($_GET['cc'])) {
	include "../include/client/cnew1.php";
} else { 
	//calculate progress in creation of new client
	$cprg = $_GET['cc'];

	if  ($cprg == 1) {
		include "../include/client/new/cc1.php";
	} elseif ($cprg == 2) { 
		include "../include/client/new/cc2.php";
	}
	elseif ($cprg == 3) {
		include "../include/client/new/cc3.php";
	} elseif ($cprg == 4) {
		include "../include/client/new/cc4.php";
	} elseif ($cprg == 5) {
		include "../include/client/new/cc5.php";
	} elseif ($cprg == 6) {
		include "../include/client/new/cc6.php";
	} elseif ($cprg == 7) {
		include "../include/client/new/cc7.php";
	} elseif ($cprg == 8) {
		include "../include/client/new/cc8.php";
	} elseif ($cprg == 9) {
		include "../include/client/new/cc9.php";
	} elseif ($cprg == 10) {
		include "../include/client/new/cc10.php";
	} elseif ($cprg == 11) { 
		include "../include/client/new/cc11.php";
	} elseif ($cprg =="done") {
		include "../include/client/new/ccdone.php";
	} 
}

?>
<div id="fn" class="w8">

	<table width="100%" border="0" cellpadding="0" cellspacing="0">

		<tr id="ft">
			<td style="width: 300px; border-top: 1px solid #000;"></td>
			<td class="mc"></td>
		</tr>

		<tr id="sr">
			<td class="ll" style="font-size:13px;padding:0 25px; float:right; width:210px;color:#BBBBBB;">
				<!-- Instruction section of CNEW's --!>
				<?php ccComment(); ?>

			</td>

			<th class="gd" rowspan="2" colspan="2">
				<div id="nf">
				<!-- Form section of CNEW's --!>
				<?php ccForm(); ?>
				</div>
			</th>
		</tr>

		<tr>

			<td rowspan="2"><img src="theme/default/p1/apl.gif" width="138" height="150" border="0" alt="FeastDB" /></td>

		</tr>

	</table>

</div>


</div></div></div>
</center>
</body>
</html>
