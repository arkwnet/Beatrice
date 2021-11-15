<?php
include_once("../config.php");
if ($_POST["id"] == $admin_id && $_POST["pass"] == $admin_password) {
	echo "OK";
}