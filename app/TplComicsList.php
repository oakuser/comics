<?php
namespace Comics;

class TplComicsList
{
    public static function buildHtml($data)
    {
        $html = '<table width="100%">';
        foreach ($data as $name => $item) {
            $urlName = explode('/', $item['url_online']);
            $urlName = array_pop($urlName);

            $html .= '<tr>';
            $html .= '<td><img height="300" src="' . $item['img'] . '" /></td>';
            $html .= '<td valign="top"><a href="?site=' . Query::get('site') . '&name=' . $urlName . '">' . $name . '</a><br>' . $item['name_ru'] . '</td>';
            $html .= '</tr>';
        }
        $html .= '</table>';

        return $html;
    }
}