
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('base.css') ?>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <div class="top-bar-section">
            <ul class="title-area large-3 medium-4 columns">
                <li class="name">
                    <h3><a href="/events/calender">手登根.com</a></h3>
                </li>
                <li><a href="/events/calender">カレンダー</a></li>
                <li><a href="/events/index">イベント一覧</a></li>
                <li><a href="/users/index">ユーザー情報</a></li>
                <li><a href="/users/logout">ログアウト</a></li>
            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>

