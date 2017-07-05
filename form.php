<form class="logino" action="" id="form1" method="post">

    <?php if ($_SESSION['ban'] == true): ?>
        Ваш акаунт заблокований<br>
        <form method="post">
            <input type="hidden" name="action" value="submit">
            <input type="submit" name="submit" value="Вихід">
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
            <input type="submit" name="submit" value="Вихід">
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
