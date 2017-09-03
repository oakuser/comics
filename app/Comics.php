<?php
//Params
//site - сайт-донор. если такого параметра нету выводим список сайтов

namespace Comics;

class Comics
{
	public static function getHtml($params)
	{
		$data = self::getComicsByParams($params);
		$html = self::render($params, $data);

		return $html;
	}

	protected static function getComicsByParams($params)
	{
		$result = array();

		if (!isset($params['site'])) {
			$donorClassess = glob(__DIR__ . '\Donor*.php');
			foreach ($donorClassess as $donorClass) {
				preg_match('/Donor(.+)\.php$/', $donorClass, $matches);
				$result[] = $matches[1];
			}
		}

		return $result;
	}

	protected static function render($params, $data)
	{
		//get tpl by param
		if (!isset($params['site'])) $tpl = 'Comics\ViewSitesList';

		return $tpl::getHtml($data);
	}
}