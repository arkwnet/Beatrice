<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
	$db_filename = "../beatrice.db";
	if (file_exists($db_filename)) {
		$db = new SQLite3($db_filename);
		send_data($db);
	} else {
		$db = new SQLite3($db_filename);
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