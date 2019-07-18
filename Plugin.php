<?php

namespace Kanboard\Plugin\OfflineKanboardPlugin;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;

class Plugin extends Base
{
    public function initialize()
    {

        $this->template->hook->attach("template:config:sidebar",
            "OfflineKanboardPlugin:config/sidebar");
        $this->route->addRoute('settings/offline', 'OfflineController', 'index',
            'OfflineKanboardPlugin');
        $this->hook->on("template:layout:js",
            array("template" => "plugins/OfflineKanboardPlugin/Asset/js/offline.min.js"));

//        if ($this->configModel->get('first_choice', 1) == 1) {
        $this->hook->on("template:layout:css",
            array("template" => "plugins/OfflineKanboardPlugin/Asset/css/offline-theme-chrome.css"));
        $this->hook->on("template:layout:css",
            array("template" => t('plugins/OfflineKanboardPlugin/Asset/css/offline-language-english.css')));

//    }
    }

    public function onStartup()
    {
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__.'/Locale');
    }

    public function getPluginName()
    {
        return 'OfflineKanboardPlugin';
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