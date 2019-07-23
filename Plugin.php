<?php

namespace Kanboard\Plugin\OfflineKanboardPlugin;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;

/**
 * @property mixed config
 */
class Plugin extends Base
{
    public function initialize()
    {
        $user_lang = $this->languageModel->getCurrentLanguage();
        $theme = $this->configModel->get('theme');

        switch ($user_lang) {
            case 'de_DE':
                $this->hook->on("template:layout:css",
                    array("template" => t('plugins/OfflineKanboardPlugin/Asset/css/offline-language-german.css')));
                break;
            case 'en_US':
                $this->hook->on("template:layout:css",
                    array("template" => t('plugins/OfflineKanboardPlugin/Asset/css/offline-language-english.css')));
                break;
            case 'pl_PL':
                $this->hook->on("template:layout:css",
                    array("template" => t('plugins/OfflineKanboardPlugin/Asset/css/offline-language-polish.css')));
                break;
            case 'cs_CZ':
                $this->hook->on("template:layout:css",
                    array("template" => t('plugins/OfflineKanboardPlugin/Asset/css/offline-language-czech.css')));
                break;
            case 'da_DK':
                $this->hook->on("template:layout:css",
                    array("template" => t('plugins/OfflineKanboardPlugin/Asset/css/offline-language-dutch.css')));
                break;
            case 'fr_FR':
                $this->hook->on("template:layout:css",
                    array("template" => t('plugins/OfflineKanboardPlugin/Asset/css/offline-language-french.css')));
                break;
            case 'it_IT':
                $this->hook->on("template:layout:css",
                    array("template" => t('plugins/OfflineKanboardPlugin/Asset/css/offline-language-italian.css')));
                break;
            case 'pt_BR':
                $this->hook->on("template:layout:css",
                    array("template" => t('plugins/OfflineKanboardPlugin/Asset/css/offline-language-portuguese-brazil.css')));
                break;
            case 'es_ES':
                $this->hook->on("template:layout:css",
                    array("template" => t('plugins/OfflineKanboardPlugin/Asset/css/offline-language-spanish.css')));
                break;
            case 'tr_TR':
                $this->hook->on("template:layout:css",
                    array("template" => t('plugins/OfflineKanboardPlugin/Asset/css/offline-language-turkish.css')));
                break;
            default:
                $this->hook->on("template:layout:css",
                    array("template" => t('plugins/OfflineKanboardPlugin/Asset/css/offline-language-english.css')));
                break;
        }

        $this->template->hook->attach("template:config:sidebar",
            "OfflineKanboardPlugin:config/sidebar");

        $this->route->addRoute('settings/offline', 'OfflineController', 'index',
            'OfflineKanboardPlugin');

        $this->hook->on("template:layout:js",
            array("template" => "plugins/OfflineKanboardPlugin/Asset/js/offline.min.js"));

        $this->route->addRoute('js/offline?', 'OfflineController', 'js',
            'OfflineKanboardPlugin');
        $this->hook->on("template:layout:js", array("template" => "js/offline"));

        $this->hook->on("template:layout:js",
            array("template" => "plugins/OfflineKanboardPlugin/Asset/js/snake.js"));

        switch ($theme) {
            case 'default':
                $this->hook->on("template:layout:css",
                    array("template" => t('plugins/OfflineKanboardPlugin/Asset/css/offline-theme-default.css')));
                break;
            case 'chrome':
                $this->hook->on("template:layout:css",
                    array("template" => t('plugins/OfflineKanboardPlugin/Asset/css/offline-theme-chrome.css')));
                break;
            case 'dark':
                $this->hook->on("template:layout:css",
                    array("template" => t('plugins/OfflineKanboardPlugin/Asset/css/offline-theme-dark.css')));
                break;
            case 'slide':
                $this->hook->on("template:layout:css",
                    array("template" => t('plugins/OfflineKanboardPlugin/Asset/css/offline-theme-slide.css')));
                break;
            default:
                $this->hook->on("template:layout:css",
                    array("template" => t('plugins/OfflineKanboardPlugin/Asset/css/offline-theme-default.css')));
                break;
        }
    }

    public function onStartup()
    {
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__ . '/Locale');
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