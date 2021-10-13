<div class="users form columns large-4">
    <?= $this->Flash->render() ?>
    <?= $this->Form->create() ?>
    <fieldset>
    <legend><?= __('ユーザ名とパスワードを入力してください') ?></legend>
    <?= $this->Form->control('username', ['label' => 'ユーザー名']) ?>
    <?= $this->Form->control('password', ['label' => 'パスワード']) ?>
    </fieldset>
    
    <a href="/users/add">新規登録はこちら</a>
    <div class="text-right"><?= $this->Form->button(__('ログイン')); ?></div>
    <?= $this->Form->end() ?>
</div>