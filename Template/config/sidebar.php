<li <?= $this->app->checkMenuSelection('OfflineController', 'index') ?>>
    <?= $this->url->link(t('Offline settings'), 'OfflineController', 'index',
        ['plugin' => 'OfflineKanboardPlugin']) ?>
</li>