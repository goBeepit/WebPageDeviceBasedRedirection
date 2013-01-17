/**
 * @author: SimpleAnecdote
 * @link: http://opensource.goBeepit.com
 * @license: http://unlicense.org/ - Please leave credits.
 */
function WebPageDeviceBasedRedirectionSettings()
{
	//---------------------  Settings  ---------------------    
	// goBeepit Item ID - Change this to your item's ID
	this._urlSuffix = 1;
	// goBeepit URL prefix - don't change
	this._urlPrefix = 'http://dir.goBeepit.com/items/';
	// Which devices we should redirect
	// Mobile devices?
	this._mobileRedirect = true;
	// Tablet devices?
	this._tabletRedirect = false;
	// All other devices?
	this._desktopRedirect = false;
}
	
WebPageDeviceBasedRedirectionSettings.prototype =
{
	//---------------------  Getters and Setters  ---------------------
	/**
	 * Get the URL we need to redirect to
	 * @return string
	 */
	getRedirectUrl : function()
	{
		return this._urlPrefix+this._urlSuffix;
	},
	
	/**
	 * Get $mobileRedirect
	 * @return boolean
	 */
	getMobileRedirect : function()
	{
		return this._mobileRedirect;
	},
	
	/**
	 * Get $tabletRedirect
	 * @return boolean
	 */
	getTabletRedirect : function()
	{
		return this._tabletRedirect;
	},
	
	/**
	 * Get $desktopRedirect
	 * @return boolean
	 */
	getDesktopRedirect : function()
	{
		return this._desktopRedirect;
	},
	
	/**
	 * Set $urlPrefix
	 * @param string $urlPrefix
	 */
	setUrlPrefix : function(urlPrefix)
	{
		this._urlPrefix = urlPrefix;
	},
	
	/**
	 * Set $urlSuffix
	 * @param string $urlSuffix
	 */
	setUrlSuffix : function(urlSuffix)
	{
		this._urlSuffix = urlSuffix;
	},
	
	/**
	 * Set $mobileRedirect
	 * @param boolean $mobileRedirect
	 */
	setMobileRedirect : function(mobileRedirect)
	{
		this._mobileRedirect = mobileRedirect;
	},
	
	/**
	 * Set $tabletRedirect
	 * @param boolean $tabletRedirect
	 */
	setTabletRedirect : function(tabletRedirect)
	{
		this._mobileRedirect = tabletRedirect;
	},
	
	/**
	 * Set $desktopRedirect
	 * @param boolean $desktopRedirect
	 */
	setDesktopRedirect : function(desktopRedirect)
	{
		this._mobileRedirect = desktopRedirect;
	},
}