<?php require 'login.php'; ?>
<?php require 'buttons.php'; ?>
<!doctype html>
<html>
<head>
    <script src="ajax.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta charset="utf-8">
    <title>Реєстрація</title>
</head>
<body>
    <HEADER>
        <form class="logino" action="" id="form1" method="post">

            <?php if ($_SESSION['ban'] == true): ?>
                Ваш акаунт заблокований<br>
                <form method="post">
                    <input type="hidden" name="action" value="submit">
                    <input type="submit" name="submit1" value="Вихід">
                </form>
            <?php elseif ($_SESSION['name'] == "ricfo"): ?>
                Привіт, Андрій
                <form method="post">
                    <input type="hidden" name="action" value="submit">
                    <input type="submit" name="submit" value="Вихід">
                    <input type="submit" name="submit" value="САС">
                </form>
                <?php
                elseif ($_SESSION['name'] != ""): ?>
                Привіт, <?= $_SESSION['name'] ?><br>
                <form method="post">
                    <input type="hidden" name="action" value="submit">
                    <input type="submit" name="submit1" value="Вихід">
                    <input type="submit" name="submit" value="Моя сторінка">
                </form>
                <?php
                else: ?>
                <label>E-mail:
                    <input type="text" name="logn" required size="16">
                </label>
                <label>Пароль:
                    <input type="password" name="pass" required size="16">
                </label>
                <input class="button" type="image" src="go.jpg" alt="Logo">
                <a href="reg.php">
                    <small>Зареєструватись
                    </a></small>
                <?php endif; ?>
            </form>
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

            <div id="pict"></div>
        </HEADER>

        <?php
        $user_file = "users.txt";
        $user_counter = substr_count(file_get_contents($user_file), '*');

        $list = explode("*", file_get_contents($user_file));
        $userok = array();
        $counter = 0;
        for ($i = 0; $i < $user_counter; $i++) {
            array_push($userok, explode("|", $list[$i]));
            if ($_SESSION['name'] == $userok[$i][0]) {
                $userok_name = $userok[$i][4];
                $userok_mail = $userok[$i][3];
                $userok_password = $userok[$i][1];
            };
        }
        ?>

        <div class="article">
            <table>
                <tr>
                    <td width="20%"><?php
                        $filename = '/upload/' . $_SESSION['name'] . '.jpg';
                        if (stream_resolve_include_path($filename) != false)
                            echo '<img src=\'upload/' . $_SESSION['name'] . '.jpg\' height=\'337px\' />';
                        else
                            echo '<img src=\'upload/noavatar.jpg\'';
                        ?>
                        <br>

                        <form action="upload_file.php" method="post"
                        enctype="multipart/form-data">
                        <label for="file"></label>
                        <input type="file" name="file" id="file"/>
                        <br/>
                        <input type="submit" name="submit" value="Завантажити" style="float:right"/>
                    </form>
                </td>
                <td>
                    <p>І'мя: <?= $userok_name ?></p>

                    <p>E-mail: <?= $userok_mail ?></p>

                    <p>Логін: <?= $_SESSION['name'] ?></p>

                    <p>Пароль: <?= $userok_password ?>
                    </p>
                </td>
                <td width="30%" style="text-align: right">
                    <form method="post">
                        Старий пароль:
                        <input name='oldpw' type='password' required='required'/><br>
                        Новий пароль:&nbsp;
                        <input name='newpw' type='password' required='required'/><br>
                        <input type='submit' name="passchange" value='Змінити пароль'/>
                    </form><span id="wrong_pass"></span>
                </td>
            </tr>
        </table>
        <div class="comment-div" style="text-align: center">Мої коментарі
            <div id="comments" style="text-align: left">
                <?php
                $comment_file = 'comments.txt';
                $comment_counter = substr_count(file_get_contents($comment_file), '*');

                $comment_list = explode("*", file_get_contents($comment_file));
                $comments = array();
                for ($i = 0; $i < $comment_counter; $i++) {
                    array_push($comments, explode("|", $comment_list[$i]));
                }


                for ($j = 0; $j < $comment_counter; $j++) {
                    if ($comments[$j][1] == $_SESSION['name']) {
                        $time = substr($comments[$j][2], 0, 2) . '.' . substr($comments[$j][2], 2, 2) . '.' .
                        substr($comments[$j][2], 4, 4) . ' ' . substr($comments[$j][2], 8, 2) .
                        ':' . substr($comments[$j][2], 10, 2);
                        echo '[' . $time . '](' . $comments[$j][0] . ') ' . $comments[$j][1] . ' : ' . $comments[$j][3] .
                        '<form method="post"><input type="hidden" name="index" value="' . $j . '"><input type="submit" value="Видалити" name="del2">' . '</form> ' . '<br>';
                    }
                }
                ?></div>
            </div>
        </div>

        <footer>
            <img id="ender" src="au.svg" alt="Logo"/>

            <p class="ender"> © Copyright @ 2014 Andriy Chernyavskiy. Kyiv. NTUU "KPI" </p>
        </footer>
        <link rel="stylesheet" type="text/css" href="style.css">
    </body>
    </html>
