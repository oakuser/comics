<?php
namespace Comics;

class Query
{
	public static function get($param = null)
	{
		$result = array_merge($_GET, $_POST);

		if ($param) {
			$result = isset($result[$param]) ? $result[$param] : null;
		}

		return $result;
	}
}