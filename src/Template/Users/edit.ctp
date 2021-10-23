<div class="users form row md-3 col-md-8 my-4">
    <h3>ユーザー情報編集　※作成中</h3>
    <table>
        <?= $this->Form->create(null, ['url' => ['controller' => 'Users', 'action' => 'edit'], 'type' => 'post'])?>
        <tr>
            <th>
                <label>ユーザーID</label>
            </th>
            <th>
                <?= $user['user_id']; ?>
            </th>
        </tr> 
        <tr>
            <th>
                <label>ユーザー名</label>
            </th>
            <td>
                <?= $this->Form->control('', [
                    'type' => 'text', 
                    'name' => 'username', 
                    'value' => $user['username']
                ]);  ?>
            </td>
        </tr>
        <tr>
            <th>
                <label>ライン</label>
            </th>
            <td>
                <?= $this->Form->control('', [
                    'type' => 'text', 
                    'name' => 'line', 
                    'value' => $user['line']
                ]);  ?>
            </td>
        </tr>
    </table>
    <?= $this->Form->submit('変更登録',['name'=>'edit_line']);?>
    <?= $this->Form->end() ?>
</div>