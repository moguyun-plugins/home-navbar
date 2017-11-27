<?php

namespace moguyun\plugins\homenavbar;

use zacksleo\yii2\plugin\components\Plugin as IPlugin;

class Plugin extends IPlugin
{
    public function init()
    {                    #插件初始化,配置插件信息 必须
        // set plugin's info
        $this->identify = 'AppBanner';            #必要参数, 插件的唯一标识.
        $this->name = 'App广告';         #必要参数, 插件的显示名称.
        $this->version = '1.0';                 #插件版本号
        $this->description = '显示在页面底部，手机App客户端，扫码进入手机站，该插件用于展示App下载、微官网、手机站';    #插件描述
        $this->copyright = '蘑菇云'; #插件版权信息
        $this->website = 'http://www.moguyun.ltd';      #网站
        $this->icon = 'icon.png'; #插件图标,最大72*72, 如果不设置将使用默认图标;
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
}