<?php
include_once("../config.php");
if ($_SERVER["REQUEST_METHOD"] === "POST") {
	$db_filepath = "../database/" . $db_filename;
	if (file_exists($db_filepath)) {
		$db = new SQLite3($db_filepath);
		send_data($db);
	} else {
		$db = new SQLite3($db_filepath);
		$db -> query("create table beatrice (id int, text varchar(65000))");
		$db -> exec("insert into beatrice (id, text) values (0, '')");
		send_data($db);
	}
}

function send_data($db) {
	$result = $db -> prepare("select text from beatrice where id = 0") -> execute();
	$result_array = $result -> fetchArray();
	echo $result_array["text"];
}