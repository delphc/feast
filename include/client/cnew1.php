<!-- cnew1.php is the page for adding a new client --!>

<div id="fn" class="w8">

	<table width="100%" border="0" cellpadding="0" cellspacing="0">

		<tr id="ft">
			<td class="ll"></td>
			<td class="ml"></td>
			<td class="mc"></td>
		</tr>

		<tr id="sr">
			<td class="ll">

				<!-- Instruction section of cnew --!>
				<div style="font-size:13px;padding:0 25px; float:right; width:200px;color:#BBBBBB;">
					Let's create a new client.<br />
					We'll start with the client's name.
				</div>
			</td>

			<th class="gd" rowspan="2" colspan="2">
				<div id="nf">

					<!-- Form section of cnew process. --!>
					<div class="gtle">What is the client's name?</div>

					<form name="mowcreate" action="?do=new&cc=1" method="post">
						<div style="height:100px;width:350px;padding-top:40px;clear:both;text-align:right;">
							first name: <input class="i16" type="text" name="fname" maxlength="20" size="10" id="firstName" /> <br/>
							last name: <input class="i16" type="text" name="lname" id="lastName" maxlength="20" size="10" />
						</div>

						<div class="snd">
							<input type="submit" value="Start &raquo;" />
						</div>
					</form>

				</div>
			</th>
		</tr>

		<tr>

			<td rowspan="2"><img src="theme/default/p1/apl.gif" width="138" height="150" border="0" alt="FeastDB" /></td>

		</tr>

	</table>

</div>

<!-- end of cnew1.php --!>
