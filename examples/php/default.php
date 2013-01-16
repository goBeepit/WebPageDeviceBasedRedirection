<?php
/**
 * @author SimpleAnecdote
 * @link http://opensource.goBeepit.com
 * @license http://unlicense.org/ - Please leave credits.
 */
/*
 * This is the best way to use this class.
 * All you need to do is go to to the settings file (class.goBeepit.webPageDeviceBasedRedirectionSettings.php
 * And change the $urlSuffix value to your item's ID (i.e. $urlSuffix = 1071)
 */
require_once('../../library/php/class.gobeepit.webPageDeviceBasedRedirection.php');
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>goBeepit WebPageDeviceBasedRedirection :: PHP example</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
</head>
<body>
	This will only show if you're from a device which doesn't require redirection <b>OR</b> have the variable set correctly in the URL.
</body>
</html>