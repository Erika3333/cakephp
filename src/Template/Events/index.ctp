<div class="row">
    <div class="columns large-8">
        <h3>イベント一覧</h3>
        <a href="/evnets/add">イベント追加</a>
        <div class="ctp-warning alert text-center">
            <div class="center">
                <table>
                    <tr>
                        <th>日付</th>
                        <th>タイトル</th>
                        <th>コメント</th>
                        <th>グループ</th>
                        <th>入力者</th>
                    </tr>
                    <?php for($i = 0; $i < count($events); $i++): ?>
                    <tr>
                        <td><?= $events[$i]['data']; ?></td>
                        <td><?= $events[$i]['title']; ?></td>
                        <td><?= $events[$i]['comment']; ?></td>
                        <td><?= $events[$i]['group']; ?></td>
                        <td><?= $events[$i]['user_id']; ?></td>
                    </tr>
                    <?php endfor; ?>
                </table>
            </div>
        </div>
    </div>
</div>
