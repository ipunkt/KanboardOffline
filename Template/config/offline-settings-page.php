<div class="page-header">
    <h2><?= t('Offline Plugin') ?></h2>
</div>
<form method="post" action="<?= $this->url->href('OfflineController', 'save', ['plugin' => 'OfflineKanboardPlugin']) ?>"
      autocomplete="off">
    <?= $this->form->csrf() ?>

    <fieldset>
        <h4><?= t('Theme') ?></h4>
        <fieldset>
            <?= $this->form->radios('theme', [
                    'default' =>t('"Default"'),
                    'chrome' =>t('"Chrome"'),
                    'dark' =>t('"Dark"'),
                    'slide' =>t('"Slide"'),
            ], $values) ?>
        </fieldset>
    </fieldset>

    <fieldset>
        <h4><?= t('Snake game') ?></h4>
        <?= $this->form->checkbox('snake_game', t('Enable "Snake" game, while waiting for the connection'), 1, $values['snake_game'] == 1) ?>
    </fieldset>

    <?= $this->hook->render('template:config:offline-settings-page', array('values' => $values, 'errors' => $errors)) ?>

    <div class="form-actions">
        <button type="submit" class="btn btn-blue"><?= t('Save') ?></button>
    </div>
</form>