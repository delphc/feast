<!-- search-nav.php is the upper part of the welcome page. Includes client name search bar and common link list. --!>

<div id="fn" class="w8">
	<form autocomplete="off" name="mowquery">
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
			<tr style="height:20px">
				<td class="ll" colspan="3">
					&nbsp;</td>

				<td class="rr" rowspan="3">
					<ul style="list-style: none;">
						<li>&nbsp;&nbsp;&nbsp;<a href="client.php?do=new">add new client</a></li>
						<li>&nbsp;&nbsp;&nbsp;<a href="reports.php">generate reports</a></li>
						<li>&nbsp;&nbsp;&nbsp;<a href="search.php">special database search</a></li>
					</ul>
				</td>
			</tr>

			<tr id="sr">

				<td>
					&nbsp;</td>
				<td class="rt">
					<img src="theme/default/p1/sr_nd.gif" width="21" height="18" border="0" alt="" />
				</td>
				<td id="sf">
					<div style="width:248px;height:18px;">
						<input type="text" id="mq_sr" name="mquery" size="10"  onkeyup="javascript:autosuggest()"/>
						<div id="mq_ac">
					</div></div>
				</td>

			</tr>

			<tr>
				<td>
					<img src="theme/default/p1/apup.gif" width="161" height="74" border="0" alt="" />
				</td>
				<td valign="top">
					&nbsp;</td>
				<td class="rt">
					<img src="theme/default/p1/fdbgr.gif" width="110" height="44" border="0" alt="" />
				</td>
			</tr>

		</table>
	</form>
</div>
