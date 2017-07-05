<?php require 'login.php'; ?>
<?php require 'buttons.php' ?>
<!doctype html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta charset="utf-8">
    <title>САС</title>
</head>
<body>
    <HEADER>
        <div id="zara">
            <a href="index.php">
                <div class="lol">Культура</div>
            </a>
            <a href="history.php">
                <div class="lol">Історія</div>
            </a>
            <a href="climat.php">
                <div class="lol">Клімат</div>
            </a>
            <a href="exkur.php">
                <div class="lol">Екскурсії</div>
            </a>
        </div>
        <br>
    </HEADER>

    <div class="article">
        <img id="beard" src="beardienya.jpg"/>

        <p>Імя: Андрій</p>

        <p>Прізвище: Чернявський</p>

        <p>Вік: 19 років</p>

        <p>Стать: Чоловіча</p>

        <div class="comment-div"><h3>Нові коментарі</h3>

            <div id="sas-new-comments"><?php require 'printNewComment.php' ?></div>
        </div>
        <div class="comment-div">
            <h3>Коментарі</h3>

            <div id="comments"><?php require 'printCommentAdm.php' ?>
            </div>
            <h3>Користувачі</h3>

            <div id="sas-comments"><?php require 'users.php' ?></div>
        </div>

        <footer>
            <img id="ender" src="au.svg" alt="Logo"/>

            <p class="ender"> © Copyright @ 2014 Andriy Chernyavskiy. Kyiv. NTUU "KPI" </p>
        </footer>
    </body>
    </html>
