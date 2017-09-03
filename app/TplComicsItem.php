<?php
namespace Comics;

class TplComicsItem
{
    public static function buildHtml($data)
    {
        //$buttons = '<ul class="buttons"><li><a href="' . $data['back_url'] . '"><< Back</a></li><li><a class="back" href="' . $data['home_url'] . '">Home</a></li></ul>';
        $buttons = '<a class="home_btn" href="' . $data['home_url'] . '">Home</a>';

        return '<a href="?site=' . Query::get('site') . '&name=' . $data['url_name'] . '"><img class="big_img" src="' . $data['img_src'] . '" width="100%" /></a>' . $buttons;
    }
}