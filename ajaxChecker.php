<?php

$login = htmlspecialchars($_POST["Login"]);

$user_file = "users.txt";
$user_counter = substr_count(file_get_contents($user_file), '*');
$list = explode("*", file_get_contents($user_file));
$userok = array();
$counter = 0;
for ($i = 0; $i < $user_counter; $i++) {
	array_push($userok, explode("|", $list[$i]));
}

if (!empty($_POST["Login"])) {
	$result = 1;
	for ($j = 0; $j < $user_counter; $j++) {
		if ($login == $userok[$j][0]) {
			$result = 2;
			break;
		}
	}
	echo $result;
}