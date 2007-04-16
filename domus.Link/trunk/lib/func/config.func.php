<?php

function config_load()
{
	$config = array();

	$config["heyuconf"] = "/etc/heyu/x10.conf";
	$config["heyuexec"] = "/usr/local/bin/heyu";
	$config["password"] = "123";
	$config["lang"] = "";
	$config["theme"] = "default";

	if (file_exists(CONFIG_FILE_LOCATION))
	{
		include(CONFIG_FILE_LOCATION);
	}

	return $config;
}

function config_text($config)
{
	$result = <<<EOF
#
# domus.Link (Heyu Frontend) Configuration File
#

# File locations
\$config['heyuconf'] = '{$config['heyuconf']}';
\$config['heyuexec'] = '{$config['heyuexec']}';

# Frontend password
\$config['password'] = '{$config['password']}';
# Language (available options en_GB and pt_PT)
\$config['lang'] = '{$config['lang']}';
# Theme
\$config['theme'] = '{$config['theme']}';
EOF;

	return $result;
}

function config_save($config)
{
	$filedir = dirname(CONFIG_FILE_LOCATION);
	$filename = CONFIG_FILE_LOCATION;
	if (is_writable($filename) || is_writable($filedir))
	{
		$handle = fopen($filename, "w");
		if ($handle)
		{
			fwrite($handle, "<?php\n");
			fwrite($handle, config_text($config));
			fwrite($handle, "\n?>");
			fclose($handle);
		}
	}
}

?>