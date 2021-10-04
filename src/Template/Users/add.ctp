<div class="users form row md-3 col-md-8 my-4">
<?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('ユーザー登録') ?></legend>
        <?= $this->Form->control('username', ['label' => '名前']); ?>
        <?= $this->Form->control('line', ['label' => 'LineID']) ?>
        <?= $this->Form->control('group', [
            'label' => 'グループ',
            'options' => [ 0 => '-選択してください-', 1 => '手登根家', 2 => '◯◯◯◯']
        ]) ?>
        <?= $this->Form->control('password', ['label' => 'パスワード']); ?>

   </fieldset>
<?= $this->Form->button(__('登録')); ?>
<?= $this->Form->end() ?>
</div>