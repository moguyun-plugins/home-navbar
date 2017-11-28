<?php

namespace moguyun\plugins\homenavbar\models;

use yii\base\Model;
use yii\web\UploadedFile;

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
            [['title', 'url'], 'required'],
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

    /**
     * @param $file UploadedFile
     * @return string
     */
    public function upload($file)
    {
        $savePath = date('Ymd') . '/';
        $absPath = \Yii::getAlias('@frontend') . '/web/uploads/' . $savePath;
        if (!file_exists($absPath)) {
            mkdir($absPath);
        }
        $filename = uniqid() . '.' . $file->extension;
        $file->saveAs($absPath . $filename);
        return $savePath . $filename;
    }

    public function getSavePath($category = null)
    {
        $path = '';
        if ($category) {
            $path = $path . $category . '/';
        }
        if ($this->timeDir) {
            $path = $path . date('Ymd') . '/';
        }
        return $path;
    }
}
