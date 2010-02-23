<style>
<!--
.hide { position:absolute; visibility:hidden; }
.show { position:absolute; visibility:visible; }
-->
</style>

<SCRIPT LANGUAGE="JavaScript">

//Progress Bar script- by Todd King (tking@igpp.ucla.edu)
//Modified by JavaScript Kit for NS6, ability to specify duration
//Visit JavaScript Kit (http://javascriptkit.com) for script

var duration=8 // Specify duration of progress bar in seconds
var _progressWidth = 50;	// Display width of progress bar.

var _progressBar = "|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||"
var _progressEnd = 5;
var _progressAt = 0;


// Create and display the progress dialog.
// end: The number of steps to completion
function ProgressCreate(end) {
	// Initialize state variables
	_progressEnd = end;
	_progressAt = 0;

	// Move layer to center of window to show
	if (document.all) {	// Internet Explorer
		progress.className = 'show';
		progress.style.left = (document.body.clientWidth/2) - (progress.offsetWidth/2);
		progress.style.top = document.body.scrollTop+(document.body.clientHeight/2) - (progress.offsetHeight/2);
	} else if (document.layers) {	// Netscape
		document.progress.visibility = true;
		document.progress.left = (window.innerWidth/2) - 100+"px";
		document.progress.top = pageYOffset+(window.innerHeight/2) - 40+"px";
	} else if (document.getElementById) {	// Netscape 6+
		document.getElementById("progress").className = 'show';
		document.getElementById("progress").style.left = (window.innerWidth/2)- 90+"px";
		document.getElementById("progress").style.top = 200+"px";
	}

	ProgressUpdate();	// Initialize bar
}

// Hide the progress layer
function ProgressDestroy() {
	// Move off screen to hide
	if (document.all) {	// Internet Explorer
		progress.className = 'hide';
	} else if (document.layers) {	// Netscape
		document.progress.visibility = false;
	} else if (document.getElementById) {	// Netscape 6+
		document.getElementById("progress").className = 'hide';
	}
}

// Increment the progress dialog one step
function ProgressStepIt() {
	_progressAt++;
	if(_progressAt > _progressEnd) _progressAt = _progressAt % _progressEnd;
	ProgressUpdate();
}

// Update the progress dialog with the current state
function ProgressUpdate() {
	var n = (_progressWidth / _progressEnd) * _progressAt;
	if (document.all) {	// Internet Explorer
		var bar = dialog.bar;
 	} else if (document.layers) {	// Netscape
		var bar = document.layers["progress"].document.forms["dialog"].bar;
		n = n * 0.55;	// characters are larger
	} else if (document.getElementById){
                var bar=document.getElementById("bar")
        }
	var temp = _progressBar.substring(0, n);
	bar.value = temp;
}

// Demonstrate a use of the progress dialog.
function Demo() {
	ProgressCreate(10);
	window.setTimeout("Click()", 100);
}

function Click() {
	if(_progressAt >= _progressEnd) {
		ProgressDestroy();
		return;
	}
	ProgressStepIt();
	window.setTimeout("Click()", (duration-1)*1000/10);
}

function CallJS(jsStr) { //v2.0
  return eval(jsStr)
}

</script>

<SCRIPT LANGUAGE="JavaScript">

// Create layer for progress dialog
document.write("<span id=\"progress\" class=\"hide\">");
	document.write("<FORM name=dialog id=dialog>");
	document.write("<TABLE border=2  bgcolor=\"#FFFFCC\">");
	document.write("<TR><TD ALIGN=\"center\">");
	document.write("<?php echo $lang['progress']; ?><BR>");
	document.write("<input type=text name=\"bar\" id=\"bar\" size=\"" + _progressWidth/2 + "\"");
	if(document.all||document.getElementById) 	// Microsoft, NS6
		document.write(" bar.style=\"color:navy;\">");
	else	// Netscape
		document.write(">");
	document.write("</TD></TR>");
	document.write("</TABLE>");
	document.write("</FORM>");
document.write("</span>");
ProgressDestroy();	// Hides

</script>

<table cellspacing="0" cellpadding="0" border="0" align="middle" class="content" width="550px">
<tr>
<th width="275px"><?php echo ($lang['upload']); ?></th>
<th width="275px"><?php echo ($lang['erase']); ?></th>
</tr>

<tr>
<td valign="top" style="padding: 4px;" <?php if ($type == "upload"): ?> rowspan="2" <?php endif; ?>>
<?php if ($type != "upload"): ?>
	<?php echo($lang['upload_txt']); ?>
<?php else: ?>
	<h3><?php echo ($lang["uploadsuccess"]); ?></h3><?php echo($lang["upload_erase_log_txt"]); ?>
<?php endif; ?>
<br /><br />
</td>
<td style="border-left:none; padding: 4px;" valign="top" <?php if ($type == "erase"): ?> rowspan="2" <?php endif; ?>>
<?php if ($type != "erase"): ?>
	<?php echo($lang['erase_txt']); ?>
<?php else: ?>
	<h3><?php echo ($lang["erasesuccess"]); ?></h3><?php echo($lang["upload_erase_log_txt"]); ?>
<?php endif; ?>
<br /><br />
</td>
</tr>

<tr>
<?php if ($type != "upload"): ?>
<td align="center" style="padding: 4px;">
<form name="upload" method="post" action="<?php echo($_SERVER['PHP_SELF']); ?>?action=upload">
<input type="submit" value="<?php echo($lang['upload']); ?>" onclick="CallJS('Demo()')" />
</form>
</td>
<?php endif; ?>
<?php if ($type != "erase"): ?>
<td align="center" style="border-left:none; padding: 4px;">
<form name="erase" method="post" action="<?php echo($_SERVER['PHP_SELF']); ?>?action=erase">
<input type="submit" value="<?php echo($lang['erase']); ?>" onclick="CallJS('Demo()')" />
</form>
</td>
<?php endif; ?>
</tr>

<tr><td align="center" colspan="2" style="font-size: 9px; font-style: italic;"><?php echo($lang['upload_erase_txt']); ?></td></tr>
</table>

<div id="log" style="display:none">
<table cellspacing="0" cellpadding="0" border="0" align="middle" class="content">
<tr><th><?php echo ($lang['log']); ?></th></tr>

<tr><td>

<?php 
if (isset($out) && is_array($out)):
foreach ($out as $line): 
if (substr($line, 0, 5) == "....."):
$line = "################################################################";
endif; ?>
<?php echo trim($line); ?><br />
<?php endforeach; ?>
<?php endif; ?>

</td></tr>
</table>
</div>
