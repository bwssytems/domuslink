<?php
# require_once("./apiinclude.php");
$dirname = dirname(__FILE__);
require_once($dirname.DIRECTORY_SEPARATOR.'lib/classes/restserver.php');
require_once($dirname.DIRECTORY_SEPARATOR.'api/domuscontroller.php');
spl_autoload_register(); // don't load our classes unless we use them

$mode = 'production'; // 'debug' or 'production'
$server = new RestServer($mode, "domus.Link");
# $server->refreshCache(); // uncomment momentarily to clear the cache if classes change in production mode

$server->addClass('DomusController', "domus.Link/api.php/");
# $server->addClass('ProductsController', '/products'); // adds this as a base to all the URLs in this class

$server->handle();
?>