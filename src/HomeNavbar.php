<?php

namespace moguyun\plugins\homenavbar;

use moguyun\plugins\homenavbar\models\NavBtn;
use zacksleo\yii2\plugin\components\Plugin as IPlugin;
use zacksleo\yii2\plugin\models\PluginSetting;

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

    }

    public function admincp()
    {
        $models = [];
        $buttons = PluginSetting::get($this->identify, 'buttons');
        $buttons = json_decode($buttons, true);
        foreach ($buttons as $button) {
            $model = new NavBtn();
            $model->attributes = $button;
            $models[] = $model;
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