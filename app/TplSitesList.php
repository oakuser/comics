<?php
namespace Comics;

class TplSitesList
{
	public static function buildHtml($sites)
	{
        $html = '<table>';

	    foreach ($sites as $siteName) {
            $html .= '<tr>';
            $html .= '<td><a href="?site=' . $siteName . '">' . $siteName . '</td>';
            $html .= '</tr>';
        }

        $html .= '</table>';

		return $html;
	}
}