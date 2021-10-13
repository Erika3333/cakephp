<div class="users form row md-3 col-md-8 my-4">
    <h3>ユーザー情報編集</h3>
    <table>
        <?= $this->Form->create(null, ['url' => ['controller' => 'Users', 'action' => 'edit'], 'type' => 'post'])?>
        <tr>
            <th>
                <label>ユーザーID</label>
            </th>
            <th>
                <?= $displayUser['userid']; ?>
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
                    'value' => $displayUser['username']
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
                    'value' => $displayUser['line']
                ]);  ?>
            </td>
        </tr>
    </table>
    <?= $this->Form->submit('変更',['name'=>'edit_line']);?>
    <?= $this->Form->end() ?>
</div>