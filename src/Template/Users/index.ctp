<div class="users form row md-3 col-md-8 my-4">
    <h3>ユーザー情報</h3>
    <table>
        <?= $this->Form->create(null, ['url' => ['controller' => 'Users', 'action' => 'edit'], 'type' => 'post'])?>
        <tr>
            <th>
                <label>ユーザーID</label>
            </th>
            <th>
                <?= $displayUser['user_id']; ?>
            </th>
        </tr> 
        <tr>
            <th><label>ユーザー名</label></th>
            <td><?= $displayUser['username']; ?></td>
        </tr>
        <tr>
            <th><label>ライン</label></th>
            <td><?= $displayUser['line']; ?></td>
        </tr>
            <td colspan="2" class="text-right"><?= $this->Form->submit('変更',['name' => 'edit_line']);?></td>
            <?= $this->Form->end() ?>
    </table>
</div>