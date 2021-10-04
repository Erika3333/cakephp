<div class="users form columns large-4">
    <?= $this->Flash->render() ?>
    <?= $this->Form->create() ?>
    <fieldset>
    <legend><?= __('ユーザ名とパスワードを入力してください') ?></legend>
    <?= $this->Form->control('username', ['label' => '名前']) ?>
    <?= $this->Form->control('password', ['label' => 'パスワード']) ?>
    </fieldset>
    <?= $this->Form->button(__('ログイン')); ?>
    <?= $this->Form->end() ?>
</div>