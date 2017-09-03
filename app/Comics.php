<?php
//Params
//site - сайт-донор. если такого параметра нету выводим список сайтов

namespace Comics;

class Comics
{
	public static function getHtml($params)
	{
		$comics = self::getComicsByParams($params);
		$html = self::render($params, $comics);

		return $html;
	}

	protected static function getComicsByParams($params)
	{
		$result = array();

		if (!isset($params['site'])) {
			var_dump(glob(__DIR__ . '\Donor*.php'));
		}

		return array();
	}

	protected static function render($params, $comics)
	{
		return 'hii';
	}
}