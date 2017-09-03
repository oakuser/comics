<?php
namespace Comics;

error_reporting(E_ALL & ~E_STRICT & ~E_DEPRECATED);
ini_set('display_errors', '1');

include __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/simple_html_dom.php';

if (!Query::get('site')) {
    //список сайтов
    $donorClassess = glob(__DIR__ . '/Donor*.php');
    $sites = array();
    foreach ($donorClassess as $donorClass) {
        preg_match('/Donor(.+)\.php$/', $donorClass, $matches);
        $sites[] = $matches[1];
    }

    if (count($sites) == 1) {
        $siteName = array_shift($sites);
        $_GET['site'] = $siteName;
        Query::init(true);
        $result = getSiteHtml();
    } else {
        $result = TplSitesList::buildHtml($sites);
    }
} else {
    //дадим каждому классу сайтов возможность самому генерить контент исходя из параметров
    $className = 'Comics\Donor' . Query::get('site');
    $result = $className::getHtml();
}

return $result;

function getSiteHtml()
{
    $className = 'Comics\Donor' . Query::get('site');

    return $className::getHtml();
}
