<?php

/*========================================================================
                    _          _                     _ 
                   | |    __ _| |_ _   _ _ __  _   _(_)
                   | |   / _` | __| | | | '_ \| | | | |
                   | |__| (_| | |_| |_| | | | | |_| | |
                   |_____\__,_|\__|\__,_|_| |_|\__, |_|
                                               |___/   

=========================================================================*/

/**
*	Debug library
*
*	@author		Raymond van Velzen <raymond@latunyi.com>
*	@version	10
**/

// -----------------------------------------------------------------------

/**
*	pr
*	
*	Function to print anything in a convenient way
*	Will print any string/number/etc, array, or object.
*	
*	@param	mixed	$x		Anything
*	@param	string	$descr		Description to print above output, optional
*	@return	void
**/
function pr($x, $descr = '') 
{
	if (is_object($x)) {
		printobj($x, $descr);
	} elseif(is_array($x)) {
		printarr($x, $descr);
	} else {
		if (is_string($x) && substr($x, 0, 5) == '<?xml')
		{
			printxml($x, $descr);
		}
		else
		{
			printbr($x, $descr);
		}
	}
}

/**
*	prd
*	
*	Print something (d)irectly to the screen, using pr().
*	Will flush (not destroy) output buffer.
*	
*	@param	mixed	$x		Anything
*	@return	void
**/
function prd($x, $descr = '') 
{
	pr($x, $descr);
	ob_flush();
	flush();
}

// -----------------------------------------------------------------------

/**
*	prx
*
*	Print something using pr() and exit.
*	
*	@param	mixed	$x		Anything
*	@param	string	$descr		Description to print above output, optional
*	@return	void
**/
function prx($x, $descr = '') 
{
	pr($x, $descr);
	exit;
}

// -----------------------------------------------------------------------

/**
*	printarr
*
*	Print an array
*	
*	@param	mixed	$a		Any array
*	@param	string	$descr		Description to print above output, optional
*	@return	void
**/
function printarr($a, $descr = '') 
{
	if (!is_array($a)) 
	{
		ob_start();
		if (!empty($descr))
		{
			printbr('<b>' . $descr . '</b>');
		}
		var_dump($a);
		$str = ob_get_clean();
		printNicely($str);
	} else {
		ob_start();
		print '<pre>';
		if (!empty($descr))
		{
			print('<b>' . $descr . '</b>' . "\n");
		}
		print_r($a);
		print '</pre>';
		$str = ob_get_clean();
		printNicely($str);
	}
}

// -----------------------------------------------------------------------

/**
*	printobj
*
*	Print an object
*	
*	@param	mixed	$a		Any object
*	@param	string	$descr		Description to print above output, optional
*	@return	void
**/
function printobj($a, $descr = '') 
{
	ob_start();
	print '<pre>';
	if (!empty($descr))
	{
		print('<b>' . $descr . '</b>' . "\n");
	}
	print_r($a);
	print '</pre>';
	$str = ob_get_clean();
	printNicely($str);
}

// -----------------------------------------------------------------------

/**
*	printbr
*
*	Print something with a HTML line break. Obsolete; use pr() instead. 
*	
*	@param	string	$text		Any array
*	@param	string	$descr		Description to print before output, optional
*	@return	void
**/
function printbr ($text = '', $descr = '') 
{
	printNicely($descr . ' ' . $text);
}

// -----------------------------------------------------------------------

/**
*	printNicely
*
*	Print some text in a box with fixed-width font
*	
*	@param	string	$text		Any text
*	@return	void
**/
function printNicely($str) 
{
	print '<div style="font: normal 13px Courier New !important; border: 1px solid #CCC; background-color: #EEE; padding: 10px; margin: 10px; text-align: left !important;">';
	print '<pre>' . trim($str) . '</pre>';
	print '</div>';
}

// -----------------------------------------------------------------------

/**
*	prg
*
*	Print GET array
*	
*	@return	void
**/
function prg() 
{
	printarr($_GET, '$_GET:');
}

/**
*	prg
*
*	Print GET array and exit
*	
*	@return	void
**/
function prgx() 
{
	prg();
	exit;
}

// -----------------------------------------------------------------------

/**
*	prp
*
*	Print POST array
*	
*	@return	void
**/
function prp() 
{
	printarr($_POST, '$_POST:');
}

/**
*	prpx
*
*	Print POST array and exit
*	
*	@return	void
**/
function prpx() 
{
	prp();
	exit;
}

// -----------------------------------------------------------------------

/**
*	prs
*
*	Print SESSION
*	
*	@return	void
**/
function prs($key = null) 
{
	if (isset($key))
	{
		if (isset($_SESSION[$key]))
		{
			pr($_SESSION[$key]);
		}
		else
		{
			pr('Key "' . $key . '" not found in SESSION object.');
		}
	}
	else
	{
		printarr($_SESSION, '$_SESSION:');
	}
}

/**
*	prsx
*
*	Print SESSION and exit
*	
*	@return	void
**/
function prsx($key = null) 
{
	prs($key);
	exit;
}

// -----------------------------------------------------------------------

/**
*	prc
*
*	Print COOKIE
*	
*	@return	void
**/
function prc() 
{
	printarr($_COOKIE);
}

/**
*	prcx
*
*	Print COOKIE and exit
*	
*	@return	void
**/
function prcx() 
{
	prc();
	exit;
}

// -----------------------------------------------------------------------

/**
*	prsvr
*
*	Print SERVER
*	
*	@return	void
**/
function prsvr() 
{
	printarr($_SERVER, '$_SERVER:');
}

/**
*	prsvrx
*
*	Print SERVER and exit
*	
*	@return	void
**/
function prsvrx() 
{
	prsvr();
	exit;
}

// -----------------------------------------------------------------------

/**
*	prf
*
*	Print $_FILES array
*	
*	@return	void
**/
function prf() 
{
	printarr($_FILES, '$_FILES:');
}

/**
*	prfx
*
*	Print $_FILES and exit
*	
*	@return	void
**/
function prfx() 
{
	prf();
	exit;
}

// -----------------------------------------------------------------------

// Print ISO date from timestamp
function prdt($ts)
{
	pr(date('Y-m-d', $ts));
}

// Print ISO date from timestamp and exit
function prdtx($ts)
{
	prdt($ts);
	exit;
}

// -----------------------------------------------------------------------


/**
*	prv
*
*	Print var_dump 
*	
*	@param	mixed	$x		Some variable
*	@return	void
**/
function prv($x, $descr = '') 
{
	ob_start();
	if (!empty($descr))
	{
		print($descr . "\n");
	}
	var_dump($x);
	$str = ob_get_clean();
	printNicely($str);
}

/**
*	prvx
*
*	Print var_dump and exit
*	
*	@param	mixed	$x		Some variable
*	@return	void
**/
function prvx($x, $descr = '') 
{
	prv($x, $descr);
	exit;
}

// -----------------------------------------------------------------------

/**
*	printxml
*
*	Prints XML.
*	
*	@param	mixed	$xml		Some XML variable
*	@return	void
**/
function printxml($xml, $descr = '') 
{
	pr(nl2br(htmlentities(str_replace("><",">\n<",$xml))), $descr);
}

// -----------------------------------------------------------------------

/**
*	getExecutionTime
*
*	Calculates the execution time of a script, depending on start time.
*	
*	@param	float	$start		Start time, as float
*	@return	void
**/
function GetExecutionTime($start) 
{
	return sprintf('%1.6f', (microtime(true) - $start)) . ' sec';
}

// -----------------------------------------------------------------------

/**
*	GetMemory
*
*	Reports the amount of memory used by PHP, wrapper
*	on memory_get_usage(). Returns warning if memory_get_usage
*	function doesn't exist.
*	
*	@param	string	$unit	Measure unit: All (default), B, KB, MB
*	@return	string			'x B', 'x KB', 'x MB';
**/
function GetMemory($unit = 'All')
{
	if (!function_exists('memory_get_usage'))
	{
		return 'Can\'t report memory usage; memory_get_usage is not available.';
	}
	else
	{
		$bytes = memory_get_usage(true);
		switch ($unit)
		{
			case 'All':
				$kb = number_format( ($bytes / 1024), 2) . ' KB';
				$mb = number_format( (($bytes / 1024) / 1024), 2) . ' MB';
				return $bytes . ' bytes, ' . $kb . ', ' . $mb;
				break;
			case 'B':
				return $bytes . ' bytes';
				break;
			case 'KB':
				return number_format( ($bytes / 1024), 2) . ' KB';
				break;
			case 'MB':
				return number_format( (($bytes / 1024) / 1024), 2) . ' MB';
				break;
		}
	}
}

// Print GetMemory()
function prmem() {
	pr(GetMemory());
}

// Print GetMemory() and exit
function prmemx() {
	prx(GetMemory());
}

function vardump($x)
{
	ob_start();
	var_dump($x);
	$str = ob_get_clean();
	return $str;
}

?>
