
<table>
    <tr>
        <th>UserID</th>
        <th>UserName</th>
        <th>UserLine</th>
        <th>Usergroup</th>
        <th>Userpassword</th>

    </tr>
    <?php for($i = 0; $i < count($users); $i++): ?>
    <tr>
        <td><?= $users[$i]['user_id']; ?></td>
        <td><?= $users[$i]['username']; ?></td>
        <td><?= $users[$i]['line']; ?></td>
        <td><?= $users[$i]['group']; ?></td>
        <td><?= $users[$i]['password']; ?></td>

    </tr>
    <?php endfor; ?>
</table>


