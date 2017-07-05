<?php

$comment_counter = substr_count(file_get_contents($comment_file), '*');

$comment_list = explode("*", file_get_contents($comment_file));
$comments = array();
for ($i = 0; $i < $comment_counter; $i++) {
    array_push($comments, explode("|", $comment_list[$i]));
}

for ($j = 0; $j < $comment_counter; $j++) {
    $time = substr($comments[$j][2], 0, 2) . '.' . substr($comments[$j][2], 2, 2) . '.' .
    substr($comments[$j][2], 4, 4) . ' ' . substr($comments[$j][2], 8, 2) .
    ':' . substr($comments[$j][2], 10, 2);
    echo '[' . $time . '](' . $comments[$j][0] . ') ' . $comments[$j][1] . ' : ' . $comments[$j][3] .
    '<form method="post"><input type="hidden" name="index" value="' . $j . '"><input type="submit" value="Видалити" name="del2">
</form> ' . '<br>';
}
if ((!$_SESSION['ban']) && ($_SESSION['name'] != "")) {
    echo ' </div>';
} elseif (($_SESSION['ban']) || ($_SESSION['name'] == "")) {
    echo '</div>';
}
