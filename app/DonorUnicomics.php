<?php
namespace Comics;

class DonorUnicomics
{
	const HOST = 'http://unicomics.ru',
        URL = self::HOST . '/comics/series/',
        TITLE = 'unicomics.ru';

	public static function getHtml()
    {
        $comicsName = Query::get('name');
        if ($comicsName) {
            //выводим комикс
            $data = self::getComicsItem($comicsName);
            $result = TplComicsItem::buildHtml($data);
        } else {
            //выводим список комиксов
            $data = self::getComicsList();
            $result = TplComicsList::buildHtml($data);
        }

        return $result;
    }

	protected static function getComicsList()
	{
	    $currentPage = Query::get('page') ? Query::get('page') : 1;
        $url = self::HOST . '/comics/series' . ($currentPage > 1 ? '/page/' . $currentPage : '');
        $page = file_get_contents($url);
        $html = str_get_html($page);

        //кол-во страниц
        preg_match('/new Paginator\(\'paginator1\', (\d+), \d+, \d+, \".+\"\);/', $page, $matches);

        $data = array('url' => self::URL, 'site_title' => self::TITLE, 'pages' => (int)$matches[1], 'curr_page' => $currentPage);
        foreach ($html->find('.list_comics') as $comicsItem) {
            $name = $comicsItem->find('.list_title_en', 0)->innertext;

            $data['items'][$name] = array(
                'name_ru'		=> trim($comicsItem->find('.list_title', 0)->innertext),
                'url_descr'		=> $comicsItem->find('.descr a', 0)->href,
                'next_page_url'	=> $comicsItem->find('.online a', 0)->href,
                'img_src'		=> $comicsItem->find('.left_comics img', 0)->src,
            );
        }

        return $data;
	}

	protected static function getComicsItem($comicsName)
    {
        $data = array();

        $url = self::HOST . '/comics/online/' . $comicsName;
        $page = file_get_contents($url);
        $html = str_get_html($page);

        $data['img_src'] = $html->find('.image_online', 0)->src;

        $urlName = $html -> find('.content .block' ,1)->find('a', 0)->href;
        $data['url_name'] = str_replace('/comics/online/', '', $urlName);

        $data['home_url'] = $data['back_url'] = '';
        if (isset($_SERVER['HTTP_REFERER'])) {
            $homeUrl = explode('?', $_SERVER['HTTP_REFERER']);
            $data['home_url'] = array_shift($homeUrl);

            $data['back_url'] = $_SERVER['HTTP_REFERER'];
        }

        return $data;
    }
}