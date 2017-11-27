<?php

namespace moguyun\plugins\homenavbar\models;

use yii\base\Model;

/**
 * Class NavBtn
 * @package moguyun\plugins\homenavbar\models
 * @auth zacksleo <zacksleo@gmail.com>
 * @property string $title
 * @property string $url
 * @property string $image
 */
class NavBtn extends Model
{
    public $title;
    public $url;
    public $image;

    public function rules()
    {
        return [
            [['title', 'url', 'image'], 'required'],
            ['title', 'string', 'max' => 3],
            ['url', 'url'],
            ['image', 'file', 'extensions' => ['png', 'jpg', 'gif', 'jpeg'], 'maxSize' => 30 * 1024],
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => '名称',
            'url' => '链接',
            'image' => '图片'
        ];
    }
}
