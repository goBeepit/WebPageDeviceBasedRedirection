/**
 * @author SimpleAnecdote
 * @link http://opensource.goBeepit.com
 * @license http://unlicense.org/ - Please leave credits.
 */
function WebPageDeviceBasedRedirection()
{
	// Initialise the settings class
	this.webPageDeviceBasedRedirectionSettings = new WebPageDeviceBasedRedirectionSettings();
	// String The GET parameter key we're using
	this._viewParamKey = 'redirectView';
	// String The GET parameter special value we're using
	this._viewDesktopValue = 'desktop';
	// Boolean to check for device
	this._checkForDevice = true;
	// String An URL encoded paramter string (inital '?' sign ommitted)
	this._viewParam = '';
	// String The user agent
	this._userAgentString = '';
}

WebPageDeviceBasedRedirection.prototype = 
{
	/**
	 * Determines if we should redirect the user
	 * Redirects and exits the script.
	 * @param String $userAgent The user agent string from the browser which contains identfying information (i.e. $_SERVER['HTTP_USER_AGENT'])
	 * @param Associative_array $get An associative array of the GET parameters (i.e. $_GET)
	 */
	deviceDetectionAndRedirection : function(userAgent)
	{
		// Set the $userAgentString
		this.setUserAgentString(userAgent);
		// Set the $viewParam
		this.setViewParam(this.urlParams());
		// Check whether or not we should redirect based on the user's device
		if(this.shouldRedirect(
			this.webPageDeviceBasedRedirectionSettings.getMobileRedirect(),
			this.webPageDeviceBasedRedirectionSettings.getTabletRedirect(),
			this.webPageDeviceBasedRedirectionSettings.getDesktopRedirect()))
		{
			// Actually redirect the user
			this.redirect(this.webPageDeviceBasedRedirectionSettings.getRedirectUrl());
		}
	},
	
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
	shouldRedirect : function(mobileRedirect, tabletRedirect, desktopRedirect)
	{
		// Boolean that will tell us whether or not to redirect to the mobile URL
		var shouldRedirect = false;
		// Should we even check for device redirection?
		if(this._checkForDevice == true)
		{
			// The respective RegEx patterns
			var newMobileDevicesRegexPattern = /(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i;
			var oldMobileDevicesRegexPattern = /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i;
			var tabletRegexPattern = /(android|ipad|tablet|playbook|silk)/i;
			
			
			// Match mobiles only (and Android tablets which have not removed the word "mobile" from their user agent.
			if(newMobileDevicesRegexPattern.test(this._userAgentString) || oldMobileDevicesRegexPattern.test(this._userAgentString.substr(0,4)))
			{
				shouldRedirect = mobileRedirect;
			}
			// Matches tablets and Android phones. But because it comes after the mobile detection, only catches tablets
			else if(tabletRegexPattern.test(this._userAgentString))
			{
				shouldRedirect = tabletRedirect;
			}
			// Desktop users, AKA - All other users
			else
			{
				shouldRedirect = desktopRedirect;
			}
		}
		
		return shouldRedirect;
	},
	
	/**
	 * Redirects the browser to the URL
	 */
	redirect : function(redirectionUrl)
	{
		document.location = redirectionUrl;
		return false;
	},
	
	/**
	 * Get $viewParam
	 * @return string $viewParam
	 */
	getViewParam : function()
	{
		return this._viewParam;
	},
	
	/**
	 * Set $viewParam
	 * @param Associative_array $get
	 */
	setViewParam : function(get)
	{
		// Check if the our GET parameter is set with the right value
		if(get[this._viewParamKey] == this._viewDesktopValue)
		{
			// Set the $checkForDevice boolean false
			this._checkForDevice = false;
			this._viewParam = this._viewParamKey + '=' + this._viewDesktopValue;
		}
		else
		{
			this._viewParam = '';
		}
	},
	
	/**
	 * Set $userAgentString
	 * @param string $userAgent
	 */
	setUserAgentString : function(userAgent)
	{
		this._userAgentString = userAgent;
	},
	
	/**
	 * Saves the URL parameters
	 * @returns All GET parameters as a JSON object
	 * Reference materials:
	 * * Uses code offered as a solution in http://stackoverflow.com/questions/827368/use-the-get-parameter-of-the-url-in-javascript
	 * * Uses custom JS from SimpleAnecdote (licence: open source)
	 */
	urlParams : function()
	{
		var GET = {};
		var input = window.location.search;

		if (input.length > 1)
		{
	        var params = input.slice(1).replace(/\+/g, ' ').split('&'),
	            plength = params.length,
	            tmp,
	            key,
	            val,
	            obj,
	            p;

	        for (p = 0; p < plength; p += 1)
		    {
	            tmp = params[p].split('=');
	            key = decodeURIComponent(tmp[0]);
	            val = decodeURIComponent(tmp[1]);
	            if (GET.hasOwnProperty(key))
		        {
	                obj = GET[key];
	                if (obj.constructor === Array)
		            {
	                    obj.push(val);
	                }
	                else
		            {
	                    GET[key] = [obj, val];
	                }
	            }
	            else
		        {
	                GET[key] = val;
	            }
	        }
	    }
		
	    return GET;
	},
}
// Handle the redirection if we need to or stay on the page
var webPageDeviceBasedRedirection = new WebPageDeviceBasedRedirection;
webPageDeviceBasedRedirection.deviceDetectionAndRedirection((navigator.userAgent||navigator.vendor||window.opera));