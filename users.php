<?php

$user_file = "users.txt";
$user_counter = substr_count(file_get_contents($user_file), '*');

$list = explode("*", file_get_contents($user_file));
$userok = array();
$counter = 0;
for ($i = 0; $i < $user_counter; $i++) {
    array_push($userok, explode("|", $list[$i]));
}
for ($j = 0; $j < $user_counter; $j++) {
    if ($userok[$j][2] == "banned")
        echo 'Login :' . $userok[$j][0] . ', Password: ' . $userok[$j][1] . ', ' . $userok[$j][2] .
    ', Email :' . $userok[$j][3] . ', Name: ' . $userok[$j][4] . '<form method="post"><input type="hidden" name="index" value="' . $j . '"><input type="submit" value="Unban" name="banunban">
</form> ' . '<br>';
else
    echo 'Login :' . $userok[$j][0] . ', Password: ' . $userok[$j][1] . ', ' . $userok[$j][2] .
', Email :' . $userok[$j][3] . ', Name: ' . $userok[$j][4] . '<form method="post"><input type="hidden" name="index" value="' . $j . '"><input type="submit" value="Ban" name="banunban">
</form> ' . '<br>';
}

‘upload_file.php’
<?php
session_start();
$upload_dir = realpath('upload') . DIRECTORY_SEPARATOR;
$file_info = $_FILES['file'];

$new_filename = $_SESSION['name'].'.jpg';
$tmp_name = $_FILES["file"]["tmp_name"];

// Make sure that the file name is valid.
if (strpos($new_filename, '/') !== false || strpos($new_filename, '\\') !== false) {
    die("Invalid filename");
}

$destination = $upload_dir . $new_filename;
move_uploaded_file($tmp_name, $destination);
header("Location: personal.php");