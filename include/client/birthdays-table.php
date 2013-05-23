<!-- This is a table summarizing the client birthdays for the week. --!>
<div id="ct">
		<table width="100%" border="0" cellpadding="0" cellspacing="0" style="clear:left">
			<tr>
				<td id="bp">&nbsp;</td>
				<td id="cp">
					<?php
					$boutput = "This week's birthdays:<br />";
					$currentDay = date('d');
					//$currentDay = "13";
					$currentMonth = date('m');
					//$currentMonth="4";
					$gnobdays = 0;
					for ($i = 0; $i <= 6; $i++) {
						include '/var/www/feastdb/include/config/mysql_login.php';
						mysql_connect("localhost", $mysqluser, $mysqlpass);
						mysql_select_db("mowdata");
						$query = "SELECT * FROM client WHERE (mealstatus='A' or mealstatus='S') AND bday LIKE '%" . 
							$currentMonth . "-" . $currentDay . "'";
						$result = mysql_query($query);
						//date w-day of the week
						// store the record of the "example" table into $row
						//$row = mysql_fetch_array( $result );
						// Print out the contents of the entry
						$temp = mktime(0, 0, 0, $currentMonth, $currentDay, date('Y'));
						//setlocale(LC_TIME, "fr_FR");
						//echo strftime("%A %e %B",$temp);

						$nobdays = 0;
						$bdays=array();
						while($row = mysql_fetch_array( $result )) {
							$bdays[$nobdays] = $row['mid'];
							$nobdays++;
							$gnobdays++;
						}
						if ($nobdays > 0) {
							setlocale(LC_TIME, "C");
							$boutput .= strftime("%A %e %B",$temp) . "</br>";
						}
						for ($j = 0;$j<$nobdays;$j++) {
							$query = "SELECT * FROM member WHERE mid = '" . $bdays[$j] . "'";
							$result = mysql_query($query);
							$row = mysql_fetch_array( $result );
							$boutput .= "&nbsp;&nbsp;<b>" . $row['first_name'] . " " .  
								$row['last_name'] . "</b><br />";
						}
						$currentDay ++;
					}
					if ($gnobdays == 0)
						$boutput = $l_nocbday;
					echo $boutput;
					?>
		</td></tr></table><br />
</div>
