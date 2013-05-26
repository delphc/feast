<!-- cnew1.php is the page for adding a new client --!>

<?php function ccComment() { ?>
	Let's create a new client.<br />
	We'll start with the client's name.
<?php } ?>

<!-- Form section of cnew process. --!>
<?php function ccForm() { ?>
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
<?php } ?>


