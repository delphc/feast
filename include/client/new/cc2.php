<!-- start of cc2.php --!>
<?php
			//setup database entry info
			if (isset($_POST['email']))
				$psemail = mysql_real_escape_string($_POST['email']);
			else
				$psemail = "";
			$cPhoneA = mysql_real_escape_string($_POST['phone1']) . str_replace("-","",mysql_real_escape_string($_POST['phone2']));
			$cPhoneB = mysql_real_escape_string($_POST['phoneb1']) . str_replace("-","",mysql_real_escape_string($_POST['phoneb2']));
			$query = "INSERT INTO member (first_name,m_name,last_name,address1,address2,city,prov,post,phone,phoneb,email,mvol,mclient) ";
			$query .= " VALUES ('" . convertFrench($_POST['f_name']) . "','" . convertFrench($_POST['m_name']) . "','" . convertFrench($_POST['l_name']) . "','" . mysql_real_escape_string($_POST['add1']) . "','" .  mysql_real_escape_string($_POST['add2']) . "','" . mysql_real_escape_string($_POST['city']) . "','" . mysql_real_escape_string($_POST['prov']) . "','" . mysql_real_escape_string(strtoupper($_POST['post'])) . "','";
			$query .= $cPhoneA . "','" . $cPhoneB . "','" . $psemail . "',0,1)";

			//Add the client to member database
			mysql_query($query) or die(mysql_error());

			//and then get the Member ID
			$query = "SELECT MAX(mid) AS mid FROM mowdata.member";
			$result = mysql_query($query) or die(mysql_error());
			$midCl ="";
			$row = mysql_fetch_array($result);

			$midCl = $row['mid'] ;
			//if there are other people with the same name, we'll get the last entry, which should be ours

?>
						<div id="fn" class="w8">
							<form name="mowcreate" action="?do=new&cc=3" method="post">
								<table width="100%" border="0" cellpadding="0"
									cellspacing="0">

									<tr id="ft">

										<td class="ll"> </td>

										<td class="ml"> </td>

										<td class="mc"> </td>

										<td class="rr"> </td>
									</tr>
									<tr id="sr">

										<td class="ll">
											<div style="font-size:13px;padding:0 25px; float:right; width:200px;color:#BBBBBB;">Next, let's enter information that 
												may be useful when contacting the client.<br />&nbsp;</div></td>

										<td class="gr"><img src="theme/default/p1/arw.gif" width="7" height="15" border="0" alt="" /></td>
										<th class="gd" rowspan="2" colspan="2">
											<div id="nf"><div class="gtle">What is the client's first language?</div><div class="cntr4">
													<select style="width:100px;margin-right:2px" name="lang" id="lang" onChange="en_lang()">

														<option value="EN">English</option>

														<option value="FR" >French</option>

														<option value="ES" >Spanish</option>

														<option value="DE" >German</option>

														<option value="PG" >Portuguese</option>

														<option value="JP" >Japanese</option>

														<option value="RS" >Russian</option>

														<option value="other" >other...</option>
												</select></div>
												<div class="gtle">What language should be used for correspondance?</div><div class="cntr4"><select 
														style="width:100px;margin-right:2px" name="clang">

														<option value="EN">English</option>

														<option value="FR" >French</option>

														<option value="EF" >Either</option>
												</select></div>
												<div class="gtle">What is the client's gender?</div><div class="cntr4">
													<select style="width:80px;margin-right:2px" name="gender">

														<option value="M" >Male</option>

														<option value="F" >Female</option>

														<option value="O" >Other</option>
												</select></div>
												<div class="gtle">When is the client's birthday?</div><div class="cntr4">
													<select style="width:31px;margin-right:2px" name="bdayd">

														<option value="01">1</option><option value="02">2</option><option value="03">3</option><option value="04">4</option><option value="05">5</option><option value="06">6</option><option value="07">7</option><option value="08">8</option><option value="09">9</option>

														<option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option>

														<option>20</option><option>21</option><option>22</option><option>23</option><option>24</option><option>25</option><option>26</option><option>27</option><option>28</option><option>29</option>

														<option>30</option><option>31</option>
													</select>
													<select style="width:45px;margin-right:2px" name="bdaym">

														<option value="01">Jan</option><option value="02">Feb</option><option value="03" >Mar</option><option value="04" >Apr</option>

														<option value="05" >May</option><option value="06">Jun</option><option value="07" >Jul</option><option value="08" >Aug</option>

														<option value="09" >Sep</option><option value="10">Oct</option><option value="11" >Nov</option><option value="12" >Dec</option>
													</select> year: <input class="i3" type="text" name="bdayy" maxlength="4" size="4" />
												</div>
												<div 
													class="gtle">Is there anything that could 
													hinder correspondance?</div>
												<div style="padding:4px 0 9px 120px;"><div
														style="text-align:left;"><input	type="checkbox" name="cdiff1" value="1">Expressive Difficulty<br/><input type="checkbox" name="cdiff2" 
														value="1">Hard of Hearing</div>
											</div></div>
											<div class="snd"><input type="hidden" name="pass_mid" value="<?php echo $midCl; ?>"><input type="submit" value="Continue &raquo;" /></div><?php
		} 

?>
