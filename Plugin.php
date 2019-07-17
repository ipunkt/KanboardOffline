<?php

namespace Kanboard\Plugin\offlineKanboardPlugin;

use Kanboard\Core\Plugin\Base;

class Plugin extends Base
{
    public function initialize()
    {

        $this->hook->on("template:layout:js",
            array("template" => "plugins/offlineKanboardPlugin/Asset/js/offline.min.js"));

//        if ($this->configModel->get('first_choice', 1) == 1) {
        $this->hook->on("template:layout:css",
            array("template" => "plugins/offlineKanboardPlugin/Asset/css/offline-theme-chrome.css"));
        $this->hook->on("template:layout:css",
            array("template" => "plugins/offlineKanboardPlugin/Asset/css/offline-language-german.css"));
//    }
    }

    public function onStartup()
    {
    }

    public function getPluginName()
    {
        return 'offlineKanboardPlugin';
    }

    public function getPluginDescription()
    {
        return t('');
    }

    public function getPluginAuthor()
    {
        return 'ipunkt Business Solutions';
    }

    public function getPluginVersion()
    {
        return '1.0.0';
    }

    public function getPluginHomepage()
    {
        return '';
    }
}