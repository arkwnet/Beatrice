<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
	$text = htmlspecialchars($_POST["text"], ENT_QUOTES|ENT_HTML5, "UTF-8");
	$db_filename = "../database/beatrice.db";
	$db = new SQLite3($db_filename);
	$db -> exec("update beatrice set text = '" . $text . "' where id = 0");
}