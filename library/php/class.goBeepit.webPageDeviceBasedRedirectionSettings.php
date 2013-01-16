<?php
/**
 * @author: SimpleAnecdote
 * @link: http://opensource.goBeepit.com
 * @license: http://unlicense.org/ - Please leave credits.
 */
Class WebPageDeviceBasedRedirectionSettings
{
	//---------------------  Settings  ---------------------    
	// goBeepit Item ID - Change this to your item's ID
	private static $urlSuffix = 1;
	// goBeepit URL prefix - don't change
	private static $urlPrefix = 'http://dir.goBeepit.com/items/';
	// Which devices we should redirect
	// Mobile devices?
	private static $mobileRedirect = true;
	// Tablet devices?
	private static $tabletRedirect = false;
	// All other devices?
	private static $desktopRedirect = false;
	
	
	
	//---------------------  Getters and Setters  ---------------------
	
	/**
	 * Get the URL we need to redirect to
	 * @return string
	 */
	public static function getRedirectUrl()
	{
		return self::$urlPrefix.self::$urlSuffix;
	}
	
	/**
	 * Get $mobileRedirect
	 * @return boolean
	 */
	public static function getMobileRedirect()
	{
		return self::$mobileRedirect;
	}
	
	/**
	 * Get $tabletRedirect
	 * @return boolean
	 */
	public static function getTabletRedirect()
	{
		return self::$tabletRedirect;
	}
	
	/**
	 * Get $desktopRedirect
	 * @return boolean
	 */
	public static function getDesktopRedirect()
	{
		return self::$desktopRedirect;
	}
	
	/**
	 * 
	 * @param string $urlPrefix
	 */
	public static function setUrlPrefix($urlPrefix)
	{
		self::$urlPrefix = $urlPrefix;
	}
	
	/**
	 * 
	 * @param string $urlSuffix
	 */
	public static function setUrlSuffix($urlSuffix)
	{
		self::$urlSuffix = $urlSuffix;
	}
	
	/**
	 * Set $mobileRedirect
	 * @param boolean $mobileRedirect
	 */
	public static function setMobileRedirect($mobileRedirect)
	{
		self::$mobileRedirect = $mobileRedirect;
	}
	
	/**
	 * Set $tabletRedirect
	 * @param boolean $tabletRedirect
	 */
	public static function setTabletRedirect($tabletRedirect)
	{
		self::$mobileRedirect = $tabletRedirect;
	}
	
	/**
	 * Set $desktopRedirect
	 * @param boolean $desktopRedirect
	 */
	public static function setDesktopRedirect($desktopRedirect)
	{
		self::$mobileRedirect = $desktopRedirect;
	}
}