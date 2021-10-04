<div class="row">
    <div class="columns large-8">
        <div class="ctp-warning alert">
        <h3>イベントカレンダー</h3>
            <table>
                <?= $this->Form->create(null, ["url" => ["controller" => "Events", "action" => "calender"], 'type' => 'get'])?>
                <tr>
                    <th colspan="2">
                        <?= $this->Form->button("<<", ["name" => "last_month", "value"=>$getDate ]) ?>
                    </th>
                    <th colspan="3" class="text-center">
                        <h3><?= $thisYear; ?>-<?= $thisMonth; ?></h3>
                    </th>
                    <th colspan="2">
                        <?= $this->Form->button(">>", ["name" => "next_month", "value"=>$thisYear ]) ?>
                    </th>
                </tr>
                <tr>
                    <th>日</th>
                    <th>月</th>
                    <th>火</th>
                    <th>水</th>
                    <th>木</th>
                    <th>金</th>
                    <th>土</th>
                </tr>
                <tr>
                    <?php $count = 0; ?>
                    <?php foreach ($eventCalneder as $key => $calender): ?>
                        <td>
                            <?php $count++; ?>
                            <?php echo $calender['day']; ?>
                            </br>
                            <?php echo $calender['event']; ?>
                        </td>
                    <?php if($count == 7): ?>
                        </tr>
                        <tr>
                    <?php $count = 0; ?>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </tr>
                <?= $this->Form->end() ?>
            </table>
        </div>
    </div>
</div>
