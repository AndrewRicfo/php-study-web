<?php

$comment_file = 'comments.txt';
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
            echo '[' . $time . '](' . $comments[$j][0] . ') ' . $comments[$j][1] . ' : ' . $comments[$j][3] . '<br>';
    }



if ((!$_SESSION['ban']) && ($_SESSION['name'] != "")) {
    echo ' </div>
                <form id="form-com" method="post">
                    <label>
                        <input type="text" name="comment" placeholder="Введіть ваш відгук сюди" maxlength="500" size="135" required>
                    </label>
                    <input type="submit" value="Відправити" name="Go">
                </form>';
} elseif (($_SESSION['ban']) || ($_SESSION['name'] == "")) {
    echo '</div>';
}