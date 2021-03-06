<?php

namespace Kanboard\Plugin\OfflineKanboardPlugin\Controller;

use Kanboard\Controller\BaseController;


class OfflineController extends BaseController
{

    /**
     * Display the Offline settings page
     *
     * @access public
     */
    public function index()
    {
        $this->response->html($this->helper->layout->config('OfflineKanboardPlugin:config/offline-settings-page', array(
            'title' => t('Settings') . ' &gt; ' . t('Offline settings'),
        )));
    }


    public function js()
    {
        $check_connection = $this->configModel->get('check_connection');
        $checkOnLoad = ($check_connection == 1) ? 'true' : 'false';

        $store_remake = $this->configModel->get('store_remake');
        $requests = ($store_remake == 1) ? 'true' : 'false';

        $snake_game = $this->configModel->get('snake_game');
        $snake = ($snake_game == 1) ? 'true' : 'false';

        $initialDelay = $this->configModel->get('initialDelay');
        $delay = $this->configModel->get('delay');

        $data = 'Offline.options = {
                    checkOnLoad: ' . $checkOnLoad . ',
                    requests: ' . $requests . ',
                    reconnect: {
                        initialDelay:' . $initialDelay . ',
                        delay: ' . $delay . '
                    },
                    game: ' . $snake . '
        };';
        $this->response->js($data, 200);
    }

    /**
     * Save settings
     *
     */
    public function save()
    {
        $values = $this->request->getValues();
        $redirect = $this->request->getStringParam('redirect', 'index');
        switch ($redirect) {
            case 'index':
                $values += array(
                    'snake_game' => 0,
                    'check_connection' => 0,
                    'store_remake' => 0,
                );
                break;
        }
        if ($this->configModel->save($values)) {
            $this->languageModel->loadCurrentLanguage();
            $this->flash->success(t('Settings saved successfully.'));
        } else {
            $this->flash->failure(t('Unable to save your settings.'));
        }
        $this->response->redirect($this->helper->url->to('OfflineController', 'index',
            array('plugin' => 'OfflineKanboardPlugin')));
    }
}
