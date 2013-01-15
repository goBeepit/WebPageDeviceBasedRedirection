<?php
/**
 * @author SimpleAnecdote
 * @link http://opensource.goBeepit.com
 * @license http://unlicense.org/ - Please leave credits.
 */
// Require the settings file
require_once('class.goBeepit.webPageDeviceBasedRedirectionSettings.php');
Class WebPageDeviceBasedRedirection
{
	// String The GET parameter key we're using
	private static $viewParamKey = 'redirectView';
	// String The GET parameter special value we're using
	private static $viewDesktopValue = 'desktop';
	// Boolean to check for device
	private static $checkForDevice = true;
	// String An URL encoded paramter string (inital '?' sign ommitted)
	private static $viewParam = '';
	// String The user agent
	private static $userAgentString = '';
	
	/**
	 * Determines if we should redirect the user
	 * Redirects and exits the script.
	 * @param String $userAgent The user agent string from the browser which contains identfying information (i.e. $_SERVER['HTTP_USER_AGENT'])
	 * @param Associative_array $get An associative array of the GET parameters (i.e. $_GET)
	 */
	public static function deviceDetectionAndRedirection($userAgent, $get)
	{
		// Set the $userAgentString
		self::setUserAgentString($userAgent);
		// Set the $viewParam
		self::setViewParam($get);
		// Check whether or not we should redirect based on the user's device
		if(self::shouldRedirect(
				WebPageDeviceBasedRedirectionSettings::getMobileRedirect(),
				WebPageDeviceBasedRedirectionSettings::getTabletRedirect(),
				WebPageDeviceBasedRedirectionSettings::getDesktopRedirect()))
		{
			// Actually redirect the user
			self::redirect(WebPageDeviceBasedRedirectionSettings::getRedirectUrl());
		}
	}
	
	/**
	 * This function decides whether or not we need to redirect the user
	 * It bases the decision on device detection using the user agent string and RegEx
	 * @param boolean $mobile Tells us whether or not to redirect mobiles to mobile URL - Default TRUE
	 * @param boolean $tablet Tells us whether or not to redirect tablets to mobile URL - Default FALSE
	 * @param boolean $dekstop Tells us whether or not to redirect dekstops to mobile URL - Default FALSE
	 * @return boolean Redirect or not
	 * Reference materials:
	 * * Uses the regex from http://detectmobilebrowsers.com/ (@license: http://unlicense.org/ - Please leave credits.)
	 * * Uses custom regex from SimpleAnecdote (@license: http://unlicense.org/ - Please leave credits.)
	 */
	private static function shouldRedirect($mobileRedirect = true, $tabletRedirect = false, $desktopRedirect = false)
	{
		// Boolean that will tell us whether or not to redirect to the mobile URL
		$shouldRedirect =  false;
		// Should we even check for device redirection?
		if(self::$checkForDevice == true)
		{
			// The respective RegEx patterns
			$newMobileDevicesRegexPattern = '/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i';
			$oldMobileDevicesRegexPattern = '/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i';
			$tabletRegexPattern = '/(android|ipad|tablet|playbook|silk)/i';
			
			
			// Match mobiles only (and Android tablets which have not removed the word "mobile" from their user agent.
			if(preg_match($newMobileDevicesRegexPattern, self::$userAgentString) || preg_match($oldMobileDevicesRegexPattern, substr(self::$userAgentString, 0, 4)))
			{
				$shouldRedirect = $mobileRedirect;
			}
			// Matches tablets and Android phones. But because it comes after the mobile detection, only catches tablets
			elseif(preg_match($tabletRegexPattern, self::$userAgentString))
			{
				$shouldRedirect = $tabletRedirect;
			}
			// Desktop users, AKA - All other users
			else
			{
				$shouldRedirect = $desktopRedirect;
			}
		}
		
		return $shouldRedirect;
	}
	
	/**
	 * Redirects the browser to the URL
	 */
	private static function redirect($redirectionUrl)
	{
		header('Location: ' . $redirectionUrl);
		exit;
	}
	
	/**
	 * Get $viewParam
	 * @return string $viewParam
	 */
	public static function getViewParam()
	{
		return self::$viewParam;
	}
	
	/**
	 * Set $viewParam
	 * @param Associative_array $get
	 */
	private static function setViewParam($get)
	{
		// Check if the our GET parameter is set with the right value
		if($get[self::$viewParamKey] == self::$viewDesktopValue)
		{
			// Set the $checkForDevice boolean false
			self::$checkForDevice = false;
			self::$viewParam = http_build_query(
				array(
					self::$viewParamKey => self::$viewDesktopValue,
				)
			);
		}
		else
		{
			$viewParam = '';
		}
	}
	
	/**
	 * Set $userAgentString
	 * @param string $userAgent
	 */
	private static function setUserAgentString($userAgent)
	{
		self::$userAgentString = $userAgent;
	}
}
// Handle the redirection if we need to or stay on the page
WebPageDeviceBasedRedirection::deviceDetectionAndRedirection($_SERVER['HTTP_USER_AGENT'], $_GET);