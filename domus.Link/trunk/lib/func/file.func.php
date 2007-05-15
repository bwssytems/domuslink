<?php
/*----------------------------------------------------------------------------+
 |                                                                            |
 |                  domus.Link - a frontend for Heyu                          |
 |                                                                            |
 |                Copyright 2007, Istvan Hubay Cebrian                        |
 |                      All Rights Reserved                                   |
 |                                                                            |
 |                                                                            |
 | This software is licensed free of charge for non-commercial distribution   |
 | and for personal and internal business use only.  Inclusion of this        |
 | software or any part thereof in a commercial product is prohibited         |
 | without the prior written permission of the author.  You may copy, use,    |
 | and distribute this software subject to the following restrictions:        |
 |                                                                            |
 |  1)  You may not charge money for it.                                      |
 |  2)  You may not remove or alter this license, copyright notice, or the    |
 |      included disclaimers.                                                 |
 |  3)  You may not claim you wrote it.                                       |
 |  4)	If you make improvements (or other changes), you are requested        |
 |	    to send them to the domus.Link maintainer so there's a focal point    |
 |      for distributing improved versions.                                   |
 |                                                                            |
 | As used herein, domus.Link is a trademark of Istvan H. Cebrian.            |
 |                                                                            |
 | HEYU is a trademark of Daniel B. Suthers.                                  |
 | X10, CM11A, and ActiveHome are trademarks of X-10 (USA) Inc.               |
 | SwitchLinc and LampLinc are trademarks of Smarthome, Inc.                  |
 |                                                                            |
 | The author is not affiliated with either company.                          |
 |                                                                            |
 | Istvan H. Cebrian                                                          |
 | Author and Maintainer                                                      |
 | Lisbon, Portugal                                                           |
 | Email ID: me                                                               |
 | Email domain: -at- icebrian -dot- net                                      |
 |                                                                            |
 | Disclaimers:                                                               |
 | THERE IS NO ASSURANCE THAT THIS SOFTWARE IS FREE OF DEFECTS AND IT MUST    |
 | NOT BE USED IN ANY SITUATION WHERE THERE IS ANY CHANCE THAT ITS            |
 | PERFORMANCE OR FAILURE TO PERFORM AS EXPECTED COULD RESULT IN LOSS OF      |
 | LIFE, INJURY TO PERSONS OR PROPERTY, FINANCIAL LOSS, OR LEGAL LIABILITY.   |
 |                                                                            |
 | TO THE EXTENT ALLOWED BY APPLICABLE LAW, THIS SOFTWARE IS PROVIDED "AS IS",|
 | WITH NO EXPRESS OR IMPLIED WARRANTY, INCLUDING, BUT NOT LIMITED TO, THE    |
 | IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE.|
 |                                                                            |
 | IN NO EVENT UNLESS REQUIRED BY APPLICABLE LAW WILL THE AUTHOR BE LIABLE    |
 | FOR DAMAGES, INCLUDING ANY GENERAL, SPECIAL, INCIDENTAL OR CONSEQUENTIAL   |
 | DAMAGES ARISING OUT OF THE USE OR INABILITY TO USE THIS SOFTWARE EVEN IF   |
 | THE AUTHOR HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES.            |
 |                                                                            |
 +----------------------------------------------------------------------------*/
 
/**
 * Load file
 *
 * @param $file represent file to load
 */
function load_file($file)
{
	if (is_readable($file) == true)
	{
		$content = file($file);
	}
	else
	{
		header("Location: error.php?msg=".$file." not found or not readable!");
		die();
	}
	return $content;
}

/**
 * Save file
 *
 * @param $content new content to be saved
 * @param $filename of file to save to
 */
function save_file($content, $filename)
{
	$fp = fopen($filename,'w');

	if (is_writable($filename) == true)
	{
		foreach ($content as $line)
		{
			$write = fwrite($fp, $line);
		}
		header("Location: ".$_SERVER['PHP_SELF']);
	}
	else
	{
		header("Location: error.php?msg=".$filename." not writable!");
		die();
	}
	fclose($fp);
}

/**
 * Add line to file
 *
 * @param $content file contents being received
 * @param $file complete file location
 * @param $editing represents what is being edited
 */
function add_line($content, $file, $editing)
{
	if ($editing == "alias")
	{
		$newline = "ALIAS ".label_parse($_POST["label"], true)." ".$_POST["code"]." ".$_POST["module"]." # ".$_POST["type"]."\n";
	}
	elseif ($editing == "module")
		$newline = $_POST["module"]."\n";
	elseif ($editing == "type")
		$newline = $_POST["type"]."\n";

	array_push($content, $newline);
	save_file($content, $file);
}

/**
 * Edit line in file
 *
 * @param $content file contents
 * @param $file being edited
 * @param $editing represents what is being edited
 */
function edit_line($content, $file, $editing)
{
	$line = $_POST["line"]; // line being edited

	if ($editing == "alias")
	{
		$newline = "ALIAS ".label_parse($_POST["label"], true)." ".$_POST["code"]." ".$_POST["module"]." # ".$_POST["type"]."\n";
	}
	elseif ($editing == "module")
		$newline = $_POST["module"]."\n";
	elseif ($editing == "type")
		$newline = $_POST["type"]."\n";


	if ($line == 0 || (count($content) - 1) == $line) // first or last line editing
	{
		array_splice($content, $line, 1, $newline);
	}
	else // when editing line in middle
	{
		$end = array_splice($content, $line+1);
		array_splice($content, $line, 1, $newline);
		$content = array_merge($content, $end);
	}
	save_file($content, $file);
}

/**
 * Delete line from file
 *
 * @param $content file contents
 * @param $file being edited
 * @param $line to be deleted
 */
function delete_line($content, $file, $line)
{
	array_splice($content, $line, 1);
	save_file($content, $file);
}

?>