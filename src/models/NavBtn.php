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
            ['buttons', 'each', 'rule' => ['integer']],
        ];
    }
}
