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
//
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
																																																																							</div>
																																																																							<div class="fbt">

																																																																						<a href="http://www.fireboytech.com"></a></div>
																																																																	</div></div></div></center></body></html>
