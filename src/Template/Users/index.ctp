<div class="users form row md-3 col-md-8 my-4">
    <h3>ユーザー情報</h3>
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
            <th><label>ユーザー名</label></th>
            <td><?= $displayUser['username']; ?></td>
            <td><?= $this->Form->submit('変更',['name'=>'edit_username']);?></td>
        </tr>
        <tr>
            <th><label>ライン</label></th>
            <td><?= $displayUser['line']; ?></td>
            <td><?= $this->Form->submit('変更',['name'=>'edit_line']);?></td>
        </tr>
            <?= $this->Form->end() ?>
    </table>
</div>