<?php

class util_guid {

	/**
	 * 获取GUID
	 * @return string
	 */
	static function getGuid($p_bUpper = false, $p_sJoin = '', $source='appserver'){
		$sRaw = md5(strtolower($source.'/' . $_SERVER['SERVER_ADDR'])) . ':' . self::_getTimeMillis() . ':' . self::_getLong());
		if($p_bUpper){
			$sRaw = strtoupper($sRaw);
		}
		return substr($sRaw, 0, 8) . $p_sJoin . substr($sRaw, 8, 4) . $p_sJoin . substr($sRaw, 12, 4) . $p_sJoin . substr($sRaw, 16, 4) . $p_sJoin . substr($sRaw, 20);
	}

	/**
	 * 获取时间参数
	 * @return string
	 */
	private static function _getTimeMillis(){
		list($usec, $sec) = explode(' ', microtime());
		return $sec . substr($usec, 2, 3);
	}

	/**
	 * 获取整长型数
	 * @return long
	 */
	private static function _getLong(){
		$tmp = rand(0, 1) ? '-' : '';
		return $tmp . rand(1000, 9999) . rand(1000, 9999) . rand(1000, 9999) . rand(100, 999) . rand(100, 999);
	}
}
