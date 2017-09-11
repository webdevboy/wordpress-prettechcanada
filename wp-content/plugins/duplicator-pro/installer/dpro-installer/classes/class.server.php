<?php

/**
 * DUPX_cPanel  
 * Wrapper Class for cPanel API  */
class DUPX_Server
{
	public static $php_safe_mode_on	 = false;
	public static $php_version		 = 0;
	public static $php_version_min	 = "5.2.7";
	public static $php_version_safe	 = false;

	public static function _init()
	{
		self::$php_safe_mode_on	 = in_array(strtolower(@ini_get('safe_mode')), array('on', 'yes', 'true', 1, "1"));
		self::$php_version		 = phpversion();
		self::$php_version_safe	 = (version_compare(phpversion(), self::$php_version_min) >= 0);
	}

	/**
	 *  Display human readable byte sizes
	 *  @param string $size		The size in bytes
	 */
	public static function is_dir_writable($path)
	{
		if (!@is_writeable($path)) return false;

		if (is_dir($path)) {
			if ($dh = @opendir($path)) {
				closedir($dh);
			} else {
				return false;
			}
		}

		return true;
	}

	/**
	 *  Can this server process in shell_exec mode
	 *  @return bool
	 */
	public static function is_shell_exec_available()
	{
		if (array_intersect(array('shell_exec', 'escapeshellarg', 'escapeshellcmd', 'extension_loaded'), array_map('trim', explode(',', @ini_get('disable_functions'))))) return false;

		//Suhosin: http://www.hardened-php.net/suhosin/
		//Will cause PHP to silently fail.
		if (extension_loaded('suhosin')) return false;

		// Can we issue a simple echo command?
		if (!@shell_exec('echo duplicator')) return false;

		return true;
	}

	/**
	 *  Returns the path this this server where the zip command can be called
	 *  @return string	The path to where the zip command can be processed
	 */
	public static function get_unzip_filepath()
	{
		$filepath = null;
		if (self::is_shell_exec_available()) {
			if (shell_exec('hash unzip 2>&1') == NULL) {
				$filepath = 'unzip';
			} else {
				$possible_paths = array('/usr/bin/unzip', '/opt/local/bin/unzip');
				foreach ($possible_paths as $path) {
					if (file_exists($path)) {
						$filepath = $path;
						break;
					}
				}
			}
		}
		return $filepath;
	}
}
//INIT Class Properties
DUPX_Server::_init();
