<div class="users form row md-3 col-md-8 my-4">
<?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('ユーザー登録') ?></legend>
        <?= $this->Form->control('username', ['label' => 'ユーザー名　※入力必須']); ?>
        <?= $this->Form->control('line', ['label' => 'LineID']) ?>
        <?= $this->Form->control('group', [
            'label' => 'グループ',
            'type' => 'select',
            'options' => $group_array
        ]); ?>
        <?= $this->Form->control('password', ['label' => 'パスワード　※入力必須']); ?>

   </fieldset>
<?= $this->Form->button(__('登録')); ?>
<?= $this->Form->end() ?>
</div>