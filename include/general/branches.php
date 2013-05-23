<!-- This is some stupid div clutter to render two images of branches just beneath the dropdown panel --!>

<?php
if(!isset($panel)){
$panel=array();
$panel['showbranches'] = TRUE;
}
if($panel['showbranches']){
if($panel['bstyle'] == "light") {
?>

<div class="w8">
	<div id="ul">&nbsp;
	</div>
	<div id="ur"><img src="theme/default/branche.gif" width="179" height="64" border="0" alt="" />
	</div>
</div>

<?php
} else {
?>

<div class="w8">
	<div id="ul"><img src="theme/default/p1/brnch1.gif" width="345" 
		height="111" border="0" alt="" / align="left">
	</div>
	<div id="ur">
		<img src="theme/default/p1/brnch2.gif" width="184" height="72" border="0" alt="" />
	</div>
</div>

<?php
	}
}

?>
