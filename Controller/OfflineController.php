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
    public function index(){
        $this->response->html($this->helper->layout->config('OfflineKanboardPlugin:config/offline-settings-page', array(
            'title' => t('Settings').' &gt; '.t('Offline settings'),
        )));
    }

    /**
     * Save settings
     *
     */
    public function save()
    {
        $values =  $this->request->getValues();
        $redirect = $this->request->getStringParam('redirect', 'index');
        switch ($redirect) {
            case 'index':
                $values += array(
                    'snake_game' => 0,
                    'check_connection' => 0,
                    'store_remake' => 0,
                    'monitor_requests' => 0,
                );
                break;
        }

        if ($this->configModel->save($values)) {
            $this->languageModel->loadCurrentLanguage();
            $this->flash->success(t('Settings saved successfully.'));
            $this->response->json($values, 200);
        } else {
            $this->flash->failure(t('Unable to save your settings.'));
        }
        $this->response->redirect($this->helper->url->to('OfflineController', 'index', array('plugin' => 'OfflineKanboardPlugin')));
    }



}
