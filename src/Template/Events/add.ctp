<div class="row md-3 col-md-8 my-4">
    <h3>イベント入力</h3>
    <div></div>
    <?= $this->Form->create(null, ['url' => ['controller' => 'Events', 'action' => 'add'], 'type' => 'post'])?>
    <?= $this->Form->text('日付', ['type' => 'date', 'name' => 'data']); ?>
    <?= $this->Form->control('タイトル', ['type' => 'text', 'name' => 'title', 'value' => '']); ?>
    <?= $this->Form->control('詳細', ['type' => 'textarea', 'name' => 'comment']); ?>
    <?= $this->Form->control('グループ', [
        'type' => 'select', 'name' => 'group', 'options' => [ 
            0 => '-選択してください-', 
            1 => 'お祝い',
            2 => 'お墓参り' ]]); ?>

    <?= $this->Form->submit('送信') ?>
    <?= $this->Form->end() ?>
</div>



