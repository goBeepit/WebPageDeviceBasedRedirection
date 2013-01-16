<?php
/* 
 * You can set these in the actual settings file OR use this handy setter function()
 * However, you'll need to require the settings file first.
 * So it's really best if you changed the actual settings in the settings file.
 * This is just to illustrate a point.
 */
require_once('../../library/php/class.gobeepit.webPageDeviceBasedRedirectionSettings.php');
WebPageDeviceBasedRedirectionSettings::setUrlPrefix('http://google.com');
WebPageDeviceBasedRedirectionSettings::setUrlSuffix('');
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