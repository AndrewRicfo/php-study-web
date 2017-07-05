<?php

$comment_file = "new_comments.txt";
$comment_counter = substr_count(file_get_contents($comment_file), '*');

$newCommentText = htmlspecialchars($_POST['comment']);
if (!empty($newCommentText) && !empty($_SESSION['name']) && $_SESSION['ban'] == false) {
	$handle = fopen($comment_file, "at");
	flock($handle, LOCK_SH);
	$newComment = $_SESSION['mail'] . '|' . $_SESSION['name'] . '|' . date(d . m . Y . H . i) . "|" . $newCommentText . "|" . ($comment_counter + 1) . '*';
	fwrite($handle, $newComment);
	flock($handle, LOCK_UN);
	fclose($handle);
	$comment_counter += 1;
} elseif (!empty($_SESSION['name']) && $_SESSION['ban'] == true) {
	echo '<script style="text/javascript">alert("Немає прав(Ваш акаунт заблокований)"</script>';
} elseif (empty($_SESSION['name'])) {
	echo '<script style="text/javascript">alert("Потрібно авторизуватися"</script>';
}
