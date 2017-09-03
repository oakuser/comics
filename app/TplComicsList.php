<?php
namespace Comics;

class TplComicsList
{
    /**
     * @param $data = array(
     *          'url'           => 'http://...', //урл на страницу сайта-донора
     *          'site_title'    => '...',
     *          'pages'         => 10, //кол-во страниц
     *          'curr_page'     => 1, //текущая страница
     *          'items'         => array(
     *              $name => array(
     *                  'name_ru'       => '...',
     *                  'next_page_url' => 'http://...',
     *                  'img_src'       => 'http://...'
     *              )
     *          )
     *      );
     * @return string
     */
    public static function buildHtml($data)
    {
        $paginatorHtml = self::buildPaginator($data['pages'], $data['curr_page'], $data['url'], $data['site_title']);

        $html = $paginatorHtml;

        $html .= '<ul class="items">';
        foreach ($data['items'] as $name => $item) {
            $urlName = explode('/', $item['next_page_url']);
            $urlName = array_pop($urlName);

            $html .= '<li>';
            $html .= '<table><tr>';
            $html .= '<td><a href="?site=' . Query::get('site') . '&name=' . $urlName . '"><img height="300" src="' . $item['img_src'] . '" /></a></td>';
            $html .= '<td valign="top"><small><a href="?site=' . Query::get('site') . '&name=' . $urlName . '">' . $name . '</a></small><small>' . $item['name_ru'] . '</small></td>';
            $html .= '</tr></table>';
            $html .= '</li>';
        }
        $html .= '</ul>';
        $html .= $paginatorHtml;

        return $html;
    }

    protected static function buildPaginator($pagesCount, $currPage, $siteUrl, $siteTitle)
    {
        $html = '<span class="paginator"><a href="' . $siteUrl . '" target="_blank">' . $siteTitle . '</a>';

        if ($pagesCount > 1) {
            $params = array();
            if (Query::get('site')) $params['site'] = Query::get('site');
            if (Query::get('name')) $params['name'] = Query::get('name');

            for ($i = 1; $i <= $pagesCount; $i++) {
                $params['page'] = $i;
                if ($i == $currPage) $html .= '<span>' . $i . '</span>';
                else $html .= '<a href="?' . http_build_query($params) . '">' . $i . '</a>';
            }
        }

        $html .= '</span>';

        return $html;
    }
}