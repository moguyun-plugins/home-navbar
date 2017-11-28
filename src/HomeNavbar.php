<?php

namespace moguyun\plugins\homenavbar;

use yii;
use moguyun\plugins\homenavbar\models\NavBtn;
use zacksleo\yii2\plugin\components\Plugin as IPlugin;
use zacksleo\yii2\plugin\models\PluginSetting;
use yii\web\UploadedFile;

class HomeNavbar extends IPlugin
{
    public function init()
    {                    #插件初始化,配置插件信息 必须
        // set plugin's info
        $this->identify = 'HomeNavbar';            #必要参数, 插件的唯一标识.
        $this->name = '自定义导航按钮';         #必要参数, 插件的显示名称.
        $this->version = '0.0.1';                 #插件版本号
        $this->description = '在首页顶部四个导航按钮下面, 添加自定义导航按钮';    #插件描述
        $this->copyright = '蘑菇云'; #插件版权信息
        $this->website = 'http://www.moguyun.ltd';      #网站
        $this->icon = 'icon.svg'; #插件图标,最大72*72, 如果不设置将使用默认图标;
    }

    public function hooks()
    {
        return [
            'home_navbar' => 'homeNavbar'
        ];
    }


    public function homeNavbar()
    {
        $buttons = PluginSetting::get($this->identify, 'buttons');
        $buttons = json_decode($buttons, true);
        return $this->render('buttons', [
            'buttons' => $buttons
        ]);
    }

    public function admincp()
    {
        if (Yii::$app->request->isPost && isset($_POST['NavBtn'])) {
            $errors = [];
            $models = [];
            foreach ($_POST['NavBtn'] as $attributes) {
                $model = new NavBtn();
                $model->attributes = $attributes;
                $models[] = $model;
                if (!$model->validate()) {
                    $errors[] = $model->getFirstErrors();
                }
            }
            if (!empty($errors)) {
                $error = current(array_values(current($errors)));
                Yii::$app->session->setFlash('error', $error);
            } else {
                $buttons = [];
                $images = UploadedFile::getInstancesByName('images');
                foreach ($models as $key => $model) {
                    $image = $model->upload($images[$key]);
                    $buttons[] = [
                        'title' => $model->title,
                        'url' => $model->url,
                        'image' => $image,
                    ];
                }
                $this->setSetting('buttons', json_encode($buttons));
                Yii::$app->session->setFlash('success', '设置成功');
                $this->refresh();
            }
        } else {
            $models = [];
            $buttons = PluginSetting::get($this->identify, 'buttons');
            $buttons = json_decode($buttons, true);
            foreach ($buttons as $button) {
                $model = new NavBtn();
                $model->attributes = $button;
                $models[] = $model;
            }
        }
        return $this->render('admincp', [
            'models' => $models
        ]);
    }

    public function install()
    {
        $bars = [
            [
                'title' => '',
                'url' => '',
                'image' => '',
            ],
            [
                'title' => '',
                'url' => '',
                'image' => '',
            ],
            [
                'title' => '',
                'url' => '',
                'image' => '',
            ],
            [
                'title' => '',
                'url' => '',
                'image' => '',
            ],
        ];
        $this->setSetting('buttons', json_encode($bars));
        return true;
    }

    public function uninstall()
    {
        PluginSetting::deleteAll([
            'plugin' => $this->identify
        ]);
        return true;
    }
}
