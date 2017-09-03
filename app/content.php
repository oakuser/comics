<?php 
include __DIR__ . '/../vendor/autoload.php';

$params = Comics\Query::get();
//$params['site'] = 'site1';
return Comics\Comics::getHtml($params);
