<?php require 'login.php'; ?>
<!doctype html>
<html>
<head>
  <script src="ajax.js" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta charset="utf-8">
  <title>Реєстрація</title>
</head>
<body">
<HEADER>
  <?php require 'form.php'; ?>
  <div id="zara">
   <a href="index.php"><div class="lol">Культура</div></a>
   <a href="history.php"><div class="lol">Історія</div></a>
   <a href="climat.php"><div class="lol">Клімат</div></a>
   <a href="exkur.php"><div class="lol">Екскурсії</div></a>
 </div><br>
 <div id="pict"></div>
</HEADER>

<div class="article">
  <p class="dva">Поля відмічені зірочкою - обов'язкові для заповнення.</p>
  <form action="reg.php" method="post" class="dva">
    <article><p>
      <label>* Як вас звати:
        <input type="text" name="firstname" placeholder="Ім'я"  required>
      </label>
      <input type="text" name="lastname" placeholder="Прізвище" required>
    </p><p>
    <label>* Введіть логін:
      <input type="text" name="Login" placeholder="Логін" onblur="checkLogin(this.value); regOrNot()" required /><span id="check_login"></span>
    </label>
  </p>
  <p>
    <label>* Введіть свій E-mail:
      <input type="email" name="email" placeholder="example@mail.com" required>
    </label>
  </p>
  <p>
    <label>* Введіть пароль:
      <input type="password" name="Password" size="15" id="paas" onblur="checkPassword(); regOrNot()" maxlength="30" required>
    </label>
  </p>
  <p>
    <label>* Підтвердіть пароль:
      <input type="password" name="ConfirmPassword" id="pas" onblur='checkPassword(); regOrNot()' size="15" maxlength="30" required><span id="check_password"></span>
    </label>
  </p>
  <p>
    <label>Стать:
      <select name="Sex">
        <option value="No" selected>&nbsp;</option>
        <option value="Male">Чоловіча</option>
        <option value="Female">Жіноча</option>
      </select>
    </label>
  </p>
  <p>
    <label> Дата народження:
      <input type="date" name="calendar" max="2014-10-20" min="1900-01-01">
    </label>
  </p>
  <p>
    <label> Мобільний телефон у форматі: +
      <input type="tel" name="tel" placeholder="380XXХХХХХХХ" pattern="380[0-9]{9}">
    </label>
  </p>
  <p>Чи бували Ви в Австралії?<label><input name="type" type="radio" value="1">Так</label>
   <label><input name="type" type="radio" value="2">Ні</label>
 </p>
 <p>
  <label> Додаткова інформація:<br>
    <textarea name="sign" cols="60" maxlength="500" rows="5"></textarea>
  </label>
</p>
<p>
  <label><input type="checkbox" name="Rulez" required>* Підтверджую, що я ознайомився(лась) із правилами.</label><br>
</article>
<section>
  <span id="reg_button"></span>
  <input type="reset" value="Очистити">


  <?php
  $user_file = "users.txt";
  $uname = htmlspecialchars($_POST['firstname']).' '.htmlspecialchars($_POST['lastname']);
  $ulog = htmlspecialchars($_POST['Login']);
  $upas = htmlspecialchars($_POST['Password']);
  $umail = htmlspecialchars($_POST['email']);

  $handle = fopen("users.txt", at);
  flock($handle, LOCK_SH);
  if($_POST['Login']!=""){
   $string = $ulog."|".$upas."|"."notbanned"."|".$umail."|".$uname."*";
   fwrite($handle, $string);
   flock($handle, LOCK_UN);
   fclose($handle);
   echo "<h3>Реєстрація пройшла успішно!</h3>";}
   ?>


 </section>
</form>
</div>
<footer>
  <img id="ender" src="au.svg" alt="Logo" />
  <p class="ender"> © Copyright @ 2014  Andriy Chernyavskiy. Kyiv. NTUU "KPI" </p>
</footer>
</body>
</html>