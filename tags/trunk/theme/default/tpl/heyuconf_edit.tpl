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

var duration=4 // Specify duration of progress bar in seconds
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
		document.getElementById("progress").style.left = (window.innerWidth/2)- 100+"px";
		document.getElementById("progress").style.top = pageYOffset+(window.innerHeight/2) - 40+"px";
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
	document.write("Heyu restart progress<BR>");
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

<form action="<?php echo($_SERVER['PHP_SELF']); ?>?action=save" method="post">

<table cellspacing="0" cellpadding="0" border="0" width="400px" align="middle" class="content">
<tr><th colspan="3"><?php echo ($lang['heyuconf']);?></th></tr>

<tr>
<td align="center" colspan="3">

<!-- start -->

<table border="0" cellspacing="0" cellpadding="0" class="clear">
<?php $act = 0; $sct = 0; $usct = 0; // alias, scene and usersyn counts for posts ?>
<?php foreach($settings as $setting):
  list($directivenf, $valuenf) = split(" ", $setting, 2);
  $value = rtrim($valuenf, "\n");
  $directive = str_replace("_", " ", $directivenf); ?>

  <?php if ($directive == "ALIAS"): ?>
  <input type="hidden" name="<?php echo $directivenf; echo $act; ?>" value="<?php echo $value; ?>" />
  <?php $act++; ?>
  <?php elseif ($directive == "SCENE"): ?>
    <input type="hidden" name="<?php echo $directivenf; echo $act; ?>" value="<?php echo $value; ?>" />
    <?php $sct++; ?>
  <?php elseif ($directive == "USERSYN"): ?>
    <input type="hidden" name="<?php echo $directivenf; echo $act; ?>" value="<?php echo $value; ?>" />
    <?php $usct++; ?>
  <?php else: // if not alias, scene or usersyn ?>
    <tr>
      <td width="200">
        <h6><?php echo $directive; ?>:&nbsp;</h6>
      </td>

    <?php if ($directivenf == "SCRIPT_MODE"): ?>
      <td width="120">
        <select name="<?php echo($directivenf); ?>">
        <?php if ($value == "SCRIPTS"): ?>
          <option selected value='SCRIPTS'>SCRIPTS</option>
          <option value='HEYUHELPER'>HEYUHELPER</option>
        <?php else: ?>
          <option value='SCRIPTS'>SCRIPTS</option>
          <option selected value='HEYUHELPER'>HEYUHELPER</option>
        <?php endif ?>
        </select>
      </td>
      <?php elseif ($directivenf == "MODE"): ?>
      <td width="120">
        <select name="<?php echo($directivenf); ?>">
          <?php if ($value == "COMPATIBLE"): ?>
            <option selected value="COMPATIBLE">COMPATIBLE</option>
            <option value="HEYU">HEYU</option>
          <?php else: ?>
            <option value="COMPATIBLE">COMPATIBLE</option>
            <option selected value="HEYU">HEYU</option>
          <?php endif ?>
        </select>
      </td>
      <?php elseif ($directivenf == "COMBINE_EVENTS" || $directivenf == "COMPRESS_MACROS" || $directivenf == "REPL_DELAYED_MACROS" ||
      $directivenf == "WRITE_CHECK_FILES" || $directivenf == "ACK_HAILS" || $directivenf == "AUTOFETCH"): ?>
      <td width="120">
        <select name="<?php echo($directivenf); ?>">
          <?php echo yesnoopt($value); ?>
        </select>
      </td>
      <?php elseif ($directivenf == "DAWN_OPTION" || $directivenf == "DUSK_OPTION"): ?>
      <td width="120">
        <select name="<?php echo($directivenf); ?>">
          <?php echo dawnduskopt($value); ?>
        </select>
      </td>
      <?php else: ?>
        <td width="120">
          <input type="text" name="<?php echo($directivenf); ?>" value="<?php echo($value); ?>" size="15" />
        </td>
      <?php endif; ?>
    </tr>
  <?php endif; // end if not alias, scene or usersyn ?>
<?php endforeach; ?>
</table>

<!-- end -->

</td>
</tr>

<tr>
  	<td style="border-right:none;" align="left" width="20px"><a href="#" onclick="javascript:window.open('../doc/heyuconf.htm','','scrollbars=yes,menubar=no,width=700,height=500,resizable=yes,toolbar=no,location=no,status=no');">Help</a></div></td>
    <td style="border-left:none;border-right:none;" align="right"><input type="submit" value="<?php echo($lang['save']); ?>" onclick="CallJS('Demo()')" /></form></td>
    <td style="border-left:none;"><form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post"><input type="submit" value="<?php echo($lang['cancel']); ?>"  /></form></td>
</tr>
</table>