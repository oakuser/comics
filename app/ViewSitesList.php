<?php
namespace Comics;

class ViewSitesList
{
	public static function getHtml($data)
	{
		$html = '<table>';

		foreach ($data as $siteName) {
			$className = 'Comics\Donor' . $siteName;
			//$siteComicslistUrl = $className::$siteComicslistUrl;

			$html .= '<tr>';
			$html .= '<td><a href="?site=' . $siteName . '">' . $siteName . '</td>';
			$html .= '</tr>';
		}

		$html .= '</table>';

		return $html;
	}
}