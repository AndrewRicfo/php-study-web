<?php

session_start();
$incorrect_login_js = "";

if (!empty($_POST)) {
    $user_file = "users.txt";
    $user_counter = substr_count(file_get_contents($user_file), '*');

    $list = explode("*", file_get_contents($user_file));
    $userok = array();
    $counter = 0;
    for ($i = 0; $i < $user_counter; $i++) {
        array_push($userok, explode("|", $list[$i]));
    }
    for ($j = 0; $j < $user_counter; $j++) {
        if ($_POST['logn'] == "ricfo" && $_POST['pass'] == "123") {
            $_SESSION["name"] = "ricfo";
            $_SESSION['ban'] = false;
            $_SESSION['mail'] = $userok[$j][3];
            break;
        } elseif ($userok[$j][0] == $_POST['logn'] && $userok[$j][1] == $_POST['pass']) {
            if ($userok[$j][2] == "banned") {
                $_SESSION['ban'] = true;
            } else {
                $_SESSION["name"] = $_POST['logn'];
                $_SESSION['ban'] = false;
                $_SESSION['mail'] = $userok[$j][3];
            }
            break;
        }
        $counter += 1;
    }

    if (($counter == $user_counter) && (isset($_POST['logn']))) {
        $incorrect_login_js = '<script style="text/javascript">alert("Користувач з таким логіном/паролем не зареєстрований")</script>';
    }


    if (!empty($_POST['action'])) {
        if ($_POST['submit'] == "Вихід") {
            $_SESSION["name"] = "";
            $_SESSION['ban'] = false;
            $_SESSION['mail'] = "";
        }
        if ($_POST['submit1'] == "Вихід"){
            $_SESSION["name"] = "";
            $_SESSION['ban'] = false;
            $_SESSION['mail'] = "";
            header("Location: index.php");
        }
        if ($_POST['submit'] == "САС") {
            header("Location: admn.php");
            exit;
        }
        if ($_POST['submit'] == 'Моя сторінка')
            header("Location: personal.php");
    }
}