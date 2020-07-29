<?php
//Author：王志祥
//说明：


namespace app\database\controller;


use think\Controller;
use think\Image;

class ImageController extends Controller
{
    public function image1()
    {
        $image = Image::open('./1.png');
//        var_dump($image->size());
//        $image->crop(300, 300)->save('./crop.png'); // 裁减
//        $image->thumb(500, 500)->save('./thumb.png'); // 缩略图
        $image->text('十年磨一剑',getcwd().'/FZSTK.TTF',30,'#ffffff')
            ->save('text_image.png');
    }
}