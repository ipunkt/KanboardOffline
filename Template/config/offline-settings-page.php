<div class="page-header">
    <h2><?= t('Offline Plugin') ?></h2>
</div>
<form method="post" action="<?= $this->url->href('OfflineController', 'save', ['plugin' => 'OfflineKanboardPlugin']) ?>"
      autocomplete="off">
    <?= $this->form->csrf() ?>

    <fieldset>
        <h4><?= t('Theme') ?></h4>
        <?= $this->form->radios('theme', [
            'default' => t('"Default"'),
            'chrome' => t('"Chrome"'),
            'dark' => t('"Dark"'),
            'slide' => t('"Slide"'),
        ], $values) ?>
    </fieldset>

    <fieldset>
        <h4><?= t('Snake game') ?></h4>
        <?= $this->form->checkbox('snake_game', t('Enable "Snake" game, while waiting for the connection.'), 1,
            $values['snake_game'] == 1) ?>
    </fieldset>

    <fieldset>
        <h4><?= t('Advanced options') ?></h4>
        <?= $this->form->checkbox('check_connection', t('Check connection status on page load.'), 1,
            $values['check_connection'] == 1) ?>
        <?= $this->form->checkbox('store_remake',
            t('Store and attempt to remake requests which fail while the connection is down.'), 1,
            $values['store_remake'] == 1) ?>
        <?= $this->form->checkbox('monitor_requests',
            t('Monitor AJAX requests to help decide if we have a connection.'), 1, $values['monitor_requests'] == 1) ?>

    </fieldset>


    <?= $this->hook->render('template:config:offline-settings-page', array('values' => $values, 'errors' => $errors)) ?>

    <div class="form-actions">
        <button type="submit" class="btn btn-blue"><?= t('Save') ?></button>
    </div>
</form>