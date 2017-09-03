<?php
namespace Comics;

class Query
{
    protected static $params = null;

    public static function init($force = false)
    {
        if (!self::$params || $force) {
            self::$params = array_merge($_GET, $_POST);
        }
    }

	public static function get($paramName = null)
	{
	    if (!self::$params) self::init();

	    $result = self::$params;

		if ($paramName) {
			$result = isset($result[$paramName]) ? $result[$paramName] : null;
		}

		return $result;
	}
}