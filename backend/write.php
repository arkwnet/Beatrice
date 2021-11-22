<?php
include_once("../config.php");
if ($_SERVER["REQUEST_METHOD"] === "POST") {
	$text = htmlspecialchars($_POST["text"], ENT_QUOTES|ENT_HTML5, "UTF-8");
	$db_filepath = "../database/" . $db_filename;
	$db = new SQLite3($db_filepath);
	$db -> exec("update beatrice set text = '" . $text . "' where id = 0");
}